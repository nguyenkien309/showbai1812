<?php
  require_once(__DIR__ .'/../../lib/autoload.php');
?>

<?php 
  if(isset($_SESSION['login'])){
    $username = $_SESSION['login'];
    // echo $_SESSION['login'];
  }else{
    header("location:./login.php");
  }
?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Purple Admin</title>
    <link rel="stylesheet" href="<?php echo $base_url?>public/site/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?php echo $base_url?>public/site/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="<?php echo $base_url?>public/site/css/style.css">
    <link rel="shortcut icon" href="<?php echo $base_url?>public/site/images/favicon.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous"/>

    <style>
        td {
        text-align: center;}
    
      th {
        text-align: center;}

      .break_text_detail {
        width:200px;
        height:70px;
        border-width: 0px; 
        word-wrap:break-word;}

      .break_text_detail::-webkit-scrollbar {
        display: none;}
    </style>