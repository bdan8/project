<div class="container">
	<div class="row">
        <div class="col-sm-12">
        	<h1>KATALÓGUS</h1>
        </div>
		<div class="col-sm-8"><br /><br />
        <a class="btn btn-secondary" href="?menu=katalogus&tip=last_minute">LAST MINUTE</a> <a class="btn btn-secondary" href="?menu=katalogus&tip=first_minute">FIRST MINUTE</a> <a class="btn btn-secondary" href="?menu=katalogus&tip=all_in">ALL IN</a><br /><br />
 <?php
  if($_GET['tip']){
	  
	  $result = mysqli_query($con, "SELECT * FROM tips WHERE term_alkat = '$_GET[tip]' AND status = 'active' ORDER BY term_kod ASC");
			$idx = 0;
			while ($rows = mysqli_fetch_array($result)) {
			$term_id[$idx] = $rows['term_id'];
			$term_kod[$idx] = $rows['term_kod'];
			$term_nev[$idx] = $rows['term_nev'];
			$term_ar[$idx] = $rows['term_ar'];
			$term_fokat[$idx] = $rows['term_fokat'];
			$term_alkat[$idx] = $rows['term_alkat'];
			$term_jell[$idx] = $rows['term_jell'];
			$kepnev[$idx] = 'admin/uploads/'.$rows['kepnev'];
			switch($term_fokat[$idx]){
			case "train":
			$term_fokat[$idx] = 'TRAIN';
			break;
			case "plane":
			$term_fokat[$idx] = 'PLANE';
			break;
			case "cruiser":
			$term_fokat[$idx] = 'CRUISER';
			break;
			}

			switch($term_alkat[$idx]){
			case "last_minute":
			$term_alkat[$idx] = 'LAST MINUTE';
			break;
			case "first_minute":
			$term_alkat[$idx] = 'FIRST MINUTE';
			break;
			case "all_in":
			$term_alkat[$idx] = 'ALL-IN';
			break;
			}
			
			
			$idx++;
			}

	  
	 echo
	 '<div class="row">
	 	<div class="col-sm-12">
	 		<h3>CATEGORY: '.$term_alkat[0].'</h3>
			<hr>
	 	</div>
	 </div>';
	 
	  
foreach($term_id as $idx => $value){
	
	echo '
	<div class="row">
		<div class="col-sm-12">
	 		<h4>'.$term_fokat[$idx].'</h4>
	 	</div>
		<div class="col-sm-2 text-center">
			<a href="#" data-featherlight="'.$kepnev[$idx].'"><img src="'.$kepnev[$idx].'" width="120" height="120" /></a>
		</div>
		<div class="col-sm-9 item-txt">
			<h5>'.$term_nev[$idx].'</h5>
			<p>'.$term_jell[$idx].'</p>
			<h4>'.$term_ar[$idx].' Ft</h4>
		</div>
	</div>
	<hr>';
}	  
  echo
            '
			<h3>OTHER INFORMATION</h3>
			<p style="text-align:justify">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Maecenas mattis leo sed orci pellentesque, in semper lectus molestie. Vivamus lobortis dolor a arcu imperdiet laoreet. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas varius porttitor dolor, vel rutrum purus rhoncus ut. Aenean ullamcorper nibh at diam condimentum pellentesque. Sed consectetur purus ut nulla pharetra, molestie placerat nunc porttitor.</p><p style="text-align:justify">

Cras ut imperdiet lorem, eget scelerisque nunc. Fusce at ex id elit tempus vulputate at ut neque. Nullam viverra est eu egestas pulvinar. Suspendisse et cursus metus. Suspendisse vitae turpis sit amet ligula sodales auctor a sit amet neque. Aliquam erat volutpat. Nam eget lacus placerat ipsum convallis gravida vitae vitae diam. Suspendisse potenti. Vivamus finibus id justo a bibendum. Etiam sit amet vestibulum nisl, sit amet gravida odio. Pellentesque vel viverra ex.
		</p>';}
		else
		echo'<h3>GOOD TO KNOW</h3>
			<p style="text-align:justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas mattis hendrerit diam, non semper lectus ultricies non. Aliquam et quam lorem. Nulla eu purus ligula. Pellentesque quis metus sapien. Vivamus euismod, turpis eget bibendum commodo, magna magna gravida ex, quis aliquam neque enim quis ex. Nunc varius lacinia feugiat. Mauris a enim et justo sagittis faucibus sit amet eu ligula. Sed dignissim eget leo vitae euismod. Ut pellentesque erat massa, et fringilla mi cursus nec. Duis pharetra luctus nisl in tincidunt. Sed at accumsan sapien, vel hendrerit sem.</p><p style="text-align:justify">

Maecenas sed eleifend ex. Etiam pellentesque metus sed sem posuere, hendrerit consequat diam volutpat. Suspendisse potenti. Sed suscipit augue ipsum, id convallis metus sodales vitae. Aenean non lacus dignissim, ullamcorper augue mattis, mollis nibh. Donec sapien nulla, egestas quis finibus vel, sollicitudin eget nunc. Donec bibendum placerat ultricies. Praesent vel metus vitae massa mattis imperdiet ut sit amet eros. Maecenas mi neque, dictum a blandit sit amet, bibendum eget lacus.</p><p style="text-align:justify">

Fusce a elementum quam, at mollis eros. Donec vel iaculis lorem. Phasellus gravida pellentesque tempor. Cras sapien nulla, interdum ac dignissim in, congue eu felis. Pellentesque felis mauris, dictum vel sagittis non, pretium vel urna. Cras consectetur dapibus arcu in rutrum. Sed auctor imperdiet commodo.</p><p style="text-align:justify">

Praesent eget pharetra lectus. Suspendisse ultrices erat nec mauris sollicitudin, viverra viverra ex tempus. Morbi iaculis lobortis ante, sed ullamcorper purus auctor eu. In semper ante vel lorem efficitur, non laoreet mi dictum. Donec ut quam et est gravida suscipit a et sapien. Integer efficitur velit ut magna volutpat, et interdum nulla dictum. Nullam eleifend lacus a gravida ullamcorper. Duis ultricies enim sit amet erat maximus, sed luctus neque viverra.</p><p style="text-align:justify">

Nunc facilisis vehicula elit eget pharetra. Etiam pulvinar pharetra dolor. Donec est metus, cursus vitae eros sed, feugiat porta mi. Etiam imperdiet vitae tortor sit amet maximus. Vivamus pharetra sapien pharetra justo ullamcorper, vitae consectetur lacus tempus. Cras at aliquet mauris, quis cursus erat. Vestibulum venenatis turpis a feugiat ornare. In placerat sed dolor et sagittis.
		</p>';
?>
		</div>
		<div class="col-sm-4 wg-s">
			<?php include('contents/con_sidebar.php') ?>
		</div>
	</div>
</div>
