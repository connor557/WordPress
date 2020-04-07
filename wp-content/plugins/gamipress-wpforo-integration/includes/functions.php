<?php
/**
 * Functions
 *
 * @package GamiPress\wpForo\Functions
 * @since 1.0.0
 */
// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) exit;

/**
 * Overrides GamiPress AJAX Helper for selecting posts
 *
 * @since 1.0.0
 */
function gamipress_wpforo_ajax_get_posts() {

    global $wpdb;

    if( isset( $_REQUEST['post_type'] ) ) {

        // Get the user input
        $search = isset( $_REQUEST['q'] ) ? $wpdb->esc_like( $_REQUEST['q'] ) : '';

        if( in_array( 'wpforo_forum', $_REQUEST['post_type'] ) ) {
            // Forums

            $table = WPF()->tables->forums;

            // Try to find the forums
            $forums = $wpdb->get_results(
                "SELECT * FROM {$table}
                " . ( ! empty( $search ) ? "WHERE ( title LIKE '%{$search}%' OR  title LIKE '{$search}%' )" : '' )
            );

            // Build the results array
            $results = array();

            foreach ( $forums as $forum ) {

                // Results should meet same structure like posts
                $results[] = array(
                    'ID' => $forum->forumid,
                    'post_title' => $forum->title,
                );

            }

            // Return our results
            wp_send_json_success( $results );
            die;
        } else if( in_array( 'wpforo_topic', $_REQUEST['post_type'] ) ) {
            // Topics

            $table = WPF()->tables->topics;

            // Try to find the topics
            $topics = $wpdb->get_results(
                "SELECT * FROM {$table}
                 " . ( ! empty( $search ) ? "WHERE ( title LIKE '%{$search}%' OR  title LIKE '{$search}%' )" : '' )
            );

            // Build the results array
            $results = array();

            foreach ( $topics as $topic ) {

                // Results should meet same structure like posts
                $results[] = array(
                    'ID' => $topic->topicid,
                    'post_title' => $topic->title,
                    'post_type' => gamipress_wpforo_get_forum_title( $topic->forumid ),
                );

            }

            // Return our results
            wp_send_json_success( $results );
            die;

        }

    }


}
add_action( 'wp_ajax_gamipress_get_posts', 'gamipress_wpforo_ajax_get_posts', 5 );

// Helper function to get the forum title
function gamipress_wpforo_get_forum_title( $forum_id ) {

    global $wpdb;

    $table = WPF()->tables->forums;

    return $wpdb->get_var( $wpdb->prepare( "SELECT title FROM {$table} WHERE forumid = %d;", $forum_id ) );

}

// Helper function to get the topic title
function gamipress_wpforo_get_topic_title( $topic_id ) {

    global $wpdb;

    $table = WPF()->tables->topics;

    return $wpdb->get_var( $wpdb->prepare( "SELECT title FROM {$table} WHERE topicid = %d;", $topic_id ) );

}