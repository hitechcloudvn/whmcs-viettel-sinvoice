# Configuration — Viettel SInvoice for WHMCS
# Cấu hình — Viettel SInvoice for WHMCS

---

## English

### Required settings

- `Auth Mode`: `api_key`, `basic`, or `token`.
- `API Base URL`: Viettel SInvoice base URL. HTTP and schemeless values are coerced to HTTPS.
- `Supplier Tax Code`: seller MST used in Viettel endpoints.
- `Template Code`: active invoice template code.
- `Invoice Series`: active invoice series.
- `Seller Legal Name`: seller legal name.
- `Seller Address`: seller registered address.

### Authentication

#### API Key headers

Set `APP-KID`, `X-KID`, and `X-API-KEY`.

#### Basic Auth

Set `Username` and `Password`.

#### Token Cookie

Set `Username` and `Password`. The addon calls `/auth/login` and uses `Cookie: access_token=...`.

### Seller fields

Optional seller fields include phone, email, bank name, bank account, and city name.

### Invoice fields

- `Invoice Type`: default `1`.
- `Payment Method Name`: default `CK`.
- `Payment Method Code`: default `2`.
- `Default Unit`: default `Lần`.
- `Default VAT Rate`: default `10`. WHMCS invoice items only store a taxed flag, so this rate is applied to taxed lines.

### Buyer tax-code settings

- `Require Buyer Tax Code`: blocks issuance when buyer MST is absent.
- `Buyer Tax Code Field`: WHMCS client property or custom field name for buyer MST.
- `B2C Buyer Not Get Invoice`: sets Viettel B2C flag for buyers without MST.

### Automation

- `Auto Issue On Paid`: when enabled, the `InvoicePaid` hook issues invoices automatically.
- `DailyCronJob`: polls up to 20 async records each day.
- Admin page: supports manual issue, poll, force retry, and poll pending.

### Network hardening

- `Connect Timeout`: default `10`; capped between 1 and 10 seconds.
- `API Timeout`: default `90`; capped between 10 and 90 seconds.
- TLS peer and host verification are always enabled.

### Logging and storage

WHMCS module logs and local `last_request`/`last_response` values are redacted. Invalid/non-array provider responses are stored as metadata with body length only.

---

## Tiếng Việt

### Cài đặt bắt buộc

- `Chế độ xác thực` (`Auth Mode`): `api_key`, `basic` hoặc `token`.
- `URL API cơ sở` (`API Base URL`): URL cơ sở của Viettel SInvoice. Giá trị `http://` hoặc thiếu scheme sẽ được ép về HTTPS.
- `Mã số thuế bên bán` (`Supplier Tax Code`): MST người bán dùng trong endpoint Viettel.
- `Mẫu số hóa đơn` (`Template Code`): mã mẫu số đang hoạt động.
- `Ký hiệu hóa đơn` (`Invoice Series`): ký hiệu đang hoạt động.
- `Tên pháp lý bên bán` (`Seller Legal Name`): tên pháp lý người bán.
- `Địa chỉ bên bán` (`Seller Address`): địa chỉ đã đăng ký của người bán.

### Xác thực

#### API Key headers

Điền `APP-KID`, `X-KID` và `X-API-KEY`.

#### Basic Auth

Điền `Tên đăng nhập` (`Username`) và `Mật khẩu` (`Password`).

#### Token Cookie

Điền `Tên đăng nhập` và `Mật khẩu`. Addon gọi `/auth/login` và dùng `Cookie: access_token=...`.

### Trường bên bán

Các trường tùy chọn của bên bán: số điện thoại, email, tên ngân hàng, số tài khoản ngân hàng và tỉnh/thành phố.

### Trường hóa đơn

- `Loại hóa đơn` (`Invoice Type`): mặc định `1`.
- `Tên phương thức thanh toán` (`Payment Method Name`): mặc định `CK`.
- `Mã phương thức thanh toán` (`Payment Method Code`): mặc định `2`.
- `Đơn vị tính mặc định` (`Default Unit`): mặc định `Lần`.
- `Thuế suất VAT mặc định` (`Default VAT Rate`): mặc định `10`. Dòng hàng WHMCS chỉ lưu cờ taxed, nên thuế suất này áp cho các dòng chịu thuế.

### Cài đặt MST bên mua

- `Bắt buộc MST bên mua` (`Require Buyer Tax Code`): chặn phát hành khi thiếu MST bên mua.
- `Trường MST bên mua` (`Buyer Tax Code Field`): tên thuộc tính/trường tùy chỉnh của khách hàng chứa MST bên mua.
- `B2C: bên mua không nhận hóa đơn` (`B2C Buyer Not Get Invoice`): đặt cờ B2C của Viettel cho bên mua không có MST.

### Tự động hoá

- `Tự phát hành khi thanh toán` (`Auto Issue On Paid`): khi bật, hook `InvoicePaid` tự phát hành hóa đơn.
- `DailyCronJob`: đối soát tối đa 20 bản ghi async mỗi ngày.
- Trang quản trị: hỗ trợ phát hành thủ công, đối soát, phát hành lại (ép) và đối soát bản ghi đang chờ.

### Gia cố mạng

- `Timeout kết nối` (`Connect Timeout`): mặc định `10`; giới hạn trong khoảng 1-10 giây.
- `Timeout API` (`API Timeout`): mặc định `90`; giới hạn trong khoảng 10-90 giây.
- Kiểm chứng TLS peer và host luôn được bật.

### Logging và lưu trữ

Log module WHMCS và giá trị `last_request`/`last_response` cục bộ đều được che redaction. Phản hồi không hợp lệ/không phải mảng từ phía cung cấp chỉ được lưu metadata kèm độ dài body.
