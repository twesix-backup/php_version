<?php
$dbh="mysql.rdso.luocdb.com";
$dbu="twesix";
$dbp="Mm123456";

$conn=new mysqli($dbh,$dbu,$dbp);

if($conn->connect_error)
{
    echo "<h3>数据库连接失败：</h3>".$conn->connect_error;
}
else
{
//    echo "<h3>数据库连接成功</h3>";
}

//test();

function test()
{
    global $conn;

    var_dump($conn);

    $res=$conn->query("select * from weeb.users");

    var_dump($res);
}