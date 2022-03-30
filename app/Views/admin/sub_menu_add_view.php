<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
    <title>Tambah Sub Menu</title>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h2>Tambah Menu</h2>
                <form action="/dashboard/add_submenu" method="post">
                    <label for="">Nama Menu</label>
                    <select name="nama_menu" id="" class="form-control mb-2">
                        <option selected>PIlih Menu</option>
                        <?php foreach ($menu as $row) : ?>
                            <option value="<?= $row['nama_menu']; ?>"><?= $row['nama_menu']; ?></option>
                        <?php endforeach ?>
                    </select>
                    <label for="">Nama Sub Menu</label>
                    <input type="text" name="nama_submenu" class="form-control mb-2">
                    <label for=""></label>
                    <input type="submit" value="Simpan" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>

</body>

</html>