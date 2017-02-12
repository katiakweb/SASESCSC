<?php
    // Stand alone Solar energy system component sizing calculator 
    // it tells you how many panels you need and the estimated battery capacity needed
    // Note all physical quantities are in SI units
    define("P_F",0.8);
    define("Backup_time",12);       // Assuming 12 hours of darkness
    
    function sizingCalculator($Load,$panelRating){
        // does the sizing calculations for every component
        $maxLoad = $Load*1.5;
        $solarPanel_output = $maxLoad*2;
        $no_of_Panels = round($solarPanel_output/$panelRating);
        $realPower = $maxLoad;
        $apparentPower = $realPower/P_F;
        // Battery sizing 
        $battVolt = array(12,24,48);
        $battVoltage = $battVolt[0];
        $AH_rating = round(($maxLoad*Backup_time*2)/$battVoltage);
        echo("Load: ".$Load." W<br>");
        echo("Max Load: ".$maxLoad." W<br>");
        echo("Number of Panels needed: ".$no_of_Panels."<br>");
        echo("Inverter rating: ".$apparentPower." VA<br>");
        echo("Battery Voltage: ".$battVoltage." V<br>");
        echo("Total AH required: ".$AH_rating." AH<br>");
    }
    
?>
