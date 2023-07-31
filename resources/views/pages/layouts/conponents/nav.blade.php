<!-- Main -->
<li class="nav-item-header">
    <div class="text-uppercase font-size-xs line-height-xs">Main</div> <i class="icon-menu" title="Main"></i>
</li>
<li class="nav-item">
    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
        <i class="icon icon-home4"></i>
        <span>
            Dashboard
        </span>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('admin.doctor.index') }}" class="nav-link {{ request()->routeIs('admin.doctor.*') ? 'active' : '' }}">
        <i class="icon icon-user"></i>
        <span>
            Doctor
        </span>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('admin.department.index') }}" class="nav-link {{ request()->routeIs('admin.department.*') ? 'active' : '' }}">
        <i class="icon icon-wall"></i>
        <span>
            Department
        </span>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('admin.schedule.index') }}" class="nav-link {{ request()->routeIs('admin.schedule.*') ? 'active' : '' }}">
        <i class="icon icon-calendar"></i>
        <span>
            Schedule
        </span>
    </a>
</li>
{{-- <li class="nav-item">
    <a href="{{ route('admin.routine.index') }}" class="nav-link {{ request()->routeIs('admin.routine.*') ? 'active' : '' }}">
        <i class="icon icon-check"></i>
        <span>
            Routine
        </span>
    </a>
</li> --}}
<li class="nav-item">
    <a href="/admin/checkups" class="nav-link {{ request()->routeIs('admin.checkups.*') ? 'active' : '' }}">
        <i class="icon icon-add"></i>
        <span>
            Checkups
        </span>
    </a>
</li>
<li class="nav-item">
    <a href="/admin/bookings" class="nav-link {{ request()->routeIs('admin.bookings.*') ? 'active' : '' }}">
        <i class="icon icon-cart"></i>
        <span>
            Bookings
        </span>
    </a>
</li>
{{-- <li class="nav-item nav-item-submenu">
    <a href="#" class="nav-link"><i class="icon-copy"></i> <span>Layouts</span></a>

    <ul class="nav nav-group-sub" data-submenu-title="Layouts">
        <li class="nav-item"><a href="index.html" class="nav-link active">Default layout</a>
        </li>
        <li class="nav-item"><a
                href="https://demo.interface.club/limitless/demo/Template/layout_2/LTR/default/full/index.html"
                class="nav-link">Layout 2</a></li>
        <li class="nav-item"><a
                href="https://demo.interface.club/limitless/demo/Template/layout_3/LTR/default/full/index.html"
                class="nav-link">Layout 3</a></li>
        <li class="nav-item"><a
                href="https://demo.interface.club/limitless/demo/Template/layout_4/LTR/default/full/index.html"
                class="nav-link">Layout 4</a></li>
        <li class="nav-item"><a
                href="https://demo.interface.club/limitless/demo/Template/layout_5/LTR/default/full/index.html"
                class="nav-link">Layout 5</a></li>
        <li class="nav-item"><a
                href="https://demo.interface.club/limitless/demo/Template/layout_6/LTR/default/full/index.html"
                class="nav-link">Layout 6</a></li>
        <li class="nav-item"><a
                href="https://demo.interface.club/limitless/demo/Template/layout_7/LTR/default/full/index.html"
                class="nav-link disabled">Layout 7 <span class="badge bg-transparent align-self-center ml-auto">Coming
                    soon</span></a></li>
    </ul>
</li> --}}
