<?php
// Generate a random number between 1 and 100
$randomNumber = rand(1, 100);

// Display the generated number
//echo "Generated Number: $randomNumber";
?>
<!doctype html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html class="no-js" <?php language_attributes(); ?>>

<head>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-FNEW3JMH14"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-FNEW3JMH14');
    </script>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title('-', true, 'right'); ?></title>
    <link rel="shortcut icon" href="" />
    <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/assets/css/plugins.css">
    <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/assets/css/slick.min.css" />
    <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/assets/css/slick-theme.min.css" />
    <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/assets/css/style.css?v=<?php echo $randomNumber ?>">
    <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/assets/css/responsive.css">
    <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/assets/css/index.css?v=<?php echo $randomNumber ?>">
    <link rel="icon" href="<?= get_template_directory_uri(); ?>/images/favicon.ico">

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Anton|Passion+One|PT+Sans+Caption' rel='stylesheet' type='text/css'>
    <style>
        .captcha-style {
            margin: 0 0 0 165px;
        }
    </style>

    <?php wp_head(); ?>

    <!-- Meta Pixel Code -->
    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '1553871872064095');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=1553871872064095&ev=PageView&noscript=1" /></noscript>
    <!-- End Meta Pixel Code -->

    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-WQHRBL62');
    </script>
    <!-- End Google Tag Manager -->
</head>

<body class="template-index index-demo4">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WQHRBL62" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->


    <div class="page-wrapper">
        <div class="classic-topHeader">
            <div class="top-header classicTopbar">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-12 col-sm-6 col-md-3 col-lg-12 text-right d-flex align-items-center justify-content-end">
                            <div class="phone-picker left-brd d-inline-flex align-items-center">
                                <div class="email d-lg-block"><a href="mailto:<?= get_option('email2'); ?>"><?= get_option('email2'); ?></a></div>
                                <div class="phone d-none d-lg-block">
                                    <a href="tel:<?= get_option('ph_number1'); ?>"><?= get_option('ph_number1'); ?></a>
                                </div>
                                <div class="social-email left-brd d-inline-flex">
                                    <ul class="list-inline social-icons d-inline-flex align-items-center">
                                        <li class="list-inline-item">
                                            <a href="<?= get_option('facebook'); ?>" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Facebook" target="_blank"><i class="icon anm anm-facebook-f"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="<?= get_option('linkedin'); ?>" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Linkedin" target="_blank"><i class="icon anm anm-linkedin-in"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="<?= get_option('insta'); ?>" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Instagram" target="_blank"><i class="icon anm anm-instagram"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <header class="header classicHeader d-flex align-items-center header-4 header-fixed">
                <div class="container">
                    <div class="row">
                        <div class="logo col-6 col-sm-4 col-md-5 col-lg-3 align-self-center">
                            <a class="logoImg" href="<?= bloginfo('url'); ?>">
                                <img class="default-logo" data-src="<?= get_template_directory_uri(); ?>/images/logo_1.webp" src="<?= get_template_directory_uri(); ?>/images/logo_1.webp" alt="Uranis General Trading LLC" width="100%" height="auto">
                                <span class="logo-txt d-none">URANIS</span>
                            </a>
                        </div>
                        <div class="col-1 col-sm-1 col-md-1 col-lg-9 align-self-center d-menu-col hdr-menu-left menu-position-left">
                            <nav class="navigation" id="AccessibleNav">
                                <?php
                                wp_nav_menu(array(
                                    'theme_location'  => 'top-menu',
                                    'container'       => 'ul',
                                    'menu_class'      => 'site-nav medium left justify-content-end',
                                    'menu_id'         => 'siteNav', // Add this line for the menu ID
                                    'li_class'        => '',
                                    'a_class'         => ''
                                ));
                                ?>
                            </nav>
                        </div>
                        <div class="col-6 col-sm-8 col-md-7 col-lg-2 align-self-center icons-col text-right">
                            <button type="button" class="iconset pe-0 menu-icon js-mobile-nav-toggle mobile-nav--open d-lg-none" title="Menu"><i class="hdr-icon icon anm anm-times-l"></i><i class="hdr-icon icon anm anm-bars-r"></i></button>
                        </div>
                    </div>
                </div>
            </header>
        </div>
        <div class="mobile-nav-wrapper" role="navigation">
            <div class="closemobileMenu">Close Menu <i class="icon anm anm-times-l"></i></div>
            <?php
            wp_nav_menu(array(
                'theme_location'  => 'top-menu',
                'container'       => 'ul',
                'menu_class'      => 'mobile-nav',
                'li_class'        => '',
                'a_class'         => ''
            ));
            ?>
        </div>