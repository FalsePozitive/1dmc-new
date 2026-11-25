<?php /**
 * Template for single Country post type
 */
get_header(); 

global $post, $wpdb;

// Query the database directly
$results = $wpdb->get_results($wpdb->prepare(
    "SELECT meta_value FROM {$wpdb->postmeta} 
    WHERE post_id = %d AND meta_key = '_country'",
    $post->ID
));

$meta = array();

if (!empty($results)) {
    $raw_value = $results[0]->meta_value;
    
    // Try normal unserialization first
    $meta = maybe_unserialize($raw_value);
    
    // If that fails, manually extract the data
    if (!is_array($meta) || empty($meta)) {
        $meta = array();
        
        $fields = array('logo_url', 'profile_url' , 'company_name', 'email', 'phone', 'mobile', 'address', 'website', 'services', 'image_1', 'image_2', 'image_3', 'image_4', 'image_5', 'first_name', 'last_name');
        
        foreach ($fields as $field) {
            $field_len = strlen($field);
            $pattern = '/s:' . $field_len . ':"' . preg_quote($field, '/') . '";s:\d+:"([^"]*)"(?:;|\})/';
            if (preg_match($pattern, $raw_value, $matches)) {
                $meta[$field] = $matches[1];
            }
        }
    }
}

// Declare Variables
$mainimg = get_the_post_thumbnail_url( get_the_ID(), 'full' );
$testimonial_image = get_field('testimonials_image');
$travel_highlights = get_field('travel_highlightsc');
$experiences = get_field('experiences');
$itineraries = get_field('itineraries');
$itineraries_image = get_field('itineraries_image');
$faqs = get_field('faqs');

// order
$hisection = get_field('highlights_section');
$expsection = get_field('experiences_section');
$bestsection = get_field('best_time_to_go_section');
$itinasection = get_field('itineraries_section');
$blogsection = get_field('blog_section');
$testsection = get_field('testimonials_section');
$faqsection = get_field('faq_section');
$ccmail = get_field('other_email');


// $meta = get_post_meta(get_the_ID(), '_country', true);

$company_name = !empty($meta['company_name']) ? $meta['company_name'] : '';
$logo = !empty($meta['logo_url']) ? $meta['logo_url'] : '';
$profilepic = !empty($meta['profile_url']) ? $meta['profile_url'] : '';
$first_name = !empty($meta['first_name']) ? $meta['first_name'] : '';
$last_name = !empty($meta['last_name']) ? $meta['last_name'] : '';
$phone = !empty($meta['phone']) ? $meta['phone'] : '';
$mobile = !empty($meta['mobile']) ? $meta['mobile'] : '';
$address = !empty($meta['address']) ? $meta['address'] : '';
$skype = !empty($meta['skype']) ? $meta['skype'] : '';
$email = !empty($meta['email']) ? $meta['email'] : '';
$website = !empty($meta['website']) ? $meta['website'] : '';
$services = get_field('services'); //!empty($meta['services']) ? $meta['services'] : '';
$highlights = !empty($meta['highlights']) ? $meta['highlights'] : '';
$highlights2 = !empty($meta['highlights_2']) ? $meta['highlights_2'] : '';
$videoyt = !empty($meta['video_youtube']) ? $meta['video_youtube'] : '';
$videovm = !empty($meta['video_vimeo']) ? $meta['video_vimeo'] : '';
$map = !empty($meta['map']) ? $meta['map'] : '';
$itin1file = !empty($meta['itin_1']) ? $meta['itin_1'] : '';
$itin1name = !empty($meta['itin_1_name']) ? $meta['itin_1_name'] : '';
$itin2file = !empty($meta['itin_2']) ? $meta['itin_2'] : '';
$itin2name = !empty($meta['itin_2_name']) ? $meta['itin_2_name'] : '';
$itin3file = !empty($meta['itin_3']) ? $meta['itin_3'] : '';
$itin3name = !empty($meta['itin_3_name']) ? $meta['itin_3_name'] : '';
$mtitle = '';

