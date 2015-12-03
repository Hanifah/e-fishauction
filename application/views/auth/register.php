<h1><?php echo lang('create_user_heading');?></h1>
<p><?php echo lang('create_user_subheading');?></p>

<div class="one-half">
<?php echo form_open("auth/register");?>
      <fieldset>
        <?php echo lang('create_user_fname_label', 'first_name');?><span class="required">*</span>
            <?php echo form_input($first_name)?>
            <?php echo form_error('first_name')?>
      </fieldset>

      <fieldset>
          <?php echo lang('create_user_lname_label', 'last_name');?><span class="required">*</span>
            <?php echo form_input($last_name);?> 
            <?php echo form_error('last_name')?> 
      </fieldset>
      <fieldset>
          <label>User Category <span class="required">*</span></label>
            <?php $attribute = array('class' => 'text', 'onchange' => 'categoryChange(this)' ); ?>
            <?php echo form_dropdown('category',$category,'',$attribute);?>  
      </fieldset>
      <fieldset class="company-name" style="display:none">
            <?php echo lang('create_user_company_label', 'company');?>
            <?php echo form_input($company);?>
      </fieldset>

      <fieldset>
            <?php echo lang('create_user_email_label', 'email');?><span class="required">*</span>
            <?php echo form_input($email);?>
            <?php echo form_error('email')?>
      </fieldset>

      <fieldset>
            <?php echo lang('create_user_phone_label', 'phone');?><span class="required">*</span>
            <?php echo form_input($phone);?>
            <?php echo form_error('phone')?>
      </fieldset>
</div>
<div class="one-half last">
      <fieldset>
            <?php echo lang('create_user_password_label', 'password');?><span class="required">*</span>
            <?php echo form_input($password);?>
            <?php echo form_error('password')?>
      </fieldset>

      <fieldset>
            <?php echo lang('create_user_password_confirm_label', 'password_confirm');?><span class="required">*</span>
            <?php echo form_input($password_confirm);?>
            <?php echo form_error('password_confirm')?>
      </fieldset>
      <fieldset>
            <label>NPWP <span class="required">*</span></label>
            <?php echo form_input($npwp);?>
            <?php echo form_error('npwp')?>
      </fieldset>
      <fieldset>
            <label>Address <span class="required">*</span></label>
            <?php echo form_textarea($address);?>
            <?php echo form_error('address')?>
      </fieldset>
</div>
  <div style="clear:both; height: 40px;">
    <fieldset>
      <input name="Mysubmitted" id="Mysubmitted" value="Register" class="button white button-submit" type="submit">
    </fieldset>
  </div>
<?php echo form_close();?>
  <script type="text/javascript">
  function categoryChange(val){
      if ($(val).val() == 'Company'){
            $('.company-name').show();
      }
      else{
            $('.company-name').hide();
      }
}
  </script>