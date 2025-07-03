<!DOCTYPE html>
<html>
<head>
    <title>Email from Kazi Resort</title>
</head>
<body>
    <p>Dear Admin,</p>

    <p>A new user has submitted an application for the Kazi Resort Affiliate Program.</p>

    <p>Name: {{ $data["name"] }}</p>
    <p>Contact Number: {{ $data["contact_number"] }}</p>
    @if (isset($data["email"]))
        <p>Email: {{ $data["email"] }}</p>
    @endif
    <p>Occupation: {{ $data["occupation"] }}</p>
    @if (isset($data["yourself"]))
        <p>About the User: {{ $data["yourself"] }}</p>
    @endif
    @if (isset($data["why_affiliate"]))
        <p>Reason for Joining: {{ $data["why_affiliate"] }}</p>
    @endif
    <p>Please review this application and take the necessary action.</p>
    
    <p>Best regards,</p>
    <p>Kazi Resort Team</p>
</body>
</html>
