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
    // GET ALL
    public function getBills()
    {
        $sqlQuery = "SELECT HoTen  FROM " . $this->db_table . " WHERE khachhang.KhachHang_id " . $this->id;
        $this->result = $this->db->query($sqlQuery);
        if ($this->db->affected_rows > 0) {
            return $this->result;
        }
    }
}
