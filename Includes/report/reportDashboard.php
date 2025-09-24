<!DOCTYPE html>
    <html>
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Report Details</title>

            <?php
                include_once('../Includes/connection.inc.php');
                include "reportGen.php";
                // include ('../Php/recordlist/record-view.php');
                $obj = new View();
            ?>
        </head>
        <body>
                <p style = "text-align: center; font-size:40px">
                    <strong>ONREMS REPORT</strong>
                </p>
                <p style = "text-align: right;">
                    <?php
                        $mydate=getdate(date("U"));
                        echo "$mydate[month] $mydate[mday], $mydate[year] ";
                    ?>   
                </p>
                
                <p>Below are the total number of lists per item:</p>
                <p>________________________________________________________________________________________<br><br></p>
                <table  width="100%">
                    <tr>
                        <td style = "width:50%"><b>Total Number of Churches:</b></td>
                        <td><?php $obj->CountChurch();?></td>
                    </tr>
                    <tr>
                        <td style = "width:50%"><b>Total Number of Pastors:</b></td>
                        <td><?php $obj->CountPastor();?></td>
                    </tr>
                    
                    <tr>
                        <td style = "width:50%"><b>Total Number of Members:</b></td>
                        <td><?php $obj->CountMember();?></td>
                    </tr>
                    <tr>
                    </tr>
                    <th colspan=2 style="padding-top: 20px"></th> 
                    <tr>
                        <td style = "width50%" colspan=2><b>List of ALICF Church Members as of Today:</b></td>
                        
                    <tr>
                        <td></td>
                        <td ><?php $obj->churchName();?></td>
                        
                    </tr>
                    
                    <th colspan=2 style="padding-top: 50px"><i>~~ *Nothing Follows* ~~</i></th>
                </table>
        </body>
    </html>