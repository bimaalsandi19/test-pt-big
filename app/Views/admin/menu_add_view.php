<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
    <title>Tambah Menu</title>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h2>Tambah Menu</h2>
                <form action="/dashboard/add_menu" method="post">
                    <label for="">Nama Menu</label>
                    <input type="text" name="nama_menu" class="form-control mb-2">
                    <label for=""></label>
                    <input type="submit" value="Simpan" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>

</body>

</html>