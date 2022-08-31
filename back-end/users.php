<?php
class Users {

    public $id;
    public $display_name;
    public $username;
    public $password;
    public $user_type;

    function __construct()
    {
        $this->load_properties();
    }

    private function table() {
        return 'inventory_users';
    }

    public function authenticate($username, $password)
    {
        $db = new Database();

        $sql = "SELECT id FROM ".$this->table()." WHERE username=? AND password=SHA1(?)";

        $query = $db->conn->prepare($sql);
        $query->bind_param("ss", $username, $password);
        $query->execute();

        $result = $query->get_result();
        $get = $result->fetch_assoc();

        $db->conn->close();

        if($result->num_rows > 0) {
            $this->id = $get['id'];
            return true;
        } else {
            return false;
        }

    }

    public function type() {
        switch ($this->user_type) {
            case '1111':
                return 'System Administrator';
                break;

            case '1100':
                return 'Stock Administrator';
                break;

            case '1101':
                return 'Sales Administrator';
                break;
            
            default:
                return 'Guest';
                break;
        }
    }

    public function loop() {
        $db = new Database();

        $sql = "SELECT * FROM ".$this->table();
        $query = $db->conn->prepare($sql);
        $query->execute();

        $result = $query->get_result();
        $rows = $result->num_rows;

        $data = '';

        for($x = 0;$x > $rows; $x++) {
            $row = $result->fetch_assoc(MYSQLI_ASSOC);
            echo $row['id'];
        }
        
        // return $result;

        $query->close();
        $db->conn->close();
    }

    private function set_data($key) {
        $db = new Database();

        $sql = "SELECT $key FROM ".$this->table()." WHERE id=?";
        $query = $db->conn->prepare($sql);
        $query->bind_param("i", $_SESSION['id']);
        $query->execute();

        $result = $query->get_result();
        $get = $result->fetch_assoc();

        $db->conn->close();

        if($result->num_rows > 0) {
            return $get[$key];
        }
    }

    private function load_properties() {
        $properties = get_object_vars($this);
        foreach($properties as $key => $value) {
            $this->$key = $this->set_data($key);
        }
    }

}

$users = new Users();