<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nac;
use App\Models\Cultural_right;
use App\Models\Expertise;
use App\Models\Lista;
use App\Repositories\ListRepository;


use Carbon\Carbon;



class ListaController extends Controller
{
    function __construct(ListRepository $listRepository) {
        $this->listRepository = $listRepository;
    
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        $listas = $this->listRepository->all();
       // dd($listas);
        
        return response()->json($listas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) 
    {   

       
        $val = $this->validateHour($request->start_time,$request->final_hour);

        if(!$val){
           return response()->json(["error" => "La hora de inicio es mayor a la hora final."]);        
        }

        $list = $this->listRepository->save($request);

        if($list){
           return response()->json(["error" => null]);        
        }

        return response()->json(["error" => "Ocurrio un error de lado del servidor"]);        

    }

  
    public function show($id)
    {
        $lista = $this->listRepository->show($id);
        return $lista;
    }

    public function getList($id)
    {
        
        $lista = Lista::find($id);
        return $lista;
    }
   
    public function update(Request $request, $id)
    {
        $val = $this->validateHour($request->start,$request->final);

        if(!$val){
           return response()->json(["error" => "La hora de inicio es mayor a la hora final."]);        
        }

        $list = Lista::find($id);
        $list->activity_name     = $request->nombre;
        $list->cultural_right_id = $request->cultural;
        $list->nac_id            = $request->nac;
        $list->activity_date     = $request->fecha;
        $list->start_time        = $request->start;
        $list->final_hour        = $request->final;
        $list->expertise_id      = $request->expertise;

        
        if($list->save()){
            return response()->json(["error" => null]);
        }
        return response()->json(["error" => "Ocurrio un error vuelva a intentarlo."]);        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     
        if(Lista::destroy($id)){
            return response()->json(["error" => null]);
        }
        return response()->json(["error" => "Ocurrio un error vuelva a intentarlo."]);        

    }

    public function validateHour($start, $end)
    {
        
        if(strtotime($start) >= strtotime($end)) return false;
        
        return true;
    }
}
