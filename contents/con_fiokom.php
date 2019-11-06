<div class="container">
	<div class="row">
        <div class="col-sm-12">
        	<h1><?php echo $_SESSION['user']?> FIÓKJA</h1>
        </div>
        
        <?php
		
		// Adatok lekérdezése a $_SESSION[uid] inner join segítségével.
        
		$result = mysqli_query($con, "SELECT users.*, address.* FROM users INNER JOIN address ON users.uid = address.uid WHERE users.uid = '$_SESSION[uid]'");

			while ($row=mysqli_fetch_assoc($result)){
				$uid = $row['uid'];
				$nev = $row['nev'];
				$email = $row['email'];
				$tel = $row['tel'];
				$aid = $row['aid'];
				$irsz = $row['irsz'];
				$telepules = $row['telepules'];
				$cim = $row['cim'];
			}
		
		// Szétválasztjuk a nevet a szóköz mentén.
		
		$full_name = explode(' ',$nev);
		
		?>
        
		<div class="col-sm-8">
            <p><form method="POST">
  <div class="form-group">
    <input type="hidden" name="uid" value="<?php echo $uid; ?>" >
    <input type="hidden" name="aid" value="<?php echo $aid; ?>" >
    <input type="email" name="email" class="form-control" id="email" placeholder="E-mail cím*" value="<?php echo $email; ?>" required >
  </div>
  <div class="form-group">
    <input type="text" name="vnev" class="form-control" id="vnev" placeholder="Vezetéknév*" value="<?php echo $full_name[0]; ?>" required >
  </div>
  <div class="form-group">
    <input type="text" name="knev" class="form-control" id="knev" placeholder="Utónév*" value="<?php echo $full_name[1]; ?>" required >
  </div>
  <div class="form-group">
    <input type="text" name="tel" class="form-control" id="tel" value="<?php echo $tel; ?>" placeholder="Telefon" >
  </div>
  
  <div class="form-group">
    <input type="text" name="irsz" class="form-control" id="irsz" value="<?php echo $irsz; ?>" placeholder="Irányítószám" >
  </div>
  <div class="form-group">
    <input type="text" name="telepules" class="form-control" id="telepules" value="<?php echo $telepules; ?>" placeholder="Település" >
  </div>
  <div class="form-group">
    <input type="text" name="cim" class="form-control" id="cim" value="<?php echo $cim; ?>" placeholder="Utca / hsz." >
  </div>
  <div class="form-group">
    <input type="password" name="pwd1" class="form-control" id="pwd1" placeholder="Új jelszó, ha módosítja*" >
  </div>
  <div class="form-group">
    <input type="password" name="pwd2" class="form-control" id="pwd2" placeholder="Új jelszó még egyszer*" >
  </div>
    <button type="submit" name="go_mod" class="btn btn-secondary" onclick="return confirm('Biztos benne?')">MÓDOSÍTOM AZ ADATOKAT</button>
</form>
		</p>
		</div>
		<div class="col-sm-4 wg-s">
			<?php include('contents/con_sidebar.php') ?>
		</div>
	</div>
</div>

<?php
if(isset($_POST['go_mod'])){
	
	if($_POST['pwd1'] !='' && ($_POST['pwd1'] != $_POST['pwd2'])){
		
		echo '<script> alert(\'A jelszavak nem egyeznek!\')</script>';
		
		$sign = 1;
		
	}
	
	$veznev = filter_input(INPUT_POST, 'vnev', FILTER_SANITIZE_SPECIAL_CHARS);
	$utnev = filter_input(INPUT_POST, 'knev', FILTER_SANITIZE_SPECIAL_CHARS);
	$irsz = filter_input(INPUT_POST, 'irsz', FILTER_SANITIZE_SPECIAL_CHARS);
	$telepules = filter_input(INPUT_POST, 'telepules', FILTER_SANITIZE_SPECIAL_CHARS);
	$cim = filter_input(INPUT_POST, 'cim', FILTER_SANITIZE_SPECIAL_CHARS);
	
	$nev = $veznev.' '.$utnev;
	$email = $_POST['email'];
	
	$pass = sha1($_POST['pwd1']);
	
	$tel = ($_POST['tel']== '' ? 'Nem adott meg számot': $_POST['tel']);
	
	$res = mysqli_query($con,"SELECT uid,email FROM user WHERE email = '$_POST[email]'");
			
					while ($rows = mysqli_fetch_array($res)) {
						
						$uid = $rows['uid'];
						$email = $rows['email'];
						
						if($uid != $_POST['uid']){
							echo 'Az email cím már foglalt';
							$sign = 1;
							}
					}
		
		if($sign != 1){
			
			if($_POST['irsz'] != '' || $_POST['telepules'] != '' || $_POST['cim'] != ''){
				if($_POST['irsz'] == ''){
					echo '<script>alert("Add meg a irányítószámot is!");</script>';
					$ok = 1;
				}
				if($_POST['telepules'] == ''){
					echo '<script>alert("Add meg a települést is!");</script>';
					$ok = 1;
				}
				if($_POST['cim'] == ''){
					echo '<script>alert("Add meg a címet is!");</script>';
					$ok = 1;
				}
			}
			
			if($_POST['pwd1'] != ''){
			
				$mod_pwd = ', pass = "'.$pass.'"'; 	
			
			}
			
			
			$sql = "UPDATE users SET nev = '$nev', email = '$email', tel = '$tel' $mod_pwd WHERE uid = '$_POST[uid]'";
		
				if ($con->query($sql) === TRUE) {
			
// Innen kezdődik a cím módosítás, felvitel			
			
					if($ok != 1){
			
							$sql = "DELETE FROM address WHERE aid = '$_POST[aid]'";
						
									if ($con->query($sql) === TRUE) {
							
										$sql = "INSERT INTO address (uid, irsz, telepules, cim) VALUE ('$_POST[uid]','$irsz','$telepules','$cim')";
						
											if ($con->query($sql) === TRUE) {
	
												echo '<script>alert("Sikeres adatmódosítás!");</script>';
											}
	
									}	
				
					}

		
			echo '<meta http-equiv="refresh" content="1;url=http://localhost/szf3536/index.php?menu=fiokom">';
		
		}
		}
$con->close();
	
}
?>