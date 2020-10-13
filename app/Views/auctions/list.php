<?php   echo view('menu'); ?>
<div class="container mt-4">
    <div class="d-flex justify-content-end">
        <a href="<?php echo site_url('auctions/form') ?>" class="btn btn-success mb-2">Add Autenion</a>
	</div>
   
    <?php
     if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
      }
     ?>
    
  <div class="mt-3">
     <table class="table table-bordered" id="auctions-list">
       <thead>
          <tr>
             <th>AuctionId</th>
             <th>Name</th>
             <th>Location</th>
             <th>Creation Date</th>
             <th>Action</th>
          </tr>
       </thead>
       <tbody>
          <?php if($auctions): ?>
          <?php foreach($auctions as $auction): ?>
          <tr>
             <td><?php echo $auction['id']; ?></td>
             <td><?php echo $auction['name']; ?></td>
             <td><?php echo $auction['location']; ?></td>
             <td><?php echo $auction['creation_date']; ?></td>
             <td>
              <a href="<?php echo base_url('auctions/edit/'.$auction['id']);?>" class="btn btn-primary btn-sm">Edit</a>
              <a href="<?php echo base_url('auctions/delete/'.$auction['id']);?>" class="btn btn-danger btn-sm">Delete</a>
              </td>
          </tr>
         <?php endforeach; ?>
         <?php endif; ?>
       </tbody>
     </table>
  </div>
</div>
 
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
      $('#auctions-list').DataTable();
  } );
</script>
</body>
</html>