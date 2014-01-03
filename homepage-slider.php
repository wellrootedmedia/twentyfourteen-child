<?php
global $wpdb;
$query = "SELECT DISTINCT $wpdb->postmeta.post_id, $wpdb->postmeta.meta_key, $wpdb->postmeta.meta_value, $wpdb->posts.ID
FROM $wpdb->postmeta, 2012wrm07_posts
WHERE $wpdb->postmeta.post_id = 2012wrm07_posts.ID
AND $wpdb->postmeta.meta_key = '_thumbnail_id'
AND $wpdb->posts.post_type = 'post'
ORDER BY $wpdb->posts.ID DESC
LIMIT 0, 10";
$resutls = $wpdb->get_results($query, OBJECT);
?>
    
<div class="slider-wrapper">
    <div id="slider">
		<?php
		$thumbs = array();
		$i = 1;
		foreach($resutls as $image) {
		    $thumb = get_the_post_thumbnail($image->post_id, 'medium');
		    ?>
		    <div class="slide<?php _e($i); ?>">
		    	<?php _e($thumb); ?>
		    </div>
		    <?php
		    $i++;
		}
		wp_reset_query();
		?>
    </div>
    <div id="slider-direction-nav"></div>
    <div id="slider-control-nav"></div>
</div>