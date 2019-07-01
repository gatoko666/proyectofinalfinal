

<!-- Page Content Holder -->
<div id="content">
    <!-- top-bar -->
    <nav class="navbar navbar-default mb-xl-5 mb-4">
        <div class="container-fluid">

            <div class="navbar-header">
                <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
           
            <!--// Search-from -->
            <ul class="top-icons-agileits-w3layouts float-right">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="far fa-bell"></i>
                         
                    </a>
                  
                </li>
                <li class="nav-item dropdown mx-3">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="fas fa-spinner"></i>
                    </a>
                  
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="far fa-user"></i>
                    </a>
                    <div class="dropdown-menu drop-3">
                        <div class="profile d-flex mr-o">
                            
                            <div class="profile-r align-self-center">
                                <h3 class="sub-title-w3-agileits"> {{ Auth::user()->NombreOperador }}</h3>
                                <a href="mailto:info@example.com">{{ Auth::user()->Correo }}</a>
                            </div>
                        </div>
                        <a href="{{ url('perfiloperador')}}" class="dropdown-item mt-3">
                            <h4>
                                <i class="far fa-user mr-3"></i>Mi Perfil</h4>
                        </a>
                        
                        <a href="{{ url('revisarsolicitud')}}" class="dropdown-item mt-3">
                            <h4>
                                <i class="far fa-envelope mr-3"></i>Solicitudes</h4>
                        </a>
                       
                       
                        <div class="dropdown-divider"></div>


                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

 


    

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
            

