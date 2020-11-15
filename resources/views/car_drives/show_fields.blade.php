<!-- Car Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Car:') !!}
    <p>{{ $carDrive->car->brand }} CC-{{ $carDrive->car->cylinder }}</p>
</div>

<!-- Driver Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Name Driver:') !!}
    <p>{{ $carDrive->driver->first_name }} {{ $carDrive->driver->second_name }} {{ $carDrive->driver->last_name }}</p>
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $carDrive->status == 'I'? 'INACTIVO' : 'ACTIVO' }}</p>
</div>


