<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SettingsController extends Controller
{
    //
    public function edit(): View
    {
        // Fetch all settings keyed by their identifier
        $settings = Setting::pluck('value', 'key')->all();

        return view('settings.edit', compact('settings'));
    }
    public function update(Request $request): RedirectResponse
    {
        // Laravel 12 syntax for strict validation mapping
        $validated = $request->validate([
            'site_name' => ['required', 'string', 'max:255'],
            'site_email' => ['required', 'email', 'max:255'],
            'maintenance_mode' => ['nullable', 'boolean'],
        ]);

        // Default checkbox to false if it's missing from the request
        $validated['maintenance_mode'] = $request->has('maintenance_mode') ? '1' : '0';

        // Loop through validated data and updateOrCreate in database
        foreach ($validated as $key => $value) {
            Setting::set($key, $value);
        }

        return redirect()
            ->route('settings.edit')
            ->with('status', 'settings-updated');
    }
}
