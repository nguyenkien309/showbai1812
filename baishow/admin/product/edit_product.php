<!DOCTYPE html>
<html lang="en">
  <head>
    <?php require_once(__DIR__ .'/../../lib/autoload.php'); ?>
    <?php require_once "../layout/header.php"; ?>
  </head>
  <?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM product WHERE id=$id ";
    $product = $db->fetchOne($sql);
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
            move_uploaded_file($file_tmp, '../../public/img/product/' . $file_name);
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
            "name" => $_POST['name'] ? $_POST['name'] : '',
            "category_id" => $_POST['category_id'] ? $_POST['category_id'] : '',   
            "origin" => $_POST['origin'] ? $_POST['origin'] : '',
            "price" => $_POST['price'] ? $_POST['price'] : '',
            "supplier_id" => $_POST['supplier_id'] ? $_POST['supplier_id'] : '',
            "detail" => $_POST['detail'] ? $_POST['detail'] : '',
            "sale" => $_POST['sale'] ? $_POST['sale'] : '',
        ];
    if($check){
        $data["avatar"] = "public/img/product/" . $file_name;
    }
    $update = $db->update('product', $data, array('id' => $id));
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
                    <p class="card-description">Thêm sản phẩm</p>
                    <form class="forms-sample" action="" method="POST" enctype="multipart/form-data">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" class="form-control" required id="exampleInputName1" name="name" value="<?php echo $product['name'] ?>" placeholder="Name">
                      <div class="form-group">
                        <label for="exampleInputEmail3">category_id</label>
                        <input type="text" class="form-control" required id="exampleInputEmail3" name="category_id" value="<?php echo $product['category_id'] ?>" placeholder="Email">
                      </div>

                      <div class="form-group">
                        <img src="<?php echo $base_url . $product['avatar'] ?>" width="100" height="100" alt="">
                        <input type="file" name="file" class="form-control-file">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputPassword4">origin</label>
                        <input type="text" class="form-control" required id="exampleInputPassword4" name="origin" value="<?php echo $product['origin'] ?>" placeholder="Password">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">price</label>
                        <input type="text" class="form-control" required id="exampleInputPassword4" name="price" value="<?php echo $product['price'] ?>" placeholder="Password">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">supplier_id</label>
                        <input type="text" class="form-control" required id="exampleInputName1" name="supplier_id" value="<?php echo $product['supplier_id'] ?>" placeholder="Name">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">detail</label>
                        <input type="text" class="form-control" required id="exampleInputPassword4" name="detail" value="<?php echo $product['detail'] ?>" placeholder="Password">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">sale</label>
                        <input type="text" class="form-control" required id="exampleInputName1" name="sale" value="<?php echo $product['sale'] ?>" placeholder="Name">
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