<!DOCTYPE html>
<html>
<head>
    <title>Email from Kazi Resort</title>
</head>
<body>
    <p>Dear Concern,</p>

    <p>You have received a new client inquiry. Please reach out to the client as soon as possible using the details below:</p>
    <p><b>Client Information</b></p>
    <p>Name: {{ $data["first_name"] }} {{ $data["last_name"] }}</p>
    <p>Phone: {{ $data["phone"] }}</p>
    @if (isset($data["email"]))
        <p>Email: {{ $data["email"] }}</p>
    @endif
    <p><b>Inquiry Details</b></p>
    <p>Subject: {{ $data["subject"] }}</p>
    <p>Message:</p>
    <p>{{ $data["message"] }}</p>
    <p>Please contact the client at your earliest convenience and assist them with their request.</p>
    <p>Best regards,</p>
    <p>Kazi Resort Team</p>
</body>
</html>
