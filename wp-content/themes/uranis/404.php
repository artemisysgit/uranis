<?php

/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>



    <div class="page-header text-center phc">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center ">
                    <div class="page-title">
                        <h1>Not Found!</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="page_404">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 ">
                    <div class="col-sm-10 col-sm-offset-1  text-center">
                        <div class="four_zero_four_bg">
                            <h1 class="text-center ">404</h1>


                        </div>

                        <div class="contant_box_404">
                            <h3 class="h2">
                                Look like you're lost
                            </h3>

                            <p>the page you are looking for not available!</p>
                            <p>you may check below pages!</p>

                            <!-- <a href="" class="link_404">Go to Home</a> -->
                            <?php
                            wp_nav_menu(array(
                                'theme_location'  => 'quick-links',
                                'container'       => 'ul',
                                'menu_class'      => 'site-nav site-nav1',
                                'li_class'        => '',
                                'a_class'         => 'link_404'
                            ));
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>





<?php get_footer(); ?>