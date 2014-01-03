<?php

add_theme_support( 'woocommerce' );


// Remove stock wrappers
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

// Add 2014 compatible wrappers
add_action( 'woocommerce_before_main_content', 'wc_twentyfourteen_wrapper', 10 );
add_action( 'woocommerce_after_main_content', 'wc_twentyfourteen_wrapper_close', 10 );

function wc_twentyfourteen_wrapper() {
    echo '<div id="primary" class="content-area"><div id="content" role="main" class="site-content twentyfourteen"><div class="tfwc">';
}

function wc_twentyfourteen_wrapper_close() {
    echo '</div></div></div>';
    get_sidebar( 'content' );
}

// Add 2014 compatibility css
add_action( 'wp_footer', 'wc_twentyfourteen_css' );

function wc_twentyfourteen_css() {
    if ( is_shop() || is_product_category() || is_product_taxonomy() || is_product_tag() || is_product() ) {
        ?>
        <style type="text/css">
            .twentyfourteen .tfwc {
                padding: 12px 10px 0;
                max-width: 474px;
                margin: 0 auto;
            }

            .twentyfourteen .tfwc .entry-summary {
                padding: 0 !important;
                margin: 0 0 1.618em !important;
            }

            .full-width .twentyfourteen .tfwc {
                margin-right: auto;
            }

            @media screen and (min-width: 673px) {
                .twentyfourteen .tfwc {
                    padding-right: 30px;
                    padding-left: 30px;
                }
            }

            @media screen and (min-width: 1040px) {
                .twentyfourteen .tfwc {
                    padding-right: 15px;
                    padding-left: 15px;
                }
            }

            @media screen and (min-width: 1110px) {
                .twentyfourteen .tfwc {
                    padding-right: 30px;
                    padding-left: 30px;
                }
            }

            @media screen and (min-width: 1218px) {
                .twentyfourteen .tfwc {
                    margin-right: 54px;
                }
            }
        </style>
    <?php
    }
}

function wooCustomerFirstName() {
    global $wpdb;
    global $current_user;
    get_currentuserinfo();

    $results = $wpdb->get_results("
        SELECT *
        FROM $wpdb->usermeta
        WHERE $wpdb->usermeta.user_id = $current_user->ID
        AND $wpdb->usermeta.meta_key = 'billing_first_name'
        ",
        ARRAY_A
    );
    foreach($results as $result) {
        return $result["meta_value"];
    }
}