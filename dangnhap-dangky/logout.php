<?php
session_start();
unset($_SESSION['dang_ky']);
$message = "Đăng xuất thành công.";
echo "<script type='text/javascript'>alert('$message'); window.location.assign('dangnhap-dangky.php');</script>";

?>