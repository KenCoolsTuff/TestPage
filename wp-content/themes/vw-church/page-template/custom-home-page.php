<?php
/**
 * Template Name: Custom Home Page
 */

get_header(); ?>

<main id="maincontent" role="main">
  <?php do_action( 'vw_church_before_slider' ); ?>

  <?php if( get_theme_mod( 'vw_church_slider_hide_show', false) == 1 || get_theme_mod( 'vw_church_resp_slider_hide_show', false) == 1) { ?>
    <section id="slider"> 
      <?php if(get_theme_mod('vw_church_slider_type', 'Default slider') == 'Default slider' ){ ?>       
        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel" data-bs-interval="<?php echo esc_attr(get_theme_mod( 'vw_church_slider_speed',4000)) ?>">
          <?php $vw_church_pages = array();
            for ( $count = 1; $count <= 3; $count++ ) {
              $mod = intval( get_theme_mod( 'vw_church_slider_page' . $count ));
              if ( 'page-none-selected' != $mod ) {
                $vw_church_pages[] = $mod;
              }
            }
            if( !empty($vw_church_pages) ) :
              $args = array(
                'post_type' => 'page',
                'post__in' => $vw_church_pages,
                'orderby' => 'post__in'
              );
              $query = new WP_Query( $args );
              if ( $query->have_posts() ) :
                $i = 1;
          ?>
          <div class="carousel-inner" role="listbox">
            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
              <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
                <?php if(has_post_thumbnail()){
                  the_post_thumbnail();
                } else{?>
                  <img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/block-patterns/images/banner.png" alt="" />
                <?php } ?>
                <div class="carousel-caption">
                  <div class="inner_carousel">
                    <h1 class="wow slideInRight delay-1000" data-wow-duration="2s"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                    <div class="more-btn my-3 my-lg-4 my-md-4 wow slideInRight delay-1000" data-wow-duration="2s">
                      <a href="<?php the_permalink(); ?>"><?php echo esc_html('Read More','vw-church');?><span class="screen-reader-text"><?php echo esc_html('Read More','vw-church');?></span></a>
                    </div>
                  </div>
                </div>
              </div>
            <?php $i++; endwhile; 
            wp_reset_postdata();?>
          </div>
          <?php else : ?>
            <div class="no-postfound"></div>
          <?php endif;
          endif;?>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" id="prev" data-bs-slide="prev">
          <i class="fas fa-angle-left"></i>
          <span class="screen-reader-text"><?php echo esc_html('Previous','vw-church'); ?></span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next" id="next">
          <i class="fas fa-angle-right"></i>
          <span class="screen-reader-text"><?php echo esc_html('Next','vw-church'); ?></span>
          </button>
        </div> 
        <?php } else if(get_theme_mod('vw_church_slider_type', 'Advance slider') == 'Advance slider'){?>
          <?php echo do_shortcode(get_theme_mod('vw_church_advance_slider_shortcode')); ?>
        <?php } ?>
    </section>
  <?php }?>

  <?php do_action( 'vw_church_after_slider' ); ?>

  <?php if( get_theme_mod( 'vw_church_events_small_title', false) == 1 || get_theme_mod( 'vw_church_events_heading', false) == 1 || get_theme_mod( 'vw_church_events_category', false) == 1) { ?>
    <section id="events-section" class="py-5 wow bounceInDown delay-1000" data-wow-duration="3s">
      <div class="container">
        <div class="events-head text-center mb-5">
          <?php if( get_theme_mod('vw_church_events_small_title') != '' ){ ?>
            <strong class="d-block mb-1"><?php echo esc_html(get_theme_mod('vw_church_events_small_title',''));?></strong>
          <?php }?>
          <?php if( get_theme_mod('vw_church_events_heading') != '' ){ ?>
            <h2 class="heading-text"><?php echo esc_html(get_theme_mod('vw_church_events_heading',''));?></h2>
          <?php }?>
        </div>
        <div class="row">
          <?php
            $vw_church_catdata=  get_theme_mod('vw_church_events_category');
            if($vw_church_catdata){
          $page_query = new WP_Query(array( 'category_name' => esc_html($vw_church_catdata ,'vw-church'))); ?>         
            <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
              <div class="col-lg-4 col-md-4">
                <div class="events-box mb-4">
                  <div class="image-box">
                    <?php the_post_thumbnail(); ?>
                    <?php if( get_post_meta($post->ID, 'vw_church_date', true) ) {?>
                      <span class="event-date"><?php echo esc_html(get_post_meta($post->ID,'vw_church_date',true)); ?></span>
                    <?php }?>
                    <h3 class="mt-3 mt-md-0 mt-lg-0 mb-0"><a href="<?php the_permalink(); ?>"><?php the_title(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a></h3>
                  </div>
                  <?php if( get_post_meta($post->ID, 'vw_church_location', true) ) {?>
                    <span class="event-location"><i class="fas fa-location-arrow me-2"></i><?php echo esc_html(get_post_meta($post->ID,'vw_church_location',true)); ?></span>
                  <?php }?>
                  <div class="author-time">
                    <span class="event-author"><i class="fas fa-user me-2"></i><?php the_author(); ?></span>
                    <?php if( get_post_meta($post->ID, 'vw_church_time', true) ) {?>
                      <span class="event-time"><i class="fas fa-clock me-2"></i><?php echo esc_html(get_post_meta($post->ID,'vw_church_time',true)); ?></span>
                    <?php }?>
                  </div>
                </div>
              </div>
            <?php endwhile;
            wp_reset_postdata();}
          ?>
          <?php if(get_theme_mod('vw_church_events_button_text') != '' || get_theme_mod('vw_church_events_button_link') != '') {?>
            <div class="more-btn my-3 text-center">
              <a href="<?php echo esc_url(get_theme_mod('vw_church_events_button_link'));?>"><?php echo esc_html(get_theme_mod('vw_church_events_button_text'));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('vw_church_events_button_text'));?></span></a>
            </div>
          <?php }?>
        </div>
      </div>
    </section>
  <?php }?>

  <?php do_action( 'vw_church_after_events_section' ); ?>

  <div id="content-vw" class="entry-content py-3">
    <div class="container">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; // end of the loop. ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>