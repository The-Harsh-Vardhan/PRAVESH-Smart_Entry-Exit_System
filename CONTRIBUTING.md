# Contributing to PRAVESH - Smart Entry-Exit System

Thank you for your interest in contributing to PRAVESH! We welcome contributions from the community and are excited to see what you can bring to this project.

## 🤝 How to Contribute

### Reporting Issues

- Use the GitHub Issues tab to report bugs or suggest features
- Provide clear, detailed descriptions with steps to reproduce
- Include relevant hardware/software specifications

### Code Contributions

1. **Fork** the repository
2. **Create** a new branch for your feature (`git checkout -b feature/your-feature-name`)
3. **Make** your changes following our coding standards
4. **Test** your changes thoroughly
5. **Commit** with clear, descriptive messages
6. **Push** to your fork and submit a **Pull Request**

## 📋 Development Guidelines

### Arduino Code

- Follow Arduino coding conventions
- Comment complex logic clearly
- Test on actual hardware when possible
- Update pin definitions if hardware changes

### PHP/Web Development

- Follow PSR standards for PHP code
- Validate and sanitize all user inputs
- Test database operations thoroughly
- Maintain responsive design principles

### Documentation

- Update README.md for significant changes
- Add inline comments for complex functions
- Update circuit diagrams if hardware changes
- Include setup instructions for new features

## 🧪 Testing

Before submitting a pull request:

- Test Arduino code on actual hardware
- Verify database operations work correctly
- Test web interface across different browsers
- Ensure RFID scanning functions properly

## 📝 Code Style

### Arduino

```cpp
// Use descriptive variable names
const int RED_LED_PIN = 1;
const int GREEN_LED_PIN = 2;

// Comment complex logic
if (WiFi.status() != WL_CONNECTED) {
    // Handle WiFi disconnection
    digitalWrite(RED_LED_PIN, HIGH);
}
```

### PHP

```php
<?php
// Use clear function names and proper error handling
function validateUserInput($input) {
    return htmlspecialchars(trim($input));
}
?>
```

## 🎯 Priority Areas

We're especially interested in contributions for:

- Mobile app development
- Enhanced security features
- Additional sensor integrations
- Performance optimizations
- Multi-language support

## 📞 Getting Help

If you need help:

- Check existing issues for similar problems
- Review the README.md for setup instructions
- Feel free to open a discussion for questions

## 🏆 Recognition

Contributors will be:

- Listed in the project acknowledgments
- Mentioned in release notes for significant contributions
- Invited to join our contributor community

Thank you for making PRAVESH better! 🚀
