<?php

$error = "";

if($_POST) {

	if(!$_POST['fname']){

		$error .= "First Name is required.";
	}
	if(!$_POST['lname']){

		$error .= "Last Name is required.";
	}
	if(!$_POST['email']){

		$error .= "An email address is required.";
	}
	if(!$_POST['phone']){

		$error .= "An phone number is required.";
	}
	if($_POST['email'] && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false) {
       
       $error .= "The email address is invalid.";
	}

	if($error != ""){
		$error = '<div class="alert alert-danger" role="alert">There were some error(s) in your form: ' . $error .'</div>';
	}

}


?>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">

    <title>Registration Form</title>
    <script type = "text/javascript">
	    function preventBack(){window.history.forward();}
	    setTimeout("preventBack()", 0);
	    window.onunload=function(){null};
    </script>
    <style type="text/css">
      
      form{
          border: 1px solid black;
          border-radius: 18px;
          padding-left: 20px;
          padding-top: 18px;
          padding-bottom: 15px;
          margin-left: 26%;
          margin-right: 26%;
          background-color: white;
          opacity: 0.7;
          margin-top: 3%;
          box-shadow: 5px 5px 10px #707070;
      }
      
      .b{
          padding-left: 20px;
          padding-top: 18px;
          padding-bottom: 15px;
          margin-left: 25%;
          margin-right: 26%;
      }

      body{
        padding-top: 15px;
        background-color: lightblue;
      }

      label{
        font-weight: bold;
      }

      .buttons{
        text-align: center;
      }

      .a{
        font-family: 'Lobster', cursive;
      }

    </style>

    <title>Page 1</title>
  </head>
  <body>
    
    <div class="container">

       <div style="text-align: center;" class="a">
         <h1><U>Online Quiz</U></h1>
         <h2>Welcome to the online quiz</h2>
       <br>
         <h3>Enter your details below</h3>
       </div>

       <div id="error" class="b">
       	<?php echo $error; ?>
       </div>
       
       <form style="text-align: center;" action="insert" method="POST">
         <div class="form-group row">
           <label for="firstname" class="col-sm-2 col-form-label">First Name*</label>
           <div class="col-sm-9">
             <input type="text" class="form-control" id="firstname" name="firstname">
           </div>
         </div>
         <div class="form-group row">
           <label for="middlename" class="col-sm-2 col-form-label">Middle Name</label>
           <div class="col-sm-9">
             <input type="text" class="form-control" id="middlename" name="middlename">
           </div>
         </div>
         <div class="form-group row">
           <label for="lastname" class="col-sm-2 col-form-label">Last Name*</label>
           <div class="col-sm-9">
             <input type="text" class="form-control" id="lastname" name="lastname">
           </div>
         </div>
         <div class="form-group row">
           <label for="email" class="col-sm-2 col-form-label">Email*</label>
           <div class="col-sm-9">
             <input type="email" class="form-control" id="email" placeholder="name@example.com" name="email">
           </div>
         </div>
         <div class="form-group row">
           <label for="phone" class="col-sm-2 col-form-label">Phone*</label>
           <div class="col-sm-9">
             <input type="phone" class="form-control" id="phone" name="phone">
           </div>
         </div>
         <div class="form-group row">
           <label for="category" class="col-sm-2 col-form-label">You Are:</label>
           <div class="col-sm-9">
          	 <select name="category" class="form-control" id="category">
	           	 <option value="select">Select</option>
	           	 <option value="student">Trainee</option>
	           	 <option value="teacher">Employee</option>
           	 </select>
           </div>
          </div>  
        
         <div class="buttons">
          <button type="submit" class="btn btn-primary">Submit</button>&nbsp;&nbsp;&nbsp;
          <button type="reset" class="btn btn-primary">Reset</button>
         </div>      
       </form>
     </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

   <!-- Form Validation -->
   <script type="text/javascript">
      
     $("form").submit(function (e){
      e.preventDefault();
      
      var error ="";

      if($("#firstname").val()==""){
        error += "<p>First Name field is required.</p>"
      }
      if($("#lastname").val()==""){
        error += "<p>Last Name field is required.</p>"
      }
      if($("#email").val()==""){
        error += "<p>Email field is required.</p>"
      }
      if($("#phone").val()==""){
        error += "<p>Phone field is required.</p>"
      }
      
      if (error != "") {

        $("#error").html('<div class="alert alert-danger" role="alert">There were some error(s) in your form: ' + error +'</div>');

      } else {

        $("form").unbind("submit").submit(); 
      }

     });

   </script>

  </body>
</html>