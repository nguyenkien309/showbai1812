<!DOCTYPE html>
<html lang="en">
  <head>
    <?php require_once(__DIR__ .'/../../lib/autoload.php'); ?>
    <?php require_once "../layout/header.php"; ?>
  </head>
    <?php
	    if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // upload file
           
            $data =
                [
                    "username" => $_POST['username'] ? $_POST['username'] : '',
                    "email" => $_POST['email'] ? $_POST['email'] : '',
                    "message" => $_POST['message'] ? $_POST['message'] : '',

                ];
            $insert = $db->insert('comment', $data);
            if ($insert > 0) {
                $_SESSION['error']="Thêm thành công";
                header('Location: ./index.php');
            } else{
                $_SESSION['error']="không thành công";
                header('Location: ./add_comment.php');
            }
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
                    <h4 class="card-title">Tài khoản</h4>
                    <p class="card-description">Thêm tài khoản</p>
                    <form class="forms-sample" method="POST" action="" enctype="multipart/form-data">
                        <label for="exampleInputName1">username</label>
                        <input type="text" class="form-control" name="username" id="exampleInputName1" placeholder="username">
                      
                      <div class="form-group">
                        <label for="exampleInputPassword4">email</label>
                        <input type="text" class="form-control" name="email" id="exampleInputPassword4" placeholder="Password">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">message</label>
                        <input type="text" class="form-control" name="message" id="exampleInputName1" placeholder="Name">
                      </div>
                      <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
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