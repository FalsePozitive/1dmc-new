<?php /* Template Name: News Archive */ 
get_header(); ?>
<section id="abouthead">
    <div class="container">
        <h1>NEWS</h1>
       <div class="featured_posts">
    <?php
    $featured_query = new WP_Query([
        'post_type'      => 'post',
        'posts_per_page' => 3,
        'category_name'  => 'featured-news',
        'ignore_sticky_posts' => true,
    ]);

    if ($featured_query->have_posts()) :
        while ($featured_query->have_posts()) : $featured_query->the_post(); ?>
            
            <div class="featcard">
                <div class="fc_pholster">
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
                </div>

                <div class="fc_tholster">
                    <h4>
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h4>
                    <p><?php echo wp_trim_words(get_the_excerpt(), 10); ?></p>
                </div>
            </div>

        <?php endwhile;
        wp_reset_postdata();
    else : ?>
        <p>No recent posts available.</p>
    <?php endif; ?>
</div>

      
        </div>
    </div>

</section>

<section id="main_news_articles">
    <div class="mna_box">
     

      <div class="mnafilter">
      <a class="actived" data-category="africa" href="#">AFRICA</a>
      <a data-category="asia-pacific" href="#">ASIA</a>
      <a data-category="caribbean" href="#">CARIBBEAN</a>
      <a data-category="central-america" href="#">CENTRAL AMERICA</a>
      <a data-category="europe" href="#">EUROPE</a>
      <a data-category="middle-east" href="#">MIDDLE EAST</a>      
      <a data-category="south-america" href="#">SOUTH AMERICA</a>
      <a data-category="usa-and-canada" href="#">USA & CANADA</a>
    </div>
    </div>
    <div class="listgrid"><a href="javascript:;" id="listbt">List</a><a href="javascript:;" id="gridbt">Grid</a></div>
    <div class="bgrid">
       
            
    </div>

    <div class="lm_btn">LOAD MORE</div>
</section>





<?php get_footer(); ?>