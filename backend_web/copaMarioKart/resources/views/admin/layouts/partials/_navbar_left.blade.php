    <ul id="slide-out" class="side-nav fixed side-nav-fgs">
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
          <a href="{{ route('admin.index') }}" {{ $menu_item == 0 ? 'class=active-fgs' : '' }}><i class="material-icons">dashboard</i>Administración</a>         
        </div>
      </li>
      <li><div class="divider-fgs"></div></li>
      <li>
        <div class="menu-item-fgs valign-wrapper">
          <a href="{{ route('publications.index') }}" {{ $menu_item == 1 ? 'class=active-fgs' : '' }}><i class="material-icons">description</i>Publicaciones</a>         
        </div>
      </li>
      <li>
        <div class="menu-item-fgs valign-wrapper">
          <a href="{{ route('publication_types.index') }}" {{ $menu_item == 12 ? 'class=active-fgs' : '' }}><i class="material-icons">tune</i>Categorias</a>         
        </div>
      </li>
      <li>
        <div class="menu-item-fgs valign-wrapper">
          <a href="{{ route('polls.index') }}" {{ $menu_item == 10 ? 'class=active-fgs' : '' }}><i class="material-icons">sort</i>Encuestas</a>         
        </div>
      </li>
      <li>
        <div class="menu-item-fgs valign-wrapper">
          <a href="{{ route('top21.index') }}" {{ $menu_item == 4 ? 'class=active-fgs' : '' }}><i class="material-icons">star</i>Top 21</a>         
        </div>
      </li>
      <li><div class="divider-fgs"></div></li>
      <li>
        <div class="menu-item-fgs valign-wrapper">
          <a href="{{ route('resources.index', 1) }}" {{ $menu_item == 6 ? 'class=active-fgs' : '' }}><i class="material-icons">insert_photo</i>Imagenes</a>         
        </div>
      </li>
      <li>
        <div class="menu-item-fgs valign-wrapper">
          <a href="{{ route('resources.index', 2) }}" {{ $menu_item == 7 ? 'class=active-fgs' : '' }}><i class="material-icons">ondemand_video</i>Videos</a>         
        </div>
      </li>
      <li>
        <div class="menu-item-fgs valign-wrapper">
          <a href="{{ route('resources.index', 3) }}" {{ $menu_item == 9 ? 'class=active-fgs' : '' }}><i class="material-icons">audiotrack</i>Audios</a>         
        </div>
      </li>
      <li><div class="divider-fgs"></div></li>
      <li>
        <div class="menu-item-fgs valign-wrapper">
          <a href="{{ route('advertising.index') }}" {{ $menu_item == 5 ? 'class=active-fgs' : '' }}><i class="material-icons">monetization_on</i>Publicidad</a>         
        </div>
      </li>
      <li>
        <div class="menu-item-fgs valign-wrapper">
          <a href="{{ route('programs.index') }}" {{ $menu_item == 2 ? 'class=active-fgs' : '' }}><i class="material-icons">widgets</i>Programas</a>         
        </div>
      </li>
      <li>
        <div class="menu-item-fgs valign-wrapper">
          <a href="{{ route('abouts.index') }}" {{ $menu_item == 11 ? 'class=active-fgs' : '' }}><i class="material-icons">info</i>Acerca de</a>         
        </div>
      </li>
      <li>
        <div class="menu-item-fgs valign-wrapper">
          <a href="{{ route('staff.index') }}" {{ $menu_item == 3 ? 'class=active-fgs' : '' }}><i class="material-icons">people</i>Staff</a>         
        </div>
      </li>
      <li><div class="divider-fgs"></div></li>
      <li>
        <div class="menu-item-fgs valign-wrapper">
          <a href="{{ route('messages.index') }}" {{ $menu_item == 8 ? 'class=active-fgs' : '' }}>
            <i class="material-icons">chat</i>Mensajes
            @if(count($messages) > 0)
                <span class="right notification-lateral-fgs">{{ $messages }}</span>
            @endif
          </a>  
        </div>        
      </li>
      <li id="menu-messages-fgs"><div class="divider-fgs"></div></li>
      <li id="menu-messages-fgs">
        <div class="menu-item-fgs valign-wrapper">
          <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="material-icons">exit_to_app</i>Cerrar Sesión
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
          </form>
        </div>
      </li>
      <li><div class="divider-fgs"></div></li>
    </ul>
            