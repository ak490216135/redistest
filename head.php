<?php

?>
<a href="./">首页</a> | 
<a href="./add.php">添加</a> | 
<a href="./flush.php">清空</a> | 
<?php if(!empty($_SESSION['uid'])){ ?>
欢迎回来 <?=$_SESSION['email']?> |
<a href="./logout.php">登出</a>
<?php }else{ ?>
<a href="./login.php">登录</a>
<?php } ?>
<hr/>