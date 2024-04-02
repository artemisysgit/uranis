<?php
get_header();
// ob_start(); // Start output buffering
// the_content(); // Output the content
// $content = get(); // Get the buffered content and stop output buffering

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

    <div class="destination-section section pt-0">
        <div class="container">
            <div class="row">
               
                <div class="col-12 col-sm-12 col-md-12">
                    <div class="about-details px-50">
                       
                        <?php echo apply_filters('category_archive_meta',  wpautop(get_the_content())); ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>