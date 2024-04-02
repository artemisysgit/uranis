<?php
//Template Name: Home
get_header(); ?>
<div id="page-content" class="mb-0">
    <div class="banner-new">
        <div class="container">
            <div class="banner-new-main row justify-content-between ">
                <div class="col-lg-6 banner-new-sub">
                    <div class="banner-new-sub-main">
                        <?php echo the_field("welcome_text"); ?>
                    </div>
                </div>
                <div class="col-lg-6 banner-new-sub">
                    <div class="banner-new-sub-main">
                        <div class="banner-new-sub-main-slider">
                            <?php // Check rows exists.
                            if (have_rows("slider")) :
                                // Loop through rows.
                                while (have_rows("slider")) :
                                    the_row(); ?>
                                    <!-- <img style="display: none;" src="<?php //echo get_sub_field("add_banner"); ?> -->
                                    <div class="banner-new-sub-main-slide"><img src="<?php echo get_sub_field("add_banner"); ?>" loading="lazy" alt="" width="100%" height="auto"></div>

                            <?php
                                // End loop.


                                endwhile;

                            // No value.
                            else :

                            // Do something...
                            endif; ?>


                        </div>
                    </div>
                </div>
                <div class="col-lg-6 banner-new-sub">
                    <div class="banner-new-sub-main d-flex flex-wrap align-items-end">
                        <div class="row justify-content-between ">
                            <div class="col-lg-5 col-md-5 ">
                                <div class="featured-img-new">
                                    <?php
                                    $multi_brand_category = get_field('multi_brand_category');
                                    if ($multi_brand_category) :
                                    ?>
                                        <a href="<?= $multi_brand_category['multi_brand_category_link']['url']; ?>">
                                            <img class="img-fluid" src="<?= $multi_brand_category['multi_brand_category_image']['url']; ?>" alt="<?= $multi_brand_category['multi_brand_category_image']['alt']; ?>">
                                        </a>
                                    <?php
                                    endif;
                                    ?>
                                </div>


                            </div>
                            <div class="col-lg-6 ">
                                <div class="banner-products-text">
                                    <div class="banner-products-text1 text-end ">
                                        <h6>MULTI-BRAND</h6>
                                        <h2>Portfolio</h2>
                                    </div>
                                    <div class="banner-products-text2">
                                        <?php the_field(
                                            "featured_product_text"
                                        ); ?>
                                    </div>
                                    <div class="banner-products-text3">
                                        <a href="<?php echo site_url("/product/"); ?>">VIEW MORE
                                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M11.0308 1.81421L1.3594 11.4856C1.27665 11.5684 1.17519 11.6126 1.05503 11.6183C0.934872 11.6239 0.827755 11.5797 0.73368 11.4856C0.63959 11.3916 0.592545 11.2873 0.592545 11.1728C0.592545 11.0583 0.63959 10.954 0.73368 10.8599L10.4051 1.18849H4.39957C4.27431 1.18849 4.16932 1.14606 4.08458 1.06121C3.99985 0.976362 3.95748 0.871227 3.95748 0.745808C3.95748 0.620375 3.99985 0.515439 4.08458 0.431001C4.16932 0.346548 4.27431 0.304321 4.39957 0.304321H11.2009C11.4032 0.304321 11.5728 0.372756 11.7097 0.509625C11.8465 0.646509 11.915 0.816114 11.915 1.01844V7.81974C11.915 7.94499 11.8726 8.04999 11.7877 8.13472C11.7029 8.21945 11.5977 8.26182 11.4723 8.26182C11.3469 8.26182 11.242 8.21945 11.1575 8.13472C11.073 8.04999 11.0308 7.94499 11.0308 7.81974V1.81421Z" fill="#343434" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 banner-new-sub">
                    <div class="banner-new-sub-main">
                        <div class="row">
                            <div class="col-lg-5 col-md-5">
                                <div class="best-selling-main-img"><img src="<?php the_field(
                                                                                    "best_selling_image"
                                                                                ); ?>" alt=""></div>
                            </div>
                            <div class="col-lg-7 col-md-7">
                                <div class="row g-3 justify-content-between flex-row-reverse banner-new-sub-main-main">
                                    <div class="col-lg-12 ">
                                        <div class="best-selling-sub">
                                            <div class="best-selling-sub-box d-flex justify-content-between align-items-center ">
                                                <div class="best-selling-sub-box-1">
                                                    <h6>Our Global</h6>
                                                    <h4>Range of Products</h4>
                                                </div>
                                                <div class="best-selling-sub-box-2">
                                                    <a href="<?php echo site_url(
                                                                    "/product/"
                                                                ); ?>">
                                                        <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M9.58421 1.97221L1.29338 10.263C1.22243 10.334 1.13546 10.3719 1.03245 10.3767C0.929447 10.3816 0.837621 10.3437 0.756975 10.263C0.676316 10.1824 0.635986 10.093 0.635986 9.99485C0.635986 9.8967 0.676316 9.8073 0.756975 9.72664L9.04781 1.43581H3.89956C3.79219 1.43581 3.70218 1.39944 3.62954 1.3267C3.55691 1.25396 3.52059 1.16384 3.52059 1.05632C3.52059 0.948794 3.55691 0.858837 3.62954 0.786453C3.70218 0.714055 3.79219 0.677856 3.89956 0.677856H9.72999C9.90343 0.677856 10.0488 0.736523 10.1662 0.853854C10.2835 0.971198 10.3422 1.11659 10.3422 1.29004V7.12046C10.3422 7.22784 10.3058 7.31784 10.2331 7.39048C10.1603 7.46312 10.0702 7.49944 9.96268 7.49944C9.85516 7.49944 9.76521 7.46312 9.69281 7.39048C9.62041 7.31784 9.58421 7.22784 9.58421 7.12046V1.97221Z" fill="white" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="best-selling-sub-box-3">
                                                <?php the_field(
                                                    "best_selling_product_text"
                                                ); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 d-flex align-items-end">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 banner-new-sub-main-main-sub">
                                                <div class="best-selling-product">
                                                    <h2>9/10</h2>
                                                    <p><?php the_field(
                                                            "910_text"
                                                        ); ?> </p>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 banner-new-sub-main-main-sub-2">
                                                <?php
                                                $global_range_category = get_field('global_range_category');
                                                if ($global_range_category) :
                                                    //$global_range_category_image = the_field('global_range_category_image');
                                                ?>
                                                    <a href="<?= $global_range_category['global_range_category_link']['url']; ?>">
                                                        <img class="img-fluid" src="<?= $global_range_category['global_range_category_image_show']['url']; ?>" alt="">
                                                    </a>
                                                <?php
                                                endif;
                                                ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End Home Slide-->

    <!-- Service section -->
    <section class="service-section section-md mt-m6 section-clr">
        <div class="container">
            <div class="service-info separate-line mdt-0 g-3 g-md-3 row row-cols-lg-3 row-cols-md-2 row-cols-sm-2 row-cols-1">
                <?php // Check rows exists.
                if (have_rows("section_text")) :
                    // Loop through rows.
                    while (have_rows("section_text")) :
                        the_row();
                        $icon = get_sub_field('icon');
                ?>
                        <div class="service-wrap d-flex-center justify-content-lg-center justify-content-md-start justify-content-sm-center flex-nowrap py-lg-1 mb-2 mb-sm-3 mb-md-0">
                            <div class="service-icon d-flex align-items-center">
                                <?php //the_sub_field("icon"); 
                                ?>
                                <img src="<?= $icon['url']; ?>" alt="<?= esc_attr($icon['alt']); ?>" class="img-fluid">
                            </div>
                            <div class="service-content ms-3">
                                <?php the_sub_field(
                                    "section_text"
                                ); ?>
                            </div>
                        </div>

                <?php
                    // End loop.


                    endwhile;

                // No value.
                else :

                // Do something...
                endif; ?>



            </div>
        </div>
    </section>
    <!-- End Service section -->

    <!--Products Slider-->
    <section class="section product-banner-slider">
        <div class="container">
            <div class="section-header style2 d-flex-center justify-content-sm-between">
                <div class="section-header-left text-start">
                    <h2>Hassle free business</h2>
                    <p><?php the_field("new_arrival_text"); ?></p>
                </div>
                <div class="section-header-right text-start text-sm-end mt-3 mt-sm-0">
                    <a href="<?php echo site_url(
                                    "/product/"
                                ); ?>" class="btn btn-primary">View More <i class="icon anm anm-arw-right ms-2 HDHD"></i></a>
                </div>
            </div>


            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-3 mb-4 mb-lg-0">
                    <div class="ctg-bnr-wrap one position-relative h-100">
                        <div class="ctg-image ratio ratio-1x1 h-100">
                            <img class="blur-up lazyload" data-src="<?php the_field(
                                                                        "new_arrival_left_image"
                                                                    ); ?>" alt="collection" width="390" height="483" />
                        </div>
                        <div class="ctg-content text-white d-flex-justify-center flex-nowrap flex-column h-100 justify-content-end ">
                            <a class="btn btn-secondary explore-btn" href="<?php echo site_url(
                                                                                "/product/"
                                                                            ); ?>">Explore Now <i class="icon anm anm-arw-right ms-2 HDHD"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-12 col-md-12 col-lg-9">
                    <div class="grid-products product-slider-3items gp15 arwOut5 hov-arrow circle-arrow arrowlr-0">

                        <?php
                        $args_new = [
                            "post_type" => "products",
                            "orderby" => "name",
                            "order" => "ASC",
                            "post_status" => "publish",
                            "posts_per_page" => -1,
                            "meta_query" => [
                                [
                                    "key" => "hassle_free_business_product",
                                    "compare" => "EXISTS",
                                    "value" => "Yes",
                                ],
                            ],
                        ];
                        $articles_query_new = new WP_Query($args_new);
                        if ($articles_query_new->have_posts()) {
                            while ($articles_query_new->have_posts()) {

                                $articles_query_new->the_post();
                                setup_postdata(
                                    $articles_query_new->post
                                );
                                $featured_image_new = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), "full");
                        ?>

                                <div class="item col-item">
                                    <div class="product-box">
                                        <div class="product-image">
                                            <a href="<?= get_the_permalink(); ?>" class="product-img">
                                                <img class="primary blur-up lazyload" data-src="<?php echo $featured_image_new[0]; ?>" width="625" height="625" alt="<?php the_title(); ?>" />
                                                <img class="hover blur-up lazyload" data-src="<?php echo $featured_image_new[0]; ?>" src="<?php echo $featured_image_new[0]; ?>" width="625" height="625" alt="<?php the_title(); ?>" />
                                            </a>
                                        </div>
                                        <div class="product-details text-left">
                                            <div class="product-name">
                                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                            </div>
                                            <div class="button-action">
                                                <div class="addtocart-btn">
                                                    <a href="<?php the_permalink(); ?>" class="btn btn-secondary">
                                                        <i class="icon anm anm-basket-l me-2"></i><span class="text">View Details</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                            wp_reset_postdata();
                        } else {
                            echo "No result found";
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Products Slider-->

    <!--Shop By Category-->
    <section class="section collection-slider pt-0">
        <div class="container">
            <div class="section-header style2 d-flex-center justify-content-sm-between">
                <div class="section-header-left text-start">
                    <h2>Choose category-wise</h2>
                    <p><?php the_field(
                            "shop_by_category_text"
                        ); ?></p>
                </div>
                <div class="section-header-right text-start text-sm-end mt-3 mt-sm-0">
                    <a href="<?php echo site_url("/categories/"); ?>" class="btn btn-primary">View All Category <i class="icon anm anm-arw-right ms-2 HDHD"></i></a>
                </div>
            </div>

            <div class="collection-slider-3items slick-arrow-dots gp15 arwOut5 hov-arrow circle-arrow">
                <?php
                $category_args = [
                    "taxonomy" => "category",
                    "post_type" => "products",
                    "orderby" => "name",
                    "order" => "ASC",
                ];
                $category = get_categories($category_args);
                foreach ($category as $category_list) {
                ?>
                    <div class="category-item zoomscal-hov overlay-content">
                        <a href="<?php echo site_url("/category/$category_list->slug"); ?>" class="category-link clr-none">

                            <div class="zoom-scal"><img class="blur-up lazyload" data-src="<?php echo z_taxonomy_image_url($category_list->term_id); ?>" src="<?php echo z_taxonomy_image_url($category_list->term_id); ?>" alt="collection" width="416" height="416" />
                            </div>
                            <div class="details whiteText text-center p-0">
                                <h4 class="category-title h2 text-uppercase mb-2 pb-1"><?php echo $category_list->name; ?></h4>
                                <span class="category-btn btn-brd fw-500 text-uppercase">View Now</span>
                            </div>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <!--End Shop By Category-->

    <!--Products Slider-->
    <section class="section product-banner-slider pt-0">
        <div class="container">
            <div class="section-header style2 d-flex-center justify-content-sm-between">
                <div class="section-header-left text-start">
                    <h2>Wide spectrum of products</h2>
                    <p><?php the_field('this_week_top_picks') ?></p>
                </div>
                <div class="section-header-right text-start text-sm-end mt-3 mt-sm-0">
                    <a href="<?php echo site_url('/product/'); ?>" class="btn btn-primary">View More <i class="icon anm anm-arw-right ms-2 HDHD"></i></a>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-9">
                    <div class="grid-products product-slider-3items gp15 arwOut5 hov-arrow circle-arrow arrowlr-0">
                        <?php
                        $args_new_wide = [
                            "post_type" => "products",
                            "orderby" => "name",
                            "order" => "ASC",
                            "post_status" => "publish",
                            "posts_per_page" => -1,
                            "meta_query" => [
                                [
                                    "key" => "wide_spectrum_of_product",
                                    "compare" => "EXISTS",
                                    "value" => "Yes",
                                ],
                            ],
                        ];
                        $articles_query_new_wide = new WP_Query($args_new_wide);
                        if ($articles_query_new_wide->have_posts()) {
                            while ($articles_query_new_wide->have_posts()) {
                                $articles_query_new_wide->the_post();
                                setup_postdata($articles_query_new_wide->post);
                                $featured_image_new_wide = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), "full");
                        ?>
                                <div class="item col-item">
                                    <div class="product-box">
                                        <div class="product-image">
                                            <a href="<?php the_permalink(); ?>" class="product-img">
                                                <img class="primary blur-up lazyload" data-src="<?php echo $featured_image_new_wide[0]; ?>" src="<?php echo $featured_image_new_wide[0]; ?>" alt="<?php the_title(); ?>" width="625" height="625" />
                                                <img class="hover blur-up lazyload" data-src="<?php echo $featured_image_new_wide[0]; ?>" src="<?php echo $featured_image_new_wide[0]; ?>" alt="<?php the_title(); ?>" width="625" height="625" />
                                            </a>
                                        </div>
                                        <div class="product-details text-left">
                                            <div class="product-name">
                                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                            </div>
                                            <div class="button-action">
                                                <div class="addtocart-btn">
                                                    <a href="<?php the_permalink(); ?>" class="btn btn-secondary">
                                                        <i class="icon anm anm-basket-l me-2"></i><span class="text">View Details</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                            wp_reset_postdata();
                        } else {
                            echo "No result found";
                        }
                        ?>
                    </div>
                </div>

                <div class="col-12 col-sm-12 col-md-12 col-lg-3 mt-4 mt-lg-0">
                    <div class="ctg-bnr-wrap two position-relative h-100">
                        <div class="ctg-image ratio ratio-1x1 h-100">
                            <img class="blur-up lazyload" data-src="<?php the_field('this_week_top_picks_image'); ?>" alt="collection" width="309" height="483" />
                        </div>
                        <div class="ctg-content text-white flex-nowrap flex-column justify-content-between vghgh">
                            <h2 class="ctg-title text-white m-0"><?php the_field('this_week_top_picks_right_image_text'); ?></h2>
                            <a class="btn btn-secondary explore-btn" href="<?php echo site_url('/product/'); ?>">View Details <i class="icon anm anm-arw-right ms-2 HDHD"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Products Slider-->

    <!--Collection banner-->
    <section class="section collection-banners two-one-bnr py-0">
        <div class="container">
            <div class="collection-banner-grid two-bnr">
                <div class="row sp-row">
                    <?php
                    if (have_rows('home_collections_banner')) :
                        while (have_rows('home_collections_banner')) : the_row();
                            $home_collection_banner_image = get_sub_field('home_collection_banner_image');
                            $home_collection_banner_link = get_sub_field('home_collection_banner_link');
                    ?>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 collection-banner-item">
                                <div class="collection-item sp-col">
                                    <a href="<?= $home_collection_banner_link['url'] ?>" class="zoom-scal clr-none">
                                        <div class="img">
                                            <img class="blur-up lazyload" data-src="<?= $home_collection_banner_image['url'] ?>" src="<?= $home_collection_banner_image['url'] ?>" alt="<?= esc_attr($home_collection_banner_image['alt']); ?>" width="647" height="439" />
                                        </div>
                                    </a>
                                </div>
                            </div>
                    <?php
                        endwhile;
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </section>
    <!--End Collection banner-->

    <!--TESTIMONIALS Section-->
    <section class="testi_ele">
        <div class="container">
            <div class="section-header style2 d-flex-center justify-content-sm-between">
                <div class="section-header-left text-start">
                    <h2>Clients reviews</h2>
                    <p><?php the_field('testimonials_text'); ?></p>
                </div>
            </div>
            <div class="testi_slider">
                <div class="testi_slider_main banner-new-sub-main-slider">
                    <?php // Check rows exists.
                    if (have_rows("testimonials")) :
                        // Loop through rows.
                        while (have_rows("testimonials")) :
                            the_row(); ?>
                            <div class="testi_slider_sub">
                                <div class="testi_slider_sub_text">
                                    <p><?php echo get_sub_field('comments') ?></p>
                                    <div class="testi_slider_sub_customer_info d-flex align-items-center ">
                                        <!--<div class="testi_slider_sub_customer_info_img"><img src="<?php echo get_sub_field('profile_image') ?>" alt=""></div>-->
                                        <div class="testi_slider_sub_customer_info_text">
                                            <h5><?php echo get_sub_field('client_name') ?></h5>
                                            <h6><?php echo get_sub_field('client_designation') ?></h6>
                                        </div>
                                    </div>
                                    <div class="testi_slider_sub_img"><img src="<?= get_template_directory_uri() ?>/images/quotation.png" alt=""></div>
                                </div>
                            </div>
                    <?php
                        // End loop.


                        endwhile;

                    // No value.
                    else :

                    // Do something...
                    endif; ?>
                </div>
            </div>
        </div>
    </section>
    <!--End TESTIMONIALS Section-->
    <!--Brand Logo-->
    <section class="section logo-section">
        <div class="container">
            <!-- <div class="section-header d-none">
                            <h2>Popular Brands</h2>
                            <p>See what our client says</p>
                        </div> -->

            <div class="brands-list">
                <div class="brands-row logo-bar logo-slider-6items gp10 arwOut5 hov-arrow circle-arrow">
                    <?php // Check rows exists.
                    if (have_rows("brand_logo")) :
                        // Loop through rows.
                        while (have_rows("brand_logo")) :
                            the_row(); ?>
                            <div class="brands-logo">
                                <img class="blur-up lazyload" src="<?php echo get_sub_field('logo') ?>" alt="Brand Logo" title="" width="194" height="97" />
                            </div>
                    <?php
                        // End loop.


                        endwhile;

                    // No value.
                    else :

                    // Do something...
                    endif; ?>

                </div>
            </div>
        </div>
    </section>
    <!--End Brand Logo-->


</div>
<!-- End Body Container -->

<?php get_footer();
?>