<?php

/**
 * Template Name: Blog Details*/
get_header();

$thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'large'); // Change 'large' to the desired image size
// echo $thumbnail_url;
$next_post = get_next_post();
$prev_post = get_previous_post();

$terms = wp_get_post_terms($post->ID, 'blog-category');

?>

<?php
// Assuming this code is within the single post template file (e.g., single.php)

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming you have some code to handle form submission, e.g., saving the comment to the database
    // Retrieve form data
    $name = $_POST['contact']['name'];
    $email = $_POST['contact']['email'];
    $body = $_POST['contact']['body'];

    // Here you can do something with the submitted data, like saving it to the database
    // For example:
    $comment_data = array(
        'comment_post_ID' => get_the_ID(),
        'comment_author' => $name,
        'comment_author_email' => $email,
        'comment_content' => $body,
        'comment_type' => '',
        'comment_parent' => 0,
        'user_id' => get_current_user_id(),
        'comment_author_IP' => $_SERVER['REMOTE_ADDR'],
        'comment_agent' => $_SERVER['HTTP_USER_AGENT'],
        'comment_date' => current_time('mysql'),
        'comment_approved' => 1,
    );

    // Insert the comment into the database
    $comment_id = wp_insert_comment($comment_data);

    // Optionally, you can redirect the user after the comment is submitted
    // For example:
    wp_redirect(get_permalink());
    exit;
}
?>

