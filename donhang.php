<?php
class Bills
{
    // dbection
    private $db;
    private $size;
    private $page;
    // Table
    private $db_table = "donhang";
    // Columns
    public $DonHang_id;
    public $TongTien;
    public $NgayDat;
    public $TrangThai;
    public $NhanVien_id;
    public $KhuyenMai_id;
    public $KhachHang_id;
    public $TenKhachHang;
    // Db dbection
    public function __construct($db, $size, $page)
    {
        $this->db = $db;
        $this->page = $page;
        $this->size = $size;
    }


    // GET ALL
    public function getBills()
    {

        $sqlQuery = "SELECT DonHang_id, TongTien, NgayDat, TrangThai, NhanVien_id,KhuyenMai_id,KhachHang_id,TenKhachHang
         FROM " . $this->db_table . "limit " . $this->size . " offset " . $this->page . "";
        $this->result = $this->db->query($sqlQuery);
        //them 1 dong comment
        return $this->result;
    }

    // CREATE
    public function createBills()
    {
        // sanitize
        $this->TongTien = htmlspecialchars(strip_tags($this->TongTien));
        $this->NgayDat = htmlspecialchars(strip_tags($this->NgayDat));
        $this->TrangThai = htmlspecialchars(strip_tags($this->TrangThai));
        $this->NhanVien_id = htmlspecialchars(strip_tags($this->NhanVien_id));
        $this->KhuyenMai_id = htmlspecialchars(strip_tags($this->KhuyenMai_id));
        $this->KhachHang_id = htmlspecialchars(strip_tags($this->KhachHang_id));
        $sqlQuery = "INSERT INTO
            " . $this->db_table . " SET TongTien = '" . $this->TongTien . "',
            NgayDat = '" . $this->NgayDat . "',
            TrangThai = '" . $this->TrangThai . "',
            NhanVien_id = '" . $this->NhanVien_id . "',
            KhuyenMai_id = '" . $this->KhuyenMai_id . "',
            KhachHang_id = '" . $this->KhachHang_id . "'
             ";
        $this->db->query($sqlQuery);
        if ($this->db->affected_rows > 0) {
            return true;
        }
        return false;
    }
}
