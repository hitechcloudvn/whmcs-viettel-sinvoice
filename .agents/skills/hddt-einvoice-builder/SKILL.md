# Skill: HDDT E-Invoice Builder / Kỹ thuật xây dựng HĐĐT

Guidance for building Vietnamese e-invoice (HĐĐT) integrations in this module.
Hướng dẫn xây dựng tích hợp hóa đơn điện tử (HĐĐT) Việt Nam trong mô-đun này.

## English

### Payload rules

- VND invoices only — reject any other currency before building payloads.
- Seller must have MST (`supplierTaxCode`), template code, invoice series, and legal details.
- WHMCS stores only a taxed flag per invoice item; apply `defaultVatRate` to taxed lines and 0 to untaxed lines.
- Exclude discount lines from billable items; fail when no billable lines remain.
- Buyer data: name and address required; buyer MST required when `requireBuyerTaxCode` is on (read from the configured client field); set the Viettel B2C flag for buyers without MST when configured.

### State machine

- Persist one record per WHMCS invoice keyed by unique `transactionUuid` (states: `pending`, `sent`, `async`, `error`).
- On success store provider invoice number/reservation code and mark `sent`.
- On transport failure or ambiguous 2xx, mark `async` and reconcile later by `transactionUuid` — never blindly re-issue.
- `poll` resolves `async` records: issued → `sent`, still processing → keep `async`, definitive failure → `error`.
- Force retry is allowed only for `error`/`async` states and reuses the persisted UUID path safely.

### Provider API

- Endpoints: `/auth/login` (token mode), `/InvoiceAPI/issueInvoice` (single), `/InvoiceAPI/transactionInvoice` (lookup by `transactionUuid`).
- Strict TLS (`CURLOPT_SSL_VERIFYPEER`/`VERIFYHOST`), connect timeout ≤ 10 s, transfer timeout 10–90 s.
- Invalid/non-array provider responses are stored as metadata only (status + body length), never raw body.

## Tiếng Việt

### Quy tắc payload

- Chỉ hóa đơn VND — chặn mọi loại tiền tệ khác trước khi dựng payload.
- Bên bán phải có MST (`supplierTaxCode`), mẫu số, ký hiệu và thông tin pháp lý.
- WHMCS chỉ lưu cờ taxed trên từng dòng hàng; áp `defaultVatRate` cho dòng chịu thuế và 0 cho dòng không thuế.
- Loại trừ dòng chiết khấu khỏi dòng tính phí; báo lỗi khi không còn dòng tính phí.
- Dữ liệu bên mua: bắt buộc có tên và địa chỉ; MST bên mua bắt buộc khi bật `requireBuyerTaxCode` (đọc từ trường khách hàng đã cấu hình); đặt cờ B2C của Viettel cho bên mua không có MST khi được cấu hình.

### Máy trạng thái

- Lưu một bản ghi cho mỗi hóa đơn WHMCS theo `transactionUuid` duy nhất (trạng thái: `pending`, `sent`, `async`, `error`).
- Khi thành công: lưu số hóa đơn/mã đặt chỗ từ Viettel và đánh dấu `sent`.
- Khi lỗi kết nối hoặc 2xx không rõ kết quả: đánh dấu `async` và đối soát sau theo `transactionUuid` — không phát hành lại mù quáng.
- `poll` xử lý bản ghi `async`: đã phát hành → `sent`, vẫn đang xử lý → giữ `async`, thất bại dứt điểm → `error`.
- Phát hành lại (ép) chỉ được phép cho trạng thái `error`/`async` và dùng lại đường dẫn UUID đã lưu một cách an toàn.

### API phía cung cấp

- Endpoint: `/auth/login` (chế độ token), `/InvoiceAPI/issueInvoice` (đơn lẻ), `/InvoiceAPI/transactionInvoice` (tra cứu theo `transactionUuid`).
- TLS nghiêm ngặt (`CURLOPT_SSL_VERIFYPEER`/`VERIFYHOST`), timeout kết nối ≤ 10 giây, timeout truyền tải 10-90 giây.
- Phản hồi không hợp lệ/không phải mảng chỉ lưu metadata (trạng thái + độ dài body), không bao giờ lưu body gốc.
