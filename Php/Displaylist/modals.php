<!------------------------------------------- MODAL BUHAY  ------------------------------------------------->

  <!-------------------------------------------  ADDS  ------------------------------------------------->
    <!--ADDING NEW CHURCH / PASTOR / CHURCH ACCOUNT-->
    <div class="modal fade" id="addChurch" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addChurch" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <form action = " ../../Includes/ADDS.php" method = "post">
            <div class="modal-header">
                <h5 class="modal-title" id="addChurch"> ADD-CHURCH FORM</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="container-fluid">
                <h3>CHURCH DETAILS</h3><hr>
                <label for="basic-url" class="form-label"><b>Church Name</b></label>
                <div class="input-group mb-3">
                  <!-- <span class="input-group-text">Church Name</span> -->
                    <input type="text" class="form-control shadow rounded border-dark" required="" placeholder="Type Church's Name" aria-label="churchName" name = "add-churchName">
                </div>

                <label for="basic-url" class="form-label"><b>Church Address</b></label>
                <div class="input-group mb-3">
                  <!-- <span class="input-group-text">Church Address</span> -->
                    <input type="text" class="form-control shadow rounded border-dark" required placeholder="Type Church Address" aria-label="churchAddress" name = "add-churchAddress">
                </div>

                <label for="basic-url" class="form-label"><b>Date Organized</b></label>
                <div class="input-group mb-3">
                    <input type="date" class="form-control shadow rounded border-dark" required placeholder="Date Organized" aria-label="dateOrganized" name = "add-dateOrganized">
                </div>

                <label for="basic-url" class="form-label"><b>Denomination</b></label>
                <div class="input-group mb-3">
                  <select class = "form-control shadow rounded border-dark" name="add-SelectDenomination" required>
                    <option value="">-SELECT DENOMINATION-</option>
                    <option value="Southern Baptist">Southern Baptist</option>
                    <option value="Pentecostal">Pentecostal</option>
                    <option value="Presbyterian">Presbyterian</option>
                    <option value="Evangelical">Evangelical</option>
                    <option value="ABCCOP">ABCCOP</option>
                    <option value="Full Gospel">Full Gospel</option>
                    <option value="others">others ...</option>
                  </select>
                  <input type="text" class="form-control shadow rounded border-dark"  value="Type Other Denomination" aria-label="denomination" name = "add-TypeDenomination" id="denomination" required>
                </div>

                <label for="basic-url" class="form-label"><b>Church's Email Address</b></label>
                <div class="input-group mb-3">
                    <input type="email" class="form-control shadow rounded border-dark" required placeholder="Type Email Address" name = "add-email">
                </div>
                <hr><!-- DEVIDER IN MODAL||DEVIDER IN MODAL||DEVIDER IN MODAL||DEVIDER IN MODAL||DEVIDER IN MODAL| -->

                <br><h3>PASTOR DETAILS</h3><hr>
                <!-- Details of Pastor -->
                <label for="basic-url" class="form-label"><b>Pastor's Name</b></label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control shadow rounded border-dark" required placeholder="First Name" aria-label="pastorFName" name = "add-pastorFName">
                    <input type="text" class="form-control shadow rounded border-dark"  placeholder="Middle MName" aria-label="pastorName" name = "add-pastorMName">
                    <input type="text" class="form-control shadow rounded border-dark" required placeholder="Last Name" aria-label="pastorLName" name = "add-pastorLName">
                </div>

                <label for="basic-url" class="form-label"><b>Pastor's Birthdate</b></label>
                <div class="input-group mb-3">
                    <input type="date" class="form-control shadow rounded border-dark" required name = "add-pastorBirthdate">
                </div>

                <label for="basic-url" class="form-label"><b>Pastor's Gender</b></label>
                <div class="input-group mb-3">
                    <select class = "form-control shadow rounded border-dark" name="add-pastorGender">
                      <option value="male">Male</option>
                      <option value="female">Female</option>
                    </select>
                </div>

                <label for="basic-url" class="form-label"><b>Pastor's Marital Status</b></label>
                <div class="input-group mb-3">
                    <select class = "form-control shadow rounded border-dark" name="add-pastorStatus">
                      <option value="Married">Married</option>
                      <option value="Single">Single</option>
                      <option value="Widow">Widow</option>
                    </select>
                </div>

                <label for="basic-url" class="form-label"><b>Pastor's Contact Number</b></label>
                <div class="input-group mb-3" id = "contactBorder">
                  <span class="input-group-text shadow rounded border-dark fw-bold">+63</span>
                    <input type="number" class="form-control shadow rounded border-dark" max="9999999999" required placeholder="Type Contact Number" name = "add-pastorContact" id = "pastorContact" onKeyPress="if(this.value.length==10) return false;"  pattern="/^-?\d+\.?\d*$/">
                </div>

                <p id="numNotif"></p> <!-- for notificatin contact Count -->

                <label for="basic-url" class="form-label"><b>Pastor's Email Address</b></label>
                <div class="input-group mb-3">
                    <input type="email" class="form-control shadow rounded border-dark" required placeholder="Type Email Address" name = "add-pastorEmail">
                </div>
                <!-- end of details of pastor -->
                <hr>

                <br><h3>CHURCH ACCOUNT DETAILS</h3><hr>
                
                <div class="input-group mb-3">
                  <input type="text" class="form-control shadow rounded border-dark " placeholder="Type Username" aria-label="addAccount" id = "add-username" name="add-username">
                          <span class="input-group-text shadow rounded border-dark fw-bold">@alicf.com</span>
                </div>

                <div class="input-group mb-3" id = "passBorder1">
                  <span class="input-group-text shadow rounded border-dark fw-bold">Password</span>
                    <input type="password" class="form-control shadow rounded border-dark" maxlength="20" placeholder="Password" aria-label="addAccount" id = "passwordA" name="add-passwordA" onkeyup = "passwordCheck()" >
                </div>
                      <p id="notif"></p> <!-- for notificatin in password -->
                      
                <div class="input-group mb-3" id = "passBorder2">
                  <span class="input-group-text shadow rounded border-dark fw-bold">Re-Password</span>
                    <input type="password" class="form-control shadow rounded border-dark" maxlength="20" placeholder="Repeat-Password" aria-label="addAccount" id = "passwordRepeat" name="add-repassword" onkeyup = "passwordCheck()">
                </div>

              </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name = "addChurch" id = "addChurch">Add</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!--ADDING NEW PASTOR-->
    <!-- <div class="modal fade" id="addPastor" tabindex="-1" aria-labelledby="addPastor" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <form action = " ../../Includes/ADDS.php" method = "post"> 
                <div class="modal-header">
                            <h5 class="modal-title" id="addPastor"> THIS IS ADD-PASTOR FORM</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="container-fluid">
                      <div class="input-group mb-3">
                          <input type="text" class="form-control" placeholder="First Name" aria-label="churchname" id = "add-pastorName" name="PastorFN">
                      </div>
                      <div class="input-group mb-3">
                          <input type="text" class="form-control" placeholder="Last Name" aria-label="churchname" id = "add-pastorName" name="PastorLN">
                      </div>
                      <div class="input-group mb-3">
                          <input type="text" class="form-control" placeholder="Middle Name" aria-label="churchname" id = "add-pastorName" name="PastorMN">
                      </div>
                      <div class="input-group mb-3">
                          <input type="text" class="form-control" placeholder="Contact Number" aria-label="pastorsName" id = "add-pastorContacts" name="PastorContacts">
                      </div>
                      <div class="input-group mb-3">
                          <input type="text" class="form-control" placeholder="Email" aria-label="churchAddress" id = "add-pastorEmail" name="PastorEmail">
                      </div>
                      <div class="input-group mb-3">
                          <input type="date" class="form-control" placeholder="Date of Birth" aria-label="churchAddress" id = "add-pastorBDAY" name="PastorBDAY">
                      </div>
                      <div class="input-group mb-3">
                          <input type="text" class="form-control" placeholder="Status" aria-label="churchAddress" id = "add-pastorStatus" name="PastorStatus">
                      </div>
                    
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name = "addpastor" id = "addpastor">Add</button>
                </div>
              </form>
            </div>
          </div>
    </div> -->

    <!--ADDING NEW MEMBER-->
    <div class="modal fade" id="memberAdd" tabindex="-1" aria-labelledby="memberAdd" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <form action = " ../../Includes/ADDS.php" method = "post">
                <div class="modal-header">
                            <h5 class="modal-title" id="membereAdd">ADD MEMBER LIST</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="container-fluid">
                      <?php
                      if($_SESSION['user'] == $_SESSION['admin'] || $_SESSION['user'] == $_SESSION['chairsec'] ) {

                      
                      ?>
                      <label for="basic-url" class="form-label"><b>Church Name</b></label>
                      <div class="input-group mb-3">
                          <!-- <input type="int" class="form-control" placeholder="Church Number" aria-label="membereAdd" id = "membereAdd" name="MemberC" required> -->
                          <select class="form-control shadow rounded border-dark" name="MemberC" id="membereAdd">
                            <option value = "404">-Select Church to update-</option>
                            <?php
                              $obj->churchName();
                            ?>
                          </select>
                      </div>
                      <?php
                      } else {
                        //$church = $obj->AddchurchName($_SESSION['user']);
                      ?>
                      <input type="hidden" class="form-control shadow rounded border-dark" placeholder="Church Number" aria-label="membereAdd" id = "membereAdd" name="MemberC" value = "<?php $obj -> AddchurchName($_SESSION['user']); ?>">
                      
                      <?php
                      }
                      ?>

                      <label for="basic-url" class="form-label"><b>Member Name</b></label>
                      <div class="input-group mb-3">
                          <input type="text" class="form-control shadow rounded border-dark" placeholder="First Name" aria-label="membereAdd" id = "membereAdd-" name="MemberFN" required>
                          <input type="text" class="form-control shadow rounded border-dark" placeholder="Middle Name" aria-label="membereAdd" id = "membereAdd" name="MemberMN">
                          <input type="text" class="form-control shadow rounded border-dark" placeholder="Last Name" aria-label="membereAdd" id = "membereAdd" name="MemberLN" required>
                          
                      </div>

                      <label for="basic-url" class="form-label"><b>Contact</b></label>
                      <div class="input-group mb-3">
                        <span class="input-group-text shadow rounded border-dark fw-bold">+63</span>
                          <input type="number" class="form-control shadow rounded border-dark" placeholder="Contact Number" aria-label="membereAdd" id = "membereAdd" name="MemberCon" onKeyPress="if(this.value.length==10) return false;"  pattern="/^-?\d+\.?\d*$/"  required>
                          
                      </div>

                      <label for="basic-url" class="form-label"><b>Date of Birth</b></label>
                      <div class="input-group mb-3">
                          <input type="date" class="form-control shadow rounded border-dark" placeholder="Date of Birth" aria-label="membereAdd" id = "membereAdd" name="MemberBDAY" required>
                      </div>

                      <label for="basic-url" class="form-label"><b>Gender</b></label>
                      <div class="input-group mb-3">
                          <!-- <input type="text" class="form-control" placeholder="Gender" aria-label="memberAdd" id = "membereAdd" name= "MemberG"> -->
                          <select class = "form-control shadow rounded border-dark " name="MemberG" required>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                          </select>
                      </div>

                      <label for="basic-url" class="form-label"><b>Email</b></label>
                      <div class="input-group mb-3">
                          <input type="email" class="form-control shadow rounded border-dark" placeholder="Email" aria-label="memberAdd" id = "membereAdd" name = "MemberE" required>
                      </div>

                      <label for="basic-url" class="form-label"><b>Marital Status</b></label>
                      <div class="input-group mb-3">
                          <!-- <input type="text" class="form-control" placeholder="Status" aria-label="memberAdd" id = "membereAdd" name="MemberS"> -->
                          <select class = "form-control shadow rounded border-dark " name="MemberS" required>
                            <option value="Married">Married</option>
                            <option value="Single">Single</option>
                            <option value="Widow">Widow</option>
                          </select>
                      </div>
                    
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name = "MembersAdd" id = "addMember">Add</button>
                </div>
              </form>
            </div>
          </div>
    </div>

    <!--ADDING NEW CONTRIBUTION-->
    <div class="modal fade" id="addContribution" tabindex="-1" aria-labelledby="addContribution" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <form action = " " method = "post">
                <div class="modal-header">
                            <h5 class="modal-title" id="addContribution"> THIS IS CONTRIBUTION FORM</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="container-fluid">
                      <div class="input-group mb-3">
                          <input type="text" class="form-control" placeholder=" test" aria-label="churchname" id = "add-churchName">
                      </div>
                      <div class="input-group mb-3">
                          <input type="text" class="form-control" placeholder="Church Name" aria-label="pastorsName" id = "add-pastorName">
                      </div>
                      <div class="input-group mb-3">
                          <input type="text" class="form-control" placeholder="Church Address" aria-label="churchAddress" id = "add-churchAddress">
                      </div>
                    
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name = "submit" id = "addMember">Add</button>
                </div>
              </form>
            </div>
          </div>
    </div>
        
    <!--ADDING NEW ACCOUNTS-->
    <!-- <div class="modal fade" id="addAccount" tabindex="-1" aria-labelledby="addAccount" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <form action = " ../../Includes/ADDS.php" method = "post"> 
                <div class="modal-header">
                            <h5 class="modal-title" id="addAccount"> THIS IS ADD-NEW-ACCOUNT FORM</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="container-fluid">

                      <div class="input-group mb-3">
                          <span class="input-group-text">Church Name </span>
                          <select class="form-control" name="churchA" id="churchA">
                            <option value = "404">Select Church</option>
                            <?php
                              $obj->churchName();
                            ?>
                          </select>
                      </div>

                      <div class="input-group mb-3">
                          <span class="input-group-text">Pastor /  Rep </span>
                          <select class="form-control" name="pastor" id="pastor">
                            <option value = "404">Select Pastor</option>
                            <?php
                              $obj->pastorName();
                            ?>
                          </select>
                      </div>

                      <div class="input-group mb-3">
                          <input type="text" class="form-control" placeholder="Username" aria-label="addAccount" id = "usernameA" name="usernameA">
                          <span class="input-group-text">@alicf.com</span>
                      </div>

                      <div class="input-group mb-3" id = "passBorder1">
                        <span class="input-group-text">Password</span>
                          <input type="password" class="form-control" maxlength="20" placeholder="Password" aria-label="addAccount" id = "passwordA" name="passwordA" onkeyup = "passwordCheck()" >
                      </div>
                      <p id="notif"></p>  for notificatin in password 
                      

                      <div class="input-group mb-3" id = "passBorder2">
                        <span class="input-group-text">Re-Password</span>
                          <input type="password" class="form-control" maxlength="20" placeholder="Repeat-Password" aria-label="addAccount" id = "passwordRepeat" name="passwordRepeat" onkeyup = "passwordCheck()">
                      </div>

                      <div class="input-group mb-3">
                          <input type="text" class="form-control" placeholder="Status" aria-label="addAccount" id = "statusA" name="statusA">
                      </div>
                    
                    
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name = "addAccount" id = "addAccount">Add</button>
                </div>
              </form>
            </div>
          </div>
    </div> -->


  <!-------------------------------------------  UPDATES  ------------------------------------------------->
  
    <!-- CHURCH TABLE UPDATES -->
    <div class="modal fade" id="ChurchUpdate" tabindex="-1" aria-labelledby="ChurchUpdate" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">


            <form action = " ../../Includes/UPDATES.php" method = "post"> 
              <div class="modal-header">
                          <h5 class="modal-title" id="ChurchUpdate-title">UPDATE CHURCH</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              

              <div class="modal-body">
                <div class="container-fluid">
            
                    <input type = "hidden" name = "churchID" id = "churchID"/>
                    
                    <label for="basic-url" class="form-label"><b>Church Name</b></label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control shadow rounded border-dark"aria-label="churchName" name = "edit-churchName" id = "edit-churchName">
                    </div>

                    <label for="basic-url" class="form-label"><b>Church Address</b></label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control shadow rounded border-dark"aria-label="churchAddress" name = "edit-churchAddress" id = "edit-churchAddress">
                    </div>

                    <label for="basic-url" class="form-label"><b>Date Organized</b></label>
                    <div class="input-group mb-3">
                        <input type="date" class="form-control shadow rounded border-dark"aria-label="dateOrganized" name = "edit-dateOrganized" id = "edit-dateOrganized">
                    </div>

                    <label for="basic-url" class="form-label"><b>Denomination</b></label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control shadow rounded border-dark"aria-label="Denomination" name = "edit-denomination" id = "edit-denomination">
                    </div>

                    <label for="basic-url" class="form-label"><b>Email</b></label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control shadow rounded border-dark"aria-label="email" name = "edit-email" id = "edit-email">
                    </div>
                  
                  </div>
              </div>
              
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-primary" name = "ChurchUpdate" id = "ChurchUpdate">Update</button>
              </div>
            </form>
            
          </div>
        </div>
    </div> <!-- end of churchUpdate modal -->

    <!-- PASTOR UPDATE TABLE -->
    <div class="modal fade" id="PastorUpdate" tabindex="-1" aria-labelledby="PastorUpdate" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">


            <form action = " ../../Includes/UPDATES.php" method = "post"> 

              <div class="modal-header">
                          <h5 class="modal-title" id="PastorUpdate-title">UPDATE PASTOR</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>

              <div class="modal-body">
                <div class="container-fluid">

                    <input type = "hidden" name = "pastorID" id = "pastorID"/>
                    
                    <label for="basic-url" class="form-label"><b>Pastor Name</b></label>
                    <div class="input-group mb-3">
                      <input type="text" class="form-control shadow rounded border-dark"  aria-label="PastorN" name = "edit-Pname" id = "edit-Pname" placeholder="Type Pastor Name" required>
                    </div>

                    <label for="basic-url" class="form-label"><b>Contact Number</b></label>
                    <div class="input-group mb-3">
                      <span class="input-group-text  shadow rounded border-dark fw-bold">+63</span>
                        <input type="number" class="form-control shadow rounded border-dark" aria-label="PastorC" name = "edit-Pcontacts" id = "edit-Pcontacts" onKeyPress="if(this.value.length==10) return false;"  pattern="/^-?\d+\.?\d*$/" placeholder="9xxxxxxxxx" required>
                    </div>

                    <label for="basic-url" class="form-label"><b>Date of Birth</b></label>                        
                    <div class="input-group mb-3">
                        <input type="date" class="form-control shadow rounded border-dark" aria-label="PastorB" name = "edit-Pbday" id = "edit-Pbday" placeholder="dd/mm/yyyy" required>
                    </div>
                    
                    <label for="basic-url" class="form-label"><b>Gender</b></label>
                    <div class="input-group mb-3">
                        <select class = "form-control shadow rounded border-dark " name="edit-Pgender" required>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                          </select>
                    </div>

                    <label for="basic-url" class="form-label"><b>Email</b></label>       
                    <div class="input-group mb-3">
                        <input type="email" class="form-control shadow rounded border-dark" aria-label="PastorE" name = "edit-Pemail" id = "edit-Pemail" placeholder="Type Email" required>
                    </div>

                    

                    <label for="basic-url" class="form-label"><b>Marital Status</b></label>
                    <div class="input-group mb-3">
                        <!-- <input type="text" class="form-control shadow rounded border-dark" aria-label="PastorS" name = "edit-Pstatus" id = "edit-Pstatus" required> -->
                        <select class = "form-control shadow rounded border-dark " name="edit-Pstatus" required>
                            <option value="Married">Married</option>
                            <option value="Single">Single</option>
                            <option value="Widow">Widow</option>
                          </select>
                    </div>
                  
                  </div>
              </div>
              
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-primary" name = "PastorUpdate" id = "PastorUpdate">Update</button>
              </div>

            </form>
            
          </div>
        </div>
    </div> <!-- end of pastor update modal -->

    <!-- MEMBER UPDATE TABLE -->
    <div class="modal fade" id="MemberUpdate" tabindex="-1" aria-labelledby="PastorUpdate" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">


            <form action = " ../../Includes/UPDATES.php" method = "post"> 
              <div class="modal-header">
                          <h5 class="modal-title" id="MemberUpdate-title">UPDATE CHURCH'S MEMBER</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>

              <div class="modal-body">
                <div class="container-fluid">

                    <input type = "hidden" name = "memberID" id = "memberID"/>
                    
                    <!-- will put the obj of churchName Here -->
                    <?php
                    if($_SESSION['user'] == $_SESSION['admin'] || $_SESSION['user'] == $_SESSION['chairsec'] ) {
                    ?>
                      <label for="basic-url" class="form-label"><b>ChurchName</b></label>
                      <div class="input-group mb-3">
                        <input type="text" class="form-control shadow rounded border-dark"  aria-label="ChurchN" name = "edit-ChurchN" id = "edit-ChurchN" required>
                      </div>
                    <?php
                    }
                    ?>
                    

                    <label for="basic-url" class="form-label"><b>Member Name</b></label>
                    <div class="input-group mb-3">
                      <input type="text" class="form-control shadow rounded border-dark"  aria-label="edit-MemberN" name = "edit-MemberN" id = "edit-MemberN" required>
                    </div>

                    <label for="basic-url" class="form-label"><b>Contact Number</b></label>
                    <div class="input-group mb-3">
                      <span class="input-group-text  shadow rounded border-dark fw-bold">+63</span>
                        <input type="number" class="form-control shadow rounded border-dark" aria-label="edit-MemberC" name = "edit-MemberC" id = "edit-MemberC" onKeyPress="if(this.value.length==10) return false;"  pattern="/^-?\d+\.?\d*$/" placeholder="9xxxxxxxxx" required>
                    </div>

                    <label for="basic-url" class="form-label"><b>Date of Birth</b></label>                        
                    <div class="input-group mb-3">
                        <input type="date" class="form-control shadow rounded border-dark" aria-label="PastorB" name = "edit-MemberB" id = "edit-MemberB" placeholder="dd/mm/yyyy" required>
                    </div>
                    
                    <label for="basic-url" class="form-label"><b>Gender</b></label>
                    <div class="input-group mb-3">
                        <select class = "form-control shadow rounded border-dark " name="edit-MemberG" required>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                          </select>
                    </div>

                    <label for="basic-url" class="form-label"><b>Email</b></label>       
                    <div class="input-group mb-3">
                        <input type="email" class="form-control shadow rounded border-dark" aria-label="PastorE" name = "edit-MemberE" id = "edit-MemberE" placeholder="Type Email" required>
                    </div>

                    

                    <label for="basic-url" class="form-label"><b>Marital Status</b></label>
                    <div class="input-group mb-3">
                        <select class = "form-control shadow rounded border-dark " name="edit-MemberS" required>
                            <option value="Married">Married</option>
                            <option value="Single">Single</option>
                            <option value="Widow">Widow</option>
                          </select>
                    </div>

                    <!-- <label for="basic-url" class="form-label"><b>Position</b></label>
                    <div class="input-group mb-3">
                        <select class = "form-control shadow rounded border-dark " name="edit-MemberP" required>
                            <option value="Member">Member</option>
                            <option value="Pastor">Pastor</option>
                            <option value="Representative">Representative</option>
                          </select>
                    </div> -->
                  
                  </div>
              </div>
              
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-primary" name = "MemberUpdate" id = "MemberUpdate">Update</button>
              </div>
            </form>
            
          </div>
        </div>
    </div> <!-- end of pastor update modal -->

    <!-- ACCOUNT TABLE UPDATES -->
    <div class="modal fade" id="AccUpdate" tabindex="-1" aria-labelledby="AccUpdate" aria-hidden="true">
      
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <form action = " ../../Includes/UPDATES.php" method = "post"> 
              <div class="modal-header">
                          <h5 class="modal-title" id="ChurchUpdate-title">ACCOUNT UPDATE</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>

              <div class="modal-body">
                <div class="container-fluid">

                  <!-- hidden containers -->
                  <input type="hidden" name ="accountID" id ="accountID">
                  <input type="hidden" name ="the-churchName" id ="the-churchName">
                  <input type="hidden" name ="the-pastorName" id ="the-pastorName">
                  <!-- end of hidden container -->

                  <label for="basic-url" class="form-label"><b>Username</b></label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control"  aria-label="username" name = "edit-acc-username" id = "edit-acc-username" required>
                    </div>

                     
                    <label for="basic-url" class="form-label"><b>Church Name</b></label>
                    <div class="input-group mb-3">
                      <input type="text" class="form-control"  aria-label="username" name = "edit-acc-churchName" id = "edit-acc-churchName"disabled >
                    </div>
                   

                    <label for="basic-url" class="form-label"><b>Select Church to Update</b></label>
                    <div class="input-group mb-3">
                        <select class="form-control" name="UpdateChurch" id="UpdateChurch">
                          <option value = "404">-Select Church to update-</option>
                          <?php
                            $obj->churchName();
                          ?>
                        </select>
                    </div>

                    

                    <label for="basic-url" class="form-label"><b>Pastor/Representative Name</b></label>
                    <div class="input-group mb-3">
                      <input type="text" class="form-control"  aria-label="username" name = "edit-acc-pastorName" id = "edit-acc-pastorName" disabled>
                    </div>

                    <label for="basic-url" class="form-label"><b>Select Pastor/Representative to Update</b></label>
                    <div class="input-group mb-3">
                        <select class="form-control" name="updatePas" id="updatePas">
                          <option value = "404">-Select Pastor/Representative to update-</option>
                          <?php
                            $obj->pastorName();
                          ?>
                        </select>
                    </div>

                    <label for="basic-url" class="form-label"><b>Status</b></label>
                    <div class="input-group mb-3">
                        <select class="form-control" name="edit-acc-status" id="">
                          <option value = "Active">Active</option>
                          <option value = "Inactive">Inactive</option>
                        </select>
                    </div>
                    
                  
                  </div>
              </div>
              
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-primary" name = "AccountUpdate" id = "AccountUpdate">Update</button>
              </div>
            </form>
            
          </div>
        </div>
    </div>

    <div class="modal fade" id="AccDelete" tabindex="-1" aria-labelledby="AccUpdate" aria-hidden="true">
        
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <form action = " ../../Includes/UPDATES.php" method = "post"> 
              <div class="modal-header">
                          <h5 class="modal-title" id="ChurchUpdate-title">ACCOUNT DELETETION</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>

              <div class="modal-body">
                <div class="container-fluid">

                  <input type = "hidden" name = "accountID" id = "accountID"/>
                  <!-- <input type = "hidden" name = "username" id = "username"/> -->
                    <div class="input-group mb-3">
                      <span class="input-group-text">To Delete Username</span>
                        <input type="text" class="form-control"  aria-label="username" name = "username" id = "username" disabled>
                    </div>
                </div>
              </div>
              
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-danger" name = "AccountDelete" id = "AccountDelete">Delete</button>
              </div>
            </form>
            
          </div>
        </div>
    </div> <!-- end of account update modal -->


