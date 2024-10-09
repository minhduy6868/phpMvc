<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="m-4">
    <div class="m-1">
    <button class="btn btn-warning btn-sm" onclick="location.href='index.php?controller=student&action=add'">Add</button>
    </div>
    <div class="m-1">
    <form method="GET" action="index.php">
        <input type="hidden" name="controller" value="student">
        <input value="<?=$search?>" type="text" name="search" placeholder="Search by Name or Email" class="form-control d-inline w-50" />
        <button type="submit" class="btn btn-primary btn-sm">Search</button>
    </form>
</div>
<table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Name</th>
      <th scope="col">EMail</th>
      <th scope="col">NumberPhone</th>
      <th scope="col">Action</th> 
    </tr>
  </thead>
  <tbody>
  <?php 
    if (isset($data) && !empty($data)) {
        foreach ($data as $student) {
    ?>
    <tr>
        <th scope="row"><?=$student['id']?></th>
        <td><?=$student['name']?></td>
        <td><?=$student['email']?></td>
        <td><?=$student['phone']?></td>
        <td>
            <button class="btn btn-warning btn-sm" onclick="location.href='index.php?controller=student&action=edit&id=<?=$student['id']?>'">Edit</button>
            <button class="btn btn-danger btn-sm" onclick="location.href='index.php?controller=student&action=delete&id=<?=$student['id']?>'">Delete</button>
        </td>
    </tr>
    <?php 
        }
    } else {
        echo "<tr><td colspan='5'>No data available</td></tr>";
    }
    ?>

    
  </tbody>
</table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>