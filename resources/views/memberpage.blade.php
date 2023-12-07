@extends('theme.layout')

@section('content')
    <div class="shadow-lg md:w-10/12 mx-auto md:p-2">
        <p class="p-4 text-lg tracking-wider">                        
            Mata, aspek vital manusia, rentan terhadap katarak. Sistem pakar certainty factor diaplikasikan untuk mendiagnosa ketiga jenis katarak (kongenital, juvenil, traumatik). Penelitian ini berhasil mengidentifikasi dengan tingkat keyakinan di atas 85%.
        </p>

        <div class="my-4">
            <p class="p-4 text-lg tracking-wider">
                Selamat datang <span class="font-bold">nama</span>
            </p>
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
            
            <div class="px-4 grid grid-cols-3 gap-4">
                <div>No</div>
                <div>Waktu</div>
                <div>Hasil</div>
            </div>
            <div class="px-4 grid grid-cols-3 gap-4">
                <div>No</div>
                <div>Waktu</div>
                <div>Hasil</div>
            </div>

        </div>
    </div>
@endsection