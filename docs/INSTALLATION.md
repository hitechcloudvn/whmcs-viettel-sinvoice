# Installation — Viettel SInvoice for WHMCS
# Cài đặt — Viettel SInvoice for WHMCS

---

## English

### Requirements

- WHMCS 8.x/9.x compatible environment.
- PHP cURL and JSON extensions.
- Database user with permission to create/alter addon tables.
- Viettel SInvoice account, credentials, seller tax code, template code, and invoice series.

### Steps

1. Back up the WHMCS filesystem and database.
2. Copy `modules/addons/viettel_sinvoice/` (this repository) into `modules/addons/viettel_sinvoice/` in the WHMCS installation.
3. In WHMCS admin, open **System Settings → Addon Modules**.
4. Activate **Viettel SInvoice**.
5. Assign administrator access permissions for trusted roles only.
6. Configure all required settings.
7. Save settings and open **Addons → Viettel SInvoice**.
8. Test manual issuance against Viettel sandbox/staging where available.
9. Confirm `InvoicePaid` auto-issue behavior only after UAT passes.

### Database

Activation creates or upgrades `mod_viettel_sinvoice_invoices` for local invoice state, `transactionUuid`, provider identifiers, sanitized request/response metadata, and async polling status.

### Verification

- PHP lint passes for all module PHP files (`viettel_sinvoice.php`, `hooks.php`, `lib/bootstrap.php`, `lang/english.php`, `lang/vietnamese.php`).
- WHMCS addon page loads without errors.
- Admin actions require valid WHMCS token.
- WHMCS module logs do not include raw credentials or buyer PII.

### Common issues

- Missing template/series: verify values in Viettel portal.
- Non-VND invoice: this module intentionally blocks non-VND issuance.
- Timeout/ambiguous response: use **Poll** or daily cron reconciliation before force retry.

---

## Tiếng Việt

### Yêu cầu

- Môi trường tương thích WHMCS 8.x/9.x.
- PHP có extension cURL và JSON.
- Người dùng database có quyền tạo/sửa bảng của addon.
- Tài khoản Viettel SInvoice, thông tin xác thực, MST bên bán, mẫu số và ký hiệu hóa đơn.

### Các bước cài đặt

1. Sao lưu hệ thống file và database WHMCS.
2. Chép `modules/addons/viettel_sinvoice/` (repo này) vào `modules/addons/viettel_sinvoice/` trong bản cài WHMCS.
3. Trong quản trị WHMCS, mở **System Settings → Addon Modules**.
4. Kích hoạt **Viettel SInvoice**.
5. Chỉ cấp quyền truy cập cho các vai trò quản trị đáng tin cậy.
6. Cấu hình đầy đủ các cài đặt bắt buộc.
7. Lưu cài đặt và mở **Addons → Viettel SInvoice**.
8. Thử phát hành thủ công với môi trường sandbox/staging của Viettel nếu có.
9. Chỉ bật tự phát hành khi `InvoicePaid` sau khi đã kiểm thử UAT thành công.

### Cơ sở dữ liệu

Kích hoạt addon sẽ tạo hoặc nâng cấp bảng `mod_viettel_sinvoice_invoices` để lưu trạng thái hóa đơn cục bộ, `transactionUuid`, định danh phía Viettel, metadata yêu cầu/phản hồi đã che redaction và trạng thái đối soát async.

### Kiểm tra

- PHP lint sạch cho toàn bộ file PHP của mô-đun (`viettel_sinvoice.php`, `hooks.php`, `lib/bootstrap.php`, `lang/english.php`, `lang/vietnamese.php`).
- Trang addon trong WHMCS tải không lỗi.
- Thao tác quản trị bắt buộc có token WHMCS hợp lệ.
- Log module WHMCS không chứa thông tin xác thực gốc hay PII bên mua.

### Lỗi thường gặp

- Thiếu mẫu số/ký hiệu: kiểm tra lại giá trị trên portal Viettel.
- Hóa đơn không phải VND: mô-đun chủ động chặn phát hành không phải VND.
- Hết timeout/phản hồi không rõ kết quả: dùng **Đối soát** hoặc cron hằng ngày trước khi ép phát hành lại.
