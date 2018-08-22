$name=isset ($_POST ['name'])? $_POST ['name']:''; 
	$email=isset ($_POST ['email'])? $_POST ['email']:'';
	$feedback=isset ($_POST ['feedback'])? $_POST ['feedback']:'';
	$sum=isset ($_POST ['sum'])? $_POST ['sum']:'';
	$success = 	isset($_GET['success']) ? $_GET['success'] : '';
	$error = array("name" => "","email" => "", "feedback" => "","sum" => "","database" => "");
	if($_POST){
		if (strlen($name) == 0 || strlen($name) >255 || strlen($email) == 0 || strlen($email) >255 || strlen($feedback) == 0 || $sum!=2 || !filter_var($email, FILTER_VALIDATE_EMAIL)|| strlen($empty)>0)
		{
			if  (strlen($name) == 0	){
			$error['name'] = 'Insert a name';
			}
			if (strlen($name) >255)	{
			$error['name'] = 'Insert shorter name';
			}
			if (strlen($email) == 0 ){
			$error['email'] = 'Insert email';
			}
			if (strlen($email) >255 ){
			$error['email'] = 'Insert shorter email';
			}
			
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$error['email'] = 'In email isnt @ or . symbol';
			}
			if (strlen($feedback) == 0){
				$error['feedback'] = 'Insert feedback';
			}
			if ($sum !=2) {
				$error['sum'] = 'Inccorect';
							}
			if (strlen($empty)>0) {
				header("Location:index1.php");
							}			
}
		else {
		
			$conn = new mysqli ('localhost', 'root', 'root', 'group_project'); 
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}
			$name = $conn->real_escape_string($name);
			$email = $conn->real_escape_string($email);
			$feedback = $conn->real_escape_string($feedback);
			$sum = $conn->real_escape_string($sum);
			$saved = $conn->query ("INSERT INTO feedback (Name, Email, Feedback) 
			VALUES  ('$name','$email','$feedback') ");
			if($saved){
				header('Location: ' . $_SERVER['PHP_SELF'] . '?success=OK');
							}else{
				$error['database'] = "Error when saving";
			}
			}
	
	}
	if(strlen($success) == 0) { 
?>
<!DOCTYPE html>
<html>
	<head>	
		<meta charset="utf-8">
		<title>Group project</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="normalize.css"/>
		<link href="https://fonts.googleapis.com/css?family=Paytone+One" rel="stylesheet">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="style.css"/>
		<link rel="stylesheet" type="text/css" href="about.html"/>
		<!-- Remember to include jQuery :) -->
			<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>

			<!-- jQuery Modal -->
			<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
	</head>

		
<body>

	<header >
		<div class="header-wrapper">
		
			<img src="http://www.edumsia.my/sites/default/files/styles/inner_cover/public/article/cover/Logo_C%40S_800px.png?itok=vz1K2YG0" alt="Logo"/>
<nav class="navbar topnav" id="myTopnav">
				<a href="#home" onclick="location.href='Group project.html'">Home</a>
				<div class="dropdown">
					 <button class="dropbtn" onclick="location.href='about.html'">About</button>
						<div class="dropdown-content">
							<a href="about.html#mission">Mission</a>
							<a href="about.html#goals">Goals</a>
							<a href="about.html#values">Values</a>
							<a href="about.html#history">History</a>
							<a href="about.html#safety">Safety & Protection</a>
							<a href="about.html#results">Results</a>
						</div>
					</div>
				<div class="dropdown">
					<button class="dropbtn" onclick="location.href='program.html'">Program</button>
						<div class="dropdown-content">
							<a href="program.html#schedule">Schedule</a>
							<a href="program.html#lectors">Lectors</a>
							<a href="program.html#areas">Educational & Activity areas</a>
						</div>
				</div>	
				<a href ="#registration"  id="regmenubtn" >Registration</a>
				<div class="dropdown">
					<button class="dropbtn" onclick="location.href='information.html'">Information</button>
						<div class="dropdown-content">
							<a href="information.html#prices">Pricing</a>
							<a href="information.html#food">Food</a>
							<a href="information.html#faq">FAQ</a>
							<a href="information.html#location">Place location</a>						
						</div>
				</div>
				<a href ="sponsors.html">Sponsors</a>			
				<a href="blog.html">Blog</a>
				<a href ="contactus.html">Contacts</a>
				 <!--mobile nav-->
				<a href="javascript:void(0);" class="icon hideondesktop" onclick="myFunction()">
					<i class="fa fa-bars"></i>
				<!--mobile nav-->
				</a>
			</nav> 
	    </div>
	</header> 

  <!--====================SLIDES====================-->

  <!-- Slideshow container -->

