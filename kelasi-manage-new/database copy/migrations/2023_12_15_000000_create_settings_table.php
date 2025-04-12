<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->string('key')->primary();
            $table->text('value')->nullable();
        });

        // Insert default settings
        \DB::table('settings')->insert([
            ['key' => 'app_name', 'value' => 'Kelasi Manage'],
            ['key' => 'app_locale', 'value' => 'fr'],
            ['key' => 'app_timezone', 'value' => 'Africa/Kinshasa'],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('settings');
    }
};