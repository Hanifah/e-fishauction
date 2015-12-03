<div class="heading_bg">
  <h2>Live Auction</h2>
</div>
<p><strong>Open Bid</strong><br>
<ul class="ca-menu" style="margin: 40px 0">
<?php
  $id = 0;
  foreach ($auction as $key ) { 
    if ($id % 4 == 0) { ?>
      </ul>
      <ul class="ca-menu" style="margin: 40px 0; padding">
    <?php }
    ?>
      <li style="margin-top:15px">
        <a href="#"> <span class="ca-icon"><img src="<?php echo base_url()."uploads/".$key->image_name?>" width="230px" height="200px"></span>
          <div class="ca-content">
            <input type="hidden" name="auction_id" value="<?php echo $key->auction_id?>">
            <h2 class="ca-main" style="margin:0"><button class="button-bid" type="button" onclick="bidNow(this);">Bid Now</button></h2>
            <h3 class="ca-sub">Rp <?php echo $key->amount; ?></h3>
          </div>
        </a>
      </li>
  <?php
    $id++;
   }
?>
  </ul>
<div style="clear:both; height: 40px"></div>
<script>
  function bidNow(val)
  {
    var base_url = '<?php echo base_url(); ?>';
    var login = <?php echo $login ?>;
    if (login != 1) {
      alert('Please Log In to Your Account');
    }
    else{
      window.location.href = base_url + 'index.php/auction/detail/' + $(val).parent().prev().val();
    }
  }
</script>