
<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.elements.head')
</head>
<style>

    #loading{
  display: none;
  position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 50;
    background: rgba(255,255,255,0.7);
}

.overlay {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    transform: -webkit-translate(-50%, -50%);
    transform: -moz-translate(-50%, -50%);
    transform: -ms-translate(-50%, -50%);
    color:#1f222b;
    z-index: 9999;
    background: rgba(255,255,255,0.7);
  }
</style>
<body>

    <div class="page-wrapper default-theme sidebar-bg bg1 toggled border-radius-on">

        <!-------------Start - Sidebar---------------->
                @include('admin.elements.sidebar')
        <!-------------End - Sidebar---------------->

        <!------------Start - Main------------------->
                @yield('main-content')
         <!------------End - Main------------------->
    </div>
    <div id="loading">
        <div id="overlay" class="overlay"><i class="fa fa-spinner fa-pulse fa-5x fa-fw "></i></div>
    </div>
        <!--------------Start - Scripts-------------------------->
                @include('admin.elements.scripts')
        <!--------------End - Scripts-------------------------->

@stack('scripts')
</body>



</html>
