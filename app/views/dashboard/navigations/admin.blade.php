@if (Sentry::getUser()->hasPermission('admin'))
<li>
    <a href="{{ URL::to('dashboard') }}">
        <i class="fa fa-dashboard"></i>
        <span>Dashboard</span>
    </a>
</li>
<li class="sub-menu">
    <a href="javascript:;" class="active" >
        <i class="fa fa-th"></i>
        <span>Master</span>
    </a>
    <ul class="sub">
        <li><a  href="{{ URL::to('admin/admins') }}"><i class="fa fa-users"></i>User</i></a></li>
        <li><a  href="{{ URL::to('admin/jnskomoditis') }}"><i class="fa fa-users"></i>Jenis Komoditi</i></a></li>
        <li><a  href="{{ URL::to('admin/komoditis') }}"><i class="fa fa-users"></i>Komoditi</i></a></li>
        <li><a  href="{{ URL::to('admin/kattipas') }}"><i class="fa fa-users"></i>Kategori Titik Pantau</i></a></li>
        <li><a  href="{{ URL::to('admin/tipas') }}"><i class="fa fa-users"></i>Titik Pantau</i></a></li>
        <li><a  href="{{ URL::to('admin/pelayarans') }}"><i class="fa fa-users"></i>Mitra Pelayaran</i></a></li>
        <li><a  href="{{ URL::to('admin/penerimas') }}"><i class="fa fa-users"></i>Mitra Bisnis</i></a></li>
    </ul>
</li>
<li>
    <a href="{{ URL::to('admin/transaksis') }}">
        <i class="fa fa-user-md"></i>
        <span>Transaksi</span>
    </a>
</li>
<li>
    <a href="{{ URL::to('admin/exportindex') }}">
        <i class="fa fa-user-md"></i>
        <span>Export</span>
    </a>
</li>
<li>
    <a href="{{ URL::to('chard') }}">
        <i class="fa fa-bar-chart-o"></i>
        <span>Chard</span>
    </a>
</li>
@endif
@if (Sentry::getUser()->hasPermission('user'))
<li>
    <a href="{{ URL::to('dashboard') }}">
        <i class="fa fa-dashboard"></i>
        <span>Dashboard</span>
    </a>
</li>
<li>
    <a href="{{ URL::to('admin/transaksis') }}">
        <i class="fa fa-user-md"></i>
        <span>Transaksi</span>
    </a>
</li>
@endif
