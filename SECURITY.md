# Security Policy

## Supported Versions

| Version | Supported          |
| ------- | ------------------ |
| 1.1.x   | ✅ Yes             |
| 1.0.x   | ⚠️ Bug fixes only  |

## Reporting a Vulnerability

If you discover a security vulnerability in PRAVESH, please **do not** open a public GitHub issue.

Instead, report it privately by emailing the maintainers. You can find contact details in the [README](./README.md#-contact).

Please include:

- A clear description of the vulnerability
- Steps to reproduce the issue
- The potential impact
- Any suggested remediation (if applicable)

We will acknowledge your report within **48 hours** and aim to release a fix within **7 days** for critical issues.

## Security Best Practices for Deployers

When setting up PRAVESH in your own environment, please follow these guidelines:

### Arduino Firmware
- **Never commit real credentials** — use the placeholder constants in `Pravesh.ino` and fill them in locally before uploading.
- Keep your WiFi password strong and unique.
- Consider placing the Arduino on an isolated IoT VLAN.

### PHP Backend
- **Never commit `connectDB.php` with real credentials** — the file in this repo uses placeholder values. Add your real credentials via environment variables or a local config file excluded by `.gitignore`.
- Ensure your web server has HTTPS enabled in production.
- Keep PHP and all Composer dependencies up to date.
- Sanitize and validate all user inputs before database queries.

### Database
- Use a dedicated MySQL user with the minimum required privileges (SELECT, INSERT, UPDATE on the `sensor_db` database only).
- Do not expose MySQL port (3306) to the public internet.
- Take regular database backups.

## Disclosure Policy

We follow a **coordinated disclosure** model. Once a fix is available, we will publish a security advisory on GitHub and credit the reporter (unless they prefer to remain anonymous).

---

Thank you for helping keep PRAVESH secure! 🔒
