# SECURITY AUDIT: Viettel SInvoice for WHMCS
# KIỂM TOÁN BẢO MẬT: Viettel SInvoice for WHMCS

---

## English

### Scope

- Module path: `modules/addons/viettel_sinvoice/`
- Platform: WHMCS
- Version: 1.0.0

### Findings

| ID | Severity | Status | Notes |
| --- | ---: | --- | --- |
| WHMCS-VSI-001 | High | Fixed | Token login no longer logs raw token-bearing provider responses. |
| WHMCS-VSI-002 | High | Fixed | General API requests no longer pass raw provider body to `logModuleCall()`. |
| WHMCS-VSI-003 | Medium | Fixed | Invalid/non-array provider responses are summarized by metadata instead of stored raw. |
| WHMCS-VSI-004 | Medium | Fixed | Configured `http://` API base URLs are coerced to `https://`. |
| WHMCS-VSI-005 | Medium | Fixed | Connect timeout is capped to 10 seconds; transfer timeout is capped to 90 seconds for Viettel async behavior. |
| WHMCS-VSI-006 | Medium | Fixed | Secret and buyer PII redaction expanded for nested payloads. |

### Checklist

| Block | Result | Evidence |
| --- | --- | --- |
| Secrets and credentials | PASS | No hardcoded credentials; WHMCS addon settings are used; logs are redacted. |
| TLS / SSL verification | PASS | cURL sets `CURLOPT_SSL_VERIFYPEER => true` and `CURLOPT_SSL_VERIFYHOST => 2`. |
| HTTP timeouts and errors | PASS | Bounded timeouts and async candidate handling exist for transport/ambiguous responses. |
| Input validation | PASS | Invoice ID casting, required config, VND currency, status, line items, and buyer data are validated. |
| Authorization and ownership | PASS | Admin actions require WHMCS token and trusted addon access; hooks use internal invoice IDs. |
| SQL safety | PASS | WHMCS Capsule query builder is used; no raw SQL concatenation. |
| XSS / output escaping | PASS | Admin output uses `viettel_sinvoice_e()` for dynamic values. |
| File and path safety | PASS | No upload/download/file path operations are present. |
| Logging and error disclosure | PASS | `logModuleCall()` uses sanitized request/response arrays; exception context stores class/code only. |
| Dangerous calls/debug code | PASS | No eval, shell execution, unserialize, var_dump, or print_r found. |

### Release decision

PASS for controlled staging validation. Production release requires real Viettel sandbox/UAT verification with sanitized WHMCS module logs.

---

## Tiếng Việt

### Phạm vi

- Đường dẫn mô-đun: `modules/addons/viettel_sinvoice/`
- Nền tảng: WHMCS
- Phiên bản: 1.0.0

### Phát hiện

| ID | Mức độ | Trạng thái | Ghi chú |
| --- | ---: | --- | --- |
| WHMCS-VSI-001 | Cao | Đã sửa | Đăng nhập token không còn ghi log phản hồi gốc chứa token từ phía cung cấp. |
| WHMCS-VSI-002 | Cao | Đã sửa | Yêu cầu API thông thường không còn truyền body gốc của phía cung cấp vào `logModuleCall()`. |
| WHMCS-VSI-003 | Trung bình | Đã sửa | Phản hồi không hợp lệ/không phải mảng được tóm tắt bằng metadata thay vì lưu nguyên bản. |
| WHMCS-VSI-004 | Trung bình | Đã sửa | URL API cấu hình `http://` được ép về `https://`. |
| WHMCS-VSI-005 | Trung bình | Đã sửa | Timeout kết nối giới hạn 10 giây; timeout truyền tải giới hạn 90 giây theo hành vi async của Viettel. |
| WHMCS-VSI-006 | Trung bình | Đã sửa | Mở rộng redaction bí mật và PII bên mua cho payload lồng nhau. |

### Danh mục kiểm tra

| Hạng mục | Kết quả | Bằng chứng |
| --- | --- | --- |
| Bí mật và thông tin xác thực | ĐẠT | Không có thông tin xác thực hardcode; dùng cài đặt addon WHMCS; log được che redaction. |
| Kiểm chứng TLS / SSL | ĐẠT | cURL đặt `CURLOPT_SSL_VERIFYPEER => true` và `CURLOPT_SSL_VERIFYHOST => 2`. |
| Timeout và lỗi HTTP | ĐẠT | Có timeout giới hạn và xử lý ứng viên async cho lỗi kết nối/phản hồi không rõ kết quả. |
| Kiểm dữ liệu đầu vào | ĐẠT | Ép kiểu ID hóa đơn, cấu hình bắt buộc, tiền tệ VND, trạng thái, dòng hàng và dữ liệu bên mua đều được kiểm tra. |
| Phân quyền và sở hữu | ĐẠT | Thao tác quản trị yêu cầu token WHMCS và quyền addon tin cậy; hook dùng ID hóa đơn nội bộ. |
| An toàn SQL | ĐẠT | Dùng query builder Capsule của WHMCS; không nối chuỗi SQL thủ công. |
| XSS / escape đầu ra | ĐẠT | Đầu ra quản trị dùng `viettel_sinvoice_e()` cho giá trị động. |
| An toàn file và đường dẫn | ĐẠT | Không có thao tác upload/download/đường dẫn file. |
| Logging và lộ lỗi | ĐẠT | `logModuleCall()` dùng mảng yêu cầu/phản hồi đã làm sạch; ngữ cảnh exception chỉ lưu class/code. |
| Lệnh nguy hiểm/mã gỡ lỗi | ĐẠT | Không có eval, thực thi shell, unserialize, var_dump hay print_r. |

### Quyết định phát hành

ĐẠT cho kiểm thử staging có kiểm soát. Phát hành sản xuất cần xác minh sandbox/UAT thật của Viettel với log module WHMCS đã che redaction.
