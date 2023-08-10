<!-- Header Layouts -->
<?php

// Include database connnection file
include_once('../config.php');

session_start();
if (isset($_SESSION['ID'])) {
    header("Location:../auth/login.php");
    exit();
}

if (isset($_POST['register'])) {
    $email = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password'];
    $name = $conn->real_escape_string($_POST['name']);

    // Validasi input
    $errorMsg = '';
    if (empty($email) || empty($password) || empty($name)) {
        $errorMsg = "All fields are required.";
    }

    if (empty($errorMsg)) {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $query = "INSERT INTO user (name, email, password, role) VALUES ('$name', '$email', '$hashedPassword', 'user')";
        $result = $conn->query($query);

        if ($result === true) {
            echo " <script> alert('Registrasi Akun Baru Berhasil!'); document.location.href = 'login.php'; </script> ";
            die();
        } else {
            $errorMsg = "Registration failed. Please try again.";
        }
    }
}




$title = "Registrasi Akun Baru";
include '../layouts/header.php';
?>

<!-- Content -->
<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
            <!-- Register Card -->
            <div class="card">
                <?php if (isset($errorMsg)) { ?>
                    <div class="alert alert-danger alert-dismissible">
                        <?php echo $errorMsg; ?>
                    </div>
                <?php } ?>
                <div class="card-body">
                    <!-- Logo -->
                    <div class="app-brand justify-content-center">
                        <img src="../../assets/img/logodesa.png" alt="" width="120">
                    </div>
                    <!-- /Logo -->
                    <h4 class="mb-2">Registrasi Akun Baru 🚀</h4>
                    <p class="mb-4">Daftarkan diri kamu ke dalam Aplikasi Perhitungan Pajak Bumi dan Bangunan Pedesaan dan Perkotaan (PBB-P2)!</p>

                    <form class="mb-3" action="" method="post">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama Anda..." autofocus />
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email Anda..." />
                        </div>
                        <div class="mb-3 form-password-toggle">
                            <label class="form-label" for="password">Password</label>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password" class="form-control" name="password" placeholder="Masukkan Password Anda..." />
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            </div>
                        </div>
                        <button type="submit" name="register" class="btn btn-primary d-grid w-100">Registrasi Akun</button>
                    </form>

                    <p class="text-center">
                        <span>Sudah punya akun?</span>
                        <a href="login.php">
                            <span>Login</span>
                        </a>
                    </p>
                </div>
            </div>
            <!-- Register Card -->
        </div>
    </div>
</div>
<!-- End Content -->

<!-- Footer Layouts -->
<?php
include '../layouts/footer.php';
?>