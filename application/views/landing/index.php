  <!-- tab panes -->
  <div id="prod_wrapper">
    <div id="panes">
    <?php foreach ($auction as $key ) {
      ?>
      <div>
      <img src="<?php echo base_url()."uploads/".$key->image_name?>" alt="" width="379px" height="225px">
        <h5>Sold</h5>
        <p style="color:#2997AB;">Winner <br/> <?php echo $key->username.' - Rp '.$key->deal_amount;  ?></p>
        <p>
        Fish Name : <?php echo $key->fish_name; ?>
        <br/>Price : Rp <?php echo $key->amount; ?>
        <br/>Qty : <?php echo $key->qty; ?> gr</p>
        <p><?php echo $key->description; ?></p>
      </div>
      <?php } ?>
    </div>
    <!-- END tab panes -->
    <br clear="all">
    <!-- navigator -->
    <div id="prod_nav">
      <ul>
      <?php
      $id = 1;
        foreach ($auction as $key ) { 
          if ($id % 6 == 0) { ?>
          </ul><ul>
          <?php } 
          $image_name_split = explode(".",$key->image_name);
          ?>
        <li><a href="#<?php echo $image_name_split[0]; ?>"><img src="<?php echo base_url()."uploads/".$key->image_name?>" alt="" height="75px" width="75px"><strong>Class aptent</strong>Rp <?php echo $key->amount ?></a></li>
        <?php $id++; } ?>
      </ul>
    </div>
    <!-- close navigator -->
  </div>
  <!-- END prod wrapper -->
  <div style="clear:both"></div>
  <h1 style="padding: 20px 0">This is what we do</h1>
  <blockquote>Nulla hendrerit commodo tortor, vitae elementum magna convallis nec. Nam tempor nibh a purus aliquam et adipiscing elit gravida. Ut vitae nunc a libero volutpat gravida. Nullam egestas mi sit amet dui scelerisque eu laoreet nisi ultrices. Ut vitae nunc a libero volutpat gravida. Nam tempor nibh a purus aliquam. </blockquote>
  <p style="text-align:right; margin-right: 16px; margin-bottom: 15px"><a href="<?php echo base_url(); ?>index.php/landing/live_auction" class="button" style="font-size: 18px">More Auction</a></p>
  <!-- First Column -->
<ul class="ca-menu" style="margin: 40px 0">
<?php
  foreach ($auctiontopfour as $key ) { ?>
      <li style="margin-top:15px">
        <a href="#"> <span class="ca-icon"><img src="<?php echo base_url()."uploads/".$key->image_name;?>" width="230px" height="200px"></span>
          <div class="ca-content">
            <input type="hidden" name="auction_id" value="<?php echo $key->auction_id;?>">
            <h2 class="ca-main" style="margin:0"><button class="button-bid" type="button" onclick="bidNow(this);">Bid Now</button></h2>
            <h3 class="ca-sub">Rp <?php echo $key->amount; ?></h3>
          </div>
        </a>
      </li>
  <?php
   }
?>
  </ul>
<div style="clear:both; height: 40px"></div>
<script>
  function bidNow(val)
  {
    var base_url = '<?php echo base_url(); ?>';
    var login = <?php echo $login; ?>;
    if (login != 1) {
      alert('Please Log In to Your Account');
    }
    else{
      window.location.href = base_url + 'index.php/auction/detail/' + $(val).parent().prev().val();
    }
  }
</script>