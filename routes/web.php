<?php

use Illuminate\Support\Facades\Route;
use App\Models\Property;

// About Page အတွက် လမ်းကြောင်း
Route::get('/', function () {
    return view('welcome');
});

// Contact Page အတွက်လမ်းကြောင်း
Route::get('/contact', function () {
    return view("contact");
});

// About Page အတွက်လမ်းကြောင်း
Route::get("/about", function () {
    return view('about');
});

Route::get("/properties", function () {
    // properties.blade.php ဖိုင်ကို လှမ်းခေါ်ခိုင်းလိုက်တာပါ
    // return view("properties");

    $properties = Property::all(); // ဒေတာဘေ့စ်ထဲက properties အားလုံးကို လှမ်းဆွဲလိုက်တာပါ

    return view("properties", compact("properties")); // properties.blade.php ဖိုင်ကို လှမ်းခေါ်ပြီး properties အားလုံးကို ပေးပို့လိုက်တာပါ
});

