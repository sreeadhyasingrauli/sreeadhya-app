<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 

class Setting extends Model
{
    //
    protected $fillable = ['key', 'value'];

    /**
     * Helper method to quickly get a setting value.
     */
    public static function get(string $key, mixed $default = null): mixed
    {
        $setting = self::where('key', $key)->first();
        return $setting ? $setting->value : $default;
    }

    /**
     * Helper method to quickly set/update a setting value.
     */
    public static function set(string $key, mixed $value): self
    {
        return self::updateOrCreate(['key' => $key], ['value' => $value]);
    }
}
