<!-- Identification Field -->
<div class="form-group col-sm-6">
    <label for="identification">identification</label>
    <input type="text" readonly class="form-control" id="identification" value="{{ $person->identification }}">
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    <label for="email">email</label>
    <input type="text" readonly class="form-control" id="email" value="{{ $person->email }}">
</div>

<!-- First Name Field -->
<div class="form-group col-sm-6">
    <label for="name">Name</label>
    <input type="text" readonly class="form-control" id="name" value="{{ $person->first_name }} {{ $person->second_name }} {{ $person->last_name }} ">
</div>

<!-- Age Field -->
<div class="form-group col-sm-6">
    <label for="age">Age</label>
    <input type="text" readonly class="form-control" id="age" value="{{ $person->age }}">
</div>

<!-- Created At Field -->
<div class="form-group col-sm-6">
    <label for="date">Date Register</label>
    <input type="text" readonly class="form-control" id="date" value="{{ $person->created_at }}">
</div>