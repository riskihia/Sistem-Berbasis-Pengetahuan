@extends('theme.layout')

@section('content')
    <div class="shadow-lg md:w-10/12 mx-auto md:p-2">
        <p class="p-4 text-lg tracking-wider">                        
            Mata, aspek vital manusia, rentan terhadap katarak. Sistem pakar certainty factor diaplikasikan untuk mendiagnosa ketiga jenis katarak (kongenital, juvenil, traumatik). Penelitian ini berhasil mengidentifikasi dengan tingkat keyakinan di atas 85%.
        </p>

        <div class="my-4">
            <span class="p-4 text-lg tracking-wider italic">
                Anda belum login, Silahkan :
            </span>
            <a href="/login" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Login</a>

            <a href="/register" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Register</a>
        </div>
    </div>
@endsection