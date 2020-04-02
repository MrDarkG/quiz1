<?php 
	require_once("conf/functions.php");

	
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
 </head>
 <body>
  <?php 

  $var1=new Functions;
  if (isset($_GET["id"])) {
    if (is_numeric($_GET['id'])) {
      $ans=[];
      $data=["question"=>""];
      while($r=mysqli_fetch_assoc($var1->select_question($_GET['id']))){
        $data["question"]=$r["question"];
      }
      var_dump($data);
      
    }
  }
 ?>

  	<div class="container">
      <form action="">
        <div>
        question
      </div>
      <div class="d-flex">

        <div class="form-check ">
        <input class="form-check-input" type="radio" name="exampleRadios" id="ans1" value="option1" checked>
        <label class="form-check-label" for="ans1" id="answer1">
          Default radio
        </label>
      </div>
      <div class="form-check ml-4">
        <input class="form-check-input" type="radio" name="exampleRadios" id="ans2" value="option2">
        <label class="form-check-label" for="ans2" id="answer2">
          Second default radio
        </label>
      </div>
      </div>
      <button class="btn-primary btn w-100 mt-4" ondblclick="getquestions()">submit</button>
      </form>
  		
  	</div>
  	<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
  	<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  	<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
  	<script type="text/javascript">
  		var id=1;
  		function getquestions() {
  			$.ajax({
               type:'GET',
               url:'conf/gettests.php',
               data:{"id":id},
               success:function(data) {
                  console.log(data)
                  id+=1

               }
            });
  		}
  	$(document).ready(function(){

  	});
  	</script>
 </body>
 </html>