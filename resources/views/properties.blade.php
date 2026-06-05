<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sleek Real Estate SaaS</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans min-h-screen">

    <div class="container mx-auto px-4 py-12">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-extrabold text-gray-800 tracking-tight mb-2">🏠 Premium Real Estate Properties</h1>
            <p class="text-gray-600 text-lg">လက်ရှိ ဒေတာဘေ့စ်ထဲမှ ရရှိနိုင်သော အကောင်းဆုံး အိမ်ခြံမြေစာရင်းများ</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($properties as $property)
                <div class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300 border border-gray-150">
                    <div class="p-6">
                        <span class="inline-block px-3 py-1 text-xs font-semibold rounded-full uppercase mb-4 
                            {{ $property->type == 'Sale' ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800' }}">
                            {{ $property->type }}
                        </span>

                        <h3 class="text-xl font-bold text-gray-900 mb-2 truncate">{{ $property->title }}</h3>
                        <p class="text-gray-500 text-sm mb-4 flex items-center">
                            📍 <span class="ml-1 font-medium text-gray-700">{{ $property->location }}:</span>
                            <span class="ml-1 font-medium text-gray-700">Bedrooms- {{ $property->bedrooms }}</span>
                            <div></div>
                            <span class="ml-1 font-medium text-gray-700">Area: {{ $property->area_sqf }} sqf</span>
                        </p>
                        <p class="text-gray-600 text-sm mb-6 line-clamp-3 leading-relaxed">{{ $property->description }}</p>
                        
                        <div class="flex items-center justify-between border-t border-gray-100 pt-4">
                            <span class="text-2xl font-black text-indigo-600">${{ number_format($property->price, 2) }}</span>
                            <button class="bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold px-4 py-2 rounded-xl transition-colors duration-200">
                                <a href="/properties/{{ $property->id}}" class="bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold px-4 py-2 rounded-xl transition-colors duration-200 text-center">View Details</a>
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</body>
</html>