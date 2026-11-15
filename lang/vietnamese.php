<?php

/**
 * Vietnamese language strings for Viettel SInvoice for WHMCS.
 * Ngôn ngữ: Tiếng Việt.
 */

if (!defined('WHMCS')) {
    die('This file cannot be accessed directly');
}

// Module / Mô-đun
$_ADDONLANG['title'] = 'Viettel SInvoice';
$_ADDONLANG['description'] = 'Addon WHMCS phát hành hóa đơn điện tử (HĐĐT) qua Viettel SInvoice. Phát hành qua vinvoice.viettel.vn khi InvoicePaid hoặc theo thao tác quản trị.';

// Configuration fields / Trường cấu hình
$_ADDONLANG['cfg_autoIssueOnPaid'] = 'Tự phát hành khi thanh toán';
$_ADDONLANG['cfg_autoIssueOnPaid_desc'] = 'Tự động phát hành HĐĐT Viettel SInvoice khi WHMCS kích hoạt sự kiện InvoicePaid.';
$_ADDONLANG['cfg_authMode'] = 'Chế độ xác thực';
$_ADDONLANG['cfg_authMode_api_key'] = 'API Key headers';
$_ADDONLANG['cfg_authMode_basic'] = 'Basic Auth';
$_ADDONLANG['cfg_authMode_token'] = 'Token Cookie';
$_ADDONLANG['cfg_apiBaseUrl'] = 'URL API cơ sở';
$_ADDONLANG['cfg_username'] = 'Tên đăng nhập';
$_ADDONLANG['cfg_username_desc'] = 'Bắt buộc với xác thực Basic/Token.';
$_ADDONLANG['cfg_password'] = 'Mật khẩu';
$_ADDONLANG['cfg_password_desc'] = 'Bắt buộc với xác thực Basic/Token.';
$_ADDONLANG['cfg_appKid'] = 'APP-KID';
$_ADDONLANG['cfg_xKid'] = 'X-KID';
$_ADDONLANG['cfg_xApiKey'] = 'X-API-KEY';
$_ADDONLANG['cfg_supplierTaxCode'] = 'Mã số thuế bên bán';
$_ADDONLANG['cfg_supplierTaxCode_desc'] = 'MST người bán sử dụng trong endpoint Viettel.';
$_ADDONLANG['cfg_templateCode'] = 'Mẫu số hóa đơn';
$_ADDONLANG['cfg_invoiceSeries'] = 'Ký hiệu hóa đơn';
$_ADDONLANG['cfg_invoiceType'] = 'Loại hóa đơn';
$_ADDONLANG['cfg_sellerLegalName'] = 'Tên pháp lý bên bán';
$_ADDONLANG['cfg_sellerAddress'] = 'Địa chỉ bên bán';
$_ADDONLANG['cfg_sellerPhone'] = 'Số điện thoại bên bán';
$_ADDONLANG['cfg_sellerEmail'] = 'Email bên bán';
$_ADDONLANG['cfg_sellerBankName'] = 'Tên ngân hàng bên bán';
$_ADDONLANG['cfg_sellerBankAccount'] = 'Số tài khoản ngân hàng bên bán';
$_ADDONLANG['cfg_sellerCityName'] = 'Tỉnh/Thành phố bên bán';
$_ADDONLANG['cfg_paymentMethod'] = 'Tên phương thức thanh toán';
$_ADDONLANG['cfg_paymentMethodCode'] = 'Mã phương thức thanh toán';
$_ADDONLANG['cfg_defaultUnit'] = 'Đơn vị tính mặc định';
$_ADDONLANG['cfg_defaultVatRate'] = 'Thuế suất VAT mặc định';
$_ADDONLANG['cfg_defaultVatRate_desc'] = 'Dùng cho dòng hàng có thuế vì WHMCS chỉ lưu cờ taxed trên từng dòng.';
$_ADDONLANG['cfg_requireBuyerTaxCode'] = 'Bắt buộc MST bên mua';
$_ADDONLANG['cfg_buyerTaxCodeField'] = 'Trường MST bên mua';
$_ADDONLANG['cfg_buyerTaxCodeField_desc'] = 'Tên thuộc tính/trường tùy chỉnh của khách hàng chứa MST bên mua.';
$_ADDONLANG['cfg_buyerNotGetInvoiceForB2c'] = 'B2C: bên mua không nhận hóa đơn';
$_ADDONLANG['cfg_timeout'] = 'Timeout API';
$_ADDONLANG['cfg_timeout_desc'] = 'Giây. Viettel khuyến nghị 60-90 giây.';
$_ADDONLANG['cfg_connectTimeout'] = 'Timeout kết nối';
$_ADDONLANG['cfg_connectTimeout_desc'] = 'Giây. Giá trị trên 10 bị giới hạn vì lý do bảo mật.';

// Lifecycle / Vòng đời
$_ADDONLANG['activate_success'] = 'Đã tạo bảng Viettel SInvoice. Hãy cấu hình thông tin xác thực trước khi bật tự động phát hành.';
$_ADDONLANG['activate_error'] = 'Không thể kích hoạt module Viettel SInvoice.';
$_ADDONLANG['deactivate_success'] = 'Đã tắt Viettel SInvoice. Dữ liệu hóa đơn được giữ lại để phục vụ kiểm toán.';

