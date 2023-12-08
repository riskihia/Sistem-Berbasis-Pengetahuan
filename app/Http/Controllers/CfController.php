<?php

namespace App\Http\Controllers;

use App\Models\Diagnosa;
use App\Models\Penyakit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CfController extends Controller
{
    public function question()
    {
        $penyakit = Penyakit::all();
        return response()->view("questionpage",[
            "penyakit" => $penyakit
        ]);
    }
    public function member()
    {
        $diagnosa = Diagnosa::all();

        return response()->view("memberpage",[
            "diagnosa" => $diagnosa
        ]);
    }
    public function index()
    {
        return response()->view("homepage");
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
        

        $Kongentinal = intval(round($this->combine([$rule1, $rule2, $rule3]),3) * 100);
        $Juvenil = intval(round($this->combine([$rule4, $rule5]),3) * 100);
        $Traumatik = intval(round($this->combine([$rule6, $rule7, $rule8]),3) * 100);

        if($Kongentinal != 0 || $Juvenil != 0 || $Traumatik != 0){
            $user = User::where("id", Auth::user()->id)->first();
            $diagnosa = $user->diagnosas()->create([
                "kongentinal" => $Kongentinal,
                "juvenil" => $Juvenil,
                "traumatik" => $Traumatik,
            ]);

            $responseData = [
                "Kongentinal" => $Kongentinal . " %",
                "Juvenil" => $Juvenil . " %",
                "Traumatik" => $Traumatik . " %",
            ];
            session()->flash('message', 'Penyakit berhasil di periksa');
            session()->flash('data', $responseData);
        }else {
            // Flash an error message
            session()->flash('error', 'Penyakit tidak dapat di periksa');
        }

        return redirect()->route('halamanMember');
    }



    private function combine(array $rules)
    {
        $hasil = $rules[0];

        for ($i = 1; $i < count($rules); $i++) {
            $hasil = $hasil + $rules[$i] * (1 - $hasil);
        }

        return $hasil;
    }


    private function applyRule(array $gejalaIndexes, array $request, $weight = 0.8)
    {
        $gejalaValues = array_map(function ($index) use ($request) {
            return isset($request[$index]) ? floatval($request[$index]) : null;
        }, $gejalaIndexes);

        if (!in_array(null, $gejalaValues, true)) {
            return min($gejalaValues) * $weight;
        }

        return null;
    }

    private function rule1($request)
    {
        return $this->applyRule(['gejala_1', 'gejala_2', 'gejala_3', 'gejala_4'], $request);
    }

    private function rule2($request)
    {
        return $this->applyRule(['gejala_7', 'gejala_8'], $request);
    }

    private function rule3($request)
    {
        return $this->applyRule(['gejala_1', 'gejala_3', 'gejala_5', 'gejala_6'], $request);
    }

    private function rule4($request)
    {
        return $this->applyRule(['gejala_9', 'gejala_10', 'gejala_11'], $request);
    }

    private function rule5($request)
    {
        return $this->applyRule(['gejala_12', 'gejala_13', 'gejala_10'], $request, 0.65);
    }

    private function rule6($request)
    {
        return $this->applyRule(['gejala_14', 'gejala_15', 'gejala_16', 'gejala_17'], $request);
    }

    private function rule7($request)
    {
        return $this->applyRule(['gejala_15', 'gejala_18', 'gejala_12', 'gejala_10'], $request, 0.65);
    }

    private function rule8($request)
    {
        return $this->applyRule(['gejala_16', 'gejala_14', 'gejala_17', 'gejala_10'], $request, 0.7);
    }

}
