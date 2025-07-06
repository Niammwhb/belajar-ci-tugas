
<?= $this->extend('layout_clear') ?>
<?= $this->section('content') ?>
<?php
// Mendefinisikan atribut untuk input username
$username = [
    'name' => 'username',
    'id' => 'username',
    'class' => 'form-control form-control-glass', // Kelas kustom untuk styling
    'placeholder' => 'Username',                 // Teks placeholder
    'required' => true                           // Atribut HTML5 required
];

// Mendefinisikan atribut untuk input password
$password = [
    'name' => 'password',
    'id' => 'password',
    'class' => 'form-control form-control-glass', // Kelas kustom untuk styling
    'placeholder' => 'Password',                 // Teks placeholder
    'required' => true                           // Atribut HTML5 required
];
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Login - Abadi Alumunium</title>
    <meta content="Halaman login untuk Abadi Alumunium" name="description">
    <meta content="login, abadi alumunium, masuk" name="keywords">

    <link href="<?= base_url('NiceAdmin/assets/img/favicon.png') ?>" rel="icon">
    <link href="<?= base_url('NiceAdmin/assets/img/apple-touch-icon.png') ?>" rel="apple-touch-icon">

    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <link href="<?= base_url('NiceAdmin/assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('NiceAdmin/assets/vendor/bootstrap-icons/bootstrap-icons.css') ?>" rel="stylesheet">
    
    <style>
        /* Gaya kustom untuk halaman login */
        body {
            background-color: #08101A; 
            background-image:
                /* Sorotan dinding dibuat sangat halus atau dihilangkan agar fokus pada cahaya di form */
                radial-gradient(ellipse 70% 50% at 50% calc(50% - 260px), 
                    rgba(255, 240, 190, 0.1) 0%, /* Sangat transparan */
                    rgba(255, 240, 190, 0.05) 25%,
                    transparent 60%
                ),
                /* Pola bata horizontal */
                repeating-linear-gradient(0deg, transparent, transparent 49px, rgba(255,255,255,0.02) 49px, rgba(255,255,255,0.02) 50px),
                /* Pola bata vertikal */
                repeating-linear-gradient(90deg, transparent, transparent 99px, rgba(255,255,255,0.02) 99px, rgba(255,255,255,0.02) 100px),
                repeating-linear-gradient(90deg, transparent, transparent 99px, rgba(255,255,255,0.02) 99px, rgba(255,255,255,0.02) 100px);
            background-size: 100% 100%, 100% 50px, 100px 100%, 100px 100%; 
            background-position: center top, 0 0, 0 0, 50px 25px; 
            background-repeat: no-repeat, repeat, repeat, repeat; 
            
            font-family: 'Poppins', sans-serif;
            display: flex;
            flex-direction: column; 
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            color: #fff; 
            overflow: hidden; 
            padding-top: 20px; 
            padding-bottom: 20px;
        }

        .lamp-fixture {
            width: 260px; 
            height: 18px; 
            background: #0D121A; /* Warna solid sangat gelap untuk fixture */
            border-radius: 2px; 
            position: relative;
            /* Bayangan fisik yang sangat halus dan gelap di bawah lampu */
            box-shadow: 0 2px 4px rgba(0,0,0,0.6); 
            z-index: 10; 
            margin-bottom: -10px; 
        }
        .lamp-fixture::before { /* Detail sumber cahaya di dalam fixture lampu */
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 60%; /* Lebar sumber cahaya internal */
            height: 4px; /* Tinggi sumber cahaya internal */
            background: rgba(255, 245, 200, 0.7); /* Warna cahaya internal yang lebih lembut */
            border-radius: 2px;
            box-shadow: 0 0 6px 1px rgba(255, 245, 200, 0.6); /* Efek glow pada sumber cahaya */
            filter: blur(0.5px); /* Blur yang sangat halus */
        }


        .glass-card {
            background-color: rgba(35, 45, 60, 0.25); /* Warna dasar kartu kaca */
            /* Efek cahaya utama pada kartu, seolah disorot dari atas */
            background-image: radial-gradient(ellipse at 50% -10%, /* Pusat cahaya di atas kartu, sedikit masuk */
                rgba(255, 245, 220, 0.6) 0%, /* Cahaya paling terang di atas */
                rgba(255, 245, 220, 0.3) 35%, /* Menyebar ke bawah */
                transparent 75% /* Memudar di dalam kartu */
            );
            background-repeat: no-repeat; /* Pastikan gradien tidak berulang */
            
            border-top: 1px solid rgba(255, 255, 255, 0.2); /* Border atas lebih terang menangkap cahaya */
            backdrop-filter: blur(12px) saturate(110%); 
            -webkit-backdrop-filter: blur(12px) saturate(110%);
            border-radius: 16px; 
            padding: 30px 38px; 
            border-left: 1px solid rgba(255, 255, 255, 0.07); 
            border-right: 1px solid rgba(255, 255, 255, 0.07); 
            border-bottom: 1px solid rgba(255, 255, 255, 0.07); 
            box-shadow: 0 10px 35px 0 rgba(0, 0, 0, 0.45); 
            width: 100%; 
            position: relative; 
            overflow: hidden; 
            z-index: 6; 
        }

        .glass-card .card-title {
            color: #fff;
            font-weight: 600; 
            font-size: 2.15rem; 
            margin-top: 5px; 
            margin-bottom: 30px; 
            text-align: center;
        }
        
        .input-wrapper {
            position: relative;
            width: 100%;
            margin-bottom: 1.3rem; 
        }

        .input-icon {
            position: absolute;
            right: 18px; 
            top: 50%;
            transform: translateY(-50%);
            color: rgba(255, 255, 255, 0.55); 
            font-size: 1.05rem; 
            pointer-events: none; 
        }

        .form-control-glass {
            background: rgba(255, 255, 255, 0.06) !important; 
            border: 1px solid rgba(255, 255, 255, 0.1) !important; 
            border-radius: 10px !important; 
            color: #fff !important;
            padding-left: 18px !important; 
            padding-right: 48px !important; 
            height: 50px; 
            font-size: 0.9rem; 
        }

        .form-control-glass::placeholder {
            color: rgba(255, 255, 255, 0.65) !important;
            opacity: 1; 
        }
        
        .form-control-glass:focus {
            background: rgba(255, 255, 255, 0.09) !important; 
            border-color: rgba(255, 255, 255, 0.2) !important; 
            box-shadow: 0 0 0 0.1rem rgba(255, 255, 255, 0.07) !important; 
        }

        .btn-login-custom {
            background-color: #fff !important;
            color: #0a141f !important; 
            border-radius: 25px !important; 
            padding: 12px 0 !important; 
            font-weight: 600 !important;
            font-size: 1rem; 
            border: none !important;
            transition: background-color 0.2s ease, transform 0.2s ease, box-shadow 0.2s ease;
            margin-top: 15px; 
            box-shadow: 0 2px 7px rgba(0,0,0,0.15); 
        }
        .btn-login-custom:hover {
            background-color: #f5f5f5 !important;
            transform: translateY(-2px); 
            box-shadow: 0 4px 10px rgba(0,0,0,0.2);
        }
        .btn-login-custom:active {
            transform: translateY(0px); 
            box-shadow: 0 2px 6px rgba(0,0,0,0.15);
        }

        .form-check-label {
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.84rem; 
        }
        .form-check-input {
            border-radius: 3px; 
            border: 1px solid rgba(255,255,255,0.3);
            background-color: rgba(255,255,255,0.1);
            margin-top: 0.18rem; 
            width: 0.9em; 
            height: 0.9em; 
            margin-right: 6px; 
        }
        .form-check-input:checked {
            background-color: #fff;
            border-color: #fff;
        }
        .form-check-input:focus {
            box-shadow: 0 0 0 0.15rem rgba(255, 255, 255, 0.1);
        }

        .options-row {
            margin-bottom: 1.5rem; 
            padding-left: 2px; 
            padding-right: 2px;
        }

        .link-light-sm { 
            color: rgba(255, 255, 255, 0.8) !important;
            text-decoration: none;
            font-size: 0.84rem; 
        }
        .link-light-sm:hover {
            color: #fff !important;
            text-decoration: underline;
        }
        
        .register-link-container {
            margin-top: 20px; 
        }
        .register-link-container p, .register-link-container a {
             color: rgba(255, 255, 255, 0.8) !important;
             font-size: 0.9rem; 
        }
        .register-link-container a {
            font-weight: 600; 
            text-decoration: none;
        }
         .register-link-container a:hover {
            color: #fff !important;
            text-decoration: underline;
        }

        .alert-danger { 
            background-color: rgba(220, 53, 69, 0.1);
            color: #f5c6cb; 
            border: 1px solid rgba(220, 53, 69, 0.2);
            border-radius: 8px; 
            padding: 8px 12px;
            font-size: 0.82rem;
        }
        .alert-danger p {
            margin-bottom: 0;
        }
        .invalid-feedback { 
            color: #f8d7da;
            font-size: 0.78rem; 
            padding-left: 4px;
        }
        .login-form-wrapper { 
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
            max-width: 380px; 
        }


    </style>
