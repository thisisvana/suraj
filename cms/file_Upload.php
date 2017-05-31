<?php
    if(!empty($_FILES)){
        $targetDir = "../img/";
        $fileName = $_FILES['file']['name'];
        $targetFile = $targetDir.$fileName;

        if(move_uploaded_file($_FILES['file']['tmp_name'],$targetFile)){
        	// CONNECT TO DATABASE
    		include("dbconfig.php");
    		if(!$dbconfig){
		        echo "Connection Failed";
		    }
		    else {
            //insert file information into db table
            $dbconfig->query("INSERT INTO photo (name) VALUES('".$fileName."')");
        	}
        }
    }
?>
