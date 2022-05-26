<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="#">SIPAK RT</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="#">SIPAK RT</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li>
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="fas fa-fire"></i> <span>Dashboard</span></a>
            </li>
            <li class="menu-header">Master </li>
            <li>
                @can('view-any', App\Models\Barang::class)
                    <x-dropdown-link href="{{ route('barangs.index') }}">
                        Data Barang
                    </x-dropdown-link>
                @endcan
            </li>
            <li>
                @can('view-any', App\Models\Lahan::class)
                    <x-dropdown-link href="{{ route('lahans.index') }}">
                        Data Lahan
                    </x-dropdown-link>
                @endcan
            </li>
            <li>
                @can('view-any', App\Models\LimitStok::class)
                    <x-dropdown-link href="{{ route('limit-stoks.index') }}">
                        Limit Stoks
                    </x-dropdown-link>
                @endcan
            </li>
            <li class="menu-header">Laporan Pengaduan</li>
            <li>
                @can('view-any', App\Models\Panen::class)
                    <x-dropdown-link href="{{ route('panens.index') }}">
                        Panens
                    </x-dropdown-link>
                @endcan
            </li>
            <li>
                @can('view-any', App\Models\Transaksi::class)
                    <x-dropdown-link href="{{ route('transaksis.index') }}">
                        Transaksis
                    </x-dropdown-link>
                @endcan
            </li>
            <li>
                @can('view-any', App\Models\Transaksi::class)
                    <x-dropdown-link href="{{ route('transaksis.index') }}">
                        Transaksis
                    </x-dropdown-link>
                @endcan
            </li>

            <li class="menu-header">Manejemen Penggguna</li>
            <li>
                @can('view-any', App\Models\User::class)
                    <x-dropdown-link href="{{ route('users.index') }}">
                        Users
                    </x-dropdown-link>
                @endcan
            </li>
            <li class="menu-header">Role Permision</li>
            <li>
                @can('view-any', Spatie\Permission\Models\Role::class)
                    <x-dropdown-link href="{{ route('roles.index') }}">Roles</x-dropdown-link>
                @endcan

                @can('view-any', Spatie\Permission\Models\Permission::class)
                    <x-dropdown-link href="{{ route('permissions.index') }}">Permissions</x-dropdown-link>
                @endcan
            </li>

            <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
                <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                    <i class="fas fa-rocket"></i> Documentation
                </a>
            </div>
    </aside>
</div>
