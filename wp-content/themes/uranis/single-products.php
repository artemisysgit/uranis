<?php
get_header();

$product_heading = get_field('product_heading');
$title = get_the_title();
?>


<div id="page-content">
    <div class="page-header text-center phc">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center ">
                    <div class="page-title">
                        <h1><?php if ($product_heading == "") {
                                //echo "here";
                                echo $title;
                            } else {
                                //echo "there";
                                echo $product_heading;
                            } ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="product-single">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12 col-12 product-layout-img mb-4 mb-md-0">
                    <div class="product-details-img product-two-gallery position-relative">
                        <div class="row g-3">
                            <?php
                            $product_gallery = get_field('product_gallery');
                            if ($product_gallery) :
                                foreach ($product_gallery as $single_image) {
                                    $image_url = $single_image['url'];
                                    $image_alt = $single_image['alt'];
                            ?>
                                    <div class="col-lg-6 col-md-6 col-6">
                                        <div class="zoompro-wrap">
                                            <div class="zoompro-span">
                                                <img class="zoompro rounded-0" src="<?= $image_url; ?>" data-zoom-image="<?= $image_url; ?>" alt="<?= the_title(); ?>" width="625" height="808" />
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                }
                            endif;
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12 col-12 product-layout-info">
                    <div class="product-sticky-style">
                        <div class="product-single-meta">
                            <h2 class="product-main-title"><?= the_title(); ?></h2>
                            <div class="product-main-subtitle">
                                <?php
                                foreach ((get_the_category()) as $category) {
                                    echo 'Category - ' . $category->cat_name;
                                }
                                ?>
                            </div>
                            <?php
                            if (have_rows('product_description_group')) :
                                while (have_rows('product_description_group')) : the_row();
                                    $vendor_name = get_sub_field('vendor_name');
                                    $product_type_monitor_motherboard_etc = get_sub_field('product_type_monitor_motherboard_etc');
                            ?>
                                    <ul class="listing-details">
                                        <?php
                                        if (have_rows('product_description_listing')) :
                                            while (have_rows('product_description_listing')) : the_row();
                                                $product_listing_description_one_liner = get_sub_field('product_listing_description_one_liner');
                                        ?>
                                                <li><?= $product_listing_description_one_liner; ?></li>
                                        <?php
                                            endwhile;
                                        else :
                                            the_content();
                                        endif;
                                        ?>
                                    </ul>
                                    <!-- <hr> -->
                                    <!-- <div class="product-info">
                                        <p class="product-vendor">Vendor:<span class="text"><a> <? //=$vendor_name; 
                                                                                                ?></a></span></p>
                                        <p class="product-type">Product Type:<span class="text"><? //s=$product_type_monitor_motherboard_etc; 
                                                                                                ?></span></p>
                                    </div> -->
                            <?php
                                endwhile;

                            endif;
                            ?>
                            <p class="top-margin-20">
                                <a href="#productInquiry-modal" class="emaillink me-0 custom-css-button" data-bs-toggle="modal" data-bs-target="#productInquiry_modal">enquiry now</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tabs-listing section pb-0">
            <ul class="product-tabs style2 list-unstyled d-flex-wrap d-none d-md-flex justify-content-center  ">
                <!--<li rel="description" class="active"><a class="tablink">Description</a></li>-->
                <li rel="additionalInformation"><a class="tablink">Description</a></li>
                <?php if (get_field('highlights')) : ?>
                    <li rel="highlights"><a class="tablink">Highlights</a></li>
                <?php endif; ?>
                <!--<li rel="size-chart"><a class="tablink">Size Chart</a></li>-->
                <li rel="shipping-return"><a class="tablink">Shipping &amp; Return</a></li>
                <!-- <li rel="reviews"><a class="tablink">Reviews</a></li> -->
                <?php if (get_field('why_choose_us')) : ?>
                    <li rel="why-choose"><a class="tablink">Why Uranis ?</a></li>
                <?php endif; ?>
                <?php if (get_field('how_to_order')) : ?>
                    <li rel="how-to-order"><a class="tablink">How To Order ?</a></li>
                <?php endif; ?>
                <?php if (get_field('faq')) : ?>
                    <li rel="faq"><a class="tablink">FAQ</a></li>
                <?php endif; ?>

            </ul>

            <div class="tab-container">
                <h3 class="tabs-ac-style rounded-5 d-md-none active" rel="additionalInformation">Description</h3>
                <div id="additionalInformation" class="tab-content">
                    <div class="product-description">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 mb-4 mb-md-0">
                                <div class="table-responsive">
                                    <?php
                                    $additional_information = get_field('additional_information');
                                    if ($additional_information) :
                                        echo $additional_information;
                                    endif;
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <h3 class="tabs-ac-style rounded-5 d-md-none" rel="highlights">Highlights</h3>
                <div id="highlights" class="tab-content">

                    <?php
                    $highlights = get_field('highlights');
                    if ($highlights) :
                        echo $highlights;
                    endif;
                    ?>
                </div>
                
                
                <h3 class="tabs-ac-style rounded-5 d-md-none" rel="shipping-return">Shipping &amp; Return</h3>
                <div id="shipping-return" class="tab-content">
                    <?php
                    $shipping_return = get_field('shipping_return');
                    if ($shipping_return) :
                        echo $shipping_return;
                    endif;
                    ?>
                </div>
                <h3 class="tabs-ac-style rounded-5 d-md-none" rel="why-choose">Why Uranis</h3>
                <div id="why-choose" class="tab-content">

                    <?php
                    $why_choose = get_field('why_choose_us');
                    if ($why_choose) :
                        echo $why_choose;
                    endif;
                    ?>
                </div>
                <h3 class="tabs-ac-style rounded-5 d-md-none" rel="how-to-order">How To Order</h3>
                <div id="how-to-order" class="tab-content">

                    <?php
                    $how_to_order = get_field('how_to_order');
                    if ($how_to_order) :
                        echo $how_to_order;
                    endif;
                    ?>
                </div>
                <h3 class="tabs-ac-style rounded-5 d-md-none" rel="faq">FAQ</h3>
                <div id="faq" class="tab-content">

                    <?php
                    $faq = get_field('faq');
                    if ($faq) :
                        echo $faq;
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="productInquiry-modal modal fade" id="productInquiry_modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div id="productInquiry" class="productInquiry-wrap">
                    <div class="page-title">
                        <h3 class="mb-3">Register to Get a Free Quotation</h3>
                    </div>
                    <?= do_shortcode('[forminator_form id="555"]'); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>