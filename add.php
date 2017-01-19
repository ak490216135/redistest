<?php
	require('./redis.php');
	// $redis
	if ($_POST) {
		// 检测唯一性
		if($redis->sisMember('emaillist', $_POST['email'])){
			// 邮箱名重复
			echo '邮箱名重复!<hr/>';
		}else{
			// 自增主键
			$uid = $redis->incr('userid');
			$email = $_POST['email'];
			$password = md5($_POST['password']);
			// 存储个人数据
			$redis->hmset('user:'.$uid, [ 'uid' => $uid, 'email' => $email, 'password' => $password ]);
			// 存储列表
			$redis->rpush('uid', $uid);
			// 存储用户名唯一性
			$redis->sadd('emaillist', $email);
			// 存储用户名
			$redis->set('user:'.$email, $uid);
			echo '添加成功'.$email.'!<hr/>';
		}
	}
?>
<?php include('./head.php') ?>
<form action="./add.php" method="post">
	邮箱：<input type="text" name="email"/> <br/>
	密码：<input type="password" name="password"/> <br/>
	<button type="submit">添加</button>
</form>