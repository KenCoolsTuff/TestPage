<?php
/**
 * The template part for Middle Header
 *
 * @package VW Church
 * @subpackage vw-church
 * @since vw-church 1.0
 */
?>

<div class="main-header">
  <div class="container">
    <div class="header-bg">
      <div class="row">
        <div class="col-lg-2 col-md-3 col-12 align-self-center">
          <div class="header-search">
            <?php get_search_form(); ?>
          </div>
        </div>
        <div class="col-lg-8 col-md-6 align-self-center">
          <?php get_template_part('template-parts/header/navigation'); ?>
        </div>
        <div class="col-lg-2 col-md-3 ps-md-0 donate-btn align-self-center text-md-end text-center">
          <?php if(get_theme_mod('vw_church_donate_button_text') != '' || get_theme_mod('vw_church_donate_button_link') != ''){ ?>
            <a href="<?php echo esc_url(get_theme_mod('vw_church_donate_button_link')); ?>"><?php echo esc_html(get_theme_mod('vw_church_donate_button_text')); ?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('vw_church_donate_button_text')); ?></span></a>
          <?php }?>
        </div>
      </div>
    </div>
  </div>
</div>