// Admin output / Giao diện quản trị
$_ADDONLANG['output_intro'] = 'Phát hành hóa đơn điện tử (HĐĐT) qua Viettel SInvoice cho hóa đơn WHMCS.';
$_ADDONLANG['poll_pending'] = 'Đối soát bản ghi đang chờ';
$_ADDONLANG['issue'] = 'Phát hành';
$_ADDONLANG['poll'] = 'Đối soát';
$_ADDONLANG['retry'] = 'Phát hành lại (ép)';
$_ADDONLANG['invoice_id'] = 'ID hóa đơn WHMCS';
$_ADDONLANG['poll_pending_result'] = 'Đã đối soát %d bản ghi Viettel SInvoice đang chờ.';
$_ADDONLANG['invalid_token'] = 'Mã bảo mật quản trị không hợp lệ.';
$_ADDONLANG['invalid_invoice_id'] = 'ID hóa đơn không hợp lệ.';
$_ADDONLANG['unsupported_action'] = 'Thao tác không được hỗ trợ.';
$_ADDONLANG['not_configured'] = 'Module chưa được cấu hình đầy đủ. Hãy điền thông tin xác thực API, thông tin bên bán, mẫu số và ký hiệu trong cài đặt addon.';

// Table columns / Cột bảng
$_ADDONLANG['col_id'] = 'ID';
$_ADDONLANG['col_invoice'] = 'Hóa đơn WHMCS';
$_ADDONLANG['col_client'] = 'Khách hàng';
$_ADDONLANG['col_status'] = 'Trạng thái';
$_ADDONLANG['col_uuid'] = 'Mã giao dịch (UUID)';
$_ADDONLANG['col_invoice_no'] = 'Số hóa đơn';
$_ADDONLANG['col_reservation'] = 'Mã đặt chỗ';
$_ADDONLANG['col_updated'] = 'Cập nhật';
$_ADDONLANG['col_last_error'] = 'Lỗi gần nhất';

// Statuses / Trạng thái
$_ADDONLANG['status_pending'] = 'Đang xử lý';
$_ADDONLANG['status_sent'] = 'Đã phát hành';
$_ADDONLANG['status_async'] = 'Chờ đối soát';
$_ADDONLANG['status_error'] = 'Lỗi';

// Result messages / Thông báo kết quả
$_ADDONLANG['msg_login_transport'] = 'Lỗi kết nối khi đăng nhập Viettel SInvoice.';
$_ADDONLANG['msg_login_invalid_json'] = 'Phản hồi đăng nhập Viettel SInvoice không phải JSON hợp lệ.';
$_ADDONLANG['msg_login_no_token'] = 'Phản hồi đăng nhập Viettel SInvoice không chứa access_token.';
$_ADDONLANG['msg_bad_auth_mode'] = 'Chế độ xác thực Viettel SInvoice không được hỗ trợ.';
$_ADDONLANG['msg_transport_error'] = 'Lỗi kết nối tới Viettel SInvoice.';
$_ADDONLANG['msg_invoice_not_found'] = 'Không tìm thấy hóa đơn WHMCS.';
$_ADDONLANG['msg_client_not_found'] = 'Không tìm thấy khách hàng của hóa đơn.';
$_ADDONLANG['msg_not_configured'] = 'Viettel SInvoice chưa được cấu hình đầy đủ.';
$_ADDONLANG['msg_vnd_only'] = 'Viettel SInvoice hiện chỉ hỗ trợ hóa đơn VND.';
$_ADDONLANG['msg_status_ineligible'] = 'Trạng thái hóa đơn không đủ điều kiện phát hành HĐĐT.';
$_ADDONLANG['msg_no_items'] = 'Hóa đơn không có dòng hàng.';
$_ADDONLANG['msg_client_name_required'] = 'Bắt buộc có tên khách hàng.';
$_ADDONLANG['msg_client_address_required'] = 'Bắt buộc có địa chỉ khách hàng.';
$_ADDONLANG['msg_buyer_tax_required'] = 'Bắt buộc có mã số thuế bên mua.';
$_ADDONLANG['msg_no_billable_lines'] = 'Hóa đơn không có dòng hàng tính phí (đã loại trừ chiết khấu).';
$_ADDONLANG['msg_issued'] = 'Phát hành hóa đơn thành công.';
$_ADDONLANG['msg_already_recorded'] = 'Hóa đơn đã có bản ghi Viettel SInvoice.';
$_ADDONLANG['msg_queued'] = 'Hóa đơn đã đưa vào hàng đợi đối soát.';
$_ADDONLANG['msg_issue_failed'] = 'Yêu cầu phát hành Viettel SInvoice thất bại.';
$_ADDONLANG['msg_queued_transport'] = 'Hóa đơn đã đưa vào hàng đợi đối soát sau lỗi kết nối.';
$_ADDONLANG['msg_no_record'] = 'Không tìm thấy bản ghi Viettel SInvoice.';
$_ADDONLANG['msg_already_issued'] = 'Hóa đơn đã được phát hành.';
$_ADDONLANG['msg_uuid_not_found'] = 'Viettel SInvoice không tìm thấy mã giao dịch (transaction UUID).';
$_ADDONLANG['msg_still_pending'] = 'Hóa đơn vẫn đang chờ xử lý.';
$_ADDONLANG['msg_poll_retry'] = 'Sẽ đối soát lại hóa đơn.';
