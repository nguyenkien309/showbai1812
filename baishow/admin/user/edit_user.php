<!DOCTYPE html>
<html lang="en">
  <head>
    <?php require_once(__DIR__ .'/../../lib/autoload.php'); ?>
    <?php require_once "../layout/header.php"; ?>
  </head>
  <?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM user WHERE id=$id ";
    $user = $db->fetchOne($sql);
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
            move_uploaded_file($file_tmp, '../../public/img/user/' . $file_name);
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
             "username" => $_POST['username'] ? $_POST['username'] : '',
            // "password" => md5($_POST['password']),
            "email" => $_POST['email'] ? $_POST['email'] : '',
            "address" => $_POST['address'] ? $_POST['address'] : '',
            "role" => $_POST['role'] ? $_POST['role'] : '',
        ];
    if($check){
        $data["avatar"] = "public/img/user/" . $file_name;
    }
    $update = $db->update('user', $data, array('id' => $id));
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
                        <input type="text" class="form-control" required id="exampleInputName1" name="username" value="<?php echo $user['username'] ?>" placeholder="Name">
                      <div class="form-group">
                        <label for="exampleInputEmail3">password</label>
                        <input type="text" class="form-control" required id="exampleInputEmail3" name="password" value="<?php echo $user['password'] ?>" placeholder="Email">
                      </div>

                      <div class="form-group">
                        <img src="<?php echo $base_url . $user['avatar'] ?>" width="100" height="100" alt="">
                        <input type="file" name="file" class="form-control-file">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputPassword4">email</label>
                        <input type="text" class="form-control" required id="exampleInputPassword4" name="email" value="<?php echo $user['email'] ?>" placeholder="Password">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">address</label>
                        <input type="text" class="form-control" required id="exampleInputPassword4" name="address" value="<?php echo $user['address'] ?>" placeholder="Password">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">role</label>
                        <input type="text" class="form-control" required id="exampleInputName1" name="role" value="<?php echo $user['role'] ?>" placeholder="Name">
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