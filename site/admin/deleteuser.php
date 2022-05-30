<?php
include_once $_SERVER['DOCUMENT_ROOT']."../core/db.php";
DB::getInstance();
$isAdmin = DB::fetch_array(DB::query("SELECT * FROM `users` WHERE id=".$_COOKIE['id']));
$query = "SELECT * FROM `users` WHERE id=".$_GET['id'];
$res = DB::query($query);
if( ($item = DB::fetch_array($res)) != false) {
    if($isAdmin['type'] == '0') {
        $query = "DELETE FROM `users`
        WHERE id=" . $item['id'];
        $res = DB::query($query);
        header("location: /admin/userlist.php");
    }else{
        $query = "DELETE FROM `users`
        WHERE id=" . $item['id'];
        $res = DB::query($query);
        include_once "../exit.php";
    }
}
//if($item['type'] == '0') {
//    header("location: /admin/userlist.php");
//}else{
//    include_once "../exit.php";
//}