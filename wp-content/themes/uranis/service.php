<?php

/**
 * Template Name: Service */
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

    <div class="container">
        <div class="collection-masonary grid-mr-20">
            <div class="grid-masonary">
                <div class="grid-sizer col-12 col-sm-6 col-md-6 col-lg-4"></div>
                <div class="collection-style4 row m-0">
                    <?php
                    // $category_id = $_REQUEST['cat']; 
                    // Get the current page number
                    //$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

                    // Define the query arguments
                    $args = array(
                        // 'cat' => $category_id,
                        "post_type" => "service",
                        'posts_per_page' => -1, // Number of posts per page
                        "order" => "ASC",
                        'orderby' => 'title',  // Sort by title
                        //'paged' => $paged,
                    );

                    // Instantiate a new WP_Query
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
                            $content = get_the_content();
                            $trimmed_content = substr($content, 0, 100); // Trim the content to 10 characters
                            if (strlen($content) > 100) {
                                $trimmed_content .= '...'; // Append "..." if the content is longer than 10 characters
                            }
                            // Display post content as needed
                    ?>


                            <div class="category-item col-12 col-sm-6 col-md-6 col-lg-4 col-item zoomscal-hov masonary-item">

                                <div class="cate-image">
                                    <div class="cate-image__child">
                                        <?php if ($featured_image[0]) { ?>
                                            <img alt="img" class="img-fluid" src="<?php echo $featured_image[0]; ?>" />
                                        <?php } else { ?>
                                            <img alt="img" class="img-fluid" src="<?= get_template_directory_uri(); ?>/images/service.webp" />
                                        <?php } ?>
                                    </div>
                                    <div class="cate-image__text">
                                        <a href="<?php the_permalink(); ?>">
                                            <h3><?php the_title(); ?></h3>
                                            <span>View More</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                        // Restore global post data
                        wp_reset_postdata();
                    } else {
                        // Display a message if no posts are found
                        echo 'No Service found.';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>