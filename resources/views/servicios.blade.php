@extends('layouts.dashboard')
@section('page_heading','SIU')
@section('section')
 <div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">

<h4>Subir Información</h4>
@if(Session::has('flash_message'))
{{Session::get('flash_message')}}
@endif
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
@if (count($errors) > 0)
    <div id="errores", class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
   
    </div>
@endif


{!! Form::open(array(  'url' => 'crear', 'method' => 'POST', 'data-toggle'=>'validator' , 'files' => true ), array('role' => 'form')) !!}

  <div class="panel panel-primary">
        <div class="panel-heading">
                <h3 class="panel-title">Datos Generales</h3>
        </div>
   <div class="container-fluid">
        <div class="row">
            <div class="col-sm-9">
                    <h4></h4>
            </div>
        </div>


         <div  class="form-group col-md-3">
              
                 {!!Form::label('Servicio', 'Servicio', null)!!}
                 {!!Form::select('Servicio',
                  array(
                        'Doble Play'=>'Doble Play',
                        'Activacion'=>'Activacion',
                        'Upsel'=>'Upsel',
                        'Dish'=>'Dish'),null,['id'=>'Servicio','class'=>'form-control '])!!}
                                

                     @if(isset($errors))
                          {{$errors->first('Servicio')}}
                     @endif
                
        </div>
                            

         <div  class="form-group col-md-3">
                 {!!Form::label('Contrato', 'Contrato', null)!!}                          
                 {!!Form::select('Contrato', array(
                                 'Linea Nueva'=>'Linea Nueva','Portabilidad'=>'Portabilidad'),null,['id'=>'Contrato','class'=>'form-control '])!!}
                      @if(isset($errors))
                         {{$errors->first('Actividad')}}
                      @endif
           
         </div>
         <div  class="form-group col-md-3">
                 {!!Form::label('Tipo de Linea', 'Tipo de linea', null)!!}                          
                 {!!Form::select('tipolinea', array('Comercial'=>'Comercial','Residencial'=>'Residencial'),null,['id'=>'tipolinea','class'=>'form-control '])!!}
                      @if(isset($errors))
                         {{$errors->first('Actividad')}}
                      @endif
           
         </div>
          <div  class="form-group col-md-3">
                 {!!Form::label('Paquetes', 'Paquetes', null)!!}                          
                 {!!Form::select('Paquetes', array(0 => "--- Seleccione  ---"),null,['id'=>'Paquetes','class'=>'form-control '])!!}
                      @if(isset($errors))
                         {{$errors->first('Actividad')}}
                      @endif
           
         </div>                      

         <div  class="form-group col-sm-3">
               {!!Form::label('SOLICITUD', 'SOLICITUD', null)!!}                          
                    {!! Form::file('Img_Solicitud', null) !!}

                      @if(isset($errors))
                         {{$errors->first('Actividad')}}
                      @endif
         </div>
         <div  class="form-group col-sm-3">
              {!!Form::label('AVISO', 'AVISO', null)!!}                          
                    {!! Form::file('AVISO', null) !!}

                      @if(isset($errors))
                         {{$errors->first('Actividad')}}
                      @endif
         </div>
         <div  class="form-group col-sm-3">
              {!!Form::label('INE_Frontal', 'INE/FRONTAL', null)!!}                          
                    {!! Form::file('INE_Frontal', null) !!}

                      @if(isset($errors))
                         {{$errors->first('Actividad')}}
                      @endif
         </div>
        <div  class="form-group col-sm-3">
              {!!Form::label('INE_R', 'INE/REVERSO', null)!!}                          
                    {!! Form::file('INE_Reverso', null) !!}

                      @if(isset($errors))
                         {{$errors->first('Actividad')}}
                      @endif
         </div>

        
        <div  class="form-group col-sm-3">
              
                      {!!Form::label('C.D.', 'C.D.', null)!!}                          
                      {!! Form::file('CD', null) !!}

                      @if(isset($errors))
                         {{$errors->first('Actividad')}}
                      @endif
        </div>
                            

        <div  class="form-group col-sm-6">
              
                        {!!Form::label('Observacion', 'Observaciones', null)!!}
                        {!!Form::textarea('Observacion', null, array('pattern'=>'^[0-9a-zA-ZñÑ\s]{1,255}$','size' => '4x3','id'=>'Observacion','class'=>'form-control text-uppercase','placeholder'=>'Observación del Proveedor'))!!}
                        @if(isset($errors))
                          {{$errors->first('Observacion')}}
                        @endif
                  
                </div>
                            
 
            
<div  class="col-xs-12">
                        <div class="text-right">
                       
                                    Regresar
                                 </a>
            
                         {!! Form::button('Crear Solicitud', array('type' => 'submit', 'class' =>'btn-sm btn btn-primary')) !!}
                         </div>
                    </div>
            </div>
    <br>
</div>


{!! Form::close() !!}
</div>

<div class="col-lg-12">
    <!--Panel 2 -->
    <div class="panel  panel-success "  >
        <div class="panel-heading"  >


            
      <h3 class="panel-title">Registrados</h3>
    </div>
    <div class="panel-body" id="bodyPanel">
            <div class="form-group">

                </div>

 <table class="table table-bordered" id="users-table">
        <thead>
            <tr>
                <th>Folio</th>
                <th>Servicio</th>
                <th>Imagen Solicitud</th>
                <th>Imagen Aviso</th>
                <th>Estatus</th>
            </tr>
        </thead>
    </table>  
