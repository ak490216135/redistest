<?php
	require('./redis.php');
	// $redis
	$uid = $redis->incr('userid');
	$r = $redis->hmset('user:'.$uid, [ 'uid' => $uid, 'name' => 'futianwen'.rand(10000, 99999), 'age' => rand(10000, 99999) ]);

	var_dump($r);
?>