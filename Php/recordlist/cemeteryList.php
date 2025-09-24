<?php  
    include ('../../Includes/connection.inc.php');
    include ('record-model.php');
    include ('record-view.php');
    include ('record-ctrl.php');
    session_start();
?>
<head>
    <link rel="stylesheet" href="../../Css/bg.css">
</head>
     <!--title and button/s-->
  
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                    <h1 id = "tabID" style = "" class="text-dark">CEMETERY BURRIED LIST</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div id = "btnAddUpdate" class="btn-group me-2 ">
                            <a class="btn btn-sm btn-warning border-dark" href="../DisplayList/burial.php">Application Forms</a>
                        </div>
                    </div>
                </div><!--end of title and button/s-->
            </div> <!-- end of card-header  -->
            <div class="card-body">
                
                <div class="card mb-2 border border-dark alert alert-primary"><!-- BURIAL FORMS -->
                    <div class="card-header">
                        <strong>Burried in Tomb</strong>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-md">
                                <thead>
                                    <tr class="text-dark">
                                        <th scope="col">#</th>
                                        <th scope="col">Cemetery ID</th>
                                        <th scope="col">Deseased Name</th>
                                        <th scope="col">Church Name</th>
                                        <th scope="col">Internment Date & Time</th>
                                        <th scope="col">Relative's Name</th>
                                        <th scope="col">Relative's Contact No.</th>
                                        <th scope="col">Pastor/Representative Name</th>
                                        <th scope="col">Pastor's Contact No.</th>
                                        <th scope="col" style = "text-align: center">Edit</th>
                                            
                                            
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $obj = new View();
                                        if($_SESSION['user'] != $_SESSION['admin'] && $_SESSION['user'] != $_SESSION['chairsec'] && $_SESSION['user'] != $_SESSION['pic']) {
                                            $obj -> viewChurchBurial($_SESSION['user'], 1);
                                        }
                                        else{
                                            $obj -> cemeteryList();
                                        }

                                    ?>
                                </tbody>
                            </table> <!-- end of table -->
                        </div> <!-- end of table responsive -->
                    </div> <!-- end of card-body -->
                </div> <!-- end of card -->

            
            </div> <!-- end of card-body -->
    </div> <!-- end of card -->
    