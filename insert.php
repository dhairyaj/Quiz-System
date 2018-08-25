<?php
	$firstname = $_POST['firstname'];
	$middlename = $_POST['middlename'];
	$lastname = $_POST['lastname'];
	$category = $_POST['category'];
	$email = $_POST['email'];
	
	$phone = $_POST['phone'];
	if( !empty($firstname) || !empty($lastname) || !empty($category) || !empty($email) || !empty($phone) )
	{
		$host="localhost";
		$dbUsername="id6193565_himanshu9xm";
		$dbPassword="iwbo4/1/99";
		$dbname="id6193565_registered";
		
		//create connection
		$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
		if (mysqli_connect_error())
		{
			die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
		}
		else
		{
			$SELECT = "SELECT email From register Where email = ? Limit 1";
			$INSERT = "INSERT Into register (firstname, middlename, lastname, category, email, phone) values(?, ?, ?, ?, ?, ?)";
			
			//prepare statement
			$stmt = $conn->prepare($SELECT);
			$stmt->bind_param("s", $email);
			$stmt->execute();
			$stmt->bind_result($email);
			$stmt->store_result();
			$rnum = $stmt->num_rows;
			
			if($rnum==0)
			{
		    	$stmt->close();
				$stmt = $conn->prepare($INSERT);
				$stmt->bind_param("sssssi", $firstname, $middlename, $lastname, $category, $email,  $phone);
				$stmt->execute();
				echo "Details added succesfully!!!  Redirecting...";
				
    			echo '<html>
                    <head>
                        <script type = "text/javascript" >
        
                            function preventBack(){window.history.forward();}
            
                            setTimeout("preventBack()", 0);
            
                            window.onunload=function(){null};
        
                        </script>
               
                        <meta http-equiv="refresh" content="2;url=page2" />
                    </head>';
                
			}
			else
			{
			    echo '<center><H2>This email Already Exists</H2></center>';
			    echo '<html>
			        <head>
			        <meta http-equiv="refresh" content="2;url=index" />
			        </head>';
			    
			}
			$stmt->close();
			$conn->close();
		}
		
		
	}
	else
	{
		echo "All fields marked with * are must";
		die();
	}
?>