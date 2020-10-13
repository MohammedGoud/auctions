<?php   echo view('menu'); ?>
<div class="container mt-4">
    <div class="d-flex justify-content-end">
        <a href="<?php echo site_url('buyers/form') ?>" class="btn btn-success mb-2">Add Buyer</a>
	</div>
   
    <?php
     if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
      }
     ?>
    
  <div class="mt-3">
     <table class="table table-bordered" id="buyers-list">
       <thead>
          <tr>
             <th>buyerId</th>
             <th>Name</th>
             <th>Auction</th>
             <th>Action</th>
          </tr>
       </thead>
       <tbody>
          <?php if($buyers): ?>
          <?php foreach($buyers as $buyer): ?>
          <tr>
             <td><?php echo $buyer['id']; ?></td>
             <td><?php echo $buyer['username']; ?></td>
             <td><?php echo $buyer['auction_name']; ?></td>
             <td>
              <a href="<?php echo base_url('buyers/edit/'.$buyer['id']);?>" class="btn btn-primary btn-sm">Edit</a>
              <a href="<?php echo base_url('buyers/delete/'.$buyer['id']);?>" class="btn btn-danger btn-sm">Delete</a>
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
      $('#buyers-list').DataTable();
  } );
</script>
</body>
</html>