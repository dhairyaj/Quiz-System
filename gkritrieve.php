<?php

    session_start();

    $link = mysqli_connect("localhost", "id6193565_himanshu9xm", "iwbo4/1/99", "id6193565_registered");

    $query = 'SELECT * FROM GKQuestions Order by rand() limit 10';
        
	$retval = mysqli_query( $link, $query );

    $data = Array();
    $answers = Array();

    $i = 1;

    while($row = mysqli_fetch_array($retval)) {
        array_push($data, $row);
        if(!isset($_POST['submit'])) {
            $temp = 'ans'.$i;
            $_SESSION[$temp] = $row['answer'];  
        }
        $i++;
    }

    if(isset($_POST['submit'])) {
        if(!empty($_POST['q1']) && !empty($_POST['q2']) && !empty($_POST['q3']) && !empty($_POST['q4']) && !empty($_POST['q5']) && !empty($_POST['q6']) && !empty($_POST['q7']) && !empty($_POST['q8']) && !empty($_POST['q9']) && !empty($_POST['q10'])) {
            
        $i = 1;
            $score = 0;
            while($i <= 10) {
                $temp = 'q'.$i;
                $temp1 = 'ans'.$i;
                //echo $_POST[$temp]."<br>";
                //echo $_SESSION[$temp1]."<br>";
                //echo "___________<br>";
                if(strcmp($_POST[$temp], $_SESSION[$temp1]) == 0) {
                 //   echo "Sahi hai bhai!"; 
                    
                    $score += 1;
                }
                $i++;
            }
            
           // echo $score;
           
            $_SESSION['count'] = $score;
            
            echo "<script> location.href='score'; </script>";
            
        } else {
            echo "<script> alert('Answering all Questions is Compulsory!'); </script>";
        }
        
    }

?>

<html>
<head>
	<title>GK Quiz</title>
	<script type = "text/javascript">
	    function preventBack(){window.history.forward();}
	    setTimeout("preventBack()", 0);
	    window.onunload=function(){null};
    </script>
	<style type="text/css">
	.navbar 
	{
    	overflow: hidden;
    	background-color: #3d3d77; /* color change for band 1 */
    	position: fixed; /* Set the navbar to fixed position */
    	top: 0; /* Position the navbar at the top of the page */
    	width: 100%; /* Full width */
    	height: 50px;
	}
	body
	{
		margin: 0;
		padding-top: 55px;
		background-color: lightblue; /* color change for entire page */ /* Downlaod ColorZilla extension from Chrome webstore  */
		color: red;  /* Font color */
	}
	
	.subject{
	    font-size:20px;
	    text-align:left;
	    padding-left:10px;
	    padding-top:5px;
	}
	#quiz-time-left
	{
	    font-size: 20px;
  text-align: right;
  padding-right: 30px;
	}
	
	form
	{
     	font-size: 20px;
     	background: white;
     	margin-left: 10%;
     	margin-right: 10%;
     	padding-right: 10px;
     	padding-left: 10px;
     	padding-top: 10px;
     	padding-bottom: 10px;
     	border-radius: 18px;
     	box-shadow: 5px 5px 10px #707070;  
     	opacity:0.8;
	}
	</style>
</head>
<body>
	<div class="navbar">
	<a class="subject">SubjectGeneralKnowledge</a>
	    <div id="quiz-time-left"></div>
	</div>
	<form method="post">
			<?php
				$i = 1;
				foreach($data as $row)
				{
				echo '<fieldset>';
					echo '<legend>Question ';
					echo $i;
					echo '</legend>';
					echo '<p>';
					echo $row['questions']; 
					echo '</p>';
					echo "<label><p><input type='radio' name='q$i' value='".$row['optiona']."'required>".$row['optiona']."</p></label>";
                    echo "<label><p><input type='radio' name='q$i' value='".$row['optionb']."'required>".$row['optionb']."</p></label>";
                    echo "<label><p><input type='radio' name='q$i' value='".$row['optionc']."'required>".$row['optionc']."</p></label>";
                    echo "<label><p><input type='radio' name='q$i' value='".$row['optiond']."'required>".$row['optiond']."</p></label>";
                    $i++;

				echo '</fieldset>';
				}
				echo '<br><br>';
				echo '<button style="height: 30px; width: 80px; font-size: 1em; box-shadow: 5px 5px 10px #707070;border-radius: 15px; margin-left: 50%;" name="submit">Submit</button>';
				echo '<br>';
			?>
	</form>
	<br><br>
	
	<script type="text/javascript">
  
    var total_seconds=5*60;
    var c_minutes = parseInt(total_seconds/60);
var c_seconds = parseInt(total_seconds%60);

function CheckTime(){
document.getElementById("quiz-time-left").innerHTML
= 'Time Left: ' + c_minutes + ' minutes ' + c_seconds + ' seconds ' ;

if(total_seconds <=0){
     alert("Times's Up");
setTimeout('document.quiz.submit()',1);
} else {
total_seconds = total_seconds -1;
c_minutes = parseInt(total_seconds/60);
c_seconds = parseInt(total_seconds%60);
setTimeout("CheckTime()",1000);
}}
setTimeout("CheckTime()",1000);
</script>


	
</body>
</html>

