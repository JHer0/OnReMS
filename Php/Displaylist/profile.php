<?php 
SESSION_START();
 include_once('../../Includes/connection.inc.php');
 include ('../../Includes/header.php');
 include ('../recordList/record-model.php');
 include ('../recordList/record-view.php');
?>
  <head>
  <script language="javascript" type="text/javascript">
        window.history.forward();
      </script>
  </head>
  <body>
    <br><br>
      <div class = "container-fluid">
        
        <br>
        <div class = "row profile pb-3 mt-100 shadow alert alert-primary">
          <div class = "row text-center">
            <h1> ACCOUNT PROFILE</h1>
          </div><br><hr>
            <div class=" col-6 text-center">
              <svg xmlns="http://www.w3.org/2000/svg" width="300" height="300" fill="currentColor" class="bi bi-person-square" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1v-1c0-1-1-4-6-4s-6 3-6 4v1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12z"/>
              </svg>
                <h1><?php echo $_SESSION['user']; ?></h1>
            </div>

            <div class="col-6 text-left mt-10">
              <span>Information</span><hr>
              <span>Username</span> &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; <span>Contact Number</span><br>
              <h4><i><span><?php echo $_SESSION['user']; ?></span> &emsp; &emsp;  <span>xxxx-xxx-xxxx</span></i></h4><br>
              <span>ChurchName</span><br>
              <h4><i><span>#This is Sample ChurchName101</span></i></h4><br>
              <span>PastorName</span><br>
              <h4><i><span>Ptr. Pastor P. Preacher</span></i></h4><hr>
              <span><i>"This is a foot note. thank you"</i></span>
            </div>

        </div> <!--end of row-->
        <div class = "row">
          <div class = "col-4">
            
          </div>
          <div class = "col-8">
            
          </div>
        </div>
      </div> <!--end of container-->
  </body>
</html>