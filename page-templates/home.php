<?php /* Template Name: Home */ 

$video = get_field('video');
$vpost = get_field('video_poster');
$btitle = get_field('banner_title');
$ititle = get_field('intro_title');
$itext = get_field('intro_text');
$ctitle = get_field('connector_title');
$name = get_field('name') ;
$title = get_field('title');
$desc = get_field('description');
$email = get_field('email');
$phone = get_field('phone');
$link = get_field('linkedin');
$pic = get_field('profile_image');

get_header(); ?>

<section id="mainbanner" class="video-banner">
  <!-- Background video -->
  <video autoplay muted loop playsinline class="background-video" poster="<?=$vpost?>" onplay="this.playbackRate = 0.2;">
    <source src="<?=$video;?>" type="video/mp4">
    Your browser does not support the video tag.
  </video>

  <!-- Foreground content -->
  <div class="container">
    <h1><?=$btitle;?></h1>
    <div class="finder">
     <div class="fsearch">
  <input type="text" id="country-search" placeholder="COUNTRY NAME" autocomplete="off">
  <div class="magnificz" id="country-search-icon">
    <img src="/wp-content/uploads/2024/12/Icon-map-search.svg" alt="">
  </div>
  <ul class="country-search-results" id="country-search-results"></ul>
</div>
      <div class="destfind">
        <a href="/destinations">VIEW DESTINATIONS</a>
      </div>
    </div>
  </div>
</section>

<section id="countrygrid">
    <div class="hmintro">
        <h1><?= esc_html($ititle); ?></h1>
        <p><?= $itext; ?></p>
    </div>

    <?php
    // Get all country categories (custom taxonomy)
    $custom_order = array(10, 8, 11, 12, 13, 16, 14, 15);
    $categories = get_terms(array(
        'taxonomy'   => 'country-category',
        'hide_empty' => false,
        'include'    => $custom_order,
        'orderby'    => 'include',
    ));

    if ($categories && !is_wp_error($categories)) : 
       $region_settings = get_field('region_settings', 'options');
    $region_lookup = array();
    
    // Build a lookup array for quick matching
    if ($region_settings) {
        foreach ($region_settings as $setting) {
            if (isset($setting['region']) && isset($setting['number_of_countries'])) {
                $region_lookup[$setting['region']] = intval($setting['number_of_countries']);
            }
        }
    }
    
    echo "<!-- Region lookup array: " . print_r($region_lookup, true) . " -->";
?>
 <div class="countrygrid">
    <?php foreach ($categories as $category) :
        // Get one random 'country' post from this taxonomy term
        $random_post = get_posts(array(
            'post_type'      => 'country',
            'posts_per_page' => 1,
            'orderby'        => 'rand',
            'tax_query'      => array(
                array(
                    'taxonomy' => 'country-category',
                    'field'    => 'term_id',
                    'terms'    => $category->term_id,
                ),
            ),
        ));
        
        // Default image fallback
        $image_url = '/wp-content/uploads/default-country.jpg';
        
        if (!empty($random_post)) {
            global $wpdb;
            
            // Query the database directly
            $results = $wpdb->get_results($wpdb->prepare(
                "SELECT meta_value FROM {$wpdb->postmeta} 
                WHERE post_id = %d AND meta_key = '_country'",
                $random_post[0]->ID
            ));
            
            $meta = array();
            
            if (!empty($results)) {
                $raw_value = $results[0]->meta_value;
                
                // Try normal unserialization first
                $meta = maybe_unserialize($raw_value);
                
                // If that fails, manually extract the data
                if (!is_array($meta) || empty($meta)) {
                    $meta = array();
                    
                    // Extract image_1
                    $pattern = '/s:7:"image_1";s:\d+:"([^"]*)"(?:;|\})/';
                    if (preg_match($pattern, $raw_value, $matches)) {
                        $meta['image_1'] = $matches[1];
                    }
                }
            }
            
            if (!empty($meta['image_1'])) {
                $image_url = esc_url($meta['image_1']);
            }
        }
        
        // Category details
        $cat_name  = esc_html($category->name);
        $catlimit = 170;
        $cat_desc = esc_html(wp_html_excerpt($category->description, $catlimit, '...'));
        $cat_slug  = esc_html($category->slug);
        $cat_link  = esc_url(get_term_link($category));
        $cat_link  = str_replace('/country-category/', '/', $cat_link);
        
        // Get count from lookup array
        $cat_count = isset($region_lookup[$cat_slug]) ? $region_lookup[$cat_slug] : 0;
        
        echo "<!-- Slug: '{$cat_slug}' | Count from lookup: {$cat_count} -->";
        
        // Only show if we have a count
        if ($cat_count > 0) :
    ?>
        <a href="<?php echo $cat_link; ?>"
           class="card-link"
           aria-label="Explore <?php echo $cat_name; ?>">
            <div class="card">
                <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo $cat_name; ?>">
                <h3><?php echo $cat_name; ?></h3>
                <?php if ($cat_desc) : ?>
                    <p><?php echo $cat_desc; ?></p>
                <?php endif; ?>
                <span class="card-cta">
                    Explore <?php echo $cat_count; ?> local DMC<?php echo ($cat_count !== 1) ? 's' : ''; ?>
                </span>
            </div>
        </a>
    <?php 
        endif;
    endforeach; ?>
