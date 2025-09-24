<?php  
    include ('../../Includes/connection.inc.php');
    include ('record-model.php');
    include ('record-view.php');
    include ('record-ctrl.php');
    
?>
<head>
    <link rel="stylesheet" href="../../Css/bg.css">
</head>
    <div class = "card">
        <div class = "card-header">
            <!--title and button/s-->
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3">
                <h1 id = "tabID" style = "">ALICF ACCOUNT LIST</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div id = "btnAddUpdate" class="btn-group me-2 ">
                        <!-- <button type="button" id ="add" class="btn btn-sm btn-warning border-dark" data-bs-toggle="modal" data-bs-target="#addAccount">Add</button> -->
                        <a target="_blank" type="button" id ="report" class="btn btn-sm btn-warning float-xl-end border-dark">Generate Report</a>
                    </div>
                </div>
            </div> <!--end of title and button/s-->
        </div> <!--end of header-->

        <div class = "card-body">
            <div class="table-responsive">
                <table class="table table-striped table-md">
                    <thead>
                        <tr>
                            <th scope="col">Accounts ID</th>
                            <th scope="col">Username</th>
                            <th scope="col">Church Name</th>
                            <th scope="col">Pastor/Representative</th>
                            <th scope="col">Status</th>
                            <th scope="col" style = "text-align: center">edit</th>
                            <th scope="col" style = "text-align: center">delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $obj = new View(); 
                            $obj -> viewAccount();
                        ?>
                    </tbody>
                </table> <!--end of table-->
            </div>
        </div> <!--end of body-->
    </div> <!--end of card-->
    
    
    