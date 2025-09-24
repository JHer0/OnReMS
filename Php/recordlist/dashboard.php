<?php
    include_once('../../Includes/connection.inc.php');
    include ('../../Includes/header.php');
    
?>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../../Css/bg.css">
</head>
<body>
    

<?php
//   include ('../recordList/record-view.php');
    
 ?>
<div class="d-flex justify-content-start flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 mx-4 border-bottom ">
    <?php  
        if($_SESSION['user'] == $_SESSION['admin'] ||$_SESSION['user'] == $_SESSION['chairsec'] ){
    ?>
        <h1 class = "text-light col-md-12 ms-sm-auto col-lg-10 px-md-0 text-center" style = "float:right;" id = "tabID">DASHBOARD OF ALICF RECORD MANAGEMENT SYSTEM</h1>
        
    
    <div class="btn-toolbar mb-2 mb-md-0">
        <div id = "btnAddUpdate" class="btn-group me-4 ">
            <a target="_blank" type="button" id ="report" class="btn btn-sm btn-outline-warning float-xl-end ms-5 " href="../../Includes/makeReport.php?id=1&user=<?php echo $user ?>">Generate Report</a>
        </div>
    </div>
    <?php
        } else {
    ?>
        <h1 class = "text-light col-md-12 ms-sm-auto col-lg-10 px-md-0 text-left" id = "tabID">DASHBOARD OF ALICF RECORD MANAGEMENT SYSTEM</h1>
    <?php
    }
    ?>
</div><!--end of title and button/s-->
<div class ="container-fluid">
       
    <div class = "row">
    <!-- for General Account -->
    <?php  
        if($_SESSION['user'] == $_SESSION['admin'] ||$_SESSION['user'] == $_SESSION['chairsec'] ){
        ?>
        <!-- account Card -->
        <div class="col-xl-3 col-sm-6 col-12 mb-4">
            <div class="card" id = "cardAccount">
                <div class="card-body">
                    <div class="d-flex justify-content-between px-md-1">
                        <div>
                            <h3 class="text-info">
                
                            <?php
                            $obj->totalAccount();
                            ?>

                            </h3>
                             <p class="mb-0">Accounts</p>
                        </div>
                        <div class="align-self-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-unlock-fill" viewBox="0 0 16 16">
                                <path d="M11 1a2 2 0 0 0-2 2v4a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2h5V3a3 3 0 0 1 6 0v4a.5.5 0 0 1-1 0V3a2 2 0 0 0-2-2z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- church Card -->
        <div class="col-xl-3 col-sm-6 col-12 mb-4">
            <div class="card" id = "cardChurch">
                <div class="card-body">
                    <div class="d-flex justify-content-between px-md-1">
                        <div>
                            <h3 class="text-danger">
                                
                                <?php
                                    $obj->CountChurch();
                                ?>

                            </h3>
                             <p class="mb-0">ChurchList</p>
                        </div>
                        <div class="align-self-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-bank2" viewBox="0 0 16 16">
                                <path d="M8.277.084a.5.5 0 0 0-.554 0l-7.5 5A.5.5 0 0 0 .5 6h1.875v7H1.5a.5.5 0 0 0 0 1h13a.5.5 0 1 0 0-1h-.875V6H15.5a.5.5 0 0 0 .277-.916l-7.5-5zM12.375 6v7h-1.25V6h1.25zm-2.5 0v7h-1.25V6h1.25zm-2.5 0v7h-1.25V6h1.25zm-2.5 0v7h-1.25V6h1.25zM8 4a1 1 0 1 1 0-2 1 1 0 0 1 0 2zM.5 15a.5.5 0 0 0 0 1h15a.5.5 0 1 0 0-1H.5z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- pastor Card -->
        <div class="col-xl-3 col-sm-6 col-12 mb-4">
            <div class="card" id = "cardPastor">
                <div class="card-body">
                    <div class="d-flex justify-content-between px-md-1">
                        <div>
                            <h3 class="text-danger">
                
                            <?php
                            $obj->CountPastor();
                            ?>

                            </h3>
                             <p class="mb-0">Pastors</p>
                        </div>
                        <div class="align-self-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- member Card -->
        <div class="col-xl-3 col-sm-6 col-12 mb-4">
            <div class="card" id = "cardMember">
                <div class="card-body">
                    <div class="d-flex justify-content-between px-md-1">
                        <div>
                            <h3 class="text-danger">
                
                            <?php
                                $obj->CountMember();
                            ?>

                            </h3>
                             <p class="mb-0">Members</p>
                        </div>
                        <div class="align-self-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <?php   
        }
    ?>
    <!-- for Church Accounts -->
    <?php 
        if($_SESSION['user'] != $_SESSION['admin'] && $_SESSION['user'] != $_SESSION['chairsec'] && $_SESSION['user'] != $_SESSION['pic']){
        ?>
        <!-- pastor Card
        <div class="col-xl-4 col-sm-6 col-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between px-md-1">
                        <div>
                            <h3 class="text-danger">
                
                            <?php
                            //$obj->CountChurchPastor($_SESSION['user']);
                            ?>

                            </h3>
                             <p class="mb-0">Pastors</p>
                        </div>
                        <div class="align-self-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- member Card -->
        <div class="col-xl-6 col-sm-6 col-12 mb-4">
            <div class="card" id = "cardMember">
                <div class="card-body">
                    <div class="d-flex justify-content-between px-md-1">
                        <div>
                            <h3 class="text-danger">
                
                            <?php
                            $username = $_SESSION['user'];
                            $obj->CountChurchMember($_SESSION['user']);
                            ?>

                            </h3>
                             <p class="mb-0">Members</p>
                        </div>
                        <div class="align-self-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ApplicationForm -->
        <div class="col-xl-6 col-sm-6 col-12 mb-4">
            <div class="card" id = "cardApplicationForms">
                <div class="card-body">
                    <div class="d-flex justify-content-between px-md-1">
                        <div>
                            <h3 class="text-danger">
                
                            <?php
                            //$obj->CountChurchPastor($_SESSION['user']);
                            ?>

                            </h3>
                             <p class="mb-0">Contribution</p>
                        </div>
                        <div class="align-self-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-newspaper" viewBox="0 0 16 16">
                                <path d="M0 2.5A1.5 1.5 0 0 1 1.5 1h11A1.5 1.5 0 0 1 14 2.5v10.528c0 .3-.05.654-.238.972h.738a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 1 1 0v9a1.5 1.5 0 0 1-1.5 1.5H1.497A1.497 1.497 0 0 1 0 13.5v-11zM12 14c.37 0 .654-.211.853-.441.092-.106.147-.279.147-.531V2.5a.5.5 0 0 0-.5-.5h-11a.5.5 0 0 0-.5.5v11c0 .278.223.5.497.5H12z"/>
                                <path d="M2 3h10v2H2V3zm0 3h4v3H2V6zm0 4h4v1H2v-1zm0 2h4v1H2v-1zm5-6h2v1H7V6zm3 0h2v1h-2V6zM7 8h2v1H7V8zm3 0h2v1h-2V8zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php   
        }
        ?>
        
    </div>

