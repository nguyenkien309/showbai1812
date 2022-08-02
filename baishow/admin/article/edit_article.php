<!DOCTYPE html>
<html lang="en">
  <head>
    <?php require_once(__DIR__ .'/../../lib/autoload.php'); ?>
    <?php require_once "../layout/header.php"; ?>
  </head>
  <?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM article WHERE id=$id ";
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
            move_uploaded_file($file_tmp, '../../public/img/article/' . $file_name);
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
          "title" => $_POST['title'] ? $_POST['title'] : '',
          "avatar" => "public/img/article/".$file_name,
          "author" => $_POST['author'] ? $_POST['author'] : '',
          "created_at" => $_POST['created_at'] ? $_POST['created_at'] : '',
          "content_text" => $_POST['content_text'] ? $_POST['content_text'] : '',
        ];
    if($check){
        $data["avatar"] = "public/img/article/" . $file_name;
    }
    $update = $db->update('article', $data, array('id' => $id));
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
                    <h4 class="card-title">Article</h4>
                    <p class="card-description">Thêm Article</p>
                    <form class="forms-sample" action="" method="POST" enctype="multipart/form-data">
                        <label for="exampleInputName1">Title</label>
                        <input type="text" class="form-control" required id="exampleInputName1" name="title" value="<?php echo $product['title'] ?>" placeholder="Name">


                      <div class="form-group">
                        <img src="<?php echo $base_url . $product['avatar'] ?>" width="100" height="100" alt="">
                        <input type="file" name="file" class="form-control-file">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputPassword4">author</label>
                        <input type="text" class="form-control" required id="exampleInputPassword4" name="author" value="<?php echo $product['author'] ?>" placeholder="Password">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">created_at</label>
                        <input type="date" class="form-control" required id="exampleInputPassword4" name="created_at" value="<?php echo $product['created_at'] ?>" placeholder="Password">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">content_text</label>
                        <input type="text" class="form-control" required id="exampleInputName1" name="content_text" value="<?php echo $product['content_text'] ?>" placeholder="Name">
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