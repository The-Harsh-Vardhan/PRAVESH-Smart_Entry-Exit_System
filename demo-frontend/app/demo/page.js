'use client';

import Link from 'next/link';
import { useState, useEffect } from 'react';

export default function DemoPage() {
    const [activeTab, setActiveTab] = useState('dashboard');
    const [scanStatus, setScanStatus] = useState('ready');
    const [lastScanned, setLastScanned] = useState(null);

    // Sample demo data
    const users = [
        { id: 1, uid: '83c6e5fa', name: 'Kaushik Kumar', email: 'kaushik@example.com', gender: 'Male' },
        { id: 2, uid: 'f501fca5', name: 'Harsh Vardhan', email: 'harsh@example.com', gender: 'Male' },
        { id: 3, uid: 'a2b3c4d5', name: 'Priya Sharma', email: 'priya@example.com', gender: 'Female' },
        { id: 4, uid: 'e6f7g8h9', name: 'Raj Patel', email: 'raj@example.com', gender: 'Male' },
    ];

    const logs = [
        { id: 1, uid: '83c6e5fa', name: 'Kaushik Kumar', date: '2024-11-21', timeOut: '09:30', timeIn: '11:45', reason: 'Library Visit', status: 'in' },
        { id: 2, uid: 'f501fca5', name: 'Harsh Vardhan', date: '2024-11-21', timeOut: '10:15', timeIn: '-', reason: 'Canteen Break', status: 'out' },
        { id: 3, uid: 'a2b3c4d5', name: 'Priya Sharma', date: '2024-11-21', timeOut: '08:00', timeIn: '08:30', reason: 'Lab Session', status: 'in' },
        { id: 4, uid: '83c6e5fa', name: 'Kaushik Kumar', date: '2024-11-20', timeOut: '14:00', timeIn: '16:30', reason: 'Sports Practice', status: 'in' },
    ];

    const simulateScan = () => {
        setScanStatus('scanning');
        const randomUser = users[Math.floor(Math.random() * users.length)];

        setTimeout(() => {
            setScanStatus('processing');
            setTimeout(() => {
                setLastScanned(randomUser);
                setScanStatus('success');
                setTimeout(() => {
                    setScanStatus('ready');
                }, 3000);
            }, 1500);
        }, 1000);
    };

    const getStatusMessage = () => {
        switch (scanStatus) {
            case 'scanning': return { text: 'Scanning Card...', color: 'var(--primary)' };
            case 'processing': return { text: 'Processing...', color: 'var(--warning)' };
            case 'success': return { text: 'Card Accepted!', color: 'var(--success)' };
            default: return { text: 'Ready to Scan', color: 'var(--text-secondary)' };
        }
    };

    return (
        <div className="dashboard">
            {/* Header */}
            <div className="dashboard-header">
                <div>
                    <Link href="/" style={{ color: 'var(--text-muted)', fontSize: '0.9rem' }}>
                        ← Back to Home
                    </Link>
                    <h1 style={{ marginTop: '8px' }}>
                        <span className="gradient-text">PRAVESH</span> Demo Dashboard
                    </h1>
                </div>
                <div className="dashboard-nav">
                    {['dashboard', 'users', 'logs', 'scanner'].map((tab) => (
                        <button
                            key={tab}
                            className={`nav-btn ${activeTab === tab ? 'active' : ''}`}
                            onClick={() => setActiveTab(tab)}
                        >
                            {tab === 'dashboard' && '📊 '}
                            {tab === 'users' && '👥 '}
                            {tab === 'logs' && '📋 '}
                            {tab === 'scanner' && '📡 '}
                            {tab.charAt(0).toUpperCase() + tab.slice(1)}
                        </button>
                    ))}
                </div>
            </div>

            {/* Dashboard Tab */}
            {activeTab === 'dashboard' && (
                <>
                    <div className="dashboard-grid">
                        <div className="card stat-card primary">
                            <h4>Total Users</h4>
                            <div className="value">{users.length}</div>
                        </div>
                        <div className="card stat-card success">
                            <h4>Currently Inside</h4>
                            <div className="value">{logs.filter(l => l.status === 'in').length}</div>
                        </div>
                        <div className="card stat-card warning">
                            <h4>Currently Outside</h4>
                            <div className="value">{logs.filter(l => l.status === 'out').length}</div>
                        </div>
                        <div className="card stat-card accent">
                            <h4>Today&apos;s Scans</h4>
                            <div className="value">{logs.filter(l => l.date === '2024-11-21').length}</div>
                        </div>
                    </div>

                    <div className="card" style={{ marginTop: '24px' }}>
                        <h3 style={{ marginBottom: '24px' }}>Recent Activity</h3>
                        <div style={{ overflowX: 'auto' }}>
                            <table className="data-table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Card UID</th>
                                        <th>Time Out</th>
                                        <th>Time In</th>
                                        <th>Reason</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {logs.slice(0, 3).map((log) => (
                                        <tr key={log.id}>
                                            <td>{log.name}</td>
                                            <td><code>{log.uid}</code></td>
                                            <td>{log.timeOut}</td>
                                            <td>{log.timeIn}</td>
                                            <td>{log.reason}</td>
                                            <td>
                                                <span className={`status-badge ${log.status}`}>
                                                    {log.status === 'in' ? 'Inside' : 'Outside'}
                                                </span>
                                            </td>
                                        </tr>
                                    ))}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </>
            )}

            {/* Users Tab */}
            {activeTab === 'users' && (
                <div className="card">
                    <div style={{ display: 'flex', justifyContent: 'space-between', alignItems: 'center', marginBottom: '24px', flexWrap: 'wrap', gap: '16px' }}>
                        <h3>Registered Users</h3>
                        <button className="btn btn-primary" style={{ padding: '10px 20px' }}>
                            + Add User
                        </button>
                    </div>
                    <div style={{ overflowX: 'auto' }}>
                        <table className="data-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Card UID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Gender</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                {users.map((user) => (
                                    <tr key={user.id}>
                                        <td>{user.id}</td>
                                        <td><code>{user.uid}</code></td>
                                        <td>{user.name}</td>
                                        <td>{user.email}</td>
                                        <td>{user.gender}</td>
                                        <td>
                                            <button className="btn btn-secondary" style={{ padding: '6px 12px', fontSize: '0.85rem' }}>
                                                Edit
                                            </button>
                                        </td>
                                    </tr>
                                ))}
                            </tbody>
                        </table>
                    </div>
                </div>
            )}

            {/* Logs Tab */}
            {activeTab === 'logs' && (
                <div className="card">
                    <div style={{ display: 'flex', justifyContent: 'space-between', alignItems: 'center', marginBottom: '24px', flexWrap: 'wrap', gap: '16px' }}>
                        <h3>Entry/Exit Logs</h3>
                        <button className="btn btn-secondary" style={{ padding: '10px 20px' }}>
                            📥 Export to Excel
                        </button>
                    </div>
                    <div style={{ overflowX: 'auto' }}>
                        <table className="data-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Card UID</th>
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>Time Out</th>
                                    <th>Time In</th>
                                    <th>Reason</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                {logs.map((log) => (
                                    <tr key={log.id}>
                                        <td>{log.id}</td>
                                        <td><code>{log.uid}</code></td>
                                        <td>{log.name}</td>
                                        <td>{log.date}</td>
                                        <td>{log.timeOut}</td>
                                        <td>{log.timeIn}</td>
                                        <td>{log.reason}</td>
                                        <td>
                                            <span className={`status-badge ${log.status}`}>
                                                {log.status === 'in' ? 'Inside' : 'Outside'}
                                            </span>
                                        </td>
                                    </tr>
                                ))}
                            </tbody>
                        </table>
                    </div>
                </div>
            )}

            {/* Scanner Tab */}
            {activeTab === 'scanner' && (
                <div className="card" style={{ textAlign: 'center', padding: '60px 24px' }}>
                    <h3 style={{ marginBottom: '40px' }}>RFID Scanner Simulation</h3>

                    <div className="rfid-scanner">
                        <div
                            className="scanner-visual"
                            style={{
                                borderColor: scanStatus === 'success' ? 'var(--success)' :
                                    scanStatus === 'scanning' ? 'var(--primary)' :
                                        scanStatus === 'processing' ? 'var(--warning)' : 'var(--primary)'
                            }}
                        >
                            {scanStatus === 'scanning' ? '🔄' :
                                scanStatus === 'processing' ? '⏳' :
                                    scanStatus === 'success' ? '✅' : '📡'}
                        </div>

                        <p className="scanner-status" style={{ color: getStatusMessage().color }}>
                            {getStatusMessage().text}
                        </p>

                        {lastScanned && scanStatus === 'success' && (
                            <div style={{
                                background: 'var(--bg-elevated)',
                                padding: '20px',
                                borderRadius: 'var(--radius-md)',
                                marginBottom: '24px'
                            }}>
                                <p style={{ color: 'var(--text-muted)', marginBottom: '8px' }}>Last Scanned:</p>
                                <p style={{ fontSize: '1.25rem', fontWeight: '600' }}>{lastScanned.name}</p>
                                <p style={{ color: 'var(--text-secondary)' }}><code>{lastScanned.uid}</code></p>
                            </div>
                        )}

                        <button
                            className="btn btn-primary"
                            onClick={simulateScan}
                            disabled={scanStatus !== 'ready'}
                            style={{ opacity: scanStatus !== 'ready' ? 0.5 : 1 }}
                        >
                            {scanStatus === 'ready' ? '🪪 Simulate Card Scan' : 'Please Wait...'}
                        </button>

                        <p className="scanner-message" style={{ marginTop: '20px' }}>
                            Click the button above to simulate an RFID card scan
                        </p>
                    </div>
                </div>
            )}

            {/* Demo Notice */}
            <div className="card glass" style={{
                marginTop: '32px',
                textAlign: 'center',
                background: 'rgba(0, 212, 255, 0.05)',
                borderColor: 'rgba(0, 212, 255, 0.2)'
            }}>
                <p style={{ color: 'var(--text-secondary)' }}>
                    🎮 <strong>Demo Mode:</strong> This is an interactive demonstration of the PRAVESH dashboard.
                    The actual system connects to real hardware and a MySQL database.
                </p>
            </div>
        </div>
    );
}
