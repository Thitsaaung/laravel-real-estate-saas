<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Property | DERBY MODE</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50 font-sans antialiased text-gray-900">

    <!-- 🌐 Navigation Bar -->
    <nav class="bg-white shadow-xs border-b border-gray-200 sticky top-0 z-50">
        <div class="max-w-3xl px-4 mx-auto">
            <div class="flex justify-between h-16 items-center">
                <a href="/properties" class="text-gray-500 hover:text-indigo-600 font-medium flex items-center space-x-2 transition-colors">
                    <i class="fa-solid fa-arrow-left"></i>
                    <span>Back to Properties</span>
                </a>
                <span class="text-xl font-black tracking-wider text-indigo-600">DERBY<span class="text-gray-900">ESTATE</span></span>
            </div>
        </div>
    </nav>

    <!-- 📝 Form Container -->
    <main class="max-w-3xl px-4 mx-auto py-12">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 sm:p-10">
            
            <div class="mb-8">
                <h1 class="text-2xl font-extrabold text-gray-900 tracking-tight">List a New Property</h1>
                <p class="text-gray-500 mt-1">Fill out the form below to add your property to the marketplace.</p>
            </div>

            <!-- Laravel Form -->
            <form action="/properties" method="POST" class="space-y-6">
                @csrf

                <!-- Property Title Input -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Property Title</label>
                    <input type="text" name="title" value="{{ old('title') }}" 
                           class="w-full px-4 py-3 rounded-xl border @error('title') border-red-500 bg-red-50/10 @else border-gray-200 focus:border-indigo-500 @enderror focus:outline-hidden transition-colors text-gray-900" 
                           placeholder="e.g. Luxury Penthouse with Sea View">
                    @error('title')
                        <p class="text-red-500 text-xs mt-1.5 font-medium flex items-center space-x-1">
                            <i class="fa-solid fa-circle-exclamation"></i>
                            <span>{{ $message }}</span>
                        </p>
                    @enderror
                </div>

                <!-- Price & Location Grid (2 Columns) -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <!-- Price Input -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Price ($)</label>
                        <div class="relative rounded-xl shadow-xs">
                            <input type="number" name="price" value="{{ old('price') }}" 
                                   class="w-full px-4 py-3 rounded-xl border @error('price') border-red-500 bg-red-50/10 @else border-gray-200 focus:border-indigo-500 @enderror focus:outline-hidden transition-colors text-gray-900" 
                                   placeholder="500000">
                        </div>
                        @error('price')
                            <p class="text-red-500 text-xs mt-1.5 font-medium flex items-center space-x-1">
                                <i class="fa-solid fa-circle-exclamation"></i>
                                <span>{{ $message }}</span>
                            </p>
                        @enderror
                    </div>

                    <!-- Location Input -->
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Location</label>
                        <input type="text" name="location" value="{{ old('location') }}" 
                               class="w-full px-4 py-3 rounded-xl border @error('location') border-red-500 bg-red-50/10 @else border-gray-200 focus:border-indigo-500 @enderror focus:outline-hidden transition-colors text-gray-900" 
                               placeholder="e.g. Downtown Yangon">
                        @error('location')
                            <p class="text-red-500 text-xs mt-1.5 font-medium flex items-center space-x-1">
                                <i class="fa-solid fa-circle-exclamation"></i>
                                <span>{{ $message }}</span>
                            </p>
                        @enderror
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="pt-4">
                    <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3.5 rounded-xl shadow-md shadow-indigo-100 hover:shadow-lg transition-all duration-200 cursor-pointer">
                        Publish Property
                    </button>
                </div>
            </form>

        </div>
    </main>

</body>
</html>