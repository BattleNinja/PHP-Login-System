<?php

  $dbServername = "localhost"; // 本地 数据库
  $dbUsername = "root"; // 默认 账户
  $dbPassword = "";  // 默认密码 是空的
  $dbName = "loginsystem"; //需要连接的 数据库 名称

  $conn = mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName);

?>