<div class="slideshow-container">

	<!-- Full-width images with number and caption text -->
	<div class="mySlides fade">
	<div class="numbertext">1 / 3</div>
	<img src="images/slider1.jpg" style="width:100%" alt="klaida"/>
	<div class="textslides"><span>Play and learn to code!</span></div>
	</div>

	<div class="mySlides fade">
	<div class="numbertext">2 / 3</div>
	<img src="images/slider2.jpg" style="width:100%"alt="klaida"/>
	<div class="textslides"><span>Have fun and learn</span>></div>
	</div>

	<div class="mySlides fade">
	<div class="numbertext">3 / 3</div>
	<img src="images/slider3.jpg" style="width:100%" alt="klaida"/>
	<div class="textslides"><span>Meet new friends!</span></div>
	</div>

</div>

  <!--=========================ABOUT========================-->
<div class="about-home">
    <div class="faqdrop">
        <h2>MAKE SOMETHING EXTRAORDINARY THIS SUMMER!</h2>
		<p>What will campers learn? Looots of cool stuff!</p>
		<p>Our camps focus on coding apps from scratch. We're not just relying on a platform to change parameters in a game, we're actually doing sequential coding through logical steps.</p>
		<p>Campers will gain general skills like problem solving, teamwork, code debugging, and perhaps most importantly, all campers will learn and practice the logical thinking skills required to program a computer at any level! </p>
		<p>Learn about coding, design, being a maker, science projects, play with virtual reality and so many amazing opportunities to be a creator!</p>
		<p>At Code Camp Kids don't just learn to code. They code to learn.</p>
	</div>	
</div>

 
  <!--==========KIDS TEACHERS VOLUNTIEERS===============-->
 
	<div class="KTVcontainer">
   	   <section class="KTVcontainer">
	       <div class="about">
	        	<h2>FOR KIDS</h2>
		  		<img src="images/1.jpg" alt="For kids"/>
		  		<div class="text">
		    	 <p>Hey, kid! Wanna do something Cool? Wanna do some Code? Our teachers made it fun and easy to learn coding skills. 3-4 days of creativity, design, fun and coding. Our most popular Code Camp where every child starts their journey and builds their very own downloadable app! Join us!</p>
		   			   </section>
  	   <section class="KTVcontainer">
			<div class="about">
		   		<h2>FOR TEACHERS</h2>
		   		<img src="images/2.jpg" alt="For teachers"/>
		   		<div class="text">
		     	<p>We know the right instructor changes everything. Our staff empowers students with the most in-demand tech skills, while bringing our renowned camp culture to life. Our selective hiring practices, honed over 20 seasons, yield the most highly qualified, passionate instructors from tech companies, and universities.</p>
		    	</div>
		   	</div>		
		</section>
	   	<section class="KTVcontainer">
            <div class="about">
		    	<h2>FOR VOLUNTEERS</h2>
		    	<img src="images/3.jpeg" alt="For volunteers"/>  
		    	<div class="text">
		    	<p> We need your help and experience to continue to change the lives of the youth in our community. These part-time, unpaid intern ships offer flexible hours, mentoring, and potential succession into paid positions. There are many skills at several levels of commitment needed immediately. </p>
		     	</div>	
		     	
  		 	</div>
	   </section> 
<!----MODAL----->		       
	<a href ="#registration"  id="regbtn" class="modalbtn" >REGISTRATION</a>
	<div id="registration" class="modal">
  		<div class="modal-content">
   			 <div class="modal-header">
      				<span class="close">&times;</span>
      				<h2>REGISTRATION</h2>
   			 </div>
    			 <div class="modal-body">
      				 <form>
					<select name="type">
						<option value="0">Select a type</option>
						<option value="1">Children</option>
						<option value="2">Lector</option>
						<option value="3">Volunteer</option>
						<option value="4">Sponsor</option>
					</select><br><br>
					<div>Your name:</div>
					<input type="text" name ="name" placeholder = "Enter your name" size="30"/><br><br>
					<div>Your lastname:</div>
					<input type="text" name ="lastname" placeholder = "Enter your lastname" size="30"/><br><br>
					<div>Your Email:</div>
					<input type="text" name ="email" placeholder = "Enter your email"size="30"/> <br><br>
					<button type="submit" class="modalbtn">Register</button>	
				</form>
    			</div>
     		 </div>
	</div>		        
</div>
	<!-- End of container -->
	
<!--=========================LECTORS========================-->

<div class="lectors-wrapper">
	<h2>LECTORS </h2>
	<div class="lectors">
   	  	<div class="lectsection" >
				<img src="images/lector1.jpg" alt="John Smith"/>
				<div class="lectinfo">
					<h3>Gerrard Tolliday</h3>
					<p> there's some info about the lector bla bla bla, he did amazing job at Richmond university, they looked hopeless before his lectures, now they're top tier programmers<p>
				</div>
		</div>
		<br>
		<div class="lectsection">
				<img src="images/lector2.jpg" alt="John Smith"/>
				<div class="lectinfo">
					<h3>Sandy Bernston</h3>
					<p > there's some info about the lector bla bla bla, she did amazing job at Duke university, they looked hopeless before her lectures, now they're top tier programmers<p>
				</div>
		</div>
		<br>
			<div class="lectsection">
				<img src="images/lector3.jpg" alt="John Smith"/>
				<div class="lectinfo">
					<h3>Abraham Sawtell</h3>
					<p> there's some info about the lector bla bla bla, he did amazing job at University Kentucky, they looked hopeless before his lectures, now they're top tier programmers<p>
				</div>
		</div>
		</div>
		
	</div>
	
