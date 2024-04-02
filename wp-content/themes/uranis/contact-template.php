<?php
/**
 * Template Name: Contact Us */
get_header();
?>
<div id="page-content">
    <div class="page-header text-center phc">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center ">
                    <div class="page-title"><h1><?=the_title();?></h1></div>
                </div>
            </div>
        </div>
    </div>

    <div class="container contact-style1">
        <div class="contact-form-details section pt-0">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-8 col-lg-8">
                    <div class="formFeilds contact-form form-vertical mb-4 mb-md-0">
                        <?php
                        $form_header_caption = get_field('form_header_caption');
                        if($form_header_caption):
                        ?>
                        <div class="section-header section-headercon">
                            <h2><?=$form_header_caption['contact_title'];?></h2>
                            <p><?=$form_header_caption['contact_caption'];?></p>
                        </div>
                        <?php
                        endif;
                        ?>
                        <?=do_shortcode('[forminator_form id="550"]')?>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="contact-details bg-block">
                        <h3 class="mb-3 fs-5">Headquarters Info</h3>
                        <ul class="list-unstyled">
                            <li class="mb-2 address">
                                <strong>Address :</strong> <?=get_option('dip_address');?>
                            </li>
                            <li class="mb-2 phone"><strong>Phone :</strong><i class="icon anm anm-phone me-2 d-none"></i> <a href="tel:<?=get_option('dip_ph_no');?>"><?=get_option('dip_ph_no');?></a></li>
                            <li class="mb-2 phone"><strong>WhatsApp :</strong><i class="icon anm anm-phone me-2 d-none"></i> <a href="https://web.whatsapp.com/send?text=Hello&phone=<?=get_option('dip_whatsapp');?>"><?=get_option('dip_whatsapp');?></a></li>
                            <li class="mb-2 email"><strong>Email :</strong><i class="icon anm anm-envelope-l me-2 d-none"></i> <a href="mailto:<?=get_option('dip_email');?>"><?=get_option('dip_email');?></a></li>
                            <li class="mb-0 email"><strong>Business Hours :</strong> 
                                <br>
                                Mon - Fri: 09:30am - 07:00pm<br>
                                Sat - Sun: Closed
                            </li>
                        </ul>
                        <hr>
                        <h3 class="mb-3 fs-5">Branch Info</h3>
                        <ul class="list-unstyled">
                            <li class="mb-2 address">
                                <strong>Address :</strong> <?=get_option('thani_address');?>
                            </li>
                            <li class="mb-2 phone"><strong>Phone :</strong><i class="icon anm anm-phone me-2 d-none"></i> <a href="tel:<?=get_option('thani_ph_no');?>"><?=get_option('thani_ph_no');?></a></li>
                            <li class="mb-2 phone"><strong>WhatsApp :</strong><i class="icon anm anm-phone me-2 d-none"></i> <a href="https://web.whatsapp.com/send?text=Hello&phone=<?=get_option('thani_whatsapp');?>"><?=get_option('thani_whatsapp');?></a></li>
                            <li class="mb-2 email"><strong>Email :</strong><i class="icon anm anm-envelope-l me-2 d-none"></i> <a href="mailto:<?=get_option('thani_email');?>"><?=get_option('thani_email');?></a></li>
                            <li class="mb-0 email"><strong>Business Hours :</strong> 
                                <br>
                                Mon - Fri: 09:30am - 07:00pm<br>
                                Sat: 09:30am - 02:00pm<br>
                                Sun: Closed
                            </li>
                        </ul>
                        <hr>
                        <div class="follow-us">
                            <label class="d-block mb-3"><strong>Stay Connected</strong></label>
                            <ul class="list-inline social-icons">
                                <li class="list-inline-item"><a href="<?=get_option('facebook');?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Facebook" target="_blank"><i class="icon anm anm-facebook-f"></i></a></li>
                                <li class="list-inline-item"><a href="<?=get_option('linkedin');?>" data-bs-toggle="tooltip" data-bs-placement="top" title="LinkedIn" target="_blank"><i class="icon anm anm-linkedin-in"></i></a></li>
                                <li class="list-inline-item"><a href="<?=get_option('insta');?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Instagram" target="_blank"><i class="icon anm anm-instagram" style="color: #000;"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="contact-maps section p-0">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="map-section ratio ratio-16x9">
                        <?=get_option('google_map');?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>