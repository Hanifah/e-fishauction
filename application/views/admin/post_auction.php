<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/jquery-ui/jquery.timepicker.css"></script>
<script src="<?php echo base_url();?>assets/jquery-ui/jquery.timepicker.js"></script>
<h1>Post New Auction</h1>
<?php echo form_open_multipart('admin/post_auction');?>
  <div class="one-half">
    <fieldset>
        <label>Fish Name <span class="required">*</span></label>
        <?php echo form_input($viewmodel['fish_name']); 
              echo form_error('fish_name');
        ?>
      </fieldset>
      <fieldset>
        <label>Qty (gr)<span class="required">*</span></label>
        <?php echo form_input($viewmodel['qty']); 
        echo form_error('qty');
        ?>
      </fieldset>
      <fieldset>
        <label>Price <span class="required">*</span></label>
        <?php echo form_input($viewmodel['amount']);
        echo form_error('amount');
        ?>
      </fieldset>
      <fieldset>
        <label>Open bid date<span class="required">*</span></label>
        <?php echo form_input($viewmodel['open_bid']); echo form_input($viewmodel['open_bid_time']);
        echo form_error('open_bid');
        ?>
      </fieldset>
      <fieldset>
        <label>Close bid date<span class="required">*</span></label>
        <?php echo form_input($viewmodel['close_bid']); echo form_input($viewmodel['close_bid_time']);
        echo form_error('close_bid');
        ?>
      </fieldset>
  </div>
  <div class="one-half last"> 
      <fieldset>
        <label>Upload Image <span class="required">*</span></label>
        <?php echo form_upload($viewmodel['image_file']);
        if (form_error('file_name') == '') {
          echo $error_upload;
        }
        else{
          echo form_error('file_name');
        }
        echo form_input($viewmodel['file_name']);
        ?>
      </fieldset>
      <fieldset>
        <label>Description <span class="required">*</span></label>
        <?php echo form_textarea($viewmodel['descriptions']);
        echo form_error('descriptions');
        ?>
      </fieldset>
  </div>
  
  <div style="clear:both; height: 40px;">
    <fieldset>
      <input name="Mysubmitted" id="Mysubmitted" value="Post" class="button white button-submit" type="submit">
    </fieldset>
  </div>
</form>
    <!--END form ID contact_form -->
<script type="text/javascript">
    $('.numeric').blur(function(){
      var input = parseFloat($(this).val()).toFixed(1);
      $(this).val(input);
    });
    $(document).ready(function(){
      $('.tp').timepicker({ timeFormat: 'HH:mm:ss' });
    });
</script>