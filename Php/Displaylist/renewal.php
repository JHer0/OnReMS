<html lang="en"><head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../../Includes/bootstrap-5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../../Css/style.css">
        <link rel="stylesheet" href="../../Css/bg.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&amp;display=swap" rel="stylesheet">  

      <title>Renewal Application Form</title>
      <script language="javascript" type="text/javascript">
        window.history.forward();
      </script>

        <?php
        include "../../Includes/connection.inc.php";
        include "../recordList/record-view.php";

        $obj = new View();
        ?>
  </head>

  <body><div class="container-fluid bg-dark">
      <div class="row">
          <div class="col text-center pt-3 py-3">
            <h2 class="text-white">Online Records Management System</h2>
          </div>
      </div>
  </div>
 
  <div class="container-fluid px-4 border-bottom-1">
    <div class="row pt-2 py-2 text-center">
        <div class="col-1 p-2 border-start">
        <a href="accountUI.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="25" fill="white" class="bi bi-house-door-fill " viewBox="0 0 16 16">
                    <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
                </svg>
                </a>
        </div>
        <div class="col-2 p-2 border-start">
                <a href="transferal.php" class="d-inline p-2 text-white">
                   <b>Transferal Form</b> 
                </a>
        </div>
        
        <div class="col-2 p-2 border-start">
            <a href="burial.php" class="p-2 text-center text-white">
               <b>Burial Form</b>
            </a>
        </div>
        <div class="col-2 bg-primary shadow bg-warning rounded p-2">
            <a href="renewal.php" class="p-2 text-center text-dark">
                <b>Renewal Form</b>
            </a>
        </div>
        <hr class="style mt-2 shadow-lg rounded bg-white">
    </div>
    
</div> 

<div class="row" style="z-index: 0">
                <?php
                  $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                  if(strpos($fullUrl, "Add=Success!") == true){

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
                   }else if(strpos($fullUrl, "error-stmtfailed") == true ||
                          strpos($fullUrl, "error=setDataStmtfailed") == true ||
                          strpos($fullUrl, "error=checkDataStmtfailed") == true ){
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
                }else if(strpos($fullUrl, "error=emptyinput") == true ){
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
                 Your Inputed Data is Empty!                       
            </div>
              
                <?php 
                }else if(strpos($fullUrl, "error=emptydata") == true ){
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
                         Data Doesn't Exist!                       
                    </div>
                      
                        <?php 
                        } 
                        ?>
                ?>
              </div>
              <script type = "text/javascript">

                window.setTimeout(function() {
                    $(".alert").fadeTo(500, 0).slideUp(500, function(){
                        $(this).remove(); 
                    });
                }, 5000);
                </script>



<!-- Forms -->

