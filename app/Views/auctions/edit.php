<!DOCTYPE html>
<html>

<head>
  <title>Man</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <style>
    .container {
      max-width: 500px;
    }

    .error {
      display: block;
      padding-top: 5px;
      font-size: 14px;
      color: red;
    }
  </style>
</head>

<body>
  <div class="container mt-5">
    <form method="post" id="update_user" name="update_user" 
    action="<?= site_url('/auctions/edit') ?>">
      <input type="hidden" name="id" id="id" value="<?php echo $user_obj['id']; ?>">

      <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="<?php echo $user_obj['username']; ?>">
      </div>

      <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" class="form-control" value="<?php echo $user_obj['password']; ?>">
      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-danger btn-block">Save Data</button>
      </div>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>
  <script>
    if ($("#update_user").length > 0) {
      $("#update_user").validate({
        rules: {
          name: {
            required: true,
          },
          password: {
            required: true,
            maxlength: 60
          },
        },
        messages: {
          name: {
            required: "Name is required.",
          },
          password: {
            required: "password is required.",
           
          },
        },
      })
    }
  </script>
</body>

</html>