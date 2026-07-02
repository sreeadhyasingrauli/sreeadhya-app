<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Login</title>
</head>
<body>
    <h2>Laravel 12 Admin Login</h2>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('login.post') }}">
        @csrf {{-- Crucial security mechanism in Laravel --}}
        <div>
            <label>Email:</label>
            <input type="email" name="email" value="{{ old('email') }}" required>
        </div>
        <br>
        <div>
            <label>Password:</label>
            <input type="password" name="password" required>
        </div>
        <br>
        <button type="submit">Login</button>
    </form>
</body>
</html>
