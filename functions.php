<?php

// Enqueue parent style sheet 

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' ); wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array('parent-style'), wp_get_theme()-> get('Version') );
} // my_theme_enqueue_styles


/**
* Documentation for pagination function.
*/
function twentynineteen_the_posts_navigation() {
    the_posts_pagination(
        array(
            'mid_size'  => 2,
            'prev_text' => '&laquo; <span class="nav-prev-text">Newer</span>',
            'next_text' => '<span class="nav-next-text">Older</span> &raquo;',
        )
    );
} // end paginatiion



/**
* Prints HTML with meta information for the categories, tags and comments.
*/
function twentynineteen_entry_footer() {

    // Comment count.
    if ( ! is_singular() ) {
        twentynineteen_comment_count();
    } //Close by Rajah

    // Edit post link.
    edit_post_link(
        sprintf(
            wp_kses(
                /* translators: %s: Name of current post. Only visible to screen readers. */
                __( 'Edit <span class="screen-reader-text">%s</span>', 'twentynineteen' ),
                array(
                    'span' => array(
                        'class' => array(),
                    ),
                )
            ),
            get_the_title()
        ),
        '<span class="edit-link">' . twentynineteen_get_icon_svg( 'edit', 16 ),
        '</span>'
    );
} // twentynineteen_entry_footer end


/*
* Fillters
*/

/*
* Add modify of the title
*/
function modify_title($title, $id=null){
    if(in_category('sri-lanka', $id)){
        $title = " Hello: " .$title;
    }
  return $title;  
} 

add_filter(the_title, modify_title, 20, 2);
// end add emoes 

/* End Fillters */


/* Remove  parents functionaity */


/* remove twentynineteen_widgets_init */

function remove_twentynineteen_widgets_init(){
    remove_action('widgets_init','twentynineteen_widgets_init');
} // remove_twentynineteen_widgets_init
add_action('after_setup_theme','remove_twentynineteen_widgets_init');

/* Remove end /*




