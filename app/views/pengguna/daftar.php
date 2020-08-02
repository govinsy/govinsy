<head>
    <meta charset="utf-8">
    <title>Signin Template · Bootstrap</title>
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .btbody {
            height: 100%;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
        }

        .form-signin {
            width: 100%;
            max-width: 330px;
            padding: 15px;
            margin: auto;
        }

        .form-signin .checkbox {
            font-weight: 400;
        }

        .form-signin .form-control {
            position: relative;
            box-sizing: border-box;
            height: auto;
            padding: 10px;
            font-size: 16px;
        }

        .form-signin .form-control:focus {
            z-index: 2;
        }

        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    </style>
</head>

<div class="btbody text-center">
    <form class="form-signin" method="post" action="<?= BASEURL; ?>/pengguna/daftar">
        <img class="mb-4" src="<?= BASEURL; ?>/img/icon.svg" alt="" width="72" height="72">
        <?php Flasher::flash(); ?>
        <label for="inputNama" class="sr-only">Nama</label>
        <input name="nama" type="input" id="inputNama" class="form-control mb-2" placeholder="Nama" required autofocus>
        <label for="inputEmail" class="sr-only">Email</label>
        <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email" required autofocus>
        <label for="inputPassword1" class="sr-only">Password</label>
        <input name="password1" type="password" id="inputPassword1" class="form-control" placeholder="Password" required>
        <label for="inputPassword2" class="sr-only">Confirm Password</label>
        <input name="password2" type="password" id="inputPassword2" class="form-control" placeholder="Confirm Password" required>
        <button name="daftar" class="btn btn-lg btn-primary btn-block mt-2" type="submit">Daftar</button>
        <p class="mt-5 mb-3 text-muted">Govinsy &copy; 2020</p>
    </form>
</div>
