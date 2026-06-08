<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $property->title }} - Details</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50 font-sans min-h-screen flex flex-col justify-center py-12 px-4 sm:px-6 lg:px-8">

    <div class="max-w-3xl mx-auto bg-white rounded-3xl shadow-lg overflow-hidden border border-gray-100">
        <div class="p-8 sm:p-12">
            <a href="/properties" class="inline-flex items-center text-sm font-semibold text-indigo-600 hover:text-indigo-500 mb-8 transition-colors">
                ← Back to Properties
            </a>

            <div class="mb-4">
                <span class="inline-block px-3 py-1 text-xs font-bold rounded-full uppercase tracking-wider
                    {{ $property->type == 'Sale' ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800' }}">
                    For {{ $property->type }}
                </span>
            </div>
            <h1 class="text-3xl sm:text-4xl font-extrabold text-gray-950 mb-4 leading-tight">{{ $property->title }}</h1>
            
            <p class="text-gray-500 flex items-center mb-6 text-base">
                📍 <span class="ml-2 font-medium text-gray-800">{{ $property->location }}</span>
            </p>

            <div class="grid grid-cols-2 gap-4 border-y border-gray-100 py-6 mb-8 text-center bg-gray-50 rounded-2xl">
                <div class="p-2">
                    <span class="block text-2xl">🛏️</span>
                    <span class="block text-lg font-bold text-gray-800 mt-1">{{ $property->bedrooms ?? 3 }} Bedrooms</span>
                </div>
                <div class="p-2">
                    <span class="block text-2xl">📐</span>
                    <span class="block text-lg font-bold text-gray-800 mt-1">{{ number_format($property->area_sqft ?? 1200) }} Sqft</span>
                </div>
            </div>

            <div class="mb-8">
                <h3 class="text-lg font-bold text-gray-900 mb-3">About this property</h3>
                <p class="text-gray-600 text-base leading-relaxed whitespace-pre-line">{{ $property->description }}</p>
            </div>

            <div class="flex items-center justify-between border-t border-gray-100 pt-8 mt-8">
                <div>
                    <span class="block text-sm text-gray-500 uppercase font-bold tracking-wider">Price</span>
                    <span class="text-3xl font-black text-indigo-600">${{ number_format($property->price, 2) }}</span>
                </div>
                <button class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold px-8 py-3 rounded-2xl transition-all duration-200 shadow-md hover:shadow-lg">
                    Contact Agent
                </button>
            </div>
        </div>

        <div class="mt-4 flex space-x-2">
            <!-- ✏️ Edit ခလုတ် -->
            <a href="/properties/{{ $property->id }}/edit" class="bg-yellow-500 text-white px-3 py-1 rounded-lg text-sm font-semibold">Edit</a>

            <!-- 🗑️ Delete ခလုတ် (Form နဲ့ ပို့ရပါတယ်) -->
            <form action="/properties/{{ $property->id }}" method="POST" onsubmit="return confirm('Are you sure deleting this?')">
            
            @csrf
            @method('DELETE') <!-- Delete Method အဖြစ် ပြောင်းလဲခြင်း -->
                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded-lg text-sm font-semibold">Delete</button>
            </form>
</div>
    </div>

</body>
</html>