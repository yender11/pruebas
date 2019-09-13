<?php

namespace App\Http\Controllers;
use Maatwebsite\Excel\Facades\Excel;
use App\CargaBip;
use Illuminate\Http\Request;

class CargaBipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cargabip.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('file');
        $nombre = $file->getClientOriginalName();




            if($this->iscsv($file)){
                \Storage::disk('local')->put($nombre,  \File::get($file));
                $url = public_path().'/storage/'.$nombre;
               
                $lineas = file($file);
                dd($lineas);
                $num_linea = 0;
                $data = [];
                foreach ($lineas as $linea){
                        if($num_linea!= 0){
                            $datos = explode(';',$linea);
                            
                            $cadena = $datos[count($datos)-1];
                            $datos[count($datos)-1] = preg_replace('"\r\n"', '', $cadena);

                            array_push($data, $datos);
                        
                        }   
                    
                $num_linea ++;
                }
                dd($data);
       
            }
            else{
                return view('cargabip.index');
            }



    }   


    private function iscsv($file){
        $nombre = $file->getClientOriginalName();
        $arr = explode('.',$nombre);

            if($arr[1] == 'csv'){
                return true;
            }
            else{
                return false;
            }

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\CargaBip  $cargaBip
     * @return \Illuminate\Http\Response
     */
    public function show(CargaBip $cargaBip)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CargaBip  $cargaBip
     * @return \Illuminate\Http\Response
     */
    public function edit(CargaBip $cargaBip)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CargaBip  $cargaBip
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CargaBip $cargaBip)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CargaBip  $cargaBip
     * @return \Illuminate\Http\Response
     */
    public function destroy(CargaBip $cargaBip)
    {
        //
    }
}
