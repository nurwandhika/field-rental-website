<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="#">Smashfit</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="#"><i class="fa-solid fa-shuttlecock"></i></a>
        </div>
        <ul class="sidebar-menu">
            <li class="{{request()->is('user/transaction*') ? 'active' : ''}}"><a class="nav-link" href="{{route('user::transaction')}}"><i class="fas fa-dollar"></i> <span>Transaksi</span></a></li>
            <hr width="80%">
            <li><a class="nav-link" href="{{route('schedule')}}"><i class="fas fa-calendar"></i> <span>Cek Jadwal</span></a></li>
        </ul>
    </aside>
</div>
