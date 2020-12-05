<?php
class Custommer
{
    // dbection
    private $db;
    // Table
    private $db_table = "khachhang";
    // Columns
    public $id;
    public $HoTen;
    // Db dbection
    public function __construct($db)
    {
        $this->db = $db;
    }
    // GET one
    public function getOneCustommer()
    {
        $sqlQuery = "SELECT HoTen  FROM " . $this->db_table . " WHERE khachhang.KhachHang_id =" . $this->id;
        $this->result = $this->db->query($sqlQuery);
        return $this->result;
        
    }
    // GET ALL
    public function getCustommer()
    {
        $sqlQuery = "SELECT KhachHang_id,HoTen
        FROM " . $this->db_table . " 
        ";
        $this->result = $this->db->query($sqlQuery);
        return $this->result;
    }
       // UPDATE
       public function updateCustommer()
       {
           $this->HoTen = htmlspecialchars(strip_tags($this->HoTen));
           $sqlQuery = "UPDATE  " . $this->db_table . " SET HoTen = '" . $this->HoTen . "'
           WHERE KhachHang_id  = " . $this->id;
           $this->db->query($sqlQuery);
           if ($this->db->affected_rows > 0) {
               return true;
           }
           return false;
       }
}
