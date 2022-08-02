<?php

use PHPMailer\PHPMailer\PHPMailer;
require_once(__DIR__ .'/../../lib/autoload.php');

if(isset($_POST['ten']) && isset($_POST['email'])){
    // $name = $_POST['name'];
    $name = "LKFRUIT";
    $ten = $_POST['ten'];;
    $email = $_POST['email'];
    $subject = $_POST['address'];

    $body = '<html>
    <head>
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
       <title>Document</title>
    </head>
    <body>
       <div class="container">
          <div class="row">
             <!-- BEGIN INVOICE -->
             <div class="col-xs-12">
                <div class="grid invoice">
                   <div class="grid-body">
                      <div class="invoice-title">
                         <div class="row">
                            <div class="col-xs-12">
                               <img src="https://technext.github.io/frutika/assets/img/logo.png" alt="" height="35">
                            </div>
                         </div>
                         <br><br>
                         <div class="test" style="width: 1300px;height: 200px;justify-content: space-between;display: flex;">
                            <div class="test1" style="width: 300px;height: 200px;">
                             <table border="1" style="text-align: center;width: 700px;">
                                 <tr>
                                   <th style="width: 100px">BILL TO</td>
                                   <th style="width: 300px">SHIP TO</th>
                                   <th style="width: 200px">Email</th>
                                 </tr>
 
                                 <tr>
                                   <td>'.$ten.'</td>
                                   <td>'.$subject.'</td>
                                   <td>'.$email.'</td>
                                 </tr>
 
                               </table>
                            </div>
                            <div class="test2" style="width: 300px;height: 200px;">
 
                            </div>
                         </div>
                         <br><br>
                      </div>
                      <hr>
 
                      <div class="row">
                         <div class="col-md-12">
                         
                            <table class="table table-striped">
                               <thead>
                                  <tr class="line">
                                     <td><strong>ID</strong></td>
                                     <td class="text-center"><strong>Name</strong></td>
                                     <td class="text-center"><strong>Origin</strong></td>
                                     <td class="text-right"><strong>Price</strong></td>
                                     <td class="text-right"><strong>Quantity</strong></td>
                                     <td class="text-right"><strong>Total</strong></td>
                                  </tr>
                               </thead>
                               <tbody>';
        
        
                               for ($i=0; $i < sizeof($_SESSION['cart']); $i++) { 
                                $total += $_SESSION['cart'][$i][3] * $_SESSION['cart'][$i][4];
                                $body .= '<tr>
                                    <td>'.($i+1).'</td>
                                    <td style="width: 200px;"><strong>'.$_SESSION['cart'][$i][1].'</strong><br></td>
                                    <td style="width: 200px;"class="text-center">'.$_SESSION['cart'][$i][2].'</td>
                                    <td style="width: 200px;"class="text-center">$'.$_SESSION['cart'][$i][3].'</td>
                                    <td style="width: 200px;"class="text-right">$'.$_SESSION['cart'][$i][4].'</td>
                                    <td style="width: 200px;"class="text-right">$'.$total.'</td>
                                 </tr>';       
                            }
                            $subtotal += $total + 5;
                            $body .= '<tr>
                            <td colspan="3"></td>
                            <td class="text-right"><strong>Taxes</strong></td>
                            <td class="text-right"><strong>5$</strong></td>
                         </tr>
                         <tr>
                            <td colspan="3">
                            </td>
                            <td class="text-right"><strong>Total</strong></td>
                            <td class="text-right"><strong>$'.$subtotal.'</strong></td>
                         </tr>
                      </tbody>
                      
                   </table>
                </div>
             </div>
          </div>
       </div>
    </div>
    <!-- END INVOICE -->
</div>
<div class="accept" style="width: 100%;align-items: center;text-align: center;"><br><br>
<button style="padding: 5px;margin-right: 50px;background-color: #F28123;color: white;border-color: transparent;">PAY THIS BILL</button>

</div>
</div>
</body>
</html>';


    

    require_once "./PHPMailer/PHPMailer.php";
    require_once "./PHPMailer/SMTP.php";
    require_once "./PHPMailer/Exception.php";

    $mail = new PHPMailer();

    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "kiendzpro21@gmail.com";
    $mail->Password = 'kiendzpro21';
    $mail->Port = 465;
    $mail->SMTPSecure = "ssl";

    //
    $mail->isHTML(true);
    $mail->setFrom($email, $name);
    $mail->addAddress("$email");
    $mail->Subject = ("$email ($subject)");
    $mail->Body = $body;

    if($mail->send()){
      //   $status = "success";
      //   $response = "Email is sent";
      header("location:http://nguyenkien309.xyz/baishow/");
    }
   //  else{
   //      $status = "failed";
   //      $response = "something is wrong <br>" . $mail->ErrorInfo;
   //  }

    exit(json_encode(array("status" => $status, "response" => $response)));

}
?>