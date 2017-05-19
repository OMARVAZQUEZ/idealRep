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

                  <table class="table table-striped" style="width: 900px">
    <tr>
        <th>Nombre completo</th>
        <th>Correo electr&oacute;nico</th>
        <th>Acciones</th>
    </tr>
    @foreach ($users as $user)
    <tr>
        <td>   {{ $user->Folio }}</td>
        <td>
<a href='{{asset("/imagenes/") }}/{{ $user->CD }}' target='_blank'>ver</a>
        <button type="button" class="btn btn-primary btn-lg" id="CD"> VER </button>

            <div id="myModal1" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                  </div>
                  <div class="modal-body">
                    <p>  <div> <img src='{{asset("/imagenes/") }}/{{ $user->CD }}'   />  </div></p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>

              </div>
            </div>

        </td>
        <td>
        <a href='{{asset("/imagenes/") }}/{{ $user->INE_Frontal }}' target='_blank'>ver</a>
        <button type="button" class="btn btn-primary btn-lg" id="INE_Frontal"> VER </button>

            <div id="myModal2" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                  </div>
                  <div class="modal-body">
                    <p>  <div> <img src='{{asset("/imagenes/") }}/{{ $user->INE_Frontal }}'   />  </div></p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>

              </div>
            </div>





        </td>
        <td>
                <a href='{{asset("/imagenes/") }}/{{ $user->INE_Reverso }}' target='_blank'>ver</a>

         <button type="button" class="btn btn-primary btn-lg" id="INE_Reverso"> VER </button>

            <div id="myModal2" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                  </div>
                  <div class="modal-body">
                    <p>  <div> <img src='{{asset("/imagenes/") }}/{{ $user->INE_Reverso }}'   />  </div></p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>

              </div>
            </div>

</td>
       
        <td>   
  <a href='{{asset("/imagenes/") }}/{{ $user->CD }}' target='_blank'>ver</a>
        <button type="button" class="btn btn-primary btn-lg" id="target"> VER </button>

            <div id="myModal3" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                  </div>
                  <div class="modal-body">
                    <p>  <div> <img src='{{asset("/imagenes/") }}/{{ $user->CD }}'   />  </div></p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>

              </div>
            </div>
</td>
       
        <td>{{ $user->Servicio }}</td>
        <td>{{ $user->Contrato }}</td>
        <td>{{ $user->tipolinea }}</td>
        <td>{{ $user->Paquetes }}</td>
        <td>{{ $user->Estatus }}</td>
        <td>{{ $user->iduser }}</td>
        <td>
      
          <a  class="btn btn-info">
              Ver
          </a>
          <a  class="btn btn-primary">
            Editar
          </a>
        </td>
    </tr>
    @endforeach
  </table>
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
<script type="text/javascript">
   $( "#INE_Frontal" ).click(function() {
 $('#myModal2').modal('show');
});
    $( "#CD" ).click(function() {
 $('#myModal1').modal('show');
});
   
    $( "#INE_Reverso" ).click(function() {
 $('#myModal2').modal('show');
});
   
    $( "#target" ).click(function() {
 $('#myModal3').modal('show');
});
   
    $( "#target" ).click(function() {
 $('#myModal4').modal('show');
});
   
    

</script>            
@stop



