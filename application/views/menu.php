<ol id="menu">
    <li><a href="<?php echo base_url();?>index.php/landing/index">Home</a>
    </li>
    <!-- end sub menu -->
    <li><a href="#">Auction</a>
      <!-- sub menu -->
      <ol>
        <li><a href="<?php echo base_url();?>index.php/landing/live_auction">Live Auction</a></li>
        
      </ol>
    </li>
    <!-- end sub menu -->
    <li><a href="<?php echo base_url();?>index.php/landing/tracking">Tracking</a></li>
    <?php if ($login && $isAdmin) { ?>
    <li><a href="#">Admin</a>
      <!-- sub menu -->
      <ol>
        <li><a href="<?php echo base_url();?>index.php/admin/index">List Auction</a></li>
        <li><a href="<?php echo base_url();?>index.php/admin/post_auction">Post Auction</a></li>
        <li><a href="<?php echo base_url();?>index.php/admin/payment">Payment</a></li>
        <li><a href="<?php echo base_url();?>index.php/admin/tracking">Tracking</a></li>
      </ol>
    </li>
    <?php }?>
    <?php if (!$login) { ?>
    <li><a href="<?php echo base_url();?>index.php/auth/login">Login</a></li>
    <?php }else{
      ?>
    <li><a href="<?php echo base_url();?>index.php/auth/logout">Logout</a></li>
    <?php } ?>
</ol>