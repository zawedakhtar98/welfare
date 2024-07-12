<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You for contacting BR Islamic Welfare</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 40px rgba(228, 220, 221, 4.6);
            overflow: hidden;
            margin-top: 15px;
        }
        .header {
            /* background-color: #071527; */
            color: #071527;
            padding: 8px;
            text-align: center;
        }
        .content {
            padding: 20px;
        }
        .footer {
            background-color: #f4f4f4;
            color: #777;
            text-align: center;
            padding: 10px;
            font-size: 12px;
        }
        h1{
            font-size: 18px;
            font-family: sans-serif;
        }
        p{
            font-size: 13px;
            font-family: sans-serif;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1 style="margin-top:20px">Thank you for contacting BR Islamic Welfare!</h1>
        </div>
        <div class="content">
            <p>Hi {{$details['name']}},</p>
            <p>Thank you for contacting to BR Islamic Welfare. Our team will contact you soon.</p>
            <p><b>Your Message </b></p>
            <p>{{$details['message']}}</p>
                        
        </div>
        <div class="footer">
            <p style="margin-bottom: 0px; font-size:11px;">&copy; 2024 BR Islamic Welfare. All rights reserved.</p>
            <p style="margin-top: 0px; font-size:11px;">Balthi Rasoolpur, Post Sarfuddinpur, Bochahan Muzaffarpur Bihar-843118.</p>
        </div>
    </div>
</body>
</html>
