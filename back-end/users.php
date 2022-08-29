<?php
class Users {

    public $id;
    public $display_name;
    public $username;
    public $password;
    private $table_name = 'inventory_users';

    function __construct()
    {
        
    }

    public function authenticate($username, $password)
    {
        $database = new Database();
        $sql = sprintf(
            'SELECT id FROM %1$s WHERE username = "%2$s" AND password = "%3$s"',
            $this->table_name, // #1
            $database->clean_data($username), // #2
            $database->clean_data(SHA1($password)) // #3
        );
        $query = $database->query($sql);
        $result = $query->fetch_assoc();
        if($query->num_rows > 0) {
            $this->id = $result['id'];
        } else {
            return false;
        }
        $database->close();
    }

    public function get_ID() {
        return $this->id;
    }


}

$users = new Users();