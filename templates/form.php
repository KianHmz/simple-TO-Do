<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= APP_NAME ?> auth</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= BASE_URL . '/public/assets/css/form.css' ?>">
</head>

<body>
    <!-- partial:index.partial.html -->
    <div class="form">
        <ul class="tab-group">
            <li class="tab active"><a href="#signup">Sign Up</a></li>
            <li class="tab"><a href="#login">Log In</a></li>
        </ul>

        <div class="tab-content">
            <div id="signup">
                <h1>Sign Up</h1>
                <form action="<?= BASE_URL . "/public/auth.php" ?>" method="post">
                    <div class="field-wrap">
                        <label>
                            Name<span class="req">*</span>
                        </label>
                        <input name="name" type="text" autocomplete="off" />
                    </div>
                    <div class="field-wrap">
                        <label>
                            Email Address<span class="req">*</span>
                        </label>
                        <input name="email" type="text" autocomplete="off" />
                    </div>
                    <div class="field-wrap">
                        <label>
                            Set A Password<span class="req">*</span>
                        </label>
                        <input name="password" type="password" autocomplete="off" />
                    </div>
                    <button name="signup" type="submit" class="button button-block" />Get Started</button>
                </form>
            </div>

            <div id="login">
                <h1>Welcome Back!</h1>
                <form action="<?= BASE_URL . '/public/auth.php' ?>" method="post">
                    <div class="field-wrap">
                        <label>
                            Email Address<span class="req">*</span>
                        </label>
                        <input name="email" type="text" autocomplete="off" />
                    </div>
                    <div class="field-wrap">
                        <label>
                            Password<span class="req">*</span>
                        </label>
                        <input name="password" type="password" autocomplete="off" />
                    </div>
                    <button name="login" type="submit" class="button button-block" />Log In</button>
                </form>
            </div>
        </div><!-- tab-content -->
    </div> <!-- /form -->

    <div class="container">
        <p class="msg-div"><?= $_SESSION['msg'] ?? '' ?></p>
    </div>


    <!-- partial -->
    <script src="<?= BASE_URL . '/public/assets/js/jquery.min.js' ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= BASE_URL . '/public/assets/js/helpers.js' ?>"></script>
    <script src="<?= BASE_URL . '/public/assets/js/form.js' ?>"></script>
</body>

</html>