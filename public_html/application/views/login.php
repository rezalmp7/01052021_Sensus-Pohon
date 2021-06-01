<!DOCTYPE html>
<html style="height: 100vh">

<head>
    <title>Sensus Pohon - Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- UIkit CSS -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&family=Poppins:wght@300;400;500;600;700;800;900&display=swap">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.6.19/dist/css/uikit.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/iziToast/dist/css/iziToast.min.css">

    
    <!-- UIkit JS -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.6.19/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.6.19/dist/js/uikit-icons.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@iconify/iconify@2.0.0-rc.6/dist/iconify.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/js/main.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/iziToast/dist/js/iziToast.min.js" type="text/javascript"></script>

</head>

<body style="height: 100vh">
    <div class="uk-container uk-height-1-1 uk-container-expand uk-margin-remove uk-padding-remove" id="login">
        <div class="uk-width-1-1 uk-height-1-1 uk-margin-remove uk-padding-remove uk-background-cover uk-background-top-center uk-background-norepeat body uk-grid-match" style="background-image: url('<?php echo base_url(); ?>assets/img/img_login.png');" uk-grid>
            <div class="uk-width-3-5@s uk-visible@s uk-padding-large uk-margin-remove uk-inline left-side">
                <span class="uk-padding-large uk-position-small uk-position-center-left uk-overlay">Aplikasi Sensus Pohon Sawit</span>
            </div>
            <div class="uk-width-2-5@s uk-padding-remove uk-margin-remove uk-inline form">
                <div class="uk-padding-large uk-position-small uk-overlay">
                    <h6 class="uk-text-center uk-hidden@s uk-padding-remove uk-margin-remove">Aplikasi Sensus Pohon Sawit</h6>
                    <h4 class="uk-text-center">LOGIN</h4>
                    <form class="uk-margin-medium-top uk-padding-large uk-padding-remove-vertical uk-form-stacked" method="POST" action="<?php echo base_url(); ?>login/login_aksi">
                        <div class="uk-margin">
                            <label class="uk-form-label" for="form-stacked-text">Username</label>
                            <div class="uk-form-controls">
                                <input class="uk-input field-default" id="form-stacked-text" type="text" name="username" placeholder="Username...">
                            </div>
                        </div>
                        <div class="uk-margin">
                            <label class="uk-form-label" for="form-stacked-text">Password</label>
                            <div class="uk-inline uk-width-1-1">
                                <a class="uk-form-icon uk-form-icon-flip" id="buttonShowPassword" onclick="showPassword()"><span class="iconify" data-icon="bx:bxs-show" data-inline="false"></span></a>
                                <input class="uk-input field-default" id="myInput" type="password" name="password" placeholder="Password...">
                            </div>
                        </div>
                        <input type="submit" value="MASUK" class="uk-button button-uk-success uk-width-1-1">
                    </form>
                </div>
                <div class="uk-position-small uk-position-bottom uk-overlay uk-text-center footer">
                    Copyright CV . Fun Teknologi 2021
                </div>
            </div>
        </div>
    </div>
    <?php
    if(isset($_GET['success']))
    {
    ?>
    <script>
        iziToast.success({
            title: 'Success',
            message: "<?php echo $_GET['success']; ?>",
        });
    </script>
    <?php
    }
    if(isset($_GET['error']))
    {
    ?>
    <script>
        iziToast.error({
            title: 'Error',
            message: "<?php echo $_GET['error']; ?>",
        });
    </script>
    <?php
    }
    ?>

</body>

</html>