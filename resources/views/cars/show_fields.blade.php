<!-- Identification Id Field -->
<div class="form-group col-sm-6">
    <label for="identification">Identification</label>
    <input type="text" readonly class="form-control" id="identification" value="{{ $car->owner->identification }}">
</div>

<!-- owner Field -->
<div class="form-group col-sm-6">
    <label for="name">Name Owner</label>
    <input type="text" readonly class="form-control" id="name" value="{{ $car->owner->first_name }} {{ $car->owner->second_name }} {{ $car->owner->last_name }}">
</div>

<!-- Brand Field -->
<div class="form-group col-sm-6">
    <label for="brand">Brand</label>
    <input type="text" readonly class="form-control" id="brand" value="{{ $car->brand }}">
</div>

<!-- Color Field -->
<div class="form-group col-sm-6">
    <label for="color">Color</label>
    <input type="text" readonly class="form-control" id="color" value="{{ $car->color }}">
</div>

<!-- Cylinder Field -->
<div class="form-group col-sm-6">
    <label for="cylinder">Cylinder</label>
    <input type="text" readonly class="form-control" id="cylinder" value="{{ $car->cylinder }}">
</div>

<!-- Doors Field -->
<div class="form-group col-sm-6">
    <label for="doors">Doors</label>
    <input type="text" readonly class="form-control" id="doors" value="{{ $car->doors }}">
</div>

<!-- Created At Field -->
<div class="form-group col-sm-6">
    <label for="created_at">Date Register</label>
    <input type="text" readonly class="form-control" id="created_at" value="{{ $car->created_at }}">
</div>