<?php

namespace App\Repositories; 
use App\Models\Lista;
use App\Models\Nac;
use App\Models\Expertise;
use App\Models\Cultural_right;


use Carbon\Carbon;

class ListRepository
{
    private $model;

    function __construct() {
        $this->model = new Lista();
    }

    public function all()
    {
         $listas = $this->model->orderBy('fecha','desc')->paginate(5);
        // $data = [];

        for ($i=0; $i < count($listas) ; $i++) { 
            
           $listas[$i]->nac = $listas[$i]->nac;
           $listas[$i]->cultural = $listas[$i]->cultural_right;
           $listas[$i]->expertise = $listas[$i]->expertise;
           $listas[$i]->start_time = Carbon::create($listas[$i]->start_time)->isoFormat('hh:mm A');
           $listas[$i]->final_hour = Carbon::create($listas[$i]->final_hour)->isoFormat('hh:mm A');
           $listas[$i]->activity_date = Carbon::create($listas[$i]->activity_date)->isoFormat('DD-MM-YYYY');
           
           unset($listas[$i]->cultural_right_id);
           unset($listas[$i]->expertise_id);
           unset($listas[$i]->nac_id);


        }
        return $listas;
    }


    public function save($request)
    {
       //return $request;
       $lista = $this->model;
       $lista->consecutive       = $this->newConsecutive();
       $lista->activity_name     = $request->activity_name;
       $lista->cultural_right_id = $request->cultural_right_id;
       $lista->nac_id            = $request->nac_id;
       $lista->activity_date     = $request->activity_date;
       $lista->start_time        = $request->start_time;
       $lista->final_hour        = $request->final_hour;
       $lista->expertise_id      = $request->expertise_id;
       $lista->fecha             = date("Y-m-d H:i:s");
       
      // return $lista;
       return $lista->save();
    }

    public function show($id)
    {
        $list = $this->model->find($id);
        
        if($list){
            $list->nac = Nac::find($list->nac_id);
            $list->expertise = Expertise::find($list->expertise_id);
            $list->cultural  = Cultural_right::find($list->cultural_right_id);
            $list->start_time = Carbon::create($list->start_time)->isoFormat('hh:mm A');
            $list->final_hour = Carbon::create($list->final_hour)->isoFormat('hh:mm A');

            unset($list->nac_id);
            unset($list->cultural_right_id);
            unset($list->expertise_id);
        }

        
        return $list;
    }

    public function newConsecutive()
    {
        $last_list = $this->model->orderBy('fecha','desc')->first();

        $new_consecutive = 'FP1';

        if($last_list) {
            $consecutive = $last_list->consecutive;

            $array_str = explode('FP',$consecutive);
           // return $array_str;
            $new_consecutive = 'FP'.intval($array_str[1]) + 1;
        }

        return $new_consecutive;
    }

    public function timeFormat($date)
    {

        $date = strtotime($date);
        $newDate = date("Y-m-d H:i:s", $date);

        return $newDate; 
    }
}