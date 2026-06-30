<form method="POST" action="{{ route('password.update') }}">
    @csrf

    <!-- Current Password -->
    <div>
        <label>Current Password</label>
        <input type="password" name="current_password" required>
        @error('current_password') <span>{{ $message }}</span> @enderror
    </div>

    <!-- New Password -->
    <div>
        <label>New Password</label>
        <input type="password" name="password" required>
        @error('password') <span>{{ $message }}</span> @enderror
    </div>

    <!-- Confirm New Password -->
    <div>
        <label>Confirm New Password</label>
        <input type="password" name="password_confirmation" required>
    </div>

    <button type="submit">Update Password</button>
</form>
