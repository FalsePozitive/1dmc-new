<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package 1DMC
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
	<!-- Accent Tool -->
 <?php
// Get the selected region (from post, page, or CPT)
$setregion = get_field('select_region'); // e.g., "South America"

// Only continue if a region was selected
if ( $setregion && have_rows('region_settings', 'option') ) :

    // Normalize (slugify) the selected region name
    $setregion_slug = strtolower(trim(preg_replace('/[^a-z0-9]+/', '-', $setregion)));

    while ( have_rows('region_settings', 'option') ) : the_row();
        $region_name = get_sub_field('region'); // e.g., "South America"
        $primary = get_sub_field('region_primary_colour');
        $secondary = get_sub_field('region_secondary_colour');
        $logo = get_sub_field('region_logo');

        // Slugify the region name from options for consistent comparison
        $region_slug = strtolower(trim(preg_replace('/[^a-z0-9]+/', '-', $region_name)));

        // Compare slugs, not raw text (more reliable)
        if ( $setregion === $region_name ) :
?>
            <style>
                :root {
                    --prim: <?php echo esc_attr($primary); ?>;
					--accent: <?php echo esc_attr($primary); ?>;
                    --seco: <?php echo esc_attr($secondary); ?>;
                }
            </style>

            <?php /* Example: You can safely echo the logo if needed
            if ( $logo ) : ?>
                <img src="<?php echo esc_url($logo['url']); ?>"
                     alt="<?php echo esc_attr($logo['alt']); ?>"
                     class="region-logo" />
            <?php endif; */ ?>

<?php
            break; // stop after first match
        endif;

    endwhile;
endif;
?>

<!-- end accent tool -->
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'onedmc' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="hinterior">
		<div class="site-branding">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				
				<?php
			else :
				?>
				
				<?php
			endif;
			$onedmc_description = get_bloginfo( 'description', 'display' );
			if ( $onedmc_description || is_customize_preview() ) :
				?>
				
			<?php endif; ?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
  ☰
</button>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				)
			);
			?>
		</nav><!-- #site-navigation -->
		<div class="rfpholster">
		<div id="rfplaunch" class="rfp">SUBMIT RFP</div>
		</div>
		<!-- <div class="headersocial">
			
			<a href="#"><img src="/wp-content/uploads/2024/12/Icon-metro-facebook.svg" alt=""></a><a href="#"><img src="/wp-content/uploads/2024/12/Icon-metro-linkedin.svg" alt=""></a><a href="#"><img src="/wp-content/uploads/2024/12/Icon-metro-instagram.svg" alt=""></a>
		</div> -->
		</div>
	</header><!-- #masthead -->
