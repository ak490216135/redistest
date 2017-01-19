<?php
	require('./redis.php');
	// $redis
	$count = $redis->lsize('uid');
	$page = (!empty($_GET['page']))?(int)$_GET['page']:1;
	$num = 10;
	$pages = ceil($count/$num);

	$uids_s = $page * $num - $num;
	$uids_e = ($page * $num) - 1;
	$uids = $redis->lrange('uid', $uids_s, $uids_e);
	foreach ($uids as $key) {
		$return = $redis->hgetall('user:'.$key);
		$data[] = $return;
	}
?>
<?php include('./head.php'); ?>
<?php if(empty($data)){echo '数据为空';}else{ ?>
操作 ||| ID | 邮箱 | 密码
<?php foreach($data as $value){ ?>
<p>
	<a href="./update.php?uid=<?=$value['uid']?>">修改</a>
	|
	<a href="./del.php?uid=<?=$value['uid']?>">删除</a>
	<?php if( !empty($_SESSION['uid']) AND ($_SESSION['uid'] != $value['uid']) ){?>
	|
	<a href="./focus.php?uid=<?=$_SESSION['uid']?>&fid=<?=$value['uid']?>">关注</a>
	<?php } ?>
	|||
	<span>
		<?=$value['uid']?>
	</span>
	|
	<?=$value['email']?>
	|
	<?=$value['password']?>
</p>
<?php } ?>
<hr/>
<a href="./index.php?page=1">首页</a>
<?php for($i = 1;$i <= $pages; $i++){ ?>
<a href="./index.php?page=<?=$i?>"><?=$i?></a>
<?php } ?>
<a href="./index.php?page=<?=$pages?>">尾页</a>
<?php } ?>