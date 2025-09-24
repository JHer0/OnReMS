<?php
 include ('../../Includes/connection.inc.php');
 include ('../recordlist/record-view.php');
?>
<html lang="en">
  <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../../Includes/bootstrap-5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../../Css/style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
        <link rel="preconnect" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&amp;display=swap" rel="stylesheet">  


        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

        <script type="text/javascript">
                  function preventBack(){window.history.forward()};
                  setTimeout("preventBack()",0);
                  window.onunload=function(){null;}
        </script>

        <title>OnReMS</title>
  </head>
    <!--NAVIGATOR LINK AND BARS-->
    <body>
      
    <!-------------------------------------------  LOGIN  MODAL------------------------------------------------->

      <div class="modal fade" id="login" tabindex="-1" aria-labelledby="login" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content border-rounded">
                <form action = "../../Includes/functions.php" method = "post">
                  <div class="modal-header fs-2 text-center">
                    
                    <h5 class="me-5 text-white">Login</h5></div>
                  <div class="modal-body mx-3">
                  <h5 class="modal-title text-center" id="login">
                                
                  <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="white" class="bi bi-person" viewBox="0 0 16 16">
                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                  </svg>
                      
                    <div class="container-fluid mt-4">

                      <input type="email" name="usern" id="form3Example3" class=" form-control mb-2 form-control-md" placeholder="Enter Username">
                                    <!-- PASSWORD-->
                      <input type="password" name="paswd" maxlength="20" id="form3Example4" class="form-control mb-2 form-control-md" placeholder="Enter Password">
                      <!-- BUTTON -->
                      
                      <button type="submit" class="btn btn-primary btn-md text-white" name = "login" id = "login">Login</button>
                    
                    </div>
                  </div>
                  <div class="modal-footer"> 
                
                  </div>
                </form>
              </div>
            </div>
          </div>

      <!------------------------------------------- END LOGIN  MODAL------------------------------------------------->

          <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
              <div class="container-md">
              <div class="col" style="z-index:1">
                <?php
                  $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                 if(strpos($fullUrl, "Add=Success") == true){
                    ?>
                    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                          <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                        </symbol>
                    </svg>
                    <div class="col-md-12">
                          <div class="alert alert-success d-flex align-items-start" role="alert">
                              <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                          <div>
                             Add Successfully!                       
                    </div>
                  <?php

                  }else if(strpos($fullUrl, "error=emptyinput") == true){
                      ?>
                      <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                          <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                              <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                          </symbol>
                      </svg>
                      <div class="col-md-12">
                            <div class="alert alert-danger d-flex align-items-start" role="alert">
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                            <div>
                              Please Input your Username and Password!                       
                      </div>
                    <?php
                    
                  }else if(strpos($fullUrl, "error=PasswordIncorrect!") == true){

                    ?>
                    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                      <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                          <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                      </symbol>
                    </svg>
                    <div class="col-md-12">
                          <div class="alert alert-danger d-flex align-items-start" role="alert">
                              <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                          <div>
                             Your Password Is incorrect!                       
                    </div>
                  <?php

                  }else if(strpos($fullUrl, "error=UsernotFound!") == true){
                   
                    ?>
                    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                      <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                          <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                      </symbol>
                    </svg>
                    <div class="col-md-12">
                          <div class="alert alert-danger d-flex align-items-start" role="alert">
                              <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                          <div>
                             User doesn't Exist!                       
                    </div>
                  <?php

                  }else if(strpos($fullUrl, "error=StatementFailed") == true){
                    
                    ?>
                    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                      <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                          <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                      </symbol>
                    </svg>
                    <div class="col-md-12">
                          <div class="alert alert-danger d-flex align-items-start" role="alert">
                              <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                          <div>
                             Something Went Wrong!                       
                    </div>
                  <?php
                  }
                ?>
              </div>
                  <a class="navbar-brand " href="#">OnReMS</a>
                      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                      </button>
                  <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                      <div class="navbar-nav">
                      <a class="nav-link" href="#events"><b>Events</b></a>
                        <a class="nav-link" href="#ABOUTUS"><b>About Us</b></a>
                        <a class="nav-link" href="#ContactUS"><b>Contact Us</b></a>
                        <a class="nav-link" href="burial.php"><b>Application Form</b></a>
                        <a class="nav-link" type="button" data-bs-toggle="modal" data-bs-target="#login"> <b>Login</b></a>
                        <!-- <button type="button" id ="add" class="btn btn-sm btn-warning border-dark " data-bs-toggle="modal" data-bs-target="#addChurch">Add</button> -->
                      </div>
                  </div>
                </div>
            </nav>

          <!--INSIDE CONTENT -->
          <header class="page-header gradient">
            <!-- Dito ko ilagay ung pop-up na notip -->

            



            <!-- KAROSELLLLL NA INI PADII -->
                        
            <div id="carouselExampleSlidesOnly" class="carousel slide h-auto"  data-bs-ride="carousel">
                    <div class="carousel-indicators">
                      <button type="button" data-bs-target="#carouselExampleSlidesOnly" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                      <button type="button" data-bs-target="#carouselExampleSlidesOnly" data-bs-slide-to="1" aria-label="Slide 2"></button>
                      <button type="button" data-bs-target="#carouselExampleSlidesOnly" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>

                    <div class="carousel-inner">

                      <div class="carousel-item active">
                        <img src="../../Images/karosel1.jpg" class="flex-fit img-fluid w-100" style ="height: 95%" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h1>Albay-Legazpi
                                Inter-churches
                                Fellowship</h1>
                            <p>Online Records Management System 
                                  with SMS Support</p>
                          </div>
                      </div>

                      <div class="carousel-item">
                        <img src="../../Images/karosel2.jpg" class="d-block img-fluid w-100" style ="height: 95%"alt="...">
                          <div class="carousel-caption d-none d-md-block">
                            <h1>Albay-Legazpi
                                Inter-churches
                                Fellowship</h1>
                            <p>Online Records Management System 
                                  with SMS Support</p>
                          </div>
                      </div>

                      <div class="carousel-item">
                        <img src="../../Images/karosel3.png" class="d-block img-fluid w-100 " style ="height: 95%" alt="...">
                            <div class="carousel-caption d-none d-md-block text-dark ">
                              <h1 class="pe-5">Albay-Legazpi
                                  Inter-churches
                                  Fellowship</h1>
                              <p>Online Records Management System 
                                    with SMS Support</p>
                            </div>
                      </div>

                    </div> <!-- End of carousel-inner-->

                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleSlidesOnly" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>

                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleSlidesOnly" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>

              </div>           
              <!-- SARADO KANG KAROSELLLLLL -->

              <!-- yaon digdi so mga list of calendar -->
          
              <div class="section-header mt-5" id="events">
                <h2>- LIST OF EVENTS -</h2>
              </div>
                <div class="container" id="events">
                  
                  <div class="row">
                    <div class="col-sm-4 ms-md-auto md-fluid pull-center">
                        <div class="card" style="width: 23rem;" class="shadow-lg p-3 mb-5 bg-body rounded ">
                        <img class="card-img-top" src="../../Images/karosel4.jpg" alt="Card image cap" style="height:13rem;">
                            <div class="card-body">
                              <h5 class="card-title text-dark">CURRENT EVENTS</h5>
                              
                              <p class="card-text text-dark">
                              Some quick example text to build on the card title and make up the bulk of the card's content.
                              </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="card" style="width: 23rem;" class="shadow-lg p-3 mb-5 bg-body rounded ">
                        <img class="card-img-top" src="../../Images/karosel6.jpg" alt="Card image cap">
                            <div class="card-body">
                            <h5 class="card-title text-dark">COMMING EVENTS</h5>
                              <p class="card-text text-dark">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="card" style="width: 23rem;" class="shadow-lg p-3 mb-5 bg-body rounded ">
                          <img class="card-img-top" src="../../Images/karosel5.jpg" alt="Card image cap">
                            <div class="card-body">
                            <h5 class="card-title text-dark">MONTHLY EVENTS</h5>
                              <p class="card-text text-dark">
                              <?php 
                              $obj = new View();
                                $obj->monthlyEvents();?>
                              <?php   
                              ?>  
                             </p>
                            </div>
                        </div>
                    </div>

                  </div>
                  <div class="row">
                  <div class="col-sm-11 mt-5" style="width:1270px">
                        <div class="card " class="shadow-lg p-3 rounded">
                          <img class="card-img-top" src="../../Images/karosel6.jpg" style="height:300px; "  alt="Card image cap">
                            <div class="card-body text-center">
                            <h5 class="card-title text-dark">ALL EVENTS</h5>
                              <p class="card-text text-dark">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>

                    </div>
                    <hr class="text-white">
                    <div class="section-header mt-5" id="ABOUTUS">
                <h2>- ABOUT US -</h2>
              </div>
                    
                  <div class="container text-center">
                  <div class="row">
                    <div class="col-sm-4">
                        <div class="card" style="width: 23rem;" class="shadow-lg p-3 mb-5 bg-body rounded ">
                        <img class="card-img-top" src="../../Images/karosel4.jpg" alt="Card image cap" style="height:13rem;">
                            <div class="card-body">
                              <h5 class="card-title text-dark ">Mission</h5>
                              <p class="card-text text-dark">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 ">
                        <div class="card" style="width: 23rem;" class="shadow-lg p-3 mb-5 bg-body rounded ">
                        <img class="card-img-top" src="../../Images/karosel6.jpg" alt="Card image cap">
                            <div class="card-body">
                            <h5 class="card-title text-dark">Vision</h5>
                              <p class="card-text text-dark">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="card" style="width: 23rem;" class="shadow-lg p-3 mb-5 bg-body rounded ">
                          <img class="card-img-top" src="../../Images/karosel5.jpg" alt="Card image cap">
                            <div class="card-body">
                            <h5 class="card-title text-dark">Commision</h5>
                              <p class="card-text text-dark">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>

                  </div>
                          
                
                          
                    
                    </div>
                </div>
                  
          </header>

          <!-- CONTENTS -->
          <script language="javascript" type="text/javascript">
              window.history.forward();

              window.setTimeout(function() {
              $(".alert").fadeTo(500, 0).slideUp(500, function(){
                  $(this).remove(); 
              });
          }, 5000);
           </script>
        
       
          </section>
          
      </div>
      <hr class="bg-white">

              <div class="section-header mt-5" id="ABOUTUS">
                <h2>- Contact Us -</h2>
              </div>
          <!-- Contact US-->
          <div class="container-fluid bg-white" id="ContactUS">
            <div class="row">
                <div class="col-12">
                    <h3 class="d-flex justify-content-center text-dark pt-5 ">Board Members</h3>
                </div>
              
            </div>
            <div class="row mx-5 px-5 border-top">
                  <div class="col"></div>
                  <div class="col-md mt-5 pt-5">
                        <div class="card mx-5" style="width: 11rem;" class="shadow-lg p-3 mb-5">
                          <img class="card-img-top"  src="../../Images/female-user-icon.png" alt="Card image cap">
                            <div class="card-body">
                            <h5 class="card-title text-dark">ChairSec</h5>
                              <p class="card-text text-dark">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md  mt-5 pt-5">
                        <div class="card mx-5" style="width: 11rem;" class="shadow-lg p-3 mb-5 ">
                          <img class="card-img-top"  src="../../Images/female-user-icon.png" alt="Card image cap">
                            <div class="card-body">
                            <h5 class="card-title text-dark">Secretary</h5>
                              <p class="card-text text-dark">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md  mt-5 pt-5">
                        <div class="card mx-5" style="width: 11rem;" class="shadow-lg p-3 mb-5 ">
                          <img class="card-img-top"  src="../../Images/female-user-icon.png" alt="Card image cap">
                            <div class="card-body">
                            <h5 class="card-title text-dark">Treasurer</h5>
                              <p class="card-text text-dark">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md  mt-5 pt-5">
                        <div class="card mx-5" style="width: 11rem;" class="shadow-lg p-3 mb-5 ">
                          <img class="card-img-top"  src="../../Images/female-user-icon.png" alt="Card image cap">
                            <div class="card-body">
                            <h5 class="card-title text-dark">PIC</h5>
                              <p class="card-text text-dark">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col"></div>
            </div>
        </div>

          <!--FOOTERS-->
        <!-- ======= Footer ======= -->
        <footer id="footer" class="footer">

      <div class="footer-content position-relative">
        <div class="container">
          <div class="row">

            <div class="col-lg-4 col-md-6">
              <div class="footer-info">
                <h3>Albay Legazpi InterChurches Fellowship</h3>
                <p>
                  404 Rawis Street <br>
                  Legazpi City, Albay<br>
                  Philippines<br><br>
                  <strong>Phone:</strong> +1 5589 55488 55<br>
                  <strong>Email:</strong> info@example.com<br>
                </p>
                <div class="social-links d-flex mt-3">
                  <a href="#" class="d-flex align-items-center justify-content-center"><i class="bi bi-twitter"></i></a>
                  <a href="#" class="d-flex align-items-center justify-content-center"><i class="bi bi-facebook"></i></a>
                  <a href="#" class="d-flex align-items-center justify-content-center"><i class="bi bi-instagram"></i></a>
                  <a href="#" class="d-flex align-items-center justify-content-center"><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div><!-- End footer info column-->

            <div class="col-lg-2 col-md-3 footer-links"></div>
            <div class="col-lg-2 col-md-3 footer-links">
              <h4>Useful Links</h4>
              <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#events">Events</a></li>
                <li><a href="#ABOUTUS">About us</a></li>
                <li><a href="#CONTACTUS">Contact US</a></li>
                
              </ul>
            </div><!-- End footer links column-->

            <div class="col-lg-2 col-md-3 footer-links">
              <h4>Our Services</h4>
              <ul>
                <li><a href="#">Generating Reports</a></li>
                <li><a href="#">Adding New Users</a></li>
                <li><a href="#">Cemetery Management</a></li>
                <li><a href="#">Event Calendar</a></li>
                <li><a href="#">Church Design</a></li>
              </ul>
            </div><!-- End footer links column-->

            <div class="col-lg-2 col-md-3 footer-links">
              <h4>Developer</h4>
              <ul>
                <li><a href="#">Fernandez, Eli</a></li>
                <li><a href="#">Baraquiel, Stephanny</a></li>
                <li><a href="#">Ayala, Ralph Marvin</a></li>
                <li><a href="#">Gloriane, Marc Adriane</a></li>
                
              </ul>
            </div><!-- End footer links column-->

            
          </div>
        </div>
      </div>

      <div class="footer-legal text-center position-relative">
        <div class="container">
          <div class="copyright">
            &copy; Copyright <strong><span>OnREMS(ALICF)</span></strong>. All Rights Reserved
          </div>
          <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/upconstruction-bootstrap-construction-website-template/ -->
            Designed by <a href="#">Team 4'S</a>
          </div>
        </div>
      </div>

      </footer>

          <!--SCRIPT-->
          <script src="../../Includes/bootstrap-5.0.2/dist/js/bootstrap.min.js"></script>
          <script src="../../Includes/bootstrap-5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        
          <!--SCRIPT-->

        
        

      </body>

      </html>


      parang na hilo ako -_-