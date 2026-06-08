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

    // Form စာမျက်နှာကို လှမ်းပြမည့် Functio  n
    public function create() 
    {
        return view("create");
    }

    // Form က တက်လာမယ့် ဒေတာတွေကို ဖမ်းယူပြီး Database ထဲ သိမ်းမည့် Function
    public function store(Request $request)
    {
        // ၁။ ဝင်လာတဲ့ Data တွေကို စည်းကမ်းချက်များနှင့် ကိုက်ညီမှု ရှိမရှိ စစ်ဆေးခြင်း
        $request->validate([
            'title' => 'required|min:5|max:255',
            'price' => 'required|numeric|min:1',
            'location' => 'required|string',
            'bedrooms' => 'required|integer|min:1',
            'areq_sqf' => 'required|integer|min:1',
            'type' => 'required|in:Sale,Rent',
            'description' => 'required|min:10',
        ]);

        // ၁။ Property Model အသစ်တစ်ခု ဆောက်မယ်
        $property = new Property();

        // ၂။ Form Input fields တွေထဲက ဒေတာတွေကို တစ်ခုချင်းစီ ဖမ်းပြီး Database Column တွေထဲ ထည့်မယ်
        $property->title = $request->title;
        $property->price = $request->price;
        $property->location = $request->location;
        $property->bedrooms = $request->bedrooms;
        $property->area_sqf = $request->sqft;
        $property->type = $request->type;
        $property->description = $request->description;

        // ၃။ Database ထဲသို့ အပြီးအပိုင် Save (သိမ်းဆည်း) လိုက်မယ်
        $property->save();
        
        // ၄။ အားလုံးပြီးရင် အိမ်ခြံမြေစာရင်းစာမျက်နှာ (Catalog) ဆီသို့ ပြန်လွှတ် (Redirect) မယ်
        return redirect("/properties");
    }

    public function edit($id)
    {   
        // ၁။ ဒေတာဟောင်းတွေကို Form ထဲထည့်ပြီး ပြသမည့် စာမျက်နှာ (Edit View)
        $property = Property::findOrFail($id);
        return view('edit', compact('property'));
    }

    public function update(Request $request, $id)
    {
        // ဒေတာတွေကို Form Validation အရင်စစ်မယ်
        $request->validate([
            'title' => 'required|min:5|max:255',
            'price' => 'required|numeric|min:1',
            'location' => 'required|string',
        ]);

        $property = Property::findOrFail($id);
        $property->title = $request->title;
        $property->price = $request->price;
        $property->location = $request->location;

        $property->save();  // ရှိပြီးသား Row ထဲမှာပဲ ထပ်ပြီး သိမ်းသွားမှာပါ

        return redirect('/properties');
    }

    public function destroy($id)
    {
        $property = Property::findOrFail($id);
        $property->delete(); // database ထဲကဖျက်ပြီ

        return redirect('/properties');
    }
}

