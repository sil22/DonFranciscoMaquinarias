<?php
session_start();
if(!isset($_SESSION["admin"]))
	header("Location:../index.html");
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Automotores Harispuru</title>

<script language="javascript" type="text/javascript" src="js/barra.js"></script>

<link href="estilo.css" rel="stylesheet" type="text/css" />
<script src="js/AC_RunActiveContent.js" type="text/javascript"></script>
<style type="text/css">
<!--
.Estilo20 {font-size: 10px}
.Estilo22 {font-size: 12px}
.margin_top { margin-top:150px;}
-->
</style>
</head>

<body>
<? require("header.php"); ?>

<div align="center" class="barra_nav" ></div>


<blockquote>
  <p>&nbsp;</p>
  <p><br />
  </p>
</blockquote>
</body>
</html>