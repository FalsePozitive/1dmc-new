<?php /**
 * Template for itinerary post type
 */

$mainimg = get_the_post_thumbnail_url( get_queried_object_id(), 'full' );

$accent_itin = get_field('accent_itin');
?>
<style>

:root{
    --itin:<?=$accent_itin?>;
}

</style>

<?php
get_header(); ?>

<section id="region_banner" class="region-banner">
    
        <div class="region-bg-fallback" style="background-image: url('<?php echo esc_url($mainimg); ?>');"></div>
   

    <div class="container">
        <h1 style="text-transform: uppercase;"><?php the_title(); ?></h1>
        <div class="rexplore" style="text-transform:uppercase;">
           <?php
$terms = get_the_terms( get_the_ID(), 'itinerary_category' );

if ( $terms && ! is_wp_error( $terms ) ) {
    $first_term = reset( $terms );
    echo '<span class="itinerary-category">' . esc_html( $first_term->name ) . '</span>';
}
?>
        </div>
    </div>
</section>

<section id="itincontent">
    <?php the_content();?>
</section>
<section id="itinfields">
   

        
    

 <div class="itinhighlights">
    <h3>Trip Highlights</h3>
    <?php if ( have_rows('trip_highlights') ): ?>
        <div class="itinhighlighter">
            <?php while ( have_rows('trip_highlights') ) : the_row(); 
               
                $title = get_sub_field('title');
                $subtitle = get_sub_field('subtitle');
                $para = get_sub_field('paragraph');
            ?>
            <div class="itinitem">
            <div class="itindown"><div class="itd"><img src="/wp-content/uploads/2025/11/arrow-down.png"></div></div>    
            <div class="itincard">
                <?php if ( have_rows('images') ): ?>
                    <div class="tripdayslide">
                        <?php while ( have_rows('images') ) : the_row(); 
                            $dimage = get_sub_field('image');
                            
                        ?>
                            <?php if ( $dimage ) : ?>
                                <img src="<?php echo $dimage; ?>">
                            <?php endif; ?>
                           
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
                
                <?php if ( $title ) : ?>
                    <h4><?php echo esc_html( $title ); ?></h4>
                <?php endif; ?>
                
                <?php if ( $subtitle ) : ?>
                    <h5><?php echo esc_html( $subtitle ); ?></h5>
                <?php endif; ?>
                
                <?php if ( $para ) : ?>
                    <p><?php echo wp_kses_post( $para ); ?></p>
                <?php endif; ?>

                <?php if ( have_rows('days') ): ?>
                    <div class="tripdays">
                        <?php while ( have_rows('days') ) : the_row(); 
                            $dtitle = get_sub_field('title');
                            $dtext = get_sub_field('text');
                        ?>
                            <?php if ( $dtitle ) : ?>
                                <h4><?php echo $dtitle; ?></h4>
                            <?php endif; ?>

                            <?php if ( $dtext ) : ?>
                                <h5><?php echo $dtext; ?></h5>
                            <?php endif; ?>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div> 
            <?php endwhile; ?>
        </div>
    <?php endif; ?>
</div>

<div id="getquote">
    Request A Quote
</div>


</section>

<div id="itinModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <h3>Request A Quote</h3>
   <?php echo do_shortcode('[contact-form-7 id="4d59b24" title="Contact form 1"]');?>
  </div>

</div>



<?php get_footer();?>

<script>
    // Get the modal
var modal = document.getElementById("itinModal");

// Get the button that opens the modal
var btn = document.getElementById("getquote");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
} 
</script>