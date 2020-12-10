<?php
class Product
{
    // dbection
    private $db;
    private $size;
    private $page;
    private $keyword;
    // Table
    private $db_table = "mon";
    // Columns
    public $Mon_id;
    public $TenMon;
    public $MoTa;
    public $Gia;
    public $LoaiMon_id;
    // Db dbection
    public function __construct($db, $size, $page, $keyword)
    {
        $this->db = $db;
        $this->page = $page;
        $this->size = $size;
        $this->keyword = $keyword;
    }


    // GET ALL
    public function getProducts()
    {
        $this->results = array();

        $sqlQueryCount = $this->db->query("SELECT count(*) as total from " . $this->db_table . "");
        $data = $sqlQueryCount->fetch_assoc();
        array_push($this->results,  $data['total']);
        $this->page = $this->page*10;
        if ($this->keyword != null) {
            $sqlQuery = "SELECT hinhmon.HinhMon_id,hinhmon.IMG,mon.Mon_id,mon.TenMon,mon.MoTa,mon.Gia,mon.LoaiMon_id,loaimon.TenLoaiMon 
            FROM mon LEFT JOIN hinhmon ON mon.Mon_id=hinhmon.Mon_id 
            JOIN loaimon on mon.LoaiMon_id=loaimon.LoaiMon_id
            WHERE  mon.TenMon like '%" . $this->keyword . "%' AND (hinhmon.is_main = 1 OR hinhmon.is_main IS NULL)
            ORDER BY mon.Mon_id DESC LIMIT " . $this->size . " OFFSET " . $this->page . "";
            $this->result = $this->db->query($sqlQuery);
            array_push($this->results,  $this->result);
            return $this->results;
        } else {
            $sqlQuery = "SELECT hinhmon.HinhMon_id,hinhmon.IMG,mon.Mon_id,mon.TenMon,mon.MoTa,mon.Gia,mon.LoaiMon_id,loaimon.TenLoaiMon 
            FROM mon LEFT JOIN hinhmon ON mon.Mon_id=hinhmon.Mon_id 
            JOIN loaimon on mon.LoaiMon_id=loaimon.LoaiMon_id
            WHERE hinhmon.is_main = 1 OR hinhmon.is_main IS NULL
            ORDER BY mon.Mon_id DESC LIMIT " . $this->size . " OFFSET " . $this->page . "";
            $this->result = $this->db->query($sqlQuery);
            array_push( $this->results,  $this->result);
            return $this->results;
        }
    }
    //get one
    public function getOnePrduct()
    {
        $sqlQuery = "SELECT hinhmon.HinhMon_id,hinhmon.IMG,mon.Mon_id,mon.TenMon,mon.MoTa,mon.Gia,mon.LoaiMon_id,loaimon.TenLoaiMon 
        FROM mon LEFT JOIN hinhmon ON mon.Mon_id=hinhmon.Mon_id 
        JOIN loaimon on mon.LoaiMon_id=loaimon.LoaiMon_id
        WHERE mon.Mon_id=" . $this->id;
        $this->result = $this->db->query($sqlQuery);
        if ($this->db->affected_rows > 0) {
            return $this->result;
        }
    }

    // CREATE
    public function createProduct()
    {
        // sanitize
        $this->TenMon = htmlspecialchars(strip_tags($this->TenMon));
        $this->MoTa = htmlspecialchars(strip_tags($this->MoTa));
        $this->Gia = htmlspecialchars(strip_tags($this->Gia));
        $this->LoaiMon_id = htmlspecialchars(strip_tags($this->LoaiMon_id));
        $sqlQuery = "INSERT INTO
            " . $this->db_table . " SET mon.TenMon = '" . $this->TenMon . "',
            mon.MoTa = '" . $this->MoTa . "',
            mon.Gia = " . $this->Gia . ",
            mon.LoaiMon_id = " . $this->LoaiMon_id . "
             ";
        if ($this->db->query($sqlQuery) === TRUE) {
            $last_id = $this->db->insert_id;
            return $last_id;
        } else {
            return false;
        }
    }

    public function createProductWithImage()
    {
        // sanitize
        $this->TenMon = htmlspecialchars(strip_tags($this->TenMon));
        $this->MoTa = htmlspecialchars(strip_tags($this->MoTa));
        $this->Gia = htmlspecialchars(strip_tags($this->Gia));
        $this->LoaiMon_id = htmlspecialchars(strip_tags($this->LoaiMon_id));
        $this->IMG = htmlspecialchars(strip_tags($this->IMG));
        $sqlQuery = "INSERT INTO
            " . $this->db_table . " SET mon.TenMon = '" . $this->TenMon . "',
            mon.MoTa = '" . $this->MoTa . "',
            mon.Gia = " . $this->Gia . ",
            mon.LoaiMon_id = " . $this->LoaiMon_id . "
             ";
        if ($this->db->query($sqlQuery) === TRUE) {
            $last_id = $this->db->insert_id;
            $target_dir = "hinhanh/";
            $target_file = $target_dir . $this->IMG;
            $this->Mon_id = htmlspecialchars(strip_tags($this->Mon_id));
            // image file directory
            $target = "./hinhanh/" . basename($this->IMG);
            $sqlQuery = "INSERT INTO
                " . $this->db_table . " SET hinhmon.IMG = '" . $target_file . "',
                hinhmon.Mon_id = '" . $last_id . "'
                ";
            $this->db->query($sqlQuery);
            if ($this->db->affected_rows > 0 && move_uploaded_file($this->tmp_name, $target)) {
                return true;
            }
            // return false;

            return $last_id;
        } else {
            return false;
        }
    }
    // UPDATE
    public function updateProduct()
    {
        // sanitize
        $this->TenMon = htmlspecialchars(strip_tags($this->TenMon));
        $this->MoTa = htmlspecialchars(strip_tags($this->MoTa));
        $this->Gia = htmlspecialchars(strip_tags($this->Gia));
        $this->LoaiMon_id = htmlspecialchars(strip_tags($this->LoaiMon_id));
        $sqlQuery = "UPDATE  " . $this->db_table . " SET mon.TenMon = '" . $this->TenMon . "',
        mon.MoTa = '" . $this->MoTa . "',
        mon.Gia = " . $this->Gia . ",
        mon.LoaiMon_id = " . $this->LoaiMon_id . "
        WHERE Mon_id = " . $this->id;
        $this->db->query($sqlQuery);
        if ($this->db->affected_rows > 0) {
            return true;
        }
        return false;
    }
    // DELETE
    function deleteProduct()
    {
        $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE Mon_id = " . $this->id;
        $this->db->query($sqlQuery);
        if ($this->db->affected_rows > 0) {
            return true;
        }
        return false;
    }
}
