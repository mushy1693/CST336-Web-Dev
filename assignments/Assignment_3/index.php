<!DOCTYPE html>

<?php

    if(isset($_GET['car1']) && isset($_GET['car2']) && isset($_GET['car3']) && isset($_GET['car4']) && isset($_GET['car5']) && isset($_GET['car6']) && isset($_GET['car7'])){

        if(is_string($_GET['car1']) && is_string($_GET['car2']) && is_string($_GET['car3']) && is_string($_GET['car4']) && is_string($_GET['car5']) && is_string($_GET['car6']) && is_string($_GET['car7'])){
            
            // put value into variable
            $car1 = $_GET['car1'];
            $car2 = $_GET['car2'];
            $car3 = $_GET['car3'];
            $car4 = $_GET['car4'];
            $car5 = $_GET['car5'];
            $car6 = $_GET['car6'];
            $car7 = $_GET['car7'];            
    
$cars=array();
array_push($cars, $car1, $car2, $car3, $car4, $car5, $car6, $car7);
            // create car array
            //$cars=array($car1,$car2,$car3,$car4,$car5,$car6,$car7);
            
echo "<span style='color:#AFA;text-align:center;'>" . "You have " . sizeof($cars) . " cars.<br>" . "</span>";
// sort the array
            sort($cars);
            // random number from 0-6 for car array
            $random_number = rand(0,6);
            
            // find unique value
            echo "<span style='color:#AFA;text-align:center;'>" . "The unique value is: " . $cars[$random_number] . "</span>";
$secretnumber =  $cars[$random_number];
            
           echo "<span style='color:#AFA;text-align:center;'>" . "<br>Remaining cars sorted alphabetically: " . "</span>";
            
            // print array of all number not including unique value
            echo "<span style='color:#AFA;text-align:center;'>" . "<table><tr>";
            for($i = 0 ; $i < 7 ; $i++){
                
                if(strcmp ($cars[$i], $cars[$random_number]) == 0){
                
                }else{
                    
                    echo "<span style='color:#AFA;text-align:center;'>" . "<td>" . $cars[$i] . "</td>" . "</span>";
                    
                }
                
            }
            
            echo "</tr></table>" . "</span>";
//randomizes values in array and displays them.
shuffle($cars);
echo "<span style='color:#AFA;text-align:center;'>" . "All the cars are randomized: " . "</span>";
echo "<span style='color:#AFA;text-align:center;'>" . "<table><tr>";
            for($i = 0 ; $i < 7 ; $i++){
                
                if(strcmp ($cars[$i], $secretnumber) == 0){
                
                }else{
                    
                    echo "<td>" . $cars[$i] . "</td>" . "</span>";
                    
                }
                
            }
            
            echo "</tr></table>" . "</span>";
            
            // print length of each word
echo "<span style='color:#AFA;text-align:center;'>" . "The character count of each remaining car name: " . "</span>";
            echo "<span style='color:#AFA;text-align:center;'>" . "<table><tr>";
            for($i = 0 ; $i < 7 ; $i++){
                
                if($cars[$i] === $cars[$random_number]){
                
                }else{
                    
                   
echo "<td>" . strlen($cars[$i]) . "</td>" . "</span>";
                    
                }
                
            }
            
            echo "</tr></table>" . "</span>";
            
            
            // print sum of all the unique number
            for($i = 0 ; $i < 7 ; $i++){
                
                if($cars[$i] === $cars[$random_number]){
                
                }else{
                    
                    $cars[$i] = strlen($cars[$i]);
                    
                }
                
            }
            
            echo "<span style='color:#AFA;text-align:center;'>" . "The total sum of the length of different car names without repeating numbers: " . array_sum(array_unique($cars)) . "</span>";
            
            
        
        }else{
            
            echo "not string";
            
        }

    }else{


        echo "not set";
    }
    
?>

<html>

    <head>

        <meta charset="UTF-8">
        <title>ASSIGNMENT 3: HTML Forms and PHP Arrays</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">

    </head>

    <body>

        <div class = "container">

            <div class = "title">

                <h1 id="heading">ASSIGNMENT 3: HTML Forms and PHP Arrays</h1>
                <h3  id="heading">Please enter 7 different car brands below </h3>

            </div>

            <div class = "form">

                <form method = "get">

                    Car 1: <input type="text" name="car1"><br>
                    Car 2: <input type="text" name="car2"><br>
                    Car 3: <input type="text" name="car3"><br>
                    Car 4: <input type="text" name="car4"><br>
                    Car 5: <input type="text" name="car5"><br>
                    Car 6: <input type="text" name="car6"><br>
                    Car 7: <input type="text" name="car7"><br>
                    <input type="submit" value="Submit">

                </form>    

            </div>

            <div id = "article" class = "article">


            </div>

        </div>

    </body>

</html>