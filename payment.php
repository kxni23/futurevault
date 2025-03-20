<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script> <!-- Include Razorpay SDK -->
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

        .payment-details {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 48%;
            color: #000;
            margin-left: 306px;
        }

        .payment-details h2 {
            font-size: 24px;
            margin-bottom: 15px;
        }

        .pay-now {
            background-color: rgb(57, 133, 200);
            color: #fff;
            font-size: 18px;
            padding: 15px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            width: 100%;
            text-align: center;
            margin-top: 15px;
        }

        .pay-now:hover {
            background-color: rgba(54, 136, 183, 0.76);
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
                </ul>

                <button class="pay-now" id="payButton">Pay Now</button>

                <div class="security">
                    <i class="fas fa-lock"></i> Secure payment with 128-bit encryption
                </div>
            </div>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#payButton').click(function() {
                $.ajax({
                    url: 'create_order.php',
                    type: 'POST',
                    dataType: 'json',
                    contentType: 'application/json',
                    data: JSON.stringify({ amount: 9900 }), // Razorpay requires amount in paise
                    success: function(data) {
                        if (data.error) {
                            alert('Error: ' + data.error);
                            return;
                        }

                        var options = {
                            "key": "rzp_test_HtR6S086wRXLnD", // Replace with your Razorpay key
                            "amount": data.amount,
                            "currency": "INR",
                            "name": "Future Vault",
                            "description": "Basic Plan Subscription",
                            "order_id": data.order_id,
                            "handler": function(response) {
                                alert('Payment Successful! Payment ID: ' + response.razorpay_payment_id);
                                
                                $.ajax({
                                    url: 'verify_payment.php',
                                    type: 'POST',
                                    dataType: 'json',
                                    contentType: 'application/json',
                                    data: JSON.stringify(response),
                                    success: function(data) {
                                        alert(data.message);
                                    },
                                    error: function(xhr) {
                                        alert('Error verifying payment: ' + xhr.responseText);
                                    }
                                });
                            },
                            "prefill": {
                                "name": "Kanika",
                                "email": "kanika@example.com",
                                "contact": "9876543210"
                            },
                            "theme": {
                                "color": "#357ABD"
                            }
                        };

                        var rzp1 = new Razorpay(options);
                        rzp1.open();
                    },
                    error: function(xhr) {
                        alert('Error: ' + xhr.responseText);
                    }
                });
            });
        });
    </script>

</body>

</html>
