<?php  
    SESSION_START();
    include ('../../Includes/connection.inc.php');
    include ('record-model.php');
    include ('record-view.php');
    include ('record-ctrl.php');
    $user = $_SESSION['user'];
    
?>
    <head>
    <link rel="stylesheet" href="../../Css/bg.css">
    </head>
    <div class = "card">
        <div class = "card-header">
            <!--title and button/s-->
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3">
                <?php // disabling churchName in church Account
                if($_SESSION['user'] == $_SESSION['admin'] || $_SESSION['user'] == $_SESSION['chairsec'] ) {
                ?>
                <h1 id = "tabID" style = "">ALICF CHURCH MEMBERS LIST</h1>
                <?php
                }else {
                ?>
                 <h1 id = "tabID" style = "">CHURCH MEMBERS LIST</h1>
                <?php
                }
                ?>
                
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div id = "btnAddUpdate" class="btn-group me-2 ">
                        <button type ="button" class="btn btn-sm btn-warning border-dark"  data-bs-toggle="modal" data-bs-target="#memberAdd">Add</button>

                        <a target="_blank" type="button" id ="report" class="btn btn-sm btn-warning border-dark "  href='../../Includes/makeReport.php?id=3&user=<?php echo $user ?>'>Generate Report</a>

                    </div>
                </div>
            </div><!--end of title and button/s-->
        </div> <!--end of header-->

        <div class = "card-body">
            <div class="table-responsive">
                <table class="table table-striped table-md">
                    <thead>
                        <tr>
                        <th scope="col" class = "text-center">#</th>
                            <th scope="col" class = "text-center">Member ID</th>
                            <?php // disabling churchName in church Account
                            if($_SESSION['user'] == $_SESSION['admin'] || $_SESSION['user'] == $_SESSION['chairsec'] ) {
                            ?>
                            <th scope="col">Church Name</th>
                            <?php
                            }
                            ?>
                            <th scope="col">Name</th>
                            <th scope="col">Contact No.</th>
                            <th scope="col">Date of Bith.</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Email</th>
                            <th scope="col">Status</th>
                            <th scope="col">Position</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $member = new View();

                            if($_SESSION['user'] == $_SESSION['admin']|| $_SESSION['user'] == $_SESSION['chairsec']) {
                                $member -> viewMember();
                            }else if ($_SESSION['user'] == $_SESSION['pic']) {
                                
                            }else {
                                $member -> viewChurchMember($_SESSION['user']);
                            }
                            
                        ?>
                    </tbody>
                </table> <!--end of table-->
            </div> <!--end of table-responsive-->
        </div> <!--end of body-->
    </div> <!--end of card-->
    
    
    