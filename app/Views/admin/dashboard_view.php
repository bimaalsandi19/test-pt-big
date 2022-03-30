<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
    <title>Halaman Admin</title>
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <p><b>Selamat Datang <?= $_SESSION['email']; ?></b></p>
                <a href="/dashboard/menu">[+]Create New Menu</a><br>
                <a href="/dashboard/submenu">[+]Create New Sub Menu</a>
                <?php foreach ($submenu as $row) : ?>
                    <ul class="nav flex-column">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?= $row['nama_menu']; ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#"><?= $row['nama_submenu']; ?></a></li>
                            </ul>
                        </li>

                    </ul>
                <?php endforeach ?>
                <a href="/login/logout">Logout</a>
                <!-- <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Active</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled">Disabled</a>
                    </li>
                </ul> -->
            </div>
        </div>
    </div>


    <script src="/assets/bootstrap/js/bootstrap.bundle.js"></script>
</body>

</html>