<?php
/**
 * Template Name: Blog Category*/
get_header();

$category_name = single_cat_title('', false);

$term = get_queried_object(); // Get the current term object
$category_id = $term->term_id; // Get the term ID

//echo $category_id;

// Get category meta data
$cat_heading = get_term_meta($category_id, 'products_category_heading', true);



// Get category information by name
$category = get_term_by('name', $category_name, 'category');
// Check if the category is found
if ($category) {
    $category_slug = $category->slug;
} else {
}
?>

<!--Page Wrapper-->
<div class="page-wrapper">

    <!-- Body Container -->
    <div id="page-content">
        <!--Page Header-->
        <div class="page-header text-center">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 d-flex justify-content-between align-items-center">
                        <div class="page-title">
                            <h1><?=$category_name ?></h1>
                        </div>
                        <!--Breadcrumbs-->
                        <div class="breadcrumbs"><a href="#" title="Back to the home page">Home</a><span class="title">
                                <i class="icon anm anm-angle-right-l"></i>Blog</span>
                            <span class="main-title fw-bold">
                                <i class="icon anm anm-angle-right-l"></i>
                                <?=$category_name ?>
                            </span>
                        </div>
                        <!--End Breadcrumbs-->
                    </div>
                </div>
            </div>
        </div>
        <!--End Page Header-->

        <!--Main Content-->
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-3 blog-sidebar sidebar sidebar-bg">
                    <!--Sidebar-->
                    <div class="sidebar-tags sidebar-sticky clearfix">
                        <!--Category-->
                        <div class="sidebar-widget clearfix categories">
                            <div class="widget-title">
                                <h2>Category</h2>
                            </div>
                            <div class="widget-content">
                                <ul class="sidebar-categories scrollspy clearfix">
                                    <?php

                                    $category_args = [
                                        "taxonomy" => "blog-category",
                                        "post_type" => "blog",
                                        "orderby" => "name",
                                        "order" => "ASC",
                                    ];
                                    $category = get_categories($category_args);
                                    foreach ($category as $category_list) {
                                        //print_r($category_list);
                                        $post_count = $category_list->count;
                                        $cat_name = sanitize_text_field($category_list->name);
                                        $cat_slug = sanitize_text_field($category_list->slug);
                                    ?>
                                        <li class="lvl-1 <?php if($category_name == $cat_name){ echo "active";} ?>"><a href="<?php echo site_url("/blog-category/$cat_slug"); ?>" class="site-nav lvl-1"><?= $cat_name; ?> <span class="count">(<?= $post_count; ?>)</span></a></li>
                                    <?php } ?>

                                </ul>
                            </div>
                        </div>
                        <!--End Category-->
                        <!--Archive-->

                        <!--End Archive-->
                        <!--Recent Posts-->
                        <div class="sidebar-widget clearfix">
                            <div class="widget-title">
                                <h2>Recent Posts</h2>
                            </div>
                            <div class="widget-content">
                                <div class="list list-sidebar-products">
                                    <?php


                                    // Define the query arguments
                                    $args = array(
                                        //'cat' => $category_id,
                                        "post_type" => "blog",
                                        'posts_per_page' => 3, // Number of posts per page
                                        "order" => "DESC",
                                        'orderby' => 'date',  // Sort by date                                        
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
                                            // Display post content as needed
                                    ?>
                                            <div class="mini-list-item d-flex align-items-center w-100 clearfix">
                                                <div class="mini-image"><a class="item-link" href="<?php the_permalink(); ?>">
                                                        <img class="featured-image blur-up lazyload" data-src="<?php echo $featured_image[0]; ?>" src="<?php echo $featured_image[0]; ?>" alt="blog" width="100" height="100" />
                                                    </a>
                                                </div>
                                                <div class="ms-3 details">
                                                    <a class="item-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                    <div class="item-meta opacity-75"><time datetime="<?= get_the_date(); ?>"><?= get_the_date(); ?></time></div>
                                                </div>
                                            </div>

                                    <?php
                                        }
                                        // Restore global post data
                                        wp_reset_postdata();
                                    } else {
                                        // Display a message if no posts are found
                                        echo 'No Blogs found.';
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>
                        <!--End Recent Posts-->
                        <!--Popular Tags-->

                        <!--End Popular Tags-->
                    </div>
                    <!--End Sidebar-->
                </div>

                <div class="col-12 col-sm-12 col-md-12 col-lg-9 main-col main_blog_details">
                    <!--Toolbar-->
                    <!-- <div class="toolbar toolbar-wrapper blog-toolbar">
                        <div class="row align-items-center">
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 text-left filters-toolbar-item d-flex justify-content-center justify-content-sm-start">
                                <div class="search-form mb-3 mb-sm-0">
                                    <form class="d-flex" action="#">
                                        <input class="search-input" type="text" placeholder="Blog search...">
                                        <button type="submit" class="search-btn"><i class="icon anm anm-search-l"></i></button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 text-right filters-toolbar-item d-flex justify-content-between justify-content-sm-end">
                                <div class="filters-item d-flex align-items-center">
                                    <label for="ShowBy" class="mb-0 me-2">Show:</label>
                                    <select name="ShowBy" id="ShowBy" class="filters-toolbar-sort">
                                        <option value="title-ascending" selected="selected">10</option>
                                        <option>15</option>
                                        <option>20</option>
                                        <option>25</option>
                                        <option>30</option>
                                    </select>
                                </div>
                                <div class="filters-item d-flex align-items-center ms-3">
                                    <label for="SortBy" class="mb-0 me-2">Sort:</label>
                                    <select name="SortBy" id="SortBy" class="filters-toolbar-sort">
                                        <option value="title-ascending" selected="selected">Featured</option>
                                        <option>Newest</option>
                                        <option>Most comments</option>
                                        <option>Release Date</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <!--End Toolbar-->

                    <!--Blog Grid-->
                    <div class="blog-grid-view">
                        <div class="row col-row row-cols-lg-2 row-cols-sm-2 row-cols-1">

                            <?php
                            // $category_id = $_REQUEST['cat']; 
                            // Get the current page number
                            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

                            // Define the query arguments
                            $args = array(
                                // 'cat' => $category_id,
                                "post_type" => "blog",
                                'posts_per_page' => 6, // Number of posts per page
                                "order" => "ASC",
                                'orderby' => 'title',  // Sort by title
                                'paged' => $paged,
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'blog-category', // Replace 'your_custom_taxonomy' with your actual custom taxonomy slug
                                        'field'    => 'term_id',
                                        'terms'    => $category_id,
                                    ),
                                ),
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
                                    <div class="blog-item col-item">
                                        <div class="blog-article zoomscal-hov">
                                            <div class="blog-img">
                                                <a class="featured-image rounded-0 zoom-scal" href="<?php the_permalink(); ?>"><img class="rounded-0 blur-up lazyload" data-src="<?php echo $featured_image[0]; ?>" src="<?php echo $featured_image[0]; ?>" alt="<?php the_title(); ?>" width="740" height="410" /></a>
                                            </div>
                                            <div class="blog-content">
                                                <h2 class="h3"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                                <ul class="publish-detail d-flex-wrap">
                                                    <li><i class="icon anm anm-user-al"></i> <span class="opacity-75 me-1">Posted by:</span> <?php the_author(); ?></li>
                                                    <li><i class="icon anm anm-clock-r"></i> <time datetime="<?= get_the_date(); ?>"><?php echo get_the_date(); ?></time></li>
                                                    <li><i class="icon anm anm-comments-l"></i> <a href="#"><?= get_comments_number() ?> Comments</a></li>
                                                </ul>
                                                <p class="content"><?php echo $trimmed_content; ?></p>
                                                <a href="<?php the_permalink(); ?>" class="btn btn-secondary btn-sm">Read more</a>
                                            </div>
                                        </div>
                                    </div>

                                <?php
                                }

                                $pagination_links = paginate_links(array(
                                    'total' => $query->max_num_pages,
                                    'current' => max(1, $paged),
                                    'prev_text' => '<i class="icon anm anm-icon anm-angle-left-l"></i>',
                                    'next_text' => '<i class="icon anm anm-icon anm-angle-right-l"></i>',
                                    'type' => 'array', // Get the links as an array for custom styling
                                ));


                                ?>

                            <?php
                                // Restore global post data
                                wp_reset_postdata();
                            } else {
                                // Display a message if no posts are found
                                echo 'No Blog found.';
                            }
                            ?>

                        </div>

                        <?php
                        

                        if (!empty($pagination_links)) {
                            echo '<nav class="clearfix pagination-bottom">';
                            echo '<ul class="pagination justify-content-center">';
                            foreach ($pagination_links as $link) {
                                // Add custom classes to pagination items
                                $class = 'page-item';

                                // Check if the link contains "prev" or "next"
                                if (strpos($link, 'prev') !== false || strpos($link, 'next') !== false) {
                                    $class .= ' active';
                                } elseif (strpos($link, 'current') !== false) {
                                    $class .= ' active';
                                }

                                // Output the modified link
                                echo '<li class="' . esc_attr($class) . '">' . str_replace('page-numbers', 'page-link', $link) . '</li>';
                            }
                            echo '</ul>';
                            echo '</nav>';
                        }
                        ?>


                    </div>

                    <!--End Blog Grid-->
                </div>
            </div>
        </div>
        <!--End Main Content-->
    </div>
    <!-- End Body Container -->

</div>
<!--End Page Wrapper-->

<?php
get_footer();
?>