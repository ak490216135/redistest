<?php
	require('./redis.php');
	if ($_POST) {
		$email = $_POST['email'];
		$password = md5($_POST['password']);
		$uid = $redis->get('user:'.$email);
		$user = $redis->hgetall('user:'.$uid);
		if( empty($user) ){
			echo '用户名或密码不正确<hr/>';
		}elseif( !(($user['email'] == $email) AND ($user['password'] == $password)) ){
			echo '用户名或密码不正确<hr/>';
		}else{
			// 正确登录
			$_SESSION['uid'] = $user['uid'];
			$_SESSION['email'] = $user['email'];
			$_SESSION['password'] = $user['password'];
			header('location:./');
		}
	}
?>
<?php include('./head.php') ?>
<form action="./login.php" method="post">
	邮箱：<input type="text" name="email"/> <br/>
	密码：<input type="password" name="password"/> <br/>
	<button type="submit">登录</button>
</form>