<?php
    session_start();
    require_once(__DIR__. '/../lib/dbConnect.php');
    $db = new database;
    $base_url = 'http://localhost:8080/showbai1812/baishow/';
?>
<input type="text" style="border-width: 0px;" readonly="readonly" disable value="<?php echo date('m/d/y');?>"/>