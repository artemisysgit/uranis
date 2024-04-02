<?php
include '../../../wp-load.php';
global $wpdb;
// Retrieve the selected tags array from the AJAX request
if ($_POST['tags'] != "" && $_POST['cat_id'] > 0) {
    //echo "Brands + Category";

    $selectedTags = $_REQUEST['tags'];
    $category_id = $_REQUEST['cat_id'];


    $args = array(
        'post_type'         => array('products'),
        'posts_per_page'    => -1,
        'post_status'       => 'publish',
        'order'             => 'ASC',
        'orderby'           => 'title',  // Sort by title
        //'paged'           => $paged,
        'tax_query'         => array(
            'relation' => 'AND', // or 'relation' => 'OR' for OR relation between taxonomies
            array(
                'taxonomy'  => 'post_tag',
                'field'     => 'slug',
                'terms'     => $selectedTags,
            ),
            array(
                'taxonomy'  => 'category',
                'field'     => 'term_id',
                'terms'     => $category_id,
            ),
            // Add more taxonomy arrays as needed
        ),
    );

    $query = new WP_Query($args);


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

            // Display post content
            //$result = the_title('<h2>', '</h2>');
            echo '<div class="item col-item">
                    <div class="product-box">
                        <!-- Start Product Image -->
                        <div class="product-image">
                            <!-- Start Product Image -->
                            <a href="' . get_the_permalink() . '" class="product-img rounded-0">
                                <!-- Image -->
                                <img class="primary rounded-0 blur-up lazyload" data-src="' . $featured_image[0] . '" alt="Product" title="Product" width="625" height="808" />
                                <!-- End Image -->
                                <!-- Hover Image -->
                                <img class="hover rounded-0 blur-up lazyload" data-src="' . $featured_image[0] . '" src="' . $featured_image[0] . '" alt="Product" title="Product" width="625" height="808" />
                                <!-- End Hover Image -->
                            </a>
                            <!-- End Product Image -->
                        </div>
                        <!-- End Product Image -->
                        <!-- Start Product Details -->
                        <div class="product-details text-center">
                            <!--Product Vendor-->
                            <div class="product-vendor">';
            $post_id = get_the_ID();
            $tags = wp_get_post_tags($post_id);
            foreach ($tags as $tag) {
                echo $tag->name . ' ';
            }
            echo '</div>
                            <!--End Product Vendor-->
                            <!-- Product Name -->
                            <div class="product-name">
                                <a href="' . get_the_permalink() . '">' . get_the_title() . '</a>
                            </div>
                            <!-- End Product Name -->
                        </div>
                        <!-- End product details -->
                    </div>
                </div>';
        }


        // Restore global post data
        wp_reset_postdata();
    } else {
        // If no posts are found
        echo 'No products found.';
    }
} else if ($_POST['tags'] != "" && $_POST['cat_id'] == 0) {
    //echo "only Brands";

    $selectedTags = $_REQUEST['tags'];

    //$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    //echo $category_id;

    $args = array(
        //'cat' => 12,
        'post_type'         => array('products'),
        'posts_per_page'    => -1,
        'post_status'       => 'publish',
        'order'           => 'ASC',
        'orderby' => 'title',  // Sort by title
        //'paged' => $paged,
        'tax_query'  => array(
            array(
                'taxonomy'  => 'post_tag',
                'field'     => 'slug',
                'terms'     =>  $selectedTags,
            ),
        ),
    );



    $query = new WP_Query($args);


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

            // Display post content
            //$result = the_title('<h2>', '</h2>');
            echo '<div class="item col-item">
                    <div class="product-box">
                        <!-- Start Product Image -->
                        <div class="product-image">
                            <!-- Start Product Image -->
                            <a href="' . get_the_permalink() . '" class="product-img rounded-0">
                                <!-- Image -->
                                <img class="primary rounded-0 blur-up lazyload" data-src="' . $featured_image[0] . '" alt="Product" title="Product" width="625" height="808" />
                                <!-- End Image -->
                                <!-- Hover Image -->
                                <img class="hover rounded-0 blur-up lazyload" data-src="' . $featured_image[0] . '" src="' . $featured_image[0] . '" alt="Product" title="Product" width="625" height="808" />
                                <!-- End Hover Image -->
                            </a>
                            <!-- End Product Image -->
                        </div>
                        <!-- End Product Image -->
                        <!-- Start Product Details -->
                        <div class="product-details text-center">
                            <!--Product Vendor-->
                            <div class="product-vendor">';
            $post_id = get_the_ID();
            $tags = wp_get_post_tags($post_id);
            foreach ($tags as $tag) {
                echo $tag->name . ' ';
            }
            echo '</div>
                            <!--End Product Vendor-->
                            <!-- Product Name -->
                            <div class="product-name">
                                <a href="' . get_the_permalink() . '">' . get_the_title() . '</a>
                            </div>
                            <!-- End Product Name -->
                        </div>
                        <!-- End product details -->
                    </div>
                </div>';
        }


        // Restore global post data
        wp_reset_postdata();
    } else {
        // If no posts are found
        echo 'No products found.';
    }
} else if ($_POST['tags'] == "" && $_POST['cat_id'] > 0) {
    // echo "only Category";
    $category_id = $_REQUEST['cat_id'];

    $query = new WP_Query(array(
        'post_type'         => array('products'),
        'posts_per_page'    => -1,
        'post_status'       => 'publish',
        'orderby'           => 'DESC',
        'cat' => $category_id,
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

            // Display post content
            //$result = the_title('<h2>', '</h2>');
            echo '<div class="item col-item">
                    <div class="product-box">
                        <!-- Start Product Image -->
                        <div class="product-image">
                            <!-- Start Product Image -->
                            <a href="' . get_the_permalink() . '" class="product-img rounded-0">
                                <!-- Image -->
                                <img class="primary rounded-0 blur-up lazyload" data-src="' . $featured_image[0] . '" alt="Product" title="Product" width="625" height="808" />
                                <!-- End Image -->
                                <!-- Hover Image -->
                                <img class="hover rounded-0 blur-up lazyload" data-src="' . $featured_image[0] . '" src="' . $featured_image[0] . '" alt="Product" title="Product" width="625" height="808" />
                                <!-- End Hover Image -->
                            </a>
                            <!-- End Product Image -->
                        </div>
                        <!-- End Product Image -->
                        <!-- Start Product Details -->
                        <div class="product-details text-center">
                            <!--Product Vendor-->
                            <div class="product-vendor">';
            $post_id = get_the_ID();
            $tags = wp_get_post_tags($post_id);
            foreach ($tags as $tag) {
                //echo $tag->name . ' ';
            }
            echo '</div>
                            <!--End Product Vendor-->
                            <!-- Product Name -->
                            <div class="product-name">
                                <a href="' . get_the_permalink() . '">' . get_the_title() . '</a>
                            </div>
                            <!-- End Product Name -->
                            
                        </div>
                        <!-- End product details -->
                    </div>
                </div>';
        }


        // Restore global post data
        wp_reset_postdata();
    } else {
        // If no posts are found
        echo 'No posts found.';
    }
} else {
    // echo "All";
    $category_id = $_REQUEST['cat_id'];

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

            // Display post content
            //$result = the_title('<h2>', '</h2>');
            echo '<div class="item col-item">
                    <div class="product-box">
                        <!-- Start Product Image -->
                        <div class="product-image">
                            <!-- Start Product Image -->
                            <a href="' . get_the_permalink() . '" class="product-img rounded-0">
                                <!-- Image -->
                                <img class="primary rounded-0 blur-up lazyload" data-src="' . $featured_image[0] . '" alt="Product" title="Product" width="625" height="808" />
                                <!-- End Image -->
                                <!-- Hover Image -->
                                <img class="hover rounded-0 blur-up lazyload" data-src="' . $featured_image[0] . '" src="' . $featured_image[0] . '" alt="Product" title="Product" width="625" height="808" />
                                <!-- End Hover Image -->
                            </a>
                            <!-- End Product Image -->
                        </div>
                        <!-- End Product Image -->
                        <!-- Start Product Details -->
                        <div class="product-details text-center">
                            <!--Product Vendor-->
                            <div class="product-vendor">';
            $post_id = get_the_ID();
            $tags = wp_get_post_tags($post_id);
            foreach ($tags as $tag) {
                //echo $tag->name . ' ';
            }
            echo '</div>
                            <!--End Product Vendor-->
                            <!-- Product Name -->
                            <div class="product-name">
                                <a href="' . get_the_permalink() . '">' . get_the_title() . '</a>
                            </div>
                            <!-- End Product Name -->
                            
                        </div>
                        <!-- End product details -->
                    </div>
                </div>';
        }


        // Restore global post data
        wp_reset_postdata();
    } else {
        // If no posts are found
        echo 'No posts found.';
    }
}
