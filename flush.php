<?php
	require('./redis.php');
	$redis->flushdb();
	echo '清空成功';
?>