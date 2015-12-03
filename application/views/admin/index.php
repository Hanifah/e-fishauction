<style>
  ul.tsc_pagination li a
  {
  border:solid 1px;
  border-radius:3px;
  -moz-border-radius:3px;
  -webkit-border-radius:3px;
  padding:6px 9px 6px 9px;
  }
  ul.tsc_pagination li
  {
  padding-bottom:1px;
  }
  ul.tsc_pagination li a:hover,
  ul.tsc_pagination li a.current
  {
  color:#FFFFFF;
  box-shadow:0px 1px #EDEDED;
  -moz-box-shadow:0px 1px #EDEDED;
  -webkit-box-shadow:0px 1px #EDEDED;
  }
  ul.tsc_pagination
  {
  margin:4px 0;
  padding:0px;
  height:100%;
  overflow:hidden;
  font:12px 'Tahoma';
  list-style-type:none;
  }
  ul.tsc_pagination li
  {
  float:left;
  margin:0px;
  padding:0px;
  margin-left:5px;
  margin-top: 10px;
  }
  ul.tsc_pagination li a
  {
  color:black;
  display:block;
  text-decoration:none;
  padding:7px 10px 7px 10px;
  }
  ul.tsc_pagination li a img
  {
  border:none;
  }
  ul.tsc_pagination li a
  {
  color:#0A7EC5;
  border-color:#8DC5E6;
  background:#F8FCFF;
  display:inline;
  }
  ul.tsc_pagination li a:hover,
  ul.tsc_pagination li a.current
  {
  text-shadow:0px 1px #388DBE;
  border-color:#3390CA;
  background:#58B0E7;
  background:-moz-linear-gradient(top, #B4F6FF 1px, #63D0FE 1px, #58B0E7);
  background:-webkit-gradient(linear, 0 0, 0 100%, color-stop(0.02, #B4F6FF), color-stop(0.02, #63D0FE), color-stop(1, #58B0E7));
  }
</style>
<table border="0">
  <th>Fish Name</th>
  <th>Qty</th>
  <th>Price</th>
  <!-- <th>Winner</th> -->
  <th>Deal</th>
  <th>Open Bid</th>
  <th>Close Bid</th>
  <th>Status</th>
  <th>Action</th>

  <?php foreach ($auctions as $key) { ?>
    <tr>
        <td><?php echo $key->fish_name; ?></td>
        <td><?php echo $key->qty; ?></td>
        <td><?php echo $key->amount; ?></td>
        <!-- <td><?php echo $key->username; ?></td> -->
        <td><?php echo $key->deal_amount; ?></td>
        <td><?php echo $key->open_bid; ?></td>
        <td><?php echo $key->close_bid; ?></td>
        <td><?php echo $key->status; ?></td>
        <td>
          <a href="<?php echo base_url().'index.php/admin/edit_auction/'.$key->auction_id;?>">Edit</a> | 
          <input type="hidden" value="<?php echo $key->auction_id ?>">
          <a href="#" onclick="confirm_delete(this)">Delete</a>
        </td>
      </tr>
  <?php } ?>
    </table>

    <div id="pagination">
    <ul class="tsc_pagination">

    <!-- Show pagination links -->
    <?php foreach ($links as $link) {
    echo "<li>". $link."</li>";
    } ?>
  </div>
  <script type="text/javascript">
  function confirm_delete(val){
    var auctionId = $(val).prev().val();
    var base_url = '<?php echo base_url(); ?>';
    if (confirm('Are you sure to delete this auction?')) {
        window.location.href = base_url+'index.php/admin/delete_auction/'+auctionId;
    }
  }
  </script>