<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Premium Properties | DERBY MODE Real Estate</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50 font-sans antialiased text-gray-900">

    <nav class="bg-white shadow-xs border-b border-gray-200 sticky top-0 z-50">
        <div class="max-w-7xl px-4 sm:px-6 lg:px-8 mx-auto">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center space-x-2">
                    <span class="text-2xl font-black tracking-wider text-indigo-600">DERBY<span class="text-gray-900">ESTATE</span></span>
                </div>
                <div>
                    <a href="/properties/create" class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2.5 rounded-xl text-sm font-bold shadow-md shadow-indigo-100 transition-all duration-200 flex items-center space-x-2">
                        <i class="fa fa-plus"></i>
                        <span>Add New Property</span>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl px-4 sm:px-6 lg:px-8 mx-auto py-10">
        @if(session('success'))
            <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-xl flex items-center space-x-2 shadow-xs animate-bounce">
                <i class="fa-solid fa-circle-check text-emerald-500 text-lg"></i>
                <span class="font-semibold text-sm">{{ session('success') }}</span>
            </div>
        @endif
        
        <div class="mb-8">
            <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">Explore Properties</h1>
            <p class="text-gray-500 mt-1">Find the best luxury homes, penthouses, and apartments available.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($properties as $property)
                <div class="bg-white rounded-2xl overflow-hidden shadow-xs border border-gray-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col h-full">
                    
                    <div class="relative h-48 bg-gray-200 overflow-hidden">
                        <img src="{{ $property->image ? asset('storage/' . $property->image) : 'https://images.unsplash.com/photo-1564013799919-ab600027ffc6?auto=format&fit=crop&w=800&q=80' }}" alt="Property Image" class="w-full h-full object-cover">
                        <span class="absolute top-4 left-4 {{ $property->type == 'Sale' ? 'bg-emerald-500' : 'bg-orange-500' }} text-white text-xs font-bold px-3 py-1.5 rounded-lg uppercase tracking-wider">
                            For {{ $property->type ?? 'Sale' }}
                        </span>
                    </div>

                    <div class="p-6 flex-1 flex flex-col justify-between">
                        <div>
                            <div class="flex justify-between items-start mb-2">
                                <h2 class="text-xl font-bold text-gray-900 line-clamp-1 hover:text-indigo-600 transition-colors">
                                    {{ $property->title }}
                                </h2>
                            </div>
                            
                            <p class="text-gray-400 text-sm flex items-center space-x-1 mb-4">
                                <i class="fa-solid fa-location-dot text-indigo-500 text-xs"></i>
                                <span>{{ $property->location }}</span>
                            </p>

                            <div class="flex items-center space-x-4 py-3 border-y border-gray-50 mb-4 text-sm text-gray-600 font-medium">
                                <span class="flex items-center space-x-1.5">
                                    <i class="fa-solid fa-bed text-gray-400"></i>
                                    <span>{{ $property->bedrooms ?? 3 }} Beds</span>
                                </span>
                                <span class="flex items-center space-x-1.5">
                                    <i class="fa-solid fa-ruler-combined text-gray-400"></i>
                                    <span>{{ $property->area_sqft ?? 1200 }} sqft</span>
                                </span>
                            </div>
                        </div>

                        <div>
                            <div class="flex items-baseline justify-between mb-4">
                                <span class="text-2xl font-black text-indigo-600">${{ number_format($property->price) }}</span>
                            </div>

                            <div class="grid grid-cols-2 gap-2 pt-2">
                                <a href="/properties/{{ $property->id }}/edit" class="bg-gray-50 hover:bg-amber-50 hover:text-amber-600 text-gray-600 font-bold py-2.5 rounded-xl text-xs text-center border border-gray-200/60 transition-colors flex items-center justify-center space-x-1">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    <span>Edit Info</span>
                                </a>

                                <form action="/properties/{{ $property->id }}" method="POST" onsubmit="return confirm('သေချာသလား?')" class="w-full">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-full bg-gray-50 hover:bg-red-50 hover:text-red-600 text-gray-500 font-bold py-2.5 rounded-xl text-xs transition-colors flex items-center justify-center space-x-1 border border-gray-200/60">
                                        <i class="fa-solid fa-trash-can"></i>
                                        <span>Delete</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>

    </main>

</body>
</html>