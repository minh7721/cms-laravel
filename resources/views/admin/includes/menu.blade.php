<li class="nav-item">
    <a href="{{route('admin.dashboard')}}" class="nav-link">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>Dashboard</p>
    </a>
</li>
<li class="nav-header text-uppercase font-weight-bold">Data</li>
<li class="nav-item">
    <a href="{{route('admin.article.index')}}" class="nav-link">
        <i class="nav-icon far fa-newspaper"></i>
        <p>Articles</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{route('admin.category.index')}}" class="nav-link">
        <i class="nav-icon fas fa-list"></i>
        <p>Categories</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('admin.tag.index') }}" class="nav-link">
        <i class="nav-icon fas fa-tag"></i>
        <p>Tags</p>
    </a>
</li>

<li class="nav-header text-uppercase font-weight-bold">Authentication</li>
<li class="nav-item">
    <a href="{{route('admin.user.index')}}" class="nav-link">
        <i class="nav-icon fas fa-users"></i>
        <p>Users</p>
    </a>
</li>

<li class="nav-header text-uppercase font-weight-bold">Systems</li>
<li class="nav-item">
    <a href="/admin/log-viewer" class="nav-link">
        <i class="nav-icon fas fa-terminal"></i>
        <p>Logs</p>
    </a>
</li>
