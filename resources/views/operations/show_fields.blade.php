<!-- Operation Field -->
<div class="form-group col-sm-6">
    <label for="operation">Name Operation</label>
    <input type="text" readonly class="form-control" id="operation" value="{{ $operation->operation }}">
</div>

<!-- Created At Field -->
<div class="form-group col-sm-6">
    <label for="date">Date Register</label>
    <input class="form-control" readonly id="date" value="{{ $operation->created_at }}">
</div>

<!-- Description Field -->
<div class="form-group col-sm-12">
    <label for="description">Description</label>
    <textarea class="form-control" readonly id="description" rows="7" >{{ $operation->description }}</textarea>
</div>