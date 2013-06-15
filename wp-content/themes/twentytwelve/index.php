<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

 include 'header.php';
	// get_header(); 
	
$global_img_ratio = 2/3;

$args = array(
	'posts_per_page'  => 10,
	'numberposts'     => 10,
	'offset'          => 0,
	'category'        => "22,-23",
	'orderby'         => 'post_date',
	'order'           => 'DESC',
	// 'include'         => '',
	// 'exclude'         => '',
	// 'meta_key'        => '',
	// 'meta_value'      => '',
	'post_type'       => 'post',
	// 'post_mime_type'  => '',
	// 'post_parent'     => '',
	'post_status'     => 'publish',
	'suppress_filters' => false );
$posts_array = get_posts( $args );

?>

<body id="home">
	<?php include "page-top.php"; ?>

	<div class="main-outer">
		<div class="main-inner">
			<div class="slideshow max-width" data-ratio="<?php echo $global_img_ratio;?>">
			<?php 
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
			<?php } endforeach; ?>

			</div>
		</div>
	</div>



<?php get_footer(); ?>