?>

<?php
    // while ( have_posts() ) : ?>

<section id="dmcbanner">
    <div class="dbholster">
        <img src="<? echo $mainimg; ?>" alt="DMC Banner Image">
    </div>
    <div class="dmcbox">
        <div class="titlewithlogo"><h1 class="dmctitle"><?php the_title();?></h1><p>WITH</p><img src="<? echo $logo;?>" alt="DMC LOGO"></div>
        <div class="dmcboxinfo">
            <div class="dbi_left">
                <div class="dbil_top">
                    <div class="dbili_t_l">
                    <h4><? echo $company_name;?></h4>
                    <div><? echo $services;?></div>
                    </div>
                    <!-- <div class="dbili_t_r"> -->
                        <!-- <img src="<? //echo $logo;?>" alt="DMC LOGO"> -->
                    <!-- </div> -->
                </div>
                <div class="dbil_bot">
                    <div class="ccontact">
                    <!-- <a href="tel:<?// echo $phone;?>">CALL US</a> -->
                    <?php
$cc = 'info@1dmcworld.com';
if (!empty($ccmail)) {
    $cc .= ',' . $ccmail;
}
?>
<a href="mailto:<?php echo htmlspecialchars($email); ?>?cc=<?php echo rawurlencode($cc); ?>">EMAIL REQUEST</a>
                    <?php if ( ! empty( $website ) ) : ?>
                        <a href="https://<?php echo $website; ?>" target="_blank">WEBSITE</a>
                    <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="dbi_right">
                <img src="<? echo $profilepic;?>" alt="DMC Operator Image">
                <p class="dbiname"> <?echo $first_name;?></p>
                <p class="dbititle"><?echo $mtitle?></p>
				<?php
$cc = 'info@1dmcworld.com';
if (!empty($ccmail)) {
    $cc .= ',' . $ccmail;
}
?>
<a class="dbicontact" href="mailto:<?php echo htmlspecialchars($email); ?>?cc=<?php echo rawurlencode($cc); ?>">EMAIL ME</a>
                
            </div>
        </div>
    </div>
</section>

<section id="dmcintro">

<?php the_content();?>

</section>

<div id="utilityflex">

<?php if ( have_rows('travel_highlightsc') ) : ?>
<section id="highlights">
    <h2><?php the_title(); ?> TRAVEL HIGHLIGHTS</h2>

    <div class="highlightgrid">

        <?php while ( have_rows('travel_highlightsc') ) : the_row(); 
            $himage = get_sub_field('image');
            $htitle = get_sub_field('title'); 
            $htext  = get_sub_field('text'); 
        ?>
            <div class="hicard">
                <img src="<?= esc_url($himage); ?>" alt="">
                <h5><?= esc_html($htitle); ?></h5>
                <p><?= esc_html($htext); ?></p>
            </div>
        <?php endwhile; ?>

    </div>
</section>
<?php endif; ?>







<?php if ( have_rows('experiences') ) : ?>
<section id="experiences">
    <h2><?php the_title(); ?> TRAVEL EXPERIENCES</h2>

    <div class="expitems">
        <?php
            $items = get_field('experiences');
            $count = count($items);
            $half  = ceil($count / 2); // Split into 2 halves
            $i     = 0;
        ?>

        <div class="exp_a">
            <?php foreach ( $items as $item ) : ?>
                <?php if ( $i == $half ) : ?>
                    </div>
                    <div class="exp_c"></div>
                    <div class="exp_a">
                <?php endif; ?>

                <div class="exp_item">
                    <div class="expi_a"><p>•</p></div>
                    <div class="expi_b">
                        <p><?= esc_html( $item['experience'] ); ?></p>
                    </div>
                </div>

                <?php $i++; ?>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="ctaboxer">
        <a href="mailto:<? echo $email;?>?cc=info@1dmcworld.com">Enquire</a>
    </div>
