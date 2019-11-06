<div class="container">
	<div class="row">
        <div class="col-sm-12">
        	<h1>REGISZTRÁCIÓ</h1>
        </div>
		<div class="col-sm-8">
			<img src="images/registration-main.jpg" width="100%" />
            <p><form name="urlap" method="POST" onSubmit="return ellenoriz()">
  <div class="form-group">
    <input type="email" name="email" class="form-control" id="email" placeholder="E-mail cím*" required >
  </div>
  <div class="form-group">
    <input type="text" name="vnev" class="form-control" id="vnev" placeholder="Vezetéknév*" required >
  </div>
  <div class="form-group">
    <input type="text" name="knev" class="form-control" id="knev" placeholder="Utónév*" required >
  </div>
  <div class="form-group">
    <input type="text" name="tel" class="form-control" id="tel" placeholder="Telefon" >
  </div>
  
 <!-- cím rész eleje -->
 <p>A címet később is megadhatja a FIÓKOM menü alatt.</p> 
  <div class="form-group">
    <input type="text" class="form-control" name="irsz" id="irsz" placeholder="Irsz" value="<?php echo $_POST['irsz'] ?>" >
  </div>
  <div class="form-group">
    <input type="text" class="form-control" name="telepules" id="telepules" placeholder="Település" value="<?php echo $_POST['telepules'] ?>" >
  </div>
  <div class="form-group">
    <input type="text" class="form-control" name="cim" id="cim" placeholder="Cím" value="<?php echo $_POST['cim'] ?>" >
  </div>
  
 <!-- cím rész vége --> 
 
  <div class="form-group">
    <input type="password" name="pwd1" class="form-control" id="pwd1" placeholder="Jelszó*" required >
  </div>
  <div class="form-group">
    <input type="password" name="pwd2" class="form-control" id="pwd2" placeholder="Jelszó újra*" required >
  </div>
  <button type="submit" name="go_reg" class="btn btn-secondary">REGISZTRÁLOK</button>
</form>
		</p>
		</div>
		<div class="col-sm-4 wg-s">
			<?php include('contents/con_sidebar.php') ?>
		</div>
	</div>
</div>

<!-- A jelszó kitöltöttséget és egyezést vizsgáló javascript-->

<script>	
	var password = document.getElementById("pwd1"), confirm_password = document.getElementById("pwd2");

	function validatePassword(){
  
  		if(password.value != confirm_password.value) {
    		
			confirm_password.setCustomValidity("A jelszó nem egyezik");
  		} 
		
		else {
    
			confirm_password.setCustomValidity('');
  		}
		}

	pwd1.onchange = validatePassword;
	pwd2.onkeyup = validatePassword;
</script>
<?php
if(isset($_POST['go_reg'])){
	
	$veznev = filter_input(INPUT_POST, 'vnev', FILTER_SANITIZE_SPECIAL_CHARS);
	$utnev = filter_input(INPUT_POST, 'knev', FILTER_SANITIZE_SPECIAL_CHARS);
	$nev = $veznev.' '.$utnev;
	$email = $_POST['email'];
	
	$pass = sha1($_POST['pwd1']);
	
	$tel = ($_POST['tel']== '' ? 'Nem adott meg számot': $_POST['tel']);
	
	$result = mysqli_query($con,"SELECT email FROM users WHERE email = '$_POST[email]'");
		
		if($result->num_rows > 0){
			echo '<script> alert("Ez az e-mail cím már foglalt.")</script>';
			$sing = 1;	
		}
		
		if($sing != 1 /* && $ok != 1 */){
			
			$sql = "INSERT INTO users (nev, email, tel, pass, status) VALUE ('$nev', '$email', '$tel', '$pass', '1')";
		
		if ($con->query($sql) === TRUE) {
			
			
			$res = mysqli_query($con,"SELECT uid FROM users WHERE email = '$_POST[email]'");
			
					while ($rows = mysqli_fetch_array($res)) {
						
						$uid = $rows['uid'];
						
						$sql = "INSERT INTO address (uid, irsz, telepules, cim) VALUE ('$uid','$_POST[irsz]','$_POST[telepules]','$_POST[cim]')";
						
						if ($con->query($sql) === TRUE) {
	
							echo '<meta http-equiv="refresh" content="1;url=http://localhost/szf3536/index.php?menu=thxreg&user='.$email.'">';
		
						}	
					}
			}
		}
$con->close();	
}
?>