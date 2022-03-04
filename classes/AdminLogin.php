<?php
include '../lib/Database.php';
include '../helpers/Format.php';
include '../lib/Session.php';

Session::checkSession();


class AdminLogin{
    private $db;
    private $fm;

    public function __construct(){
      $this->db = new Database();
      $this->fm = new Format();
    }
}

