<?php

/**
 * Template Name: About Us */
get_header();
?>
<div id="page-content">
    <div class="page-header text-center phc">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center ">
                    <div class="page-title">
                        <h1><?= the_title(); ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    $about_section = get_field('about_section');
    if ($about_section) :
    ?>
        <div class="destination-section section pt-0">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-6">
                        <div class="about-images mb-4 mb-md-0">
                            <div class="row g-3">
                                <img class="rounded-0 blur-up lazyload" data-src="<?= $about_section['about_image']['url']; ?>" src="<?= $about_section['about_image']['url']; ?>" alt="<?= esc_attr($about_section['about_image']['alt']); ?>" width="700" height="827" />
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6">
                        <div class="about-details px-50">
                            <p class="text-muted fs-6 mb-3"><?= $about_section['caption']; ?></p>
                            <h2 class="fs-4"><?= $about_section['title']; ?></h2>
                            <?= $about_section['paragraph']; ?>
                            <a href="<?= $about_section['about_button']['url']; ?>" class="btn btn-lg mt-md-2"><?= $about_section['about_button']['title']; ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    endif;
    ?>

    <?php
    $counter = 1;
    if (have_rows('teams_group')) :
        while (have_rows('teams_group')) : the_row();
            $teams_title = get_sub_field('teams_title');
            $teams_caption = get_sub_field('teams_caption');
            $teams_repeaters = get_sub_field('teams_repeaters');
    ?>
            <div class="team-section section">
                <div class="container">
                    <div class="section-header text-start ">
                        <h2><?= $teams_title; ?></h2>
                        <p class="mb-2 mt-0"><?= $teams_caption; ?></p>
                    </div>
                    <div class="team-items row col-row row-cols-lg-4 row-cols-md-4 row-cols-sm-2 row-cols-2 text-center">
                        <?php

                        if (have_rows('teams_repeaters')) :
                            while (have_rows('teams_repeaters')) : the_row();
                                $member_image = get_sub_field('member_image');
                                $members_social_networks = get_sub_field('members_social_networks');
                                $member_name = get_sub_field('member_name');
                                $member_designation = get_sub_field('member_designation');
                                $members_quote = get_sub_field('members_quote');
                        ?>
                                <div class="team-item team-item-main col-item">
                                    <div class="team-img zoom-scal rounded-0">
                                        <img class="rounded-0 blur-up lazyload w-100" data-src="<?= $member_image['url'] ?>" src="<?= $member_image['url'] ?>" alt="<?= esc_attr($member_image['alt']); ?>" width="350" height="350" />
                                        <ul class="list-inline social-icons d-flex-justify-center">
                                            <?php

                                            if (have_rows('members_social_networks')) :
                                                while (have_rows('members_social_networks')) : the_row();
                                                    $social_icon_text = get_sub_field('social_icon_text');
                                                    $social_links = get_sub_field('social_links');
                                            ?>
                                                    <li class="list-inline-item">
                                                        <a class="clr-none" href="<?= $social_links; ?>" target="_blank">
                                                            <?= $social_icon_text; ?>
                                                        </a>
                                                    </li>
                                            <?php

                                                endwhile;
                                            endif;
                                            ?>
                                        </ul>
                                    </div>
                                    <div class="team-bio pt-3">
                                        <h3 class="mb-2"><?= $member_name; ?></h3>
                                        <p><?= $member_designation; ?></p>
                                        <p><?= $members_quote; ?></p>
                                    </div>
                                </div>
                        <?php
                                $counter++;
                                
                            endwhile;


                         
                        endif;
                        ?>
                    </div>
                </div>
            </div>
    <?php

        endwhile;
    endif;
    ?>

    <div class="featured-brands-logo section">
        <div class="container">
            <div class="brands-list">
                <div class="brands-row logo-bar logo-slider-6items gp10 arwOut5">
                    <?php
                    if (have_rows('trusted_brand_logos')) :
                        while (have_rows('trusted_brand_logos')) : the_row();
                            $logo_image = get_sub_field('logo_image');
                    ?>
                            <div class="brands-logo">
                                <!-- <a href="javascript:void(0);" class="zoom-scal zoom-scal-nopb rounded-0"> -->
                                    <img class="rounded-0 blur-up lazyload" src="<?= $logo_image['url'] ?>" alt="<?= esc_attr($logo_image['alt']); ?>" width="200" height="100" />
                                <!-- </a> -->
                            </div>
                    <?php
                        endwhile;
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </div>

    <?php
    if (have_rows('testimonials')) :
        while (have_rows('testimonials')) : the_row();
            $testimonial_section_title = get_sub_field('testimonial_section_title');
            $testimonial_section_caption = get_sub_field('testimonial_section_caption');
    ?>
            <section class="testi_ele">
                <div class="container">
                    <div class="section-header style2 d-flex-center justify-content-sm-between">
                        <div class="section-header-left text-start">
                            <h2><?= $testimonial_section_title; ?></h2>
                            <p><?= $testimonial_section_caption; ?></p>
                        </div>
                    </div>
                    <div class="testi_slider">
                        <div class="testi_slider_main banner-new-sub-main-slider">
                            <?php
                            if (have_rows('testimonial_repeaters')) :
                                while (have_rows('testimonial_repeaters')) : the_row();
                                    $client_image = get_sub_field('client_image');
                                    $testimonial_quotes = get_sub_field('testimonial_quotes');
                                    $testimonial_client_name = get_sub_field('testimonial_client_name');
                                    $testimonial_client_designation = get_sub_field('testimonial_client_designation');
                            ?>
                                    <div class="testi_slider_sub">
                                        <div class="testi_slider_sub_text">
                                            <p><?= $testimonial_quotes; ?></p>
                                            <div class="testi_slider_sub_customer_info d-flex align-items-center ">
                                                <!--<div class="testi_slider_sub_customer_info_img">-->
                                                <!--	<img src="<?= $client_image['url']; ?>" alt="<?= esc_attr($client_image['alt']); ?>">-->
                                                <!--</div>-->
                                                <div class="testi_slider_sub_customer_info_text">
                                                    <h5><?= $testimonial_client_name; ?></h5>
                                                    <h6><?= $testimonial_client_designation; ?></h6>
                                                </div>
                                            </div>
                                            <div class="testi_slider_sub_img">
                                                <img src="<?= get_template_directory_uri(); ?>/images/quotation.png" alt="URANIS Testimonials Icon">
                                            </div>
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
    <?php
        endwhile;
    endif;
    ?>
</div>
<?php
get_footer();
?>