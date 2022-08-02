<!DOCTYPE html>
<html lang="en">
  <head>
    <?php require_once(__DIR__ .'/../../lib/autoload.php'); ?>
    <?php require_once "../layout/header.php"; ?>
  </head>
  <?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM bill WHERE id=$id ";
    $bill = $db->fetchOne($sql);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $data =
        [
          "user_id" => $_POST['user_id'] ? $_POST['user_id'] : '',
          "bill_id" => $_POST['bill_id'] ? $_POST['bill_id'] : '',
          "total" => $_POST['total'] ? $_POST['total'] : '',
          "address" => $_POST['address'] ? $_POST['address'] : '',
          "status" => $_POST['status'] ? $_POST['status'] : '',
        ];
    $update = $db->update('bill', $data, array('id' => $id));
    if ($update > 0) {
        $_SESSION['error'] = "sửa thành công";
        header('Location: ./index.php');
    } else
        $_SESSION['error'] = "không thành công";
}
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
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Sửa Bill</h4>
                    <!-- <p class="card-description">Thêm sản phẩm</p> -->
                    <form class="forms-sample" action="" method="POST" enctype="multipart/form-data">
                        <label for="exampleInputName1">user_id</label>
                        <input type="text" class="form-control" required id="exampleInputName1" name="user_id" value="<?php echo $bill['user_id'] ?>" placeholder="Name">

                      <div class="form-group">
                        <label for="exampleInputPassword4">bill_id</label>
                        <input type="text" class="form-control" required id="exampleInputPassword4" name="bill_id" value="<?php echo $bill['bill_id'] ?>" placeholder="Password">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">total</label>
                        <input type="text" class="form-control" required id="exampleInputPassword4" name="total" value="<?php echo $bill['total'] ?>" placeholder="Password">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputPassword4">address</label>
                        <input type="text" class="form-control" required id="exampleInputPassword4" name="address" value="<?php echo $bill['address'] ?>" placeholder="Password">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">status</label>
                        <input type="text" class="form-control" required id="exampleInputPassword4" name="status" value="<?php echo $bill['status'] ?>" placeholder="Password">
                      </div>

                      <input type="submit" class="btn btn-gradient-primary mr-2" name="update" value="Update">
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
    
    <?php require_once "../layout/script.php"; ?>
    
  </body>
</html>