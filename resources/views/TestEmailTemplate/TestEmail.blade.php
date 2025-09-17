<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>You’ve Received a Message</title>
    <style>
        /* Reset */
        body, table, td, a {
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }
        table, td {
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }
        img {
            -ms-interpolation-mode: bicubic;
        }

        /* General Styles */
        body {
            margin: 0;
            padding: 0;
            width: 100%;
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .container {
            max-width: 600px;
            margin: 40px auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }

        .header {
            background-color: #0d6efd;
            color: #ffffff;
            padding: 30px 20px;
            text-align: center;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: 600;
        }

        .content {
            padding: 30px 25px;
            color: #212529;
        }

        .content p {
            font-size: 16px;
            line-height: 1.6;
        }

        .message-box {
            background-color: #e9ecef;
            border-left: 4px solid #0d6efd;
            padding: 15px;
            margin: 20px 0;
            border-radius: 5px;
            font-style: italic;
        }

        .btn {
            display: inline-block;
            padding: 12px 20px;
            background-color: #198754;
            color: #ffffff !important;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
            font-size: 16px;
        }

        .footer {
            background-color: #f1f1f1;
            text-align: center;
            padding: 20px;
            font-size: 13px;
            color: #6c757d;
        }

        .footer a {
            color: #0d6efd;
            text-decoration: none;
            margin: 0 5px;
        }

        @media only screen and (max-width: 600px) {
            .container {
                margin: 10px;
                width: 100% !important;
            }

            .header h1 {
                font-size: 20px;
            }

            .content {
                padding: 20px 15px;
            }

            .btn {
                width: 100%;
                display: block;
                text-align: center;
            }
        }
    </style>
</head>
<body>

<table role="presentation" class="container" width="100%" cellpadding="0" cellspacing="0">
    <tr>
        <td class="header">
            <h1>You've Received a New Message</h1>
        </td>
    </tr>
    <tr>
        <td class="content">
            <p>Hello <strong>[Recipient Name]</strong>,</p>
            <p>You've received a new message from our support team. Please find the message below:</p>

            <div class="message-box">
                “Hi Sir,<br>
                {{$msg}}
            </div>

            <p style="margin-top: 30px;">Best regards,<br><strong>Your Company Team</strong></p>
        </td>
    </tr>
    <tr>
        <td class="footer">
            © 2025 Your Company Name. All rights reserved.<br>
            <a href="#">Privacy Policy</a> |
            <a href="#">Unsubscribe</a>
        </td>
    </tr>
</table>

</body>
</html>
