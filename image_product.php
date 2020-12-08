<?php
class imageProduct
{
    // dbection
    private $db;
    private $tmp_name;
    // Table
    private $db_table = "hinhmon";
    // Columns
    public $id;
    public $IMG;
    public $Mon_id;
    // Db dbection
    public function __construct($db, $tmp_name)
    {
        $this->db = $db;
        $this->tmp_name = $tmp_name;
    }
    // GET one
    public function getOneImage()
    {
        $sqlQuery = "SELECT *  FROM " . $this->db_table . " WHERE hinhmon.HinhMon_id   =" . $this->id;

        $this->result = $this->db->query($sqlQuery);
        if ($this->db->affected_rows > 0) {
            return $this->result;
        }
    }
        // GET one
        public function getImageBills()
        {
            $sqlQuery = "SELECT *  FROM " . $this->db_table . " WHERE hinhmon.Mon_id   =" . $this->id;
    
            $this->result = $this->db->query($sqlQuery);
            if ($this->db->affected_rows > 0) {
                return $this->result;
            }
        }
    // GET ALL
    public function getImage()
    {
        $sqlQuery = "SELECT *
        FROM " . $this->db_table . " 
        ";
        $this->result = $this->db->query($sqlQuery);
        return $this->result;
    }
    // CREATE
    public function createImage()
    {
        // sanitize
        $this->IMG = htmlspecialchars(strip_tags($this->IMG));
        $target_dir = "hinhanh/";
        $target_file = $target_dir . $this->IMG;
        $this->Mon_id = htmlspecialchars(strip_tags($this->Mon_id));
        // image file directory
        $target = "D:/xampp/htdocs/std_project/php_project/hinhanh/" . basename($this->IMG);
        $sqlQuery = "INSERT INTO
            " . $this->db_table . " SET hinhmon.IMG = '" . $target_file . "',
            hinhmon.Mon_id = '" . $this->Mon_id . "'
             ";
        $this->db->query($sqlQuery);
        if ($this->db->affected_rows > 0 && move_uploaded_file($this->tmp_name, $target)) {
            return true;
        }
        return false;
    }
    // UPDATE
    public function updateImage()
    {
        $this->IMG = htmlspecialchars(strip_tags($this->IMG));
        $target_dir = "hinhanh/";
        $target_file = $target_dir . $this->IMG;
        // image file directory
        $target = "D:/xampp/htdocs/std_project/php_project/hinhanh/" . basename($this->IMG);
        $sqlQuery = "UPDATE  " . $this->db_table . " SET IMG = '" . $target_file . "'
           WHERE HinhMon_id  = " . $this->id;
        $this->db->query($sqlQuery);
        if ($this->db->affected_rows > 0 && move_uploaded_file($this->tmp_name, $target)) {
            return true;
        }
        return false;
    }
    function deleteImage()
    {
        $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE HinhMon_id = " . $this->id;
        $this->db->query($sqlQuery);
        if ($this->db->affected_rows > 0) {
            return true;
        }
        return false;
    }
}
