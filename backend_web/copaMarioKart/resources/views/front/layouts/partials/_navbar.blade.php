<div class="navbar-fixed">
  <nav class="navbar-fixed">
    <div class="nav-wrapper container container-front-fgs">
      <a href="{{ route('home') }}" class="brand-logo">
        <span class="image-brand-fgs-container">
          <img src="{{ asset('img/logo-CMS.png') }}" class="responsive-img image-brand-fgs">                
        </span>
      </a>
      <a href="#" data-activates="mobile-demo" class="button-collapse">
        <i class="material-icons">menu</i>
      </a>
      <ul class="right hide-on-med-and-down">
        <li {{ $menu_item == 0 ? 'class=item-nav-li-fgs' : '' }}>
          <a href="{{ route('home') }}" {{ $menu_item == 0 ? 'class=item-nav-fgs' : '' }}>Inicio</a>
        </li>
        <li {{ $menu_item == 1 ? 'class=item-nav-li-fgs' : '' }}>
          <a href="{{ route('tournaments.index') }}" {{ $menu_item == 1 ? 'class=item-nav-fgs' : '' }}>Torneos</a>
        </li>
        @if(Auth::guest())
          <li {{ $menu_item == 999 ? 'class=item-nav-li-fgs' : '' }}>
            <a href="{{ route('login') }}" {{ $menu_item == 999 ? 'class=item-nav-fgs' : '' }}>Ingresar</a>
          </li>
        @else
          <li>
            <a class="dropdown-button" href="#!" data-activates="dropdown_fgs" data-beloworigin="true">
              {!! str_limit(Auth::user()->name, 16) !!}
            <i class="material-icons right">arrow_drop_down</i>
            </a>
          </li>
          <ul id="dropdown_fgs" class="dropdown-content collection dropdown_fgs" style="min-width: 180px;">
            @if(Auth::user()->user_type_id == 1)
              <li>
                <a href="{{ route('admin.index') }}">Administración<i class="material-icons right">dashboard</i></a>
              </li>
            @endif
              <li class="divider"></li>
              <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  Cerrar Sesión
                  <i class="material-icons right">exit_to_app</i>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
                </form>
              </li>
            @endif
          </ul>
      </ul>
    </div>
  </nav>
</div>
<ul class="side-nav" id="mobile-demo">
    <li>
        <div class="brand-sidenav-fgs valign-wrapper center-align" style="background-color: #212121;">
            <a href="{{ route('home') }}">
                <img class="responsive-img logo-fgs" src="{{ asset('img/logo-CMS.png') }}">
            </a>
        </div>
    </li>
    <li><div class="divider-fgs"></div></li>
    <li>
        <div class="menu-item-fgs valign-wrapper">
            <a href="{{ route('home') }}" {{ $menu_item == 0 ? 'class=active-fgs' : '' }}><i class="material-icons">home</i>Inicio</a>         
        </div>
    </li>
    <li><div class="divider-fgs"></div></li>
    <li>
        <div class="menu-item-fgs valign-wrapper">
            <a href="{{ route('tournaments.index') }}" {{ $menu_item == 2 ? 'class=active-fgs' : '' }}><i class="material-icons">widgets</i>Torneos</a>         
        </div>
    </li>
    <li><div class="divider-fgs"></div></li>
    <li id="menu-messages-fgs">
        @if(Auth::guest())
          <li>
              <div class="menu-item-fgs valign-wrapper">
                  <a href="{{ route('login') }}" {{ $menu_item == 10 ? 'class=active-fgs' : '' }}><i class="material-icons">fingerprint</i>Ingresar</a>         
              </div>
          </li>
        @else
          <div class="menu-item-fgs valign-wrapper">
              <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  <i class="material-icons">exit_to_app</i>Cesar Sesión
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
              </form>
          </div>
        @endif
    </li>
    <li><div class="divider-fgs"></div></li>
</ul>





