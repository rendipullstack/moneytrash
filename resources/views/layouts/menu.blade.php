<li class="side-menus {{ Request::is('admin','driver','user') ? 'active' : '' }}">
    <a class="nav-link" href="{{route('dashboard')}}">
        <i class="fas fa-landmark"></i><span>Dashboard</span>
    </a>
</li>
@if(Auth::user()->role == 3)
    <li class="dropdown {{ Request::is('admin/accounts','admin/accounts/*') ? 'active' : ''}}">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-users"></i><span>Akun</span></a>
        <ul class="dropdown-menu">
            <li class="{{ Route::is('admin.list_account') ? 'active' : '' }}"><a class="nav-link" href="{{route('admin.list_account')}}">Daftar Akun</a></li>
            <li class="{{ Route::is('admin.create_account') ? 'active' : '' }}"><a class="nav-link" href="{{route('admin.create_account')}}">Buat Akun</a></li>
        </ul>
    </li>
    <li class="side-menus {{ Route::is('admin.garbage') ? 'active' : '' }}">
        <a class="nav-link" href="{{route('admin.garbage')}}">
            <i class="fas fa-recycle"></i><span>Jenis Sampah</span>
        </a>
    </li>
    <li class="side-menus {{ Route::is('admin.banks') ? 'active' : '' }}">
        <a class="nav-link" href="{{route('admin.banks')}}">
            <i class="fas fa-money-check-alt"></i><span>Jenis Bank</span>
        </a>
    </li>
@endif