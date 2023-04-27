<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="payment.css">
    <title>Payment Page</title>
  </head>
  <body>
    <h1>Payment Page</h1>
    <form>
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" placeholder="Enter your name"><br><br>
      <label for="amount">Amount:</label>
      <input type="text" id="amt" name="amt" placeholder="Enter amt"><br><br>
      <input type="button" name="btn" id="btn" value="Pay Now" onclick="pay_now()"/>
     
    </form>
  </body>


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script src="payment.js"></script>

</html>
