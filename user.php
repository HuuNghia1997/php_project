<?php
class Users
{
    private $db;
    private $db_table = "admin";
    // Columns
    public $TaiKhoan;
    public $PassWord;
    public function __construct($db)
    {
        $this->db = $db;
    }
    // CREATE
    public function login()
    {
        $this->TaiKhoan = htmlspecialchars(strip_tags($this->TaiKhoan));
        $this->PassWord = htmlspecialchars(strip_tags($this->PassWord));
        $sqlQuery = "SELECT TaiKhoan,PassWord FROM " . $this->db_table . " WHERE admin.TaiKhoan='" . $this->TaiKhoan . "' and admin.PassWord=" . $this->PassWord . "
        ";
        $result = mysqli_query($this->db, $sqlQuery);
        $count = mysqli_num_rows($result);
        if ($count == 1) {
           return true;
        } else {
            return false;
        }
    }
    
}
