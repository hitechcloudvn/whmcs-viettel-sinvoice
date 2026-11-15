# AI Agent Guide — Viettel SInvoice for WHMCS
# Hướng dẫn AI Agent — Viettel SInvoice for WHMCS

**Repositories / Kho mã nguồn:** [GitHub](https://github.com/hitechcloudvn/whmcs-viettel-sinvoice) · [GitLab](https://gitlab.com/hitechcloudvn/whmcs-viettel-sinvoice)

## Module facts / Thông tin mô-đun

- Platform / Nền tảng: WHMCS
- Type / Loại: Addon module / Mô-đun addon
- Main file / File chính: `viettel_sinvoice.php`
- Shared library / Thư viện dùng chung: `lib/bootstrap.php`
- Hooks: `hooks.php`
- Language files / File ngôn ngữ: `lang/english.php`, `lang/vietnamese.php`
- Local table / Bảng cục bộ: `mod_viettel_sinvoice_invoices`

## Workflow rules / Quy tắc làm việc

- Follow `.agents/skills/hddt-einvoice-builder/SKILL.md`, `.agents/skills/whmcs-dev-skills/SKILL.md`, and `.agents/skills/module-security-audit/SKILL.md`.
  Tuân thủ ba file skill nêu trên.
- Do not log raw Viettel responses or unredacted WHMCS client PII.
  Không ghi log phản hồi gốc từ Viettel hay PII khách hàng WHMCS chưa che redaction.
- State-changing admin actions must validate WHMCS admin CSRF token.
  Thao tác quản trị thay đổi trạng thái phải kiểm tra token CSRF quản trị WHMCS.
- Treat transport failures and ambiguous 2xx responses as async and reconcile by `transactionUuid`.
  Xem lỗi kết nối và phản hồi 2xx không rõ kết quả là async, đối soát theo `transactionUuid`.
- Keep code comments and documentation bilingual (English and Vietnamese).
  Giữ bình luận code và tài liệu song ngữ (Anh và Việt).

## Key files and functions / File và hàm chính

- `viettel_sinvoice_config()` defines addon settings. / Định nghĩa cài đặt addon.
- `viettel_sinvoice_output()` renders admin UI and handles manual actions. / Vẽ giao diện quản trị và xử lý thao tác thủ công.
- `viettel_sinvoice_issue_invoice()` performs qualification, payload build, issue, and state transitions. / Kiểm tra điều kiện, dựng payload, phát hành và chuyển trạng thái.
- `viettel_sinvoice_poll_invoice()` reconciles UUID state. / Đối soát trạng thái theo UUID.
- `viettel_sinvoice_api_request()` wraps cURL with strict TLS, timeout caps, redacted `logModuleCall()`, and safe JSON handling. / Bọc cURL với TLS nghiêm ngặt, giới hạn timeout, `logModuleCall()` đã che redaction và xử lý JSON an toàn.
- `viettel_sinvoice_redact()` masks secrets and buyer PII recursively. / Che redaction đệ quy bí mật và PII bên mua.
- `viettel_sinvoice_lang()` resolves bilingual strings with English fallback. / Tra chuỗi song ngữ với dự phòng tiếng Anh.

## Constraints / Ràng buộc

- VND only. / Chỉ VND.
- Requires seller MST, template code, invoice series, and seller legal details. / Bắt buộc có MST bên bán, mẫu số, ký hiệu và thông tin pháp lý bên bán.
- WHMCS stores only a taxed flag per invoice item; `defaultVatRate` is used for taxed lines. / WHMCS chỉ lưu cờ taxed trên từng dòng hàng; dùng `defaultVatRate` cho dòng chịu thuế.
- Invalid/non-array provider responses must be stored as metadata only, never raw body content. / Phản hồi không hợp lệ/không phải mảng chỉ được lưu metadata, không bao giờ lưu body gốc.

## Validation / Kiểm tra

- Run PHP lint on `viettel_sinvoice.php`, `hooks.php`, `lib/bootstrap.php`, `lang/english.php`, and `lang/vietnamese.php`.
  Chạy PHP lint trên các file trên.
- Search for disabled TLS, hardcoded secrets, unsafe raw logging, dangerous calls, and missing escaping before release.
  Tìm TLS bị tắt, bí mật hardcode, ghi log gốc không an toàn, lệnh nguy hiểm và escape thiếu trước khi phát hành.