</div>
<?php endif; ?>


</section>

<section id="testimonials">
    <div class="tflex">
<div class="testholster">
    <h2>TESTIMONIALS</h2>

    <?php
    $featured_tests = get_field('testimonials'); // ACF relationship field
    if ( $featured_tests ) : ?>
        
        <div class="testimonialslider">
            <?php foreach ( $featured_tests as $test ) : 
                
                // Make WordPress aware of the current post
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
    <?php endif; ?>
</div>
    <div class="newsigner">
        <h4>Sign Up to Our Newsletter</h4>
        <p>Join Over 40k Travel Professionals</p>
        <?php echo do_shortcode('[contact-form-7 id="9946b48" title="Newsletter_home"]'); ?>
    </div>
    </div>
</section>

<section id="connector">
    <h2><?=$ctitle?></h2>
    <div class="connect">
        <div class="cpic">
            <img src="<?=$pic?>" alt="">
        </div>
        <div class="cinfo">
            <p class="cname"><?=$name?></p>
            <p class="ctitle"><?=$title?></p>
            <p class="cdesc"><?=$desc?></p>
            <div class="ccontact">
                <a href="mailto:<?=$email?>">EMAIL</a>
                <a href="<?=$link?>" target="_blank">LINKEDIN</a>
            </div>
        </div>
    </div>
</section>

<section id="blogitems">
    <div class="titlebanner">
    <h2>LATEST NEWS</h2>
    <a href="/news-events/" class="seemore">SEE MORE</a>
    </div>

    <?php
// Query the 4 latest posts from the "News" category
$news_query = new WP_Query(array(
    'post_type'      => 'post',
    'posts_per_page' => 4,
    'category_name'  => 'mainhome', // category slug, not name
    'orderby'        => 'date',
    'order'          => 'DESC',
));

if ($news_query->have_posts()) : ?>
    <div class="bgrid">
        <?php while ($news_query->have_posts()) : $news_query->the_post(); ?>
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
        <?php endwhile; ?>
    </div>
    <?php wp_reset_postdata(); ?>
<?php else : ?>
    <p>No recent news found.</p>
<?php endif; ?>

</section>
<script>
document.addEventListener('DOMContentLoaded', function () {
  const input      = document.getElementById('country-search');
  const resultsBox = document.getElementById('country-search-results');
  const icon       = document.getElementById('country-search-icon');

  let currentLink = null; // link of the selected/first-match country
  let debounceTimer;

  function clearResults() {
    resultsBox.innerHTML = '';
    resultsBox.style.display = 'none';
  }

  input.addEventListener('input', function () {
    const query = this.value.trim();
    currentLink = null;

    clearTimeout(debounceTimer);

    if (query.length < 2) {
      clearResults();
      return;
    }

    debounceTimer = setTimeout(() => {
      fetch(`/wp-json/custom/v1/country-search?search=${encodeURIComponent(query)}`)
  .then(res => res.json())
  .then(data => {
    clearResults();

    if (!Array.isArray(data) || data.length === 0) return;

    currentLink = data[0].link;

    data.forEach(item => {
      const li = document.createElement('li');
      li.textContent = item.title;
      li.dataset.link = item.link;

      li.addEventListener('click', () => {
        input.value = item.title;
        currentLink = item.link;
        clearResults();
        window.location.href = item.link;
      });

      resultsBox.appendChild(li);
    });

    resultsBox.style.display = 'block';
  })
  .catch(err => console.error('Country search error:', err));
    }, 250); // debounce
  });

  // Click the magnifying-glass icon -> go to selected/best-match country
  icon.addEventListener('click', function () {
    if (currentLink) {
      window.location.href = currentLink;
    }
  });

  // close dropdown when clicking outside
  document.addEventListener('click', function (e) {
    if (!e.target.closest('.fsearch')) {
      clearResults();
    }
  });
});
</script>

<?php get_footer(); ?>
