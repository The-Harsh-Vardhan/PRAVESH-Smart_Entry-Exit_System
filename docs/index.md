# PRAVESH - Smart Entry-Exit System

An Arduino UNO R4 WiFi reads an RFID card (RC522) and POSTs the UID to a PHP backend. The backend opens or closes an entry/exit log in MySQL, emails the student a form for the reason and expected return time, and warns as the deadline approaches. Admins manage users and export logs from a web panel.

- Featured in the [IoT & Edge AI Project Challenge 2024](https://circuitdigest.com/contest/iot-edge-ai-project-challenge-2024/) by Circuit Digest ([submission](https://circuitdigest.com/microcontroller-projects/pravesh-smart-entry-exit-system))
- [Demo video](https://youtu.be/IVIbOu4JvdQ)
- [Architecture](architecture.html)
- [Source and full README](https://github.com/The-Harsh-Vardhan/PRAVESH-Smart_Entry-Exit_System)

## Components

Arduino Uno R4 WiFi, RC522 RFID reader and 13.56 MHz cards, RGB LED, passive buzzer, LCD1602 with I2C adapter.

## Software

PHP, MySQL, PHPMailer, HTML/CSS/JS (Bootstrap, jQuery). Setup steps are in the README under "Installation & Setup".
