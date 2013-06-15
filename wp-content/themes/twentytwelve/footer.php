<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

$args = array(
	'sort_order' => 'ASC',
	'sort_column' => 'post_title',
	'child_of' => 36, // 36 is local & 47 is live
	'post_type' => 'page',
	'post_status' => 'publish'
); 
$pages = get_pages($args); 
$cat_args = array(
	'type'                     => 'post',
	'child_of'                 => 3, // 3 is local & 2 is live
	'orderby'                  => 'name',
	'order'                    => 'ASC',
	'hide_empty'               => 1,
	'taxonomy'                 => 'category',
	'pad_counts'               => false );
$categories = get_categories( $cat_args ); 


?>

	<div class="page-bottom">
		<div class="nav-bar max-width">

			<ul class="nav clearfix">
				<li><a href="/">Home</a></li>
				<li class="no-link"><a class="sub-nav-head" href="#">Galleries</a>
					<ul class="sub-nav">
						<?php 
						  	foreach ($pages as $page) {
						  		foreach ($categories as $category) {
						  			if($category->slug==$page->post_name){
									  	$nav_item = '<li><a href="/galeries/'.$page->post_name.'">'.$page->post_title.'</a></li>';
										echo $nav_item;
									}
								}
							}
						?>
					</ul>
				</li>
				<!-- <li><a href="/about">About</a></li> -->
				<li><a href="/contact">Contact</a></li>
				<li><a href="/client-review">Client Review</a></li>
			</ul> 
			 
		</div>
	</div>

</body>
</html>