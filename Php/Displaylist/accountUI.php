<?php
  
  SESSION_START();

    if($_SESSION['user'] == NULL) {
        header ("location: ../Displaylist/index.php");
    }

        include_once('../../Includes/connection.inc.php');
        include ('../../Includes/header.php');
        include ('../recordList/record-model.php');
        include ('../recordList/record-ctrl.php');
        include ('../recordList/record-view.php');

  
?>
        <script type="text/javascript">
            function preventBack(){window.history.forward()};
                      setTimeout("preventBack()",0);
                      window.onunload=function(){null;}
        </script>
        <style>
          .input-error {
            box-shadow: 0 0 5px red;
          }
          .input-success {
            box-shadow: 0 0 5px green;
          }
        </style>

  </head>
  <body>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>    

              <?php  
                $obj = new View();
                include ("modals.php");
              ?>
    
        <div class="container-fluid sticky-top mb-3 " id = "titlebar" >
            <div class="row">
                <header class="navbar navbar-dark bg-dark flex-md-nowrap p-3 shadow ">
                    <a class="navbar-brand text-center col-md-12 ms-sm-auto col-lg-10 px-md-0"><h1>Online Records Management System</h1></a>
                </header>
            </div>
            <div class="row shadow p-3 mb-1 col-md-12 ms-sm-auto col-lg-10 px-md-5" id = "searchbar" style="z-index: 1">
                  <div class="col-8 "></div>
                  <div class="col-1 " >
                    <!-- <div class="dropdown">
                      <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" viewBox="0 0 16 16">
                          <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>
                        </svg>
                        <span class="badge rounded-pill badge-notification bg-danger">3</span>
                      </a>
                      <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                        <li><a class="dropdown-item " href="#">
                        THIS IS DATA SAMPLE!THIS IS DATA SAMPLE!<br>
                        THIS IS DATA SAMPLE!THIS IS DATA SAMPLE!<br>
                        THIS IS DATA SAMPLE!THIS IS DATA SAMPLE!<br>
                        THIS IS DATA SAMPLE!THIS IS DATA SAMPLE!<br>
                        THIS IS DATA SAMPLE!THIS IS DATA SAMPLE!<br>
                        THIS IS DATA SAMPLE!THIS IS DATA SAMPLE!<br>
                        THIS IS DATA SAMPLE!THIS IS DATA SAMPLE!</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">
                        THIS IS DATA SAMPLE!THIS IS DATA SAMPLE!<br>
                        THIS IS DATA SAMPLE!THIS IS DATA SAMPLE!<br>
                        THIS IS DATA SAMPLE!THIS IS DATA SAMPLE!<br>
                        THIS IS DATA SAMPLE!THIS IS DATA SAMPLE!<br>
                        THIS IS DATA SAMPLE!THIS IS DATA SAMPLE!<br>
                        THIS IS DATA SAMPLE!THIS IS DATA SAMPLE!<br>
                        THIS IS DATA SAMPLE!THIS IS DATA SAMPLE!</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">
                        THIS IS DATA SAMPLE!THIS IS DATA SAMPLE!<br>
                        THIS IS DATA SAMPLE!THIS IS DATA SAMPLE!<br>
                        THIS IS DATA SAMPLE!THIS IS DATA SAMPLE!<br>
                        THIS IS DATA SAMPLE!THIS IS DATA SAMPLE!<br>
                        THIS IS DATA SAMPLE!THIS IS DATA SAMPLE!<br>
                        THIS IS DATA SAMPLE!THIS IS DATA SAMPLE!<br>
                        THIS IS DATA SAMPLE!THIS IS DATA SAMPLE!</a></li>
                      </ul>
                    </div> -->
                  </div>
                  <div class="col-3 flex-md-nowrap p-0 ">
                      <div class="card h6 text-dark bg-warning text-center p-1" style="width: 20rem;float: right">
          
                          <?php
                            $mydate=getdate(date("U"));
                            echo "$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year] "."&nbsp;&nbsp;"."|";
                          ?>
                            &nbsp;
                          <?php
                              echo date("h:i A");
                          ?>

                      </div>
                        <!-- <header class="searchbar navbar-dark  bg-light flex-md-nowrap p-0 shadow ">
                          <input class="form-control form-control-dark " type="text" placeholder="Search" aria-label="Search" id ="searchBarInput">
                        </header> -->
                  </div>
            </div>
        </div>

        <!--THIS IS THE SIDE MENU-->
        <div class = "container-md">
          <div class = "row border-1"> 
              <!-- OPENING NAV -->
              <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-lg-block bg-light  sidebar collapse">
              <div class="position-relative pt-3">

                <!-- Hiding button -->
                   <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                   <span class="navbar-toggler-icon bg-warning"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup"> -->

                <!-- Hiding Button -->

                <div class="d-flex flex-column flex-shrink-0 p-3 bg-light">
                    <div class="dropdown">
                      <!-- opening a -->  
                      <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                          <svg xmlns="http://www.w3.org/2000/svg"class="rounded-circle me-2" width="40px" height="40px" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                          </svg>
                                &nbsp;
                          <strong>
                            <?php
                              echo $_SESSION['user'];
                            ?>
                          </strong>
                      </a>
                            <!-- Cloosing of A -->
                      <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                        <li><a class="dropdown-item" id ="profile">Profile</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href = "../../Includes/logout.php">Sign out</a></li>
                      </ul>

                    </div>
            
                          <hr>
                      <ul class="nav nav-pills flex-column mb-auto">
                        <li class="nav-item">
                            <button id="Dashboard" class="btn btn-primary w-100 mb-2" aria-current="page">Dashboard</button>
                        </li>
                              <?php
                                if($_SESSION['user']==$_SESSION['admin']){
                              ?>
                        <li class="nav-item">
                          <button id="Accounts" class="btn btn-primary w-100 mb-2" aria-current="page">Accounts</button>
                        </li>
                              <?php
                                }
                              ?>
                        <li class="nav-item">
                          <button id="Calendar" class="btn btn-primary w-100 mb-2" aria-current="page">Calendar</button>
                        </li>
                        <li class="nav-item" id = "navDropdown">
                            <button class="btn btn-toggle align-items-center btn btn-primary w-100 mb-2 " data-bs-toggle="collapse" data-bs-target="#record-collapse" aria-expanded="true">
                              Records
                            </button>
                              <div class="collapse show" id="record-collapse">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 medium">
                                        <?php //  church Acc. buttons
                                          if($_SESSION['user'] != $_SESSION['admin'] && $_SESSION['user'] != $_SESSION['chairsec'] && $_SESSION['user'] != $_SESSION['pic']){
                                        ?>
                                    <li><a id = "ContributionList" class="btn btn-info w-100 mb-2">Contribution</a></li>
                                    <li><a id = "churchMembers" class="btn btn-info w-100 mb-2" >Church Members</a></li>
                                    <li><a id = "applicationForms" class="btn btn-info w-100 mb-2" >Application Forms</a></li>
                                        <?php
                                              }
                                        ?> <!-- end of Church Acc btns -->
                                        <?php // General Account buttons
                                          if($_SESSION['user'] == $_SESSION['admin'] || $_SESSION['user'] == $_SESSION['chairsec']){
                                        ?>
                                    <li><a id = "ContributionList" class="btn btn-info w-100 mb-2">Contribution</a></li>
                                    <li><a id = "MembershipList" class="btn btn-info w-100 mb-2" data-bs-toggle="collapse" data-bs-target="#membership-collapse" aria-expanded="false">Membership</a></li>

                                  <!-- Collapse Show Start -->
                                  <div class="collapse show" id="membership-collapse">
                                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 medium">
                                      <li><a id = "churches" class="btn btn-outline-info w-100 mb-2 text-dark">Churches</a></li>
                                      <li><a id = "pastors" class="btn btn-outline-info w-100 mb-2 text-dark">Pastors</a></li>
                                      <li><a id = "churchMembers" class="btn btn-outline-info w-100 mb-2 text-dark" >Church Members</a></li>
                                          <?php
                                            }
                                          ?> <!-- end of Gen Acc buttons -->
                                      </ul>
                                  </div>
                                          <?php // disabling buttons
                                            if($_SESSION['user'] == $_SESSION['admin'] || $_SESSION['user'] == $_SESSION['chairsec'] || $_SESSION['user'] == $_SESSION['pic']){
                                          ?>
                                    <li><a id = "CemeteryList" class="btn btn-info w-100 mb-2" data-bs-toggle="collapse" data-bs-target="#cemetery-collapse" aria-expanded="false">Cemetery</a></li>
                                        <div class="collapse show" id="cemetery-collapse">
                                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 medium">
                                              <li><a id = "cemeterylist" class="btn btn-outline-info w-100 mb-2 text-dark">Cemetery Burried List</a></li>
                                              <li><a id = "RequestAppForm" class="btn btn-outline-info w-100 mb-2 text-dark">Request Application Form</a></li>
                                              <li><a id = "Ossuary" class="btn btn-outline-info w-100 mb-2 text-dark">Ossuary</a></li>
                                              <li><a id = "BigBoxList" class="btn btn-outline-info w-100 mb-2 text-dark">Big Box List</a></li>
                                              <li><a id = "Payment" class="btn btn-outline-info w-100 mb-2 text-dark">Payment</a></li>
                                              
                                                  <?php
                                                    }
                                                  ?> <!-- end of disabling buttons -->
                                              </ul>
                                          </div> <!--End of Cemetery Collapse-->  
                                  </ul>
                              </div>
                        </li>
                      </ul>
                          <hr>
                </div>
                                                  <!-- </DIV>ending of hiding button -->
              </div>
            </nav> 
      
            <!-- CLOSSING NAV -->

            <!-- for alert --> 
            <div class = "alertDisplay">
            </div>

            <main id = "mainDisplay" class="col-md-12 ms-sm-auto col-lg-10 px-md-0">
              <div class="row" style="z-index: 0">
                <?php
                  $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                  if(strpos($fullUrl, "Update=Success") == true){

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
                              Update Successfully!                       
                    </div>
                  <?php

                   }else if(strpos($fullUrl, "appFormBurial=verify!") == true){

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
                                Application Verified!                       
                      </div>
                    <?php

                   }else if(strpos($fullUrl, "appFormBurial=Paid") == true){

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
                               Paid Successfully!                       
                      </div>
                    <?php

                   }else if(strpos($fullUrl, "Add=Success") == true || strpos($fullUrl, "appformburial=success!") == true){

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
                    
                  }else if(strpos($fullUrl, "error=PasswordIncorrect!") == true ){

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

                  }else if(strpos($fullUrl, 
                  "error=StatementFailed!") == true || strpos($fullUrl, "error=CheckMemberDataStmtFailed") == true || strpos($fullUrl, "error=SetMemberDataStmtFailed") == true || strpos($fullUrl, "error=UpdateSetDataStmtFailed") == true || strpos($fullUrl, "error=UpdateCheckDataStmtFailed") == true || strpos($fullUrl, "error=AccountSetDataStmtFailed") == true || strpos($fullUrl, "error=AccountCheckDataStmtFailed") == true || strpos($fullUrl, "error=SetDataStmtFailed") == true || strpos($fullUrl, 
                  "error=CheckDataStmtFailed") == true || strpos($fullUrl, 
                  "error=SetPastorDataStmtFailed") == true || strpos($fullUrl, 
                  "error=CheckPastorDataStmtFailed") == true || strpos($fullUrl, 
                  "error=SetAccountsDataStmtFailed") == true || strpos($fullUrl, 
                  "error=CheckAccountDataStmtFailed") == true){
                    
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

              <!--for ajax display -->
              <div id ="insideMainDisplay"> 
                  <?php
                    include "../recordlist/dashboard.php";
                  ?>
              </div>
            </main>
          </div><!--end of row--> 
        </div> <!--end of container-->

        <script type = "text/javascript">

          window.setTimeout(function() {
              $(".alert").fadeTo(500, 0).slideUp(500, function(){
                  $(this).remove(); 
              });
          }, 5000);

            $(document).ready(function(){
              $("#Dashboard").click(function(){
                location.reload(true);
              });

              // CHURCH TABS
              $("#Accounts").click(function(){
                $("#insideMainDisplay").load("../recordlist/accounts.php");
              });
                $("#cardAccount").click(function(){
                  $("#insideMainDisplay").load("../recordlist/accounts.php");
                });

              $("#Calendar").click(function(){
                $("#insideMainDisplay").load("index23.php");
              });

              $("#ContributionList").click(function(){
                $("#insideMainDisplay").load("../Displaylist/maintenance.php");
                
              });

              //church tab 
              $("#churches").click(function(){
                $("#insideMainDisplay").load("../recordlist/churchList.php");
              });
                  $("#cardChurch").click(function(){
                    $("#insideMainDisplay").load("../recordlist/churchList.php");
                  });

              //pastor tab 
              $("#pastors").click(function(){
                $("#insideMainDisplay").load("../recordlist/pastorList.php");
              });
                $("#cardPastor").click(function(){
                  $("#insideMainDisplay").load("../recordlist/pastorList.php");
                });

              //church member tab
              $("#churchMembers").click(function(){
                $("#insideMainDisplay").load("../recordlist/churchMembers.php");
              });
                  $("#cardMember").click(function(){
                    $("#insideMainDisplay").load("../recordlist/churchMembers.php");
                  });
              
              // END OF CHURCH TABS

              //CEMETERY tABS

              // Cemetery list
              $("#cemeterylist").click(function(){
                $("#insideMainDisplay").load("../recordlist/cemeteryList.php");
              });
              //request Application Formn
              $("#RequestAppForm").click(function(){
                $("#insideMainDisplay").load("../recordlist/RequestAppForm.php");
              });
                  $("#RequestAppForm").click(function(){
                    $("#insideMainDisplay").load("../recordlist/RequestAppForm.php");
                  });
              
              //Ossuary Records
              $("#Ossuary").click(function(){
                $("#insideMainDisplay").load("../recordlist/Ossuary.php");
              });
                  $("#Ossuary").click(function(){
                    $("#insideMainDisplay").load("../recordlist/Ossuary.php");
                  });
              
              //Big Box Records
              $("#BigBoxList").click(function(){
                $("#insideMainDisplay").load("../recordlist/BigBoxList.php");
              });
                  $("#BigBoxList").click(function(){
                    $("#insideMainDisplay").load("../recordlist/BigBoxList.php");
                  });

              //Payments Records
              $("#Payment").click(function(){
                $("#insideMainDisplay").load("../recordlist/Payment.php");
              });
                  $("#Payment").click(function(){
                    $("#insideMainDisplay").load("../recordlist/Payment.php");
                  });


              
              // account
              $("#profile").click(function(){
                $("#insideMainDisplay").load("profile.php");
              });

              // CHURCH || CHURCH || CHURCH || CHURCH || CHURCH || CHURCH || CHURCH || CHURCH || CHURCH || CHURCH || CHURCH || CHURCH || CHURCH || CHURCH || CHURCH || CHURCH || CHURCH ||

              //account delete
              $(document).on("click", ".deleteAccount", function(){ 
                var $row = $(this).closest("tr");
                $text = $row.find(".churchAccID").text();
                  $('#accountID').val($text);
                $text = $row.find(".get-acc-username").text();
                  $('#username').val($text);
              
                console.log("delete modal = Acc");

                $('#AccDelete').modal('show');
              });
              
              // account update
              $(document).on("click", ".updateAccount", function(){ 
                var $row = $(this).closest("tr");
                $text = $row.find(".churchAccID").text();
                  $('#accountID').val($text);
                $text = $row.find(".get-acc-username").text();
                  $('#edit-acc-username').val($text);
                $text = $row.find(".get-acc-churchName").text();
                $('#edit-acc-churchName').val($text);
                $('#the-churchName').val($text);
                $text = $row.find(".get-acc-pastorName").text();
                $('#edit-acc-pastorName').val($text);
                $('#the-pastorName').val($text);
                $text = $row.find(".get-acc-status").text();
                  $('#edit-acc-status').val($text);
              
                console.log("update modal = Acc");

                $('#AccUpdate').modal('show');
              });

              //church update
              $(document).on("click", ".updateChurch", function(){ 
                var $row = $(this).closest("tr");
                $text = $row.find(".get-churchID").text();
                  $('#churchID').val($text);
                $text = $row.find(".get-churchName").text();
                  $('#edit-churchName').val($text);
                $text = $row.find(".get-churchAddress").text();
                $('#edit-churchAddress').val($text);
                $text = $row.find(".get-dateOrganized").text();
                  $('#edit-dateOrganized').val($text);
                $text = $row.find(".get-denomination").text();
                $('#edit-denomination').val($text);
                $text = $row.find(".get-telephoneNo").text();
                  $('#edit-telephoneNo').val($text);
                $text = $row.find(".get-email").text();
                  $('#edit-email').val($text);
                
                console.log("update modal = church");

                $('#ChurchUpdate').modal('show');
              });

              //pastor update
              $(document).on("click", ".updatePastor", function(){ 
                var $row = $(this).closest("tr");
                $text = $row.find(".get-pastorID").text();
                  $('#pastorID').val($text);
                $text = $row.find(".get-Pname").text();
                  $('#edit-Pname').val($text);
                $text = $row.find(".get-Pcontact").text();
                $('#edit-Pcontacts').val($text);
                $text = $row.find(".get-Pemail").text();
                  $('#edit-Pemail').val($text);
                $text = $row.find(".get-Pbday").text();
                $('#edit-Pbday').val($text);
                $text = $row.find(".get-Pstatus").text();
                  $('#edit-Pstatus').val($text);
                
                console.log("update modal = pastor");

                $('#PastorUpdate').modal('show');
              });

              //member update
              $(document).on("click", ".updateMembers", function(){ 
                var $row = $(this).closest("tr");
                $text = $row.find(".get-memberID").text();
                  $('#memberID').val($text);
                $text = $row.find(".get-ChurchN").text();
                  $('#edit-ChurchN').val($text);
                $text = $row.find(".get-MemberN").text();
                $('#edit-MemberN').val($text);
                $text = $row.find(".get-MemberC").text();
                  $('#edit-MemberC').val($text);
                $text = $row.find(".get-MemberB").text();
                $('#edit-MemberB').val($text);
                $text = $row.find(".get-MemberG").text();
                  $('#edit-MemberG').val($text);
                $text = $row.find(".get-MemberE").text();
                  $('#edit-MemberE').val($text); 
                $text = $row.find(".get-MemberS").text();
                  $('#edit-MemberS').val($text);  
                
                console.log("update modal = Members");

                $('#MemberUpdate').modal('show');
              });

              // CEMETERY || CEMETERY || CEMETERY || CEMETERY || CEMETERY || CEMETERY || CEMETERY || CEMETERY || CEMETERY || CEMETERY || CEMETERY || CEMETERY || 

              $(document).on("click", ".verifyBurial", function(){ 
                var $row = $(this).closest("tr");
                $text = $row.find(".burialID").text();
                  $('#burialID').val($text);
                $text = $row.find(".burialName").text();
                  $('#burialName').val($text);
              
                console.log("Update modal = burial-verify");

                $('#verifyBurial').modal('show');
              });

              $(document).on("click", ".setPayment", function(){ 
                var $row = $(this).closest("tr");
                $text = $row.find(".get-requestID").text();
                  $('#set-requestID').val($text);
                $text = $row.find(".get-DesceasedName").text();
                  $('#set-DesceasedName').val($text);
              
                console.log("Update modal = addPayment");

                $('#setPayment').modal('show');
              });


            });


              // contact count Checker
            function contactCheck () {
              var x = $('#pastorContact').val();

              if(x.length < 10){
                document.getElementById("numNotif").innerHTML = "contact input <b>must be EXACTLY</b> 10 numbers";
                $("#contactBorder").addClass("input-error");
              } else if (x.length > 10) {
                document.getElementById("numNotif").innerHTML = "contact <b>must NOT EXCEED</b> to 10 numbers";
                $("#contactBorder").addClass("input-error");
              } else {
                document.getElementById("numNotif").innerHTML = "";
                $("#contactBorder").addClass("input-success");
              }
            };

            //password Checker
            function passwordCheck () {
              var x = $('#passwordA').val();
              var y = $('#passwordRepeat').val();

              if(x.length < 8){
                $("#passBorder1").addClass("input-error");
                document.getElementById("notif").innerHTML = "password must be 8 or more characters";
              } else {
                document.getElementById("notif").innerHTML = "";
                if (x == y ) {
                  checkpassword_result = true;
                  $("#passBorder1").addClass("input-success");
                  $("#passBorder2").addClass("input-success");
                }else if(x != y){
                  checkpassword_result = false;
                  $("#passBorder1").addClass("input-error");
                  $("#passBorder2").addClass("input-error");
                
                }
              }
            };


          window.history.forward();
        </script>
  </body>

</html>