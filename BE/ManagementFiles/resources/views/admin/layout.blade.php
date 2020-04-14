
<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.elements.head')
</head>

<body>
    <div class="page-wrapper default-theme sidebar-bg bg1 toggled border-radius-on">

        <!-------------Start - Sidebar---------------->
                @include('admin.elements.sidebar')
        <!-------------End - Sidebar---------------->

        <!------------Start - Main------------------->
                @yield('main-content')
         <!------------End - Main------------------->
    </div>

        <!--------------Start - Scripts-------------------------->
                @include('admin.elements.scripts')
        <!--------------End - Scripts-------------------------->
</body>

</html>
