<?php

use Illuminate\Support\Facades\Route;
use App\Models\Property;
use App\Http\Controllers\PropertyController;

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

Route::get("/properties", [PropertyController::class, "index"]);

Route::get("/properties/create", [PropertyController::class, "create"]);

Route::get("/properties/{property}", [PropertyController::class, "show"]);

Route::post("/properties", [PropertyController::class, "store"]);


