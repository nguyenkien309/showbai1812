
<?php
    require_once(__DIR__ .'/../../lib/autoload.php');
    $con = mysqli_connect('localhost','root','','lkfruit2');

    $output = '';
    if(isset($_POST['export']))
    {

        $sql = "SELECT * FROM `orders`";
         

        $res =mysqli_query($con,$sql);
        
        if(mysqli_num_rows($res)>0)
        {
            $output .= '
                <table border="2" id="example">
                <thead>
                    <th style="width:100px;">Mã Hóa Đơn</th>
                    <th style="width:200px;">Mã Khách Hàng</th>
                    <th style="width:200px;">Mã Hàng</th>
                    <th style="width:100px;">Số Lượng</th>
                    <th style="width:200px;">Giá</th>
                    <th style="width:200px;">Giá Cũ</th>
                    <th style="width:200px;">Giảm Giá</th>
                </thead>
                <tbody>
            ';
            while($data=mysqli_fetch_array($res)){
                $name = $data['email'];
                $category_id = $data['ten'];
                $avatar = $data['address'];
                $origin  = $data['qty'];
                $price = $data['price'];
                $supplier_id = $data['old_price'];
                $sale = $data['sale'];

            
                $output .='
                    <tr style="height:110px;text-align: center;border-width: 20px;">
                    <td>'.$name.'</td>
                    <td>'.$category_id.'</td>  
                    <td>'.$avatar.'</td>  
                    <td>'.$origin.'</td>
                    <td>'.$price.'</td>  
                    <td>'.$supplier_id.'</td>  
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