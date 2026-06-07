<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Property</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50 font-sans min-h-screen py-12 px-4 sm:px-6 lg:px-8">

    <div class="max-w-2xl mx-auto bg-white rounded-3xl shadow-lg p-8 sm:p-12 border border-gray-100">
        
        <a href="/properties" class="inline-flex items-center text-sm font-semibold text-indigo-600 hover:text-indigo-500 mb-6 transition-colors">
            ← Back to Catalog
        </a>

        <h2 class="text-3xl font-extrabold text-gray-950 mb-8 tracking-tight">🏠 Add New Property Listing</h2>

        <form action="/properties" method="POST" class="space-y-6">
            
            @csrf

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Property Title</label>
                <input type="text" name="title" value="{{ old('title') }}" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 text-gray-900" placeholder="e.g., Luxury Penthouse Downtown">

                @error('title')
                    <p class="text-red-500 text-xs font-semibold mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Price ($)</label>
                    <input type="number" name="price" value="{{ old('price') }}" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 text-gray-900" placeholder="e.g., 250000">

                    @error('price')
                        <p class="text-red-500 text-xs font-semibold mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Location (City)</label>
                    <input type="text" name="location" value="{{ old('location') }}" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 text-gray-900" placeholder="e.g., Yangon">

                    @error('location')
                        <p class="text-red-500 text-xs font-semibold mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Bedrooms</label>
                    <input type="number" name="bedrooms" value="{{ old('bedrooms') }}" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 text-gray-900" placeholder="e.g., 3">

                    @error('bedrooms')
                        <p class="text-red-500 text-xs font-semibold mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Area (Sqft)</label>
                    <input type="number" name="area_sqft" value="{{ old('area_sqf') }}" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 text-gray-900" placeholder="e.g., 1500">

                    @error('area_sqf')
                        <p class="text-red-500 text-xs font-semibold mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Listing Type</label>
                    <select name="type" value="{{ old('type') }}" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 text-gray-900 bg-white">
                        <option value="Sale">For Sale</option>
                        <option value="Rent">For Rent</option>
                    </select>

                    @error('type')
                        <p class="text-red-500 text-xs font-semibold mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Description</label>
                <textarea name="description" value="{{ old('description') }}" rows="4" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 text-gray-900" placeholder="Describe the property details here..."></textarea>

                @error('description')
                    <p class="text-red-500 text-xs font-semibold mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="pt-4">
                <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-4 px-6 rounded-xl transition-all duration-200 shadow-md hover:shadow-lg">
                    Publish Property
                </button>
            </div>
        </form>
    </div>

</body>
</html>