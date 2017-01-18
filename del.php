<?php
	require('./redis.php');
	$uid = $_GET['uid'];
	$return = $redis->del('user:'.$uid);
	$redis->lrem('uid', $uid);
	echo $return?'删除成功':'删除失败';
?>