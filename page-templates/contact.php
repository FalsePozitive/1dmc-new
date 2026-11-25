<?php /* Template Name: Contact */ 

$title = get_field('title');
$left_title = get_field('left_title');
$phone = get_field('phone');
$email = get_field('email');
$whatsapp = get_field('whatsapp');
$address = get_field('address');
$facebook = get_field('facebook');
$instagram = get_field('instagram');
$linkedin = get_field('linkedin');



get_header(); ?>

<section id="contact_page">
    <h1><?=$title?></h1>
    <div class="cb_box">
        <div class="cbox_left">
            <h4><?=$left_title?></h4>
            <div class="cblicon"><img src="/wp-content/themes/onedmc/assets/phone.svg" alt="icon"><a href="tel:<?=$phone?>"><?=$phone?></a></div>
            <div class="cblicon"><img src="/wp-content/themes/onedmc/assets/mail.svg" alt="icon"><a href="mailto:<?=$email?>"><?=$email?></a></div>
            <div class="cblicon"><img src="/wp-content/themes/onedmc/assets/wapp.svg" alt="icon"><a href="https://wa.me/<?= preg_replace('/\D/', '', $whatsapp) ?>"><?=$whatsapp?></a></div>
            <div class="cbliconm"><img src="/wp-content/themes/onedmc/assets/gps.svg" alt="icon"><a href="javascript:;"><?=$address?></a></div>
            <div class="cblsoc">
                
                <a href="<?=$instagram?>" target="_blank"><img src="/wp-content/uploads/2025/12/link.png" alt="linkedin"></a>
                <a href="<?=$linkedin?>" target="_blank"><img src="/wp-content/uploads/2025/12/insto.png" alt="instagram"></a>
                <a href="<?=$facebook?>" target="_blank"><img src="/wp-content/uploads/2025/12/fbook.png" alt="facebook"></a>

            </div>
        </div>
        <div class="cbox_right">
            <?php echo do_shortcode('[contact-form-7 id="4d59b24" title="Contact form 1"]');?>
        </div>
    </div>
</section>






<?php get_footer(); ?>