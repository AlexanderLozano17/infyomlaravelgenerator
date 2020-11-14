<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{!! route('users.index') !!}"><i class="fa fa-user"></i><span>Usuarios</span></a>
</li>

<li class="{{ Request::is('people*') ? 'active' : '' }}">
    <a href="{{ route('people.index') }}"><i class="fa fa-edit"></i><span>People</span></a>
</li>

<li class="{{ Request::is('cars*') ? 'active' : '' }}">
    <a href="{{ route('cars.index') }}"><i class="fa fa-edit"></i><span>Cars</span></a>
</li>

