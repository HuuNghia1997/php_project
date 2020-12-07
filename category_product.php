<?php
class CategoryProduct
{
    // dbection
    private $db;
    private $size;
    private $page;
    private $keyword;
    // Table
    private $db_table = "loaimon";
    // Columns
    public $LoaiMon_id;
    public $TenLoaiMon;
    // Db dbection
    public function __construct($db, $size, $page, $keyword)
    {
        $this->db = $db;
        $this->page = $page;
        $this->size = $size;
        $this->keyword = $keyword;
    }


    // GET ALL
    public function getCategoryProducts()
    {
        if ($this->keyword !== null) {
            $sqlQuery = "SELECT *
            FROM " . $this->db_table . " WHERE  loaimon.TenLoaiMon like '%" . $this->keyword . "%' LIMIT " . $this->size . " OFFSET " . $this->page . "
            ";
            $this->result = $this->db->query($sqlQuery);
            return $this->result;
        } else {
            $sqlQuery = "SELECT *
         FROM " . $this->db_table . " LIMIT " . $this->size . " OFFSET " . $this->page . "
         ";
            $this->result = $this->db->query($sqlQuery);
            return $this->result;
        }
    }
}
