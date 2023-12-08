<?php

namespace Database\Seeders;

use App\Models\Penyakit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PenyakitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $penyakits = [
            "1" => [
                "nama" => "Katarak Kongenital",
                "gejala" => "Keluarga kandung ada yang mempunyai riwayat katarak",
                "bobot" => 0.4
            ],
            "2" => [
                "nama" => "Katarak Kongenital",
                "gejala" => "Ibu pasien mengalami infeksi selama kehamilan",
                "bobot" => 0.4
            ],
            "3" => [
                "nama" => "Katarak Kongenital",
                "gejala" => "Pernah mengalami reaksi obat",
                "bobot" => 0.4
            ],
            "4" => [
                "nama" => "Katarak Kongenital",
                "gejala" => "Pernah mengalami trauma mata",
                "bobot" => 0.8
            ],
            "5" => [
                "nama" => "Katarak Kongenital",
                "gejala" => "Ada riwayat diabetes",
                "bobot" => 0.4
            ],
            "6" => [
                "nama" => "Katarak Kongenital",
                "gejala" => "Berawan dilensa",
                "bobot" => 0.4
            ],
            "7" => [
                "nama" => "Katarak Kongenital",
                "gejala" => "Gerakan mata yang tidak biasa (Nytagmus)",
                "bobot" => 0.4
            ],
            "8" => [
                "nama" => "Katarak Kongenital",
                "gejala" => "Bola mata bergoyang-goyang atau juling jika dibuka",
                "bobot" => 0.4
            ],
            "9" => [
                "nama" => "Katarak Juvenil",
                "gejala" => "Pandangan Kabur",
                "bobot" => 0.8
            ],
            "10" => [
                "nama" => "Katarak Juvenil",
                "gejala" => "Silau",
                "bobot" => 0.8
            ],
            "11" => [
                "nama" => "Katarak Juvenil",
                "gejala" => "Perubahan daya lihat warna",
                "bobot" => 0.6
            ],
            "12" => [
                "nama" => "Katarak Juvenil",
                "gejala" => "Penurunan ketajaman penglihatan",
                "bobot" => 0.4
            ],
            "13" => [
                "nama" => "Katarak Juvenil",
                "gejala" => "Diplopia monocular (penglihatan ganda pada satu mata)",
                "bobot" => 0.6
            ],
            "14" => [
                "nama" => "Katarak Traumatik",
                "gejala" => "Luka memar pada area mata karena benda tumpul",
                "bobot" => 0.8
            ],
            "15" => [
                "nama" => "Katarak Traumatik",
                "gejala" => "Luka memar pada area mata karena benda tajam",
                "bobot" => 0.6
            ],
            "16" => [
                "nama" => "Katarak Traumatik",
                "gejala" => "Pernah terkena radiasi sinar",
                "bobot" => 0.4
            ],
            "17" => [
                "nama" => "Katarak Traumatik",
                "gejala" => "Pernah terkena zat kimia pada area mata",
                "bobot" => 0.4
            ],
            "18" => [
                "nama" => "Katarak Traumatik",
                "gejala" => "Pernah mengalami sensitivitas kontras saat menonton televisi atau laptop",
                "bobot" => 0.4
            ],
        ];
        foreach ($penyakits as $id => $penyakitData) {
            Penyakit::create([
                'id' => $id,
                'nama' => $penyakitData['nama'],
                'gejala' => $penyakitData['gejala'],
                'bobot' => $penyakitData['bobot'],
            ]);
        }
    }
}
