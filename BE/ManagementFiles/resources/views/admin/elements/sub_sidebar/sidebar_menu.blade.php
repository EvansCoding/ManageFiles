<div class="sidebar-item sidebar-menu">
    <ul>
        <li class="header-menu">
            <span>General</span>
        </li>

        <li>
            <a href="#">
                <i class="fa fa-tachometer-alt"></i>
                <span class="menu-text">Dashboard</span>
                <span class="badge badge-pill badge-warning">New</span>
            </a>

        </li>
        <li class="sidebar-dropdown">
            <a href="#">
                <i class="fas fa-database"></i>
                <span class="menu-text">Manage Data</span>
                <span class="badge badge-pill badge-danger">3</span>
            </a>
            <div class="sidebar-submenu">
                <ul>
                    <li>
                        <a href="{{ route('category')}}">Category</a>
                    </li>
                    <li>
                        <a href="#">Data</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="sidebar-dropdown">
            <a href="#">
                <i class="fas fa-cogs"></i>
                <span class="menu-text">Settings</span>
                <!-- <span class="badge badge-pill badge-danger">3</span> -->
            </a>
            <div class="sidebar-submenu">
                <ul>
                    <li>
                        <a href="/tags.html">Tags</a>
                    </li>
                    <li>
                        <a href="/files.html">Files</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="header-menu">
            <span>Extra </span>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-book"></i>
                <span class="menu-text">Logs</span>
                <span class="badge badge-pill badge-primary">Beta</span>
            </a>
        </li>
    </ul>
</div>