<!--NEXT ROW || NEXT ROW || NEXT ROW || NEXT ROW || NEXT ROW || NEXT ROW || NEXT ROW || NEXT ROW || NEXT ROW || NEXT ROW || -->

        <div class="col border border-start mt-4 mx-3 pe-3">
        </div>
    <?php
    if($_SESSION['user'] == $_SESSION['admin'] || $_SESSION['user'] == $_SESSION['chairsec'] || $_SESSION['user'] == $_SESSION['pic'] ){
    ?>
    <div class = "row" id="cardApplicationForms">
        <div class = "title text-light pt-3">
        <h4>CEMETERY RECORDS</h4>
        </div>
        
        
        <div class="col-xl-6 col-sm-6 col-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between px-md-1">
                        <div>
                            <h3 class="text-info">
                
                            <?php
                            //$obj->totalAccount();
                            ?>

                            </h3>
                             <p class="mb-0">Cemetery Burried List</p>
                        </div>
                        <div class="align-self-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-card-list" viewBox="0 0 16 16">
                            <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                            <path d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zM4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-sm-6 col-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between px-md-1">
                        <div>
                            <h3 class="text-info">
                
                            <?php
                            //$obj->totalAccount();
                            ?>

                            </h3>
                             <p class="mb-0">Request Application Forms</p>
                        </div>
                        <div class="align-self-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-newspaper" viewBox="0 0 16 16">
                                <path d="M0 2.5A1.5 1.5 0 0 1 1.5 1h11A1.5 1.5 0 0 1 14 2.5v10.528c0 .3-.05.654-.238.972h.738a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 1 1 0v9a1.5 1.5 0 0 1-1.5 1.5H1.497A1.497 1.497 0 0 1 0 13.5v-11zM12 14c.37 0 .654-.211.853-.441.092-.106.147-.279.147-.531V2.5a.5.5 0 0 0-.5-.5h-11a.5.5 0 0 0-.5.5v11c0 .278.223.5.497.5H12z"/>
                                <path d="M2 3h10v2H2V3zm0 3h4v3H2V6zm0 4h4v1H2v-1zm0 2h4v1H2v-1zm5-6h2v1H7V6zm3 0h2v1h-2V6zM7 8h2v1H7V8zm3 0h2v1h-2V8zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-sm-6 col-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between px-md-1">
                        <div>
                            <h3 class="text-info">
                
                            <?php
                            //$obj->totalAccount();
                            ?>

                            </h3>
                             <p class="mb-0"> Ossuary </p>
                        </div>
                        <div class="align-self-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-trash2" viewBox="0 0 16 16">
                                <path d="M14 3a.702.702 0 0 1-.037.225l-1.684 10.104A2 2 0 0 1 10.305 15H5.694a2 2 0 0 1-1.973-1.671L2.037 3.225A.703.703 0 0 1 2 3c0-1.105 2.686-2 6-2s6 .895 6 2zM3.215 4.207l1.493 8.957a1 1 0 0 0 .986.836h4.612a1 1 0 0 0 .986-.836l1.493-8.957C11.69 4.689 9.954 5 8 5c-1.954 0-3.69-.311-4.785-.793z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-sm-6 col-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between px-md-1">
                        <div>
                            <h3 class="text-info">
                
                            <?php
                            //$obj->totalAccount();
                            ?>

                            </h3>
                             <p class="mb-0"> Big Box List </p>
                        </div>
                        <div class="align-self-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-box" viewBox="0 0 16 16">
                            <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5 8 5.961 14.154 3.5 8.186 1.113zM15 4.239l-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-sm-6 col-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between px-md-1">
                        <div>
                            <h3 class="text-info">
                
                            <?php
                            //$obj->totalAccount();
                            ?>

                            </h3>
                             <p class="mb-0"> Payment </p>
                        </div>
                        <div class="align-self-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-cash-coin" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z"/>
                                <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z"/>
                                <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z"/>
                            <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        


        
        
        
   

    </div>
    <?php
    }
    ?>
    
    
    

</div>





</body>
</html>