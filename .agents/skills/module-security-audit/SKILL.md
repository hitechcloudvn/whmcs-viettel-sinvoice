# Skill: Module Security Audit / Kiểm toán bảo mật mô-đun

Pre-release security checklist for this module.
Danh mục kiểm tra bảo mật trước phát hành cho mô-đun này.

## English

### Mandatory checks before release

- PHP lint (`php -l`) on `viettel_sinvoice.php`, `hooks.php`, `lib/bootstrap.php`, `lang/english.php`, `lang/vietnamese.php`.
- Search for disabled TLS: `CURLOPT_SSL_VERIFYPEER` must be `true`, `CURLOPT_SSL_VERIFYHOST` must be `2`; API base URLs coerced to HTTPS.
- Search for hardcoded secrets: no credentials, tokens, or API keys in source.
- Search for unsafe raw logging: `logModuleCall()` and `logActivity()` must never receive raw Viettel responses or unredacted WHMCS client PII; use `viettel_sinvoice_redact()`.
- Invalid/non-array provider responses stored as metadata only, never raw body content.
- Search for dangerous calls: no `eval`, `shell_exec`, `exec`, `system`, `passthru`, `unserialize`, `var_dump`, `print_r` in production paths.
- Search for missing escaping: every dynamic admin-output value goes through `viettel_sinvoice_e()`; validate admin CSRF token on every state-changing action.
- Bounded timeouts: connect ≤ 10 s, transfer 10–90 s.

### Documentation

- Record findings in `docs/SECURITY-AUDIT.md` (IDs, severity, status, evidence).
- Any new failure in these checks blocks tagging/release until fixed.

## Tiếng Việt

### Kiểm tra bắt buộc trước phát hành

- PHP lint (`php -l`) trên `viettel_sinvoice.php`, `hooks.php`, `lib/bootstrap.php`, `lang/english.php`, `lang/vietnamese.php`.
- Tìm TLS bị tắt: `CURLOPT_SSL_VERIFYPEER` phải là `true`, `CURLOPT_SSL_VERIFYHOST` phải là `2`; URL API cơ sở được ép về HTTPS.
- Tìm bí mật hardcode: không có thông tin xác thực, token hay API key trong mã nguồn.
- Tìm ghi log gốc không an toàn: `logModuleCall()` và `logActivity()` không bao giờ nhận phản hồi gốc từ Viettel hay PII khách hàng WHMCS chưa che redaction; dùng `viettel_sinvoice_redact()`.
- Phản hồi không hợp lệ/không phải mảng chỉ lưu metadata, không bao giờ lưu body gốc.
- Tìm lệnh nguy hiểm: không có `eval`, `shell_exec`, `exec`, `system`, `passthru`, `unserialize`, `var_dump`, `print_r` trong đường dẫn sản xuất.
- Tìm escape thiếu: mọi giá trị đầu ra quản trị động phải qua `viettel_sinvoice_e()`; kiểm tra token CSRF quản trị cho mọi thao tác thay đổi trạng thái.
- Timeout có giới hạn: kết nối ≤ 10 giây, truyền tải 10-90 giây.

### Tài liệu

- Ghi nhận phát hiện vào `docs/SECURITY-AUDIT.md` (ID, mức độ, trạng thái, bằng chứng).
- Bất kỳ lỗi nào trong các kiểm tra trên đều chặn tag/phát hành cho đến khi sửa xong.
