<!-- Brand Field -->
<div class="form-group col-sm-6">
    {!! Form::label('brand', 'Brand:') !!}
    {!! Form::text('brand', null, ['class' => 'form-control','minlength' => 5,'maxlength' => 50]) !!}
</div>

<!-- Color Field -->
<div class="form-group col-sm-6">
    {!! Form::label('color', 'Color:') !!}
    {!! Form::text('color', null, ['class' => 'form-control']) !!}
</div>

<!-- Cylinder Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cylinder', 'Cylinder:') !!}
    {!! Form::number('cylinder', null, ['class' => 'form-control']) !!}
</div>

<!-- Doors Field -->
<div class="form-group col-sm-6">
    {!! Form::label('doors', 'Doors:') !!}
    {!! Form::number('doors', null, ['class' => 'form-control']) !!}
</div>

<!-- Owner Field -->
<div class="form-group col-sm-6">
   <select name="owner_id" class="form-control" placeholder="--Seleccione--">
    <option value="">--Selecccione--</option> 
        @if ($persons)                    
            @foreach ($persons as $item)                
                @if (isset($car) && $car->owner_id == $item->id)                 
                    <option selected value="{{ $item->id }}">{{ $item->name }}</option>                                     
                @else
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endif                
            @endforeach
        @endif        
   </select>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('cars.index') }}" class="btn btn-default">Cancel</a>
</div>
