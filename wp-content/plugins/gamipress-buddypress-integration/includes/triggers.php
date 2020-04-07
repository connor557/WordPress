<?php
/**
 * Triggers
 *
 * @package GamiPress\BuddyPress\Triggers
 * @since 1.0.0
 */

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) exit;

/**
 * Register BuddyPress specific triggers
 *
 * @param array $triggers
 * @return mixed
 */
function gamipress_bp_activity_triggers( $triggers ) {

    // BuddyPress
    $triggers[__( 'BuddyPress', 'gamipress-buddypress-integration' )] = array(
        'gamipress_bp_activate_user' => __( 'Activated account', 'gamipress-buddypress-integration' ),
    );

    // BuddyPress Profile
    if ( gamipress_bp_is_active( 'xprofile' ) ) {
        $triggers[__( 'BuddyPress Profile', 'gamipress-buddypress-integration' )] = array(
            'gamipress_bp_upload_avatar'        => __( 'Change profile avatar', 'gamipress-buddypress-integration' ),
            'gamipress_bp_upload_cover_image'   => __( 'Change cover image', 'gamipress-buddypress-integration' ),
            'gamipress_bp_update_profile'       => __( 'Update profile information', 'gamipress-buddypress-integration' ),
        );
    }

    // BuddyPress Friendships
    if ( gamipress_bp_is_active( 'friends' ) ) {
        $triggers[__( 'BuddyPress Friendships', 'gamipress-buddypress-integration' )] = array(
            'gamipress_bp_friendship_request'       => __( 'Send a friendship request', 'gamipress-buddypress-integration' ),
            'gamipress_bp_friendship_accepted'      => __( 'Accept a friendship request', 'gamipress-buddypress-integration' ),
            'gamipress_bp_get_friendship_accepted'  => __( 'Get a friendship request accepted', 'gamipress-buddypress-integration' ),
        );
    }

    // BuddyPress Messages
    if ( gamipress_bp_is_active( 'messages' ) ) {
        $triggers[__( 'BuddyPress Messages', 'gamipress-buddypress-integration' )] = array(
            'gamipress_bp_send_message' => __( 'Send/Reply to a private message', 'gamipress-buddypress-integration' ),
        );
    }

    // BuddyPress Activity
    if ( gamipress_bp_is_active( 'activity' ) ) {
        $triggers[__( 'BuddyPress Activity', 'gamipress-buddypress-integration' )] = array(
            'gamipress_bp_publish_activity'                 => __( 'Write an activity stream message', 'gamipress-buddypress-integration' ),
            'gamipress_bp_new_activity_comment'             => __( 'Reply to an item in an activity stream', 'gamipress-buddypress-integration' ),
            'gamipress_bp_favorite_activity'                => __( 'Favorite an activity stream item', 'gamipress-buddypress-integration' ),
            'gamipress_bp_remove_favorite_activity'         => __( 'Remove a favorite on an activity stream item', 'gamipress-buddypress-integration' ),
            'gamipress_bp_user_favorite_activity'           => __( 'Get a favorite on an activity stream item', 'gamipress-buddypress-integration' ),
            'gamipress_bp_user_remove_favorite_activity'    => __( 'Get a favorite removed on an activity stream item', 'gamipress-buddypress-integration' ),
        );
    }

    // BuddyPress Groups
    if ( gamipress_bp_is_active( 'groups' ) ) {
        $triggers[__( 'BuddyPress Groups', 'gamipress-buddypress-integration' )] = array(
            'gamipress_bp_group_publish_activity'       => __( 'Write a group activity stream message', 'gamipress-buddypress-integration' ),
            'gamipress_bp_new_group'                    => __( 'Create a group', 'gamipress-buddypress-integration' ),
            'gamipress_bp_join_group'                   => __( 'Join a group', 'gamipress-buddypress-integration' ),
            'gamipress_bp_join_specific_group'          => __( 'Join a specific group', 'gamipress-buddypress-integration' ),
            'gamipress_bp_join_private_group'           => __( 'Get accepted on a private group', 'gamipress-buddypress-integration' ),
            'gamipress_bp_join_specific_private_group'  => __( 'Get accepted on a specific private group', 'gamipress-buddypress-integration' ),
            'gamipress_bp_invite_user'                  => __( 'Invite someone to join a group', 'gamipress-buddypress-integration' ),
            'gamipress_bp_promote_member'               => __( 'Promoted to group moderator/administrator', 'gamipress-buddypress-integration' ),
            'gamipress_bp_promoted_member'              => __( 'Promote another group member to moderator/administrator', 'gamipress-buddypress-integration' ),
        );
    }

    return $triggers;

}
add_filter( 'gamipress_activity_triggers', 'gamipress_bp_activity_triggers' );

