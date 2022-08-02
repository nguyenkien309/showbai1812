
<?php
    require_once(__DIR__ .'/../../lib/autoload.php');
    $con = mysqli_connect('localhost','root','','lkfruit');

    $output = '';
    if(isset($_POST['export']))
    {

        $sql = "SELECT * FROM `product`";
         

        $res =mysqli_query($con,$sql);
        
        if(mysqli_num_rows($res)>0)
        {
            $output .= '
                <table border="2" id="example">
                <thead>
                    <th style="width:100px;">Tên</th>
                    <th style="width:200px;">Mã Danh Mục</th>
                    <th style="width:200px;">Avatar</th>
                    <th style="width:100px;">Xuất Xứ</th>
                    <th style="width:200px;">Giá</th>
                    <th style="width:200px;">Mã Nhà Cung Cấp</th>
                    <th style="width:200px;">Chi Tiết</th>
                    <th style="width:200px;">Giảm Giá</th>
                </thead>
                <tbody>
            ';
            while($data=mysqli_fetch_array($res)){
                $name = $data['name'];
                $category_id = $data['category_id'];
                $avatar = $data['avatar'];
                $origin  = $data['origin'];
                $price = $data['price'];
                $supplier_id = $data['supplier_id'];
                $detail = $data['detail'];
                $sale = $data['sale'];

            
                $output .='
                    <tr style="height:110px;text-align: center;border-width: 20px;">
                    <td>'.$name.'</td>
                    <td>'.$category_id.'</td>  
                    <td ></br></br><img width="160" height="83" src="http://localhost:8080/NGU/'.$avatar.'"></td>
                    <td>'.$origin.'</td>
                    <td>'.$price.'</td>  
                    <td>'.$supplier_id.'</td>
                    <td>'.$detail.'</td>  
                    <td>'.$sale.'</td>
                    </tr>
                ';
            }
            $output .= '</tbody></table>';
            
            header('Content-type: application/force-download');
            header('Content-Disposition: attachment; filename=ProductData.xls');
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