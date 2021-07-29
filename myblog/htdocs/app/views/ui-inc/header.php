<!doctype html>
<html lang="en">

<head>
    <title>Colorlib Balita &mdash; Minimal Blog Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300, 400,700" rel="stylesheet">

    <link rel="stylesheet" href="../../ui-assets/css/bootstrap.css">
    <link rel="stylesheet" href="../../ui-assets/css/animate.css">
    <link rel="stylesheet" href="../../ui-assets/css/owl.carousel.min.css">

    <link rel="stylesheet" href="../../ui-assets/fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="../../ui-assets/fonts/fontawesome/css/font-awesome.min.css">

    <link rel="stylesheet" href="../../ui-assets/fonts/flaticon/font/flaticon.css">

    <!-- Theme Style -->
    <link rel="stylesheet" href="../../ui-assets/css/style.css">
</head>

<body>
    <header role="banner">
        <div class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-9 social">Travel Blog</div>
                    <?php if (isset($_SESSION['user_id'])) : ?>
                        <div class="col-2 social" href="#">Welcome <?php echo $_SESSION['user_name']; ?></div>
                        <a href="<?php echo URLROOT; ?>users/login" class="col-1 social">Logout</a>
                    <?php else : ?>
                        <a href="<?php echo URLROOT; ?>users/login" class="col-1 social">Login</a>
                        <a href="<?php echo URLROOT; ?>users/register" class="col-1 social">Register</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="container logo-wrap">
            <div class="row pt-5">
                <div class="col-12 text-center">
                    <a class="absolute-toggle d-block d-md-none" data-toggle="collapse" href="#navbarMenu" role="button" aria-expanded="false" aria-controls="navbarMenu"><span class="burger-lines"></span></a>
                    <h1 class="site-logo">
                        <a href="/home">MY BLOG</a>
                    </h1>
                </div>
            </div>
        </div>

        <nav class="navbar navbar-expand-md  navbar-light bg-light">
            <div class="container">
                <div class="collapse navbar-collapse" id="navbarMenu">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item"><a class="nav-link active" href="/home">Home</a></li>
                        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="category.html" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown05">
                                <?php foreach ($data['cates'] as $cates) : ?>
                                    <a class="dropdown-item" href="<?php echo URLROOT; ?>cate/<?php echo $cates->id ?>"><?php echo $cates->category_name ?></a>
                                <?php endforeach ?>
                            </div>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo URLROOT; ?>pages/about">About</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- END header -->