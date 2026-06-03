<body>
    <h1>🏠 Real Estate Properties</h1>
    <p>လက်ရှိ ဒေတာဘေ့စ်ထဲမှ ရရှိနိုင်သော အိမ်ခြံမြေစာရင်းများ</p>

    <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 20px;">
        @foreach($properties as $property)
            <div class="box" style="width: 250px; text-align: left; margin: 0;">
                <h3 style="color: #2b6cb0;">{{ $property->title }}</h3>
                <p><strong>📍 တည်နေရာ:</strong> {{ $property->location }}</p>
                <p><strong>💰 စျေးနှုန်း:</strong> ${{ number_format($property->price, 2) }}</p>
                <p><strong>🏷️ အမျိုးအစား:</strong> {{ $property->type }}</p>
                <p style="font-size: 13px; color: #666;">{{ $property->description }}</p>
            </div>
        @endforeach
    </div>
</body>