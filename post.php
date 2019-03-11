
<!DOCTYPE html>
<html>
<title>POST</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="post2css.css">
<link rel="stylesheet" href="post1css.css">
<link rel='stylesheet' href='postcss.css'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Open Sans", sans-serif}
.heighttext{
  height:300px;
  width:500px;
}
</style>
<body class="w3-theme-l5">

 <?php 
require 'header.php';

 if(isset($_POST['button']))
			  { 
			  $sess = $_SESSION['id'];
				  $cmt=$_POST['cmt'];
				  $pt_id=$_POST['pt_id'];
				  if($cmt!="")
				  {
					  
					  $query="INSERT INTO `comment`(`user_id`, `pt_id`, `comment`) VALUES ('$sess','$pt_id','$cmt')";
					  
					  $run=mysqli_query($conn,$query);
					 

				  }
				  
			  }
?>

<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">    
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m3">
     <!-- Profile -->
	   <?php 
	   
	   if(isset($_SESSION['id']))
	   {
		   
	   $query="SELECT `st_pic` FROM `student` WHERE st_id=".$_SESSION['id'];
	$run=mysqli_query($conn,$query);
	$check=mysqli_num_rows($run);
						
						while($row=mysqli_fetch_assoc($run))
						{ ?>
                        
      <div class="w3-card w3-round w3-white">
        <div class="w3-container"><br>
 
   <p class="w3-center"><img src='web1/<?php echo $row["st_pic"]?>' class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>
         <hr>
          
						<?php }?>
                        
	   <?php 
	   $query="SELECT `st_name` FROM `student` WHERE st_id=".$_SESSION['id'];
	$run=mysqli_query($conn,$query);
	$check=mysqli_num_rows($run);
						
						while($row=mysqli_fetch_assoc($run))
						{ ?>
                                                
                         <h4 class="w3-center"><?php echo $row["st_name"]?></h4><br>
                         
						 
						 <?php }}
						 
						 else{
						
						?>
                        
      <div class="w3-card w3-round w3-white">
        <div class="w3-container"><br>
 
   <p class="w3-center"><img src='web1/<?php echo $row["st_pic"]?>' class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>
         <hr>
          <h4 class="w3-center">Not Login <a href="web1/signin.php">SignIn</a></h4><br>
						<?php }?>
                        
	  
                                                
                         
                         
        </div>
      </div>
      <br>
      
      <!-- Accordion -->
      <div class="w3-card w3-round">
        <div class="w3-white">
          <?php if(isset($_SESSION['id']))
		  {?>
          <button onclick="myFunction('Demo2')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-edit fa-fw w3-margin-right"></i> <a href="my_acc.php">Edit</button></a>
          <div id="Demo2" class="w3-hide w3-container">
            <p>Some other text..</p>
          </div><?php }
		  ?>
          
          
        </div>      
      </div>
      <br>
      
     <!-- Interests --> 
     <script>
   window.onload = function(){
    var d = new Date();
    var month_name = ['January','February','March','April','May','June','July','August','September','October','November','December'];
    var month = d.getMonth();   //0-11
    var year = d.getFullYear(); //2014
    var first_date = month_name[month] + " " + 1 + " " + year;
    //September 1 2014
    var tmp = new Date(first_date).toDateString();
    //Mon Sep 01 2014 ...
    var first_day = tmp.substring(0, 3);    //Mon
    var day_name = ['Sun','Mon','Tue','Wed','Thu','Fri','Sat'];
    var day_no = day_name.indexOf(first_day);   //1
    var days = new Date(year, month+1, 0).getDate();    //30
    //Tue Sep 30 2014 ...
    var calendar = get_calendar(day_no, days);
    document.getElementById("calendar-month-year").innerHTML = month_name[month]+" "+year;
    document.getElementById("calendar-dates").appendChild(calendar);
}

