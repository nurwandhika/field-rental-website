<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="#">Smashfit</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="#">S</a>
        </div>
        <ul class="sidebar-menu">
            <li class="{{request()->is('admin/schedule*') ? 'active' : ''}}"><a class="nav-link" href="{{route('admin::schedule::index')}}"><i class="fas fa-calendar"></i> <span>Jadwal</span></a></li>
            <li class="{{request()->is('admin/field*') ? 'active' : ''}}"><a class="nav-link" href="{{route('admin::field::index')}}"><i class="fas fa-location-dot"></i> <span>Lapangan</span></a></li>
            @if(auth('admin')->user()->role == 'superadmin')
                <li class="{{request()->is('admin/admin*') ? 'active' : ''}}"><a class="nav-link" href="{{route('admin::admin::index')}}"><i class="fas fa-user"></i> <span>Admin</span></a></li>
            @endif
            <li class="{{request()->is('admin/user*') ? 'active' : ''}}"><a class="nav-link" href="{{route('admin::user::index')}}"><i class="fas fa-users"></i> <span>Pengguna</span></a></li>
            <li class="{{request()->is('admin/transaction*') ? 'active' : ''}}"><a class="nav-link" href="{{route('admin::transaction::index')}}"><i class="fas fa-dollar"></i> <span>Transaksi</span></a></li>
            <!-- <li class="{{request()->is('admin/equipment*') ? 'active' : ''}}"><a class="nav-link" href="{{route('admin::equipment::index')}}"><i class="fas fa-tools"></i> <span>Peralatan</span></a></li> -->
        </ul>
    </aside>
</div>
