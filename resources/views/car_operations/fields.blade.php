<!-- Car Field -->
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

 <!-- Operation Field -->
 <div class="form-group col-sm-6">
    <select name="car_id" class="form-control">
        <option value="">--Selecccione--</option> 
        @if ($operations)                    
            @foreach ($operations as $item)                
                @if (isset($operation) && $operation->id == $item->id)                 
                    <option selected value="{{ $item->id }}">{{ $item->operation }}</option>                                     
                @else
                    <option value="{{ $item->id }}">{{ $item->operation }}</option>
                @endif                
            @endforeach
        @endif        
    </select>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('carOperations.index') }}" class="btn btn-default">Cancel</a>
</div>
