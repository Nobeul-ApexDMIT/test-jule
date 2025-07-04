<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You for Applying - Kazi Resort Affiliate Program</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .header {
            background-color: #610C21; /* Kazi Resort Primary Color */
            color: #fff;
            padding: 10px;
            text-align: center;
            border-radius: 5px 5px 0 0;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .content {
            padding: 20px;
        }
        .content p {
            margin-bottom: 15px;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 0.9em;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Kazi Resort Affiliate Program</h1>
        </div>
        <div class="content">
            <p>Dear {{ $affiliate->name }},</p>

            <p>Thank you for your interest in the Kazi Resort Affiliate Program and for submitting your application. We are thrilled to see your enthusiasm for partnering with us!</p>

            <p>Your application has been received and is now under review by our team. We carefully consider each application to ensure a mutually beneficial partnership.</p>

            <p>You can expect to hear from us regarding the status of your application within the next <strong>5-7 business days</strong>. Please keep an eye on your inbox (and spam folder, just in case!).</p>

            <p>In the meantime, feel free to explore more about Kazi Resort on our website: <a href="https://www.kaziresort.com">www.kaziresort.com</a></p>

            <p>We appreciate your patience and look forward to the possibility of collaborating with you.</p>

            <p>Warm regards,</p>
            <p><strong>The Kazi Resort Team</strong></p>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} Kazi Resort. All rights reserved.</p>
            <p>Kazi Resort, Gazipur, Bangladesh</p>
        </div>
    </div>
</body>
</html>
