<?php  
    include ('../../Includes/connection.inc.php');
    include ('record-model.php');
    include ('record-view.php');
    include ('record-ctrl.php');
    // include ('../Displaylist/modals.php');
?>

     <!--title and button/s-->
     <head>
    <link rel="stylesheet" href="../../Css/bg.css">
    </head>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 id = "tabID" style = "" class="text-white">Contribution Records</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div id = "btnAddUpdate" class="btn-group me-2">
                <button type="button" id ="add" class="btn btn-sm btn-outline-warning" data-bs-toggle="modal" data-bs-target="#addContribution">Add</button>
                <button type="button"  id ="update" class="btn btn-sm btn-outline-warning" data-bs-toggle="modal" data-bs-target="#update">Update</button>
            </div>
        </div>
    </div><!--end of title and button/s-->
    <div class="table-responsive">
        <table class="table table-striped table-md text-white">
            <thead>
                <tr>
                <th scope="col">Contribution ID</th>
                <th scope="col">Church ID</th>
                <th scope="col">Value</th>
                <th scope="col">Date</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                
                $obj = new View();
                // $obj->viewContribution();

                ?>
            </tbody>
        </table> <!--end of table-->
    </div>
    

