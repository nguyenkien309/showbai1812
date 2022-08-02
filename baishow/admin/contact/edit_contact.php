<!DOCTYPE html>
<html lang="en">
  <head>
    <?php require_once(__DIR__ .'/../../lib/autoload.php'); ?>
    <?php require_once "../layout/header.php"; ?>
  </head>
  <?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM contact WHERE id=$id ";
    $contact = $db->fetchOne($sql);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $data =
        [
          "name" => $_POST['name'] ? $_POST['name'] : '',
          "email" => $_POST['email'] ? $_POST['email'] : '',
        ];
    $update = $db->update('contact', $data, array('id' => $id));
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
                        <input type="text" class="form-control" required id="exampleInputName1" name="name" value="<?php echo $contact['name'] ?>" placeholder="Name">

                      <div class="form-group">
                        <label for="exampleInputPassword4">email</label>
                        <input type="text" class="form-control" required id="exampleInputPassword4" name="email" value="<?php echo $contact['email'] ?>" placeholder="Password">
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