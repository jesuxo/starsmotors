
<style>
    .cursor-pointer, .u-cursorPointer {
        cursor: pointer;
    }
    .cart-popover {
        position: relative;
    }

    .cart-popover .popover .arrow {
        left: 335px;
        top: -10px;
        margin-left: -10px;
        position: absolute;
        display: inline-block;
        width: 0;
        height: 0;
        border-color: transparent transparent #fff;
        border-style: solid;
        border-width: 0 10px 10px;
    }

    .popover {
        position: absolute;
        top: 0;
        left: 0;
        z-index: 1060;
        display: block;
        max-width: 276px;
        padding: 1px;
        font-family: Helvetica Neue,Helvetica,Arial,sans-serif;
        font-style: normal;
        font-weight: 400;
        letter-spacing: normal;
        line-break: auto;
        line-height: 1.5;
        text-align: left;
        text-align: start;
        text-decoration: none;
        text-shadow: none;
        text-transform: none;
        white-space: normal;
        word-break: normal;
        word-spacing: normal;
        word-wrap: normal;
        font-size: .875rem;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid rgba(0,0,0,.2);
        border-radius: .3rem;
    }

    .popover {
        z-index: 1099;
        right: -56px;
        width: 400px;
        height: 100px;
        max-width: 412px;
        box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 16px;
        border: 1px solid rgb(224, 224, 224);
        border-radius: 8px;
    }

    .cart-popover .popover {
        font-family: Open Sans,Helvetica Neue,Helvetica,sans-serif;
        top: 0;
        left: inherit;
        right: 0px;
        opacity: 1;
        width: 385px;
        max-width: 385px;
        box-shadow: 0 22px 70px 4px rgba(0,0,0,.56);
        padding: 0;
        border: 1px solid #ccc;
        overflow: inherit !important;
        transition: opacity .2s ease-out;
        -moz-transition: opacity .2s ease-out;
        -webkit-transition: opacity .2s ease-out;
        -o-transition: opacity .2s ease-out;
    }

    .items-agregados{
        background-color: #0071ba;
        color: rgb(255, 255, 255);
        line-height: 22px;
        position: absolute;
        right: -16px;
        top: -15px;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        text-align: center;
        font-size: 11px;
        font-weight: 100;
    }

    .ak-medium {
        font-weight: 500;
    }

    @media (max-width: 576px){
        .cart-popover .popover {
            right: -56px;
        }
        .cart-popover .popover .arrow{
            left: 303px !important;
        }
    }
    .ak-nav ul {
        list-style: none;
    }
    .ak-munu_dropdown_toggle_1::before, .ak-munu_dropdown_toggle_1::after {
        left: 60% !important;
        top: 50% !important;
        height: 2px !important;
        width: 10px !important;
        background-color: #ff3d24;
        font-size: 20px !important;
        font-weight: 700 !important;
    }

    .ak-munu_dropdown_toggle_1 {
        height: 15px !important;
        width: 15px !important;
        top: 38px !important;
        right: -16px !important;
    }
    *, ::after, ::before {
        box-sizing: border-box;
    }
    .text-hover-animaiton .menu-text {
        display: -ms-flexbox;
        overflow: hidden;
        text-shadow: 0 60px 0 var(--primary-color) !important;
        display: flex;
    }
    .text-hover-animaiton {
        line-height: 100%;
    }

    @media screen and (max-width: 1199px) {
        .ak-munu_toggle {
            display: inline-block;
            width: 30px;
            height: 27px;
            cursor: pointer;
            position: absolute;
            top: 27px;
            right: 30px;
        }
        .ak-site_header.ak-style1 .ak-munu_toggle {
            top: 50%;
            right: 0px;
            margin-top: -13px;
        }

        .search-form{
            margin: 25px 0px 0px 20px;
        }

    }

    @media screen and (min-width: 1200px) {
        .search-form{
            margin: 25px 0px;
        }
        .ak-nav .ak-nav_list > li.menu-item-has-children > a {
            position: relative;
        }
        .ak-nav .ak-nav_list li:not(.ak-mega_menu) {
            position: relative;
        }
        .ak-nav .ak-nav_list ul a {
            display: block;
            line-height: inherit;
            padding: 7px 20px;
        }
        .menu-item-has-black-section span {
            cursor: pointer;
        }
        .ak-munu_dropdown_toggle_1 {
            position: absolute;
            height: 30px;
            width: 35px;
            right: 20px;
            top: 9px;
        }
        .ak-nav {
            line-height: 1.6em;
            font-size: 16px;
        }

        .ak-nav .ak-nav_list > li {
            text-transform: uppercase;
            color: #fff;
        }
        .ak-munu_dropdown_toggle_1::before, .ak-munu_dropdown_toggle_1::after {
            content: "";
            display: block;
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            height: 2px;
            width: 35px;
            background-color: #ff3d24 !important;
            transition: all 0.3s ease;
        }

        .ak-munu_dropdown_toggle_1::before, .ak-munu_dropdown_toggle_1::after {
            content: "";
            display: block;
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            height: 2px;
            width: 35px;
            background-color: #fff;
            transition: all 0.3s ease;
        }
        .ak-munu_dropdown_toggle_1 {
            position: absolute;
            height: 30px;
            width: 35px;
            right: 20px;
            top: 9px;
        }

        .ak-munu_dropdown_toggle_1::before {
            transform: translate(-50%, -50%) rotate(90deg);
        }
    }

    .ak-sticky_header {
        position: fixed !important;
        width: 100%;
        z-index: 999;
        background: rgba(255, 255, 255, 0.03);
        -webkit-backdrop-filter: blur(8px);
        backdrop-filter: blur(8px);
    }
    @media screen and (max-width: 1199px) {

        .ak-site_header.ak-style1 .ak-nav {
            display: flex;
        }
        .ak-nav .ak-nav_list {
            position: absolute;
            width: 100vw;
            left: -15px;
            background-color: rgba(0, 0, 0, 0.8549019608);
            padding: 10px 0;
            display: none;
            top: 0%;
            padding-top: 75px;
            border-top: 1px solid rgba(77, 77, 77, 0.3215686275);
            border-bottom: 1px solid rgba(77, 77, 77, 0.3215686275);
            overflow: auto;
            max-height: calc(100vh - 80px);
            line-height: 1.6em;
        }
        .ak-nav .menu-item-has-children {
            position: relative;
        }
    }


    .text-hover-animaiton .menu-text {
        display: -ms-flexbox;
        overflow: hidden;
        text-shadow: 0 60px 0 #FF3D24 !important;
        display: flex;
    }
    .text-hover-animaiton .menu-text div {

        transform: unset;
    }

    /*style="display: none"*/
