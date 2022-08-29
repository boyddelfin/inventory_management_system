<?php
class Users {

    public $id;
    public $display_name;
    public $username;
    public $password;
    private $table_name = 'inventory_users';

    function __construct()
    {
        $this->id = $this->get_id('boyd123', 'admin');

    }

    public function get_id($username = null, $password = null)
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
        $database->close();
        return $result['id'];
    }

}

$users = new Users();