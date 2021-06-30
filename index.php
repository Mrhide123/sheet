<?php
  include 'header.php';
?>
   <body>
      <form method="post" id="frmSubmit">
         <label>
            <p class="label-txt">ENTER YOUR NAME</p>
            <input type="text" class="input" name="name" required>
            <div class="line-box">
               <div class="line"></div>
            </div>
         </label>
         <label>
            <p class="label-txt">ENTER YOUR EMAIL</p>
            <input type="text" class="input" name="email" required>
            <div class="line-box">
               <div class="line"></div>
            </div>
         </label>
         <button type="submit" id="btnSubmit">Submit</button>
		 <div id="msg"></div>
      </form>
	  <script>
	  jQuery('#frmSubmit').on('submit',function(e){
		e.preventDefault();
		jQuery('#msg').html('Please wait...');
		jQuery('#btnSubmit').attr('disabled',true);
		jQuery.ajax({
			url:'https://script.google.com/macros/s/AKfycbw2yPvNLoQ-80IjuVG5ISNf8TFTN6GvvbPxyHXsC1clPVnHIeYuBqyMW3C8bzgTzFZxSQ/exec',
			type:'post',
			data:jQuery('#frmSubmit').serialize(),
			success:function(result){
				jQuery('#frmSubmit')[0].reset();
				jQuery('#msg').html('Thank You');
				jQuery('#btnSubmit').attr('disabled',false);
				//window.location.href='';
			}
		});
	  });
	  </script>
   </body>
</html>