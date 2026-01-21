import './globals.css';

export const metadata = {
  title: 'PRAVESH - Smart Entry-Exit System | IoT RFID Attendance',
  description: 'PRAVESH is an RFID-enabled Smart Entry-Exit System built on Arduino UNO R4 WiFi. Features real-time tracking, automated email notifications, and an intuitive admin interface.',
  keywords: 'RFID, IoT, Arduino, Smart Entry, Attendance System, WiFi, Entry-Exit System',
  authors: [{ name: 'Kaushik & Harsh Vardhan' }],
  openGraph: {
    title: 'PRAVESH - Smart Entry-Exit System',
    description: 'An RFID-enabled Smart Entry-Exit System built on Arduino UNO R4 WiFi',
    type: 'website',
  },
};

export default function RootLayout({ children }) {
  return (
    <html lang="en">
      <head>
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossOrigin="anonymous" />
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
      </head>
      <body>{children}</body>
    </html>
  );
}
