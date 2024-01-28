<?php
include "encdec.php";
if(isset($_POST['submit']))
{
    $KEY=$_POST['key'];
    $MEID=$_POST['merchantid'];
    $INPUT=$_POST['request'];
}

 $encrypted_data = encrypt($INPUT,$KEY);



$new_data = [
  "requestMsg" => $encrypted_data,
  "pgMerchantId" =>$MEID
  ];


  $data_string = json_encode($new_data);
  //print_r("Request to Bank is ======>".$data_string);
  
  $wsUrl = "https://upitest.hdfcbank.com/upi/meTransCollectSvc";
    
    try 
    {		
      $c = curl_init();
      curl_setopt($c, CURLOPT_URL, $wsUrl);
      curl_setopt($c, CURLOPT_POST, 1);
      curl_setopt($c, CURLOPT_POSTFIELDS, $data_string);
      curl_setopt($c, CURLOPT_CONNECTTIMEOUT, 30);
      curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($c, CURLOPT_SSLVERSION, 6); //TLS 1.2 mandatory
      curl_setopt($c, CURLOPT_SSL_VERIFYHOST, 0);
      curl_setopt($c, CURLOPT_SSL_VERIFYPEER, 0);
      $o = curl_exec($c);
      if (curl_errno($c)) {
        $sad = curl_error($c);
        throw new Exception($sad);
      }
        // print_r("Response from Bank is ======>".$o );
      curl_close($c);
         
  
 // print_r("Decrypted Response is ======>".decrypt ($o,$secureKey));
  
    }
    catch (Exception $e){
      return false;	
    }
    
    $decdata = decrypt($o,$KEY)


?>
<!DOCTYPE html>
<html>
<head>
<title>HDFC UPI Simulator</title>
<style>
   /* Styles for the form */
   .form-container {
     width: 400px;
     margin: 0 auto;
   }

   .form-container h2 {
     text-align: center;
     margin-bottom: 20px;
   }

   .form-container label {
     display: block;
     margin-bottom: 10px;
   }

   .form-container input[type="text"],
   .form-container input[type="email"],
   .form-container textarea {
     width: 100%;
     padding: 8px;
     margin-bottom: 15px;
     border: 1px solid #ccc;
     border-radius: 4px;
   }

   .form-container input[type="submit"] {
     background-color: #4CAF50;
     color: white;
     padding: 10px 15px;
     border: none;
     border-radius: 4px;
     cursor: pointer;
   }

   .form-container input[type="submit"]:hover {
     background-color: #45a049;
   }

   /* Styles for the footer */
   .footer {
     background-color: #f9f9f9;
     padding: 10px;
     text-align: center;
   }

   /* Additional styles */
   body {
     font-family: Arial, sans-serif;
     background-color: #f2f2f2;
   }
</style>
</head>
<body>
<div class="form-container">
<h3>Step-2</h3>
<form method="POST" action="status.php">

<label for="message">Encrypted Response:</label>
<textarea id="message" name="encresponse" rows="10" required><?php echo $o; ?></textarea>

<label for="message">Decrypted Response:</label>
<textarea id="message" name="decresponse" rows="10" required><?php echo $decdata; ?></textarea>

<label for="name">KEY:</label>
<input type="text" id="name" name="key" value="<?php echo $KEY; ?>"></input>

<label for="email">Merchant ID:</label>
<input type="text" id="email" name="merchantid" value="<?php echo $MEID; ?>"></input>

<!-- <label for="name">PG API Endpoint:</label>
<input type="text" id="name" name="endpoint" cols="50" value="https://www.tpsl-india.in/PaymentGateway/merchant2.pg/L3348" required> -->

<input type="submit" name="submit" value="Check Status">
</form>
</div>

<div class="footer">
<p>&copy; Developed & Hosted by : Padmajit Mhatre.</p>
<p>&copy; All rights reserved.</p>
</div>
</body>
</html>