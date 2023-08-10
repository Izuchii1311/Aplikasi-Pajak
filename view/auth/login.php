<!-- Header Layouts -->
<?php

// Session Login
session_start();
if (isset($_SESSION['ID'])) {
    header("Location:../dashboard/index.php");
    exit();
}

# Memanggil Koneksi ke Database
require '../config.php';

// Condition Login
if (isset($_POST['login'])) {
    $loginError = "";
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);

    if (!empty($email) && !empty($password)) {
        $query = "SELECT * FROM user WHERE email = '$email'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            // Verify the password using password_verify
            if (password_verify($password, $row['password'])) {
                $_SESSION['ID'] = $row['id'];
                $_SESSION['ROLE'] = $row['role'];
                $_SESSION['NAME'] = $row['name'];
                $_SESSION['EMAIL'] = $row['email'];

                if ($_SESSION['ROLE'] == 'admin') {
                    echo " <script> alert('Berhasil Login Sebagai Admin!'); document.location.href = '../dashboard/index.php'; </script> ";
                    // header("Location: ../dashboard/index.php");
                } else {
                    echo " <script> alert('Berhasil Login!'); document.location.href = '../home.php'; </script>";
                    // header("Location: ../home.php");
                }
                exit();
            } else {
                $loginError = "Password salah.";
            }
        } else {
            $loginError = "Email tidak ditemukan.";
        }
    } else {
        $loginError = "Isi semua kolom.";
    }
}


$title = "Login Akun";
include '../layouts/header.php';
?>

<!-- Content -->
<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
            <!-- Register -->
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
                    <h4 class="mb-2">Login, yuk! 👋</h4>
                    <p class="mb-4">Di Aplikasi Perhitungan Pajak Bumi dan Bangunan Pedesaan dan Perkotaan (PBB-P2)</p>

                    <form class="mb-3" action="" method="POST">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email anda..." autofocus required />
                        </div>
                        <div class="mb-3 form-password-toggle">
                            <label class="form-label" for="password">Password</label>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password" class="form-control" name="password" placeholder="Masukkan Password anda..." aria-describedby="password" required />
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary d-grid w-100" type="submit" name="login">Login</button>
                        </div>
                    </form>

                    <p class="text-center">
                        <span>Belum punya akun?</span>
                        <a href="register.php">
                            <span>Registrasi disini.</span>
                        </a>
                    </p>
                    <p class="text-center">
                        <a href="../home.php">
                            <span>Kembali ke Home.</span>
                        </a>
                    </p>
                </div>
            </div>
            <!-- /Register -->
        </div>
    </div>
</div>
<!-- End Content -->

<!-- Footer Layouts -->
<?php
include '../layouts/footer.php';
?>