<?php

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
                            <h1><?= the_title() ?></h1>
                        </div>
                        <!--Breadcrumbs-->
                        <div class="breadcrumbs"><a href="#" title="Back to the home page">Home</a><span class="title">
                                <i class="icon anm anm-angle-right-l"></i>Blog</span>
                            <span class="main-title fw-bold">
                                <i class="icon anm anm-angle-right-l"></i>
                                <?= the_title() ?>
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
                                        <li class="lvl-1 <?php if ($category_name == $cat_name) {
                                                                echo "active";
                                                            } ?>"><a href="<?php echo site_url("/blog-category/$cat_slug"); ?>" class="site-nav lvl-1"><?= $cat_name; ?> <span class="count">(<?= $post_count; ?>)</span></a></li>
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

                <!-- Blog Content-->
                <div class="col-12 col-sm-12 col-md-12 col-lg-9 main-col">
                    <div class="blog-article">
                        <div class="blog-img mb-3">
                            <img class="rounded-0 blur-up lazyload" data-src="<?= $thumbnail_url ?>" src="<?= $thumbnail_url ?>" alt="New shop collection our shop" width="1200" height="700" />
                        </div>
                        <!-- Blog Content -->
                        <div class="blog-content">
                            <h2 class="h1"><?= the_title() ?></h2>
                            <ul class="publish-detail d-flex-wrap">
                                <li><i class="icon anm anm-user-al"></i> <span class="opacity-75 me-1">Posted by:</span> <?=get_the_author(); ?></li>
                                <li><i class="icon anm anm-clock-r"></i> <time datetime="<?= get_the_date(); ?>"><?= get_the_date(); ?></time></li>
                                <li><i class="icon anm anm-comments-l"></i> <a href="#"><?= get_comments_number() ?> Comments</a></li>
                                <li><i class="icon anm anm-tag-r"></i><span class="opacity-75">Posted in</span>
                                    <?php
                                    $term_count = count($terms); // Get the total number of terms

                                    foreach ($terms as $index => $term) {
                                        $term_link = get_term_link($term);
                                        echo '<a href="' . $term_link . '" class="ms-1">' . $term->name . '</a>';

                                        // Print comma if it's not the last term
                                        if ($index < $term_count - 1) {
                                            echo ', ';
                                        }
                                    } ?>
                                </li>
                            </ul>
                            <hr />
                            <div class="content">
                                <?= the_content(); ?>
                            </div>
                            <hr />
                            <!-- <div class="row blog-action d-flex-center justify-content-between">
                                <ul class="col-lg-6 tags-list d-flex-center">
                                    <li class="item fw-600">Related Tags :</li>
                                    <li class="item"><a class="text-link" href="https://www.annimexweb.com/items/hema/blog-grid-sidebar.html">Fashion,</a></li>
                                    <li class="item"><a class="text-link" href="https://www.annimexweb.com/items/hema/blog-grid-sidebar.html">Shoes,</a></li>
                                    <li class="item"><a class="text-link" href="https://www.annimexweb.com/items/hema/blog-grid-sidebar.html">Accessories</a></li>
                                </ul>

                                <div class="col-lg-6 mt-2 mt-lg-0 social-sharing d-flex-center justify-content-lg-end">
                                    <span class="sharing-lbl fw-600">Share :</span>
                                    <a href="#" class="d-flex-center btn btn-link btn--share share-facebook" data-bs-toggle="tooltip" data-bs-placement="top" title="Share on Facebook"><i class="icon anm anm-facebook-f"></i><span class="share-title d-none">Facebook</span></a>
                                    <a href="#" class="d-flex-center btn btn-link btn--share share-facebook" data-bs-toggle="tooltip" data-bs-placement="top" title="Tweet on Twitter"><i class="icon anm anm-twitter"></i><span class="share-title d-none">Twitter</span></a>
                                    <a href="#" class="d-flex-center btn btn-link btn--share share-facebook" data-bs-toggle="tooltip" data-bs-placement="top" title="Pin on Pinterest"><i class="icon anm anm-pinterest-p"></i><span class="share-title d-none">Pinterest</span></a>
                                    <a href="#" class="d-flex-center btn btn-link btn--share share-facebook" data-bs-toggle="tooltip" data-bs-placement="top" title="Share on Instagram"><i class="icon anm anm-linkedin-in"></i><span class="share-title d-none">Instagram</span></a>
                                    <a href="#" class="d-flex-center btn btn-link btn--share share-facebook" data-bs-toggle="tooltip" data-bs-placement="top" title="Share by Email"><i class="icon anm anm-envelope-l"></i><span class="share-title d-none">Email</span></a>
                                </div>
                            </div> -->

                            <?php if ($next_post || $prev_post) { ?>
                                <!-- Blog Nav -->
                                <div class="blog-nav d-flex-center justify-content-between my-3">
                                    <?php if ($prev_post) { ?>
                                        <div class="nav-prev fs-14">
                                            <a href="<?php echo get_permalink($prev_post->ID) ?>">
                                                <i class="align-middle me-2 icon anm anm-angle-left-r"></i>
                                                <span class="align-middle">Previous post</span>
                                            </a>
                                        </div>
                                    <?php } ?>
                                    <?php if ($next_post) { ?>
                                        <div class="nav-next fs-14">
                                            <a href="<?php echo get_permalink($next_post->ID) ?>">
                                                <span class="align-middle">Next post</span>
                                                <i class="align-middle ms-2 icon anm anm-angle-right-r"></i>
                                            </a>
                                        </div>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                            <!-- End Blog Nav -->
                            <hr />

                            <!-- <div class="author-bio">
                                <div class="author-image d-flex">
                                    <a class="author-img" href="#"><img class="blur-up lazyload" data-src="assets/images/users/user-img3.jpg" src="https://www.annimexweb.com/items/hema/assets/images/users/user-img3.jpg" alt="author" width="200" height="200" /></a>
                                    <div class="author-info ms-4">
                                        <h4 class="mb-2">Jhon Arthur</h4>
                                        <p class="text-muted mb-2"><span class="postcount">234 posts</span><span class="postsince ms-2">Since 2023</span></p>
                                        <p class="author-des">Hi there, I am a Hema blogger sharing Multipurpose Template that will give you and your customers a smooth shopping experience which can be used for various kinds of stores such as fashion.</p>
                                    </div>
                                </div>
                            </div> -->

                            <!-- Blog Comments -->
                            <div class="blog-comment section">
                                <h2 class="mb-4">Comments (<?= get_comments_number() ?>)</h2>
                                <ol class="comments-list">
                                    <li class="comments-items">
                                        <?php
                                        $comments = get_comments(array(
                                            'post_id' => get_the_ID(), // Get comments for the current post
                                            'status' => 'approve', // Get only approved comments
                                        ));

                                        // Display comments
                                        if ($comments) {

                                            foreach ($comments as $comment) {
                                        ?>
                                                <div class="comments-item d-flex w-100">
                                                    <!-- <div class="flex-shrink-0 comment-img"><img class="blur-up lazyload" data-src="assets/images/users/user-img1.jpg" src="https://www.annimexweb.com/items/hema/assets/images/users/user-img1.jpg" alt="comment" width="200" height="200" /></div> -->
                                                    <div class="flex-grow-1 comment-content">
                                                        <div class="comment-user d-flex-center justify-content-between">
                                                            <div class="comment-author fw-600"><?= esc_html($comment->comment_author) ?></div>
                                                            <div class="comment-date opacity-75"><time datetime="<?=get_comment_date('F j, Y', $comment->comment_ID)?>"><?=get_comment_date('F j, Y', $comment->comment_ID)?></time></div>
                                                        </div>
                                                        <div class="comment-text my-2"><?= wpautop($comment->comment_content) ?></div>
                                                        <!-- <div class="comment-reply"><button type="button" class="text-link text-decoration-none"><i class="icon anm anm-reply me-2"></i>Reply</button></div> -->
                                                    </div>
                                                </div>
                                        <?php

                                            }
                                        } else {
                                            echo '<p>No comments yet.</p>';
                                        }
                                        ?>


                                    </li>
                                </ol>
                            </div>
                            <!-- End Blog Comments -->
                            <!-- Blog Comments Form -->
                            <div class="formFeilds comment-form form-vertical">
                                <form method="post" action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>">
                                    <h2 class="mb-3">Leave a Comment</h2>
                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                            <div class="form-group">
                                                <label for="commentName" class="d-none">Name</label>
                                                <input type="text" id="commentName" name="contact[name]" placeholder="Name" value="<?php echo isset($_POST['contact']['name']) ? esc_attr($_POST['contact']['name']) : ''; ?>" required />
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                            <div class="form-group">
                                                <label for="commentEmail" class="d-none">Email</label>
                                                <input type="email" id="commentEmail" name="contact[email]" placeholder="Email" value="<?php echo isset($_POST['contact']['email']) ? esc_attr($_POST['contact']['email']) : ''; ?>" required />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="form-group">
                                                <label for="commentMessage" class="d-none">Message</label>
                                                <textarea rows="5" id="commentMessage" name="contact[body]" placeholder="Write Comment" required><?php echo isset($_POST['contact']['body']) ? esc_textarea($_POST['contact']['body']) : ''; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                            <input type="submit" class="btn btn-lg" value="Post comment">
                                        </div>
                                    </div>
                                </form>
                                <?php //comment_form(); 
                                ?>
                            </div>
                            <!-- End Blog Comments Form -->
                        </div>
                        <!-- End Blog Content -->
                    </div>
                </div>
                <!--End Blog Content-->
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