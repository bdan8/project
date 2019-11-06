<?php
		if(isset($_POST['go'])){
			
			$pass = sha1($_POST['pwd1']);
			$result = mysqli_query($con, "SELECT * FROM users WHERE email = '$_POST[email]' AND pass = '$pass' ");
					$count = 0;
				while ($rows = mysqli_fetch_array($result)) {
					$_SESSION['uid'] = $rows['uid'];
					$_SESSION['user'] = $rows['nev'];
					$_SESSION['email'] = $rows['email'];
					$count++;
				}
			if($count > 0){$_SESSION['admin'] = 1;}
			/* echo '<meta http-equiv="refresh" content="1;url=http://localhost/szf3536/index.php">'*/;
		}
						
		if($_SESSION['new_uid']){
			$result = mysqli_query($con, "SELECT * FROM users WHERE uid = '$_SESSION[new_uid]'");
				while ($rows = mysqli_fetch_array($result)) {
					$_SESSION['uid'] = $rows['uid'];
					$_SESSION['user'] = $rows['nev'];
					$_SESSION['email'] = $rows['email'];
				}
			$_SESSION['admin'] = 1;
		}
?>