</div>
<p class="form-group">
   

</form>
</div><!-- fin panel 2 -->

</div>

</div>

 

<!-- Modal -->
<div class="modal fade" id="modalPrograma" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-header-success">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4><i class="glyphicon glyphicon-plus"></i> Agregar Programa: </h4>
          </div>
          <div class="modal-body">
         
        <form action="" type="POST" id="formulario">
            {{--  {!!Form::open(array('id'=>'FromPrograma','class'=>'form-horizontal','role'=>'form','data-toggle'=>'validator'))!!}    --}}
                <div class="form-group">
                    <label class="col-sm-3 control-label">Nombre del Programa:</label>
                    <div class="col-sm-9">
                        <input name="DescripcionPro" required id="DescripcionPro" pattern="^[a-zA-Z0-9_.ñÑáéíóúÁÉÍÓÚ\s()-/]{1,150}$" class="form-control input-sm text-uppercase" placeholder="PROGRAMA DE CONCURRENCIA CON  LAS ENTIDADES FEDERATIVAS " data-error="El campo debe ser alfanúmerico">   

                        <div class="help-block with-errors"></div>                
                      </div>
                       <input type="hidden" id="opcion" name="opcion" value="1" >
                </div>
         {{--    {!!Form::close()!!} --}}
            </form>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-success pull-left" data-dismiss="modal">Cancelar</button>
           <button id="btnPrograma"   data-dismiss="modal" class="btn btn-sm btn-primary">Guardar</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  </div>
  <!-- Modal -->


<!-- Modal -->
<div class="modal fade" id="modalComponente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-header-success">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4><i class="glyphicon glyphicon-plus"></i> Agregar Componente: </h4>
          </div>
          <div class="modal-body">
         
        <form action="" type="POST" id="formulariocomponente">
            {{--  {!!Form::open(array('id'=>'FromPrograma','class'=>'form-horizontal','role'=>'form','data-toggle'=>'validator'))!!}    --}}
                <div class="form-group">
                    <label class="col-sm-3 control-label">Descripción del Componente:</label>
                    <div class="col-sm-9">
                        <input name="DescripcionComponente" required id="DescripcionComponente" pattern="^[a-zA-Z0-9_.ñÑáéíóúÁÉÍÓÚ\s()-/]{1,150}$" class="form-control input-sm text-uppercase" placeholder="GASTOS DE OPERACIÓN " data-error="El campo debe ser alfanúmerico"> 
                        <div class="help-block with-errors"></div>                
                      </div>
                      
                </div>
                </div>
         {{--    {!!Form::close()!!} --}}
            </form>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-success pull-left" data-dismiss="modal">Cancelar</button>
           <button id="btnComponente"   data-dismiss="modal" class="btn btn-sm btn-primary">Guardar</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  </div>
  <!-- Modal -->

<!-- Modal -->
<div class="modal fade" id="modalVertiente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-header-success">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4><i class="glyphicon glyphicon-plus"></i> Agregar Vertiente: </h4>
          </div>
          <div class="modal-body">
         
        <form action="" type="POST" id="formulario">
            {{--  {!!Form::open(array('id'=>'FromPrograma','class'=>'form-horizontal','role'=>'form','data-toggle'=>'validator'))!!}    --}}
                <div class="form-group">
                    <label class="col-sm-3 control-label">Descripción del Vertiente:</label>
                    <div class="col-sm-9">
                        <input name="DescripcionVertiente" required id="DescripcionVertiente" pattern="^[a-zA-Z0-9_.ñÑáéíóúÁÉÍÓÚ\s()-/]{1,150}$" class="form-control input-sm text-uppercase" placeholder="GASTOS DE OPERACIÓN " data-error="El campo debe ser alfanúmerico">   
                        <div class="help-block with-errors"></div>                
                      </div>
                      
                </div>
                </div>
         {{--    {!!Form::close()!!} --}}
            </form>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-success pull-left" data-dismiss="modal">Cancelar</button>
           <button id="btnVertiente"   data-dismiss="modal" class="btn btn-sm btn-primary">Guardar</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  </div>
  <!-- Modal -->



            <!-- /.row -->
            <div class="col-sm-12">
            <div class="row">
                
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">

             @section ('pane2_panel_title', 'Responsive Timeline')
                @section ('pane2_panel_body')
                    <!-- /.panel -->

                                    
                    @endsection
                   
                    </div>
                <!-- /.col-lg-8 -->
                    <!-- /.panel -->
                </div>

                <!-- /.col-lg-4 -->
                <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>


<script type="text/javascript">
    
    $('#users-table').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "listcaptura",
            "type": "GET"
        },
        "columns": [
            { data: 'Folio', name: 'Folio' },
            { data: 'Servicio', name: 'Servicio' },
            { data: 'Img_Solicitud', name: 'Img_Solicitud' },
            { data: 'AVISO', name: 'AVISO' },
            { data: 'Estatus', name: 'Estatus' }
        ]
    } );

</script>
            
@stop



