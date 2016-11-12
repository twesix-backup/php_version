<?php
session_start();
$logged_in=false;
if(empty($_COOKIE["username"])||empty($_COOKIE["password"])||empty($_COOKIE["type"])||empty($_COOKIE["id"]))
{
    echo "<h3>请登录</h3>";
}
else
{
    $username=$_COOKIE["username"];
    $password=$_COOKIE["password"];
    $type=$_COOKIE["type"];
    $id=$_COOKIE["id"];
    $logged_in=true;
    echo "<h3>你好，${username}</h3>";
}