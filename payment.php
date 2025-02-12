<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
         body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: url('./download\ \(1\).jpg') no-repeat center center/cover;
            color: rgba(178, 204, 238, 0.468);
            line-height: 1.6;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

       

        .payment-section {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .order-summary, .payment-details {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 48%;
            color:#000;
            margin-left:306px ;
        }

        .order-summary h2, .payment-details h2 {
            font-size: 24px;
            margin-bottom: 15px;
        }

        .order-items {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .order-items li {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            padding-bottom: 10px;
            border-bottom: 1px solid #ddd;
        }

        .order-items li:last-child {
            border-bottom: none;
        }

        .total {
            font-weight: bold;
            font-size: 18px;
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
        }

        .payment-methods {
            margin-top: 20px;
        }

        .payment-methods label {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .payment-methods input {
            margin-right: 10px;
        }

        .pay-now {
            background-color:rgb(57, 133, 200);
            color: #fff;
            font-size: 18px;
            padding: 15px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            width: 100%;
            text-align: center;
        }

        .pay-now:hover {
            background-color:rgba(54, 136, 183, 0.76);
        }

        .security {
            margin-top: 10px;
            font-size: 14px;
            color: #6c757d;
            text-align: center;
        }
    </style>
</head>
<body>



<div class="container">
    <div class="payment-section">

        <!-- Order Summary -->
        <div class="order-summary">
            <h2>Order Summary</h2>
            <ul class="order-items">
                
            </div>
        </div>

        <!-- Payment Details -->
        <div class="payment-details">
            <h2>Payment Details</h2>
            <h3>Basic Plan</h3>
      <p>₹99/month</p>
      <ul>
        <li>5 GB Storage</li>
        <li>100 MB max upload size</li>
        <li>Photos, Audio, Videos</li>
        <li>Unlimited memories unlock</li>
        <li>Enhanced security</li>
        <li>Ad-free</li>

            <button class="pay-now">Pay Now</button>
            <div class="security">
                <i class="fas fa-lock"></i> Secure payment with 128-bit encryption
            </div>
        </div>

    </div>
</div>

</body>
</html>