</head>

<body>
    <main>
        <div class="container"> 
            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                
                <div class="login-form-wrapper col-11 col-sm-9 col-md-7 col-lg-5 col-xl-4"> 
                    <div class="lamp-fixture"></div> 
                    <div class="card glass-card mb-3">
                        <div class="card-body">
                            <div class="pt-2 pb-0"> 
                                <h5 class="card-title">Login</h5>
                            </div>

                            <?php if (session()->getFlashData('failed')) : ?>
                                <div class="col-12 alert alert-danger mt-0 mb-2" role="alert"> 
                                    <p class="text-center small">
                                        <?= session()->getFlashData('failed') ?>
                                    </p>
                                </div>
                            <?php endif; ?>

                            <?= form_open('login', ['class' => 'row g-2 needs-validation', 'novalidate' => true]) ?>

                            <div class="col-12"> 
                                <div class="input-wrapper">
                                    <?= form_input($username) ?>
                                    <i class="bi bi-person input-icon"></i>
                                    <div class="invalid-feedback">Silakan masukkan username Anda.</div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="input-wrapper">
                                    <?= form_password($password) ?>
                                    <i class="bi bi-lock-fill input-icon"></i>
                                    <div class="invalid-feedback">Silakan masukkan password Anda!</div>
                                </div>
                            </div>

                            <div class="col-12 options-row">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                                        <label class="form-check-label" for="rememberMe">
                                            Remember me
                                        </label>
                                    </div>
                                    <a href="#" class="link-light-sm">Forgot password?</a>
                                </div>
                            </div>

                            <div class="col-12"> 
                                <?= form_submit('submit', 'Login', ['class' => 'btn btn-login-custom w-100']) ?>
                            </div>

                            <div class="col-12 text-center register-link-container">
                                <p class="small mb-0">Don't have an account? <a href="<?= site_url('register') ?>" >Register</a></p>
                            </div>
                            <?= form_close() ?>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
    
    <script src="<?= base_url('NiceAdmin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    
    <script>
        (function() {
            'use strict';
            var forms = document.querySelectorAll('.needs-validation');
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
        })();
    </script>

</body>
</html>
<?= $this->endSection() ?>
