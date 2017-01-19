<?php
	require('./redis.php');
	session_destroy();
	header('location:./');
?>