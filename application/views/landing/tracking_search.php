<table border="0">
  <th>AWB No.</th>
  <th>Origin</th>
  <th>Destination</th>
  <th>Date of Shipment</th>
  <th>Status</th>
  <tr>
    <td><?php echo $search->awb_number; ?></td>
    <td><?php echo $search->origin; ?></td>
    <td><?php echo $search->destination; ?></td>
    <td><?php echo date('Y M d',strtotime($search->date_of_shipment)); ?></td>
    <td><?php echo $search->status; ?></td>
  </tr>
</table>