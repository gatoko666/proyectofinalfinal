<nav id="sidebar">
    <div class="sidebar-header">
        <h1>
                <a href="{{ url('indexadministrador')}}">Adturn</a>
        </h1>
        <span>M</span>
    </div>
    <div class="profile-bg"></div>
    <ul class="list-unstyled components">
        <li class="active">
            <a href="{{ url('indexadministrador')}}">
                <i class="fas fa-th-large"></i>
                Dashboard
            </a>
        </li>
   

        <li>
                <a href="{{ url('#homeSubmenu1')}}" data-toggle="collapse" aria-expanded="false">
                    <i class="fas fa-calendar-alt"></i>
                    Planificador
                    <i class="fas fa-angle-down fa-pull-right"></i>
                </a>
                <ul class="collapse list-unstyled" id="homeSubmenu1">
                    
                     
                <li>
                    <a href="{{ url('administracionoperador')}}">Administrar trabajadores</a>
                </li>                   
                

                    <li>
                        <a href="{{ url('generarturnos')}}">Generar turnos</a>
                    </li>
                    <li>
                        <a href="{{ url('revisarturnos')}}">Revisar Turnos</a>
                    </li>
                   

                    <li>
                        <a href="{{ url('tiposdeturnos')}}">Tipos de turno</a>
                    </li>
                     
                </ul>
            </li>

            <li>
                <a href="{{ url('#homeSubmenu6')}}" data-toggle="collapse" aria-expanded="false">
                    <i class="fas fa-calendar-minus"></i>
                    Turnos
                    <i class="fas fa-angle-down fa-pull-right"></i>
                </a>
                <ul class="collapse list-unstyled" id="homeSubmenu6">
                    <li>
                        <a href="{{ url('revisarturnos')}}">Revisar Turnos</a>
                    </li>
                   
              
                </ul>
            </li>


     

              

                        <li>
                                <a href="{{ url('#homeSubmenu5')}}" data-toggle="collapse" aria-expanded="false">
                                    <i class="fas fa-file"></i>
                                    Documentos
                                    <i class="fas fa-angle-down fa-pull-right"></i>
                                </a>
                                <ul class="collapse list-unstyled" id="homeSubmenu5">
                                    
                                    <li>
                                        <a href="{{ url('documentos')}}">Revisar archivos</a>
                                    </li>
                                    
                                </ul>
                            </li>


        <li>
            <a href="{{ url('revisarsolicitudadmin')}}">
                <i class="far fa-envelope"></i>
                Solicitudes
               
            </a>
        </li>
        
        <li>
                <a href="{{ url('perfil')}}">
                    <i class="fas fa-user"></i>
                    Perfil
                </a>
            </li>
    

    </ul>
</nav>