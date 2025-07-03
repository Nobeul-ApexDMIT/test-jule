<!DOCTYPE html>
<html>
<head>
    <title>Email from Kazi Resort</title>
</head>
<body>
    <p>Dear Concern,</p>

    <p>You have received a new booking request. Please find the details below:</p>
    <p><b>Guest Details:</b></p>
    <p>First Name: {{ $data["first_name"] }}</p>
    @if ($data["last_name"])
        <p>Last Name: {{ $data["last_name"] }}</p>
    @endif
    <p>Address: {{ $data["address"] }}</p>
    @if (isset($data["email"]))
        <p>Email: {{ $data["email"] }}</p>
    @endif
    <p>Mobile: {{ $data["mobile"] }}</p>
    @if (isset($data["phone"]))
        <p>Phone: {{ $data["phone"] }}</p>
    @endif
    <p><b>Booking Details:</b></p>
    <p>Subject: {{ $data["subject"] }}</p>
    <p>Check-In Date: {{ $data['checkin_date'] }}</p>
    <p>Check-Out Date: {{ $data['checkout_date'] }}</p>
    <p>Room/Suite Type: {{ $data['room_type'] }}</p>
    <p>Number of Rooms: {{ $data['no_of_room'] }}</p>
    <p>Number of Adults: {{ $data['no_of_adult'] }}</p>
    @if ($data['no_of_children'])
        <p>Number of Children: {{ $data['no_of_children'] }}</p>
    @endif
    @if ($data['special_requirement'])
        <p>Special Requirements: {{ $data['special_requirement'] }}</p>
    @endif
    <p>Please confirm the booking at your earliest convenience.</p>
    <p>Best regards,</p>
    <p>Kazi Resort Team</p>
</body>
</html>
