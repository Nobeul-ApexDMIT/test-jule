<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affiliate Application Approved - Kazi Resort</title>
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
        .highlight {
            background-color: #f9f9f9;
            padding: 10px;
            border: 1px dashed #ccc;
            border-radius: 4px;
            margin-bottom: 15px;
        }
        .highlight strong {
            color: #610C21;
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

            <p>We are delighted to inform you that your application for the Kazi Resort Affiliate Program has been <strong>approved</strong>! Welcome aboard!</p>

            <p>We are excited to partner with you and believe this collaboration will be mutually rewarding.</p>

            <div class="highlight">
                <p>Your unique Affiliate Code is: <strong>{{ $affiliate->affiliate_code }}</strong></p>
                <p>Your personal Affiliate URL is: <strong><a href="{{ url('/book-now?ref=' . $affiliate->affiliate_code) }}">{{ url('/book-now?ref=' . $affiliate->affiliate_code) }}</a></strong></p>
            </div>

            <p>Please use this code and URL to promote Kazi Resort. You will earn commissions on bookings made through your referrals.</p>

            <p><strong>Next Steps:</strong></p>
            <ul>
                <li>You will soon be able to log in to your Affiliate Dashboard using your mobile number and an OTP (One-Time Password). We will notify you once this is active.</li>
                <li>Familiarize yourself with our booking process and offerings to better promote them.</li>
                <li>Start sharing your affiliate link and code with your audience!</li>
            </ul>

            <p>If you have any questions or need promotional materials, please don't hesitate to contact our affiliate support team.</p>

            <p>We look forward to a successful partnership!</p>

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
