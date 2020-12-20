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
    public $IMG;
    public $tmp_name;
    // Db dbection
    public function __construct($db)
    {
        $this->db = $db;
    }
    // GET one
    public function getOneEmployee()
    {
        $sqlQuery = "SELECT * FROM " . $this->db_table . " WHERE nhanvien.NhanVien_id =" . $this->id;
        $this->result = $this->db->query($sqlQuery);
        if ($this->db->affected_rows > 0) {
            return $this->result;
        }
    }
    // GET ALL
    public function getEmployees()
    {
        $sqlQuery = "SELECT NhanVien_id,HoTen,Avatar
        FROM " . $this->db_table . " 
        ";
        $this->result = $this->db->query($sqlQuery);
        return $this->result;
    }

    //Create
    public function createEmployee($taikhoan,$matkhau,$hoten,$sdt,$diachi,$gioitinh,$ngaysinh,$email)
    {
        $sqlQuery = "INSERT INTO " . $this->db_table . " 
        VALUES (
            '',
            '" . $taikhoan . "',
            '" . $matkhau . "',
            '" . $hoten . "',
            '" . $sdt . "',
            '" . $diachi . "',
            '" . $gioitinh . "',
            '" . $ngaysinh . "',
            '" . $email . "','',1)";
        $this->db->query($sqlQuery);
        if ($this->db->affected_rows > 0) {
            return true;
        }
        return false;
    }

    // UPDATE
    public function updateEmployees($hoten,$sdt,$diachi,$gioitinh,$ngaysinh,$email)
    {
        $sqlQuery = "UPDATE " . $this->db_table . " 
        SET HoTen = '" . $hoten . "',
        SDT = '" . $sdt . "',
        DiaChi = '" . $diachi . "',
        GioiTinh = '" . $gioitinh . "',
        NgaySinh = '" . $ngaysinh . "',
        Email = '" . $email . "' 
        WHERE nhanvien.NhanVien_id  = " . $this->id;
        $this->db->query($sqlQuery);
        if ($this->db->affected_rows > 0) {
            return true;
        }
        return false;
    }

    public function updateEmployeePassword($password)
    {
        $sqlQuery = "UPDATE " . $this->db_table . " 
        SET PassWord = '" . $password . "'
        WHERE NhanVien_id  = " . $this->id;
        $this->db->query($sqlQuery);
        if ($this->db->affected_rows > 0) {
            return true;
        }
        return false;
    }

    // DELETE
    public function deleteEmployee()
    {
        $sqlQuery = "DELETE FROM " . $this->db_table . "
           WHERE NhanVien_id  = " . $this->id;
        $this->db->query($sqlQuery);
        if ($this->db->affected_rows > 0) {
            return true;
        }
        return false;
    }

    public function upload_avatar()
    {
        $date = new DateTime();
        $timestemp = $date->getTimestamp();

        // sanitize
        $this->IMG = htmlspecialchars(strip_tags($this->IMG));
        $target_dir = "hinhanh/";
        $target_file = $target_dir . strval($timestemp) . $this->IMG;
        // image file directory

        $target = "./hinhanh/" . strval($timestemp) . basename($this->IMG);

        

        $sqlQuery = "UPDATE
            " . $this->db_table . " SET nhanvien.Avatar = '" . $target_file . "' 
            WHERE nhanvien.NhanVien_id  = " . $this->id;

        $this->db->query($sqlQuery);
        if ($this->db->affected_rows > 0 && move_uploaded_file($this->tmp_name, $target)) {
            return true;
        }
        return false;
    }
}
