<?php

/**
 * Viettel SInvoice for WHMCS — addon module entry point.
 *
 * English: Registers addon configuration, lifecycle callbacks, and the admin
 * UI for issuing and reconciling Vietnamese e-invoices via Viettel SInvoice.
 *
 * Tiếng Việt: Đăng ký cấu hình addon, vòng đời mô-đun và giao diện quản trị
 * để phát hành, đối soát hóa đơn điện tử qua Viettel SInvoice.
 */

use WHMCS\Database\Capsule;

if (!defined('WHMCS')) {
    die('This file cannot be accessed directly');
}

require_once __DIR__ . '/lib/bootstrap.php';

function viettel_sinvoice_config(): array
{
    return [
        'name' => 'Viettel SInvoice',
        'description' => viettel_sinvoice_lang(
            'description',
            'Viettel SInvoice e-invoice (HĐĐT) addon for WHMCS. Issues invoices via vinvoice.viettel.vn after InvoicePaid or admin action.'
        ),
        'author' => 'HiTechCloud',
        'language' => 'english',
        'version' => VIETTEL_SINVOICE_VERSION,
        'fields' => [
            'autoIssueOnPaid' => [
                'FriendlyName' => viettel_sinvoice_lang('cfg_autoIssueOnPaid', 'Auto Issue On Paid'),
                'Type' => 'yesno',
                'Default' => 'on',
                'Description' => viettel_sinvoice_lang('cfg_autoIssueOnPaid_desc', 'Automatically issue Viettel SInvoice when WHMCS InvoicePaid fires.'),
            ],
            'authMode' => [
                'FriendlyName' => viettel_sinvoice_lang('cfg_authMode', 'Auth Mode'),
                'Type' => 'dropdown',
                'Options' => [
                    'api_key' => viettel_sinvoice_lang('cfg_authMode_api_key', 'API Key headers'),
                    'basic' => viettel_sinvoice_lang('cfg_authMode_basic', 'Basic Auth'),
                    'token' => viettel_sinvoice_lang('cfg_authMode_token', 'Token Cookie'),
                ],
                'Default' => 'api_key',
            ],
            'apiBaseUrl' => [
                'FriendlyName' => viettel_sinvoice_lang('cfg_apiBaseUrl', 'API Base URL'),
                'Type' => 'text',
                'Size' => '80',
                'Default' => VIETTEL_SINVOICE_DEFAULT_BASE_URL,
            ],
            'username' => [
                'FriendlyName' => viettel_sinvoice_lang('cfg_username', 'Username'),
                'Type' => 'text',
                'Size' => '40',
                'Default' => '',
                'Description' => viettel_sinvoice_lang('cfg_username_desc', 'Required for Basic/Token authentication.'),
            ],
            'password' => [
                'FriendlyName' => viettel_sinvoice_lang('cfg_password', 'Password'),
                'Type' => 'password',
                'Size' => '40',
                'Default' => '',
                'Description' => viettel_sinvoice_lang('cfg_password_desc', 'Required for Basic/Token authentication.'),
            ],
            'appKid' => [
                'FriendlyName' => viettel_sinvoice_lang('cfg_appKid', 'APP-KID'),
                'Type' => 'text',
                'Size' => '40',
                'Default' => '',
            ],
            'xKid' => [
                'FriendlyName' => viettel_sinvoice_lang('cfg_xKid', 'X-KID'),
                'Type' => 'text',
                'Size' => '40',
                'Default' => '',
            ],
            'xApiKey' => [
                'FriendlyName' => viettel_sinvoice_lang('cfg_xApiKey', 'X-API-KEY'),
                'Type' => 'password',
                'Size' => '60',
                'Default' => '',
            ],
            'supplierTaxCode' => [
                'FriendlyName' => viettel_sinvoice_lang('cfg_supplierTaxCode', 'Supplier Tax Code'),
                'Type' => 'text',
                'Size' => '30',
                'Default' => '',
                'Description' => viettel_sinvoice_lang('cfg_supplierTaxCode_desc', 'Seller MST used in Viettel endpoints.'),
            ],
            'templateCode' => [
                'FriendlyName' => viettel_sinvoice_lang('cfg_templateCode', 'Template Code'),
                'Type' => 'text',
                'Size' => '20',
                'Default' => '1/001',
            ],
            'invoiceSeries' => [
                'FriendlyName' => viettel_sinvoice_lang('cfg_invoiceSeries', 'Invoice Series'),
                'Type' => 'text',
                'Size' => '20',
                'Default' => '',
            ],
            'invoiceType' => [
                'FriendlyName' => viettel_sinvoice_lang('cfg_invoiceType', 'Invoice Type'),
                'Type' => 'text',
                'Size' => '10',
                'Default' => '1',
            ],
            'sellerLegalName' => [
                'FriendlyName' => viettel_sinvoice_lang('cfg_sellerLegalName', 'Seller Legal Name'),
                'Type' => 'text',
                'Size' => '80',
                'Default' => '',
            ],
            'sellerAddress' => [
                'FriendlyName' => viettel_sinvoice_lang('cfg_sellerAddress', 'Seller Address'),
                'Type' => 'textarea',
                'Rows' => '3',
                'Cols' => '80',
                'Default' => '',
            ],
            'sellerPhone' => [
                'FriendlyName' => viettel_sinvoice_lang('cfg_sellerPhone', 'Seller Phone'),
                'Type' => 'text',
                'Size' => '30',
                'Default' => '',
            ],
            'sellerEmail' => [
                'FriendlyName' => viettel_sinvoice_lang('cfg_sellerEmail', 'Seller Email'),
                'Type' => 'text',
                'Size' => '50',
                'Default' => '',
            ],
            'sellerBankName' => [
                'FriendlyName' => viettel_sinvoice_lang('cfg_sellerBankName', 'Seller Bank Name'),
                'Type' => 'text',
                'Size' => '60',
                'Default' => '',
            ],
            'sellerBankAccount' => [
                'FriendlyName' => viettel_sinvoice_lang('cfg_sellerBankAccount', 'Seller Bank Account'),
                'Type' => 'text',
                'Size' => '40',
                'Default' => '',
            ],
            'sellerCityName' => [
                'FriendlyName' => viettel_sinvoice_lang('cfg_sellerCityName', 'Seller City Name'),
                'Type' => 'text',
                'Size' => '40',
                'Default' => '',
            ],
            'paymentMethod' => [
                'FriendlyName' => viettel_sinvoice_lang('cfg_paymentMethod', 'Payment Method Name'),
                'Type' => 'text',
                'Size' => '20',
                'Default' => 'CK',
            ],
            'paymentMethodCode' => [
                'FriendlyName' => viettel_sinvoice_lang('cfg_paymentMethodCode', 'Payment Method Code'),
                'Type' => 'text',
                'Size' => '10',
                'Default' => '2',
            ],
            'defaultUnit' => [
                'FriendlyName' => viettel_sinvoice_lang('cfg_defaultUnit', 'Default Unit'),
                'Type' => 'text',
                'Size' => '20',
                'Default' => 'Lần',
            ],
            'defaultVatRate' => [
                'FriendlyName' => viettel_sinvoice_lang('cfg_defaultVatRate', 'Default VAT Rate'),
                'Type' => 'text',
                'Size' => '10',
                'Default' => '10',
                'Description' => viettel_sinvoice_lang('cfg_defaultVatRate_desc', 'Used for WHMCS taxed line items because WHMCS stores only a taxed flag per item.'),
            ],
            'requireBuyerTaxCode' => [
                'FriendlyName' => viettel_sinvoice_lang('cfg_requireBuyerTaxCode', 'Require Buyer Tax Code'),
                'Type' => 'yesno',
                'Default' => '',
            ],
            'buyerTaxCodeField' => [
                'FriendlyName' => viettel_sinvoice_lang('cfg_buyerTaxCodeField', 'Buyer Tax Code Field'),
                'Type' => 'text',
                'Size' => '40',
                'Default' => 'tax_id',
                'Description' => viettel_sinvoice_lang('cfg_buyerTaxCodeField_desc', 'Client property/custom field name containing buyer MST.'),
            ],
            'buyerNotGetInvoiceForB2c' => [
                'FriendlyName' => viettel_sinvoice_lang('cfg_buyerNotGetInvoiceForB2c', 'B2C Buyer Not Get Invoice'),
                'Type' => 'yesno',
                'Default' => '',
            ],
            'timeout' => [
                'FriendlyName' => viettel_sinvoice_lang('cfg_timeout', 'API Timeout'),
                'Type' => 'text',
                'Size' => '10',
                'Default' => '90',
                'Description' => viettel_sinvoice_lang('cfg_timeout_desc', 'Seconds. Viettel recommends 60-90 seconds.'),
            ],
            'connectTimeout' => [
                'FriendlyName' => viettel_sinvoice_lang('cfg_connectTimeout', 'Connect Timeout'),
                'Type' => 'text',
                'Size' => '10',
                'Default' => '10',
                'Description' => viettel_sinvoice_lang('cfg_connectTimeout_desc', 'Seconds. Values above 10 are capped for security hardening.'),
            ],
        ],
    ];
}

