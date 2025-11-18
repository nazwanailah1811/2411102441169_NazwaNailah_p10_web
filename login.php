<?php
$username = $_POST['username'];
$password = $_POST['pass'];
if (($username == "nazwa") && ($password == "passnazwa") || 
    ($username == "nailah") && ($password == "passnailah")) {
    echo "Login sukses";
} 
else {
    echo "Login gagal";
}
?>