</style>

<header class="ak-site_header ak-style1 ak-sticky_header">

    <div class="ak-main_header">
        <div class="container">
            <div class="ak-main_header_in">
                <div class="ak-main-header-left">
                    <a href="{{route('site')}}" class="navbar-brand logo" rel="home" aria-current="page"><img width="101" height="41" src="https://starsmotors.com.ve/img/logopng.png" class="custom-logo" alt="StarsMotors" decoding="async"></a>                    </div>
                <div class="ak-main-header-center">

                    <div class="ak-nav ak-medium">
                        <ul id="menu-cras-menu" class="ak-nav_list">
                            <li itemscope="itemscope" id="menu-item-2397" @php echo (isset($gosearch) and $gosearch != '' or Auth::user())?'':''; @endphp class=" menu-search menu-item menu-item-home  dropdown submenu nav-item mega_menu">
                                <div class=" search-form input-group"  >
                                    <form name="formbusqueda" method="post" action="{{route('gourl')}}">
                                        @csrf
                                        <input type="text"  autocomplete="off" name="busqueda"
                                               value="{{(isset($gosearch) and $gosearch !='')? $gosearch: ''}}"
                                               class="form-control search-field input-busqueda" id="inputsearchinputsearch" placeholder="Busca productos aqui"
                                               style="display: none;line-height: 35px;border:1px solid aliceblue;padding-right: 35px; width: 250px; font-weight: 100 !important; height: 40px !important; ">
                                        <span class="input-group-addon btn-header-search">
                                        <button type="button" >
                                            <i class="ti-search cursor_pointer btn-search"></i>
                                        </button>
                                    </span>
                                        <input type="hidden" name="post_type" value="product">
                                    </form>
                                </div>
                            </li>


                            <li style="display: none" itemscope="itemscope"
                                itemtype="https://www.schema.org/SiteNavigationElement"
                                id="menu-item-512"
                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-512 menu-item-has-black-section menu-item-has-children dropdown"
                            ><a class="text-hover-animaiton" href="#"><div style="position:relative;display:inline-block;" class="menu-text"><div style="position:relative;display:inline-block;">S</div><div style="position:relative;display:inline-block;">e</div><div style="position:relative;display:inline-block;">r</div><div style="position:relative;display:inline-block;">v</div><div style="position:relative;display:inline-block;">i</div><div style="position:relative;display:inline-block;">c</div><div style="position:relative;display:inline-block;">e</div><div style="position:relative;display:inline-block;">s</div></div></a>
                                <ul role="menu" class=" sub-menu">
                                    <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-20" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20"><a class="text-hover-animaiton" href="https://3jon.com/demo/nwp/item/cras/services/"><div style="position:relative;display:inline-block;" class="menu-text"><div style="position:relative;display:inline-block;">S</div><div style="position:relative;display:inline-block;">e</div><div style="position:relative;display:inline-block;">r</div><div style="position:relative;display:inline-block;">v</div><div style="position:relative;display:inline-block;">i</div><div style="position:relative;display:inline-block;">c</div><div style="position:relative;display:inline-block;">e</div><div style="position:relative;display:inline-block;">s</div></div> <div style="position:relative;display:inline-block;" class="menu-text"><div style="position:relative;display:inline-block;">O</div><div style="position:relative;display:inline-block;">n</div><div style="position:relative;display:inline-block;">e</div></div></a></li>
                                    <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-854" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-854"><a class="text-hover-animaiton" href="https://3jon.com/demo/nwp/item/cras/services-two/"><div style="position:relative;display:inline-block;" class="menu-text"><div style="position:relative;display:inline-block;">S</div><div style="position:relative;display:inline-block;">e</div><div style="position:relative;display:inline-block;">r</div><div style="position:relative;display:inline-block;">v</div><div style="position:relative;display:inline-block;">i</div><div style="position:relative;display:inline-block;">c</div><div style="position:relative;display:inline-block;">e</div><div style="position:relative;display:inline-block;">s</div></div> <div style="position:relative;display:inline-block;" class="menu-text"><div style="position:relative;display:inline-block;">T</div><div style="position:relative;display:inline-block;">w</div><div style="position:relative;display:inline-block;">o</div></div></a></li>
                                </ul>
                                <span class="ak-munu_dropdown_toggle"></span><span class="ak-munu_dropdown_toggle_1"></span></li>


                            @if(Auth::user())
                                <li itemscope="itemscope" id="menu-item-4644" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children  dropdown submenu nav-item">
                                    <a href="/dashboard" class="nav-link"> <i class="bi bi-person" style="font-size: 27px"></i>
                                            @php

                                                $nombre = auth()->user()->first_name;
                                                $split  = explode(" ", $nombre);
                                                echo $split[0];
                                            @endphp
                                    </a>
                                    <ul role="menu" class="dropdown-menu menu-depth-2nd" style="color: white">
                                        <li itemscope="itemscope" class="menu-item nav-item" style="margin-left: 10px"><span  class="nav-link">Hola, {{auth()->user()->name}} </span></li>
                                        <li itemscope="itemscope" class="menu-item nav-item" style="margin-left: 10px">
                                            <a href="/clientes/{{auth()->user()->codclie}}/tab3" class="nav-link">
                                                Mis Veh&iacute;culos
                                            </a>
                                        </li>
                                        <li itemscope="itemscope" class="menu-item dropdown-divider"> </li>
                                        <li itemscope="itemscope" class="menu-item nav-item">
                                            <a href="{{url('logout')}}" class="nav-link"><i class="ti-power-off"></i>
                                                Cerrar Sesi&oacute;n
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                @if(isset($gosearch) and $gosearch == '' and !Auth::user())
                                    <li itemscope="itemscope" onclick="$('.menu-search').slideToggle(); $(this).hide(); $('#inputsearch').focus()"  class="menu-item menu-item-type-custom menu-item-object-custom  nav-item">
                                        <a href="javascript:;"  class="nav-link">
                                            <i class="ti-search " style="font-size: 27px"></i>
                                        </a>
                                    </li>
                                @endif
                            @else
                                <li itemscope="itemscope"  class="menu-item menu-item-type-custom menu-item-object-custom  nav-item">
                                    <a href="/panelclientes" target="_blank" class="text-hover-animaiton">
                                        <div style="position:relative;display:inline-block;letter-spacing: 3px;" class="menu-text">
                                            INGRESAR
                                        </div>
                                    </a>
                                </li>
                                @if(!isset($gosearch) or $gosearch == '')
                                    <li itemscope="itemscope" onclick="$('.menu-search').slideToggle(); $(this).hide(); $('#inputsearch').focus() " class="menu-item menu-item-type-custom menu-item-object-custom  nav-item">
                                        <a href="javascript:;"  class="nav-link">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="19" viewBox="0 0 15 19" fill="none">
                                                <path d="M12.8353 11.8353H12.042L11.767 11.567C12.767 10.417 13.3353 8.917 13.3353 7.33533C13.3353 3.83533 10.5 1 7 1C3.5 1 0.665329 3.83533 0.665329 7.33533C0.665329 10.8353 3.50066 13.6707 7.00066 13.6707C8.58233 13.6707 10.0823 13.1023 11.2323 12.1023L11.5007 12.3773V13.1707L16.168 17.8353L17.5013 16.502L12.8353 11.8353ZM7.00066 11.8353C4.66733 11.8353 2.83233 10.0003 2.83233 7.667C2.83233 5.33366 4.66733 3.49866 7.00066 3.49866C9.33399 3.49866 11.169 5.33366 11.169 7.667C11.169 10.0003 9.33399 11.8353 7.00066 11.8353Z" fill="white"/>
                                            </svg>
                                        </a>
                                    </li>
                                @endif
                            @endif
                            <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-18" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-18">
                                <a class="text-hover-animaiton" href="https://api.whatsapp.com/send/?phone=584247329670&text=Hola+Srs.+de+STARSMOTORS+quisiera+informacion+sobre%3A+&type=phone_number&app_absent=0">
                                    <div style="position:relative;display:inline-block;" class="menu-text">
                                        <div style="position:relative;display:inline-block;">C</div>
                                        <div style="position:relative;display:inline-block;">o</div>
                                        <div style="position:relative;display:inline-block;">n</div>
                                        <div style="position:relative;display:inline-block;">t</div>
                                        <div style="position:relative;display:inline-block;">a</div>
                                        <div style="position:relative;display:inline-block;">c</div>
                                        <div style="position:relative;display:inline-block;">t</div>
                                        <div style="position:relative;display:inline-block;">o</div>
                                    </div>
                                </a>
                            </li>
                        </ul>

                    </div>
                </div>


                <div class="ak-main-header-right">
                    <a href="https://api.whatsapp.com/send/?phone=584247329670&text=Hola+Srs.+de+STARSMOTORS+quisiera+informacion+sobre%3A+&type=phone_number&app_absent=0">
                        <div class="d-flex align-items-center gap-3">
                            <div class="heartbeat-icon">
                                <span class="ak-heartbeat-btn">
                                    <img src="/assets/images/phone.svg" alt=""></span>
                            </div>
                            <h6>+58 424-7329670</h6>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </div>
    <div class="nav-bar-border"></div>

