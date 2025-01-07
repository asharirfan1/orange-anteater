<?php

use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $keys = [
            'fatoorah_api_key',
        ];

        foreach ($keys as $key) {
            $setting = \App\Models\Setting::where('key', '=', $key)->first();
            if ($setting) {
                continue;
            }
            \App\Models\Setting::Create([
                'key' => $key,
                'value' => '',
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $keys = [
            'fatoorah_api_key',
        ];

        foreach ($keys as $key) {
            $setting = \App\Models\Setting::where('key', '=', $key)->first();
            if (! $setting) {
                continue;
            }
            $setting->delete();
        }
    }
};
