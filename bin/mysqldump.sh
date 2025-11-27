#!/bin/bash
# MySQL dump script for WordPress database backup
# Uses environment variables set in the container:
# - MYSQL_SERVICE_HOST: Database host
# - MYSQL_USER: Database user
# - MYSQL_PASSWORD: Database password
# - MYSQL_DATABASE: Database name
#
# This script excludes tables that are regenerated or contain temporary data
# to minimize backup size and backup time.

# Tables to ignore during backup (security logs, caches, temporary data)
IGNORE_TABLES=(
    wp_wfblockediplog
    wp_wfblocks7
    wp_wfcrawlers
    wp_wffilechanges
    wp_wffilelogs
    wp_wfhits
    wp_wfhoover
    wp_wfissues
    wp_wfknownfilelist
    wp_wflivetraffichuman
    wp_wflocs
    wp_wflogins
    wp_wfls_2fa_secrets
    wp_wfls_settings
    wp_wfnotifications
    wp_wfpendingissues
    wp_wfreversecache
    wp_wfsnipcache
    wp_wfstatus
    wp_wftrafficrates
    wp_redirection_logs
    wp_redirection_404
    wp_statistics_visitor
    wp_statistics_visit
    wp_statistics_pages
    wp_statistics_useronline
    wp_statistics_search
    wp_statistics_historical
    wp_statistics_exclusions
    wp_slim_stats
    wp_slim_stats_archive
    wp_slim_events
    wp_slim_events_archive
    wp_cerber_log
    wp_cerber_traffic
    wp_cerber_sessions
    wp_cerber_blocks
    wp_cerber_acl
    wp_cerber_lab
    wp_cerber_lab_ip
    wp_cerber_lab_net
    wp_cerber_files
    wp_actionscheduler_logs
    wp_actionscheduler_actions
    wp_actionscheduler_claims
    wp_actionscheduler_groups
    wp_litespeed_crawler
    wp_litespeed_crawler_blacklist
    wp_litespeed_avatar
    wp_litespeed_cssjs
    wp_litespeed_img_optm
    wp_litespeed_img_optming
    wp_litespeed_url
    wp_litespeed_url_file
    wp_wc_sessions
    wp_woocommerce_sessions
    wp_woocommerce_log
    wp_wc_webhooks_logs
    wp_simple_history
    wp_simple_history_contexts
    wp_stream
    wp_stream_meta
    wp_audit_log
    wp_wsal_metadata
    wp_wsal_occurrences
    wp_wsal_options
    wp_wsal_sessions
    wp_mail_log
    wp_maillog
    wp_email_log
    wp_relevanssi
    wp_relevanssi_log
    wp_relevanssi_stopwords
    wp_searchwp_index
    wp_searchwp_log
    wp_yoast_seo_links
    wp_yoast_indexable
    wp_yoast_indexable_hierarchy
    wp_yoast_migrations
    wp_yoast_primary_term
    wp_icl_string_positions
    wp_icl_string_pages
    wp_duplicator_packages
    wp_ewwwio_images
    wp_ewwwio_queue
    wp_smush_dir_images
    wp_wcpay_webhook_events
)

# Build mysqldump ignore table options
IGNORE_OPTIONS=""
for table in "${IGNORE_TABLES[@]}"; do
    IGNORE_OPTIONS="${IGNORE_OPTIONS} --ignore-table=${MYSQL_DATABASE}.${table}"
done

# Execute mysqldump
mysqldump --no-tablespaces ${IGNORE_OPTIONS} \
    -h ${MYSQL_SERVICE_HOST} \
    -u ${MYSQL_USER} \
    --password="${MYSQL_PASSWORD}" \
    ${MYSQL_DATABASE}
