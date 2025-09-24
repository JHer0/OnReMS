<?php  
    include ('../../Includes/connection.inc.php');
    // include ('../DisplayList/modals.php');
    include ('record-model.php');
    include ('record-view.php');
    include ('record-ctrl.php');
    
?>
     <!--title and button/s-->
    
     <head>
    <link rel="stylesheet" href="../../Css/bg.css">
    </head>
    <div class = "card">
        <div class = "card-header">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3">
                <h1 id = "tabID" style = "">ALICF CHURCHES</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div id = "btnAddUpdate" class="btn-group me-2">
                        <button type="button" id ="add" class="btn btn-sm btn-warning border-dark " data-bs-toggle="modal" data-bs-target="#addChurch">Add</button>
                        <!-- btn Gen report to be fixed -->
                        <a target="_blank" type="button" id ="report" class="btn btn-sm btn-warning float-xl-end border-dark" href="../../Includes/makeReport.php?id=4&user=<?php echo $user ?>">Generate Report</a>
                    </div>
                </div>
            </div><!--end of title and button/s-->
        </div> <!-- end of header -->
        <div class = "card-body">
            <div class="table-responsive">
                <table class="table table-striped table-md">
                    <thead>
                        <tr>
                            <th scope="col" class = "text-center">#</th>
                            <th scope="col" class = "text-center">Church ID</th>
                            <th scope="col">Church Name</th>
                            <th scope="col">Church Address</th>
                            <th scope="col">Date Organized</th>
                            <th scope="col">Denomination</th>
                            <th scope="col">Email</th>
                            <th scope="col" style = "text-align: center">Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                        $obj = new View();
                        $obj->viewChurch();

                        ?>
                    </tbody>
                </table> 
            </div> <!--end of table-->
        </div> <!--end of body-->
        
    </div>