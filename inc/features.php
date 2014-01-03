<?php
add_filter( 'wp_page_menu_args', 'home_page_menu_args' );
function home_page_menu_args( $args ) {
    $args['show_home'] = true;
    return $args;
}

add_filter( 'wp_nav_menu_args', 'my_wp_nav_menu_args' );
function my_wp_nav_menu_args( $args = '' ) {
    $args['container'] = false;
    return $args;
}

add_filter('the_excerpt', 'excerpt_read_more_link');
function excerpt_read_more_link($output) {
    global $post;
    return $output . '<a href="'. get_permalink($post->ID) . '"> Read More...</a>';
}

function getYouTubeThumbnail($videoId) {
    $thumbnail = "http://img.youtube.com/vi/".$videoId."/0.jpg";
    return $thumbnail;
}

function be_exclude_post_formats_from_blog( $query ) {

    if( $query->is_main_query() && $query->is_home() ) {
        $tax_query = array( array(
            'taxonomy' => 'post_format',
            'field' => 'slug',
            'terms' => array(
                'post-format-aside',
                //'post-format-image',
                'post-format-audio',
                'post-format-quote',
                'post-format-link'
            ),
            'operator' => 'NOT IN',
        ) );
        $query->set( 'tax_query', $tax_query );
        $query->set( 'cat', '-8,-1' );
    }

}
add_action( 'pre_get_posts', 'be_exclude_post_formats_from_blog' );

add_filter( 'widget_tag_cloud_args', 'my_filter_tag_cloud' );
function my_filter_tag_cloud( $args ) {
    $args['separator'] = ' - ';
    return $args;
}


add_filter( 'script_loader_src', 'remove_src_version' );
add_filter( 'style_loader_src', 'remove_src_version' );

function remove_src_version ( $src ) {

    global $wp_version;

    $version_str = '?ver='.$wp_version;
    $version_str_offset = strlen( $src ) - strlen( $version_str );

    if( substr( $src, $version_str_offset ) == $version_str )
        return substr( $src, 0, $version_str_offset );
    else
        return $src;

}



//$result = add_role(
//    'photo_contributor',
//    __( 'Photo Contributor' ),
//    array(
//        'read'         => true,
//        'edit_posts'   => true,
//        'delete_posts' => false,
//        'upload_files' => true
//    )
//);
//if ( null !== $result ) {
//    echo 'Yay! New role created!';
//}
//else {
//    echo 'Oh... the basic_contributor role already exists.';
//}

//remove_role( 'photo_contributor' );


//add_action('after_setup_theme', 'remove_admin_bar');
//function remove_admin_bar() {
//    if (!current_user_can('administrator')) {
//        show_admin_bar(false);
//    }
//}
/*
 * TODO: fix this for redirecting non-admins from wp-admin area
 * this is messing up the stream as of now.
 */
//add_action( 'admin_init', 'redirect_non_admin_users' );
//function redirect_non_admin_users() {
//    if ( ! current_user_can( 'manage_options' )) {
//        wp_redirect( home_url() );
//        exit;
//    }
//}