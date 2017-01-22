<?php
	require('./redis.php');
	// $redis
	if ($_POST) {
		// 获取id
		$uid = $_POST['uid'];
		// 获取修改的密码
		$password = md5($_POST['password']);
		// 更改密码
		$update_password = $redis->hset('user:'.$uid, 'password', $password );
		echo '修改成功!<hr/>';
		$user = $redis->hgetall('user:'.$uid);
	}else{
		$user = $redis->hgetall('user:'.$_GET['uid']);
	}
?>
<?php include('./head.php') ?>
<form action="./update.php" method="post">
	<input type="hidden" name="uid" value="<?=$_GET['uid']?>"/>
	邮箱：<?=$user['email']?> <br/>
	密码：<input type="password" name="password"/> <br/>
	<button type="submit">修改</button>
</form>