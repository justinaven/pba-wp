<?php
/**
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
		'child_of'                 => 3,
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
	'category'        => 23, 
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
					<h2>Clint Review<?php the_title(); ?></h2>
				</div>
				<div class="client-list-block" style="color:white;">

			<?php 

// 				foreach( $posts_array as $post ) :	setup_postdata($posted); {
// $category = get_the_category(); 
// if($category[0]->cat_name<>'Client Review'){
// echo '<a href="'.get_category_link($category[0]->term_id ).'">'.$category[0]->cat_name.'</a>';
// } else {
// echo '<a href="'.get_category_link($category[1]->term_id ).'">'.$category[1]->cat_name.'</a>';
// }
// 					echo '<a href="'.$post->post_content.'">'.$post->post_title.$post->post_content.'</a>';

// 					echo '<br>';
// 				} endforeach; 



				// foreach( $posts_array as $post ) :	setup_postdata($posted); {
				// 	$category = get_the_category(); 
				// 	echo '<p>';
				// 	if($category[0]->cat_name<>'Client Review'){
				// 	echo $category[0]->cat_name;
				// 	} else {
				// 	echo $category[1]->cat_name;
				// 	}
				// 	echo '/'.$post->post_content.'/'.$post->post_title.$post->post_content;

				// 	echo '</p><br>';
				// } endforeach; 


echo '<br><br>';
$main_array = array();

foreach( $posts_array as $post ) :	setup_postdata($posted); {
	$category = get_the_category(); 
	$actual_cat = '';
	if($category[0]->cat_name<>'Client Review'){
		$actual_cat = $category[0]->cat_name;
	} else {
		$actual_cat = $category[1]->cat_name;
	}
	echo $actual_cat.' / '.$post->post_title.'<br>';
$main_array[] = array('category' => $actual_cat, 'title' => $post->post_title, 'url' => $post->post_content);



				} endforeach; 
echo '<br><br>';



$new_main = array(); 
foreach ($main_array as $stuff) {
    $new_main[] = $stuff['title'];
}

array_multisort($new_main, SORT_ASC, $main_array);

foreach ($main_array as $sorted) {
    echo $sorted['category'].' / '.$sorted['title'].'<br>';
}



echo '<br><br>';

$new_main2 = array(); 
foreach ($main_array as $stuff) {
    $new_main2[] = $stuff['category'];
}

array_multisort($new_main2, SORT_ASC, $main_array);

foreach ($main_array as $sorted) {
    echo $sorted['category'].' / '.$sorted['title'].'<br>';
}




			?>



				</div>
			</div>		
		</div>
	</div>

<?php get_footer(); ?>

