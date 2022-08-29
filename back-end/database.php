<?php
class Database {

    private $host = DB_HOST;
    private $name = DB_NAME;
    private $user = DB_USER;
    private $pass = DB_PASS;


    function __construct()
    {
        $this->connection();

        if(!$this->check_connection()) {
             echo "Error connecting to database check your credentials";
        } else {
            $this->connection()->close();
        }
    }

    private function connection() {
        return new mysqli($this->host, $this->user, $this->pass, $this->name);
    }

    public function query($sql) {
        return mysqli_query($this->connection(), $sql);
    }

    private function check_connection() {
        if($this->connection()->connect_error) {
            $this->connection()->close();
            return false;
        } else {
            return true;
        }
    }

    public function clean_data($data) {
        return mysqli_escape_string($this->connection(), $data);
    }

    public function close() {
        return $this->connection()->close();
    }

}