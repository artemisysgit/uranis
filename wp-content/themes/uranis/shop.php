<?php
//Template Name: Shop
get_header();
$category_name = urldecode($_REQUEST['cat']);
$category_id = get_cat_ID($category_name);

// Get category information by name
$category = get_term_by('name', $category_name, 'category');

// Get category meta data
$cat_heading = get_term_meta($category_id, 'products_category_heading', true);

// echo $cat_heading;

// Check if the category is found
if ($category) {
    $category_slug = $category->slug;
} else {
}


?>

<input type="hidden" value="<?php echo $category_id; ?>" class='cat_ID'>

<!-- Body Container -->
<div id="page-content">
    <!--Page Header-->
    <div class="page-header text-center phc">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center ">
                    <div class="page-title">
                        <h1><?php if ($category_name == "") { ?>
                                ALL PRODUCTS
                            <?php } else {

                                if ($cat_heading == "") {
                                    //echo "here";
                                    echo $category_name;
                                } else {
                                    //echo "there";
                                    echo $cat_heading;
                                }
                            } ?>

                        </h1>
                    </div>
                    <!--Breadcrumbs-->
                    <div class="breadcrumbs"><a href="<?= bloginfo('url'); ?>" title="Back to the home page">Home</a><span class="title"><span class="main-title"><i class="icon anm anm-angle-right-l"></i><a href="<?= site_url('/product/'); ?>" title="Back to the shop page">Products</a></span><span class="main-title"><?php if ($category_name != "") { ?><i class="icon anm anm-angle-right-l"></i><?php } ?><?= $category_name ?></span></div>
                    <!-- <i class="icon anm anm-angle-right-l"></i>Shop</span> -->
                    <!--End Breadcrumbs-->
                </div>
            </div>
        </div>
    </div>
    <!--End Page Header-->

    <!--Main Content-->
    <div class="container" id="result1">
        <!--Category Slider-->
        <div class="collection-slider-6items gp10 slick-arrow-dots sub-collection section pt-0">
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
                <div class="category-item zoomscal-hov">
                    <a href="<?php echo site_url("/category/$category_list->slug"); ?>" class="category-link clr-none">
                        <div class="zoom-scal zoom-scal-nopb rounded-0">

                            <?php if (z_taxonomy_image_url($category_list->term_id) > 0) { ?>
                                <img class="rounded-0 blur-up lazyload" data-src="<?php echo z_taxonomy_image_url($category_list->term_id); ?>" src="<?php echo z_taxonomy_image_url($category_list->term_id); ?>" alt="Men's" title="Men's" width="365" height="365" />
                            <?php } else { ?>
                                <img alt="img" class="img-fluid" src="<?= get_template_directory_uri(); ?>/images/Uranis_Product_Images.jpg" />
                            <?php } ?>
                        </div>
                        <div class="details text-center">
                            <h4 class="category-title mb-0"><?php echo $category_list->name; ?></h4>
                            <!-- <p class="counts">20 Items</p> -->
                        </div>
                    </a>
                </div>
            <?php } ?>

        </div>
        <!--End Category Slider-->

        <!-- Example tags -->
        <div class="tag" id="brand_tags"></div>

        <div class="row">
            <!--Sidebar-->
            <div class="col-12 col-sm-12 col-md-12 col-lg-3 sidebar sidebar-bg filterbar">
                <div class="closeFilter d-block d-lg-none"><i class="icon anm anm-times-r"></i></div>
                <!--<div class="sidebar-tags sidebar-sticky clearfix">-->
                <div class="sidebar-tags clearfix">

                    <div class="sidebar-widget clearfix categories filterBox filter-widget">
                        <div class="widget-title active">
                            <h2>Categories</h2>
                        </div>
                        <div class="widget-content filterDD" style="display: none;">
                            <ul class="sidebar-categories scrollspy morelist clearfix">


                                <?php

                                $category_args = [
                                    "taxonomy" => "category",
                                    "post_type" => "products",
                                    "orderby" => "name",
                                    "order" => "ASC",
                                ];
                                $category = get_categories($category_args);
                                foreach ($category as $category_list) {
                                    $post_count = get_category($category_list->term_id)->count;
                                    $cat_name = sanitize_text_field($category_list->name);
                                    $cat_slug = sanitize_text_field($category_list->slug);
                                ?>
                                    <li class="lvl1 <?php if ($category_name == $cat_name) {
                                                        echo "active";
                                                    } ?>"><a <?php if ($category_name == $cat_name) {
                                                                    echo "style='color:#3579F4;'";
                                                                } ?> href="<?php echo site_url("/category/$cat_slug"); ?>" class="site-nav"><?php echo strtoupper($category_list->name); ?> <span class="count">(<?php echo $post_count ?>)</span></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>

                    <!--End Size Swatches-->
                    <!--Product Brands-->
                    <div class="sidebar-widget filterBox filter-widget brand-filter">
                        <div class="widget-title active" id="brand_filter_title">
                            <h2>Brands</h2>
                        </div>
                        <div class="widget-content filterDD" style="display: none;" id="brand_filter">
                            <ul class="clearfix">
                                <?php
                                $args = [
                                    "post_type" => "products",
                                    "post_status" => "publish",
                                    "posts_per_page" => -1,
                                    "orderby" => "title",
                                    "order" => "ASC",
                                ];
                                $articles_query = new WP_Query($args);

                                if ($articles_query->have_posts()) {
                                    // $tag_names_array = array(); // Array to store tag names
                                    $tag_slug_array = array(); // Array to store tag names

                                    while ($articles_query->have_posts()) {
                                        $articles_query->the_post();
                                        setup_postdata($articles_query->post);

                                        $post_id = get_the_ID();
                                        $tags = wp_get_post_tags($post_id);

                                        foreach ($tags as $tag) {

                                            // $tag_names_array[] = $tag->name; // Store tag names in the array
                                            $tag_slug_array[] = $tag->slug; // Store tag slugs in the array
                                        }
                                ?>

                                    <?php
                                    }

                                    wp_reset_postdata();

                                    // Print unique tag names
                                    // $unique_tag_names = array_unique($tag_names_array);
                                    $unique_slug_names = array_unique($tag_slug_array);
                                    sort($unique_slug_names);
                                    foreach ($unique_slug_names as $tag_slug) {
                                    ?>
                                        <li>
                                            <?php // print_r($unique_slug_names);
                                            ?>
                                            <input type="checkbox" value="<?php echo $tag_slug ?>" name="tags[]" class="cbx" id="<?php echo $tag_slug ?>">
                                            <span style="text-transform: capitalize;">
                                                <?php echo str_replace('-', ' ', ucwords(strtoupper($tag_slug))); ?>
                                            </span>
                                            <?php //echo $tag_slug; 
                                            ?>
                                        </li>
                                <?php

                                    }
                                } else {
                                    echo "No result found";
                                }
                                ?>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
            <!--End Sidebar-->

            <!--Products-->
            <div class="col-12 col-sm-12 col-md-12 col-lg-9 main-col">
                <!--Toolbar-->
                <div class="toolbar toolbar-wrapper shop-toolbar">
                    <div class="row align-items-center">
                        <div class="col-4 col-sm-2 col-md-4 col-lg-4 text-left filters-toolbar-item d-flex order-1 order-sm-0">
                            <button type="button" class="btn btn-filter icon anm anm-sliders-hr d-inline-flex d-lg-none me-2"><span class="d-none">Filter</span></button>
                        </div>
                    </div>
                </div>
                <!--End Toolbar-->

                <!--Product Grid-->
                <div class="grid-products grid-view-items">

                    <div class="row col-row product-options row-cols-lg-4 row-cols-md-3 row-cols-sm-3 row-cols-2 ccc" id="result">


                        <?php
                        // $category_id = $_REQUEST['cat']; 
                        // Get the current page number
                        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

                        // Define the query arguments
                        $args = array(
                            'cat' => $category_id,
                            "post_type" => "products",
                            'posts_per_page' => 21, // Number of posts per page
                            "order" => "ASC",
                            'orderby' => 'title',  // Sort by title
                            'paged' => $paged,
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

                                <div class="item col-item">
                                    <div class="product-box">
                                        <!-- Start Product Image -->
                                        <div class="product-image">
                                            <!-- Start Product Image -->
                                            <a href="<?php the_permalink(); ?>" class="product-img rounded-0">
                                                <!-- Image -->
                                                <img class="primary rounded-0 blur-up lazyload" data-src="<?php echo $featured_image[0]; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" width="625" height="808" />
                                                <!-- End Image -->
                                                <!-- Hover Image -->
                                                <img class="hover rounded-0 blur-up lazyload" data-src="<?php echo $featured_image[0]; ?>" src="<?php echo $featured_image[0]; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" width="625" height="808" />
                                                <!-- End Hover Image -->
                                            </a>
                                            <!-- End Product Image -->
                                        </div>
                                        <!-- End Product Image -->
                                        <!-- Start Product Details -->
                                        <div class="product-details text-center">
                                            <!--Product Vendor-->
                                            <!--div class="product-vendor">
                                                        <?php
                                                        $post_id = get_the_ID();
                                                        $tags = wp_get_post_tags($post_id);
                                                        foreach ($tags as $tag) {
                                                            echo $tag->name . ' ';
                                                        }
                                                        ?>
                                                        </div-->
                                            <!--End Product Vendor-->
                                            <!-- Product Name -->
                                            <div class="product-name">
                                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                            </div>
                                        </div>
                                        <!-- End product details -->
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
                            echo 'No Product found.';
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
                <!--End Product Grid-->
            </div>
            <!--End Products-->
        </div>
    </div>
    <!--End Main Content-->
</div>
<!-- End Body Container -->

<script>
    $(document).ready(function() {
        // Array to store selected checkbox values

        var values = [];

        var cat_id = $('.cat_ID').val();
        // console.log(cat_id);

        $(".cbx").click(function() {
            values = [];
            $(".cbx").each(function() {
                if ($(this).is(":checked"))
                    values.push($(this).val());
            });
            // alert(values);
            var tags_html = '';
            $.each(values, function(index, value) {
                var modified_tag = value.replace(/-/g, ' ').toUpperCase().replace(/(?:^|\s)\S/g, function(a) {
                    return a.toUpperCase();
                });

                tags_html += '<div class="newtags">' + modified_tag + '<a href="javascript:void(0)" id="' + modified_tag + '" class="tag-link" onclick="handleClick(\'' + value + '\')">x</a></div>';

            });



            $('#brand_tags').html(tags_html);


            // Send the values array to the PHP page via AJAX
            $.ajax({
                type: 'POST',
                url: '<?php echo get_template_directory_uri(); ?>/process.php',
                data: {
                    tags: values,
                    cat_id: cat_id
                },
                success: function(response) {
                    console.log('nearby');
                    // Display the response in the result div
                    $('#result').html(response);
                    if (values.length === 0) {
                        //$('.pagination-bottom').css('display', 'block');
                    } else {
                        // If tags are not empty, show pagination
                        $('.pagination-bottom').css('display', 'none');
                    }
                    // console.log(response);
                    window.scrollTo(0, $('#result1').offset().top),
                        $('#brand_filter').css('display', 'none');
                    $('#brand_filter_title').addClass('active');
                }
            });
        });
    });
</script>

<script>
    // Function to handle the click event
    function handleClick(value) {

        var values = [];
        $(".cbx").each(function() {
            if ($(this).is(":checked"))
                values.push($(this).val());
        });

        if (values.includes(value)) {
            // alert(value + " is checked. Unchecking now.");

            // Uncheck the corresponding checkbox
            $("#" + value).trigger("click");
            //alert('ok');
        } else {
            // alert(value + " is not checked.");
            //$('.pagination-bottom').css('display', 'none');
        }
    }


    // jQuery code to handle click events on the links with class 'tag-link'
    $(document).ready(function() {
        $(".tag-link").on("click", function() {
            // Get the text content of the clicked link
            var tagValue = $(this).text();

            // Call the function and pass the value
            handleClick(tagValue);
        });
    });
</script>

<?php
get_footer();
?>