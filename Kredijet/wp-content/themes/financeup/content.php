<?php 
/**
 * The template for displaying the content.
 * @package financeup
 */
?>
<div class="col-md-12">
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="ta-blog-post-box">

		<?php
		$post_thumbnail_url = get_the_post_thumbnail( get_the_ID(), 'img-responsive' );
		if ( !empty( $post_thumbnail_url ) ) {
		?>
		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="ta-blog-thumb">
					<?php echo $post_thumbnail_url; ?>
			 
	  		<span class="ta-blog-author img-circle"> <?php echo get_avatar( get_the_author_meta( 'ID') , 150); ?> </span>			
        </a>
		<?php
		}
		?>
		<article class="small">
			<span class="ta-blog-date">
					<span class="h3"><?php echo get_the_date('M'); ?></span>
					<span><?php echo get_the_date('j'); ?></span> 
			</span>
			<h2 class="title"><a title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>">
			  <?php the_title(); ?>
			  </a>
			</h2>
				<?php
				$financeup_more = strpos( $post->post_content, '<!--more' );
				if ( $financeup_more ) :
					echo get_the_content();
				else :
					echo get_the_excerpt();
				endif;
			?>
				<?php wp_link_pages( array( 'before' => '<div class="link">' . __( 'Pages:', 'financeup' ), 'after' => '</div>' ) ); ?>
			<div class="ta-blog-category"> 
				<a href="#"><i class="fa fa-folder-o"></i>
				  <?php   $cat_list = get_the_category_list();
				  if(!empty($cat_list)) { ?>
				  <?php the_category(', '); ?>
				</a>
				<?php } ?>
				<a class="margin-left-10" href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ));?>"><i class="fa fa-user"></i> <?php _e('by','financeup'); ?>
				<?php the_author(); ?>
				</a> 
			</div>
		</article>
		</div>
	</div>
</div>