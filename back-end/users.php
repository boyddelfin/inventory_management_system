<?php
class Users {

    public $id;
    public $display_name;
    public $username;
    public $password;

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