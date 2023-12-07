<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        
        @vite('resources/css/app.css')
    </head>
    <body class="p-2 md:w-10/12 mx-auto">
        <div class="top-0 sticky bg-violet-100 py-8 rounded-lg shadow-lg">
            <h1 class="text-2xl md:text-4xl font-bold text-center">SPK : Pemeriksaan penyakit katarak</h1>
        </div>
        <hr>
        <div class="flex flex-col md:flex-row">
            <img class="md:w-1/4 md:h-1/6 w-1/2 h-1/2 mx-auto shadow-lg m-2 rounded-md md:sticky md:top-1/3" src="{{asset('storage/dokter.jpg')}}" alt="">
            <div>
                @yield('content')
                
                {{-- <div class="no-scrollbar overflow-y-scroll max-h-screen hidden">
                    <form action="{{URL('/periksa')}}" method="GET">
                        @if ($penyakit)
                            @foreach ($penyakit as $key => $sakit)
                                <div class="shadow-lg md:w-10/12 mx-auto p-2 my-4 bg-slate-50 rounded-lg">
                                    <p>{{ "Pertanyaan " . ($key) }}</p>
                                    <p class="text-lg tracking-wider">{{ $sakit['gejala'] }}</p>
                                    <div class="mt-6 gap-4 flex flex-col md:flex-row justify-evenly">
                                        <div class="flex items-center gap-x-3">
                                            <input id="tidak_{{ $key }}" name="gejala_{{ $key }}" type="radio" class="radio-class" value="0">
                                            <label for="tidak_{{ $key }}" class="label-class">Tidak</label>
                                        </div>
                                        <div class="flex items-center gap-x-3">
                                            <input id="mungkin_tidak_{{ $key }}" name="gejala_{{ $key }}" type="radio" class="radio-class" value="0.2">
                                            <label for="mungkin_tidak_{{ $key }}" class="label-class">Kemungkinan Tidak</label>
                                        </div>
                                        <div class="flex items-center gap-x-3">
                                            <input id="tidak_tahu_{{ $key }}" name="gejala_{{ $key }}" type="radio" class="radio-class" value="0.5">
                                            <label for="tidak_tahu_{{ $key }}" class="label-class">Tidak tahu</label>
                                        </div>
                                        <div class="flex items-center gap-x-3">
                                            <input id="mungkin_iya_{{ $key }}" name="gejala_{{ $key }}" type="radio" class="radio-class" value="0.8">
                                            <label for="mungkin_iya_{{ $key }}" class="label-class">Kemungkinan iya</label>
                                        </div>
                                        <div class="flex items-center gap-x-3">
                                            <input id="iya_{{ $key }}" name="gejala_{{ $key }}" type="radio" class="radio-class" value="1">
                                            <label for="iya_{{ $key }}" class="label-class">Iya</label>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        
                        <div class="p-2 flex justify-center">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Submit
                              </button>
                        </div>
                    </form>
                </div> --}}
            </div>
        </div>
    </body>
</html>
