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
               move_uploaded_file($file_tmp, '../../public/img/article/'.$file_name);
               echo "<script>alert('thanh cong')</script>";
            }
            else{
                echo "<script>alert('ko thanh cong')</script>";
            }
         }

        $data =
            [
                "title" => $_POST['title'] ? $_POST['title'] : '',
                "avatar" => "public/img/article/".$file_name,
                "author" => $_POST['author'] ? $_POST['author'] : '',
                "created_at" => $_POST['created_at'] ? $_POST['created_at'] : '',
                "content_text" => $_POST['content_text'] ? $_POST['content_text'] : '',
            ];
        $insert = $db->insert('article', $data);
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
                    <h4 class="card-title">Article</h4>
                    <p class="card-description">Thêm Article</p>
                    <form class="forms-sample" method="POST" action="" enctype="multipart/form-data">
                        <label for="exampleInputName1">title</label>
                        <input type="text" class="form-control" name="title" id="exampleInputName1" placeholder="Name">

                        <br>
                        <div class="form-group">
                          <input type="file" required name="file" class="form-control-file">
                        </div>

                        <div class="form-group">
                          <label for="exampleInputEmail3">author</label>
                          <input type="text" class="form-control" name="author" id="exampleInputEmail3" placeholder="Email">
                        </div>

                      <div class="form-group">
                        <label for="exampleInputPassword4">created_at</label>
                        <input type="date" class="form-control" name="created_at" id="exampleInputPassword4" placeholder="Password">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">content</label>
                        <input type="text" class="form-control" name="content_text" id="exampleInputPassword4" placeholder="Password">
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