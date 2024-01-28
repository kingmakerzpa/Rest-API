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
<h3>Step-1</h3>
<form method="POST" action="collect.php">
<label for="name">KEY:</label>
<input type="text" id="name" name="key" required>

<label for="email">Merchant ID:</label>
<input type="text" id="email" name="merchantid" required>

<label for="message">Request Body:</label>
<textarea id="message" name="request" rows="18" required></textarea>

<label>
            <input type="radio" name="option" value="option1"> Option 1
        </label>
        <label>
            <input type="radio" name="option" value="option2"> Option 2
        </label>

<input type="submit" name="submit" value="Send Collect request">
</form>
</div>
<div class="footer">
<p>&copy; Developed & Hosted by : Padmajit Mhatre.</p>
<p>&copy; All rights reserved.</p>
</div>
</body>
</html>