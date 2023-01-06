<?php
/**
 * The template part for Middle Header
 *
 * @package VW Church
 * @subpackage vw-church
 * @since vw-church 1.0
 */
?>

<div class="top-bar">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-12 align-self-center text-lg-start text-center">
        <?php dynamic_sidebar('social-widget'); ?>
      </div>
      <div class="col-lg-4 col-md-12 align-self-center">
        <div class="logo text-center">
          <?php if ( has_custom_logo() ) : ?>
            <div class="site-logo"><?php the_custom_logo(); ?></div>
          <?php endif; ?>
          <?php $blog_info = get_bloginfo( 'name' ); ?>
            <?php if ( ! empty( $blog_info ) ) : ?>
              <?php if ( is_front_page() && is_home() ) : ?>
                <?php if( get_theme_mod('vw_church_logo_title_hide_show',true) == 1){ ?>
                  <h1 class="site-title mb-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <?php } ?>
              <?php else : ?>
                <?php if( get_theme_mod('vw_church_logo_title_hide_show',true) == 1){ ?>
                  <p class="site-title mb-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                <?php } ?>
              <?php endif; ?>
            <?php endif; ?>
            <?php
              $description = get_bloginfo( 'description', 'display' );
              if ( $description || is_customize_preview() ) :
            ?>
            <?php if( get_theme_mod('vw_church_tagline_hide_show',true) == 1){ ?>
              <p class="site-description mb-0">
                <?php echo esc_html($description); ?>
              </p>
            <?php } ?>
          <?php endif; ?>
        </div>
      </div>
      <div class="col-lg-4 col-md-12 align-self-center phone text-lg-start text-center">
        <?php if(get_theme_mod('vw_church_phone_text') != '') {?>
          <p class="mb-0"><i class="fas fa-phone me-2"></i><?php echo esc_html(get_theme_mod('vw_church_phone_text')); ?></p>
        <?php }?>
        <?php if(get_theme_mod('vw_church_phone_number') != '') {?>
          <a href="tel:<?php echo esc_attr(get_theme_mod('vw_church_phone_number')) ?>"><?php echo esc_html(get_theme_mod('vw_church_phone_number')) ?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('vw_church_phone_number')) ?></span></a>
        <?php }?>
      </div>
    </div>
  </div>
</div>