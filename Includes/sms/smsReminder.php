<html>
    <head>
        <title>Cemetery SMS Reminder</title>
        <meta http-equiv="refresh" content="5;url=http://localhost/OnRems/sample-sms/" />
        
    </head>
    <body>
        <?php
        $production = true;
        include_once '../../Php/recordlist/record-view.php';

        function getRandomNumbers(){
            return random_int(0,999999);
        }
        ?>
    </body>
</html>