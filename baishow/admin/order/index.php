<!DOCTYPE html>
<html lang="en">
  <head>
    <?php require_once(__DIR__ .'/../../lib/autoload.php'); ?>
    <?php require_once "../layout/header.php"; ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous"/>
  </head>
  <?php
	$sql = "Select * from orders";
	$order = $db->fetchAll($sql);  	
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
                    <div class="test" style="display: inline;">
                      <h4 class="">Đơn Hàng </h4>
                      
                    </div>
                    <p class="card-description"> Danh Sách</p>
                   
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th> ID </th>
                          <th> Tên Khách Hàng </th>
                          <th> Email </th>
                          <th> Địa Chỉ </th>
                          <th> Số Lượng </th>
                          <th> Giá </th>
                          <th> Ngày Đặt </th>
                          <th> Giảm Giá </th>
                          <th> Sửa </th>
                          <th> Xóa </th>
                        </tr> 
                      </thead>
                      <tbody> 
                      <?php foreach($order as $item) : ?>
                        <tr>
                          <td> <?php echo $item['id']?></td>
                          <td> <?php echo $item['ten']?> </td>
                          <td> <?php echo $item['email']?> </td>
                          <td> <?php echo $item['address']?> </td>
                          <td> <?php echo $item['qty']?> </td>
                          <td> <?php echo $item['price']?></td>
                          <td> <?php echo $item['created_at']?> </td>
                          <td> <?php echo $item['sale']?> </td>
                          <td> <a href="./edit_order.php?id=<?php echo $item['id']?>"><i class="far fa-edit" style="font-size: 18px;"></a></td>
                          <td> </i><a href="./delete_order.php?id=<?php echo $item['id']?>"><i class="far fa-trash-alt" style="color: red;font-size: 20px;"></i></a></td> 
                        </tr>
                        <?php endforeach ?>
                        <td colspan = 11>
                        <form action="exportdata.php" method="post">
                          <button class="btn btn-success  mb-2" type="submit" name="export"><i class="fas fa-file-excel"></i> Export Excel</button>
                      </form>
                    </td>
                    
                      </tbody>
                    </table>
                      
                      <div class="test">
                        <button class="btn btn-gradient-primary mt-4" type="submit"><a href="./add_order.php" class="card-description" style="color: white;font-weight: bold;">Thêm Đơn Đặt Hàng</a></button>           
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
    
    <?php require_once "../layout/script.php"; ?>
    
  </body>
</html>