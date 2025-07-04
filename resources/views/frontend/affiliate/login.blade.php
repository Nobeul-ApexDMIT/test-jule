<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affiliate Login Test</title>
</head>
<body>
    <h1>Affiliate Login Page Test</h1>
    <p>If you see this, the basic view rendering is working.</p>

    @if (session('error'))
      <div style="color: red;">Error: {{ session('error') }}</div>
    @endif
    @if (session('info'))
      <div style="color: blue;">Info: {{ session('info') }}</div>
    @endif
    @if (session('success'))
      <div style="color: green;">Success: {{ session('success') }}</div>
    @endif

    <form action="{{ route('affiliate.login.send_otp') }}" method="POST" style="margin-top: 20px;">
      @csrf
      <div>
        <label for="mobile">Registered Mobile Number *</label><br>
        <input type="text" id="mobile" name="mobile" value="{{ old('mobile') }}" required placeholder="e.g., 01xxxxxxxxx">
        @error('mobile')
          <p style="color: red;">{{ $message }}</p>
        @enderror
      </div>

      <div style="margin-top: 10px;">
        <button type="submit">Send OTP</button>
      </div>
    </form>
    <div style="margin-top: 20px;">
        <p>Don't have an affiliate account? <a href="{{ url('/affiliate-program') }}">Apply Here</a></p>
    </div>
</body>
</html>
