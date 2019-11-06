<?php
session_start();
require('config.php');
if($_GET['exit']== 'ok'){
	$_SESSION['admin']='';
	$_SESSION['user']='';
	$_SESSION['uid']='';
	$_SESSION['new_uid']='';
	 echo '<meta http-equiv="refresh" content="1;url=http://localhost:8080/project/index.php">';
}
include('contents/con_login.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bootstrap</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
<?php
	if(!$_GET['menu'] || $_GET['menu'] == 'fo') $d_style = 'head-img';
	else $d_style = 'head-img-small';
?>
<header class="container-fluid <?php echo $d_style; ?>">
  	

    <div class="container top-menu">
    <div class="row">
    		<div style="color:#fff" class="col-sm-6 text-left">
          		<?php  
            		
					if($_SESSION['admin'] == 1){
        				echo
		
							'Bejelentkezve: <b>'.$_SESSION['user'].'</b>';
					}
        
            	?>
            </div>
    		<div class="col-sm-6 text-right"> 
                <?php if($_SESSION['admin'] != 1) {?>
           		<button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#belep">BELÉPÉS</button>
    			<?php }
				else {
				?>
                
                <a class="btn btn-warning pull-right" href="?exit=ok" onclick="return confirm('Valóban kilépsz?')">KILÉPÉS</a>
                
                <?php } ?>
            </div>
            </div>
    	</div>

    
    <!-- The Modal -->
  <div class="modal" id="belep">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Belépés regisztrált felhasználóknak</h4>
          	<button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         	<form method="POST">
    			<div class="form-group">
      				<input type="email" class="form-control" id="email" placeholder="E-mail cím*" name="email" required />
    			</div>
    			<div class="form-group">
     				<input type="password" class="form-control" id="pwd" placeholder="Jelszó*" name="pwd1" requiredrequired />
    			</div>
    				<button type="submit" class="btn btn-primary" name="go">BELÉPÉS</button>
  			</form>
        </div>
  
        <!-- Modal footer -->
        <div class="modal-footer">
          			<p>Még nem regisztrált partnerünk? Regisztráljon a személyes tartalmakért!</p><br>
            		<form method="GET">
        				<button type="submit" name="menu" class="btn btn-success" value="registration" >REGISZTRÁCIÓ</button>
                	</form>
        </div>
        
      </div>
    </div>
  </div>
	<div class="container main-menu-cont">
		<div class="site-logo"><img src="images/european-cities-logo-300x77.png" width="300" /></div>
		
        <nav class="navbar navbar-expand-lg navbar-light">
  			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    		<span class="navbar-toggler-icon"></span>
  			</button>
  			<div class="collapse navbar-collapse justify-content-center" id="navbarNavAltMarkup">
    			<div class="navbar-nav">
					<a href="?main=fo">FŐOLDAL</a> 
        			<a href="?menu=london">LONDON</a>
        			<a href="?menu=paris">PARIS</a>
        			<a href="?menu=rome">ROME</a>
        			<a href="?menu=madrid">MADRID</a>
        			<?php if($_SESSION['admin']) {?>
                    <a href="?menu=katalogus">CATALOGUE</a>
                    <a href="?menu=fiokom">MY ACCOUNT</a>
                    <?php }?>
    			</div>
  			</div>
		</nav>
	</div>
    <?php if(!$_GET['menu'] || !$_GET['menu'] == 'fo'){ ?>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  		<ol class="carousel-indicators">
    		<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    		<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    		<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
  		</ol>
  	<div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="images/london-main.jpg" alt="LONDON">
		<div class="carousel-caption d-none d-md-block">
    		<h3>ADVENTURES IN LONDON</h3>
    		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
  	 	</div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/paris-main.jpg" alt="Second slide">
      	<div class="carousel-caption d-none d-md-block">
    		<h3>PARISIAN ROMANCE</h3>
    		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
  	 	</div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/rome-main.jpg" alt="Third slide">
      <div class="carousel-caption d-none d-md-block">
    		<h3>VACATION IN ROME</h3>
    		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
  	 	</div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/madrid-main.jpg" alt="Third slide">
      <div class="carousel-caption d-none d-md-block">
    		<h3>SUNSHINE IN MADRID</h3>
    		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
  	 	</div>
    </div>
  </div>
  </div>
  <?php } ?>
</div>
</header>
	<div class="container">
    <?php if(!$_GET['menu'] || $_GET['main']== 'fo'){?>
		<div class="row portfolio">
        	<div class="col-sm-12 text-center"><h2>MAIN PORTFOLIOS</h2></div>
        </div>
        <div class="row">
        	<div class="col-sm-4 text-center por-block">
            	<i class="fas fa-subway fa-5x"></i><br>
            	<h4>TRAIN TRIPS</h4>
            	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vestibulum urna a lacinia mollis. Integer cursus finibus condimentum.</p>
                <a href="?por=train"><div class="main-but">BŐVEBBEN</div></a>
            </div>    
            <div class="col-sm-4 text-center por-block">
            	<i class="fas fa-plane fa-5x"></i>
            	<h4>PLANE TRIPS</h4>
            	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vestibulum urna a lacinia mollis. Integer cursus finibus condimentum.</p>
                <a href="?por=plain"><div class="main-but">BŐVEBBEN</div></a>
            </div>
            <div class="col-sm-4 text-center por-block">
            	<i class="fas fa-ship fa-5x"></i>
            	<h4>CRUISER TRIPS</h4>
            	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vestibulum urna a lacinia mollis. Integer cursus finibus condimentum.</p>
                <a href="?por=cruiser"><div class="main-but">BŐVEBBEN</div></a>
            </div>
        </div>
     </div>
        <div class="container-fluid about-us">
        	<div class="container">
            	<div class="row">
            		<div class="col-sm-4"><img src="images/about-us.jpg" width="100%"></div>
                	<div class="col-sm-8">
                    <h2>ABOUT US</h2>
                    <p>Etiam consequat lacus non maximus consequat. Aliquam vel iaculis nisl. Vestibulum sed odio bibendum, facilisis dolor eget, tempor urna. Etiam ultrices ac odio eget euismod.<br><br>Nullam maximus pulvinar neque pulvinar dignissim. Vivamus ut ultrices justo. Pellentesque ut suscipit massa. Phasellus non ipsum a mauris vestibulum suscipit. Duis ullamcorper mollis enim, hendrerit ultricies mi ornare quis. Aenean non est efficitur turpis accumsan semper et eget augue.</p>
                	</div>
            	</div>
        	</div>
        </div>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1241.8404265429342!2d-0.01923194178771917!3d51.50072386459713!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487602b916c56703%3A0xab02770094382c7f!2sHilton+London+Canary+Wharf!5e0!3m2!1shu!2shu!4v1558267515333!5m2!1shu!2shu" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
	
	
	<?php } 
	
	if($_GET['menu']){ 
		
		echo '<div class="container main-box">';
	        
			if($_GET['menu'] == 'registration' ){
			include('contents/con_'.$_GET['menu'].'.php');
			}
			if($_GET['menu'] == 'thxreg' ){
			include('contents/con_'.$_GET['menu'].'.php');
			}
			if($_GET['menu'] == 'fiokom' ){
			include('contents/con_'.$_GET['menu'].'.php');
			}
			if($_GET['menu'] == 'katalogus' ){
			include('contents/con_'.$_GET['menu'].'.php');
			}
			else{
			include('contents/con_site_content.php');
			}		
	
		echo '</div>';
	} 
	
	?> 
    </div>
    <div class="container-fuid footer-box">
    	<div class="container">
    		<div class="row">
        		<div class="col-sm-4"><h4>RECENT CONTENT</h4><br>
                	<ul>
                    	<li>Lorem ipsum dolor</li>
                        <li>Nullam ultrices</li>
                        <li>Vestibulum ac magna</li>
                        <li>Lorem ipsum dolor</li>
                        <li>Nullam ultrices</li>
                	</ul>
                </div>
                <div class="col-sm-4"><h4>PARTNERS</h4><br>
                	<ul>
                    	<li>Lorem ipsum dolor</li>
                        <li>Nullam ultrices</li>
                        <li>Vestibulum ac magna</li>
                	</ul></div>
                <div class="col-sm-4"><h4>CONTACTS</h4><br>
                	<i class="fas fa-map-marker-alt"></i> <a href="https://goo.gl/maps/QPsDoKGgyksS6AUR8" target="_blank">South Quay, Marsh Wall, E14 9SH, London</a><br>
                    <i class="fas fa-phone"></i> +44 45 569 874 544<br>
                    <i class="fas fa-envelope"></i> info@bcities.co.uk 
                
                </div>
            <div>
        </div>
</body>
</html>