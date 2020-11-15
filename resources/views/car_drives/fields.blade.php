<!-- Doors Field -->
<div class="form-group col-sm-6">
    <select name="car_id" class="form-control">
        <option value="">--Selecccione--</option> 
        @if ($cars)                    
            @foreach ($cars as $item)                
                @if (isset($car) && $car->id == $item->id)                 
                    <option selected value="{{ $item->id }}">{{ $item->brand }} CC -{{ $item->cylinder }}</option>                                     
                @else
                    <option value="{{ $item->id }}">{{ $item->brand }} CC -{{ $item->cylinder }}</option>
                @endif                
            @endforeach
        @endif        
    </select>
</div>

 <!-- Doors Field -->
<div class="form-group col-sm-6">
    <select name="driver_id" class="form-control">
        <option value="">--Selecccione--</option> 
        @if ($persons)                    
            @foreach ($persons as $item)                
                @if (isset($person) && $person->id == $item->id)                 
                    <option selected value="{{ $item->id }}">{{ $item->name }}</option>                                     
                @else
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endif                
            @endforeach
        @endif        
    </select>
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::select('status', ['A' => 'Activo', 'I' => 'Inactivo'], null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('carDrives.index') }}" class="btn btn-default">Cancel</a>
</div>
