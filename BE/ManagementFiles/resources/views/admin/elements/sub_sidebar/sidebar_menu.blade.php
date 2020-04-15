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
        <li class="sidebar-dropdown {{'admin/category' == request()->path() ? 'active':'#'}}" >
            <a href="#">
                <i class="fas fa-database"></i>
                <span class="menu-text">Manage Data</span>
                <span class="badge badge-pill badge-danger">3</span>
            </a>
            <div class="sidebar-submenu " {!!'admin/category' == request()->path() ? 'style="display: block" ':'#'!!}>
                <ul>
                    <li class="{{'admin/category' == request()->path() ? 'active-item':'#'}}">

                      <a href="{{ route('category')}}">Category</a>
                        {{-- <a href="#">Category</a> --}}
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
                        <a href="#">Tags</a>
                    </li>
                    <li>
                        <a href="#">Files</a>
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
<style>
    .active-item a{
        color: #fff !important;
    }

</style>
<script src="{{ asset('admin/lib/jquery-3.4.1.min.js') }}" type="text/javascript"></script>
<script>
    $('.sidebar-submenu').on('click','ul li', function(){
        $('.sidebar-submenu ul li.active-item').removeClass('active-item');
        $(this).addClass('active-item');
        $(this).parent('')
    })
</script>



