<!DOCTYPE html>
<html lang="en">

<head>
    <?php include './includes/head.php'; ?>
    <style>
    form {
        margin: 6rem 24rem !important;
    }

    form .row {
        margin: auto 6rem !important;
    }

    @media only screen and (max-width: 768px) {
        form {
            margin: 5rem 1rem !important;
        }

        form .row {
            margin: auto 0rem !important;
        }
    }
    </style>
</head>

<body>
    <div class="container">
        <form action="" class="card center-align" id="login-form">
            <div class="card-content">
                <img src="./images/logo.png" alt="" height="64px">
                <h5 class="center-align">Login to your Account</h5>
                <br>
                <div class="row">
                    <div class="input-field center-align  ">
                        <input id="user-email" type="email" class="validate" placeholder="Email">
                    </div>
                </div>

                <div class="row">
                    <div class="input-field center-align">
                        <input id="user-password" type="password" class="validate" placeholder="Password">
                    </div>
                </div>

                <div>
                    <button class="btn-primary center-align" id="login-btn">Login</button>
                </div>
                <br>
                <div id="status-msg" style="color: #F14C4C;"></div>
                <a href="">Forgot password?</a>
                <p>&nbsp;</p>
            </div>
        </form>
    </div>


    <?php include './includes/scripts.php'; ?>

    <script>
    const loginForm = document.querySelector('#login-form');
    loginForm.addEventListener('submit', (e) => {
        e.preventDefault();

        // get user info
        const email = loginForm['user-email'].value;
        const password = loginForm['user-password'].value;

        const loginBtn = document.querySelector('#login-btn');
        loginBtn.innerText = 'Loggin In...';
        loginBtn.disabled = true;
        loginBtn.style.backgroundColor = '#fff';
        loginBtn.style.color = '#0B72EC';
        loginBtn.style.boxShadow = 'none';

        // log the user in
        auth.signInWithEmailAndPassword(email, password).then((cred) => {
            // console.log(cred.user);
            loginForm.reset();
            window.history.back();
        }).catch((err) => {
            // console.log(err.message)
            document.querySelector('#status-msg').innerHTML = err.message;
            loginBtn.innerText = 'Log In';
            loginBtn.disabled = false;
            loginBtn.style.backgroundColor = '#0B72EC';
            loginBtn.style.color = '#fff';
            loginBtn.style.boxShadow = '0 2px 10px rgb(0 0 0 / 30%)';
        });

    });
    </script>

</body>

</html>