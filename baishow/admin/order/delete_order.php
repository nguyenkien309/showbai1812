<?php
require_once(__DIR__ .'/../../lib/autoload.php');
if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $sql = "DELETE FROM orders where id = $id";
    $delete = $db->delete($sql);
    if($delete > 0 ){
      $_SESSION['error'] = "SUCCESS DELETE";
      header("location:./index.php");
    }else{
      $_SESSION['error'] = "SAI";
    }
  }
?>
