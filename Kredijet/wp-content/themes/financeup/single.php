
<!-- =========================
     Page Breadcrumb   
============================== -->
<?php get_header(); ?>
<div class="ta-breadcrumb-section blog-page-bread" style='background: url("<?php echo( has_header_image() ? get_header_image() : get_theme_support( 'custom-header', 'default-image' ) ); ?>") no-repeat scroll 0 0 /cover center center;'>
  <div class="overlay"  style="background-color:<?php echo $financeup_overlay_color_control;?>"> 
    <div class="container">
      <div class="row">
          <div class="col-md-12 col-sm-12">
            <ul class="ta-page-breadcrumb">
              <?php if (function_exists('financeup_custom_breadcrumbs')) financeup_custom_breadcrumbs();?>
            </ul>
            <div class="ta-breadcrumb-title">
              <h1><?php the_title(); ?></h1>
            </div>
              <div class="ta-blog-category"> 
                  <i class="fa fa-clock-o"></i> <?php echo get_the_date('j'); ?> <?php echo get_the_date('M'); ?>&nbsp;
                  <i class="fa fa-folder-o margin-left-10"></i>&nbsp;
                  <?php $cat_list = get_the_category_list();
                  if(!empty($cat_list)) { ?> <?php the_category(', '); ?>
                  <?php } ?> 

                  <a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ));?>">
                    <i class="fa fa-user"></i> <?php the_author(); ?>
                  </a>
                </div>
          </div>
        </div>
    </div>
  </div>
</div>
<div class="clearfix"></div>
<!-- =========================
     Page Content Section      
============================== -->
 <main id="content">
  <div class="container">
    <div class="row"> 
      <!--/ Main blog column end -->
      <div class="col-md-<?php echo ( !is_active_sidebar( 'sidebar-1' ) ? '12' :'9' ); ?> col-md-9 col-sm-8">
        <div class="row">
		      <?php if(have_posts())
		        {
		      while(have_posts()) { the_post(); ?>
          <div class="col-md-12">
            <div class="ta-blog-post-box"> <a href="#" class="ta-blog-thumb">
			        <?php if(has_post_thumbnail()): ?>
			         <?php $defalt_arg =array('class' => "img-responsive"); ?>
			         <?php the_post_thumbnail('', $defalt_arg); ?>
			        <?php endif; ?></a>
              <article class="small">
                <span class="ta-blog-date">
                    <span class="h3"><?php echo get_the_date('M'); ?></span>
                    <span><?php echo get_the_date('j'); ?></span> 
                  </span>
                <h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <?php the_content(); ?>
              </article>
            </div>
          </div>
		      <?php } ?>
          <div class="col-md-12">
            <div class="media ta-info-author-block"> <a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ));?>" class="ta-author-pic"> <?php echo get_avatar( get_the_author_meta( 'ID') , 150); ?> </a>
              <div class="media-body">
                <h4 class="media-heading"><span><i class="fa fa-user"></i><?php _e('By','financeup'); ?></span><a href "<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ));?>"><?php the_author(); ?></a></h4>
                <p><?php the_author_meta( 'description' ); ?></p>
                <div class="row">
                  <div class="col-md-6 col-pad7">
                    <ul class="list-inline info-author-social">
          					<?php 
          					$facebook_profile = get_the_author_meta( 'facebook_profile' );
          					if ( $facebook_profile && $facebook_profile != '' ) {
          					echo '<li class="facebook"><a href="' . esc_url($facebook_profile) . '"><i class="fa fa-facebook-square"></i></a></li>';
          					} 
					
          					$twitter_profile = get_the_author_meta( 'twitter_profile' );
          					if ( $twitter_profile && $twitter_profile != '' ) 
          					{
          					echo '<li class="twitter"><a href="' . esc_url($twitter_profile) . '"><i class="fa fa-twitter-square"></i></a></li>';
          					}
					
          					$google_profile = get_the_author_meta( 'google_profile' );
          					if ( $google_profile && $google_profile != '' ) {
          					echo '<li class="googleplus"><a href="' . esc_url($google_profile) . '" rel="author"><i class="fa fa-google-plus-square"></i></a></li>';
          					}
          					$linkedin_profile = get_the_author_meta( 'linkedin_profile' );
          					if ( $linkedin_profile && $linkedin_profile != '' ) {
          					   echo '<li class="linkedin"><a href="' . esc_url($linkedin_profile) . '"><i class="fa fa-linkedin-square"></i></a></li>';
          					}
          					?>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
		      <?php } ?>
         <?php comments_template('',true); ?>
        </div>
      </div>
      <div class="col-md-3 col-sm-4">
      <?php get_sidebar(); ?>
      </div>
    </div>
    <!--/ Row end --> 
  </div>
</main>
<?php get_footer(); ?>