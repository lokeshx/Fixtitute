<?php
setcookie('username','', time() + (86400 * 30), "/");setcookie('password','', time() + (86400 * 30), "/");
header("location:test1.html");
?>