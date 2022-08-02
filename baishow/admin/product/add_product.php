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
                   move_uploaded_file($file_tmp, '../../public/img/product/'.$file_name);
                   echo "<script>alert('thanh cong')</script>";
                }
                else{
                    echo "<script>alert('ko thanh cong')</script>";
                }
             }
    
            $data =
                [
                    "name" => $_POST['name'] ? $_POST['name'] : '',
                    "category_id" => $_POST['category_id'] ? $_POST['category_id'] : '',
                    "avatar" => "public/img/product/".$file_name,
                    "origin" => $_POST['origin'] ? $_POST['origin'] : '',
                    "price" => $_POST['price'] ? $_POST['price'] : '',
                    "supplier_id" => $_POST['supplier_id'] ? $_POST['supplier_id'] : '',
                    "detail" => $_POST['detail'] ? $_POST['detail'] : '',
                    "sale" => $_POST['sale'] ? $_POST['sale'] : '',
                ];
            $insert = $db->insert('product', $data);
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
                    <h4 class="card-title">sản phẩm</h4>
                    <p class="card-description">Thêm sản phẩm</p>
                    <form class="forms-sample" method="POST" action="" enctype="multipart/form-data">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" class="form-control" name="name" id="exampleInputName1" placeholder="Name">
                      <div class="form-group">
                        <label for="exampleInputEmail3">category_id</label>
                        <input type="text" class="form-control" name="category_id" id="exampleInputEmail3" placeholder="Email">
                      </div>

                      <div class="form-group">
                        <input type="file" required name="file" class="form-control-file">
                      </div>
                      
                      <div class="form-group">
                        <label for="exampleInputPassword4">origin</label>
                        <input type="text" class="form-control" name="origin" id="exampleInputPassword4" placeholder="Password">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">price</label>
                        <input type="text" class="form-control" name="price" id="exampleInputPassword4" placeholder="Password">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">supplier_id</label>
                        <input type="text" class="form-control" name="supplier_id" id="exampleInputName1" placeholder="Name">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">detail</label>
                        <input type="text" class="form-control" name="detail" id="exampleInputPassword4" placeholder="Password">
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