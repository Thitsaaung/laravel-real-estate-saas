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

    public function show(Property $property)
    {
        // သတ်မှတ်ထားသော အိမ်ခြံမြေတစ်ခုတည်း၏ အသေးစိတ်ကို ပြသမည့် Function
        // (Route Model Binding စနစ်ကို သုံးထားလို့ ID အလိုက် Data ကို အလိုအလျောက် ရှာပေးပါတယ်)
        return view("property", compact("property")); // property.blade.php ဖိုင်ကို လှမ်းခေါ်ပြီး property တစ်ခုကို ပေးပို့လိုက်တာပါ
    }
}

