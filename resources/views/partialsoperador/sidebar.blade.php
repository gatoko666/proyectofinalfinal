<nav id="sidebar">
    <div class="sidebar-header">
        <h1>
            <a href="{{ url('indexoperador')}}">Adturn</a>
        </h1>
        <span>M</span>
    </div>
    <div class="profile-bg"></div>
    <ul class="list-unstyled components">
        <li class="active">
            <a href="{{ url('indexoperador')}}"">
                <i class="fas fa-th-large"></i>
                Dashboard
            </a>
        </li>
   

        
            <li>
                <a href="#homeSubmenu6" data-toggle="collapse" aria-expanded="false">
                    <i class="fas fa-calendar-minus"></i>
                    Turnos
                    <i class="fas fa-angle-down fa-pull-right"></i>
                </a>
                <ul class="collapse list-unstyled" id="homeSubmenu6">
                    <li>
                        <a href="{{ url('turnosoperador')}}">Revisar Turnos</a>
                    </li>
                    
                    <li>
                        <a href="{{ url('solicitud')}}">Realizar Solicitud</a>
                    </li>
                    <li>
                            <a href="{{ url('revisarsolicitud')}}">Revisar Estado Solicitud</a>
                        </li>
                    
                        
                       
                            
                     
                </ul>
            </li>       
              

                        <li>
                                <a href="#homeSubmenu5" data-toggle="collapse" aria-expanded="false">
                                    <i class="fas fa-file"></i>
                                    Documentos
                                    <i class="fas fa-angle-down fa-pull-right"></i>
                                </a>
                                <ul class="collapse list-unstyled" id="homeSubmenu5">                                  
                                    <li>
                                        <a href="{{ url('documentosoperador')}}">Revisar archivos</a>
                                    </li>                                    
                                </ul>
                            </li>


        <li>
            <a href="{{ url('revisarsolicitud')}}">
                <i class="far fa-envelope"></i>
                Revisar Estado Solicitud
              
            </a>
        </li>       
        <li>
                <a href="{{ url('perfiloperador')}}">
                    <i class="fas fa-user"></i>
                    Perfil
                </a>
            </li>
    

    </ul>
</nav>