<?php /* Template Name: Destinations */ 
get_header(); ?>

<?php
// Array of your regions/pages
$regions = [
    'Africa',
    'Asia-Pacific',
    'Caribbean',
    'Central America',
    'Europe',
    'Middle East',
    'South America',
    'USA and Canada'    
];
?>

<!-- Menu Bar -->
<div id="region-menu" style="margin-bottom:20px;">
    <div class="destfindbt">
        <a href="javascript:;" id="justregion">VIEW BY REGION</a>
    </div>
    <div class="destfindbt">
        <a href="javascript:;" id="justalpha">A-Z DMC LISTING</a>
    </div>
     <!-- <div class="magnificzbt">
          <img src="/wp-content/uploads/2024/12/Icon-map-search.svg" alt="">
           <input type="text" id="search-input" placeholder="Search on page..." style="margin-left:20px; padding:5px;">
        </div> -->
   <div class="fsearch">
        <input type="text" id="search-input" placeholder="COUNTRY NAME">
        <div class="magnificz">
          <img src="/wp-content/uploads/2024/12/Icon-map-search.svg" alt="">
        </div>
      </div>
</div>


<div id="regions-wrapperall">
    <?php $countries = new WP_Query([
            'post_type' => 'country',
            'posts_per_page' => -1,
            'orderby'        => 'title', // Order by country title
            'order'          => 'ASC',   // Ascending (A → Z)
           
        ]);

        if ($countries->have_posts()) {
            echo '<ul class="srcolumnsrg">';
            while ($countries->have_posts()) {
                $countries->the_post();
               
               $meta = get_country_meta(get_the_ID());
                $company_name = !empty($meta['company_name']) ? $meta['company_name'] : '';
                $comp = '- ' . $company_name;
                echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '<span class="dmclabel"> ' . $comp . '</span></a></li>';
            }
            echo '</ul>';
        } else {
            echo '<p>No countries listed under this region.</p>';
        }

        wp_reset_postdata(); ?>

</div>

<div id="regions-wrapper" style="display: none;">
<?php
foreach ($regions as $region_name) {

    $region_page = get_page_by_title($region_name);

    if ($region_page) {
        $region_link = get_permalink($region_page->ID);

        // Convert region name to slug
        $region_slug = sanitize_title($region_name);

        echo '<section class="region-section" data-region="' . esc_attr($region_name) . '" style="margin-bottom:30px;">';
        echo '<h2><a href="' . esc_url($region_link) . '">' . esc_html($region_name) . '</a></h2>';

        // Get countries in this region using slug
        $countries = new WP_Query([
            'post_type' => 'country',
            'posts_per_page' => -1,
            'orderby'        => 'title', // Order by country title
            'order'          => 'ASC',   // Ascending (A → Z)
            'tax_query' => [
                [
                    'taxonomy' => 'country-category', // replace with your taxonomy name
                    'field'    => 'slug',
                    'terms'    => $region_slug,
                ],
            ],
        ]);

        if ($countries->have_posts()) {
            echo '<div class="srcolumns">';
            while ($countries->have_posts()) {
                $countries->the_post();
               
               $meta = get_country_meta(get_the_ID());
                $company_name = !empty($meta['company_name']) ? $meta['company_name'] : '';
                
                echo '<a href="' . get_permalink() . '">' . get_the_title() . '<span class="dmclabel"></span></a>';
            }
            echo '</div>';
        } else {
            echo '<p>No countries listed under this region.</p>';
        }

        wp_reset_postdata();
        echo '</section>';
    }
}
?>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    
    const sortSelect = document.getElementById('sort-region');
    const regionsWrapper = document.getElementById('regions-wrapper');
    const searchInput = document.getElementById('search-input');
    
    const regiononly = document.getElementById('justregion');
    const alphaonly = document.getElementById('justalpha');
    const regsection = document.getElementById('regions-wrapper');
    const alphasection = document.getElementById('regions-wrapperall');
    // Sort regions
    

    // Live search - show only countries that match
    searchInput.addEventListener('input', function() {
        alphasection.style.display = 'none';
         regsection.style.display = 'flex';
        let query = this.value.toLowerCase();
        const sections = regionsWrapper.querySelectorAll('.region-section');

        sections.forEach(section => {
            const countries = section.querySelectorAll('.srcolumns a');
            let anyVisible = false;

            countries.forEach(country => {
                if (country.textContent.toLowerCase().includes(query)) {
                    country.style.display = '';
                    anyVisible = true;
                } else {
                    country.style.display = 'none';
                }
            });

            // Show region header only if at least one country matches
            section.style.display = anyVisible ? '' : 'none';
        });
    });

    regiononly.addEventListener('click', function() {
        regsection.style.display = 'flex';
        alphasection.style.display = 'none';
    });

    alphaonly.addEventListener('click', function() {
        alphasection.style.display = 'flex';
        regsection.style.display = 'none';
    });


});
</script>




<?php get_footer(); ?>