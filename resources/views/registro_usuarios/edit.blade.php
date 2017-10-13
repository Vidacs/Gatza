@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Registro Usuarios
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($registroUsuarios, ['route' => ['registroUsuarios.update', $registroUsuarios->id], 'method' => 'patch']) !!}

                        @include('registro_usuarios.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection