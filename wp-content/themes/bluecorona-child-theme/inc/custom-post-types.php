<?php
/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/
add_action( 'init', 'bc_sherlock_service_post_type', 0 );

/* Creating a function to create our CPT */
function bc_sherlock_service_post_type() {
// Set UI labels for Service Custom Post Type
    $labels = array(
        'name'                => _x( 'Services', 'Post Type General Name', 'bc-sherlock' ),
        'singular_name'       => _x( 'Service', 'Post Type Singular Name', 'bc-sherlock' ),
        'menu_name'           => __( 'Services', 'bc-sherlock' ),
        'parent_item_colon'   => __( 'Parent Service', 'bc-sherlock' ),
        'all_items'           => __( 'All Services', 'bc-sherlock' ),
        'view_item'           => __( 'View Service', 'bc-sherlock' ),
        'add_new_item'        => __( 'Add New Service', 'bc-sherlock' ),
        'add_new'             => __( 'Add New', 'bc-sherlock' ),
        'edit_item'           => __( 'Edit Service', 'bc-sherlock' ),
        'update_item'         => __( 'Update Service', 'bc-sherlock' ),
        'search_items'        => __( 'Search Service', 'bc-sherlock' ),
        'not_found'           => __( 'Not Found', 'bc-sherlock' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'bc-sherlock' ),
    );
// Set other options for Service Custom Post Type
    $args = array(
        'label'               => __( 'services', 'bc-sherlock' ),
        'description'         => __( 'Service reviews', 'bc-sherlock' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt', 'page-attributes'),
        'taxonomies'          => array( 'genres' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */ 
        'hierarchical'        => true,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
    // Registering your Custom Post Type
    register_post_type( 'bc_services', $args );
}

add_action( 'add_meta_boxes', 'bc_service_create_metabox' );
function bc_service_create_metabox() {
    add_meta_box(
        'bc_service_metabox',
        'Show On Home Page', // Title to display
        'bc_service_metabox', // Function to call that contains the metabox content
        'bc_services', // Post type to display metabox on
        'side', // Where to put it (normal = main colum, side = sidebar, etc.)
        'default' // Priority relative to other metaboxes
    );
}

add_action( 'edit_form_after_title', 'bc_service_run_after_title_meta_boxes' );
function bc_service_run_after_title_meta_boxes() {
    global $post, $wp_meta_boxes;
    # Output the `below_title` meta boxes:
    do_meta_boxes( get_current_screen(), 'test', $post );
    unset($wp_meta_boxes['bc_services']['test']);
}

function bc_service_metabox() {
    global $post;
    $show_on_homepage = get_post_meta( $post->ID, 'show_on_homepage', true );
    $bc_button_title = get_post_meta( $post->ID, 'bc_button_title', true );
    ?>
    <div>
        <div>
            <input type="hidden" name="bc_show_on_homepage_metabox" value="false">
            <input type="checkbox" name="bc_show_on_homepage_metabox" value="true" <?php echo  ($show_on_homepage != 'false' ? 'checked': '')?>> Show On Home Page?
        </div>
    </div>
    <div>
        <div>
            <input type="text" name="bc_button_title" required="true" value="<?php echo $bc_button_title;?>">
        </div>
    </div>
 <?php wp_nonce_field( 'bc_service_form_metabox_nonce', 'bc_service_form_metabox_process' );
}

add_action( 'save_post', 'bc_service_save_metabox', 1, 2 );
function bc_service_save_metabox( $post_id, $post ) {
    if ( !isset( $_POST['bc_service_form_metabox_process'] ) ) return;
    if ( !wp_verify_nonce( $_POST['bc_service_form_metabox_process'], 'bc_service_form_metabox_nonce' ) ) {
        return $post->ID;
    }
    if ( !current_user_can( 'edit_post', $post->ID )) { return $post->ID;}
    if ( !isset( $_POST['bc_show_on_homepage_metabox'] ) ) { return $post->ID;}
    $sanitizedposition = wp_filter_post_kses( $_POST['bc_show_on_homepage_metabox'] );

    if ( !isset( $_POST['bc_button_title'] ) ) { return $post->ID;}
    $sanitizedbtntitle = wp_filter_post_kses( $_POST['bc_button_title'] );

    update_post_meta( $post->ID, 'bc_button_title', $sanitizedbtntitle );
    update_post_meta( $post->ID, 'show_on_homepage', $sanitizedposition );
}