/**
 * Register BuddyPress specific activity triggers
 *
 * @since  1.0.0
 *
 * @param  array $specific_activity_triggers
 * @return array
 */
function gamipress_bp_specific_activity_triggers( $specific_activity_triggers ) {

    $specific_activity_triggers['gamipress_bp_join_specific_group'] = array( 'bp_groups' );
    $specific_activity_triggers['gamipress_bp_join_specific_private_group'] = array( 'bp_groups' );

    return $specific_activity_triggers;
}
add_filter( 'gamipress_specific_activity_triggers', 'gamipress_bp_specific_activity_triggers' );

/**
 * Register BuddyPress specific activity triggers labels
 *
 * @since  1.0.0
 *
 * @param  array $specific_activity_trigger_labels
 * @return array
 */
function gamipress_bp_specific_activity_trigger_label( $specific_activity_trigger_labels ) {

    $specific_activity_trigger_labels['gamipress_bp_join_specific_group'] = __( 'Join %s group', 'gamipress-buddypress-integration' );
    $specific_activity_trigger_labels['gamipress_bp_join_specific_private_group'] = __( 'Get accepted on %s group', 'gamipress-buddypress-integration' );

    return $specific_activity_trigger_labels;
}
add_filter( 'gamipress_specific_activity_trigger_label', 'gamipress_bp_specific_activity_trigger_label' );

/**
 * Get specific activity trigger post title
 *
 * @since  1.2.1
 *
 * @param  string   $post_title
 * @param  integer  $specific_id
 * @param  string   $trigger_type
 * @param  int      $site_id
 * @return string
 */
function gamipress_bp_specific_activity_trigger_post_title( $post_title, $specific_id, $trigger_type, $site_id ) {

    switch( $trigger_type ) {
        case 'gamipress_bp_join_specific_group':
        case 'gamipress_bp_join_specific_private_group':
            if( absint( $specific_id ) !== 0 && class_exists( 'BuddyPress' ) ) {

                $group = groups_get_group( $specific_id );

                // Return the group name as post title
                $post_title = $group->name;
            }
            break;
    }

    return $post_title;

}
add_filter( 'gamipress_specific_activity_trigger_post_title', 'gamipress_bp_specific_activity_trigger_post_title', 10, 4 );

/**
 * Get user for a given trigger action.
 *
 * @since  1.0.0
 *
 * @param  integer $user_id user ID to override.
 * @param  string  $trigger Trigger name.
 * @param  array   $args    Passed trigger args.
 * @return integer          User ID.
 */
function gamipress_bp_trigger_get_user_id( $user_id, $trigger, $args ) {

    switch ( $trigger ) {
        // BuddyPress Profile
        case 'gamipress_bp_upload_avatar':
        case 'gamipress_bp_upload_cover_image':
        case 'gamipress_bp_update_profile':
            $user_id = $args[0];
            break;
        // BuddyPress
        case 'gamipress_bp_activate_user':
        // BuddyPress Friendships
        case 'gamipress_bp_friendship_request':
        case 'gamipress_bp_friendship_accepted':
        case 'gamipress_bp_get_friendship_accepted':
        // BuddyPress Messages
        case 'gamipress_bp_send_message':
        // BuddyPress Activity
        case 'gamipress_bp_publish_activity':
        case 'gamipress_bp_new_activity_comment':
        case 'gamipress_bp_favorite_activity':
        case 'gamipress_bp_remove_favorite_activity':
        case 'gamipress_bp_user_favorite_activity':
        case 'gamipress_bp_user_remove_favorite_activity':
        // BuddyPress Groups
        case 'gamipress_bp_group_publish_activity':
        case 'gamipress_bp_join_group':
        case 'gamipress_bp_join_specific_group':
        case 'gamipress_bp_join_private_group':
        case 'gamipress_bp_join_specific_private_group':
        case 'gamipress_bp_invite_user':
        case 'gamipress_bp_promote_member':
        case 'gamipress_bp_promoted_member':
            $user_id = $args[1];
            break;
    }

    return $user_id;

}

add_filter( 'gamipress_trigger_get_user_id', 'gamipress_bp_trigger_get_user_id', 10, 3);

/**
 * Get the id for a given specific trigger action.
 *
 * @since  1.0.5
 *
 * @param  integer  $specific_id Specific ID.
 * @param  string  $trigger Trigger name.
 * @param  array   $args    Passed trigger args.
 *
 * @return integer          Specific ID.
 */
