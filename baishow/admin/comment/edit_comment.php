<!DOCTYPE html>
<html lang="en">
  <head>
    <?php require_once(__DIR__ .'/../../lib/autoload.php'); ?>
    <?php require_once "../layout/header.php"; ?>
  </head>
  <?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM comment WHERE id=$id ";
    $comment = $db->fetchOne($sql);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $data =
        [
          "username" => $_POST['username'] ? $_POST['username'] : '',
          "email" => $_POST['email'] ? $_POST['email'] : '',
          "message" => $_POST['message'] ? $_POST['message'] : '',
        ];
    $update = $db->update('comment', $data, array('id' => $id));
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
                    <h4 class="card-title">Sửa sản phẩm</h4>
                    <!-- <p class="card-description">Thêm sản phẩm</p> -->
                    <form class="forms-sample" action="" method="POST" enctype="multipart/form-data">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" class="form-control" required id="exampleInputName1" name="username" value="<?php echo $comment['username'] ?>" placeholder="Name">

                      <div class="form-group">
                        <label for="exampleInputPassword4">email</label>
                        <input type="text" class="form-control" required id="exampleInputPassword4" name="email" value="<?php echo $comment['email'] ?>" placeholder="Password">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">message</label>
                        <input type="text" class="form-control" required id="exampleInputPassword4" name="message" value="<?php echo $comment['message'] ?>" placeholder="Password">
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