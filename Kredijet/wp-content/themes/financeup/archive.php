<?php
/**
 * The template for displaying archive pages.
 *
 * @package financeup
 */

get_header(); ?>
  
<!-- Breadcrumb -->
<div class="ta-breadcrumb-section">
  <div class="overlay">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="ta-breadcrumb-title">
            <?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
			?>
          </div>
			<div>
            <ul class="ta-page-breadcrumb">
              <?php if (function_exists('financeup_custom_breadcrumbs')) financeup_custom_breadcrumbs();?>
            </ul>
			</div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /End Breadcrumb -->
<main id="content">
  <div class="container">
    <div class="row">
      <div class="<?php echo ( !is_active_sidebar( 'sidebar-1' ) ? '12' :'9' ); ?> col-md-9 col-sm-8">
        <div class="row">
			<?php 
			if( have_posts() ) :
			while( have_posts() ): the_post();
			get_template_part('content',''); 
			endwhile; endif;
			?>
          <div class="col-md-12 text-center">
          <?php
			//Previous / next page navigation
			the_posts_pagination( array(
			'prev_text'          => '<i class="fa fa-long-arrow-left"></i>',
			'next_text'          => '<i class="fa fa-long-arrow-right"></i>',
			'screen_reader_text' => ' ',
			) );
			?>
          </div>
        </div>
      </div>
	  <aside class="col-md-3 col-sm-4">
        <?php get_sidebar(); ?>
      </aside>
    </div>
  </div>
</main>
<?php get_footer(); ?>