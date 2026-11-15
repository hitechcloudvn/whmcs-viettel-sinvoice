# Security Policy / Chính sách bảo mật

---

## English

### Scope

This policy covers Viettel SInvoice for WHMCS, including addon settings, admin actions, hooks, local invoice record storage, API authentication, and WHMCS module logging.

### Supported versions

Security fixes are provided for the latest commercial release and the immediately previous maintained release.

### Reporting a vulnerability

Report vulnerabilities privately to `report@photuesoftware.com`. Do not open public issues or disclose details until a fix is available.

Please include:

- Module version.
- WHMCS/PHP versions.
- Reproduction steps.
- Impact assessment.
- Sanitized logs only.

Expected initial response: within 48 hours.

### Security expectations

- Keep Viettel credentials in WHMCS addon settings only.
- Use HTTPS endpoints with valid certificates.
- Do not disable `CURLOPT_SSL_VERIFYPEER` or `CURLOPT_SSL_VERIFYHOST`.
- Do not log raw provider responses containing credentials or PII.
- Restrict addon access to trusted WHMCS administrators.
- Keep WHMCS admin CSRF token validation on all state-changing actions.

---

## Tiếng Việt

### Phạm vi

Chính sách này áp dụng cho Viettel SInvoice for WHMCS, bao gồm cài đặt addon, thao tác quản trị, hook, lưu trữ bản ghi hóa đơn cục bộ, xác thực API và logging module WHMCS.

### Phiên bản được hỗ trợ

Bản vá bảo mật được cung cấp cho bản phát hành thương mại mới nhất và bản phát hành được bảo trì ngay trước đó.

### Báo cáo lỗ hổng

Báo cáo lỗ hổng riêng tư đến `report@photuesoftware.com`. Không mở issue công khai hay tiết lộ chi tiết cho đến khi có bản vá.

Vui lòng cung cấp:

- Phiên bản mô-đun.
- Phiên bản WHMCS/PHP.
- Các bước tái hiện.
- Đánh giá tác động.
- Chỉ gửi log đã che redaction.

Thời gian phản hồi ban đầu dự kiến: trong vòng 48 giờ.

### Yêu cầu bảo mật

- Chỉ lưu thông tin xác thực Viettel trong cài đặt addon WHMCS.
- Dùng endpoint HTTPS với chứng chỉ hợp lệ.
- Không tắt `CURLOPT_SSL_VERIFYPEER` hoặc `CURLOPT_SSL_VERIFYHOST`.
- Không ghi log phản hồi gốc từ phía cung cấp chứa thông tin xác thực hoặc PII.
- Giới hạn quyền truy cập addon cho quản trị viên WHMCS đáng tin cậy.
- Giữ kiểm tra token CSRF quản trị WHMCS cho mọi thao tác thay đổi trạng thái.
