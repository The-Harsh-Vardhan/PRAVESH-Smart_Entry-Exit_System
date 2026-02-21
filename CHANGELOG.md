# Changelog

All notable changes to the PRAVESH - Smart Entry-Exit System project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

## [1.1.0] - 2026-02-21

### Added

- `Achievement/` folder with recognition materials from Circuit Digest
- `SECURITY.md` with responsible disclosure and deployment security guidance
- Vercel badge to README header
- Detailed project structure tree in README covering all directories

### Changed

- Sanitized Arduino code: replaced hardcoded WiFi credentials and server IP with `YOUR_WIFI_SSID`, `YOUR_WIFI_PASSWORD`, and `YOUR_SERVER_IP` placeholders
- Updated README code snippets to match sanitized source
- Expanded `api/` branch in project structure to show sub-directories
- Updated `.gitignore` to exclude `api/vendor/` (Composer deps) and `rfidattendance/`

### Fixed

- Broken `Achievement/` image references now documented in `Achievement/README.md`

## [1.0.0] - 2024-11-08

### Added

- Initial release of PRAVESH Smart Entry-Exit System
- Arduino Uno R4 WiFi integration with RFID scanning
- Web-based management interface with PHP backend
- MySQL database for user and log management
- Email notification system for visit requests
- Real-time WiFi status monitoring
- LED and buzzer feedback system
- Export functionality for attendance logs

### Features

- **Hardware Integration**: Complete RFID-based access control system
- **Web Dashboard**: User management and attendance tracking
- **Email Integration**: Automated form submission for visit requests
- **Real-time Feedback**: LED status indicators and buzzer alerts
- **Data Export**: Excel export functionality for attendance records
- **Responsive Design**: Mobile-friendly web interface

### Hardware Components

- Arduino Uno R4 WiFi
- RC522 RFID Reader Module
- RGB LED indicators
- LCD1602 Display with I2C interface
- 5V Passive Buzzer
- Supporting electronic components

### Recognition

- Featured in IoT & Edge AI Project Challenge 2024 by Circuit Digest
- Official project showcase and certificate received
