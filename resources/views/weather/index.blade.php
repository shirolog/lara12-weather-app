<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>天気アプリ-TOP</title>

    <!-- tailwind css  -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

</head>
<body class="">
    <div class="wrap flex items-center justify-center h-screen bg-gray-300">

        <div class="container mx-auto p-4 w-64 bg-white shadow-lg rounded-md">
            <div>
                 <!-- SVG イラスト -->
                 <img src="{{ asset('images/weather-fine.png') }}" alt="">

            </div>
            <h1 class="text-2xl font-bold mb-4">天気予報-{{ $city->getKanjiName() }}</h1>
            <select name="city" class="mb-4 p-2 border border-gray-300 rounded" id="city-selector">
                @foreach($cities as $c)
                    <option value="{{ $c['english_name'] }}" {{ $c['english_name'] === $city->value ? 'selected': '' }}>{{ $c['kanji_name'] }}</option>
                @endforeach
            </select>
    
            <div>
                <p>時刻: {{ $weatherData['current']['time'] }}</p>
                <p>気温: {{ $weatherData['current']['temperature_2m'] }}°</p>
                <p>風速: {{ $weatherData['current']['wind_speed_10m'] }}m/s</p>
            </div>

            <button type="button" class="bg-blue-500 text-white p-2 rounded" id="modal" onclick="openModal()">詳細を見る</button>

        </div>

        <div id="weatherModal" class="fixed inset-0 hidden bg-black/50">
            <div class="flex items-center justify-center h-screen">
                <div class="bg-gray-100 rounded-lg shadow-lg w-80 max-md:w-96 overflow-y-auto p-4">
                    <div class="flex items-center justify-between border-b pb-2">
    
                        <h2 class="text-xl font-bold">詳細な天気データ</h2>
                        <button type="button" class="text-gray-600 hover:text-gray-800" onclick="closeModal()">&times;</button>

                    </div>
                    <div class="mt-4 overflow-scroll h-52">
                        <ul>
                            @foreach($weatherData['hourly']['time'] as $index => $horlyTime)
                                <li class="border-b py-2">
                                    <span class="font-bold">{{ date('Y-m-d H:i', strtotime($horlyTime)) }} : {{ $weatherData['hourly']['temperature_2m'][$index] }}°</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <button></button>
            </div>
        </div>
    </div>

    <script>
        document.querySelector('#city-selector').addEventListener('change', async(event) => {

            const city = event.target.value;
            // console.log(city);
            window.location.href = `/weather?city=${city}`;
        });

        function openModal() {

            console.log('詳細データ');
            document.querySelector('#weatherModal').classList.remove('hidden');
        }

        function closeModal() {

            console.log('詳細データ');
            document.querySelector('#weatherModal').classList.add('hidden');            
        }
    </script>
</body>
</html>