</section>
<?php endif; ?>


        

<?php 
$choices = get_field('best_time_to_go');
if ( ! empty($choices) ) : 
?>
<section id="besttime">
    <h3>Best Times To Go</h3>


    <style>
        <?php foreach ( $choices as $choice ) : ?>
            .bm<?= esc_attr($choice); ?>{
                background: var(--accent) !important;
                color: white !important;
                outline:1px solid white!important;
            }
        <?php endforeach; ?>
    </style>

    <div class="bmonths">
        <div class="bmJanuary">Jan</div>
        <div class="bmFebruary">Feb</div>
        <div class="bmMarch">Mar</div>
        <div class="bmApril">Apr</div>
        <div class="bmMay">May</div>
        <div class="bmJune">Jun</div>
        <div class="bmJuly">Jul</div>
        <div class="bmAugust">Aug</div>
        <div class="bmSeptember">Sep</div>
        <div class="bmOctober">Oct</div>
        <div class="bmNovember">Nov</div>
        <div class="bmDecember">Dec</div>
    </div>

     <p class="btptext"><?php echo the_field('best_time_to_go_text');?></p>
</section>
<?php endif; ?>

<?php if ( have_rows('itineraries') ) : ?>
<section id="itineraries">
    <div class="tflex">
        <div class="testholster itin">
            <h2>RECOMMENDED ITINERARIES</h2>

            <?php while ( have_rows('itineraries') ) : the_row(); 
                $itinerary     = get_sub_field('itinerary');
                $itineraryfile = get_sub_field('file');
                $itineraryduration = get_sub_field('duration');
                $itinerarydesc = get_sub_field('description');
            ?>
                <?php if ( ! empty($itineraryfile) ) : ?>
                    <div class="itinerary-item">
                        <a href="<?= esc_url($itineraryfile); ?>" target="_blank" rel="noopener"><?= esc_html($itinerary); ?></a> - <?= esc_html($itineraryduration); ?>
                            <br>
                            <span><?= esc_html($itinerarydesc); ?></span>
                        
                    </div>
                <?php else : ?>
                    <div class="itinerary-item">
                        <?= esc_html($itinerary); ?></a> - <?= esc_html($itineraryduration); ?>
                            <br>
                            <span><?= esc_html($itinerarydesc); ?></span>
                        
                    </div>
                <?php endif; ?>
            <?php endwhile; ?>
         
         <div class="ctaboxa">
        <a href="mailto:<? echo $email;?>?cc=info@1dmcworld.com">CUSTOMIZE YOUR ITINERARY</a>
        </div>
        </div>

        <div class="newsigner" style="background-image:url('<?= esc_url($itineraries_image); ?>');"></div>
    </div>
</section>
<?php endif; ?>

<?php
// Get current post title
$current_title = get_the_title();

// Try to find a category matching the post title
$matched_cat = get_category_by_slug(sanitize_title($current_title));

// Fallback: use ACF "select region" field if no matching category
if (!$matched_cat) {
    $region_field = get_field('select_region'); // ACF field (string)
    if ($region_field) {
        $matched_cat = get_category_by_slug(sanitize_title($region_field));
    }
} 

$catterlink = $matched_cat;
?>

