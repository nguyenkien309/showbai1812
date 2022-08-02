<!DOCTYPE html>
<html lang="en"> 
  <head>
    <?php require_once(__DIR__ .'/../../lib/autoload.php'); ?>
    <?php require_once "../layout/header.php"; ?>
  </head> 
    <?php
	    if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // upload file
            if(isset($_FILES['file'])){
                $errors= array();
                $file_name = $_FILES['file']['name'];
                $file_size =$_FILES['file']['size'];
                $file_tmp =$_FILES['file']['tmp_name'];
                $file_type=$_FILES['file']['type'];
                $file_ext=strtolower(end(explode('.',$_FILES['file']['name'])));
                $expensions= array("jpeg","jpg","png");
                
                if(in_array($file_ext,$expensions) === false){
                   $errors[]="Không chấp nhận định dạng ảnh có đuôi này, mời bạn chọn JPEG hoặc PNG.";
                }
                            
                if(empty($errors)==true){
                   move_uploaded_file($file_tmp, '../../public/img/order/'.$file_name);
                   echo "<script>alert('thanh cong')</script>";
                }
                else{
                    echo "<script>alert('ko thanh cong')</script>";
                }
             }
    
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
            $insert = $db->insert('orders', $data);
            if ($insert > 0) {
                $_SESSION['error']="Thêm thành công";
                header('Location: ./index.php');
            } else{
                $_SESSION['error']="không thành công";
                header('Location: ./add_user.php');
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
                    <h4 class="card-title">Đặt Hàng</h4>
                    <p class="card-description">Thêm Đơn Đặt Hàng</p>
                    <form class="forms-sample" method="POST" action="" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="exampleInputEmail3">ten</label>
                        <input type="text" class="form-control" name="ten" id="exampleInputEmail3" placeholder="Email">
                      </div>
                        <label for="exampleInputName1">email</label>
                        <input type="text" class="form-control" name="email" id="exampleInputName1" placeholder="Name">
                      
                      <div class="form-group">
                        <label for="exampleInputPassword4">address</label>
                        <input type="text" class="form-control" name="address" id="exampleInputPassword4" placeholder="Password">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Số Lượng</label>
                        <input type="text" class="form-control" name="qty" id="exampleInputPassword4" placeholder="Password">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Giá</label>
                        <input type="text" class="form-control" name="price" id="exampleInputName1" placeholder="Name">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Ngày Đặt</label>
                        <input type="date" class="form-control" name="created_at" id="exampleInputPassword4" placeholder="created_at">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">sale</label>
                        <input type="text" class="form-control" name="sale" id="exampleInputName1" placeholder="Name">
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