<?php
/**
 * Template Name: Front Page Template
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
?>

<body class="category2">
	<?php include "page-top.php"; ?>
	<div class="main-outer">
		<div class="main-inner">
			<div class="max-width content clearfix">
				<div class="left">
						<?php if ( has_post_thumbnail() ) : ?>
							<div class="img-block">
								<div><?php the_post_thumbnail('full');?></div>
							</div>
						<?php endif; ?>
				</div>
				<div class="content">

<?php 	while ( have_posts() ) : the_post(); ?>
						<?php the_content(); ?>
<?php endwhile; ?>
				</div>
			</div>
		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>