function gamipress_bp_specific_trigger_get_id( $specific_id, $trigger = '', $args = array() ) {

    switch ( $trigger ) {
        case 'gamipress_bp_join_specific_group':
        case 'gamipress_bp_join_specific_private_group':
            $specific_id = $args[0];
            break;
    }

    return $specific_id;
}
add_filter( 'gamipress_specific_trigger_get_id', 'gamipress_bp_specific_trigger_get_id', 10, 3 );

/**
 * Extended meta data for event trigger logging
 *
 * @since 1.0.5
 *
 * @param array 	$log_meta
 * @param integer 	$user_id
 * @param string 	$trigger
 * @param integer 	$site_id
 * @param array 	$args
 *
 * @return array
 */
function gamipress_bp_log_event_trigger_meta_data( $log_meta, $user_id, $trigger, $site_id, $args ) {

    switch ( $trigger ) {
        case 'gamipress_bp_friendship_request':
        case 'gamipress_bp_friendship_accepted':
        case 'gamipress_bp_get_friendship_accepted':
            // Add the friendship ID
            $log_meta['friendship_id'] = $args[0];
            break;
        case 'gamipress_bp_publish_activity':
        case 'gamipress_bp_favorite_activity':
        case 'gamipress_bp_remove_favorite_activity':
            // Add the activity ID
            $log_meta['activity_id'] = $args[0];
            break;
        case 'gamipress_bp_user_favorite_activity':
        case 'gamipress_bp_user_remove_favorite_activity':
            // Add the activity and user that performs the favorite ID (activity author is stored by default on user_id)
            $log_meta['activity_id'] = $args[0];
            $log_meta['favorites_id'] = $args[2];
            break;
        case 'gamipress_bp_new_activity_comment':
            // Add the comment ID
            $log_meta['comment_id'] = $args[0];
            break;
        case 'gamipress_bp_group_publish_activity':
            // Add the activity and group IDs
            $log_meta['activity_id'] = $args[0];
            $log_meta['group_id'] = $args[2];
            break;
        case 'gamipress_bp_new_group':
        case 'gamipress_bp_join_group':
        case 'gamipress_bp_join_specific_group':
        case 'gamipress_bp_invite_user':
        case 'gamipress_bp_promote_member':
        case 'gamipress_bp_promoted_member':
            // Add the group ID
            $log_meta['group_id'] = $args[0];
            break;
        case 'gamipress_bp_join_private_group':
        case 'gamipress_bp_join_specific_private_group':
            // Add the group and inviter ID (User who invited this user to the group)
            $log_meta['group_id'] = $args[0];
            $log_meta['inviter_id'] = $args[2];
            break;
    }

    return $log_meta;
}
add_filter( 'gamipress_log_event_trigger_meta_data', 'gamipress_bp_log_event_trigger_meta_data', 10, 5 );

/**
 * Extra filter to check duplicated activity
 *
 * @since 1.0.5
 *
 * @param bool 		$return
 * @param integer 	$user_id
 * @param string 	$trigger
 * @param integer 	$site_id
 * @param array 	$args
 *
 * @return bool					True if user deserves trigger, else false
 */
function gamipress_bp_trigger_duplicity_check( $return, $user_id, $trigger, $site_id, $args  ) {

    // If user doesn't deserves trigger, then bail to prevent grant access
    if( ! $return )
        return $return;

    $log_meta = array(
        'type' => 'event_trigger',
        'trigger_type' => $trigger,
    );

    switch ( $trigger ) {
        case 'gamipress_bp_activate_user':
            $return = (bool) ( gamipress_get_user_last_log( $user_id, $log_meta ) === false );
            break;
        case 'gamipress_bp_publish_activity':
            // User can not create same activity more times, so check it
            $log_meta['activity_id'] = $args[0];
            $return = (bool) ( gamipress_get_user_last_log( $user_id, $log_meta ) === false );
            break;
        case 'gamipress_bp_new_activity_comment':
            // User can not create same activity comment more times, so check it
            $log_meta['comment_id'] = $args[0];
            $return = (bool) ( gamipress_get_user_last_log( $user_id, $log_meta ) === false );
            break;
        case 'gamipress_bp_group_publish_activity':
            // User can not create same activity in a group more times, so check it
            $log_meta['activity_id'] = $args[0];
            $log_meta['group_id'] = $args[2];
            $return = (bool) ( gamipress_get_user_last_log( $user_id, $log_meta ) === false );
            break;
        case 'gamipress_bp_new_group':
            // User can not create same group more times, so check it
            $log_meta['group_id'] = $args[0];
            $return = (bool) ( gamipress_get_user_last_log( $user_id, $log_meta ) === false );
            break;
    }

    return $return;

}
add_filter( 'gamipress_user_deserves_trigger', 'gamipress_bp_trigger_duplicity_check', 10, 5 );