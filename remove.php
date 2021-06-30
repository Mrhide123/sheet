<?php
  include 'header.php';
?>
<?
if(isset($_POST['submit'])){
	$rand=rand(111111111,999999999);
	move_uploaded_file($_FILES['file']['tmp_name'],
	'upload/'.$rand.$_FILES['file']['name']);
	
// please enter website url 
	$file="enter website url/upload/".$rand.$_FILES['file']['name'];

	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'https://api.remove.bg/v1.0/removebg');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POST, 1);
	$post = array(
		'image_url' => $file,
		'size' => 'auto'
	);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
	$headers = array();
	$headers[] = 'X-Api-Key: bBZi9kiCdXcordpXYQhqsVuC';
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	$result = curl_exec($ch);
	curl_close($ch);
	$fp=fopen('remove/'.$rand.'.png',"wb");
	fwrite($fp,$result);
	fclose($fp);
	echo "<img src='remove/$rand.png'>";
}
?>
<form method="post" id="frmSubmit" enctype="multipart/form-data">
         <label>
            <p class="label-txt">Upload your image </p>
            <input type="file" name="file" class="input"  >
            <div class="line-box">
               <div class="line"></div>
            </div>
         </label>
         
         <button type="submit" id="btnSubmit" name="submit">Submit</button>

		 <bu
		 <div id="msg"></div>
      </form>
	  <button type="submit" id="btnSubmit1" name="submit">Rest</button>

   <script>
  jQuery('#frmSubmit').on('submit',function(e){
	success:function(result){
				jQuery('#frmSubmit1')[0].reset();
				jQuery('#msg').html('Thank You');
				jQuery('#btnSubmit').attr('disabled',false);
				//window.location.href='';
			}
  }
	  </script>