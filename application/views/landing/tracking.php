<h1>Tracking</h1>
<?php echo form_open('landing/tracking');?>
  <div class="one-half">
    <fieldset>
        <label>Your AWB.No</label>
        <?php echo form_input('awb_numbers'); ?>
      </fieldset>
  </div>
  <div class="one-half last"> 
  </div>
  
  <div style="clear:both; height: 40px;">
    <fieldset>
      <input name="Mysubmitted" id="Mysubmitted" value="Search" class="button white button-submit" type="submit">
    </fieldset>
  </div>
</form>