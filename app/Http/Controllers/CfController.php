<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CfController extends Controller
{
    public function index()
    {
        $penyakit = [
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
        
        
        return response()->view("welcome", [
            "penyakit"=>$penyakit
        ]);
    }
    public function hitung(Request $request)
    {
        $request = array_filter($request->query(), function ($nilai) {
            return floatval($nilai) != 0;
        });
        $rule1 = round($this->rule1($request), 2);
        $rule2 = round($this->rule2($request), 2);
        $rule3 = round($this->rule3($request), 2);
        $rule4 = round($this->rule4($request), 2);
        $rule5 = round($this->rule5($request), 2);
        $rule6 = round($this->rule6($request), 2);
        $rule7 = round($this->rule7($request), 2);
        $rule8 = round($this->rule8($request), 2);

        dump([
            "rule 1" => $rule1, 
            "rule 2" => $rule2, 
            "rule 3" => $rule3,
            "rule 4" => $rule4,
            "rule 5" => $rule5,
            "rule 6" => $rule6,
            "rule 7" => $rule7,
            "rule 8" => $rule8
        ]);
        
        // return $this->combineKongentinal($rule1, $rule2, $rule3);
        return $this->combineJuvenil($rule4, $rule5);
    }


    private function combineKongentinal($rule1, $rule2, $rule3)
    {
        $arr_rule = [$rule1, $rule2, $rule3];
        $cf1 = $arr_rule[0];
        $hasil = 0;

        for($x=1; $x < count($arr_rule); $x++){
            $cf2 = $arr_rule[$x];
            $hasil = $cf1 + $cf2 *  (1 - $cf1);
            $cf1 = $hasil;
        }

        return $hasil;
    }
    private function combineJuvenil($rule4, $rule5)
    {
        $arr_rule = [$rule4, $rule5];
        $cf1 = $arr_rule[0];
        $hasil = 0;

        for($x=1; $x < count($arr_rule); $x++){
            $cf2 = $arr_rule[$x];
            $hasil = $cf1 + $cf2 *  (1 - $cf1);
            $cf1 = $hasil;
        }

        return $hasil;
    }

    private function rule8($request)
    {
        // Memeriksa keberadaan gejala_16, gejala_14, gejala_17, dan gejala_10 dalam $request
        if (
            isset($request['gejala_16']) &&
            isset($request['gejala_14']) &&
            isset($request['gejala_17']) &&
            isset($request['gejala_10'])
        ) {
            // Mendapatkan nilai gejala_16, gejala_14, gejala_17, dan gejala_10 dari $request
            $nilai_gejala_16 = floatval($request['gejala_16']);
            $nilai_gejala_14 = floatval($request['gejala_14']);
            $nilai_gejala_17 = floatval($request['gejala_17']);
            $nilai_gejala_10 = floatval($request['gejala_10']);

            // Menghitung nilai minimum dari gejala_16, gejala_14, gejala_17, dan gejala_10, kemudian mengalikan dengan 0.65
            $result = min([$nilai_gejala_16, $nilai_gejala_14, $nilai_gejala_17, $nilai_gejala_10]) * 0.7;

            return $result;
        } else {
            // Jika salah satu atau lebih tidak ada, kembalikan null
            return null;
        }
    }


    private function rule7($request)
    {
        // Memeriksa keberadaan gejala_15, gejala_18, gejala_12, dan gejala_10 dalam $request
        if (
            isset($request['gejala_15']) &&
            isset($request['gejala_18']) &&
            isset($request['gejala_12']) &&
            isset($request['gejala_10'])
        ) {
            // Mendapatkan nilai gejala_15, gejala_18, gejala_12, dan gejala_10 dari $request
            $nilai_gejala_15 = floatval($request['gejala_15']);
            $nilai_gejala_18 = floatval($request['gejala_18']);
            $nilai_gejala_12 = floatval($request['gejala_12']);
            $nilai_gejala_10 = floatval($request['gejala_10']);

            // Menghitung nilai maksimum dari gejala_15, gejala_18, gejala_12, dan gejala_10
            $result = min([$nilai_gejala_15, $nilai_gejala_18, $nilai_gejala_12, $nilai_gejala_10]) * 0.65;

            return $result;
        } else {
            // Jika salah satu atau lebih tidak ada, kembalikan null
            return null;
        }
    }


    private function rule2($request)
    {
        if (isset($request['gejala_7']) && isset($request['gejala_8'])) {

            $nilai_gejala_7 = floatval($request['gejala_7']);
            $nilai_gejala_8 = floatval($request['gejala_8']);

            $result = min([$nilai_gejala_7, $nilai_gejala_8]) * 0.8;

            return $result;
        } else {
            return null;
        }
    }

    private function rule4($request)
    {
        // Memeriksa keberadaan gejala_9, gejala_10, dan gejala_11 dalam $request
        if (isset($request['gejala_9']) && isset($request['gejala_10']) && isset($request['gejala_11'])) {
            // Mendapatkan nilai gejala_9, gejala_10, dan gejala_11 dari $request
            $nilai_gejala_9 = floatval($request['gejala_9']);
            $nilai_gejala_10 = floatval($request['gejala_10']);
            $nilai_gejala_11 = floatval($request['gejala_11']);

            // Menghitung nilai maksimum dari gejala_9, gejala_10, dan gejala_11
            $result = min([$nilai_gejala_9, $nilai_gejala_10, $nilai_gejala_11]) * 0.8;

            return $result;
        } else {
            // Jika salah satu atau lebih tidak ada, kembalikan null
            return null;
        }
    }

    private function rule5($request)
    {
        // Memeriksa keberadaan gejala_12, gejala_13, dan gejala_10 dalam $request
        if (isset($request['gejala_12']) && isset($request['gejala_13']) && isset($request['gejala_10'])) {
            // Mendapatkan nilai gejala_12, gejala_13, dan gejala_10 dari $request
            $nilai_gejala_12 = floatval($request['gejala_12']);
            $nilai_gejala_13 = floatval($request['gejala_13']);
            $nilai_gejala_10 = floatval($request['gejala_10']);

            // Menghitung nilai rata-rata dari gejala_12, gejala_13, dan gejala_10
            $result = min([$nilai_gejala_12 , $nilai_gejala_13 , $nilai_gejala_10]) * 0.65;

            return $result;
        } else {
            // Jika salah satu atau lebih tidak ada, kembalikan null
            return null;
        }
    }

    private function rule1($request)
    {    
        if (isset($request['gejala_1']) && isset($request['gejala_2']) && isset($request['gejala_3']) && isset($request['gejala_4'])) {
            

            $nilai_gejala_1 = floatval($request['gejala_1']);
            $nilai_gejala_2 = floatval($request['gejala_2']);
            $nilai_gejala_3 = floatval($request['gejala_3']);
            $nilai_gejala_4 = floatval($request['gejala_4']);

            $result = min([$nilai_gejala_1 , $nilai_gejala_2, $nilai_gejala_3, $nilai_gejala_4]) * 0.8;

            return $result;
        } else {
            return null;
        }
    }

    private function rule3($request)
    {
        
        if (isset($request['gejala_1']) && isset($request['gejala_3']) && isset($request['gejala_5']) && isset($request['gejala_6'])) {
           
            $nilai_gejala_1 = floatval($request['gejala_1']);
            $nilai_gejala_3 = floatval($request['gejala_3']);
            $nilai_gejala_5 = floatval($request['gejala_5']);
            $nilai_gejala_6 = floatval($request['gejala_6']);

            $result = min([$nilai_gejala_1 , $nilai_gejala_3 , $nilai_gejala_5 , $nilai_gejala_6]) * 0.8;


            return $result;
        } else {
            // Jika salah satu atau lebih tidak ada, kembalikan null
            return null;
        }
    }

    private function rule6($request)
    {
        // Memeriksa keberadaan gejala_14, gejala_15, gejala_16, dan gejala_17 dalam $request
        if (
            isset($request['gejala_14']) &&
            isset($request['gejala_15']) &&
            isset($request['gejala_16']) &&
            isset($request['gejala_17'])
        ) {
            // Mendapatkan nilai gejala_14, gejala_15, gejala_16, dan gejala_17 dari $request
            $nilai_gejala_14 = floatval($request['gejala_14']);
            $nilai_gejala_15 = floatval($request['gejala_15']);
            $nilai_gejala_16 = floatval($request['gejala_16']);
            $nilai_gejala_17 = floatval($request['gejala_17']);

            // Menghitung nilai minimum dari gejala_14, gejala_15, gejala_16, dan gejala_17, kemudian mengalikan dengan 0.65
            $result = min([$nilai_gejala_14, $nilai_gejala_15, $nilai_gejala_16, $nilai_gejala_17]) * 0.8;

            return $result;
        } else {
            // Jika salah satu atau lebih tidak ada, kembalikan null
            return null;
        }
    }


}
