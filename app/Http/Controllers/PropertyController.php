<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = Property::all(); // ဒေတာဘေ့စ်ထဲက properties အားလုံးကို လှမ်းဆွဲလိုက်တာပါ

        return view("properties", compact("properties")); // properties.blade.php ဖိုင်ကို လှမ်းခေါ်ပြီး properties အားလုံးကို ပေးပို့လိုက်တာပါ
    }
}

