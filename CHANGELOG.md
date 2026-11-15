# Changelog

All notable changes to Viettel SInvoice for WHMCS.
Mọi thay đổi đáng chú ý của Viettel SInvoice for WHMCS.

## [1.0.0] — 2026-11-15

### Added / Thêm mới

- Initial WHMCS Viettel SInvoice addon module.
  Mô-đun addon WHMCS Viettel SInvoice ban đầu.
- Addon activation, upgrade, deactivation, and admin interface.
  Kích hoạt, nâng cấp, tắt addon và giao diện quản trị.
- `InvoicePaid` auto-issue hook and `DailyCronJob` async polling hook.
  Hook tự phát hành khi `InvoicePaid` và hook đối soát async `DailyCronJob`.
- Local invoice state table with unique `transactionUuid`.
  Bảng trạng thái hóa đơn cục bộ với `transactionUuid` duy nhất.
- API-key, Basic Auth, and token-cookie authentication modes.
  Ba chế độ xác thực: API Key, Basic Auth và Token Cookie.
- Manual issue, retry, poll, and poll-pending actions.
  Thao tác thủ công: phát hành, phát hành lại, đối soát và đối soát bản ghi đang chờ.
- Bilingual English/Vietnamese localization for module UI, settings, and messages
  (`lang/english.php`, `lang/vietnamese.php`).
  Bản địa hoá song ngữ Anh/Việt cho giao diện, cài đặt và thông báo của mô-đun
  (`lang/english.php`, `lang/vietnamese.php`).
- Commercial legal, support, security, installation, and configuration documentation.
  Tài liệu pháp lý, hỗ trợ, bảo mật, cài đặt và cấu hình thương mại.

### Fixed / Sửa lỗi

- Added missing `hooks.php` entry point so `InvoicePaid` and `DailyCronJob` hooks load.
  Thêm file `hooks.php` bị thiếu để hook `InvoicePaid` và `DailyCronJob` được nạp.
- PHP 8.4 implicit-nullable parameter deprecation in `viettel_sinvoice_api_request()`.
  Sửa cảnh báo deprecation tham số nullable ngầm định trên PHP 8.4 trong `viettel_sinvoice_api_request()`.

### Security / Bảo mật

- Added recursive redaction for credentials, auth headers, tokens, and buyer PII.
  Thêm redaction đệ quy cho thông tin xác thực, header auth, token và PII bên mua.
- Added safe `logModuleCall()` response handling for `/auth/login` and all API requests.
  Xử lý phản hồi `logModuleCall()` an toàn cho `/auth/login` và mọi yêu cầu API.
- Stores metadata for invalid/non-array provider responses instead of raw body content.
  Chỉ lưu metadata cho phản hồi không hợp lệ/không phải mảng, không lưu nội dung gốc.
- Enforces strict TLS verification and bounded cURL timeouts.
  Bắt buộc kiểm chứng TLS nghiêm ngặt và giới hạn timeout cURL.
