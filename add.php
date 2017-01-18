<?php
	require('./redis.php');
	// $redis
	$uid = $redis->incr('userid');
	$name = 'futianwen'.rand(10000, 99999);
	$age = rand(10000, 99999);
	$return = $redis->hmset('user:'.$uid, [ 'uid' => $uid, 'name' => $name, 'age' => $age ]);
	$redis->rpush('uid', $uid);
	echo $return?'添加成功'.$name.'!':'添加失败';
?>