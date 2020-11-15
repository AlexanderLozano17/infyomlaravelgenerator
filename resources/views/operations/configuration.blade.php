@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
           Configuration
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    
					<div>
						<p><a href="{{ route('operations.index') }}"><b>OPERACIONES</b></a></p>
					</div>
					

                </div>
            </div>
        </div>
    </div>
@endsection
