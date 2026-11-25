<?php /* Template Name: Region */ 
get_header(); 
$region_id = get_field( 'select_region' ); 

global $post;
$current_slug = get_post_field( 'post_name', get_post() );

$mainimg = get_the_post_thumbnail_url( get_the_ID(), 'full' );

function get_country_post_count_by_category( $category_slug ) {
    
    $term = get_term_by( 'slug', $category_slug, 'country-category' );

    if ( ! $term || is_wp_error( $term ) ) {
        return 0; // Category not found
    }

    // Query for 'country' posts in this category
    $args = array(
        'post_type'      => 'country',
        'post_status'    => 'publish',
        'tax_query'      => array(
            array(
                'taxonomy' => 'country-category',
                'field'    => 'slug',
                'terms'    => $category_slug,
            ),
        ),
        'posts_per_page' => -1,
        'fields'         => 'ids', // We only need IDs for counting
    );

    $query = new WP_Query( $args );

    return $query->found_posts;
}

// Example usage: Count posts in category with slug 'europe'
$category_slug = $region_id;
$post_count = get_country_post_count_by_category( $category_slug );

?>

<?php
// Get the video URL from your ACF field
$header_video = get_field('header_video'); // should return a URL or file object depending on field settings
// Use the page's featured image as the main image
$mainimg = get_the_post_thumbnail_url( get_queried_object_id(), 'full' );

?>

<section id="region_banner" class="region-banner">
    
        <div class="region-bg-fallback" style="background-image: url('<?php echo esc_url($mainimg); ?>');"></div>
   

    <div class="container">
        <h1 style="text-transform: uppercase;"><?php the_title(); ?></h1>
        <div class="rexplore" style="text-transform:uppercase;">
            EXPLORE <?php echo esc_html($post_count); ?> LOCAL <?php the_title(); ?> DMCS
        </div>
    </div>
</section>

<section id="single_regions">
    <?php the_content();?>
    <div class="srcolumns">

  <?php  output_country_posts_by_category( $region_id );
?>
   


    </div>
    
    <div class="custom-select">
    <select id="regmob">
         <?php  output_country_posts_by_category_mobile( $region_id );?>       
    </select>
    </div>
</section>


<section id="regioncards">

<?php output_country_cards_by_category( $region_id );?>
  
</section>



<section id="blogitems">
    <div class="titlebanner">
    <h2>LATEST NEWS</h2>
    <a href="/<?php echo $current_slug; ?>/news-events" class="seemore">SEE MORE</a>
    </div>

    <div class="bgrid">
        <?php output_blog_cards_by_category( $region_id );?>
        
    </div>
</section>

<?php get_footer(); ?>

<script>
    var x, i, j, l, ll, selElmnt, a, b, c;
/* Look for any elements with the class "custom-select": */
x = document.getElementsByClassName("custom-select");
l = x.length;
for (i = 0; i < l; i++) {
  selElmnt = x[i].getElementsByTagName("select")[0];
  ll = selElmnt.length;
  /* For each element, create a new DIV that will act as the selected item: */
  a = document.createElement("DIV");
  a.setAttribute("class", "select-selected");
  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
  x[i].appendChild(a);
  /* For each element, create a new DIV that will contain the option list: */
  b = document.createElement("DIV");
  b.setAttribute("class", "select-items select-hide");
  for (j = 1; j < ll; j++) {
    /* For each option in the original select element,
    create a new DIV that will act as an option item: */
    c = document.createElement("DIV");
    c.innerHTML = selElmnt.options[j].innerHTML;
    c.addEventListener("click", function(e) {
        /* When an item is clicked, update the original select box,
        and the selected item: */
        var y, i, k, s, h, sl, yl;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        sl = s.length;
        h = this.parentNode.previousSibling;
        for (i = 0; i < sl; i++) {
          if (s.options[i].innerHTML == this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            y = this.parentNode.getElementsByClassName("same-as-selected");
            yl = y.length;
            for (k = 0; k < yl; k++) {
              y[k].removeAttribute("class");
            }
            this.setAttribute("class", "same-as-selected");
            break;
          }
        }
        h.click();
    });
    b.appendChild(c);
  }
  x[i].appendChild(b);
  a.addEventListener("click", function(e) {
    /* When the select box is clicked, close any other select boxes,
    and open/close the current select box: */
    e.stopPropagation();
    closeAllSelect(this);
    this.nextSibling.classList.toggle("select-hide");
    this.classList.toggle("select-arrow-active");
  });
}

function closeAllSelect(elmnt) {
  /* A function that will close all select boxes in the document,
  except the current select box: */
  var x, y, i, xl, yl, arrNo = [];
  x = document.getElementsByClassName("select-items");
  y = document.getElementsByClassName("select-selected");
  xl = x.length;
  yl = y.length;
  for (i = 0; i < yl; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i)
    } else {
      y[i].classList.remove("select-arrow-active");
    }
  }
  for (i = 0; i < xl; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("select-hide");
    }
  }
}

/* If the user clicks anywhere outside the select box,
then close all select boxes: */
document.addEventListener("click", closeAllSelect); 
</script>