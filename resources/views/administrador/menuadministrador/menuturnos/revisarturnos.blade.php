 
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
                    <h4 class="tittle-w3-agileits mb-4">Mis Turnos</h4>
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
                    <div class="container">
                            Fecha
    
                                <input id="datepicker1"  onfocus="this.value=' '"  width="276" />
                                <script>
                                    $('#datepicker1').datepicker({
                                        uiLibrary: 'bootstrap4'
                                    });
                                </script>
                             
                                <button type="button" class="btn btn-primary">
                                        Buscar
                                           
                                        </button> 
    
                            </div>
                      
                            <br>









                            <h4 class="tittle-w3-agileits mb-4">Semana 1</h4>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Trabajadores</th>
                                <th class="text-center">
                                    Lunes
                                    <br>
                                  
                                </th>
                                <th class="text-center">
                                    Martes
                                    <br>
                                   
                                </th>
                                <th class="text-center">
                                    Miercoles
                                    <br>
                                    
                                </th>
                                <th class="text-center">
                                    Jueves
                                    <br>
                                   
                                </th>
                                <th class="text-center">
                                    Viernes
                                    <br>
                                    
                                </th>
                                <th class="text-center">
                                    Sábado
                                    <br>
                                   
                                </th>
                                <th class="text-center">
                                    Domingo
                                    <br>
                                   
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                      
                            <tr>

                                @foreach ($turnoOperador as $item)                                  
                                <th class="text-nowrap" scope="row">{{$item->NombreOperador}}</th>  
                                <td   class="text-nowrap" scope="row">{{$item->AbreviacionTurno}}</td>  




                                <td  onload="firstDayOfWeek()"  class="text-nowrap" id="numerosemana" scope="row">{{$item->NumeroSemanaAno}} 
                                <p onload="test()"  id="d"></p>    
                                
                                </td> 
                                


                                <td   class="text-nowrap" scope="row">{{$item->DiaSemana }}</td>  
                               
                            </tr>          
                                             
                            @endforeach                        
                           
   
                                      
                             
                                                              
                                                       







                        
                           
                        </tbody>
                    </table>










                    <br>

                    <h4 class="tittle-w3-agileits mb-4">Semana 2</h4>

  <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Trabajadores</th>
                                <th class="text-center">
                                    Lunes
                                    <br>
                                  
                                </th>
                                <th class="text-center">
                                    Martes
                                    <br>
                                   
                                </th>
                                <th class="text-center">
                                    Miercoles
                                    <br>
                                    
                                </th>
                                <th class="text-center">
                                    Jueves
                                    <br>
                                   
                                </th>
                                <th class="text-center">
                                    Viernes
                                    <br>
                                    
                                </th>
                                <th class="text-center">
                                    Sábado
                                    <br>
                                   
                                </th>
                                <th class="text-center">
                                    Domingo
                                    <br>
                                   
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th class="text-nowrap" scope="row">Trabajador 1</th>
                                <td>TM</td>
                                <td>TT</td>
                                <td>L</td>
                                <td>TM</td>
                                <td>L</td>
                                <td>TM</td>
                                <td>TM</td>
                            </tr>
                            <tr>
                                <th class="text-nowrap" scope="row">Trabajador 2</th>
                                <td>TM</td>
                                <td>TT</td>
                                <td>L</td>
                                <td>TM</td>
                                <td>L</td>
                                <td>TM</td>
                                <td>TM</td>
                            </tr>

                            <tr>
                                <th class="text-nowrap" scope="row">Trabajador 3</th>
                                <td>TM</td>
                                <td>TT</td>
                                <td>L</td>
                                <td>TM</td>
                                <td>L</td>
                                <td>TM</td>
                                <td>TM</td>
                            </tr>
                            <tr>
                                <th class="text-nowrap" scope="row">Trabajador 4</th>
                                <td>TM</td>
                                <td>TT</td>
                                <td>L</td>
                                <td>TM</td>
                                <td>L</td>
                                <td>TM</td>
                                <td>TM</td>
                            </tr>
                            <tr>
                                <th class="text-nowrap" scope="row">Trabajador 5</th>
                                <td>TM</td>
                                <td>TT</td>
                                <td>L</td>
                                <td>TM</td>
                                <td>L</td>
                                <td>TM</td>
                                <td>TM</td>
                            </tr>
                        
                           
                        </tbody>
                    </table>
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
    
 