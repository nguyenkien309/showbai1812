<!DOCTYPE html>
<html lang="en">
  <head>
    <?php require_once(__DIR__ .'/../../lib/autoload.php'); ?>
    <?php require_once "../layout/header.php"; ?>
  </head>
  <?php
	$sql = "Select * from bill";
	$bill = $db->fetchAll($sql);  	
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
                    <h4 class="card-title">Hóa Đơn</h4>
                    <p class="card-description"> Danh Sách</p>
                   
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th> ID </th>
                          <th> Mã Khách Hàng </th>
                          <th> Mã Hóa Đơn </th>
                          <th> Tổng </th>
                          <th> Địa Chỉ </th>
                          <th> Trạng Thái </th>
                          <th> Sửa </th>
                          <th> Xóa </th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php foreach($bill as $item) : ?>
                        <tr>
                          <td> <?php echo $item['id']?></td>
                          <td> <?php echo $item['user_id']?> </td>
                          <td> <?php echo $item['bill_id']?> </td>
                          <td> <?php echo $item['total']?> </td>
                          <td> <?php echo $item['address']?> </td>
                          <td> <?php echo $item['status']?> </td>
                          <td> <a href="./edit_bill.php?id=<?php echo $item['id']?>"><i class="far fa-edit" style="font-size: 18px;"></a></td>
                          <td></i><a href="./delete_bill.php?id=<?php echo $item['id']?>"><i class="far fa-trash-alt" style="color: red;font-size: 20px;"></i></a></td> 
                        </tr>
                        <?php endforeach ?>
                      </tbody>
                    </table>
                      </br>
                      <div class="test">
                        <button class="btn btn-gradient-primary mt-4" type="submit"><a href="./add_bill.php" class="card-description" style="color: white;font-weight: bold;">Thêm Hóa Đơn</a></button>           
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
    <?php require_once "../layout/script.php"; ?>
  </body>
</html>