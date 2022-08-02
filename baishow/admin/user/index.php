<!DOCTYPE html>
<html lang="en">
  <head>
    <?php require_once(__DIR__ .'/../../lib/autoload.php'); ?>
    <?php require_once "../layout/header.php"; ?>
  </head>
    <?php
	    $sql = "Select * from user";
	    $user = $db->fetchAll($sql);
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
                    <h4 class="card-title">Khách hàng</h4>
                    <p class="card-description"> Danh Sách</p>
                   
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th> ID<i class="fas fa-file-excel"></i> </th>
                          <th> Tên Đăng Nhập </th>
                          <th> Mật Khẩu </th>
                          <th> Avatar </th>
                          <th> Email </th>
                          <th> Address </th>
                          <th> Role </th>
                          <th> Sửa </th>
                          <th> Xóa </th>

                        </tr>
                      </thead>
                      <tbody>
                      <?php foreach($user as $item) : ?>
                        <tr>
                          <td> <?php echo $item['id']?></td>
                          <td> <?php echo $item['username']?> </td>
                          <td> <?php echo $item['password']?> </td>
                          <td><img width="100" height="100" src="<?php echo $base_url.$item['avatar'] ?>" alt=""></td>
                          <td> <?php echo $item['email']?> </td>
                          <td> <?php echo $item['address']?> </td>
                          <td> <?php echo $item['role']?> </td>
                          <td> <a href="./edit_user.php?id=<?php echo $item['id']?>"><i class="far fa-edit" style="font-size: 18px;"></a></td>
                          <td> </i><a href="./delete_user.php?id=<?php echo $item['id']?>"><i class="far fa-trash-alt" style="color: red;font-size: 20px;"></i></a></td> 
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
                        <button class="btn btn-gradient-primary mt-4" type="submit"><a href="./add_user.php" class="card-description" style="color: white;font-weight: bold;">Thêm Tài Khoản</a></button>           
                      </div>                  
                    </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          <!-- <footer class="footer">
            <div class="container-fluid clearfix">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin templates </a> from Bootstrapdash.com</span>
            </div>
          </footer> -->
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    
    <?php require_once "../layout/script.php"; ?>
    
  </body>
</html>