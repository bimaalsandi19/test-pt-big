<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
    <title><?= $title; ?></title>
    <style>
        .card {
            margin-top: 30%;
            box-shadow: 4px 4px 4px silver;
            border-radius: 30px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card p-2">
                    <?php if (isset($validation)) : ?>
                        <div class="alert alert-danger alert-dismissible fade show"><?= $validation->listErrors() ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>
                    <h2 align="center" class="mb-4">Register Form</h2>
                    <form action="http://localhost:8080/api/register" method="post">
                        <label for="">Email</label>
                        <input type="email" name="email" class="form-control mb-2">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control mb-2">
                        <label for="">Konfirmasi Password</label>
                        <input type="password" name="confpassword" class="form-control mb-2">
                        <label for=""></label>
                        <input type="submit" value="Login" class="btn btn-primary">
                    </form>
                    <p>Belum punya akun ? <a href="/register">Daftar disini</a></p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>