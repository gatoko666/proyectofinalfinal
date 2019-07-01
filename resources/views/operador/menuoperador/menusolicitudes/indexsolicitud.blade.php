
    @include('partialsoperador/header')
    
    
    <body>
        <div class="se-pre-con"></div>
        <div class="wrapper">


            <!-- Sidebar Holder -->
           
            @include('partialsoperador/sidebar')
            <!-- Page Content Holder -->


            @include('partialsoperador/menu')
                <!--// top-bar -->
                <section class="grids-section bd-content">
                        <!-- Grids Info -->

                    






                        <div class="outer-w3-agile mt-3">
                            <h4 class="tittle-w3-agileits mb-4">Realizar Solicitud  </h4>
                            <br>
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
                       
                            
                            @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <div class="container">
                                    <div class="container">

                                       
                                                  <div class="tab-content" id="nav-tabContent">

                                                       
                                                          <br>
                                                         
                                                              
                                                            
                                                              
                                                    <div class="tab-pane fade show active" id="dia-libre" role="tabpanel" aria-labelledby="nav-home-tab">
                                                            <form action="{{route('realizarsolicitud')}}" method="POST" form autocomplete="off" >                                                             
                                                                    {{ csrf_field() }}   
                                                                    <div class="form-group row">
                                                                            <label for="inputtiposolicitud" class="col-sm-2 col-form-label">Tipo de Solicitud</label>
                                                                            <div class="col-sm-5">
                                                                                    

                                                                                    <select name="tipoDeSolicitud" class="custom-select">
                                                                                            <option value="DiaLibre">Solicitud Día libre</option>
                                                                                            <option value="Vacacion">Solicitud Vacaciones</option>
                                                                                            <option value="DiaAdministrativo">Solicitud Día Administrativo</option>
                                                                                            <option value="InformarLicencia">Solicitud Informar Licencia</option>
                                                                                            <option value="InformarAusencia">Solicitud Ausencia</option>
                                                                                          </select>
                                                                                            


                                                                                   </div>
                                                                          </div>


                                                                   
                                                                    <div class="form-group row"  id="solicitud-dialibre">
                                                                            <label for="staticEmail" class="col-sm-2 col-form-label">Trabajador</label>
                                                                            <div class="col-sm-5">
                                                                                    <input type="text" class="form-control" id="inputdescripcion"  readonly  name="NombreOperador"  value="{{ Auth::user()->NombreOperador
                                                                                    }}"  placeholder="{{ Auth::user()->NombreOperador
                                                                                    }}">
                                                                            </div>
                                                                          </div>
                                                                          <div class="form-group row">
                                                                            <label for="inputlocalizacion" class="col-sm-2 col-form-label">Localización</label>
                                                                            <div class="col-sm-5">
                                                                                    <input type="text" class="form-control" id="inputdescripcion"  name="LocalizacionOperador" value="{{ Auth::user()->LocalizacionOperador}}"   readonly placeholder="{{ Auth::user()->LocalizacionOperador}}">
                                                                            </div>
                                                                          </div>
                              
                                                                            <div class="form-group row">
                                                                            <label for="inputdesde" class="col-sm-2 col-form-label">Desde</label>
                                                                            <div class="col-sm-10">
                                                                                    

                                                                                  <input id="datepicker1" onfocus="this.value=''" name="desdeSolicitud" width="276" />
                                                                                              <script>
                                                                                                  $('#datepicker1').datepicker({dateFormat: 'yy-mm-dd',
                                                                                                      uiLibrary: 'bootstrap4'
                                                                                                  });
                                                                              </script>
                                                                          </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                            <label for="inputhasta" class="col-sm-2 col-form-label">Hasta</label>
                                                                            <div class="col-sm-10">
                                                                                  <input id="datepicker2" onfocus="this.value=''" name="hastaSolicitud" width="276" />
                                                                                  <script>
                                                                                      $('#datepicker2').datepicker({dateFormat: 'yy-mm-dd',
                                                                                          uiLibrary: 'bootstrap4'
                                                                                      });
                                                                                  </script>
                                                                             
                                                                            </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                    <label for="inputcomentario" class="col-sm-2 col-form-label">Comentario</label>
                                                                                    <div class="col-sm-5">
                                                                                      <input type="text" maxlength="255" name="Comentario" class="form-control" id="inputcomentario" placeholder="Comentario">
                                                                                    </div>
                                                                                    </div>   
                                                                    <button type="submit" class="btn btn-primary">Enviar</button>
                                                                  </form>
                                                        



                                                    </div>
                                                    <div class="tab-pane fade" id="sol-vacacion" role="tabpanel" aria-labelledby="nav-profile-tab">
                                                        
                                                            <form   method="POST" >
                                                                    {{ csrf_field() }}   

                                                                    <div class="form-group row"  id="solicitud-dialibre">
                                                                            <label for="staticEmail" class="col-sm-2 col-form-label">Trabajador</label>
                                                                            <div class="col-sm-5">
                                                                                    <input type="text" class="form-control" id="inputdescripcion"  readonly  name="{{ Auth::user()->NombreOperador
                                                                                    }}"  value="{{ Auth::user()->NombreOperador
                                                                                    }}"  placeholder="{{ Auth::user()->NombreOperador
                                                                                    }}">
                                                                            </div>
                                                                          </div>
                                                                          <div class="form-group row">
                                                                            <label for="inputlocalizacion" class="col-sm-2 col-form-label">Localización</label>
                                                                            <div class="col-sm-5">
                                                                                    <input type="text" class="form-control" id="inputdescripcion"  name="{{ Auth::user()->LocalizacionOperador}}" value="{{ Auth::user()->LocalizacionOperador}}"   readonly placeholder="{{ Auth::user()->LocalizacionOperador}}">
                                                                            </div>
                                                                          </div>
                              
                                                                            <div class="form-group row">
                                                                            <label for="inputdesde" class="col-sm-2 col-form-label">Desde</label>
                                                                            <div class="col-sm-10">
                                                                                  <input id="datepicker3" width="276" />
                                                                                              <script>
                                                                                                  $('#datepicker3').datepicker({
                                                                                                      uiLibrary: 'bootstrap4'
                                                                                                  });
                                                                              </script>
                                                                          </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                            <label for="inputhasta" class="col-sm-2 col-form-label">Hasta</label>
                                                                            <div class="col-sm-10">
                                                                                  <input id="datepicker4" width="276" />
                                                                                  <script>
                                                                                      $('#datepicker4').datepicker({
                                                                                          uiLibrary: 'bootstrap4'
                                                                                      });
                                                                                  </script>
                                                                             
                                                                            </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                    <label for="inputcomentario" class="col-sm-2 col-form-label">Comentario</label>
                                                                                    <div class="col-sm-5">
                                                                                      <input type="text" maxlength="255" class="form-control" id="inputcomentario" placeholder="Comentario">
                                                                                    </div>
                                                                                    </div>   
                                                                    <button type="submit" class="btn btn-primary">Enviar</button>
                                                                  </form>




                                                    </div>
                                                    <div class="tab-pane fade" id="sol-dia-administrativo" role="tabpanel" aria-labelledby="nav-contact-tab">
                                                            <form   method="POST" >
                                                                    {{ csrf_field() }}   
                                                                    <input type="hidden" name="solicitarAusencia" >
                                                                    <div class="form-group row"  id="solicitud-dialibre">
                                                                            <label for="staticEmail" class="col-sm-2 col-form-label">Trabajador</label>
                                                                            <div class="col-sm-5">
                                                                                    <input type="text" class="form-control" id="inputdescripcion"  readonly  name="NombreOperador
                                                                                    "  value="{{ Auth::user()->NombreOperador
                                                                                    }}"  placeholder="{{ Auth::user()->NombreOperador
                                                                                    }}">
                                                                            </div>
                                                                          </div>
                                                                          <div class="form-group row">
                                                                            <label for="inputlocalizacion" class="col-sm-2 col-form-label">Localización</label>
                                                                            <div class="col-sm-5">
                                                                                    <input type="text" class="form-control" id="inputdescripcion"  name="LocalizacionOperador" value="{{ Auth::user()->LocalizacionOperador}}"   readonly placeholder="{{ Auth::user()->LocalizacionOperador}}">
                                                                            </div>
                                                                          </div>
                              
                                                                            <div class="form-group row">
                                                                            <label for="inputdesde" class="col-sm-2 col-form-label">Desde</label>
                                                                            <div class="col-sm-10">
                                                                                  <input id="datepicker5" width="276" />
                                                                                              <script>
                                                                                                  $('#datepicker5').datepicker({
                                                                                                      uiLibrary: 'bootstrap4'
                                                                                                  });
                                                                              </script>
                                                                          </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                            <label for="inputhasta" class="col-sm-2 col-form-label">Hasta</label>
                                                                            <div class="col-sm-10">
                                                                                  <input id="datepicker6" width="276" />
                                                                                  <script>
                                                                                      $('#datepicker6').datepicker({
                                                                                          uiLibrary: 'bootstrap4'
                                                                                      });
                                                                                  </script>
                                                                             
                                                                            </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                    <label for="inputcomentario" class="col-sm-2 col-form-label">Comentario</label>
                                                                                    <div class="col-sm-5">
                                                                                      <input type="text" maxlength="255"  name="comentario"   class="form-control" id="inputcomentario" placeholder="Comentario">
                                                                                    </div>
                                                                                    </div>   
                                                                    <button type="submit" class="btn btn-primary">Enviar</button>
                                                                  </form>
                                                    </div>

                                                    <div class="tab-pane fade" id="sol-licencia" role="tabpanel" aria-labelledby="nav-contact-tab">
                                                            <form   method="POST" >
                                                                    {{ csrf_field() }}   
                                                                    <input type="hidden" name="solicitarLicencia" >
                                                                    <div class="form-group row"  id="solicitud-dialibre">
                                                                            <label for="staticEmail" class="col-sm-2 col-form-label">Trabajador</label>
                                                                            <div class="col-sm-5">
                                                                                    <input type="text" class="form-control" id="inputdescripcion"  readonly  name="{{ Auth::user()->NombreOperador
                                                                                    }}"  value="{{ Auth::user()->NombreOperador
                                                                                    }}"  placeholder="{{ Auth::user()->NombreOperador
                                                                                    }}">
                                                                            </div>
                                                                          </div>
                                                                          <div class="form-group row">
                                                                            <label for="inputlocalizacion" class="col-sm-2 col-form-label">Localización</label>
                                                                            <div class="col-sm-5">
                                                                                    <input type="text" class="form-control" id="inputdescripcion"  name="{{ Auth::user()->LocalizacionOperador}}" value="{{ Auth::user()->LocalizacionOperador}}"   readonly placeholder="{{ Auth::user()->LocalizacionOperador}}">
                                                                            </div>
                                                                          </div>
                              
                                                                            <div class="form-group row">
                                                                            <label for="inputdesde" class="col-sm-2 col-form-label">Desde</label>
                                                                            <div class="col-sm-10">
                                                                                  <input id="datepicker7" width="276" />
                                                                                              <script>
                                                                                                  $('#datepicker7').datepicker({
                                                                                                      uiLibrary: 'bootstrap4'
                                                                                                  });
                                                                              </script>
                                                                          </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                            <label for="inputhasta" class="col-sm-2 col-form-label">Hasta</label>
                                                                            <div class="col-sm-10">
                                                                                  <input id="datepicker8" width="276" />
                                                                                  <script>
                                                                                      $('#datepicker8').datepicker({
                                                                                          uiLibrary: 'bootstrap4'
                                                                                      });
                                                                                  </script>
                                                                             
                                                                            </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                    <label for="inputcomentario" class="col-sm-2 col-form-label">Comentario</label>
                                                                                    <div class="col-sm-5">
                                                                                      <input type="text" maxlength="255" class="form-control" id="inputcomentario" placeholder="Comentario">
                                                                                    </div>
                                                                                    </div>   
                                                                    <button type="submit" class="btn btn-primary">Enviar</button>
                                                                  </form>
                                                    </div>

                                                    <div class="tab-pane fade" id="sol-ausencia" role="tabpanel" aria-labelledby="nav-contact-tab">
                                                            <form   method="POST" >
                                                                    {{ csrf_field() }}   

                                                                    <input type="hidden" name="solicitarAusencia" >

                                                                    <div class="form-group row"  id="solicitud-dialibre">
                                                                            <label for="staticEmail" class="col-sm-2 col-form-label">Trabajador</label>
                                                                            <div class="col-sm-5">
                                                                                    <input type="text" class="form-control" id="inputdescripcion"  readonly  name="{{ Auth::user()->NombreOperador
                                                                                    }}"  value="{{ Auth::user()->NombreOperador
                                                                                    }}"  placeholder="{{ Auth::user()->NombreOperador
                                                                                    }}">
                                                                            </div>
                                                                          </div>
                                                                          <div class="form-group row">
                                                                            <label for="inputlocalizacion" class="col-sm-2 col-form-label">Localización</label>
                                                                            <div class="col-sm-5">
                                                                                    <input type="text" class="form-control" id="inputdescripcion"  name="{{ Auth::user()->LocalizacionOperador}}" value="{{ Auth::user()->LocalizacionOperador}}"   readonly placeholder="{{ Auth::user()->LocalizacionOperador}}">
                                                                            </div>
                                                                          </div>
                              
                                                                            <div class="form-group row">
                                                                            <label for="inputdesde" class="col-sm-2 col-form-label">Desde</label>
                                                                            <div class="col-sm-10">
                                                                                  <input id="datepicker9" width="276" />
                                                                                              <script>
                                                                                                  $('#datepicker9').datepicker({
                                                                                                      uiLibrary: 'bootstrap4'
                                                                                                  });
                                                                              </script>
                                                                          </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                            <label for="inputhasta" class="col-sm-2 col-form-label">Hasta</label>
                                                                            <div class="col-sm-10">
                                                                                  <input id="datepicker10" width="276" />
                                                                                  <script>
                                                                                      $('#datepicker10').datepicker({
                                                                                          uiLibrary: 'bootstrap4'
                                                                                      });
                                                                                  </script>
                                                                             
                                                                            </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                    <label for="inputcomentario" class="col-sm-2 col-form-label">Comentario</label>
                                                                                    <div class="col-sm-5">
                                                                                      <input type="text" maxlength="255" class="form-control" id="inputcomentario" placeholder="Comentario">
                                                                                    </div>
                                                                                    </div>   
                                                                    <button type="submit" class="btn btn-primary">Enviar</button>
                                                                  </form>
                                                    </div>

                                                  </div>


 

                                           
                                                  <div class="tab-content" id="nav-tabContent">
                                                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

                                                        <div class="container">
                                                                 

                                                        </div>

                                                             




                                                        

                                                    </div>
                                                  
                                                  
                                                  </div>









                                        </div>
                    














                                      

                                                                    
                            </div>
                            @include('partialsoperador/footer')                            
                        </div>                       
                    </div>              
                </section>               
            </div>
            
            
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
    
     
        <!-- Bar-chart -->
        <script src="js/rumcaJS.js"></script>
        <script src="js/example.js"></script>
        <!--// Bar-chart -->
        <!-- Calender -->
        <script src="js/moment.min.js"></script>
        <script src="js/pignose.calender.js"></script>
        <script>
            //<![CDATA[
            $(function () {
                $('.calender').pignoseCalender({
                    select: function (date, obj) {
                        obj.calender.parent().next().show().text('You selected ' +
                            (date[0] === null ? 'null' : date[0].format('YYYY-MM-DD')) +
                            '.');
                    }
                });
    
                $('.multi-select-calender').pignoseCalender({
                    multiple: true,
                    select: function (date, obj) {
                        obj.calender.parent().next().show().text('You selected ' +
                            (date[0] === null ? 'null' : date[0].format('YYYY-MM-DD')) +
                            '~' +
                            (date[1] === null ? 'null' : date[1].format('YYYY-MM-DD')) +
                            '.');
                    }
                });
            });
            //]]>
        </script>
        <!--// Calender -->
     
        <!--// pie-chart -->
    
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
    
 