<div class="container">
<form action=" ../../Includes/CemeteryAdd.php" method="POST">
    <div class="shadow bg-body rounded mt-3 mb-3">
        <div class="row">
            <div class="col mt-4 px-5">
                <h5 class="text-center fw-bold fs-4">Renewal Application Form
            </h5>   
            </div>
        </div>

        <div class="row text-dark px-5">

                     <!-- APPLICANT NAME -->
                     <div class="col-8 mt-md-1 mt-3"> 
                      <label class="fw-bold fs-4">Applicant Name:</label> 
                          <!-- <input type="text" placeholder="Last name, First Name , Middle Initial" class="form-control w-100 shadow rounded border-dark fw-bold" name="AppName" required> -->
                        <div class="input-group mb-3">
                            <input type="text" class="form-control  shadow rounded border-dark" required placeholder="First Name" aria-label="pastorFName" name = "App-fname" required>
                            <input type="text" class="form-control  shadow rounded border-dark"  placeholder="Middle Name" aria-label="pastorName" name = "App-mname">
                            <input type="text" class="form-control  shadow rounded border-dark" required placeholder="Last Name" aria-label="pastorLName" name = "App-lname" required>
                        </div>
                    </div>

                       <!-- APPLICANT RELATIONSHIP -->
                    <div class="col-4 mt-md-3 mt-4"><br>
                      <select id="sub" class="form-select form-select-sm shadow rounded border-dark fw-bold" name="AppConnection" aria-label=".form-select-lg" required>
                          <option value = "">Relationship to Deceased</option>
                          <option value = "Wife">Wife</option>
                          <option value = "Husband">Husband</option>
                          <option value = "Daughter">Daughter</option>
                          <option value = "Son">Son</option>
                          <option value = "Brother">Brother</option>
                          <option value = "Sister">Sister</option>
                          <option value = "Mother">Mother</option>
                          <option value = "Father">Father</option>
                          <option value = "Cousin">Cousin</option>
                          <option value = "Niece">Niece</option>
                          <option value = "Nephew">Nephew</option>
                      </select>
                    </div>

                      <!-- APPLICANT ADDRESS -->
                    <div class="col-12 mt-md-1 mt-3"> 
                      <label class="fw-bold fs-4">Address:</label> 
                          <input type="text" placeholder="Applicant Full Address" class="form-control w-100 shadow rounded border-dark fw-bold" name="AppAddress" required=""> 
                    </div>

                        <!-- Applicant Age -->
                    <div class="col-4 mt-md-0 mt-3"><br>
                        <input type="number" placeholder="Age" class="form-control w-100 shadow rounded border-dark fw-bold"  pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==2) return false;" min="18" max="99" name="AppAge" required="">
                    </div>

                        <!-- Applicant Contact Number -->
                    <div class="col-4 mt-md-0 mt-3"><br>    
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text t  adow rounded border-dark fw-bold w-10" id = "addonNum">+63</span>
                            </div>
                                <input type="number" placeholder="Contact Number" min="9000000000" max="9999999999" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==10) return false;" class="form-control w-90 shadow rounded border-dark fw-bold" name="AppContact" required id="Number" aria-describedby="addonNum">
                        </div>
                    </div>
                    
        </div>


        <div class="row text-dark px-5">
                    <!-- Deceased Name -->
                    <div class="col-4 mt-md-3 mt-3"> 
                          <label class="fw-bold fs-4">Deceased Name:</label> 
                          <input type="text" placeholder="First Name" class="form-control w-100 shadow rounded border-dark fw-bold " name="fname_dec" required=""> 
                    </div>

                    <div class="col-4 mt-md-4 mt-3"><br> 
                        <input type="text" placeholder="Middle Name" class="form-control w-100 shadow rounded border-dark fw-bold" name="mname_dec" > 
                    </div>

                    <div class="col-4 mt-md-4 mt-3"><br>
                        <input type="text" placeholder="Last Name" class="form-control w-100 shadow rounded border-dark fw-bold" name="lname_dec" required=""> 
                    </div>
        </div>

        <div class="row text-light">
                    <!-- Deceased Church Name -->
                    <div class="col-sm mt-2 mx-5">
                      <select id="sub" class="form-select form-select-sm shadow rounded border-dark fw-bold" name="church_name" aria-label=".form-select-lg" required="">
                          <option>List of churches names in ALICF</option>
                          
                          <?php
                              $obj->account();
                          ?>
                          
                      </select>
                  </div>
        </div>
       
            <<div class="row mx-5 pt-3">
            <!-- Submit Button -->
            <input type="submit" value="Submit" class="btn btn-primary col-md px-4 mt-3 my-3 fw-bold " name="addRenewal"> </input>
        </div>
    </form>
</div>
<?php
                                $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                                if(strpos($fullUrl, "error=emptyinput") == true){
                                  echo "<p>You did not fill in all fields!</p>";
                                  
                                }else if(strpos($fullUrl, "error=wrongpassword") == true){
                                  echo "<p>Your password is Incorrect!</p>";
                                  
                                }else if(strpos($fullUrl, "error=usernotfound") == true){
                                  echo "<p>Account you login is doesn't exist!</p>";
                                  
                                }else if(strpos($fullUrl, "error=stmtfailed") == true){
                                  echo "<p>Your Email and password is Incorrect!</p>";
                                  
                                }

                                ?>
       
</div>
</div>

    <!--FOOTERS-->
     <!--FOOTERS-->
   <!-- ======= Footer ======= -->
   <footer id="footer" class="footer footer-fixed-buttom">

<div class="footer-legal text-center position-relative">
  <div class="container">
    <div class="copyright">
      &copy; Copyright <strong><span>OnREMS(ALICF)</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      Designed by <a href="#">Team 4'S</a>
    </div>
  </div>
</div>

</footer>

        <!--SCRIPT-->
        <script src="../bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
        <!--SCRIPT-->
    

</body></html>