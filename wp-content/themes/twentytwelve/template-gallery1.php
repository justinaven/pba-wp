<?php
/**
 * Template Name: Gallery-Wide Page Template
 *
 * Description: A page template that provides a key component of WordPress as a CMS
 * by meeting the need for a carefully crafted introductory page. The front page template
 * in Twenty Twelve consists of a page content area for adding text, images, video --
 * anything you'd like -- followed by front-page-only widgets in one or two columns.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

	get_header(); 
	
	$global_img_ratio = 2/3;

	$cat_args = array(
		'type'                     => 'post',
		'child_of'                 => 3,
		'orderby'                  => 'name',
		'order'                    => 'ASC',
		'hide_empty'               => 1,
		'taxonomy'                 => 'category',
		'pad_counts'               => false );
	$categories = get_categories( $cat_args ); 

	global $post; 
	$slug=$post->post_name;
	$content = $post->post_content;
	$cat_id=0;
	foreach ($categories as $category) {
		if($category->slug==$slug){$cat_id=$category->cat_ID;}
	}

	$args = array(
		'posts_per_page'  => 10,
		'numberposts'     => 10,
		'category'        => $cat_id,
		'orderby'         => 'post_date',
		'order'           => 'DESC',
		'post_type'       => 'post',
		'post_status'     => 'publish',
		'suppress_filters' => false );
	$posts_array = get_posts( $args );

?>

<body class="gallery one">
	<?php include "page-top.php"; ?>
	<div class="main-outer">
		<div class="main-inner">
			<div class="max-width content clearfix">

				<div class="cat-title clearfix">
					<h2><?php echo $post->post_title?></h2>
				</div>
				
				<div class="right">
					<div class="slideshow max-width" data-ratio="<?php echo $global_img_ratio;?>">

					 <?php 
						if($cat_id!=0) {
							$count = 1;
				foreach( $posts_array as $post ) :	setup_postdata($posted); if ( has_post_thumbnail() ) { 
					$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
					if($thumb['2']/$thumb['1']>=$global_img_ratio) {$img_class=' height';} else {$img_class=' width';}
			?>
				<div class="img-block<?php if($count==1){?> on<?php $count++; } echo $img_class; ?>">
					<div>
					<?php echo '<img src="'.$thumb['0'].'" width="'.$thumb['1'].'" height="'.$thumb['2'].'">'; ?>
					</div>
				</div>
			<?php } endforeach;
						} 
					?>
					</div>
				</div>	
				<div class="clearfix">
					<div class="text-block">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; // end of the loop. ?>
					</div>
				</div>
			</div>		
		</div>
	</div>

<?php get_footer(); ?>