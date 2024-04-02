<?php

/*** Template Name: Service Details*/
get_header();

$product_heading = get_field('product_heading');
$title = get_the_title();
$thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'large'); // Change 'large' to the desired image size
?>

<div class="container">
    <div class="row">

        <div class="col-lg-9">

            <div class="serv-big">

                <div class="serv-title">
                    <h1><?= $title ?></h1>
                </div>

                <?php the_content(); ?>

                <div class="serv-sec serv-sec9">
                    <div class="apply-box">
                        <div class="apply-box-details">
                            <h3 class="addi">
                                <?php echo the_field('additional_information'); ?>
                            </h3>
                            <a href="javascript:void(0)" id="myInput" class="btn btn-secondary">Contact Us</a>
                        </div>
                    </div>
                    <h3 class="h3-faq">Frequently Asked Questions</h3>
                    <div class="accordion" id="accordionExample">

                        <?php
                        $count = 1;
                        // Check rows exists.
                        if (have_rows('faq')) :

                            // Loop through rows.
                            while (have_rows('faq')) : the_row();

                                // Load sub field value.
                                $qns = get_sub_field('question');
                                $ans = get_sub_field('answer');
                                // Do something, but make sure you escape the value if outputting directly...
                        ?>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading<?= $count ?>">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $count ?>" aria-expanded="true" aria-controls="collapse<?= $count ?>">
                                            <?php echo $qns; ?>
                                        </button>
                                    </h2>
                                    <div id="collapse<?= $count ?>" class="accordion-collapse collapse <?php if ($count == 1) {
                                                                                                            echo "show";
                                                                                                        } ?>" aria-labelledby="heading<?= $count ?>" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <?php echo $ans; ?>
                                        </div>
                                    </div>
                                </div>

                        <?php

                                // End loop.
                                $count++;
                            endwhile;

                        // No value.
                        else :
                        // Do something...
                        endif;
                        ?>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="serv-small  pt-5">
                <div class="serv-small-img "><img src="<?php echo $thumbnail_url ?>" alt=""></div>
                <div class="serv-small-form" id="contact-sec-product">
                    <h3>Let's Connect.</h3>
                    <!-- <form action="">
                        <input type="text" placeholder="Full name..." id="fname">
                        <input type="text" placeholder="Email...">
                        <input type="text" placeholder="Phone no...">
                        <input type="text" placeholder="Services...">
                        <textarea name="" id="" placeholder="Type your message"></textarea>
                        <button type="submit">Submit</button>
                    </form> -->
                    <?php echo do_shortcode('[forminator_form id="1078"]'); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
?>