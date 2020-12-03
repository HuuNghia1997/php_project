<?php
$hostname = 'localhost:3306';
$username = 'root';
$password = '';
$dbname = "quanlynhansu";
$conn = mysqli_connect($hostname, $username, $password, $dbname);
$sql = "SELECT DonHang_id,TongTien,NgayDat,NhanVien_id,KhuyenMai_id ,KhachHang_id,TrangThai, TenKhachHang FROM donhang";
$result = mysqli_query($conn, $sql);
$dbdata = array();
if (mysqli_num_rows($result) > 0) {

  // output data of each row
  while ($row = mysqli_fetch_array($result)) {
    $dbdata[$row['DonHang_id']] = array('title' => $row['DonHang_id'], 'TongTien' => $row['TongTien']);

   
    // echo "id: " . $row["DonHang_id"]. " - Name: " . $row["TongTien"]. " " . $row["NgayDat"]. "<br>";
    //tăng $i lên 1
  }
  return json_encode($dbdata);
} else {
  echo "0 results";
}
