<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $carOperation->id }}</p>
</div>

<!-- Car Id Field -->
<div class="form-group">
    {!! Form::label('car_id', 'Car Id:') !!}
    <p>{{ $carOperation->car_id }}</p>
</div>

<!-- Operation Id Field -->
<div class="form-group">
    {!! Form::label('operation_id', 'Operation Id:') !!}
    <p>{{ $carOperation->operation_id }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $carOperation->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $carOperation->updated_at }}</p>
</div>

