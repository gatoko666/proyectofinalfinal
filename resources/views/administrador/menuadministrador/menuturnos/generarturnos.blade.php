
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
                    <h4 class="tittle-w3-agileits mb-4">Turnos</h4>
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
                  @endif   <br>
                  @if (session('error'))
                  <div class="alert alert-danger">
                      {{ session('error') }}
                  </div>
              @endif  
                    <div class="container">
                           
                            <form action="{{ route('generarturnos.store') }}" method="POST">
                                    @csrf
                                        
    
                            </div>
                            <div class="container">
                                    <div class="row">    
                                      <div class="col-sm-md-lg-xl">
                                        Selección semana para asignar turnos
                                      </div>                                      
                                      <div class="col-sm-md-lg-xl">
                                            <p align="justify"> <input name="NumeroSemanaAno"  value="NumeroSemanaAno" type="week"> </p>
                                      </div>
                                    </div>
                                  </div>                      
                            <br>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                      <tr>                                       
                                        <th scope="col">Trabajadores</th>
                                        <th scope="col"> Rut Operador</th>
                                        <input   name="DiaSemanal"  value="Lunes"  type="hidden"  >
                                        <th scope="col">Lunes</th>
                                        <input   name="DiaSemanam"  value="Martes"  type="hidden"  >
                                        <th scope="col">Martes</th>
                                        <input   name="DiaSemanamm"  value="Miercoles"  type="hidden"  >
                                        <th scope="col">Miercoles</th>
                                        <input   name="DiaSemanaj"  value="Jueves"  type="hidden"  >
                                        <th scope="col">Jueves</th>
                                        <input   name="DiaSemanav"  value="Viernes"  type="hidden"  >
                                        <th scope="col">Viernes</th>
                                        <input   name="DiaSemanas"  value="Sabado"  type="hidden"  >
                                        <th scope="col">Sábado</th>
                                        <input   name="DiaSemanad"  value="Domingo"  type="hidden"  >
                                        <th scope="col">Domingo</th>
                          


                                      </tr>
                                    </thead>
                                    <tbody>
                                     @foreach($detalleoperador as $op) 
                                      <tr>
                                            <input   name="NombreTrabajadori[]"  value="{{$op->NombreOperador}}"  type="hidden"  >
                                        <th scope="row" name="NombreTrabajador" >
                                                {{$op->NombreOperador}}

                                        </th>
                                        <input   name="RutTrabajadori[]"  value="{{$op->RutOperador}}"  type="hidden"  > 
                                        <td name="RutTrabajador[]"  value="{{$op->RutOperador}}"> 
                                                {{$op->RutOperador}}
                                        </td>                                        
                                        <td>
                                            <input   name="CorreoTrabajadori[]"  value="{{$op->Correo}}"  type="hidden"  >
                                                <p align="justify"><select name="nombreturnol[]" >
                                                        @foreach($detalletiposdeturnos as $dtt)  
                                                        <option value="{{$dtt->IdDetalleTipoTurno}}"selected>{{$dtt->AbreviacionTurno}}</option> 
                                                          @endforeach    
                                                        </select> 
                                                </p>                                                        
                                           </td>
                                           <td>
                                                <p align="justify"><select name="nombreturnom[]" >
                                                        @foreach($detalletiposdeturnos as $dtt)
                                                        <option value="{{$dtt->IdDetalleTipoTurno}}"selected>{{$dtt->AbreviacionTurno}}</option> 
                                                         @endforeach                                                        
                                                        </select> 
                                                </p>                                                        
                                           </td>
                                           <td>
                                                <p align="justify"><select name="nombreturnomm[]" >
                                                        @foreach($detalletiposdeturnos as $dtt)
                                                        <option value="{{$dtt->IdDetalleTipoTurno}}"selected>{{$dtt->AbreviacionTurno}}</option> 
                                                          @endforeach  
                                                        </select> 
                                                </p>                                                        
                                           </td>
                                           <td>
                                                <p align="justify"><select name="nombreturnoj[]" >
                                                        @foreach($detalletiposdeturnos as $dtt)  
                                                        <option value="{{$dtt->IdDetalleTipoTurno}}"selected>{{$dtt->AbreviacionTurno}}</option> 
                                                       @endforeach                                                        
                                                        </select> 
                                                </p>                                                        
                                           </td>
                                           <td>
                                                <p align="justify"><select name="nombreturnov[]" >
                                                        @foreach($detalletiposdeturnos as $dtt)
                                                        <option value="{{$dtt->IdDetalleTipoTurno}}"selected>{{$dtt->AbreviacionTurno}}</option> 
                                                        @endforeach   
                                                        </select> 
                                                </p>                                                        
                                           </td>
                                           <td>
                                                <p align="justify"><select name="nombreturnos[]" >
                                                        @foreach($detalletiposdeturnos as $dtt)   
                                                        <option value="{{$dtt->IdDetalleTipoTurno}}"selected>{{$dtt->AbreviacionTurno}}</option> 
                                                       @endforeach                                                        
                                                        </select> 
                                                </p>                                                        
                                           </td>
                                           <td>
                                                <p align="justify"><select name="nombreturnod[]" >
                                                        @foreach($detalletiposdeturnos as $dtt)
                                                        <option value="{{$dtt->IdDetalleTipoTurno}}"selected>{{$dtt->AbreviacionTurno}}</option> 
                                                        @endforeach  
                                                        </select> 
                                                </p>                                                        
                                           </td>
                                      </tr>
                                     
                                      @endforeach  
                                    </tbody>
                                  </table>
    
    
    
    
    
                              </div>

                            





 
                    <button type="submit"class="btn btn-primary">Publicar turnos</button>                   
                </form>
                </div>
                         
         </section>         

        







                <!--// Countdown -->
                <!-- Copyright -->

                @include('partials/footer')



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
    
     
        <!-- Bar-chart -->
        <script src="js/rumcaJS.js"></script>
        <script src="js/example.js"></script>
        <!--// Bar-chart -->
        <!-- Calender -->
        <script src="js/moment.min.js"></script>
        <script src="js/pignose.calender.js"></script>
     
    
        <!-- profile-widget-dropdown js-->
        <script src="js/script.js"></script>
        <!--// profile-widget-dropdown js-->
     
    
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
    
 