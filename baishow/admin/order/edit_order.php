<!DOCTYPE html>
<html lang="en">
  <head>
    <?php require_once(__DIR__ .'/../../lib/autoload.php'); ?>
    <?php require_once "../layout/header.php"; ?>
  </head>
  <?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM orders WHERE id=$id ";
    $order = $db->fetchOne($sql);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // upload file
    $check = false;
    if (isset($_FILES['file'])) {
        $errors = array();
        $file_name = $_FILES['file']['name'];
        $file_size = $_FILES['file']['size'];
        $file_tmp = $_FILES['file']['tmp_name'];
        $file_type = $_FILES['file']['type'];
        $file_ext = strtolower(end(explode('.', $_FILES['file']['name'])));
        $expensions = array("jpeg", "jpg", "png");

        if (in_array($file_ext, $expensions) === false) {
            $errors[] = "Không chấp nhận định dạng ảnh có đuôi này, mời bạn chọn JPEG hoặc PNG.";
        }

        if (empty($errors) == true) {
            move_uploaded_file($file_tmp, '../../public/img/order/' . $file_name);
            $check = true;
            echo "<script>alert('thanh cong')</script>";
        } else {
            //echo "<script>alert('ko thanh cong')</script>";
            header("location:./index.php");
        }
    }

    // 


    $data =
        [
          "email" => $_POST['email'] ? $_POST['email'] : '',
          "ten" => $_POST['ten'] ? $_POST['ten'] : '',
          "address" => $_POST['address'] ? $_POST['address'] : '',
          "qty" => $_POST['qty'] ? $_POST['qty'] : '',
          "price" => $_POST['price'] ? $_POST['price'] : '',
          "created_at" => $_POST['created_at'] ? $_POST['created_at'] : '',
          "sale" => $_POST['sale'] ? $_POST['sale'] : '',
        ];
    if($check){
        $data["avatar"] = "public/img/order/" . $file_name;
    }
    $update = $db->update('orders', $data, array('id' => $id));
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
                    <h4 class="card-title">sản phẩm</h4>
                    <p class="card-description">Sửa Đơn Đặt Hàng</p>
                    <form class="forms-sample" action="" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="exampleInputEmail3">Tên Khách Hàng</label>
                        <input type="text" class="form-control" required id="exampleInputEmail3" name="ten" value="<?php echo $order['ten'] ?>" placeholder="Email">
                      </div> 
                        <label for="exampleInputName1">Email</label>
                        <input type="text" class="form-control" required id="exampleInputName1" name="email" value="<?php echo $order['email'] ?>" placeholder="Name">

                      <div class="form-group">
                        <label for="exampleInputPassword4">Địa Chỉ</label>
                        <input type="text" class="form-control" required id="exampleInputPassword4" name="address" value="<?php echo $order['address'] ?>" placeholder="Password">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Số Lượng</label>
                        <input type="text" class="form-control" required id="exampleInputPassword4" name="qty" value="<?php echo $order['qty'] ?>" placeholder="Password">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">price</label>
                        <input type="text" class="form-control" required id="exampleInputPassword4" name="price" value="<?php echo $order['price'] ?>" placeholder="Password">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">created_at</label>
                        <input type="date" class="form-control" required id="exampleInputPassword4" name="created_at" value="<?php echo $product['created_at'] ?>" placeholder="Password">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">sale</label>
                        <input type="text" class="form-control" required id="exampleInputName1" name="sale" value="<?php echo $order['sale'] ?>" placeholder="Name">
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