function get_calendar(day_no, days){
    var table = document.createElement('table');
    var tr = document.createElement('tr');
    
    //row for the day letters
    for(var c=0; c<=6; c++){
        var td = document.createElement('td');
        td.innerHTML = "SMTWTFS"[c];
        tr.appendChild(td);
    }
    table.appendChild(tr);
    
    //create 2nd row
    tr = document.createElement('tr');
    var c;
    for(c=0; c<=6; c++){
        if(c == day_no){
            break;
        }
        var td = document.createElement('td');
        td.innerHTML = "";
        tr.appendChild(td);
    }
    
    var count = 1;
    for(; c<=6; c++){
        var td = document.createElement('td');
        td.innerHTML = count;
        count++;
        tr.appendChild(td);
    }
    table.appendChild(tr);
    
    //rest of the date rows
    for(var r=3; r<=7; r++){
        tr = document.createElement('tr');
        for(var c=0; c<=6; c++){
            if(count > days){
                table.appendChild(tr);
                return table;
            }
            var td = document.createElement('td');
            td.innerHTML = count;
            count++;
            tr.appendChild(td);
        }
        table.appendChild(tr);
    }
    return table;
}
     </script>
      
        
          <h3 style="text-align:center">Calendar</h3><br>
          <!-- Add an additional blue button style -->
			<div id="calendar-container" style="text-align:center">
            <div id="calendar-header" style="text-align:center">
                <span id="calendar-month-year" style="text-align:center"></span>
            </div>
            <div id="calendar-dates" style="text-align:center">
            </div>
        </div>
        
      
      <br>
      
      <!-- Alert Box -->
      <div class="w3-container w3-display-container w3-round w3-theme-l4 w3-border w3-theme-border w3-margin-bottom w3-hide-small">
        <span onclick="this.parentElement.style.display='none'" class="w3-button w3-theme-l3 w3-display-topright">
          <i class="fa fa-remove"></i>
        </span>
        <p><strong>Hey!</strong></p>
        <p>People are looking at your profile. Find out who.</p>
      </div>
    
    <!-- End Left Column -->
    </div>
    
    <!-- Middle Column -->
    <div class="w3-col m7">
    
      <div class="w3-row-padding">
        <div class="w3-col m12">
          <div class="w3-card w3-round w3-white">
            <div class="w3-container w3-padding">
              
       <p class="w3-border w3-padding">Posts Page</p>
              
              <?php  
			//  $sess = $_SESSION['id'];
			  
			  if(!empty($_SESSION['id']))
			  //$sess = $_SESSION['id'];
	   { ?>
              <form method="post">
              <input class="heighttext" placeholder="Write your code here..." type="text" name="post" > <br> <br>
              <button type="submit" name="submit" class="w3-button w3-theme"><i class="fa fa-pencil"></i> &nbsp;Post</button>
              </form> 
              
              
              <?php
	   }
			  require "connection/connection.php";
			  	?>				  
					
                
					 <?php
					  
              if(isset($_POST['submit']))
			  {
				  $sess = $_SESSION['id'];
				  $post=$_POST['post'];
				  if($post!="")
				  {
					  $query="INSERT INTO `post`(`pt_user`, `post`) VALUES ('$sess','$post')";
					  $run=mysqli_query($conn,$query);

				  }
			  }
              ?>
            </div>
          </div>
        </div>
      </div>
      
     <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
        
          
					<?php
					//select
					 // $query1="SELECT * FROM `post` order by pt_id DESC;";
					 $query1="select student.st_name,st_pic,post.* from student INNER JOIN post on student.st_id=post.pt_user order by pt_id DESC";
					 
					  $run=mysqli_query($conn,$query1);
					  ?>
                      
                      
        
        <?php
                      $i=0;
                      while($row = mysqli_fetch_array($run)) 
					 
					  {
						   //web1/<?php echo $row["st_pic"]' 
                      ?>
                      
                 
                      <img src='web1/<?php echo $row["st_pic"]?>' alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px" height="60px">
        <span class="w3-right w3-opacity"><?php echo $row["date"];?></span>
        <h4><?php echo $row["st_name"];?></h4><br>
        <hr class="w3-clear">
                
               
               
              
             
                   
                <input class="heighttext" type="text" disabled  value="<?php echo $row["post"]; ?>"> 
        <form method="post">      
        Comment <br>  
         <?php 
		 	   $posted_id=$row["pt_id"];
			   $query2="SELECT `comment` FROM `comment` where pt_id=$posted_id";
			   $run1=mysqli_query($conn,$query2);
			   while($row1 = mysqli_fetch_array($run1))
			   {
			   ?>
               
              <br> <input disabled name="cmt" class="fa" type="text" value="<?php echo $row1["comment"];?>">
					 
             <?php } ?>
        <input type="hidden" name="pt_id" value="<?php echo $row["pt_id"]?>">
        <br>
        <input name="cmt" class="fa-2x" type="text">
        
        <button type="submit" name="button" class="w3-button w3-theme-d2 w3-margin-bottom"><i class="fa fa-comment"></i>Comment</button> 
      </form>
      
      
                
                <?php
                 $i++;
				 
					  }
					  
                ?>
                
                 <?php
				 
				 
					  
             
			   
              ?>
          <div class="w3-row-padding" style="margin:0 -16px">
            <div class="w3-half">
            </div>
            <div class="w3-half">
              
          </div>
        </div>
        
      </div>
      
   

      
      
    <!-- End Middle Column -->
    </div>
    
    <!-- Right Column -->
    <div class="w3-col m2">
      <div class="w3-card w3-round w3-white w3-center">
<br>
        <div class="w3-container">
          <p>Upcoming Events:</p>
          <img src="images/e426702edf874b181aced1e2fa5c6cde.gif" alt="Forest" style="width:100%;">
          <p><strong>Speed Programming</strong></p>
          <p>Friday 15:00</p>
          <p><button class="w3-button w3-block w3-theme-l4"><a href="contact.php">Contact Us</a></button></p>
        </div><br>

      </div>
      <br>
      
      <div class="w3-card w3-round w3-white w3-center">
        <div class="w3-container">
          <p>Friend Request</p>
          <img src="/w3images/avatar6.png" alt="Avatar" style="width:50%"><br>
          <span>Jane Doe</span>
          <div class="w3-row w3-opacity">
            <div class="w3-half">
              <button class="w3-button w3-block w3-green w3-section" title="Accept"><i class="fa fa-check"></i></button>
            </div>
            <div class="w3-half">
              <button class="w3-button w3-block w3-red w3-section" title="Decline"><i class="fa fa-remove"></i></button>
            </div>
          </div>
        </div>
      </div>
      <br>
      
      <div class="w3-card w3-round w3-white w3-padding-16 w3-center">
        <p>ADS</p>
        <img src="images/PI06.gif" alt="addvertise column" style="height:100; width:100"/>
      </div>
      <br>
      
      <div class="w3-card w3-round w3-white w3-padding-32 w3-center">
        <p><i class="fa fa-bug w3-xxlarge"></i></p>
      </div>
      
    <!-- End Right Column -->
    </div>
    
  <!-- End Grid -->
  </div>
  
<!-- End Page Container -->
</div>
<br>

<!-- Footer -->

 
<script>
// Accordion
function myFunction(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
        x.previousElementSibling.className += " w3-theme-d1";
    } else { 
        x.className = x.className.replace("w3-show", "");
        x.previousElementSibling.className = 
        x.previousElementSibling.className.replace(" w3-theme-d1", "");
    }
}

// Used to toggle the menu on smaller screens when clicking on the menu button
function openNav() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}



</script>

<?php
require "footer.php";
?>

</body>
</html> 
