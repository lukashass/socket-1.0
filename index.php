<html>

<head>

    <meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <title>WSocket</title>

	<link href="img/fav.png" rel="shortcut icon">

	<link rel="manifest" href="manifest.json">

	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">

</head>

<body>

<div class="container-fluid">

<?php

include_once("inc/core.php");

if((isset($_COOKIE['WSauth']) && $_COOKIE['WSauth'] == $cookie) || isset($_GET['token']) && $_GET['token'] == $token) {

	include('inc/remote.php');

} else {

	include('inc/login.php');

}

?>

</div>

</body>

</html>
