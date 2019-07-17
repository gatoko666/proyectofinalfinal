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
            <a href="{{url('indexoperador')}}">
                <i class="fas fa-th-large"></i>
                Dashboard
            </a>
        </li>  

             
                        <li>
                                <a href="{{ url('turnosoperador')}}">
                                        <i class="fas fa-calendar-minus"></i>                                                                         
                                        Revisar Turnos                                    
                                    </a>                             
                        </li>

                        <li>
                                <a href="{{url('solicitud')}}">
                                    
                                        <i class="fas fa-file"></i>                                                                          
                                        Realizar Solicitud                                      
                                    </a>                             
                        </li>

                        <li>
                                <a href="{{url('documentosoperador')}}">
                                        <i class="fas fa-file-pdf"></i>                                   
                                        Revisar Documento                                      
                                    </a>                             
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