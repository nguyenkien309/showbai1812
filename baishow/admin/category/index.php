<!DOCTYPE html>
<html lang="en">
  <head>
    <?php require_once(__DIR__ .'/../../lib/autoload.php'); ?>
    <?php require_once "../layout/header.php"; ?>
  </head>
  <?php
	$sql = "Select * from category";
	$category = $db->fetchAll($sql);  	
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
                    <h4 class="card-title">Danh Mục</h4>
                    <p class="card-description"> Danh Sách</p>
                   
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th> id </th>
                          <th> Tên </th>
                          <th> Avatar </th>
                          <th> Tổng </th>
                          <th> Author </th>
                          <th> Sửa </th>
                          <th> Xóa </th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php foreach($category as $item) : ?>
                        <tr>
                          <td> <?php echo $item['id']?></td>
                          <td> <?php echo $item['name']?> </td>
                          <td><img width="100" height="100" src="<?php echo $base_url.$item['avatar'] ?>" alt=""></td>
                          <td> <?php echo $item['total']?> </td>
                          <td> <?php echo $item['author_id']?> </td>
                          <td> <a href="./edit_category.php?id=<?php echo $item['id']?>"><i class="far fa-edit" style="font-size: 18px;"></a></td>
                          <td> </i><a href="./delete_category.php?id=<?php echo $item['id']?>"><i class="far fa-trash-alt" style="color: red;font-size: 20px;"></i></a></td> 
                        </tr>
                        <?php endforeach ?>
                        <td colspan = 11>
                        <form action="exportdata.php" method="post">
                          <button class="btn btn-success  mb-2" type="submit" name="export"><i class="fas fa-file-excel"></i> Export Excel</button>
                        </form>
                        </td>
                      </tbody>
                    </table>
                      </br>
                      <div class="test">
                        <button class="btn btn-gradient-primary mt-4" type="submit"><a href="./add_category.php" class="card-description" style="color: white;font-weight: bold;">Thêm Danh Mục </a></button>           
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
    <?php require_once "../layout/script.php"; ?>
  </body>
</html>