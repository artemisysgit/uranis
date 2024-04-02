<?php

/**
 * Template Name: Collections */
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
                    $category_args = array(
                        'taxonomy' => 'category',
                        'post_type' => 'products',
                        'orderby' => 'name',
                        'order'   => 'ASC'
                    );
                    $category = get_categories($category_args);
                    foreach ($category as $category_list) {
                        // print_r($category_list);
                    ?>


                        <div class="category-item col-12 col-sm-6 col-md-6 col-lg-4 col-item zoomscal-hov masonary-item">

                            <div class="cate-image">
                                <div class="cate-image__child">
                                    <?php if (z_taxonomy_image_url($category_list->term_id) > 0) { ?>
                                        <img alt="img" class="img-fluid" src="<?php echo z_taxonomy_image_url($category_list->term_id); ?>" />
                                    <?php } else { ?>
                                        <img alt="img" class="img-fluid" src="<?= get_template_directory_uri(); ?>/images/Uranis_Product_Images.jpg" />
                                    <?php } ?>
                                </div>
                                <div class="cate-image__text">
                                    <a href="<?php echo site_url("/category/$category_list->slug"); ?>">
                                        <h3><?= $category_list->name; ?></h3>
                                        <span>View More</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php
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