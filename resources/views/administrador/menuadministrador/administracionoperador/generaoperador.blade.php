
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
                    <h4 class="tittle-w3-agileits mb-4">Operadores  </h4>
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
                  @if ($message = Session::get('errors'))
                  <div class="alert alert-danger">
                      <p>{{ $message }}</p>
                  </div>
              @endif
              @if ($message = Session::get('warning'))
              <div class="alert alert-warning">
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
                                                Nombre 
                                            <br>                                           
                                        </th>                                        
                                        <th class="text-center">
                                                Rut 
                                            <br>                                          
                                        </th>
                                        <th class="text-center">
                                                Correo 
                                            <br>                                           
                                        </th>  
                                        <th class="text-center">
                                          Teléfono 
                                      <br>                                           
                                  </th>           
                                        
                                            <th class="text-center">
                                                    Fecha Alta
                                                    <br>                                                
                                                </th>
                                                
                                                    <th class="text-center">
                                                        Localización
                                                        <br>                                                    
                                                    </th>
                                            <th class="text-center">
                                                    Acción
                                                    <br>                                                
                                                </th>                                       
                                    </tr>
                        </thead>
                        <tbody>
                            @foreach($detalleoperador as $op)
                            <tr>
                                <th class="text-nowrap" scope="row">{{$op->NombreOperador}}</th>                                 
                                <td>{{$op->RutOperador}}</td>   
                                           
                                <td>{{$op->Correo}}</td>   
                                <td>{{$op->TelefonoOperador}}</td>                                                     
                                <td>{{$op->FechaAltaOperador}}</td>                                                        
                                <td>{{$op->LocalizacionOperador}}</td>  
                                
                                <td>                
             
                                            <a href="{{ route('administracionoperador.edit',Crypt::encrypt($op->RutOperador))}}" class="btn btn-secondary">Editar</a> 
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal2">
                                        Eliminar
                                      </button>   

                            </td>       
                            </tr>                                   
                            @endforeach    
                          

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
                                          <p>Desea eliminar  este operador.</p>
                                      </div>
                                      <div class="modal-footer">
                                          <form action="{{ route('administracionoperador.destroy', $op ?? 0)}}" method="post">
                                                  {{ csrf_field() }}
                                                  @method('DELETE')
                                                  <button class="btn btn-danger" type="submit">Eliminar</button>
                                                </form>                                      
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>                                      
                                    </div>
                                    </div>
                                  </div>
                                </div>    
                        </tbody>
                    </table>
                    {{ $detalleoperador->links() }}
                </div>              
         </section>    
                        <!-- Modal -->
                        
                        <div class="modal fade bd-example-modal-xl" id="fee-details1" tabindex="-1" role="dialog" aria-labelledby="fee-details-label" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-xl">
                                <div class="modal-content">
                                    <div class="modal-body">                                      
                                            <section class="grids-section bd-content">
                                                    <!-- Grids Info -->
                                                    <div class="outer-w3-agile mt-3">
                                                        <h4 class="tittle-w3-agileits mb-4">Operador 
                                                            </h4>
                                                        <table class="table table-bordered table-striped">
                                                            <thead>
                                                                <tr>                                                                    
                                                                    <th class="text-center">
                                                                            Nombre 
                                                                        <br>                                                                       
                                                                    </th>
                                                                    <th class="text-center">
                                                                            Email 
                                                                        <br>                                                                      
                                                                    </th>
                                                                    <th class="text-center">
                                                                            Localización 
                                                                        <br>                                                                       
                                                                    </th>      
                                                                    <th class="text-center">
                                                                            Teléfono
                                                                            <br>                                                                        
                                                                        </th>
                                                                      
                                                                            <th class="text-center">
                                                                                    Fecha de Alta
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
                                                                    
                                                                    <th class="text-nowrap" scope="row">Trabajador  1	 </th>
                                                                    <td>trabajador@trabajador.cl	</td>
                                                                    <td>BCI</td>
                                                                    <td>+5691234566	</td>
                                                                    <td>Activo</td>
                                                                    <td>23/04/2019	</td>

                                                                   
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
                                                            <h4 class="tittle-w3-agileits mb-4">Operador </h4>

                                                            <div class="container">
                                                                <form action="{{ route('administracionoperador.store') }}" method="POST">
                                                                        @csrf
                                          
                                                                            <div class="form-group row">
                                                                              <label for="inputnombre" class="col-sm-2 col-form-label">Nombre</label>
                                                                              <div class="col-sm-5">
                                                                                <input type="text" name="NombreOperador" class="form-control" id="inputnombre"  onfocus="this.value=''"  placeholder="Nombre">
                                                                              </div>
                                                                            </div>
                                                                          

                                                                            <div class="form-group row">
                                                                              <label for="inputrut" class="col-sm-2 col-form-label">Rut</label>
                                                                              <div class="col-sm-5">
                                                                                <input type="text" name="RutOperador" required oninput="checkRut(this)" class="form-control" id="inputrut"  onfocus="this.value=''"  placeholder="Rut">
                                                                              </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="inputpassword" class="col-sm-2 col-form-label">Password</label>
                                                                                <div class="col-sm-5">
                                                                                  <input type="password" name="Password" class="form-control" id="inputpassword"  onfocus="this.value=''"  placeholder="Password">
                                                                                </div>
                                                                              </div>
                                                                         

                                                                            <div class="form-group row">
                                                                              <label for="inputemail" class="col-sm-2 col-form-label">Email</label>
                                                                              <div class="col-sm-5">
                                                                                <input type="text" name="Correo" class="form-control" id="inputemail"   onfocus="this.value=''" placeholder="Email">
                                                                              </div>
                                                                            </div>

                                                                            <div class="form-group row">
                                                                              <label for="inputtelefono" class="col-sm-2 col-form-label">Teléfono</label>
                                                                              <div class="col-sm-5">
                                                                                <input type="text"  name="TelefonoOperador" class="form-control" id="inputtelefono"   maxlength="10" onfocus="this.value=''" placeholder="Teléfono">
                                                                              </div>
                                                                            </div> 

                                                                        
      
                                                                          <div class="form-group row">
                                                                              <label for="inputlocalizacion" class="col-sm-2 col-form-label">Localización</label>
                                                                              <div class="col-sm-5">
                                                                                <input type="text" name="LocalizacionOperador" class="form-control" id="inputlocalizacion"   onfocus="this.value=''" placeholder="Localización">
                                                                              </div>
                                                                            </div>                                                     </div>
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
    
 