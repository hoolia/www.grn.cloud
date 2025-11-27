#!/usr/local/bin/mysql -e "source /dev/stdin"
DELETE FROM wp_options     WHERE option_name LIKE "%_transient_%";
DELETE FROM wp_posts       WHERE post_type = 'revision';
DELETE FROM wp_posts       WHERE post_type = 'auto-draft' AND post_status = 'auto-draft';
DELETE FROM wp_comments    WHERE comment_approved = 'spam';
DELETE FROM wp_comments    WHERE comment_approved = 'trash';
DELETE FROM wp_commentmeta WHERE comment_id NOT IN (SELECT comment_ID FROM wp_comments);
DELETE FROM wp_postmeta    WHERE post_id    NOT IN (SELECT ID FROM wp_posts);
DELETE FROM wp_commentmeta WHERE comment_id NOT IN (SELECT comment_ID FROM wp_comments);
OPTIMIZE TABLE wp_posts, wp_postmeta, wp_comments, wp_commentmeta, wp_options;
