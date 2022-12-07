<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lista;
use App\Models\Nac;
use App\Models\Expertise;
use App\Models\Cultural_right;


class FormController extends Controller
{
    public function getNoc()
    {
        $nacs = Nac::all();
        //return 'aaaa';
        return response()->json($nacs);
    }

    public function getExpertise()
    {
        $expertises = Expertise::all();
        return response()->json($expertises);
    }

    public function getCultural()
    {
        $culturals = Cultural_right::all();
        return response()->json($culturals);
    }

}
