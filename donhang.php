<?php
class Bills
{
    // dbection
    private $db;
    private $size;
    private $page;
    private $keyword;
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
    public function __construct($db, $size, $page, $keyword)
    {
        $this->db = $db;
        $this->page = $page;
        $this->size = $size;
        $this->keyword = $keyword;
    }


    // GET ALL
    public function getBills()
    {
        if ($this->keyword !== null) {
            $sqlQuery = "SELECT *
            FROM " . $this->db_table . " WHERE  donhang.TenKhachHang= '" . $this->keyword . "' LIMIT " . $this->size . " OFFSET " . $this->page . "
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
    //get one
    public function getOneBill()
    {
        $sqlQuery = "SELECT *  FROM " . $this->db_table . " WHERE DonHang_id = " . $this->id;
        $this->result = $this->db->query($sqlQuery);
        if ($this->db->affected_rows > 0) {
            return $this->result;
        }
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
        $this->TenKhachHang = htmlspecialchars(strip_tags($this->TenKhachHang));
        $sqlQuery = "INSERT INTO
            " . $this->db_table . " SET donhang.TongTien = " . $this->TongTien . ",
            donhang.NgayDat = '" . $this->NgayDat . "',
            donhang.TrangThai = " . $this->TrangThai . ",
            donhang.NhanVien_id = " . $this->NhanVien_id . ",
            donhang.KhuyenMai_id = " . $this->KhuyenMai_id . ",
            donhang.KhachHang_id = " . $this->KhachHang_id . ",
            donhang.TenKhachHang = '" . $this->TenKhachHang . "'
             ";
        $this->db->query($sqlQuery);
        if ($this->db->affected_rows > 0) {
            return true;
        }
        return false;
    }
    // UPDATE
    public function updateBills()
    {
        $this->TongTien = htmlspecialchars(strip_tags($this->TongTien));
        $this->NgayDat = htmlspecialchars(strip_tags($this->NgayDat));
        $this->TrangThai = htmlspecialchars(strip_tags($this->TrangThai));
        $this->NhanVien_id = htmlspecialchars(strip_tags($this->NhanVien_id));
        $this->KhuyenMai_id = htmlspecialchars(strip_tags($this->KhuyenMai_id));
        $this->KhachHang_id = htmlspecialchars(strip_tags($this->KhachHang_id));
        $this->TenKhachHang = htmlspecialchars(strip_tags($this->TenKhachHang));
        $sqlQuery = "UPDATE  " . $this->db_table . " SET donhang.TongTien = " . $this->TongTien . ",
        donhang.NgayDat = '" . $this->NgayDat . "',
        donhang.TrangThai = " . $this->TrangThai . ",
        donhang.NhanVien_id = " . $this->NhanVien_id . ",
        donhang.KhuyenMai_id = " . $this->KhuyenMai_id . ",
        donhang.KhachHang_id = " . $this->KhachHang_id . ",
        donhang.TenKhachHang = '" . $this->TenKhachHang . "'
        WHERE DonHang_id = " . $this->id;
        $this->db->query($sqlQuery);
        if ($this->db->affected_rows > 0) {
            return true;
        }
        return false;
    }
    // DELETE
    function deleteBills()
    {
        $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE DonHang_id = " . $this->id;
        $this->db->query($sqlQuery);
        if ($this->db->affected_rows > 0) {
            return true;
        }
        return false;
    }
}
