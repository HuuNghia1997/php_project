<?php
class Employees
{
    // dbection
    private $db;
    // Table
    private $db_table = "nhanvien";
    // Columns
    public $id;
    public $HoTen;
    // Db dbection
    public function __construct($db)
    {
        $this->db = $db;
    }
    // GET one
    public function getOneEmployee()
    {
        $sqlQuery = "SELECT HoTen  FROM " . $this->db_table . " WHERE nhanvien.NhanVien_id =" . $this->id;
        $this->result = $this->db->query($sqlQuery);
        if ($this->db->affected_rows > 0) {
            return $this->result;
        }
    }
    // GET ALL
    public function getEmployees()
    {
        $sqlQuery = "SELECT NhanVien_id,HoTen
        FROM " . $this->db_table . " 
        ";
        $this->result = $this->db->query($sqlQuery);
        return $this->result;
    }
    // UPDATE
    public function updateEmployees()
    {
        $this->HoTen = htmlspecialchars(strip_tags($this->HoTen));
        $sqlQuery = "UPDATE  " . $this->db_table . " SET HoTen = '" . $this->HoTen . "'
           WHERE NhanVien_id  = " . $this->id;
        $this->db->query($sqlQuery);
        if ($this->db->affected_rows > 0) {
            return true;
        }
        return false;
    }
}
