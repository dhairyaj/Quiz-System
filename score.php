<!DOCTYPE html>
<html>
<head>
     <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Final Score</title>
    <style type="text/css">
        
         body
         {
            background-color: lightgreen;
           
            
         }

        .a{
            font-size: 20px;
         	background: #E6F3F7;
         	opacity: 0.8;
         	box-shadow: 5px 5px 10px #707070;
            margin-left :35%;
            margin-right:36.1%;
            border-radius: 18px;
            margin-top:4%;
            padding-left:10px;
            padding-bottom:10px;
        }
        
        .answer{
            font-size:15px;
        }
        
        .buttons{
            text-align:center;
        }
        
        p{
            text-align:center;
            font-weight:bold;
            font-size:20px;
        }
        
    </style>
</head>
<body>
    <div class = "a">
        <form action="index">
            <?php
        
                session_start();
                $i=1;
               echo "<strong><center> Correct Answers:</center></strong><br>";
                while($i<=10)
                {
                    $temp = 'q'.$i;
                    $temp1 = 'ans'.$i;
                    echo '<div class="answer">';
                    echo "<b>Ans-".$i.": ".$_SESSION[$temp1]."</b>";
                    echo '</div>';
                    echo "<hr>";
                    $i++;
                }
                echo "<p>Your Final Score is : ".$_SESSION['count']."</p>"
        
            ?>
            <div class="buttons">
            <button type="submit" class="btn btn-primary">END</button>
            <button onclick="window.print();" class="btn btn-primary">PRINT</button>
            </div>
         </form>
         
    </div>
    <br><br><br>
</body>
</html>