<?php

/**
 * Viettel SInvoice for WHMCS — module hooks.
 *
 * English: Auto-issues electronic invoices when a WHMCS invoice is paid and
 * reconciles ambiguous (async) Viettel responses during the daily cron job.
 *
 * Tiếng Việt: Tự động phát hành hóa đơn điện tử khi hóa đơn WHMCS được thanh
 * toán và đối soát các phản hồi chưa rõ kết quả (async) từ Viettel theo lịch
 * cron hằng ngày.
 */

if (!defined('WHMCS')) {
    die('This file cannot be accessed directly');
}

require_once __DIR__ . '/lib/bootstrap.php';

add_hook('InvoicePaid', 1, function ($vars) {
    $invoiceId = isset($vars['invoiceid']) ? (int) $vars['invoiceid'] : 0;

    try {
        if ($invoiceId <= 0) {
            return;
        }

        if (!viettel_sinvoice_bool(viettel_sinvoice_setting('autoIssueOnPaid', 'on'), true)) {
            return;
        }

        viettel_sinvoice_issue_invoice($invoiceId, false);
    } catch (Exception $e) {
        logActivity(
            'Viettel SInvoice auto-issue hook failed for WHMCS invoice #' . $invoiceId
            . ' (' . get_class($e) . ').'
        );
    }
});

add_hook('DailyCronJob', 1, function ($vars) {
    try {
        viettel_sinvoice_poll_pending(20);
    } catch (Exception $e) {
        logActivity('Viettel SInvoice daily reconciliation cron failed (' . get_class($e) . ').');
    }
});