<!------------------------------------------- MODAL PATAY  ------------------------------------------------->
  <!-------------------------------------------  UPDATES  ------------------------------------------------->
    <!-- BURIAL VERIFY -->
    <div class="modal fade" id="verifyBurial" tabindex="-1" aria-labelledby="verifyBurial" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <form action = " ../../Includes/burial.inc.php" method = "post"> 
                <div class="modal-header">
                            <h5 class="modal-title" id="">BURIAL FORM VERIFICATION</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                  <div class="container-fluid">

                    <input type = "hidden" name = "burialID" id = "burialID"/>
                      <div class="input-group mb-3">
                          <span class="input-group-text">Mr/Ms/Mrs</span>
                          <input type="text" class="form-control"  aria-label="username" name = "burialName" id = "burialName" disabled>
                      </div>
                      <div class="text-center">
                        is your Church  Member?
                      </div>
                  </div>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success" name = "verifyBurial" id = "verifyBurial">Verify</button>
                </div>
              </form>
            </div>
          </div>
      </div> 

    <!-- end of account update modal -->

    <!-- BURIAL ADD PAYMENT -->
    <div class="modal fade" id="setPayment" tabindex="-1" aria-labelledby="burialPayment" aria-hidden="true">
        
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <form action = " ../../Includes/CemeteryAdd.php" method = "post"> 
              <div class="modal-header">
                          <h5 class="modal-title" id="">ADD PAYMENT</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>

              <div class="modal-body">
                <div class="container-fluid">

                    <input type = "hidden" name = "set-requestID" id = "set-requestID"/>
                    <label for="basic-url" class="form-label"><b>Desceased Name</b></label>
                    <div class="input-group mb-3">
                        <!-- <span class="input-group-text">Desceased Name</span> -->
                        <input type="text" class="form-control shadow rounded border-dark"  aria-label="username" name = "set-DesceasedName" id = "set-DesceasedName" disabled>
                    </div>

                    <!-- receiptNo. input -->
                    <label for="basic-url" class="form-label"><b>Receipt No.</b></label>
                    <div class="input-group mb-3">
                        <!-- <span class="input-group-text">Receipt No.</span> -->
                        <input type="text" class="form-control shadow rounded border-dark"  aria-label="username" name = "set-Receipt" id = "set-Receipt" placeholder = "Type Receipt No." required>
                    </div>
                    <!-- <div class="input-group mb-3">
                        <input type="text" class="form-control"  aria-label="username" name = "set-Receipt" id = "set-Receipt" placeholder ="Input Receipt Number" required>
                    </div> -->

                      <!-- Date-Time Input -->
                      <label for="basic-url" class="form-label"><b>Date/Time</b></label>
                    <div class="input-group mb-3">
                        <!-- <span class="input-group-text">Date</span> -->
                        <input type="datetime-local" class="form-control shadow rounded border-dark"  aria-label="username" name = "set-Date" id = "set-Date" placeholder = "" required>
                    </div>
                    <!-- <div class="input-group mb-3">
                        <input type="date" class="form-control"  aria-label="username" name = "set-Date" id = "set-Date" required>
                    </div> -->

                </div>
              </div>
              
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-primary" name = "AddPayment" id = "AddPayment">Add Payment</button>
              </div>
            </form>
            
          </div>
        </div>
    </div> <!-- end of account update modal -->


    <!-- end of account update modal -->




    