<?php 
$featured_posts = get_field('select_news');
if ( ! empty($featured_posts) ) : 
?>
<section id="blogitems">
    <div class="titlebanner">
        <h2>LATEST NEWS</h2>
        <a href="/news-events/" class="seemore">SEE MORE</a>
    </div>

    <div class="bgrid">
        <?php foreach ( $featured_posts as $post ) : 
            setup_postdata($post); 
        ?>
            <div class="bgcard">
				<!-- check-->
				<a href="<?php the_permalink(); ?>">
					<?php
				 $alt_thumb = get_field('alter_thumbnail');
    if ($alt_thumb) : ?>
        <img src="<?php echo esc_url($alt_thumb); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
    <?php elseif (has_post_thumbnail()) : ?>
        <?php the_post_thumbnail('large', ['alt' => get_the_title()]); ?>
    <?php else : ?>
        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/placeholder.jpg'); ?>" alt="Placeholder image">
    <?php endif; ?>
				</a>
                

                <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>

                <p><?php echo wp_trim_words(get_the_excerpt(), 10, '...'); ?></p>
            </div>
        <?php endforeach; ?>
    </div>

    <?php wp_reset_postdata(); ?>
</section>
<?php endif; ?>

<?php 
$featured_tests = get_field('testimonials');
if ( ! empty($featured_tests) ) : 
?>
<section id="testimonials">
    <div class="tflex">

        <div class="testholster">
            <h2>TESTIMONIALS</h2>

            <div class="testimonialslider">
                <?php foreach ( $featured_tests as $test ) : 
                    $post = $test;
                    setup_postdata( $post );
                ?>
                    <div>
                        <div class="testo">
                            <div><?php the_content(); ?></div>
                            <p><?php the_title(); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <?php wp_reset_postdata(); ?>
        </div>

        <div class="newsigner" style="background-image:url('<?= esc_url($testimonial_image); ?>');"></div>

    </div>
</section>
<?php endif; ?>

<?php if ( have_rows('faqs') ) : ?>
<section id="dmcfaq">
    <h2><span><?php the_title(); ?></span> FAQ</h2>

   <div class="dfaqs">
    <?php while ( have_rows('faqs') ) : the_row(); 
        $question = get_sub_field('question');
        $answer   = get_sub_field('answer');
    ?>
        <div class="dfqitem">
            <button type="button" class="faq-toggle" aria-expanded="false">
                <span><?= esc_html($question); ?></span>
                <span class="faq-icon" aria-hidden="true">+</span>
            </button>
            <div class="faq-content">
                <div class="faq-inner">
                    <?= wp_kses_post($answer); ?>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
</div>
</section>


<?php endif; ?>


<?php
//  endwhile;
    ?>

    </div><!--close parent flex -->
   <script>
document.addEventListener('DOMContentLoaded', () => {
    const faqToggles = document.querySelectorAll('.faq-toggle');

    faqToggles.forEach(toggle => {
        toggle.addEventListener('click', () => {
            const faqItem = toggle.closest('.dfqitem');
            const isActive = faqItem.classList.contains('active');
            const icon = toggle.querySelector('.faq-icon');

            // Close all other open accordions
            document.querySelectorAll('.dfqitem.active').forEach(openItem => {
                if (openItem !== faqItem) {
                    openItem.classList.remove('active');
                    openItem.querySelector('.faq-toggle').setAttribute('aria-expanded', 'false');
                    // Reset the icon of the closed item back to +
                    openItem.querySelector('.faq-icon').textContent = '+';
                }
            });

            // Toggle current item classes and aria attributes
            faqItem.classList.toggle('active');
            toggle.setAttribute('aria-expanded', !isActive);
            
            // Toggle the current icon based on the new active state
            icon.textContent = isActive ? '+' : '-';
        });
    });
});
</script>
<?php get_footer(); ?>

<style>
    #utilityflex{
        display:flex;
        flex-direction: column;

        & #highlights{
            order:<?php echo $hisection; ?>;
        }

        & #experiences{
            order:<?php echo $expsection; ?>;
        }

        & #besttime{
            order:<?php echo $bestsection; ?>;
        }

        & #itineraries{
            order:<?php echo $itinasection; ?>;
        }
        & #blogitems{
            order:<?php echo $blogsection; ?>;
        }
        & #testimonials{
            order:<?php echo $testsection; ?>;
        }
        & #dmcfaq{
            order:<?php echo $faqsection; ?>;
        }

    }