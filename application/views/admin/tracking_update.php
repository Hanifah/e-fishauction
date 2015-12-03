<h1>Update Tracking</h1>
<?php echo form_open('admin/tracking_update/0');?>
  <div class="one-half">
    <fieldset>
        <label>AWB.No</label>
        <?php echo form_input($viewmodel['awb_number']); ?>
        <?php echo form_input($viewmodel['tracking_id']); ?>
      </fieldset>
      <fieldset>
        <label>Origin</label>
        <?php echo form_input($viewmodel['origin']); ?>
      </fieldset>
      <fieldset>
        <label>Destination</label>
        <?php echo form_input($viewmodel['destination']);?>
      </fieldset>
      <fieldset>
        <label>Date of Shipment</label>
        <?php echo form_input($viewmodel['date_of_shipment']); ?>
      </fieldset>
      <fieldset>
        <label>Status</label>
        <?php echo form_input($viewmodel['status']);?>
      </fieldset>
  </div>
  <div class="one-half last"> 
  </div>
  
  <div style="clear:both; height: 40px;">
    <fieldset>
      <input name="Mysubmitted" id="Mysubmitted" value="Update" class="button white button-submit" type="submit">
    </fieldset>
  </div>
</form>