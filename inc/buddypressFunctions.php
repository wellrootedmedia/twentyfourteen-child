<?php
/*
 * THIS IS FOR MENU ADMIN BAR AT TOP RIGHT OF PAGE.
 */
//function your_bp_admin_bar_add() {
//    global $wp_admin_bar, $bp;
//
//    $user_domain = bp_loggedin_user_domain();
//    $item_link = trailingslashit( $user_domain . 'dogs' );
//
//    $title = __( '  Dogs', 'buddypress' );
//
//    $wp_admin_bar->add_menu( array(
//        'parent'  => $bp->my_account_menu_id,
//        'id'      => 'my-account-dogs',
//        'title'   => $title,
//        'href'    => trailingslashit( $item_link )
//    ) );
//}
//add_action( 'bp_setup_admin_bar', 'your_bp_admin_bar_add', 300 );

/*
 * custom removal of item links
 */
add_action('bp_setup_nav', 'mb_bp_profile_menu_posts', 301 );
function mb_bp_profile_menu_posts() {
    global $bp;
    // Change the order of menu items
    $bp->bp_nav["profile"]["position"] = 10;
    $bp->bp_nav['messages']['position'] = 100;

    // Remove a menu item links from page
    $bp->bp_nav['groups'] = false;
    $bp->bp_nav['settings'] = false;
    $bp->bp_nav['notifications'] = false;
}

/*
 * Added woocommerce submenu billing to profile edit
 */
add_action('bp_setup_nav', 'mb_bp_profile_submenu_posts', 302 );
function mb_bp_profile_submenu_posts() {
    global $bp;
    if(!is_user_logged_in()) return '';
    if ( is_plugin_active( "woocommerce/woocommerce.php" ) ) {
        bp_core_new_subnav_item(
            array(
                'name' => 'Billing',
                'slug' => 'billing',
                'parent_url' => $bp->loggedin_user->domain . $bp->bp_nav['profile']['slug'] . '/',
                'parent_slug' => $bp->bp_nav['profile']['slug'],
                'position' => 10,
                'screen_function' => 'mb_author_billing'
            )
        );
    }
}
function mb_author_billing() {
    add_action( 'bp_template_content', 'mb_show_billing' );
    bp_core_load_template( apply_filters( 'bp_core_template_plugin', 'members/single/plugins' ) );
}
function mb_show_billing() {
    global $woocommerce;

    $customer_id = get_current_user_id();

    if ( get_option('woocommerce_ship_to_billing_address_only') == 'no' ) {
        $page_title = apply_filters( 'woocommerce_my_account_my_address_title', __( 'My Addresses', 'woocommerce' ) );
        $get_addresses    = array(
            'billing' => __( 'Billing Address', 'woocommerce' ),
            'shipping' => __( 'Shipping Address', 'woocommerce' )
        );
    } else {
        $page_title = apply_filters( 'woocommerce_my_account_my_address_title', __( 'My Address', 'woocommerce' ) );
        $get_addresses    = array(
            'billing' =>  __( 'Billing Address', 'woocommerce' )
        );
    }

    $col = 1;
    ?>

    <?php if ( get_option('woocommerce_ship_to_billing_address_only') == 'no' ) echo '<div class="col2-set addresses">'; ?>
    <?php foreach ( $get_addresses as $name => $title ) : ?>

        <div class="col-<?php echo ( ( $col = $col * -1 ) < 0 ) ? 1 : 2; ?> address">
            <header class="title">
                <h3><?php echo $title; ?></h3>
                <a href="<?php echo esc_url( add_query_arg('address', $name, get_permalink(woocommerce_get_page_id( 'edit_address' ) ) ) ); ?>" class="edit"><?php _e( 'Edit', 'woocommerce' ); ?></a>
            </header>
            <address>
                <?php
                $address = apply_filters( 'woocommerce_my_account_my_address_formatted_address', array(
                    'first_name' 	=> get_user_meta( $customer_id, $name . '_first_name', true ),
                    'last_name'		=> get_user_meta( $customer_id, $name . '_last_name', true ),
                    'company'		=> get_user_meta( $customer_id, $name . '_company', true ),
                    'address_1'		=> get_user_meta( $customer_id, $name . '_address_1', true ),
                    'address_2'		=> get_user_meta( $customer_id, $name . '_address_2', true ),
                    'city'			=> get_user_meta( $customer_id, $name . '_city', true ),
                    'state'			=> get_user_meta( $customer_id, $name . '_state', true ),
                    'postcode'		=> get_user_meta( $customer_id, $name . '_postcode', true ),
                    'country'		=> get_user_meta( $customer_id, $name . '_country', true )
                ), $customer_id, $name );

                $formatted_address = $woocommerce->countries->get_formatted_address( $address );

                if ( ! $formatted_address )
                    _e( 'You have not set up this type of address yet.', 'woocommerce' );
                else
                    echo $formatted_address;
                ?>
            </address>
        </div>

    <?php endforeach; ?>
    <?php if ( get_option('woocommerce_ship_to_billing_address_only') == 'no' ) echo '</div>'; ?>
<?php
}