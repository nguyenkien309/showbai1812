<!DOCTYPE html>
<html lang="en">
  <head>
    <?php require_once(__DIR__ .'/../../lib/autoload.php'); ?>
    <?php require_once "../layout/header.php"; ?>
  </head>
  <?php
	$sql = "Select * from comment";
	$contact = $db->fetchAll($sql);  	
  ?>
  <body>
    <div class="container-scroller">
      <!-- partial:../../partials/_navbar.html -->
    <?php require_once "../layout/nav_bar_header.php"; ?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_sidebar.html -->
    <?php require_once "../layout/nav_bar.php"; ?> 
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Bình Luận</h4>
                    <p class="card-description"> Danh Sách</p>
                   
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th> ID </th>
                          <th> Tên Đăng Nhập </th>
                          <th> Email </th>
                          <th> Mesage </th>
                          <th> Sửa </th>
                          <th> Xóa </th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php foreach($contact as $item) : ?>
                        <tr>
                          <td> <?php echo $item['id']?></td>
                          <td> <?php echo $item['username']?> </td>
                          <td> <?php echo $item['email']?> </td>
                          <td> <?php echo $item['message']?> </td>
                          <td> <a href="./edit_comment.php?id=<?php echo $item['id']?>"><i class="far fa-edit" style="font-size: 18px;"></a></td>
                          <td></i><a href="./delete_comment.php?id=<?php echo $item['id']?>"><i class="far fa-trash-alt" style="color: red;font-size: 20px;"></i></a></td> 
                        </tr>
                        <?php endforeach ?>
                      </tbody>
                    </table>
                      </br>
                    <a href="./add_comment.php" class="card-description">Thêm Bình Luận</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
    <?php require_once "../layout/script.php"; ?>
  </body>
</html>