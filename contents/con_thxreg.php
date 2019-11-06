<?php

$result = mysqli_query($con, "SELECT * FROM users WHERE email = '$_GET[user]'");

while ($row=mysqli_fetch_assoc($result)){
	$uid = $row['uid'];
	$nev = $row['nev'];
	$email = $row['email'];
	$tel = $row['tel'];
}
?>

<div class="container">
	<div class="row">
        <div class="col-sm-12">
        	<h1>KÖSZÖNJÜK A REGISZTRÁCIÓT</h1>
        </div>
		<div class="col-sm-8">
			<img src="images/thxreg.png" width="100%" />
            <h6>Ön az imént regisztrált oldalunkon az alábbi adatokkal:</h6>
            <ul>
            	<li><b>Név:</b> <?php echo $nev; ?></li>
                <li><b>E-mail:</b> <?php echo $email; ?></li>
                <li><b>Tel:</b> <?php echo $tel; ?></li>
                <li><b>... és az Ön által megadott jelszó.</b></li>
            </ul><br />
            <h6>A regisztráció befejezéséhez erősítse meg azt a gomb megnyomásával!</h6><br />
            <form method="POST">
            	<input type="hidden" name="status" value="0">
                <input type="hidden" name="uid" value="<?php echo $uid ;?>">
            	<button type="submit" class="btn btn-primary" name="go_meg">MEGERŐSÍTÉS</button>
            </form>
		</div>
        
       <?php
	   if(isset($_POST['go_meg'])){
		$sql = "UPDATE users SET status = '$_POST[status]' WHERE uid = '$_POST[uid]'"; 
			if($con->query($sql)=== TRUE){
				$_SESSION['new_uid'] = $_POST['uid'];
				echo '<meta http-equiv="refresh" content="1;url=http://localhost/szf3536/index.php">';
			}  
		$con->close();
	   }
	   ?>
	
		<div class="col-sm-4 wg-s">
			<?php include('contents/con_sidebar.php') ?>
		</div>
	</div>
</div>