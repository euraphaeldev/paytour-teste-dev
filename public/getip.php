<?php 
require("./lib/user_info-master/UserInfo.php");
$ip =  UserInfo::get_ip();

var_dump($ip);
?>