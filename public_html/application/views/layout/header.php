<!DOCTYPE html>
<html>

<head>
    <title><?php echo $page; ?> - Sensus Pohon</title>

    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url(); ?>assets/img/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo base_url(); ?>assets/img/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url(); ?>assets/img/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url(); ?>assets/img/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url(); ?>assets/img/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url(); ?>assets/img/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url(); ?>assets/img/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url(); ?>assets/img/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url(); ?>assets/img/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo base_url(); ?>assets/img/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url(); ?>assets/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url(); ?>assets/img/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>assets/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?php echo base_url(); ?>assets/img/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo base_url(); ?>assets/img/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- UIkit CSS -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&family=Poppins:wght@300;400;500;600;700;800;900&display=swap">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.uikit.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.6.19/dist/css/uikit.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/iziToast/dist/css/iziToast.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- UIkit JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.6.19/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.6.19/dist/js/uikit-icons.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@iconify/iconify@2.0.0-rc.6/dist/iconify.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/js/main.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/iziToast/dist/js/iziToast.min.js" type="text/javascript"></script>
</head>

<body>
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
    <div class="uk-container uk-height-1-1 uk-container-expand uk-margin-remove uk-padding-remove" id="<?php echo $page; ?>">
        <div class="uk-width-1-1 uk-height-1-1 uk-padding-remove uk-margin-remove" id="body" uk-grid>
            <div class="uk-width-1-6@l uk-width-1-5@m uk-padding-small uk-margin-remove" id="sidenav">
                <ul class="uk-nav uk-nav-default">
                    <li
                        class="uk-nav-header uk-text-center uk-padding uk-padding-remove-horizontal uk-margin-small-bottom">
                        <a href="<?php echo base_url(); ?>dashboard"><img class="uk-width-3-5" src="<?php echo base_url(); ?>assets/img/color logo fun.png"></a>
                    </li>
                    <li class="<?php if($page == 'dashboard') echo 'uk-active '; ?>uk-padding-remove uk-margin-remove"><a class="uk-display-block"
                            href="<?php echo base_url(); ?>dashboard"><span class="iconify" data-icon="bx:bxs-dashboard"
                                data-inline="false"></span> Dasboard</a>
                    </li>
                    <li class="<?php if($page == 'user') echo 'uk-active '; ?>uk-padding-remove uk-margin-remove"><a class="uk-display-block" href="<?php echo base_url(); ?>user"><span
                                class="iconify" data-icon="bx:bxs-user" data-inline="false"></span>
                            User Admin</a></li>
                    <li class="<?php if($page == 'pegawai') echo 'uk-active '; ?>uk-padding-remove uk-margin-remove"><a class="uk-display-block"
                            href="<?php echo base_url(); ?>pegawai"><span class="iconify" data-icon="gridicons:multiple-users"
                                data-inline="false"></span>
                            Pegawai</a></li>
                    <li class="<?php if($page == 'pohon') echo 'uk-active '; ?>uk-padding-remove uk-margin-remove"><a class="uk-display-block" href="<?php echo base_url(); ?>pohon"><span
                                class="iconify" data-icon="bx:bxs-tree" data-inline="false"></span> Data Pohon</a></li>
                    <li class="<?php if($page == 'laporan') echo 'uk-active '; ?>uk-padding-remove uk-margin-remove"><a class="uk-display-block" href="<?php echo base_url(); ?>laporan"><span
                                class="iconify" data-icon="bx:bxs-report" data-inline="false"></span> Laporan</a></li>
                    <li class="<?php if($page == 'pengumuman') echo 'uk-active '; ?>uk-padding-remove uk-margin-remove"><a class="uk-display-block"
                            href="<?php echo base_url(); ?>pengumuman"><span class="iconify" data-icon="bx:bxs-news"
                                data-inline="false"></span> Pengumuman</a></li>
                </ul>
            </div>
            <div class="uk-width-5-6@l uk-width-4-5@m uk-padding-small uk-margin-remove" id="content">
                <div class="uk-width-1-1 uk-padding-remove uk-margin-remove">
                    <div class="uk-width-1-1 uk-padding-large uk-margin-remove head uk-clearefix uk-padding-remove-top">
                        
                        <div class="uk-inline poppins-medium uk-float-right">
                            <a type="button">
                                <?php $photo = $this->session->userdata('photo_sensuspohon'); ?>
                                <div class="uk-float-left profil uk-background-cover uk-background-top-center uk-background-norepeat" style="background-image: url('<?php echo base_url(); ?>assets/img/user/<?php if($photo != null) echo $photo; else { echo "default.png"; }; ?>"></div>
                                    <span class="uk-margin-small-left uk-float-right uk-padding-small uk-padding-remove-horizontal"><?php echo $this->session->userdata('nama_sensuspohon'); ?></span>
                            </a>
                            <div class="uk-padding-small" uk-dropdown="mode: click; pos: bottom-right; offset: 80">
                                <ul class="uk-nav uk-dropdown-nav">
                                    <li><a href="<?php echo base_url(); ?>login/logout">Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>