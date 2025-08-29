<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .login-card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        input::placeholder {
            font-size: 14px;
        }
    </style>
</head>

<body>
    <div class="container vh-100 d-flex flex-column justify-content-start mt-4 justify-content-lg-center mt-lg-0 align-items-center">

        <div class="login-card p-5 text-center" style="max-width: 450px; width: 100%;">
            <a href="#">
                <img src="<?= base_url('assets/img/1.png') ?>" alt="Logo Ayyuwa" width="100" class="mb-3">
            </a>
            <h5 class="fw-bold mb-4">LOGIN ABSENSI</h5>

            <!-- Flash message -->
            <?php if ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= $this->session->flashdata('error'); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <form action="<?= site_url('auth/prosesLogin'); ?>" method="post">
                <div class="mb-3 text-start">
                    <label for="username" class="form-label text-secondary fw-bold" style="font-size: 0.9rem;">
                        Username <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Masukan username" required>
                </div>
                <div class="mb-3 text-start">
                    <label for="password" class="form-label text-secondary fw-bold" style="font-size: 0.9rem;">
                        Password <span class="text-danger">*</span>
                    </label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukan password" required>
                </div>
                <div class="d-grid mt-4">
                    <button type="submit" class="btn btn-primary">Log In</button>
                </div>
            </form>
        </div>

        <div class="mt-3">
            <p class="text-secondary text-center mb-0" style="font-size: 0.8rem;">
                © TOKO KURMA AYYUWA 2025
            </p>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>

</html>