<?php
        global $cab,$Luggage;
        $PICKUP = $_REQUEST['PICKUP'];
        $DROP = $_REQUEST['DROP'];
        $cab = $_REQUEST['cab'];
        $Luggage = $_REQUEST['Luggage'];
    if($Luggage<=10)
    {
        $Luggageprice = 50;
    }
    else if ($Luggage>=10 && $Luggage<=20)
    {
    $Luggageprice = 100;
    }
    else if ($Luggage>=20)
    {
    $Luggageprice = 200;
    }

        $cabs=array(
            array(
                "Charbagh" =>0,
                "Indira Nagar" =>10,
                "BBD" =>30,
                "Barabanki" =>60,
                "Faizabad" =>100,
                "Basti" =>150,
                "Gorakhpur" =>210
            )
            );

            if($cab == "1"){
                foreach ($cabs as $key=>$value){
                    if ($key == $PICKUP && $key == $DROP) {  
                        $distance = abs($value[$PICKUP]-$value[$DROP]);
                        if($distance<=10) 
                            {
                            $totalfear = abs($distance*13.50);
                            $cabfear = abs(50+$totalfear);
                            echo "Total Fear : " .$cabfear; 
                            }
                            else if ($distance<=50){
                                $newdis = abs($distance-10);
                                $totalfear = abs($newdis*12.00);             
                                $cabfear = abs(135+50+$totalfear);
                                echo "Total Fear : " .$cabfear;  
                            }
                            else if ($distance<=100){
                                $newdis = abs($distance-60);
                                $totalfear = abs($newdis*10.20);                
                                $cabfear = abs(135+50+600+$totalfear);
                                echo "Total Fear : " .$cabfear;   
                            }
                            else if ($distance>=100){
                                $newdis = abs($distance-160);
                                $totalfear = abs($newdis*8.50);                
                                $cabfear = abs(135+50+1020+600+$totalfear);
                                echo "Total Fear : " .$cabfear; 
                            }
                     }
                }
            }
            if ($cab=='2')
            {
                foreach ($cabs as $key=>$value){
                    if ($key == $PICKUP && $key == $DROP) {
                        $distance = abs($value[$PICKUP]-$value[$DROP]);
                        if($distance<=10) 
                            {
                            $totalfear = abs($distance*14.50);
                            $cabfear = abs(150+$totalfear+$Luggageprice);
                            echo "Total Fear : " .$cabfear; 
                            }
                            else if ($distance<=50){
                                $newdis = abs($distance-10);                             
                                $totalfear = abs($newdis*13.00);                                                            
                                $cabfear = abs(145+150+$totalfear+$Luggageprice);
                                echo "Total Fear : " .$cabfear; 
                            }
                            else if ($distance<=100){
                                $newdis = abs($distance-60);
                                $totalfear = abs($newdis*11.20);                   
                                $cabfear = abs(145+150+650+$totalfear+$Luggageprice);
                                echo "Total Fear : " .$cabfear; 
                            }
                            else if ($distance>=100){
                                $newdis = abs($distance-160);
                                $totalfear = abs($newdis*9.50);              
                                $cabfear = abs(145+150+1120+650+$totalfear+$Luggageprice);
                                echo "Total Fear : " .$cabfear;  
                            }
                        }
                }
            }

            if($cab == "3"){
                foreach ($cabs as $key=>$value){
                    if ($key == $PICKUP && $key == $DROP) {  
                        $distance = abs($value[$PICKUP]-$value[$DROP]);
                        if($distance<=10) 
                            {
                            $totalfear = abs($distance*15.50);
                            $cabfear = abs(200+$totalfear);
                            echo "Total Fear : " .$cabfear; 
                            }
                            else if ($distance<=50){
                                $newdis = abs($distance-10);
                                $totalfear = abs($newdis*14.00);                
                                $cabfear = abs(155+200+$totalfear+$Luggageprice);
                                echo "Total Fear : " .$cabfear;  
                            }
                            else if ($distance<=100){
                                $newdis = abs($distance-60);
                                $totalfear = abs($newdis*12.20);                      
                                $cabfear = abs(155+200+700+$totalfear+$Luggageprice);
                                echo "Total Fear : " .$cabfear;  
                            }
                            else if ($distance>=100){
                                $newdis = abs($distance-160);
                                $totalfear = abs($newdis*10.50);                              
                                $cabfear = abs(155+200+1220+700+$totalfear+$Luggageprice);
                                echo "Total Fear : " .$cabfear;  
                            }
                        }
                }
            }
            if($cab == "4"){               
                foreach ($cabs as $key=>$value){
                    if ($key == $PICKUP && $key == $DROP) {  
                        $distance = abs($value[$PICKUP]-$value[$DROP]);
                        if($distance<=10) 
                            {                              
                            $totalfear = abs($distance*16.50);
                            $cabfear = abs(250+100+$totalfear+$Luggageprice);
                            echo "Total Fear : " .$cabfear; 
                            }
                            else if ($distance<=50){
                                $newdis = abs($distance-10);
                                $totalfear = abs($newdis*15.00);                
                                $cabfear = abs(165+100+250+$totalfear+$Luggageprice);
                                echo "Total Fear : " .$cabfear;   
                            }    
                            else if ($distance<=100){
                                $newdis = abs($distance-60);
                                $totalfear = abs($newdis*13.20);              
                                $cabfear = abs(165+250+100+750+$totalfear+$Luggageprice);
                                echo "Total Fear : " .$cabfear; 
                            }
                            else if ($distance>=100){
                                $newdis = abs($distance-160);
                                $totalfear = abs($newdis*11.50);               
                                $cabfear = abs(165+350+1320+750+$totalfear+$Luggageprice);
                                echo "Total Fear : " .$cabfear;                                
                            }
                        }
                }  
            }
           
?>
