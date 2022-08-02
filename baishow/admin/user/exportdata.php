
<?php
    $con = mysqli_connect('localhost','root','','lkfruit');

    $output = '';
    if(isset($_POST['export']))
    {

        $sql = "SELECT * FROM `user`";
         

        $res =mysqli_query($con,$sql);
        
        if(mysqli_num_rows($res)>0)
        {
            $output .= '
                <table border="2" id="example">
                <thead>
                    <th style="width:100px;">Tên Đăng Nhập</th>
                    <th style="width:200px;">Mật Khẩu</th>
                    <th style="width:200px;">Avatar</th>
                    <th style="width:100px;">Email</th>
                    <th style="width:200px;">Địa Chỉ</th>
                    <th style="width:200px;">Role</th>
                </thead>
                <tbody>
            ';
            while($data=mysqli_fetch_array($res)){
                $name = $data['username'];
                $category_id = $data['password'];
                $avatar = $data['avatar'];
                $origin  = $data['email'];
                $price = $data['address'];
                $supplier_id = $data['role'];

            
                $output .='
                    <tr style="height:110px;text-align: center;border-width: 20px;">
                    <td>'.$name.'</td>
                    <td>'.$category_id.'</td>  
                    <td ></br></br><img width="160" height="83" src="http://localhost:8080/NGU/'.$avatar.'"></td>
                    <td>'.$origin.'</td>
                    <td>'.$price.'</td>  
                    <td>'.$supplier_id.'</td>
                    </tr>
                ';
            }
            $output .= '</tbody></table>';
            
            header('Content-type: application/force-download');
            header('Content-Disposition: attachment; filename=UserData.xls');
            header("Content-Transfer-Encoding: BINARY");
            echo $output;
        }
        else{
            echo '<script type="text/javascript"alert("Record not FOUND! select correct data range");
                window.location.href="index.php";
                </script>
            ';
        }
    }
?>