<!--=========================PARENT FEEDBACKS========================-->

	<div class="parentfeedbacks">
		<h2>PARENT FEEDBACKS</h2> 
		<div class="testimonials">
			<section>
				<div class="content">
					<div class="author">
						<div class="image">
							<img src="images/pic01.jpg" alt="" />
						</div>
						<p class="credit">- <strong>Danielle Dodder -</strong> <span>Spain</span></p>
					</div>
					<blockquote>
						<p>"This was my son's first experience of Code Camp and I found it to be professional and calmly organised from the start. He returned full of confidence and had clearly enjoyed all the activities!"</p>
					</blockquote>
				</div>
			</section>
			<section>
				<div class="content">
					<div class="author">
						<div class="image">
							<img src="images/pic03.jpg" alt="" />
						</div>
						<p class="credit">- <strong>John Doe - </strong> <span>Ireland</span></p>
					</div>
					<blockquote>
						<p>“I've learned that this isn’t just playing a game. Code Camp really allows a child’s creativity to come through, which I think is phenomenal.”</p>
					</blockquote>
				</div>
			</section>
			<section>
				<div class="content">
					<div class="author">
						<div class="image">
							<img src="images/pic02.jpg" alt="" />
						</div>
						<p class="credit">- <strong> Astrid Ansorge - </strong> <span>Germany</span></p>
					</div>
					<blockquote>
						<p>"My daughter loved the experience and made great friends!! Already talking about next year!!!”</p>
					</blockquote>
                </div>
			</section>
		</div>
	</div>
		   
 <!--=============Feedback form==============-->	
	
<div class="feedback">
	<section>
		<h2>LEAVE YOUR FEEDBACKS</h2> 
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" />
		Your Name:<br><input type="text" name ="name" value="<?php echo $name;?>"/>
<?php echo $error['name']; ?><br><br>
		Your Email: <br><input type="text" name ="email" value="<?php echo $email; ?>"/>
<?php echo $error['email']; ?> <br><br>
		Your Feedback:<br><textarea name="feedback"><?php echo $feedback; ?></textarea>
<?php echo $error['feedback']; ?><br><br>
		1+1=: <br><input type="number" name ="sum" placeholder = "Select sum" /> 
<?php echo $error['sum']; ?> <br><br>
		<input type="text" name ="empty" value=""/><br><br>
		<button type="submit" class="leavefeedbackbtn">Save feedback</button>		
		</form>
	</section>
</div>
<!--=============FOOTER==============-->

	<footer>
		<div class="three-columns">

			<div class="contacts">
					CONTACTS<br>
					+37065085000<br>
					Coding Schools Limited<br>
					Saulėtekio g. 14<br>
					Vilnius 2018, Lithuania<br>					
			</div>

			<div class="social"> 
				<div class="soc" span title="Facebook"><a href="#"><img src="https://cdn4.iconfinder.com/data/icons/social-media-icons-the-circle-set/48/facebook_circle-512.png"></a>
				</div>
				<div class="soc" span title="Twitter"><a href="#"><img src="https://www.shareicon.net/data/128x128/2016/08/01/640413_media_512x512.png"></a>
				</div><div class="soc" span title="Instagram"><a href="#"><img src="https://cdn3.iconfinder.com/data/icons/free-social-icons/67/instagram_circle_color-512.png"></a>
				</div>			
			</div>

			<div class="copy"> Copyright © 2018 Digital Onions. All Rights Reserved.<a href id="#header-wrapper"><span class="goup">GO UP ⬆</span></a>
			</div>

		</div>
		<!-- end of three-columns -->
		
	</footer>

	<script>
		function myFunction() {
			var x = document.getElementById("myTopnav");
			if (x.className === "topnav") {
				x.className += " responsive";
			} else {
				x.className = "topnav";
			}
		}
		
	var modal = document.getElementById('registration');
	var btn1 = document.getElementById("regbtn");
	var btn2 = document.getElementById("regmenubtn");
	var span = document.getElementsByClassName("close")[0];
	btn1.onclick = function() {
    		modal.style.display = "block";
		}
	btn2.onclick = function() {
    		modal.style.display = "block";
		}
	span.onclick = function() {
    		modal.style.display = "none";
		}
	window.onclick = function(event) {
    		if (event.target == modal) {
        		modal.style.display = "none";
    			}
	}	
</script>
		   
<script src="scripts/slider.js"></script>
	
</body>
		
</html>
<?php
	}else {
		header("Location:index.php");
}
?> 
