<li class="{{ Request::is('posts*') ? 'active' : '' }}">
    <a href="{{ route('posts.index') }}"><i class="fa fa-edit"></i><span>Posts</span></a>
</li>

<li class="{{ Request::is('posters*') ? 'active' : '' }}">
    <a href="{{ route('posters.index') }}"><i class="fa fa-edit"></i><span>Posters</span></a>
</li>