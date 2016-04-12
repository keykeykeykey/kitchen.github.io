<html>
    <head>
        <meta http-equiv="content-type" content="text/html" charset="utf-8">
        <link type="text/css" href="<?php bloginfo('template_url')?>/css/reset.css" rel="stylesheet">
        <link type="text/css" href="<?php bloginfo( 'stylesheet_url' ); ?>" rel="stylesheet">
        <link type="text/css" href="<?php bloginfo('template_url')?>/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
    <div class="head" id="head">
        <div class="container">
            <div class="row">
                <div class="Es  col-md-1 ">
                    <div class="language">
                        <a>Es <span>∨</span></a>
                    </div>

                    <ul class="seletor">
                        <li><a href="#">English </a></li>
                        <li><a href="#">Deutsch </a></li>
                        <li><a href="#">Pyccknn </a></li>
                        <li><a href="#">Espanol</a></li>
                        <li><a href="#">Francais </a></li>

                    </ul>
                </div>
                <div class="dolor  col-md-1">
                    <div class="money">
                        <a> $ <span>∨</span></a>
                    </div>
                    <ul class="seletor-money">
                        <li><a href="#">Dollar</a> </li>
                        <li><a href="#">Euro</a> </li>
                    </ul>
                </div>
                <div class="search col-md-2">
                    <a href="#"><img src="<?php bloginfo('template_url')?>/images/serch.jpg"></a>

                </div>
                <div class="search-box">
                    <div class="close">×</div>
                    <form method="get" id="searchform" action="<?php bloginfo('home') ?>">
                    <input name="s" id="s" type="text" placeholder="Rechercher">
<!--                    <a  type="submit"></a>-->
                    <input type="submit" id="searchsubmit" class="submit" value="">
                    </form>
                </div>
                <div class="title col-md-5">
                    <img src="<?php bloginfo('template_url')?>/images/new-store-logo-1444050112.jpg">
                </div>

                <div class="person col-md-1">
                    <a href="#"><img src="<?php bloginfo('template_url')?>/images/people.jpg"></a>
                </div>
                <div class="buy col-md-1">
                    <a href="#"><img src="<?php bloginfo('template_url')?>/images/people.jpg"></a>
                </div>
            </div>
        </div>
        <?php
        $name="Food Storage";
        $title=get_page_by_title($name);
        ?>
        <div class="menu">
            <div class="container">
                <div class="row">
                    <?php wp_nav_menu( array( 'theme_location' => 'primary',
                    ));
                    ?>

                </div>
            </div>

        </div>

    </div>
    <input type="hidden" id="type" name="type" value="<?php $cate_slug=$wp->query_vars['category_name']; echo $cate_slug  ?>">
    <input type="hidden" id="cate_name" name="type" value="<?php echo get_cate_name($cate_slug) ?>">
    </body>
    </html>