</header>


<header class="header_area header_stick">
    <nav class="navbar navbar-expand-lg menu_one menu_right">
        <div class="container">

            <button class="navbar-toggler collapsed" id="botonhamb"  type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="menu_toggle">
                <span class="hamburger">
                <span></span>
                <span></span>
                <span></span>
                </span>
                <span class="hamburger-cross">
                <span></span>
                <span></span>
                </span>
                </span>
            </button>
            <div class="navbar-collapse collapse" id="navbarSupportedContent" style="">
                <ul id="menu-main-menu" class="navbar-nav menu ml-auto">

                    @if(isset($instPpales[0]))


                        <li itemscope="itemscope" style="display:none;"  class="menu-item menu-item-type-custom menu-item-object-custom  dropdown submenu nav-item">
                            <a href="#" class="nav-link">Departamentos</a>
                            <ul class="dropdown-menu mega_menu_three">
                                <li class="nav-item">
                                    <ul class="dropdown-menu">
                                        @foreach($instPpales as $index => $inst)
                                            <li class="nav-item">
                                                <a href="{{route('url.instancia', $inst->codinst)}}" class="nav-link p-0 m-0">
                                                    <span class="navdropdown_link p-0 m-0 " data-codinst="{{$inst->codinst}}">
                                                        <span class="navdropdown_icon p-0 m-0 overinst41" style="background: url({{asset('img/instancias/icon1.png')}})-10px -10px no-repeat ; background-size: 60px; width: 60px; height: 40px ">
                                                                    <!--{{$inst->id}}  .$inst->icon-->
                                                        </span>
                                                        <span class="navdropdown_content " style="padding-top: 13px">
                                                            <h5> {{$inst->descrip}} </h5>
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>
                        </li>


                    @else


                    @endif

                    @if(Auth::user())
                        <li itemscope="itemscope" id="menu-item-4644" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children  dropdown submenu nav-item">
                            <a href="#" class="nav-link"> <i class="ti-user" style="font-size: 27px"></i> <?php
                                $nombre = auth()->user()->name;
                                $split  = explode(" ", $nombre);
                                echo $split[0];
                                ?>
                            </a>
                            <ul role="menu" class="dropdown-menu menu-depth-2nd">
                                <li itemscope="itemscope" class="menu-item nav-item"><span  class="nav-link">Hola, {{auth()->user()->name}} </span></li>
                                <li itemscope="itemscope" class="menu-item dropdown-divider"> </li>
                                <li itemscope="itemscope" class="menu-item nav-item"><a href="{{url('logout')}}" class="nav-link"><i class="ti-power-off"></i> Cerrar Sesi&oacute;n </a></li>
                            </ul>
                        </li>
                            @if(isset($gosearch) and $gosearch == '' and !Auth::user())
                                <li itemscope="itemscope" onclick="$('.menu-search').slideToggle(); $(this).hide(); $('#inputsearch').focus()"  class="menu-item menu-item-type-custom menu-item-object-custom  nav-item">
                                    <a href="javascript:;"  class="nav-link">
                                        <i class="ti-search " style="font-size: 27px"></i>
                                    </a>
                                </li>
                            @endif
                    @else
                            <li itemscope="itemscope"  class="menu-item menu-item-type-custom menu-item-object-custom  nav-item">
                                <a href="/panelclientes" target="_blank" class="nav-link">Ingresar</a>
                            </li>
                            @if(!isset($gosearch) or $gosearch == '')
                                <li itemscope="itemscope" onclick="$('.menu-search').slideToggle(); $(this).hide(); $('#inputsearch').focus() " class="menu-item menu-item-type-custom menu-item-object-custom  nav-item">
                                    <a href="javascript:;"  class="nav-link">
                                        <i class="ti-search " style="font-size: 27px"></i>
                                    </a>
                                </li>
                            @endif
                    @endif

                </ul>
            </div>
            <div class="alter_nav search_exist">
                <ul class="navbar-nav search_cart menu">
                    <li class="nav-item search">
                        <a class="nav-link abrir_lista" href="javascript:void(0);">
                            <i class="ti-shopping-cart" style="font-size: 27px"></i>
                            <span class="items-agregados display_none"></span>
                        </a>
                    </li>
                </ul>

                <div class="cart-popover cursor-pointer display_none">
                    <div class="popover bottom " style="">
                        <div>
                            <div class="arrow" style="left: 365px;"></div>
                            <div class="popover-content"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>

