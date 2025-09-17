<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email Verification Code</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        table {
            border-spacing: 0;
            width: 100%;
        }
        td {
            padding: 0;
        }
        img {
            border: 0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border: 1px solid #dddddd;
            border-radius: 8px;
            overflow: hidden;
        }
        .header {
            background-color: #007bff;
            color: #ffffff;
            text-align: center;
            padding: 20px;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .body {
            padding: 20px;
            color: #333333;
            font-size: 16px;
            line-height: 1.6;
        }
        .code-box {
            background-color: #f1f1f1;
            border-radius: 8px;
            padding: 10px;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            color: #007bff;
            margin: 20px 0;
        }
        .cta {
            text-align: center;
            margin: 20px 0;
        }
        .cta a {
            background-color: #007bff;
            color: #ffffff;
            padding: 10px 20px;
            border-radius: 4px;
            text-decoration: none;
            font-size: 16px;
        }
        .footer {
            background-color: #f1f1f1;
            color: #555555;
            text-align: center;
            padding: 15px;
            font-size: 14px;
        }
        @media screen and (max-width: 600px) {
            .body {
                padding: 15px;
                font-size: 14px;
            }
            .header h1 {
                font-size: 20px;
            }
        }
    </style>
</head>
<body>
<table role="presentation" class="container">
    <!-- Header -->
    <tr>
        <td class="header">
            <h1>Email Verification</h1>
        </td>
    </tr>
    <!-- Body -->
    <tr>
        <td class="body">
            <p>Hello [Customer Name],</p>
            <p>Thank you for registering with us! To complete your registration and verify your email address, please use the following verification code:</p>
            <div class="code-box">
                {{$msg}}
            </div>
            <p>If you didn't request this verification, please ignore this email.</p>
            <p>Once verified, you'll have full access to your account and services.</p>
            <div class="cta">
                <a href="#">{{$subject}}</a>
            </div>
            <p>If you have any questions, feel free to contact our support team.</p>
            <p>Best regards,<br>The [Your Company] Team</p>
        </td>
    </tr>
    <!-- Footer -->
    <tr>
        <td class="footer">
            <p>&copy; 2024 [Your Company]. All rights reserved.</p>
            <p>If you have any questions, feel free to <a href="#">contact us</a>.</p>
        </td>
    </tr>
</table>
</body>
</html>



{{--<!DOCTYPE html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1.0">--}}
{{--    <meta http-equiv="X-UA-Compatible" content="ie=edge">--}}
{{--    <title>ONLINE-SHOPPING</title>--}}
{{--    <style>--}}
{{--        body {--}}
{{--            margin: 0;--}}
{{--            padding: 0;--}}
{{--            background-color: #f8f9fa;--}}
{{--            font-family: Arial, sans-serif;--}}
{{--        }--}}
{{--        table {--}}
{{--            border-spacing: 0;--}}
{{--            width: 100%;--}}
{{--        }--}}
{{--        td {--}}
{{--            padding: 0;--}}
{{--        }--}}
{{--        img {--}}
{{--            border: 0;--}}
{{--        }--}}
{{--        .container {--}}
{{--            max-width: 600px;--}}
{{--            margin: 0 auto;--}}
{{--            background-color: #ffffff;--}}
{{--            border: 1px solid #dddddd;--}}
{{--            border-radius: 8px;--}}
{{--            overflow: hidden;--}}
{{--        }--}}
{{--        .header {--}}
{{--            background-color: #007bff;--}}
{{--            color: #ffffff;--}}
{{--            text-align: center;--}}
{{--            padding: 20px;--}}
{{--        }--}}
{{--        .header h1 {--}}
{{--            margin: 0;--}}
{{--            font-size: 24px;--}}
{{--            letter-spacing: 2px;--}}
{{--        }--}}
{{--        .body {--}}
{{--            padding: 20px;--}}
{{--            color: #333333;--}}
{{--            font-size: 16px;--}}
{{--            line-height: 1.6;--}}
{{--        }--}}
{{--        .body a {--}}
{{--            color: #007bff;--}}
{{--            text-decoration: none;--}}
{{--        }--}}
{{--        .cta {--}}
{{--            text-align: center;--}}
{{--            margin: 20px 0;--}}
{{--        }--}}
{{--        .cta a {--}}
{{--            background-color: #007bff;--}}
{{--            color: #ffffff;--}}
{{--            padding: 10px 20px;--}}
{{--            border-radius: 4px;--}}
{{--            text-decoration: none;--}}
{{--            font-size: 16px;--}}
{{--        }--}}
{{--        .footer {--}}
{{--            background-color: #f1f1f1;--}}
{{--            color: #555555;--}}
{{--            text-align: center;--}}
{{--            padding: 15px;--}}
{{--            font-size: 14px;--}}
{{--        }--}}
{{--        @media screen and (max-width: 600px) {--}}
{{--            .body {--}}
{{--                padding: 15px;--}}
{{--                font-size: 14px;--}}
{{--            }--}}
{{--            .header h1 {--}}
{{--                font-size: 20px;--}}
{{--            }--}}
{{--        }--}}
{{--    </style>--}}
{{--</head>--}}
{{--<body>--}}
{{--<table role="presentation" class="container">--}}
{{--    <!-- Header -->--}}
{{--    <tr>--}}
{{--        <td class="header">--}}
{{--            <h1>ONLINE-SHOPPING</h1>--}}
{{--        </td>--}}
{{--    </tr>--}}
{{--    <!-- Body -->--}}
{{--    <tr>--}}
{{--        <td class="body">--}}
{{--            <p>Hello {{$msg}},</p>--}}
{{--            <p>Thank you for shopping with us! Your order has been successfully placed and is being processed.</p>--}}
{{--            <p>Here are the details of your order:</p>--}}
{{--            <ul>--}}
{{--                <li><strong>Order Number:</strong> #123456</li>--}}
{{--                <li><strong>Order Date:</strong> December 27, 2024</li>--}}
{{--                <li><strong>Total Amount:</strong> $150.00</li>--}}
{{--            </ul>--}}
{{--            <p>To view your order status or make any changes, please click the button below:</p>--}}
{{--            <div class="cta">--}}
{{--                <a href="#">View My Order</a>--}}
{{--            </div>--}}
{{--            <p>Thank you for choosing ONLINE-SHOPPING. We hope you enjoy your purchase!</p>--}}
{{--            <p>Best regards,<br>The ONLINE-SHOPPING Team</p>--}}
{{--        </td>--}}
{{--    </tr>--}}
{{--    <!-- Footer -->--}}
{{--    <tr>--}}
{{--        <td class="footer">--}}
{{--            <p>&copy; 2024 ONLINE-SHOPPING. All rights reserved.</p>--}}
{{--            <p>If you have any questions, feel free to <a href="#">contact us</a>.</p>--}}
{{--        </td>--}}
{{--    </tr>--}}
{{--</table>--}}
{{--</body>--}}
{{--</html>--}}
