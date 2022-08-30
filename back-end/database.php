<?php
class Database {

    private $host = DB_HOST;
    private $name = DB_NAME;
    private $user = DB_USER;
    private $pass = DB_PASS;
    public $conn;

    function __construct()
    {
        $this->init_DB();
    }

    function init_DB() {
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->name);
    }

}