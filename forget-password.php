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
                <h5 class="center-align">Reset your Password</h5>
                <br>
                <div class="row">
                    <div class="input-field center-align  ">
                        <input id="user-email" type="email" class="validate" placeholder="Email">
                    </div>
                </div>

                <div>
                    <button class="btn-primary center-align" id="submit-btn">Reset Password</button>
                </div>
                <br>
                <div id="status-msg" style="color: #4CAF50;"></div>
                <p>&nbsp;</p>
                <div>
                    <a class="center-align" id="login-btn" style="display: none" href="login.php">Login Now</a>
                </div>
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

        const loginBtn = document.querySelector('#submit-btn');
        loginBtn.innerText = 'Sending...';
        loginBtn.disabled = true;
        loginBtn.style.backgroundColor = '#fff';
        loginBtn.style.color = '#167CBC';
        loginBtn.style.boxShadow = 'none';

        // log the user in
        auth.sendPasswordResetEmail(email).then((cred) => {
            // console.log(cred.user);
            document.querySelector('#status-msg').innerHTML = "Reset link has been sent to your email successfully.";
            loginBtn.innerText = 'Send Link Againg';
            loginBtn.disabled = false;
            loginBtn.style.backgroundColor = '#167CBC';
            loginBtn.style.color = '#fff';
            loginBtn.style.boxShadow = '0 2px 10px rgb(0 0 0 / 30%)';
            document.querySelector('#login-btn').style.display = 'block';

        }).catch((err) => {
            // console.log(err.message)
            document.querySelector('#status-msg').innerHTML = err.message;
            loginBtn.innerText = 'Reset Password';
            loginBtn.disabled = false;
            loginBtn.style.backgroundColor = '#167CBC';
            loginBtn.style.color = '#fff';
            loginBtn.style.boxShadow = '0 2px 10px rgb(0 0 0 / 30%)';
        });

    });
    </script>

</body>

</html>