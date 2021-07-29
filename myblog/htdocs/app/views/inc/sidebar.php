<!-- HEADER MOBILE-->
<header class="header-mobile d-block d-lg-none">
    <div class="header-mobile__bar">
        <div class="container-fluid">
            <div class="header-mobile-inner">
                <a class="logo" href="/dashboard"> <img src="../../admin-assets/images/icon/logo.png" alt="CoolAdmin" />
                </a>
                <button class="hamburger hamburger--slider" type="button">
                    <span class="hamburger-box"> <span class="hamburger-inner"></span></span>
                </button>
            </div>
        </div>
    </div>
    <nav class="navbar-mobile">
        <div class="container-fluid">
            <ul class="navbar-mobile__list list-unstyled">

                <li><a href="<?php echo URLROOT; ?>categories/"> <i class="fas fa-chart-bar"></i>Quản
                        lý danh mục
                    </a></li>
                <li><a href="<?php echo URLROOT; ?>posts/"> <i class="fas fa-table"></i>Quản
                        lý Blogs
                    </a></li>
                <li><a href="<?php echo URLROOT; ?>form.html"> <i class="far fa-check-square"></i>Quản
                        lý User
                    </a></li>
            </ul>
        </div>
    </nav>
</header>
<!-- END HEADER MOBILE-->

<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="/dashboard"> <img src="../../admin-assets/images/icon/logo.png" alt="Cool Admin" />
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li><a href="<?php echo URLROOT; ?>categories/"> <i class="fas fa-chart-bar"></i>Quản
                        lý Danh mục
                    </a></li>
                <li><a href="<?php echo URLROOT ?>posts/"> <i class="fas fa-table"></i>Quản
                        lý Blogs
                    </a></li>
                <li><a href="<?php echo URLROOT; ?>form.html"> <i class="far fa-check-square"></i>Quản
                        lý User
                    </a></li>
            </ul>
        </nav>
    </div>
</aside>
<!-- END MENU SIDEBAR-->