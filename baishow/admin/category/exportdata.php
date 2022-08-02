
<?php
    require_once(__DIR__ .'/../../lib/autoload.php');
    $con = mysqli_connect('localhost','root','','lkfruit2');

    $output = '';
    if(isset($_POST['export']))
    {

        $sql = "SELECT * FROM `category`";
         

        $res =mysqli_query($con,$sql);
        
        if(mysqli_num_rows($res)>0)
        {
            $output .= '
                <table border="2" id="example">
                <thead>
                    <th style="width:100px;">Tên</th>
                    <th style="width:200px;">Avatar</th>
                    <th style="width:200px;">Tổng</th>
                    <th style="width:200px;">Author</th>
                </thead>
                <tbody>
            ';
            while($data=mysqli_fetch_array($res)){
                $name = $data['name'];
                $avatar = $data['avatar'];
                $price = $data['total'];
                $author_id = $data['author_id'];

            
                $output .='
                    <tr style="height:110px;text-align: center;border-width: 20px;">
                    <td>'.$name.'</td>
                    <td ></br></br><img width="160" height="83" src="http://localhost:8080/NGU/'.$avatar.'"></td>
                    <td>'.$price.'</td>  
                    <td>'.$author_id.'</td>

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