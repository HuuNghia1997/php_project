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
    // GET ALL Date
    public function getSumbillsDate()
    {
        $sqlQuery = "SELECT SUM(TongTien) as tongtien, DATE(NgayDat)as ngaydat FROM " . $this->db_table . " GROUP BY DATE(donhang.NgayDat) ORDER BY Date(donhang.NgayDat) DESC;";
        $this->result = $this->db->query($sqlQuery);
        return $this->result;
    }
    // GET ALL Month
    public function getSumbillsMount()
    {
        $sqlQuery = "SELECT SUM(TongTien) as tongtien, DATE(NgayDat)as thang FROM " . $this->db_table . " GROUP BY MONTH(donhang.NgayDat) ORDER BY MONTH(donhang.NgayDat) DESC;";
        $this->result = $this->db->query($sqlQuery);
        return $this->result;
    }
    // GET ALL Month
    public function getSumbillsYear()
    {
        $sqlQuery = "SELECT SUM(TongTien) as tongtien, DATE(NgayDat)as nam FROM " . $this->db_table . " GROUP BY YEAR(donhang.NgayDat) ORDER BY YEAR(donhang.NgayDat) DESC;";
        $this->result = $this->db->query($sqlQuery);
        return $this->result;
    }

    // GET ALL
    public function getBills()
    {
        $this->results = array();

        $sqlQueryCount = $this->db->query("SELECT count(*) as total from ". $this->db_table."");
        $data = $sqlQueryCount->fetch_assoc();
        array_push( $this->results,  $data['total']);
        if ($this->keyword !== null && $this->keyword != "") {
            $this->keyword = "%".$this->keyword."%";
            $sqlQuery = "SELECT dh.DonHang_id, dh.TongTien,dh.NgayDat,dh.TrangThai,dh.NhanVien_id,dh.TenKhachHang, dh.KhachHang_id, dh.KhuyenMai_id,kh.HoTen
            FROM " . $this->db_table . " dh JOIN khachhang kh ON dh.KhachHang_id=kh.KhachHang_id
            WHERE  dh.TenKhachHang like '" . $this->keyword . "' LIMIT " . $this->size . " OFFSET " . $this->page . "
            ";
            $this->result = $this->db->query($sqlQuery);
            array_push( $this->results,  $this->result);
            return $this->results;
        } else {
            $sqlQuery = "SELECT dh.DonHang_id, dh.TongTien,dh.NgayDat,dh.TrangThai,dh.NhanVien_id,dh.TenKhachHang, dh.KhachHang_id, dh.KhuyenMai_id,kh.HoTen
            FROM " . $this->db_table . " dh JOIN khachhang kh ON dh.KhachHang_id=kh.KhachHang_id 
            LIMIT " . $this->size . " OFFSET " . $this->page . "
         ";
            $this->result = $this->db->query($sqlQuery);
            array_push( $this->results,  $this->result);
            return $this->results;
        }
    }
    //get one
    public function getOneBill()
    {
        $sqlQuery = "SELECT dh.DonHang_id, dh.TongTien,dh.NgayDat,dh.TrangThai,dh.NhanVien_id,dh.TenKhachHang, dh.KhachHang_id, dh.KhuyenMai_id,nv.HoTen as TenNhanVien,kh.HoTen,km.Gia 
        FROM " . $this->db_table . " dh JOIN nhanvien nv ON dh.NhanVien_id=nv.NhanVien_id
        JOIN khachhang kh ON dh.KhachHang_id=kh.KhachHang_id
        LEFT JOIN khuyemai km ON dh.KhuyenMai_id=km.KhuyenMai_id 
        WHERE DonHang_id = " . $this->id;
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
