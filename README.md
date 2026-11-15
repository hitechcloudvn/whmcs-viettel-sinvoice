# Viettel SInvoice for WHMCS

> WHMCS addon module for issuing Vietnamese e-invoices (HĐĐT) through Viettel SInvoice.
> Mô-đun addon WHMCS phát hành hóa đơn điện tử (HĐĐT) qua Viettel SInvoice.

[![CI](https://github.com/hitechcloudvn/whmcs-viettel-sinvoice/actions/workflows/ci.yml/badge.svg)](https://github.com/hitechcloudvn/whmcs-viettel-sinvoice/actions/workflows/ci.yml)

**Repositories / Kho mã nguồn:**

- GitHub: <https://github.com/hitechcloudvn/whmcs-viettel-sinvoice>
- GitLab: <https://gitlab.com/hitechcloudvn/whmcs-viettel-sinvoice>

---

## English

### Overview

This addon integrates WHMCS with Viettel SInvoice (`vinvoice.viettel.vn`) for Vietnamese electronic invoice issuance. It can issue invoices automatically when WHMCS fires `InvoicePaid`, supports manual admin issuance/retry/poll actions, and reconciles ambiguous Viettel responses by persisted `transactionUuid`.

### Requirements

- WHMCS 8.x/9.x compatible addon environment.
- PHP with cURL and JSON extensions.
- Viettel SInvoice API credentials and active invoice template/series.
- VND invoices only.

### Features

- WHMCS addon lifecycle: activate, deactivate, upgrade, and admin output.
- `InvoicePaid` auto-issue hook.
- `DailyCronJob` pending-record polling.
- Manual admin actions: issue, retry, poll, poll pending.
- Local table `mod_viettel_sinvoice_invoices` for UUID/state tracking.
- API-key, Basic Auth, and token-cookie authentication modes.
- Strict TLS verification, bounded timeouts, and redacted WHMCS module logs.
- Bilingual admin UI and messages (English / Vietnamese).

### Installation

Copy this directory to `modules/addons/viettel_sinvoice/`, activate the addon in WHMCS, and configure the settings. See [`docs/INSTALLATION.md`](docs/INSTALLATION.md).

### Configuration

Configure Viettel credentials, seller information, invoice template/series, VAT defaults, and buyer tax-code rules. See [`docs/CONFIGURATION.md`](docs/CONFIGURATION.md).

### Releases

Release packages are built and published automatically by CI/CD when a `v*` tag is pushed. Do not build locally — download from [GitHub Releases](https://github.com/hitechcloudvn/whmcs-viettel-sinvoice/releases).

### Support

- Commercial support: `support@photuesoftware.com`
- Security reports: `report@photuesoftware.com`

### License

Commercial proprietary license — copyright © 2026 Pho Tue SoftWare And Technology Solutions Joint Stock Company. See [`LICENSE`](LICENSE), [`COMMERCIAL-LICENSE.md`](COMMERCIAL-LICENSE.md), and [`LEGAL-NOTICE.md`](LEGAL-NOTICE.md).

---

## Tiếng Việt

### Tổng quan

Addon kết nối WHMCS với Viettel SInvoice (`vinvoice.viettel.vn`) để phát hành hóa đơn điện tử tại Việt Nam. Mô-đun có thể tự phát hành hóa đơn khi WHMCS kích hoạt `InvoicePaid`, hỗ trợ phát hành/đối soát thủ công từ trang quản trị, và đối soát các phản hồi chưa rõ kết quả của Viettel theo `transactionUuid` đã lưu.

### Yêu cầu

- Môi trường addon tương thích WHMCS 8.x/9.x.
- PHP có extension cURL và JSON.
- Thông tin xác thực API Viettel SInvoice cùng mẫu số/ký hiệu hóa đơn đang hoạt động.
- Chỉ hỗ trợ hóa đơn VND.

### Tính năng

- Vòng đời addon WHMCS: kích hoạt, tắt, nâng cấp và giao diện quản trị.
- Hook tự phát hành khi `InvoicePaid`.
- Hook `DailyCronJob` đối soát bản ghi đang chờ.
- Thao tác thủ công: phát hành, phát hành lại, đối soát, đối soát bản ghi đang chờ.
- Bảng cục bộ `mod_viettel_sinvoice_invoices` theo dõi UUID/trạng thái.
- Ba chế độ xác thực: API Key, Basic Auth và Token Cookie.
- Kiểm chứng TLS nghiêm ngặt, timeout giới hạn và log WHMCS đã che redaction.
- Giao diện và thông báo song ngữ (Anh / Việt).

### Cài đặt

Chép thư mục này vào `modules/addons/viettel_sinvoice/`, kích hoạt addon trong WHMCS và cấu hình cài đặt. Xem [`docs/INSTALLATION.md`](docs/INSTALLATION.md).

### Cấu hình

Cấu hình thông tin xác thực Viettel, thông tin bên bán, mẫu số/ký hiệu hóa đơn, VAT mặc định và quy tắc MST bên mua. Xem [`docs/CONFIGURATION.md`](docs/CONFIGURATION.md).

### Phát hành

Gói phát hành được CI/CD tự động build và đăng khi đẩy tag `v*`. Không build local — tải từ [GitHub Releases](https://github.com/hitechcloudvn/whmcs-viettel-sinvoice/releases).

### Hỗ trợ

- Hỗ trợ thương mại: `support@photuesoftware.com`
- Báo cáo bảo mật: `report@photuesoftware.com`

### Giấy phép

Giấy phép thương mại độc quyền — bản quyền © 2026 Công ty Cổ phần Giải pháp Công nghệ và Phần mềm Phổ Tuệ. Xem [`LICENSE`](LICENSE), [`COMMERCIAL-LICENSE.md`](COMMERCIAL-LICENSE.md) và [`LEGAL-NOTICE.md`](LEGAL-NOTICE.md).
