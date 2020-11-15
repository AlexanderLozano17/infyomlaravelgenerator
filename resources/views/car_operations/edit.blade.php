@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Car Operation
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($carOperation, ['route' => ['carOperations.update', $carOperation->id], 'method' => 'patch']) !!}

                        @include('car_operations.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection