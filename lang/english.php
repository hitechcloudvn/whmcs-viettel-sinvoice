<?php

/**
 * English language strings for Viettel SInvoice for WHMCS.
 * Ngôn ngữ: Tiếng Anh.
 */

if (!defined('WHMCS')) {
    die('This file cannot be accessed directly');
}

// Module / Mô-đun
$_ADDONLANG['title'] = 'Viettel SInvoice';
$_ADDONLANG['description'] = 'Viettel SInvoice e-invoice (HĐĐT) addon for WHMCS. Issues invoices via vinvoice.viettel.vn after InvoicePaid or admin action.';

// Configuration fields / Trường cấu hình
$_ADDONLANG['cfg_autoIssueOnPaid'] = 'Auto Issue On Paid';
$_ADDONLANG['cfg_autoIssueOnPaid_desc'] = 'Automatically issue Viettel SInvoice when WHMCS InvoicePaid fires.';
$_ADDONLANG['cfg_authMode'] = 'Auth Mode';
$_ADDONLANG['cfg_authMode_api_key'] = 'API Key headers';
$_ADDONLANG['cfg_authMode_basic'] = 'Basic Auth';
$_ADDONLANG['cfg_authMode_token'] = 'Token Cookie';
$_ADDONLANG['cfg_apiBaseUrl'] = 'API Base URL';
$_ADDONLANG['cfg_username'] = 'Username';
$_ADDONLANG['cfg_username_desc'] = 'Required for Basic/Token authentication.';
$_ADDONLANG['cfg_password'] = 'Password';
$_ADDONLANG['cfg_password_desc'] = 'Required for Basic/Token authentication.';
$_ADDONLANG['cfg_appKid'] = 'APP-KID';
$_ADDONLANG['cfg_xKid'] = 'X-KID';
$_ADDONLANG['cfg_xApiKey'] = 'X-API-KEY';
$_ADDONLANG['cfg_supplierTaxCode'] = 'Supplier Tax Code';
$_ADDONLANG['cfg_supplierTaxCode_desc'] = 'Seller MST used in Viettel endpoints.';
$_ADDONLANG['cfg_templateCode'] = 'Template Code';
$_ADDONLANG['cfg_invoiceSeries'] = 'Invoice Series';
$_ADDONLANG['cfg_invoiceType'] = 'Invoice Type';
$_ADDONLANG['cfg_sellerLegalName'] = 'Seller Legal Name';
$_ADDONLANG['cfg_sellerAddress'] = 'Seller Address';
$_ADDONLANG['cfg_sellerPhone'] = 'Seller Phone';
$_ADDONLANG['cfg_sellerEmail'] = 'Seller Email';
$_ADDONLANG['cfg_sellerBankName'] = 'Seller Bank Name';
$_ADDONLANG['cfg_sellerBankAccount'] = 'Seller Bank Account';
$_ADDONLANG['cfg_sellerCityName'] = 'Seller City Name';
$_ADDONLANG['cfg_paymentMethod'] = 'Payment Method Name';
$_ADDONLANG['cfg_paymentMethodCode'] = 'Payment Method Code';
$_ADDONLANG['cfg_defaultUnit'] = 'Default Unit';
$_ADDONLANG['cfg_defaultVatRate'] = 'Default VAT Rate';
$_ADDONLANG['cfg_defaultVatRate_desc'] = 'Used for WHMCS taxed line items because WHMCS stores only a taxed flag per item.';
$_ADDONLANG['cfg_requireBuyerTaxCode'] = 'Require Buyer Tax Code';
$_ADDONLANG['cfg_buyerTaxCodeField'] = 'Buyer Tax Code Field';
$_ADDONLANG['cfg_buyerTaxCodeField_desc'] = 'Client property/custom field name containing buyer MST.';
$_ADDONLANG['cfg_buyerNotGetInvoiceForB2c'] = 'B2C Buyer Not Get Invoice';
$_ADDONLANG['cfg_timeout'] = 'API Timeout';
$_ADDONLANG['cfg_timeout_desc'] = 'Seconds. Viettel recommends 60-90 seconds.';
$_ADDONLANG['cfg_connectTimeout'] = 'Connect Timeout';
$_ADDONLANG['cfg_connectTimeout_desc'] = 'Seconds. Values above 10 are capped for security hardening.';

// Lifecycle / Vòng đời
$_ADDONLANG['activate_success'] = 'Viettel SInvoice table created. Configure credentials before enabling auto issue.';
$_ADDONLANG['activate_error'] = 'Unable to activate Viettel SInvoice module.';
$_ADDONLANG['deactivate_success'] = 'Viettel SInvoice deactivated. Invoice records were kept for audit compliance.';

// Admin output / Giao diện quản trị
$_ADDONLANG['output_intro'] = 'Issue Vietnamese e-invoices (HĐĐT) through Viettel SInvoice for WHMCS invoices.';
$_ADDONLANG['poll_pending'] = 'Poll Pending Records';
$_ADDONLANG['issue'] = 'Issue';
$_ADDONLANG['poll'] = 'Poll';
$_ADDONLANG['retry'] = 'Force Retry';
$_ADDONLANG['invoice_id'] = 'Invoice ID';
$_ADDONLANG['poll_pending_result'] = 'Polled %d pending Viettel SInvoice records.';
$_ADDONLANG['invalid_token'] = 'Invalid admin security token.';
$_ADDONLANG['invalid_invoice_id'] = 'Invalid invoice ID.';
$_ADDONLANG['unsupported_action'] = 'Unsupported action.';
$_ADDONLANG['not_configured'] = 'Module is not fully configured. Fill API credentials, seller info, template code, and invoice series in addon settings.';

// Table columns / Cột bảng
$_ADDONLANG['col_id'] = 'ID';
$_ADDONLANG['col_invoice'] = 'WHMCS Invoice';
$_ADDONLANG['col_client'] = 'Client';
$_ADDONLANG['col_status'] = 'Status';
$_ADDONLANG['col_uuid'] = 'Transaction UUID';
$_ADDONLANG['col_invoice_no'] = 'Invoice No';
$_ADDONLANG['col_reservation'] = 'Reservation';
$_ADDONLANG['col_updated'] = 'Updated';
$_ADDONLANG['col_last_error'] = 'Last Error';

// Statuses / Trạng thái
$_ADDONLANG['status_pending'] = 'Pending';
$_ADDONLANG['status_sent'] = 'Sent';
$_ADDONLANG['status_async'] = 'Pending Reconciliation';
$_ADDONLANG['status_error'] = 'Error';

// Result messages / Thông báo kết quả
$_ADDONLANG['msg_login_transport'] = 'Viettel SInvoice login transport error.';
$_ADDONLANG['msg_login_invalid_json'] = 'Viettel SInvoice login returned invalid JSON.';
$_ADDONLANG['msg_login_no_token'] = 'Viettel SInvoice login response did not include access_token.';
$_ADDONLANG['msg_bad_auth_mode'] = 'Unsupported Viettel SInvoice auth mode.';
$_ADDONLANG['msg_transport_error'] = 'Viettel SInvoice transport error.';
$_ADDONLANG['msg_invoice_not_found'] = 'Invoice not found.';
$_ADDONLANG['msg_client_not_found'] = 'Invoice client not found.';
$_ADDONLANG['msg_not_configured'] = 'Viettel SInvoice is not fully configured.';
$_ADDONLANG['msg_vnd_only'] = 'Viettel SInvoice currently supports VND invoices only.';
$_ADDONLANG['msg_status_ineligible'] = 'Invoice status is not eligible for e-invoice issuance.';
$_ADDONLANG['msg_no_items'] = 'Invoice has no line items.';
$_ADDONLANG['msg_client_name_required'] = 'Client name is required.';
$_ADDONLANG['msg_client_address_required'] = 'Client address is required.';
$_ADDONLANG['msg_buyer_tax_required'] = 'Buyer tax code is required.';
$_ADDONLANG['msg_no_billable_lines'] = 'Invoice has no billable non-discount line items.';
$_ADDONLANG['msg_issued'] = 'Invoice issued successfully.';
$_ADDONLANG['msg_already_recorded'] = 'Invoice already has a Viettel SInvoice record.';
$_ADDONLANG['msg_queued'] = 'Invoice queued for reconciliation.';
$_ADDONLANG['msg_issue_failed'] = 'Viettel SInvoice issue request failed.';
$_ADDONLANG['msg_queued_transport'] = 'Invoice queued for reconciliation after transport exception.';
$_ADDONLANG['msg_no_record'] = 'No Viettel SInvoice record found.';
$_ADDONLANG['msg_already_issued'] = 'Invoice is already issued.';
$_ADDONLANG['msg_uuid_not_found'] = 'Viettel SInvoice could not find the transaction UUID.';
$_ADDONLANG['msg_still_pending'] = 'Invoice is still pending.';
$_ADDONLANG['msg_poll_retry'] = 'Invoice poll will retry.';
