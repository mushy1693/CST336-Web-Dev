 <?php

    $errors = "";
    $inches = "";
    $cms = "";
    $result = "";
	$cm = "";
	$in = "";
	
    if (isset ($_GET['cm']) ) {
    	
        $cm = $_GET['cm'];
		
        if (is_numeric($cm)) {
        	
            $inches = $cm * 0.393701;
			$cm = " inches";
            
        } else {
        	
            $errors = "You must enter a number!";
			
        }
        
    } 
    
    if (isset ($_GET['in']) ) {
    	
        $in = $_GET['in'];
		
        if (is_numeric($in)) {
				
			$unit = $_GET['unit'];
	            
	        switch ($unit) {
	        		
	        	case 'cms':   
	        		$result = $in * 2.54;
					$in = " cms";
	                break;
	            case 'yards': 
	            	$result = $in * 0.0277778;
					$in = " yards";
	                break;
	            case 'feet':  
	            	$result = $in * 0.0833333;
					$in = " feet";
	                break;
	            default:
	                break;
						
			}
            
        } else {
        	
            $errors = "You must enter a number!";
			
        }
        
    } else {
    	
        $errors = "No value was passed";
		
    }    

?>

<!DOCTYPE html>

<html lang="en">
	
	<head>
		
	  <meta charset="utf-8">
	  <title>Nelson Lee | Lab 3</title>
	  <link rel="stylesheet" type="text/css" href="css/style.css">
	  
	</head>
	
	<body>	
	
		<div id = "converter">
			
			<div id = "title">Length Converter</div>
		
			<br />
	
		    <form method="get">
		    	
		        Enter cms: <input  class = "text_box" type="text" name="cm">
		        <input class = "button" type="submit" value="Convert to Inches">
		        
		    </form>
		    
		    <?= $inches . $cm ?>
		    
		    <br />
		    <br />
		    
		    <form method="get">
		    	
		        Enter inches: <input class = "text_box" type="text" name="in"> <br />
		        Convert to:
		        <input type="radio" name="unit" value="cms"/> cms
		        <input type="radio" name="unit" value="yards"/> yards
		        <input type="radio" name="unit" value="feet"/> feet
		        <input class = "button" type="submit" value="Convert!">
		        
		    </form>
		    
		    <?= $result . $in ?>
		    <?= $errors ?>
	    
	    </div>
	    
	</body>

</html>
