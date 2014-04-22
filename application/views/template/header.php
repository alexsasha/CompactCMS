<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $title; ?></title>

    <link rel="stylesheet" href="<?php echo base_url(); ?>js/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo template_url(); ?>/style.css">
    <script src="<?php echo base_url(); ?>js/jquery-1.10.2.min.js"></script>
    <script src="<?php echo base_url(); ?>js/bootstrap/js/bootstrap.min.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div class="navbar-wrapper">
        <div class="container">
            <div class="navbar navbar-default navbar-static-top" role="navigation">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="<?php echo site_url(); ?>"><?php echo get_siteinfo('sitename'); ?></a>
                    </div>
                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li><a href="<?php echo site_url(); ?>">Главная</a></li>
                            <li><a href="<?php echo get_permalink(1); ?>">Пример страницы</a></li>
                            <li><a href="<?php echo site_url('admin'); ?>"><b>АДМИН-ПЕНЕЛЬ</b></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>