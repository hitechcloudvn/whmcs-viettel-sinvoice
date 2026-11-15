# Skill: WHMCS Dev Skills / Kỹ năng phát triển WHMCS

WHMCS addon conventions used by this module.
Quy ước addon WHMCS áp dụng trong mô-đun này.

## English

### Module structure

- Main file `viettel_sinvoice.php` defines `viettel_sinvoice_config()`, `_activate()`, `_deactivate()`, `_upgrade()`, `_output()`.
- Shared library `lib/bootstrap.php` holds constants, helpers, API client, and business logic.
- `hooks.php` in the module directory is auto-loaded by WHMCS; register hooks there.
- Language files `lang/<language>.php` populate `$_ADDONLANG`; use `viettel_sinvoice_lang($key, $fallback)` in code so the module stays functional without a loaded language file.
- Local table `mod_viettel_sinvoice_invoices`, managed via WHMCS Capsule schema builder.

### Admin UI rules

- Every state-changing admin action must validate the WHMCS admin CSRF token (`check_token('WHMCS.admin.default', ...)`).
- Escape every dynamic output value with `viettel_sinvoice_e()` (XSS safety).
- Direct-access guards (`if (!defined('WHMCS')) { die(...); }`) on every PHP entry file.

### Hooks

- `InvoicePaid` → auto-issue when `autoIssueOnPaid` is enabled; exceptions must be caught and logged via `logActivity()` with class only, no PII.
- `DailyCronJob` → reconcile pending/async records (bounded batch).

### Localization

- Keep `lang/english.php` and `lang/vietnamese.php` key sets identical.
- UI strings, config labels, and user-facing result messages go through lang keys (`cfg_*`, `col_*`, `status_*`, `msg_*`); internal log/metadata text stays English.
- Docs and code comments are bilingual (English and Vietnamese).

## Tiếng Việt

### Cấu trúc mô-đun

- File chính `viettel_sinvoice.php` định nghĩa `viettel_sinvoice_config()`, `_activate()`, `_deactivate()`, `_upgrade()`, `_output()`.
- Thư viện dùng chung `lib/bootstrap.php` chứa hằng số, helper, API client và logic nghiệp vụ.
- `hooks.php` trong thư mục mô-đun được WHMCS tự nạp; đăng ký hook tại đây.
- File ngôn ngữ `lang/<language>.php` điền vào `$_ADDONLANG`; dùng `viettel_sinvoice_lang($key, $fallback)` trong code để mô-đun vẫn chạy khi chưa nạp file ngôn ngữ.
- Bảng cục bộ `mod_viettel_sinvoice_invoices`, quản lý qua schema builder Capsule của WHMCS.

### Quy tắc giao diện quản trị

- Mọi thao tác quản trị thay đổi trạng thái phải kiểm tra token CSRF của quản trị WHMCS (`check_token('WHMCS.admin.default', ...)`).
- Escape mọi giá trị đầu ra động bằng `viettel_sinvoice_e()` (an toàn XSS).
- Guard chặn truy cập trực tiếp (`if (!defined('WHMCS')) { die(...); }`) trên mọi file PHP đầu vào.

### Hook

- `InvoicePaid` → tự phát hành khi bật `autoIssueOnPaid`; phải bắt exception và ghi `logActivity()` chỉ kèm class, không chứa PII.
- `DailyCronJob` → đối soát bản ghi đang chờ/async (batch có giới hạn).

### Bản địa hoá

- Giữ bộ key của `lang/english.php` và `lang/vietnamese.php` giống hệt nhau.
- Chuỗi giao diện, nhãn cấu hình và thông báo kết quả hiển thị cho người dùng đi qua key ngôn ngữ (`cfg_*`, `col_*`, `status_*`, `msg_*`); văn bản log/metadata nội bộ giữ tiếng Anh.
- Tài liệu và bình luận code song ngữ (Anh và Việt).
