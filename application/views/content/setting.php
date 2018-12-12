
<!-- first click here to print -->
  <link href="<?= base_url()?>global/bootstrap/dist/css/profile-card.css" rel="stylesheet">
<div class="container">
    <div class="card">
      <form method="post" action="<?php echo base_url();?>Qr_code_generate/ProcessDeleteAccount">
      		<span><input class="buttons" type="submit" value="Delete Account"></span>
      </form>
	  <?php foreach($gender as $item){ if($item->gender == "male"){ ?>
	  	<img src="<?= base_url()?>global/img/man.jpg" alt="Man silhouette" style="width:100%"/>
	  <?php }else { ?>
	  	<img src="<?= base_url()?>global/img/woman.jpg" alt="Woman silhouette" style="width:100%"/>
	  <?php } ?>
	  <h1 class="name-card"><?php echo $item->nama_user ?></h1>
	  <p class="title"><i class="fa fa-vcard"></i> @<?php echo $item->username_user ?></p>
	  <p><i class="fa fa-envelope"></i> <?php echo $item->email_user ?></p>
	  <div style="margin: 24px 0;">
	    <a><i class="fa fa-user-circle-o"></i></a> 
	    <a><i class="fa fa-user-circle-o"></i></a>  
	    <a><i class="fa fa-user-circle-o"></i></a>  
	    <a><i class="fa fa-user-circle-o"></i></a> 
	 </div>
	 <span><a class="button" href="<?= base_url() ?>Qr_code_generate/EditSetting"><i class="fa fa-edit"></i> Edit Profile</a></span>
	 <?php } ?>
</div>
</div>
