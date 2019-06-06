
    @include('partials/header')    
    <body>
        <div class="se-pre-con"></div>
        <div class="wrapper">
            <!-- Sidebar Holder -->           
            @include('partials/sidebar')
            <!-- Page Content Holder -->
            @include('partials/menu')
                <!--// top-bar -->
         <section class="grids-section bd-content">
                <!-- Grids Info -->
                <div class="outer-w3-agile mt-3">
                    <h4 class="tittle-w3-agileits mb-4">Tipos de turnos </h4>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br />
                    @endif
                      <br>
                      @if ($message = Session::get('success'))
                      <div class="alert alert-success">
                          <p>{{ $message }}</p>
                      </div>
                  @endif     
                    <br>
                    
                    <table class="table table-bordered table-striped">

                            <thead>
                                    <tr>
                                        
                                        <th class="text-center">
                                             
                                            <br>
                                           
                                        </th>
                                        <th class="text-center">
                                             
                                                <br>
                                               
                                            </th>
                                        <th class="text-center">
 
                                            <br>
                                          
                                        </th>
                                       
                                       
                                        <th class="text-center">
                                             
                                            <br>
                                        
                                        </th>
                                        <th class="text-center">
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal3">
                                                        <a href="#fee-details2" data-toggle="modal">Agregar</a>
                            
                                                        
                                                      </button> 
                                                <br>
                                            
                                            </th>                                      
                                    </tr>
                                </thead>                        
                        <thead>
                            <tr>                                
                                <th class="text-center">
                                    Abreviatura
                                    <br>                                   
                                </th>
                                <th class="text-center">
                                    Descripción
                                    <br>                                  
                                </th>
                                <th class="text-center">
                                    Inicio
                                    <br>                                   
                                </th>                               
                                <th class="text-center">
                                    Término
                                    <br>                                
                                </th>                               
                                    <th class="text-center">
                                            Acción
                                            <br>                                        
                                        </th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($detalletiposdeturnos as $dtt)
                            <tr>
                                <th class="text-nowrap" scope="row">{{$dtt->AbreviacionTurno}}</th>
                                <td>{{$dtt->DescripcionDetalleTipoTurno}}</td>
                                <td>{{$dtt->HoraInicioTurno}}</td>
                                <td>{{$dtt->HoraTerminoTurno}}</td>    
                                <td>          
                                <a href="{{ route('tiposdeturnos.edit',$dtt)}}" class="btn btn-secondary">Editar</a>     
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal2">
                                        Eliminar
                                      </button>   
                            </td>       
                            </tr>                                   
                            @endforeach   
                            <tr>    
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel1">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        Modal 1
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                <!-- Modal 2 -->
                                <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel2">Confirmación</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                            <p>Desea eliminar  este tipo de turno.</p>
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{ route('tiposdeturnos.destroy', $dtt ?? 0)}}" method="post">
                                                    {{ csrf_field() }}
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="submit">Eliminar</button>
                                                  </form>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                        
                                      </div>
                                    </div>
                                  </div>
                                </div>  
                               
                            </tr>                           
                           
                        </tbody>
                    </table>
                    {{ $detalletiposdeturnos->links() }}
                </div>
         </section>      
                        <!-- Modal -->
                        <div class="modal fade" id="fee-details1" tabindex="-1" role="dialog" aria-labelledby="fee-details-label" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-xl">
                                <div class="modal-content">
                                    
                                    <div class="modal-body">
                                      
                                            <section class="grids-section bd-content">
                                                    <!-- Grids Info -->
                                                    <div class="outer-w3-agile mt-3">
                                                        <h4 class="tittle-w3-agileits mb-4">Editar Turnos</h4>
                                                        <table class="table table-bordered table-striped">
                                                            <thead>
                                                                <tr>
                                                                    
                                                                    <th class="text-center">
                                                                            Abreviatura 
                                                                        <br>
                                                                       
                                                                    </th>
                                                                    <th class="text-center">
                                                                            Descripción 
                                                                        <br>
                                                                      
                                                                    </th>
                                                                    <th class="text-center">
                                                                            Inicio 
                                                                        <br>
                                                                       
                                                                    </th>
                                                                   
                                                                    <th class="text-center">
                                                                            Término 
                                                                        <br>
                                                                    
                                                                    </th>
                                                                    <th class="text-center">
                                                                            Acción
                                                                            <br>
                                                                        
                                                                        </th>
                                                                   
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    
                                                                    <th class="text-nowrap" scope="row">TM</th>
                                                                    <td>Turno de mañana	</td>
                                                                    <td>08:00	</td>
                                                                    <td>17:00	</td>
                                                                    <td>
                                                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal3">
                                                                                    Guardar Cambio
                                                                            </button>
                                    
                                                                    </td>
                                                                     
                                                                </tr>
                                                               
                                                               
                                                            </tbody>
                                                        </table>
                                                    </div>
                                    
                                             </section>
                                             <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>                                                 
                                                  </div>                                          
                                    
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                        <div class="modal fade" id="fee-details2" tabindex="-1" role="dialog" aria-labelledby="fee-details-label" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-xl">
                                    <div class="modal-content">
                                        
                                        <div class="modal-body">
                                            
                                          
                                                <section class="grids-section bd-content">
                                                        <!-- Grids Info -->
                                                        <div class="outer-w3-agile mt-3">
                                                            <h4 class="tittle-w3-agileits mb-4">Tipos de turnos</h4>

                                                            <div class="container">
                                                                <form action="{{ route('tiposdeturnos.store') }}" method="POST">
                                                                    @csrf                                          
                                                                            <div class="form-group row">
                                                                              <label for="inputdescripcion" class="col-sm-2 col-form-label">Descripción</label>
                                                                              <div class="col-sm-5">
                                                                                <input type="text"  name="DescripcionDetalleTipoTurno" class="form-control" id="inputdescripcion" placeholder="Descripción">
                                                                              </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                    <label for="inputabreviatura" class="col-sm-2 col-form-label">Abreviatura</label>
                                                                                    <div class="col-sm-5">
                                                                                      <input type="text"  name="AbreviacionTurno" class="form-control" id="inputabreviatura" placeholder="Abreviatura">
                                                                                    </div>
                                                                                  </div>                                                                                
                                                                                  <div class="form-group row">
                                                                                        <label for="inputhorainicio" class="col-sm-2 col-form-label">Hora inicio</label>
                                                                                        <div class="col-sm-5">
                                                                                          <input type="time" name="HoraInicioTurno" class="form-control" id="inputhorainicio" placeholder="Hora inicio">
                                                                                        </div>
                                                                                      </div>
                                                                                      <div class="form-group row">
                                                                                          <label for="inputtermino" class="col-sm-2 col-form-label">Hora Termino</label>
                                                                                          <div class="col-sm-5">
                                                                                            <input type="time" name="HoraTerminoTurno" class="form-control" id="inputtermino" placeholder="Hora Termino">
                                                                                          </div>
                                                                                        </div>                                                                                  
                                                                            </div>
                                                                            <button type="submit" class="btn btn-primary ">Agregar</button>
                                                                          </form>                               
                                                            </div> 
                                                        </div>                                        
                                                 </section>
                                                 <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>                                                     
                                                      </div>     
                                        </div>                                        
                                    </div><!-- /.modal-content -->                                    
                                </div><!-- /.modal-dialog -->
                                @include('partials/footer')
                            </div><!-- /.modal -->   
                <!--// Countdown -->
                <!-- Copyright -->
            </div>          
                <!--// Copyright -->
            </div>
        </div>
            
        <!-- Required common Js -->
        <script src='js/jquery-2.2.3.min.js'></script>
        <!-- //Required common Js -->
        
        <!-- loading-gif Js -->
        <script src="js/modernizr.js"></script>
        <script>
            //paste this code under head tag or in a seperate js file.
            // Wait for window load
            $(window).load(function () {
                // Animate loader off screen
                $(".se-pre-con").fadeOut("slow");;
            });
        </script>
        <!--// loading-gif Js -->
    
        <!-- Sidebar-nav Js -->
        <script>
            $(document).ready(function () {
                $('#sidebarCollapse').on('click', function () {
                    $('#sidebar').toggleClass('active');
                });
            });
        </script>
        <!--// Sidebar-nav Js -->
     
    
        <!-- dropdown nav -->
        <script>
            $(document).ready(function () {
                $(".dropdown").hover(
                    function () {
                        $('.dropdown-menu', this).stop(true, true).slideDown("fast");
                        $(this).toggleClass('open');
                    },
                    function () {
                        $('.dropdown-menu', this).stop(true, true).slideUp("fast");
                        $(this).toggleClass('open');
                    }
                );
            });
        </script>
        <!-- //dropdown nav -->
    
        <!-- Js for bootstrap working-->
        <script src="js/bootstrap.min.js"></script>
        <!-- //Js for bootstrap working -->
    
    </body>
    
 