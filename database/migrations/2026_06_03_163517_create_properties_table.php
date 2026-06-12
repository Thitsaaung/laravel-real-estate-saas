<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id(); // Auto Increment ID
            $table->string('title'); // အိမ်/ခြံ နာမည် (ဥပမာ - Luxury Condo)
            $table->text('description')->nullable(); // အသေးစိတ် အကြောင်းအရာ
            $table->decimal('price', 15,2);     // ဈေးနှုန်း (ဥပမာ - 150000.00)
            $table->string('location'); // တည်နေရာ (ဥပမာ - Bangkok)
            $table->integer('bedrooms')->nullable(); // အိပ်ခန်း အရေအတွက် (အိမ်အတွက်)
            $table->integer('area_sqf')->nullable(); // အကျယ် (စတုရန်းပေ)
            $table->string('type')->nullable(); // အိမ်/ခြံ အမျိုးအစား (ဥပမာ - Condo, Villa, Land)
            $table->timestamps(); // Created at and Updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
