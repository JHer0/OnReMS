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
                
                <p>________________________________________________________________________________________<br><br></p>
                <table  width="100%">
                    
                    <tr>
                        <td style = "width:40%" colspan=2><b>Total Number of Members:</b></td>
                        <td style = "width:20%" ><b></b></td>
                        <td style = "width:20%" ><?php $obj->CountMember();?></td>
                        <td style = "width:20%" ><b></b></td>
                        <!-- <td colspan=2></td> -->
                    </tr>
                    <tr>
                    </tr>
                    <th colspan=5 style="padding-top: 20px"></th> 
                    <tr>
                        <td colspan=5><b>List of ALICF Church Members per church as of: 
                            <?php echo "$mydate[month] $mydate[mday], $mydate[year] "; ?></b></td>
                        
                    <tr>
                        <td><?php $obj->viewMember();?></td>
                        
                    </tr>
                    
                    <th colspan=5 style="padding-top: 50px"><i>~~ *Nothing Follows* ~~</i></th>
                </table>
        </body>
    </html>