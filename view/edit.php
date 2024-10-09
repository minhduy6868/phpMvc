<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    
</head>
<body>
    <div class="container">
    <?php 
    if(isset($error)) {
        ?>
        <div class="alert alert-danger" role="alert">
  Some wrong with your request!
</div>
        <?php
    }
    ?>
    <form method="POST">
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input name="email" value="<?=$email?>" type="text" class="form-control" id="inputEmail3" placeholder="Email">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
      <input name="name" value="<?=$name?>" type="text" class="form-control" id="inputPassword3" placeholder="Name">
    </div>

    <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">NumberPhone</label>
    <div class="col-sm-10">
      <input name="phone" value="<?=$phone?>" type="text" class="form-control" id="inputPassword3" placeholder="099-999-999">
    </div>
    
  </div>
  <div class="form-group row">
    <div class="col-sm-10">
      <button name="submit" value="Add"type="submit" class="btn btn-primary">Edit</button>
    </div>
  </div>
</form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>