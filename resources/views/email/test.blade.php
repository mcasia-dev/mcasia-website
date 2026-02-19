<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Concern</title>
    <style>
        /* Reset and general styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f6fa;
            margin: 0;
            padding: 0;
            color: #333333;
        }

        .container {
            max-width: 600px;
            margin: 30px auto;
            background-color: #ffffff;
            padding: 20px 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header img {
            max-width: 120px;
            height: auto;
            margin-bottom: 10px;
        }

        h1 {
            color: #2d3436;
            font-size: 24px;
            margin: 0;
        }

        .content p {
            font-size: 16px;
            line-height: 1.6;
            margin: 8px 0;
        }

        .label {
            font-weight: bold;
            color: #0984e3;
        }

        .message-box {
            background-color: #f1f2f6;
            padding: 15px;
            border-radius: 6px;
            margin-top: 5px;
        }

        .footer {
            margin-top: 30px;
            font-size: 13px;
            color: #636e72;
            text-align: center;
        }

        @media screen and (max-width: 640px) {
            .container {
                padding: 15px 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">

        <!-- Header with Logo -->
      <div class="header" style="text-align:center; margin-bottom:20px;">
    <img src="https://mcasia.website.mcasiafoodtrade.ph/images/McAsia_Black_Red_Logo.png" 
         alt="Company Logo" 
         style="max-width:150px; height:auto; display:block; margin:0 auto;">
    <h1 style="font-size:22px; margin-top:10px; color:#2d3436;">User Concern</h1>
</div>

        <!-- Content -->
        <div class="content">
            <p><span class="label">Full Name:</span> {{ $data['full_name'] }}</p>
            <p><span class="label">Email:</span> {{ $data['email'] }}</p>
            <p><span class="label">Phone:</span> {{ $data['phone'] }}</p>
            <p><span class="label">Message:</span></p>
            <div class="message-box">
                {{ $data['message'] }}
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            &copy; {{ date('Y') }} McAsia FoodTrade Corporation. All rights reserved.
        </div>
    </div>
</body>
</html>
