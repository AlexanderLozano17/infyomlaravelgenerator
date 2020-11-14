<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $car->id }}</p>
</div>

<!-- Owner Id Field -->
<div class="form-group">
    {!! Form::label('owner_id', 'Owner Id:') !!}
    <p>{{ $car->owner_id }}</p>
</div>

<!-- Brand Field -->
<div class="form-group">
    {!! Form::label('brand', 'Brand:') !!}
    <p>{{ $car->brand }}</p>
</div>

<!-- Color Field -->
<div class="form-group">
    {!! Form::label('color', 'Color:') !!}
    <p>{{ $car->color }}</p>
</div>

<!-- Cylinder Field -->
<div class="form-group">
    {!! Form::label('cylinder', 'Cylinder:') !!}
    <p>{{ $car->cylinder }}</p>
</div>

<!-- Doors Field -->
<div class="form-group">
    {!! Form::label('doors', 'Doors:') !!}
    <p>{{ $car->doors }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $car->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $car->updated_at }}</p>
</div>

