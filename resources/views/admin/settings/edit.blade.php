<form method="POST" action="{{ route('settings.update') }}" class="space-y-6">
    @csrf
    @method('PUT')

    <!-- Application Name -->
    <div>
        <label for="app_name">Application Name</label>
        <input type="text" id="app_name" name="app_name" value="{{ old('app_name', $setting->data['app_name'] ?? '') }}" required>
        @error('app_name') <p class="text-red-500">{{ $message }}</p> @enderror
    </div>

    <!-- Support Email -->
    <div>
        <label for="support_email">Support Email</label>
        <input type="email" id="support_email" name="support_email" value="{{ old('support_email', $setting->data['support_email'] ?? '') }}" required>
        @error('support_email') <p class="text-red-500">{{ $message }}</p> @enderror
    </div>

    <!-- Items Per Page -->
    <div>
        <label for="items_per_page">Items Per Page</label>
        <input type="number" id="items_per_page" name="items_per_page" value="{{ old('items_per_page', $setting->data['items_per_page'] ?? 15) }}" required>
        @error('items_per_page') <p class="text-red-500">{{ $message }}</p> @enderror
    </div>

    <!-- Maintenance Mode Toggle -->
    <div>
        <label for="maintenance_mode">Maintenance Mode</label>
        <select id="maintenance_mode" name="maintenance_mode">
            <option value="0" {{ old('maintenance_mode', $setting->data['maintenance_mode'] ?? 0) == 0 ? 'selected' : '' }}>Disabled</option>
            <option value="1" {{ old('maintenance_mode', $setting->data['maintenance_mode'] ?? 0) == 1 ? 'selected' : '' }}>Enabled</option>
        </select>
    </div>

    <button type="submit">Save Settings</button>
</form>
