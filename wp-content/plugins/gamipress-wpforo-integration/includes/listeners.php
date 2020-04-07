<?php
/**
 * Listeners
 *
 * @package GamiPress\wpForo\Listeners
 * @since 1.0.0
 */
// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) exit;

/**
 * New post listener
 *
 * @param array $post
 * @param array $topic
 */
function gamipress_wpforo_new_post( $post, $topic ) {

    // Trigger reply a topic
    do_action( 'gamipress_wpforo_new_post', $post['postid'], $post['userid'], $topic['topicid'], $post['forumid'], $post );

    // Trigger reply a specific topic
    do_action( 'gamipress_wpforo_specific_topic_new_post', $post['postid'], $post['userid'], $topic['topicid'], $post['forumid'], $post );

    // Trigger reply a topic on specific forum
    do_action( 'gamipress_wpforo_specific_forum_new_post', $post['postid'], $post['userid'], $topic['topicid'], $post['forumid'], $post );

}
add_action( 'wpforo_after_add_post', 'gamipress_wpforo_new_post', 10, 2 );

/**
 * Delete post listener
 *
 * @param array $post
 */
function gamipress_wpforo_delete_post( $post ) {

    // Trigger delete post
    do_action( 'gamipress_wpforo_delete_post', $post['postid'], $post['userid'], $post['topicid'], $post['forumid'], $post );

}
add_action( 'wpforo_after_delete_post', 'gamipress_wpforo_delete_post' );

/**
 * New topic listener
 *
 * @param array $topic
 */
function gamipress_wpforo_new_topic( $topic ) {

    // Trigger new topic
    do_action( 'gamipress_wpforo_new_topic', $topic['topicid'], $topic['userid'], $topic['forumid'], $topic );

    // Trigger new topic on specific forum
    do_action( 'gamipress_wpforo_specific_forum_new_topic', $topic['topicid'], $topic['userid'], $topic['forumid'], $topic );

}
add_action( 'wpforo_after_add_topic', 'gamipress_wpforo_new_topic' );

/**
 * Delete topic listener
 *
 * @param array $topic
 */
function gamipress_wpforo_delete_topic( $topic ) {

    // Trigger delete topic
    do_action( 'gamipress_wpforo_delete_topic', $topic['topicid'], $topic['userid'], $topic['forumid'], $topic );

}
add_action( 'wpforo_after_delete_topic', 'gamipress_wpforo_delete_topic' );

/**
 * Like post listener
 *
 * @param array $post
 * @param int   $user_id
 */
function gamipress_wpforo_like( $post, $user_id ) {

    // Trigger like a post
    do_action( 'gamipress_wpforo_like_post', $post['postid'], $user_id, $post['topicid'], $post['forumid'], $post );

    // Trigger like a post on specific topic
    do_action( 'gamipress_wpforo_specific_topic_like_post', $post['postid'], $user_id, $post['topicid'], $post['forumid'], $post );

    // Trigger like a post on specific forum
    do_action( 'gamipress_wpforo_specific_forum_like_post', $post['postid'], $user_id, $post['topicid'], $post['forumid'], $post );

    // Trigger get a like on a post
    do_action( 'gamipress_wpforo_user_like_post', $post['postid'], $post['userid'], $post['topicid'], $post['forumid'], $user_id, $post );

}
add_action( 'wpforo_like', 'gamipress_wpforo_like', 10, 2 );

/**
 * Dislike post listener
 *
 * @param array $post
 * @param int   $user_id
 */
function gamipress_wpforo_dislike( $post, $user_id ) {

    // Trigger dislike a post
    do_action( 'gamipress_wpforo_dislike_post', $post['postid'], $user_id, $post['topicid'], $post['forumid'], $post );

    // Trigger dislike a post on specific topic
    do_action( 'gamipress_wpforo_specific_topic_dislike_post', $post['postid'], $user_id, $post['topicid'], $post['forumid'], $post );

    // Trigger dislike a post on specific forum
    do_action( 'gamipress_wpforo_specific_forum_dislike_post', $post['postid'], $user_id, $post['topicid'], $post['forumid'], $post );

    // Trigger get a dislike on a post
    do_action( 'gamipress_wpforo_user_dislike_post', $post['postid'], $post['userid'], $post['topicid'], $post['forumid'], $user_id, $post );

}
add_action( 'wpforo_dislike', 'gamipress_wpforo_dislike', 10, 2 );

/**
 * Vote post listener
 *
 * @param int   $reaction (1 = vote up, -1 = vote down)
 * @param array $post
 * @param int   $user_id
 */
function gamipress_wpforo_vote( $reaction, $post, $user_id ) {

    if( $reaction === 1 ) {

        // Trigger vote up a post
        do_action( 'gamipress_wpforo_vote_up_post', $post['postid'], $user_id, $post['topicid'], $post['forumid'], $post );

        // Trigger vote up a post on specific topic
        do_action( 'gamipress_wpforo_specific_topic_vote_up_post', $post['postid'], $user_id, $post['topicid'], $post['forumid'], $post );

        // Trigger vote up a post on specific forum
        do_action( 'gamipress_wpforo_specific_forum_vote_up_post', $post['postid'], $user_id, $post['topicid'], $post['forumid'], $post );

        // Trigger get a vote up on a post
        do_action( 'gamipress_wpforo_user_vote_up_post', $post['postid'],  $post['userid'], $post['topicid'], $post['forumid'], $user_id, $post );

    } else if( $reaction === -1 ) {

        // Trigger vote down a post
        do_action( 'gamipress_wpforo_vote_down_post', $post['postid'], $user_id, $post['topicid'], $post['forumid'], $post );

        // Trigger vote down a post on specific topic
        do_action( 'gamipress_wpforo_specific_topic_vote_down_post', $post['postid'], $user_id, $post['topicid'], $post['forumid'], $post );

        // Trigger vote down a post on specific forum
        do_action( 'gamipress_wpforo_specific_forum_vote_down_post', $post['postid'], $user_id, $post['topicid'], $post['forumid'], $post );

        // Trigger get a vote down on a post
        do_action( 'gamipress_wpforo_user_vote_down_post', $post['postid'],  $post['userid'], $post['topicid'], $post['forumid'], $user_id, $post );

    }

}
add_action( 'wpforo_vote', 'gamipress_wpforo_vote', 10, 3 );

/**
 * Answer topic listener
 *
 * @param int   $answer_status
 * @param array $post
 */
function gamipress_wpforo_answer( $answer_status, $post ) {

    $topic = WPF()->topic->get_topic( $post['topicid'] );

    // Trigger answer a question
    do_action( 'gamipress_wpforo_answer_question', $post['topicid'], $post['userid'], $post['postid'], $post['forumid'], $post, $topic );

    // Trigger answer a question on specific forum
    do_action( 'gamipress_wpforo_specific_forum_answer_question', $post['topicid'], $post['userid'], $post['postid'], $post['forumid'], $post, $topic );

    // Trigger get a question answered
    do_action( 'gamipress_wpforo_user_answer_question', $post['topicid'],  $topic['userid'], $post['postid'], $post['forumid'], $post['userid'], $post, $topic );

}
add_action( 'wpforo_answer', 'gamipress_wpforo_answer', 10, 2 );