<!DOCTYPE html>
<html lang="en">
  <head>
    <?php require_once(__DIR__ .'/../../lib/autoload.php'); ?>
    <?php require_once "../layout/header.php"; ?>
  </head>
    <?php
	    if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $data =
                [
                  "user_id" => $_POST['user_id'] ? $_POST['user_id'] : '',
                  "bill_id" => $_POST['bill_id'] ? $_POST['bill_id'] : '',
                  "total" => $_POST['total'] ? $_POST['total'] : '',
                  "address" => $_POST['address'] ? $_POST['address'] : '',
                  "status" => $_POST['status'] ? $_POST['status'] : '',
                ];
            $insert = $db->insert('bill', $data);
            if ($insert > 0) {
                $_SESSION['error']="Thêm thành công";
                header('Location: ./index.php');
            } else{
                $_SESSION['error']="không thành công";
                header('Location: ./add_bill.php');
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
                    <h4 class="card-title">Danh Mục</h4>
                    <p class="card-description">Thêm Danh Mục</p>
                    <form class="forms-sample" method="POST" action="" enctype="multipart/form-data">
                        <label for="exampleInputName1">user_id</label>
                        <input type="text" class="form-control" name="user_id" id="exampleInputName1" placeholder="Name">
                      
                      <div class="form-group">
                        <label for="exampleInputPassword4">bill_id</label>
                        <input type="text" class="form-control" name="bill_id" id="exampleInputPassword4" placeholder="Password">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">total</label>
                        <input type="text" class="form-control" name="total" id="exampleInputPassword4" placeholder="Password">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputPassword4">address</label>
                        <input type="text" class="form-control" name="address" id="exampleInputPassword4" placeholder="Password">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">status</label>
                        <input type="text" class="form-control" name="status" id="exampleInputPassword4" placeholder="Password">
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