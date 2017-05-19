<?php

namespace App\Http\Controllers;
use Session;

use Illuminate\Http\Request;
use App\Servicios;
use App\Http\Requests;
use App\Http\Controllers\Controller;  
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use ValidatesRequests;
use Validator;
use Illuminate\Database\Eloquent\Model;



class ServiciosController extends Controller
{

    public function index()
     {   
$data = DB::table('users')->select('*');
      return \View::make('servicios', Compact('data'));

     }

    public function administracion()
     { 
     $users = DB::SELECT("select * from requisitos  order by folio desc limit 3" );  


      return \View::make('administracion', Compact('users'));
     }

    public function getcapturados(){

                                  $id = Auth::user()->id;
                                  // $users = DB::table('users')->select('*');
                                   $users = DB::SELECT("select * from requisitos where iduser=".$id." order by folio desc limit 3" );
                                   $users=json_encode($users);
                                  $users='{"data": '.$users.'}';
                            return $users;

       

    }

    public function CrearSolicitud(Request $request)
     {
  $id = Auth::user()->id;
      $serv = new Servicios;

       

     


        // OBTENER  INPUTS 
        $Img_Solicitud  = $request->file('Img_Solicitud');
        $AVISO          = $request->file('AVISO');
        $INE_Frontal    = $request->file('INE_Frontal');
        $INE_Reverso    = $request->file('INE_Reverso');
        $CD             = $request->file('CD');

 
       //obtenemos el nombre del archivo
       $namesolicitud = $Img_Solicitud->getClientOriginalName();
       $nameaviso = $AVISO->getClientOriginalName();
       $nameinefrontal = $INE_Frontal->getClientOriginalName();
       $nameinereverso = $INE_Reverso->getClientOriginalName();
       $namecd = $CD->getClientOriginalName();

       //indicamos que queremos guardar un nuevo archivo en el disco local
        \Storage::disk('local')->put($id.'_'.$namesolicitud,  \File::get($Img_Solicitud));
        \Storage::disk('local')->put($id.'_'.$nameaviso,  \File::get($AVISO));
        \Storage::disk('local')->put($id.'_'.$nameinefrontal,  \File::get($INE_Frontal));
        \Storage::disk('local')->put($id.'_'.$nameinereverso,  \File::get($INE_Reverso));
        \Storage::disk('local')->put($id.'_'.$namecd,  \File::get($CD));
        

 


//guardar en la bd

       $f = DB::table('requisitos')->max('folio');
       $respuesta= $request->all();
       $serv->Servicio= $respuesta['Servicio'];
       $serv->Observacion= $respuesta['Observacion'];
       $serv->Contrato= $respuesta['Contrato'];
       $serv->tipolinea= $respuesta['tipolinea'];
       $serv->Paquetes= $respuesta['Paquetes'];
       
       

       $serv->Folio               = $f+1;
       $serv->Estatus             = "PENDIENTE";
       $serv->Img_Solicitud       = $id.'_'.$namesolicitud;
       $serv->AVISO               = $id.'_'.$nameaviso;
       $serv->INE_Frontal         = $id.'_'.$nameinefrontal;
       $serv->INE_Reverso         =$id.'_'.$nameinereverso;
       $serv->CD                  = $id.'_'.$namecd;
       $serv->iduser              = $id;

       $serv->save();







       return redirect('servicios')->with('status', 'HA SIDO CREADO CORRECTAMENTE LA SOLICITUD');






/*





























         $v = Validator::make($v, [
            
            'Servicio'  => 'required',
            'Contrato'  => 'required',
            'tipolinea' => 'required',
            'Paquetes'  => 'required',
            'Img_Solicitud' => 'required',
            'AVISO'     => 'required',
            
            'INE_Reverso' => 'required',
            'INE_Frontal' => 'required'
            
        ]);
 
        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors());
        }


               $folio = DB::SELECT("select max(Folio) from requisitos ");

               dd($folio);
                $one= "1";
                $iduser = Auth::user()->id;
                
               

DB::insert('insert into requisitos (Servicio, folio) values (?, ?)', [$Servicio,  $folio]);

                      return Redirect::to('servicios')->with("FUE REGISTRADO CORRECTAMENTE", "REGISTRADO");
*/
}

}