function viettel_sinvoice_activate(): array
{
    try {
        viettel_sinvoice_install_schema();

        return [
            'status' => 'success',
            'description' => viettel_sinvoice_lang('activate_success', 'Viettel SInvoice table created. Configure credentials before enabling auto issue.'),
        ];
    } catch (Exception $e) {
        return [
            'status' => 'error',
            'description' => viettel_sinvoice_lang('activate_error', 'Unable to activate Viettel SInvoice module.'),
        ];
    }
}

function viettel_sinvoice_deactivate(): array
{
    return [
        'status' => 'success',
        'description' => viettel_sinvoice_lang('deactivate_success', 'Viettel SInvoice deactivated. Invoice records were kept for audit compliance.'),
    ];
}

function viettel_sinvoice_upgrade($vars): void
{
    viettel_sinvoice_upgrade_schema();
}

function viettel_sinvoice_output($vars): void
{
    $moduleLink = isset($vars['modulelink']) ? (string) $vars['modulelink'] : 'addonmodules.php?module=viettel_sinvoice';
    $message = '';
    $messageClass = 'info';

    try {
        $action = isset($_POST['vsi_action']) ? trim((string) $_POST['vsi_action']) : '';
        if ($action !== '') {
            $token = isset($_POST['token']) ? (string) $_POST['token'] : '';
            if (!function_exists('check_token') || !check_token('WHMCS.admin.default', $token)) {
                throw new RuntimeException(viettel_sinvoice_lang('invalid_token', 'Invalid admin security token.'));
            }

            $invoiceId = isset($_POST['invoice_id']) ? (int) $_POST['invoice_id'] : 0;
            if ($invoiceId <= 0 && $action !== 'poll_pending') {
                throw new InvalidArgumentException(viettel_sinvoice_lang('invalid_invoice_id', 'Invalid invoice ID.'));
            }

            if ($action === 'issue') {
                $result = viettel_sinvoice_issue_invoice($invoiceId, false);
                $message = $result['message'];
                $messageClass = $result['success'] ? 'success' : 'danger';
            } elseif ($action === 'retry') {
                $result = viettel_sinvoice_issue_invoice($invoiceId, true);
                $message = $result['message'];
                $messageClass = $result['success'] ? 'success' : 'danger';
            } elseif ($action === 'poll') {
                $result = viettel_sinvoice_poll_invoice($invoiceId);
                $message = $result['message'];
                $messageClass = $result['success'] ? 'success' : 'danger';
            } elseif ($action === 'poll_pending') {
                $count = viettel_sinvoice_poll_pending(20);
                $message = sprintf(viettel_sinvoice_lang('poll_pending_result', 'Polled %d pending Viettel SInvoice records.'), $count);
                $messageClass = 'success';
            } else {
                throw new InvalidArgumentException(viettel_sinvoice_lang('unsupported_action', 'Unsupported action.'));
            }
        }
    } catch (Exception $e) {
        $message = $e->getMessage();
        $messageClass = 'danger';
    }

    echo '<h2>' . viettel_sinvoice_e(viettel_sinvoice_lang('title', 'Viettel SInvoice')) . '</h2>';
    echo '<p>' . viettel_sinvoice_e(viettel_sinvoice_lang('output_intro', 'Issue Vietnamese e-invoices (HĐĐT) through Viettel SInvoice for WHMCS invoices.')) . '</p>';

    if ($message !== '') {
        echo '<div class="alert alert-' . viettel_sinvoice_e($messageClass) . '">' . viettel_sinvoice_e($message) . '</div>';
    }

    if (!viettel_sinvoice_configured()) {
        echo '<div class="alert alert-warning">' . viettel_sinvoice_e(viettel_sinvoice_lang('not_configured', 'Module is not fully configured. Fill API credentials, seller info, template code, and invoice series in addon settings.')) . '</div>';
    }

    echo '<form method="post" action="' . viettel_sinvoice_e($moduleLink) . '" class="form-inline" style="margin-bottom:15px">';
    echo '<input type="hidden" name="token" value="' . viettel_sinvoice_e(function_exists('generate_token') ? generate_token('plain') : '') . '">';
    echo '<input type="hidden" name="vsi_action" value="poll_pending">';
    echo '<button type="submit" class="btn btn-default">' . viettel_sinvoice_e(viettel_sinvoice_lang('poll_pending', 'Poll Pending Records')) . '</button>';
    echo '</form>';

    echo '<form method="post" action="' . viettel_sinvoice_e($moduleLink) . '" class="form-inline" style="margin-bottom:20px">';
    echo '<input type="hidden" name="token" value="' . viettel_sinvoice_e(function_exists('generate_token') ? generate_token('plain') : '') . '">';
    echo '<input type="number" min="1" name="invoice_id" class="form-control" placeholder="' . viettel_sinvoice_e(viettel_sinvoice_lang('invoice_id', 'Invoice ID')) . '" required> ';
    echo '<button type="submit" name="vsi_action" value="issue" class="btn btn-primary">' . viettel_sinvoice_e(viettel_sinvoice_lang('issue', 'Issue')) . '</button> ';
    echo '<button type="submit" name="vsi_action" value="poll" class="btn btn-info">' . viettel_sinvoice_e(viettel_sinvoice_lang('poll', 'Poll')) . '</button> ';
    echo '<button type="submit" name="vsi_action" value="retry" class="btn btn-warning">' . viettel_sinvoice_e(viettel_sinvoice_lang('retry', 'Force Retry')) . '</button>';
    echo '</form>';

    $records = Capsule::table(VIETTEL_SINVOICE_TABLE)
        ->orderBy('id', 'desc')
        ->limit(50)
        ->get();

    echo '<table class="table table-striped table-condensed">';
    echo '<thead><tr>'
        . '<th>' . viettel_sinvoice_e(viettel_sinvoice_lang('col_id', 'ID')) . '</th>'
        . '<th>' . viettel_sinvoice_e(viettel_sinvoice_lang('col_invoice', 'WHMCS Invoice')) . '</th>'
        . '<th>' . viettel_sinvoice_e(viettel_sinvoice_lang('col_client', 'Client')) . '</th>'
        . '<th>' . viettel_sinvoice_e(viettel_sinvoice_lang('col_status', 'Status')) . '</th>'
        . '<th>' . viettel_sinvoice_e(viettel_sinvoice_lang('col_uuid', 'Transaction UUID')) . '</th>'
        . '<th>' . viettel_sinvoice_e(viettel_sinvoice_lang('col_invoice_no', 'Invoice No')) . '</th>'
        . '<th>' . viettel_sinvoice_e(viettel_sinvoice_lang('col_reservation', 'Reservation')) . '</th>'
        . '<th>' . viettel_sinvoice_e(viettel_sinvoice_lang('col_updated', 'Updated')) . '</th>'
        . '<th>' . viettel_sinvoice_e(viettel_sinvoice_lang('col_last_error', 'Last Error')) . '</th>'
        . '</tr></thead><tbody>';
    foreach ($records as $record) {
        $statusKey = 'status_' . (string) $record->status;
        echo '<tr>';
        echo '<td>' . (int) $record->id . '</td>';
        echo '<td><a href="invoices.php?action=edit&id=' . (int) $record->invoice_id . '">#' . (int) $record->invoice_id . '</a></td>';
        echo '<td><a href="clientssummary.php?userid=' . (int) $record->client_id . '">#' . (int) $record->client_id . '</a></td>';
        echo '<td>' . viettel_sinvoice_e(viettel_sinvoice_lang($statusKey, $record->status)) . '</td>';
        echo '<td><code>' . viettel_sinvoice_e($record->transaction_uuid) . '</code></td>';
        echo '<td>' . viettel_sinvoice_e($record->invoice_no) . '</td>';
        echo '<td>' . viettel_sinvoice_e($record->reservation_code) . '</td>';
        echo '<td>' . viettel_sinvoice_e($record->updated_at) . '</td>';
        echo '<td>' . viettel_sinvoice_e($record->last_error) . '</td>';
        echo '</tr>';
    }
    echo '</tbody></table>';
}
