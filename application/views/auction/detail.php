 <!-- tab panes -->
  <div id="prod_wrapper">
    <div id="panes">
      <div style="display:block">
      <img src="<?php echo base_url()."uploads/".$detail->image_name?>" alt="" width="379px" width="225px">
        <h5>Close Bid : <?php echo date('Y-M-d H:i:s',strtotime($detail->close_bid)) ?></h5>
        <p style="color:#2997AB;"><?php echo $winnername.' - Rp '.$dealamount;  ?></p>
        <p style="text-align:right; margin-right: 16px">
        <?php echo form_open('auction/bid');
          echo form_input($viewmodel['user_id']);  
          echo form_input($viewmodel['close_bid']);  
          echo form_input($viewmodel['open_bid']);  
          echo form_input($viewmodel['auction_id']);  
          echo form_input($viewmodel['amount']);  
        ?>
        <button class="button" type="submit">Bid Now!</button></p>
        <?php echo form_close(); ?>
        <p>
        Fish Name : <?php echo $detail->fish_name; ?>
        <br/>Price : Rp <?php echo $detail->amount; ?><br/>
        Qty : <?php echo $detail->qty; ?> gr</p>
        <p><?php echo $detail->description; ?></p>
      </div>
    </div>
    <!-- END tab panes -->
    <br clear="all">
    <!-- close navigator -->
  </div>
  <script type="text/javascript">
    $('.numeric').blur(function(){
      var input = parseFloat($(this).val()).toFixed(1);
      $(this).val(input);
    });
  </script>