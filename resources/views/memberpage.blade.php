@extends('theme.layout')

@section('content')
    <div class="shadow-lg md:w-10/12 mx-auto md:p-2">
        <p class="p-4 text-lg tracking-wider">                        
            Mata, aspek vital manusia, rentan terhadap katarak. Sistem pakar certainty factor diaplikasikan untuk mendiagnosa ketiga jenis katarak (kongenital, juvenil, traumatik). Penelitian ini berhasil mengidentifikasi dengan tingkat keyakinan di atas 85%.
        </p>

        <div class="bg-violet-500 text-white px-4 text-lg rounded-lg shadow-lg tracking-wider">
            @if(session('message'))
                <p>{{ session('message') }}</p>
            @endif
        
            @if(session('data'))
                @foreach(session('data') as $key => $value)
                    <p>{{ $key }}: {{ $value }}</p>
                @endforeach
            @endif
        
            @if(session('error'))
                <p>{{ session('error') }}</p>
            @endif
        </div>


        <div class="my-4">
            @if(auth()->check())
                <p class="p-4 text-lg tracking-wider">
                    Selamat datang <span class="font-bold">{{ auth()->user()->username }}</span>
                </p>
            @else
                <p class="p-4 text-lg tracking-wider">
                    Selamat datang <span class="font-bold">Pengunjung</span>
                </p>
            @endif
            
            <span class="p-4 text-lg tracking-wider italic">Lakukan pemeriksaan ? </span>
            <a href="/periksa" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Periksa</a>
        </div>


        <div class="my-4">
            <p class="p-4 text-lg tracking-wider">Daftar hasil pemeriksaan : </p>

            <div class="px-4 py-2 mb-2 grid grid-cols-3 gap-4 bg-violet-200 rounded-md shadow-lg">
                <div>No</div>
                <div>Waktu</div>
                <div>Hasil</div>
            </div>
            @if(isset($diagnosa) && !$diagnosa->isEmpty())
                @foreach ($diagnosa as $item)
                    <div class="px-4 grid grid-cols-4 gap-4 border-b-2 hover:bg-violet-500 cursor-pointer">
                        <div class="flex items-center">{{$item->id}}</div>
                        <div class="flex items-center">{{$item->created_at}}</div>
                        <div class="col-span-2">
                            <p>kongenital : {{ $item->kongentinal }} %</p>
                            <p>juvenil : {{ $item->juvenil }} %</p>
                            <p>traumatik : {{ $item->traumatik }} %</p>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="px-4 grid grid-cols-3 gap-4">
                    <div>No</div>
                    <div>Waktu</div>
                    <div>Hasil</div>
                </div>
            @endif
            
        </div>

        <div class="p-2 flex justify-start">
            <form action="/logout" method="POST">
                @csrf
                <button type="submit" class="text-base py-2 px-4 border-b-2 hover:border-red-950">
                    💔 logout...
                </button>
            </form>
        </div>
    </div>
@endsection