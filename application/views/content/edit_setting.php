
<!-- first click here to print -->
  <link href="<?= base_url()?>global/bootstrap/dist/css/profile-card.css" rel="stylesheet">
<div class="container">
	<form method="post" action="<?php echo base_url();?>Qr_code_generate/ProcessEditSetting">
	    <div class="card">
		  <?php if($gender == "male"){ ?>
		  	<img src="<?= base_url()?>global/img/man.jpg" alt="Man silhouette" style="width:100%"/>
		  <?php }else { ?>
		  	<img src="<?= base_url()?>global/img/woman.jpg" alt="Woman silhouette" style="width:100%"/>
		  <?php } ?>
		  <h1 class="name-card"><input class="input-card" maxlength="100" type="text" name="name" value="<?php echo $nama_user; ?>" placeholder="Insert Your Name"></h1>
		  <p class="title"><i class="fa fa-vcard"></i><input class="input-card2" maxlength="100" type="text" name="username" value="<?php echo $username_user; ?>" placeholder="Insert Your Username"></p>
		  <p><i class="fa fa-lock" style="font-size:28px"></i><input class="input-card2" type="text" name="password" placeholder="************"></p>
		  <div style="margin: 24px 0;">
		    <a><i class="fa fa-user-circle-o"></i></a> 
		    <a><i class="fa fa-user-circle-o"></i></a>  
		    <a><i class="fa fa-user-circle-o"></i></a>  
		    <a><i class="fa fa-user-circle-o"></i></a> 
		 </div>
		 <span><input type="submit" class="button" value="Save"></span>
		</div>
	</form>
</div>
