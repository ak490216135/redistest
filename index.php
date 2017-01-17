<?php
	require('./redis.php');
	// $redis
	$uid = $redis->get('userid');
	for ($i = 1; $i < $uid ; $i++) { 
		$data[] = $redis->hgetall('user:'.$i);
	}
?>
<a href="./add.php">添加</a>
<hr/>
<?php foreach($data as $value){ ?>
<p>
	<a href="./update?uid=<?= $value['uid']?>">修改</a>
	||
	<span style="width: 30px">
		<?= $value['uid']?>
	</span>
	|
	<?= $value['name']?>
	|
	<?= $value['age']?>
</p>
<?php } ?>