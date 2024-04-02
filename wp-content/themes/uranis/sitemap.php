<?php

/**
 * Template Name: Sitemap */
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
    <nav class="primaryNav">
        <ul>
            <li id="home"><a href="/"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door" viewBox="0 0 16 16">
                        <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4z" />
                    </svg> Home page</a></li>
            <li><a href="<?php echo site_url("/category/"); ?>">Categories</a></li>
            <li><a href="<?php echo site_url("/product/"); ?>">Products</a></li>
            <!-- <li><a href="<?php echo site_url("/services/"); ?>">Services</a></li> -->
            <li><a href="<?php echo site_url("/about-us/"); ?>">About Us</a></li>
            <li><a href="<?php echo site_url("/contact-us/"); ?>">Contact Us</a></li>
            <li><a href="<?php echo site_url("/blogs/"); ?>">Blogs</a></li>
            <li><a href="<?php echo site_url("/privacy-policy/"); ?>">Privacy Policy</a></li>


            <li><a href="#" onclick="return false">Category Listing</a>
                <ul>
                    <?php
                    $counter = 0;
                    $category_args = [
                        "taxonomy" => "category",
                        "post_type" => "products",
                        "orderby" => "name",
                        "order" => "ASC",
                    ];
                    $category = get_categories($category_args);
                    foreach ($category as $category_list) {
                        //$post_count = get_category($category_list->term_id)->count;
                        $cat_name = sanitize_text_field($category_list->name);
                        $cat_slug = sanitize_text_field($category_list->slug);
                        $category_id = $category_list->term_id;
                        //echo $category_id;

                        $query = new WP_Query(array(
                            'post_type'         => array('products'),
                            'posts_per_page'    => -1,
                            'post_status'       => 'publish',
                            'orderby'           => 'DESC',
                            'cat' => $category_id,
                        ));
                    ?>
                        <li <?php if ($counter > 4) {  ?> class="collapsed_item" <?php } ?>><a href="<?php echo site_url("/category/$cat_slug"); ?>"><?php echo strtoupper($category_list->name); ?></a>

                            <ul>
                                <?php
                                if ($query->have_posts()) {
                                    // Start the loop
                                    while ($query->have_posts()) {
                                        $query->the_post();
                                        $featured_image = wp_get_attachment_image_src(
                                            get_post_thumbnail_id(
                                                get_the_ID()
                                            ),
                                            "full"
                                        );
                                ?>

                                        <li><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></li>
                                <?php
                                    }


                                    // Restore global post data
                                    wp_reset_postdata();
                                } else {
                                    // If no posts are found
                                    echo 'No products found.';
                                }
                                ?>

                            </ul>

                        </li>
                    <?php $counter++;
                    } ?>


                    <li class="expand_items"><a href="#"> &#x25BC; </a></li>
                </ul>
            </li>

            <li><a href="#" onclick="return false">Product Listing</a>
                <ul>
                    <?php
                    $counter = 0;

                    $query = new WP_Query(array(
                        'post_type'         => array('products'),
                        'posts_per_page'    => -1,
                        'post_status'       => 'publish',
                        'orderby'           => 'DESC',
                    ));

                    // Check if there are any posts
                    if ($query->have_posts()) {
                        // Start the loop
                        while ($query->have_posts()) {
                            $query->the_post();
                            $featured_image = wp_get_attachment_image_src(
                                get_post_thumbnail_id(
                                    get_the_ID()
                                ),
                                "full"
                            );
                    ?>

                            <li <?php if ($counter > 21) {  ?> class="collapsed_item" <?php } ?>><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a>

                        <?php
                          $counter++;
                        }
                        // Restore global post data
                        wp_reset_postdata();
                    } else {
                        // If no posts are found
                        echo 'No products found.';
                    }

                        ?>


                            <li class="expand_items"><a href="#"> &#x25BC; </a></li>
                </ul>
            </li>
        </ul>
    </nav>
</div>


<?php
get_footer();
?>