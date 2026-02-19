<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Partnership Submission</title>
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
            max-width: 650px;
            margin: 30px auto;
            background-color: #ffffff;
            padding: 25px 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        }

        .header {
            text-align: center;
            margin-bottom: 25px;
        }

        .header img {
            max-width: 150px;
            height: auto;
            margin-bottom: 10px;
        }

        h1 {
            color: #2d3436;
            font-size: 22px;
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

        .data-box {
            background-color: #f1f2f6;
            padding: 12px 15px;
            border-radius: 6px;
            margin-top: 3px;
        }

        .section {
            margin-bottom: 18px;
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

            h1 {
                font-size: 20px;
            }

            .content p {
                font-size: 15px;
            }
        }
    </style>
</head>
<body>
    <div class="container">

        <!-- Header -->
        <img src="https://mcasia.website.mcasiafoodtrade.ph/images/McAsia_Black_Red_Logo.png"
        alt="Company Logo"
        style="max-width:120px; height:auto; display:block; margin:0 auto;">
            <h1>New Partnership Submission</h1>
        </div>

        <!-- Content -->
        <div class="content">

            <div class="section">
                <p class="label">Full Name</p>
                <div class="data-box">{{ $request['name'] }}</div>
            </div>

            <div class="section">
                <p class="label">Address</p>
                <div class="data-box">
                    {{ $request['blk_no'] }}, {{ $request['street'] }}, {{ $request['barangay'] }}<br>
                    {{ $request['subdivision'] }}<br>
                    {{ $request['country'] }} - {{ $request['zip_code'] }}
                </div>
            </div>

            <div class="section">
                <p class="label">Contact Numbers</p>
                <div class="data-box">
                    Mobile: {{ $request['mobile_number'] }}<br>
                    Landline: {{ $request['landline_number'] }}
                </div>
            </div>

            <div class="section">
                <p class="label">Business Information</p>
                <div class="data-box">
                    Name: {{ $request['business_name'] }}<br>
                    Address: {{ $request['business_address'] }}<br>
                    Number: {{ $request['business_number'] }}<br>
                    Website: {{ $request['business_website'] }}<br>
                    Email: {{ $request['business_email'] }}
                </div>
            </div>

        </div>

        <!-- Footer -->
        <div class="footer">
            &copy; {{ date('Y') }} McAsia FoodTrade Corporation. All rights reserved.
        </div>

    </div>
</body>
</html>
