<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giảng Viên Management</title>
</head>
<body>
<div class="m-4">
    <div class="m-1">
        <button class="btn btn-warning btn-sm" onclick="location.href='index.php?controller=giangvien&action=add'">Thên giảng viên</button>
    </div>
    <div class="m-1">
        <form method="GET" action="index.php">
            <input type="hidden" name="controller" value="giangvien">
            <input value="<?= htmlspecialchars($search) ?>" type="text" name="search" placeholder="Search by Name" class="form-control d-inline w-50" />
            <button type="submit" class="btn btn-primary btn-sm">Search</button>
        </form>
    </div>
    <table class="table table-striped table-dark">
        <thead>
            <tr>
                <th scope="col">Mã Giảng Viên</th> 
                <th scope="col">Hình ảnh</th> 
                <th scope="col">Họ Tên</th> 
                <th scope="col">Tổng Số Lớp</th>
                <th scope="col">Quản lí</th> 
            </tr>
        </thead>
        <tbody>
            <?php 
            if (isset($data) && !empty($data)) {
                foreach ($data as $giangvien) {
            ?>
            <tr>
                <th scope="row"><?= htmlspecialchars($giangvien['magv']) ?></th>
                <td>
                    <img src="<?= htmlspecialchars($giangvien['hinhanh']) ?>" alt="Giảng Viên Image" style="width: 50px; height: 50px; object-fit: cover;" />
                </td>
                <td><?= htmlspecialchars($giangvien['hoten']) ?></td>
                <td><?= htmlspecialchars($giangvien['tongsolop']) ?></td>
                <td>
                    <button class="btn btn-warning btn-sm" onclick="location.href='index.php?controller=giangvien&action=edit&magv=<?= htmlspecialchars($giangvien['magv']) ?>'">Edit</button>
                    <button class="btn btn-danger btn-sm" 
                            onclick="if(confirm('Bạn có chắc chắn muốn xóa không?')) { location.href='index.php?controller=giangvien&action=delete&magv=<?= htmlspecialchars($giangvien['magv']) ?>'; }">
                        Delete
                    </button>
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
