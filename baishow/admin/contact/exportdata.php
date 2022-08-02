
<?php
    require_once(__DIR__ .'/../../lib/autoload.php');
    $con = mysqli_connect('localhost','root','','lkfruit2');

    $output = '';
    if(isset($_POST['export']))
    {

        $sql = "SELECT * FROM `contact`";
         

        $res =mysqli_query($con,$sql);
        
        if(mysqli_num_rows($res)>0)
        {
            $output .= '
                <table border="2" id="example">
                <thead>
                    <th style="width:100px;">Tên</th>
                    <th style="width:200px;">Email</th>
                    <th style="width:200px;">Avatar</th>
                </thead>
                <tbody>
            ';
            while($data=mysqli_fetch_array($res)){
                $name = $data['name'];
                $category_id = $data['email'];
                $avatar = $data['avatar'];

            
                $output .='
                    <tr style="height:110px;text-align: center;border-width: 20px;">
                    <td>'.$name.'</td>
                    <td>'.$category_id.'</td>  
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