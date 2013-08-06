<?php
/**
 * Template Name: Client Review Page Template
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


 include 'header.php';

	$cat_args = array(
		'type'                     => 'post',
		'child_of'                 => 2, // 3 is local & 2 is live
		'orderby'                  => 'name',
		'order'                    => 'DESC',
		'hide_empty'               => 0,
		'taxonomy'                 => 'category',
		'pad_counts'               => false );
	$categories = get_categories( $cat_args ); 

	// global $post; 
	// $slug=$post->post_name;
	// $content = $post->post_content;
	// $cat_id=0;
	// foreach ($categories as $category) {
	// 	if($category->slug==$slug){$cat_id=$category->cat_ID;}
	// }

 	$args = array(
	'posts_per_page'  => '',
	'numberposts'     => '',
	'category'        => 23, // 23 is local & 13 is live
	'orderby'         => 'name',
	'order'           => 'DESC',
	'post_type'       => 'post',
	'post_status'     => 'publish',
	'suppress_filters' => true );
	$posts_array = get_posts( $args );
?>

<body class="clients">
	<?php include "page-top.php"; ?>
	<div class="main-outer">
		<div class="main-inner">
			<div class="max-width content clearfix">
				<div class="cat-title clearfix">
					<h2>Client Review</h2>
				</div>
				<div class="client-list-block" style="color:white;">

			<?php 
				// init array to store client name, url, and category
				$main_array = array();
				// loop through posts to populate main_array
				foreach( $posts_array as $post ) :	setup_postdata($posted); {
					$category = get_the_category(); 
					$actual_cat = '';
					if($category[0]->cat_name<>'Client Review')
						{ $actual_cat = $category[0]->cat_name; } 
					else { $actual_cat = $category[1]->cat_name;}
					$main_array[] = array('category' => $actual_cat, 'title' => $post->post_title, 'url' => $post->post_content);
				} endforeach; 

				// establish array to sort main_array by 'title'
				$new_main = array(); 
				foreach ($main_array as $stuff) {
				    $new_main[] = $stuff['title']; }
				// sort main_array by 'title'
				array_multisort($new_main, SORT_ASC, $main_array);

				// establish array to sort main_array by 'category'
				$new_main2 = array(); 
				foreach ($main_array as $stuff) {
				    $new_main2[] = $stuff['category']; }
				// sort main_array by 'category'
				array_multisort($new_main2, SORT_ASC, $main_array);

				$cat_count = 1;
				$cat_name = '';
				// loop through sorted array into html
				foreach ($main_array as $sorted) {
				    if($cat_count == 1) {
						$cat_count++;
						echo '<h3 class="cat-head">'.$sorted['category'].'</h3>';
						echo '<ul>';
						$cat_name = $sorted['category'];

				    } elseif ($cat_name <> $sorted['category']) {
						echo '</ul>';
						echo '<h3 class="cat-head">'.$sorted['category'].'</h3>';
						echo '<ul>';
						$cat_name = $sorted['category'];
				    } 
					echo '<li><a href="'.$sorted['url'].'">'.$sorted['title'].'</a></li>';
				} // end foreach
				echo '</ul>';
			?>


				</div>
			</div>		
		</div>
	</div>

<?php get_footer(); ?>

