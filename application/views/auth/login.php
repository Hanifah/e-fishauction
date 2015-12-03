<h1><?php echo lang('login_heading');?></h1>
<p><?php echo lang('login_subheading');?></p>

<div id="infoMessage"><?php echo $message;?></div>

<div class="one-half">
<?php echo form_open("auth/login");?>

  <fieldset>
    <?php echo lang('login_identity_label', 'identity');?>
    <?php echo form_input($identity);?>
  </fieldset>

  <fieldset>
    <?php echo lang('login_password_label', 'password');?>
    <?php echo form_input($password);?>
  </fieldset>

  <fieldset><input name="Mysubmitted" id="Mysubmitted" value="Login" class="button white button-submit" type="submit"></fieldset>

<?php echo form_close();?>
</div>
<div class="one-half last">
</div>
<div style="clear:both; height: 40px;">
<p><a href=<?php echo base_url().'index.php/auth/register'?>>Create New Account</a></p>
</div>