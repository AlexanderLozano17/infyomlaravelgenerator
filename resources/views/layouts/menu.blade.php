<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{!! route('users.index') !!}"><i class="fa fa-user"></i><span>Users</span></a>
</li>

<li class="{{ Request::is('people*') ? 'active' : '' }}">
    <a href="{{ route('people.index') }}"><i class="fa fa-edit"></i><span>People</span></a>
</li>

<li class="{{ Request::is('cars*') ? 'active' : '' }}">
    <a href="{{ route('cars.index') }}"><i class="fa fa-edit"></i><span>Cars</span></a>
</li>

<li class="{{ Request::is('operations*') ? 'active' : '' }}">
    <a href="configuration"><i class="fa fa-edit"></i><span>Configurations</span></a>
</li>

<li class="{{ Request::is('carDrives*') ? 'active' : '' }}">
    <a href="{{ route('carDrives.index') }}"><i class="fa fa-edit"></i><span>Car Drives</span></a>
</li>

<li class="{{ Request::is('carOperations*') ? 'active' : '' }}">
    <a href="{{ route('carOperations.index') }}"><i class="fa fa-edit"></i><span>Car Operations</span></a>
</li>

