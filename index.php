<?php
require_once 'admin/host/a.php';
$par = array_filter(explode("/",@$_GET["par"]));
if(empty($_SESSION["login"])){
	switch (@$par[0]) {
	case 'register':
	require 'tema/sayfa/register.php';
	break;
	case 'verify':
	require 'tema/sayfa/verify.php';
	break;
	case 'resetpassword':
	require 'tema/sayfa/resetpassword.php';
	break;

	case 'login':
	require 'tema/sayfa/login.php';
	break;
	default:
	require 'tema/sayfa/login.php';
	break;
	}
}else{
	switch (@$par[0]) {
	default:
	require 'tema/index.php';
	break;
	}
}
?>