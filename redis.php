<?php
	header("Content-type: text/html; charset=utf-8");
	session_start();
	$redis = new Redis();
	$redis_connect = $redis->connect('127.0.0.1', 6379);
	if (!$redis_connect) {
		echo 'redis连接失败';
		exit();
	}
	$redis->auth('root');
?>