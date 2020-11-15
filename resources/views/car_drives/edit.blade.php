@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Car Drive
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($carDrive, ['route' => ['carDrives.update', $carDrive->id], 'method' => 'patch']) !!}

                        @include('car_drives.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection