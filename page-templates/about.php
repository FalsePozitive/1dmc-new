<?php /* Template Name: About */ 

$title = get_field('title');
$box_title = get_field('box_title');
$box_image = get_field('box_image');
$name = get_field('name');
$professional_title = get_field('professional_title');
$description = get_field('description');
$email = get_field('email');
$linkedin = get_field('linkedin');
$section_one_title = get_field('section_one_title');
$section_one_content = get_field('section_one_content');
$section_one_image = get_field('section_one_image');
$section_two_title = get_field('section_two_title');
$section_two_text = get_field('section_two_text');
$section_three_title = get_field('section_three_title');
$section_three_text = get_field('section_three_text');
$section_four_title = get_field('section_four_title');
$section_four_content = get_field('section_four_content');
$section_four_image = get_field('section_four_image');
$subscription_heading = get_field('subscription_heading');
$subscription_text = get_field('subscription_text');
$ititle = get_field('intro_title');
$itext = get_field('intro_text');



get_header(); ?>
<section id="abouthead">
     
    <div class="container">
        <h1><?=$title?></h1>
        <div class="hmintro">
        <h1><?= esc_html($ititle); ?></h1>
        <p><?= $itext; ?></p>
    </div>
        <div class="aboutbox">
            <div class="ab_grid">
                <div class="abg_a">
                    <h4 class="mobonly"><?=$box_title?></h4>
                    <img src="<?=$box_image?>" alt="Paul stephens">
                    <?php 
                        $rows = get_field('points');
                        if( $rows ) {
                            echo '<div class="ab_list">';
                            foreach( $rows as $row ) {
                                $bpoint = $row['point'];?>
                                 <div class="abl_item">
                            <img src="/wp-content/uploads/2025/03/Icon-awesome-check-circle.svg" alt="">
                            <p><?=$bpoint?></p>
                        </div>
                     <?php       }
                            echo '</div>';
                        } ?>
                 
                </div>
                <div class="abg_b">
                    <h4 class="deskonly"><?=$box_title?></h4>
                    <h6><?=$name?></h6>
                    <p class="abg_btxt"><?=$professional_title?></p>
                    <?=$description?>
                    <div class="ccontact">
                <a href="mailto:<?=$email?>">EMAIL</a>
                <a href="<?=$linkedin?>" target="_blank">LINKEDIN</a>
            </div>
                </div>
            </div>
        </div>
        <div class="faqheader">
            <h3>IMPORTANT Q&A</h3>
            <div class="iqa_links">
                <a href="#what_is"><?=$section_one_title?></a>
                <a href="#what_does"><?=$section_two_title?></a>
                <a href="#who_needs"><?=$section_three_title?></a>
                <a href="#what_are"><?=$section_four_title?></a>
            </div>
        </div>
    </div>

</section>


<section id="itineraries">
<div class="tflex">
    <div id="what_is" class="testholster itin">
        <h2><?=$section_one_title?></h2>
        <?=$section_one_content?>
    </div>
    <div class="newsigner" style="background-image:url('<?=$section_one_image?>');">
      
    </div>
    </div>
</section>


<section id="experiences">
    <h2 id="what_does"><?=$section_two_title?></h2>
    <p><?=$section_two_text?></p>
    <div class="expitems">
    <?php if( have_rows('section_two_points') ): 
        $items = get_field('section_two_points');
        $count = count($items);
        $half = ceil($count / 2); // Split into 2 halves
        $i = 0;
    ?>

        <div class="exp_a">
        <?php foreach( $items as $item ): ?>
            <?php if( $i == $half ): // close first column, open second ?>
                </div>
                <div class="exp_c"></div>
                <div class="exp_a">
            <?php endif; ?>

            <!-- <div class="expitems"> -->
                <div class="expitems">
                    <ul class="teset">
                <li><?= esc_html($item['point']); ?></li>
                
            </ul>
                </div>
               
            <!-- </div> -->

            <?php $i++; ?>
        <?php endforeach; ?>
        </div>

    <?php endif; ?>
</div>

   
</section>
 <div class="orangebar"></div>

<?php if ( ! empty( $section_three_title ) ) : ?>
    <section id="experiences">
        <h2 id="who_needs" class="green"><?= $section_three_title ?></h2>
        <div class="expitems">
           
            <?php 
            $threerows = get_field('section_three_text');
            if ( $threerows ) {
                echo '<div class="exp_a">';
                foreach ( $threerows as $threerow ) {
                    $threepoint = $threerow['text']; ?>
                    <div class="exp_item">
                        <div class="expi_a"><p><?= $threepoint ?></p></div>
                    </div>
                <?php }
                echo '</div>';
            } ?>
          
            <div class="exp_c grndiv"></div>
            <div class="exp_a expads">
                <?php 
                $threepoints = get_field('section_three_points');
                if ( $threepoints ) {
                    echo '<ul class="tesetg">';
                    foreach ( $threepoints as $threepointa ) {
                        $threeitem = $threepointa['point']; ?>
                        <li><?= $threeitem ?></li>
                    <?php }
                    echo '</ul>';
                } ?>
            </div>
        </div>
    </section>
<?php endif; ?>


<section id="itineraries" class="mt60">
<div class="tflex">
    <div class="testholster itin expad">
        <h2 id="what_are"><?=$section_four_title?></h2>
        
        <?=$section_four_content?>
    </div>
    <div class="newsigner" style="background-image:url('<?=$section_four_image?>');">
      
    </div>
    </div>
</section>

<section id="subscriber">
    <h2><?=$subscription_heading?></h2>
    <p><?=$subscription_text?></p>
    <div class="subform">
        <!-- <form action="#">
            <div>
            <label for="subname">Name</label>
            <input type="text">
            </div>
             <div>
            <label for="subname">Email</label>
            <input type="email">
            </div>
            <div>
                <button type="submit" class="submitbtn" name="submitter">SUBMIT</button>
            </div>
        </form> -->
        <?php echo do_shortcode('[contact-form-7 id="7a5b222" title="Newsletter_about"]');?>
    </div>
</section>

<?php get_footer(); ?>