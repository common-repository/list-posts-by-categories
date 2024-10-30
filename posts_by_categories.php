<?php
/*
Plugin Name: List Posts by Categories
Plugin URI: http://wordpress.org/extend/plugins/list-posts-by-categories/
Version: 0.1
Description: Displays a list of posts in one or more categories (with OR,AND logic between categories). Please read <a href="http://wordpress.org/extend/plugins/list-posts-by-categories/">the plugin page</a> for installation and usage.
Author: Manuel Pérez López
Author URI: http://www.ieduca.net/
*/ 

//Basic usage: insert a shortcode into a post or page like this; 
// [postsbycategories array1cat="category1,category2" array2cat="category3" sortby="title|date" order="ASC|DESC" posts_per_page="-1|X"]


add_shortcode( 'postsbycategories', 'postsbycategories_func' );




function postsbycategories_func( $atts, $content=null, $code="" ) {
	extract( shortcode_atts( array(
		'array1cat' => array(), //array with names of categories (OR logic betwen categories in array)(AND logic betwen array1cat and array2cat)
		'array2cat' => array(), //array with names of categories (OR logic betwen categories in array)(AND logic betwen array1cat and array2cat)
		'sortby' => 'date', // date, title
		'order' => 'DESC', // ASC, DESC
		'posts_per_page' => '-1' // -1 for all, or a number to limit 
	), $atts ) );

	return listposts($atts, $content, $code);
}





function listposts ($atts, $content=null, $code="") {
$result= "";

// si no se ha especificado al menos una categoría devolvemos error
if (empty($atts['array1cat']) and empty($atts['array2cat'])) {
	return "<p>Error: must be one or more categories.</p>";
} else {
	// si una de las dos está vacía, se copia una en otra para que el AND sea verdadero
	if (empty($atts['array1cat'])) $atts['array1cat']=$atts['array2cat'];
	if (empty($atts['array2cat'])) $atts['array2cat']=$atts['array1cat'];
}

$cat = new WP_query();
$cat->query("posts_per_page=".$atts['posts_per_page']."&orderby=".$atts['sortby']."&order=".$atts['order']);
// The Loop
if ( $cat->have_posts() ) : while ( $cat->have_posts() ) : $cat->the_post();
//print_r (split(",",$atts['array1cat']));
if ( in_category(explode(",",$atts['array1cat'])) and in_category(explode(",",$atts['array2cat'])) ) {
	$result.= "<li><a href='"; 
        $result.= get_permalink();
        $result.= "'>";
        $result.= get_the_time(get_option('date_format')); //especificar 'd/m/Y' o bien para hacerlo multilenguaje mejor usar get_the_time(get_option('date_format'));
        $result.=  " - ";
        $result.= get_the_title();
        $result.=  "</a></li><br>";
}
endwhile; else:
$result.=  "<p>Error: no posts into this categories.</p>";
endif;

// Reset Query
wp_reset_query();

return $result;
}


?>
