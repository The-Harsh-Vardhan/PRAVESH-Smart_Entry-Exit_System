'use client';

import Link from 'next/link';
import { useState, useEffect } from 'react';

export default function Home() {
  const [isVisible, setIsVisible] = useState(false);

  useEffect(() => {
    setIsVisible(true);
  }, []);

  const features = [
    {
      icon: '📡',
      title: 'RFID Technology',
      description: 'Seamless card scanning with RC522 RFID module operating at 13.56MHz for instant identification.'
    },
    {
      icon: '📶',
      title: 'WiFi Connected',
      description: 'Built on Arduino UNO R4 WiFi for real-time data transmission and cloud synchronization.'
    },
    {
      icon: '📧',
      title: 'Email Notifications',
      description: 'Automated email alerts sent to users with visit forms for reason and return time estimation.'
    },
    {
      icon: '💾',
      title: 'Database Logging',
      description: 'Comprehensive MySQL database stores all entry/exit logs with timestamps and user details.'
    },
    {
      icon: '🖥️',
      title: 'Admin Dashboard',
      description: 'Intuitive web interface for managing users, viewing logs, and exporting data to Excel.'
    },
    {
      icon: '🔔',
      title: 'Visual & Audio Feedback',
      description: 'RGB LED indicators and buzzer provide immediate feedback on scan status and WiFi connectivity.'
    }
  ];

  const steps = [
    {
      title: 'WiFi Connection',
      description: 'System connects to WiFi network. Green LED indicates ready status, red LED shows connection issues.'
    },
    {
      title: 'Card Scanning',
      description: 'User taps RFID card on the scanner. Blue LED activates and buzzer confirms the scan.'
    },
    {
      title: 'Data Transmission',
      description: 'UID is sent to server via HTTP POST. Display shows "Wait" during processing.'
    },
    {
      title: 'Email Notification',
      description: 'Automated email sent to user with a form to specify visit reason and return time.'
    },
    {
      title: 'Database Update',
      description: 'Entry logged in MySQL database with complete timestamp and user information.'
    }
  ];

  const techStack = [
    { name: 'Arduino', icon: '🔌' },
    { name: 'RFID RC522', icon: '📡' },
    { name: 'PHP', icon: '🐘' },
    { name: 'MySQL', icon: '🗄️' },
    { name: 'HTML/CSS', icon: '🎨' },
    { name: 'JavaScript', icon: '⚡' }
  ];

  return (
    <main>
      {/* Hero Section */}
      <section className="hero">
        <div className="hero-content" style={{ opacity: isVisible ? 1 : 0, transform: isVisible ? 'translateY(0)' : 'translateY(30px)', transition: 'all 0.8s ease' }}>
          <div className="hero-badge">
            🏆 Top 10 in IoT & Edge AI Challenge 2024
          </div>
          <h1>
            <span className="gradient-text">PRAVESH</span>
            <br />
            Smart Entry-Exit System
          </h1>
          <p className="hero-description">
            An RFID-enabled access control system that replaces manual entry logs with a seamless digital solution. Built on Arduino UNO R4 WiFi with real-time tracking and automated notifications.
          </p>
          <div className="hero-buttons">
            <Link href="/demo" className="btn btn-primary">
              🎮 Try Demo Dashboard
            </Link>
            <a href="https://github.com/The-Harsh-Vardhan/PRAVESH-Smart_Entry-Exit_System" target="_blank" rel="noopener noreferrer" className="btn btn-secondary">
              ⭐ View on GitHub
            </a>
          </div>
          <div className="hero-stats">
            <div className="stat">
              <div className="stat-value">2</div>
              <div className="stat-label">Contributors</div>
            </div>
            <div className="stat">
              <div className="stat-value">5+</div>
              <div className="stat-label">Features</div>
            </div>
            <div className="stat">
              <div className="stat-value">100%</div>
              <div className="stat-label">Open Source</div>
            </div>
          </div>
        </div>
      </section>

      {/* Features Section */}
      <section className="section" id="features">
        <div className="container">
          <div className="section-title">
            <h2 className="gradient-text">Key Features</h2>
            <p>Everything you need for modern access control</p>
          </div>
          <div className="features-grid">
            {features.map((feature, index) => (
              <div key={index} className="card feature-card" style={{ animationDelay: `${index * 0.1}s` }}>
                <div className="feature-icon">{feature.icon}</div>
                <h3>{feature.title}</h3>
                <p>{feature.description}</p>
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* How It Works */}
      <section className="section" style={{ background: 'var(--bg-card)' }}>
        <div className="container">
          <div className="section-title">
            <h2 className="gradient-text">How It Works</h2>
            <p>Simple yet powerful workflow</p>
          </div>
          <div className="steps">
            {steps.map((step, index) => (
              <div key={index} className="step">
                <div className="step-number">{index + 1}</div>
                <div className="step-content">
                  <h3>{step.title}</h3>
                  <p>{step.description}</p>
                </div>
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* Demo Video */}
      <section className="section" id="video">
        <div className="container">
          <div className="section-title">
            <h2 className="gradient-text">See It In Action</h2>
            <p>Watch the complete demonstration video</p>
          </div>
          <div className="video-container">
            <iframe
              src="https://www.youtube.com/embed/IVIbOu4JvdQ"
              title="PRAVESH Demo Video"
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
              allowFullScreen
            />
          </div>
        </div>
      </section>

      {/* Circuit Diagram */}
      <section className="section circuit-section" id="circuit">
        <div className="container">
          <div className="section-title">
            <h2 className="gradient-text">Circuit Design</h2>
            <p>Hardware architecture and connections</p>
          </div>
          <div className="circuit-image">
            <img
              src="https://github.com/user-attachments/assets/98a0ec40-ed14-47a5-8481-313d653f8307"
              alt="PRAVESH Circuit Diagram"
            />
          </div>
          <div style={{ marginTop: '40px' }}>
            <div className="section-title" style={{ marginBottom: '30px' }}>
              <h3>Components Used</h3>
            </div>
            <div className="tech-grid">
              <div className="tech-badge">🔌 Arduino UNO R4 WiFi</div>
              <div className="tech-badge">📡 RC522 RFID Module</div>
              <div className="tech-badge">🪪 RFID Cards & Tags</div>
              <div className="tech-badge">💡 RGB LED</div>
              <div className="tech-badge">🔔 5V Passive Buzzer</div>
              <div className="tech-badge">📺 LCD1602 Display</div>
            </div>
          </div>
        </div>
      </section>

      {/* Achievement Section */}
      <section className="section" id="achievement">
        <div className="container">
          <div className="section-title">
            <h2 className="gradient-text">Recognition</h2>
            <p>Award-winning IoT project</p>
          </div>
          <div className="card achievement-card">
            <div className="achievement-badge">
              🏆 Featured Project
            </div>
            <img
              src="https://github.com/user-attachments/assets/11fcc62a-ddb5-4044-9ebf-1434e3fe8b86"
              alt="Certificate of Achievement"
              className="certificate-image"
              style={{ maxWidth: '500px', width: '100%' }}
            />
            <h3>IoT & Edge AI Project Challenge 2024</h3>
            <p style={{ color: 'var(--text-secondary)', marginTop: '12px' }}>
              PRAVESH was recognized and featured in the IoT & Edge AI Project Challenge 2024 by Circuit Digest, securing a position in the Top 10.
            </p>
            <a
              href="https://circuitdigest.com/microcontroller-projects/pravesh-smart-entry-exit-system"
              target="_blank"
              rel="noopener noreferrer"
              className="btn btn-secondary"
              style={{ marginTop: '24px' }}
            >
              📖 Read Full Article
            </a>
          </div>
        </div>
      </section>

      {/* Tech Stack */}
      <section className="section" style={{ background: 'var(--bg-card)' }}>
        <div className="container">
          <div className="section-title">
            <h2 className="gradient-text">Tech Stack</h2>
            <p>Built with proven technologies</p>
          </div>
          <div className="tech-grid">
            {techStack.map((tech, index) => (
              <div key={index} className="tech-badge">
                {tech.icon} {tech.name}
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* CTA Section */}
      <section className="cta-section">
        <div className="container">
          <h2>Ready to Explore?</h2>
          <p>Check out the interactive demo or view the source code on GitHub</p>
          <div style={{ display: 'flex', gap: '16px', justifyContent: 'center', flexWrap: 'wrap' }}>
            <Link href="/demo" className="btn">
              🎮 Launch Demo
            </Link>
            <a href="https://github.com/The-Harsh-Vardhan/PRAVESH-Smart_Entry-Exit_System" target="_blank" rel="noopener noreferrer" className="btn" style={{ background: 'rgba(0,0,0,0.2)', color: 'white' }}>
              ⭐ Star on GitHub
            </a>
          </div>
        </div>
      </section>

      {/* Footer */}
      <footer className="footer">
        <div className="footer-links">
          <a href="https://github.com/The-Harsh-Vardhan/PRAVESH-Smart_Entry-Exit_System" target="_blank" rel="noopener noreferrer">GitHub</a>
          <a href="https://circuitdigest.com/microcontroller-projects/pravesh-smart-entry-exit-system" target="_blank" rel="noopener noreferrer">Circuit Digest</a>
          <a href="https://youtu.be/IVIbOu4JvdQ" target="_blank" rel="noopener noreferrer">YouTube Demo</a>
        </div>
        <p className="footer-copyright">
          Made with ❤️ by Kaushik & Harsh Vardhan • © 2024 PRAVESH
        </p>
      </footer>
    </main>
  );
}
