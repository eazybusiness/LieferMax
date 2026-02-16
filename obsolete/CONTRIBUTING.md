# Contributing to LieferMax Redesign

Thank you for your interest in contributing to this project!

## Development Setup

This is a static HTML/CSS project using TailwindCSS via CDN. No build process is required.

### Prerequisites

- A modern web browser (Chrome, Firefox, Safari, Edge)
- A code editor (VS Code, Sublime Text, etc.)
- Git for version control

### Local Development

1. Clone the repository:
```bash
git clone https://github.com/YOUR_USERNAME/liefermax-redesign.git
cd liefermax-redesign
```

2. Open files directly in your browser or use a local server:
```bash
# Python 3
python3 -m http.server 8000

# Node.js (if you have http-server installed)
npx http-server

# PHP
php -S localhost:8000
```

3. Visit `http://localhost:8000` in your browser

## Project Structure

```
liefermax-redesign/
├── index.html          # Homepage
├── services.html       # Services page
├── contact.html        # Contact page
├── README.md           # Project documentation
├── BID.md             # Freelancer bid information
├── CONTRIBUTING.md    # This file
└── .gitignore         # Git ignore rules
```

## Design Guidelines

### Color Palette

- **Primary Gradient**: `#667eea` to `#764ba2`
- **Background**: `#f9fafb` (gray-50)
- **Text**: `#111827` (gray-900)
- **Secondary Text**: `#6b7280` (gray-600)

### Typography

- **Font Family**: Inter (Google Fonts)
- **Headings**: Bold (700-800 weight)
- **Body**: Regular (400 weight)

### Spacing

- Use TailwindCSS spacing scale (4, 6, 8, 12, 16, 20, etc.)
- Consistent padding: `p-8` for cards, `py-20` for sections

### Components

- **Cards**: Rounded corners (`rounded-2xl`), shadow effects
- **Buttons**: Rounded full (`rounded-full`), gradient backgrounds
- **Icons**: Font Awesome 6.4.0
- **Animations**: Smooth transitions (0.3s ease)

## Making Changes

### Before You Start

1. Create a new branch for your changes:
```bash
git checkout -b feature/your-feature-name
```

2. Make your changes following the design guidelines

3. Test your changes in multiple browsers:
   - Chrome/Edge
   - Firefox
   - Safari (if available)

4. Test responsive design at different breakpoints:
   - Mobile: 375px, 414px
   - Tablet: 768px, 1024px
   - Desktop: 1280px, 1920px

### Code Style

- Use semantic HTML5 elements
- Maintain consistent indentation (2 or 4 spaces)
- Keep TailwindCSS classes organized (layout → spacing → colors → effects)
- Add comments for complex sections
- Ensure accessibility (alt tags, ARIA labels where needed)

### Commit Messages

Follow conventional commit format:

```
feat: add new feature
fix: bug fix
docs: documentation changes
style: formatting, missing semicolons, etc.
refactor: code restructuring
test: adding tests
chore: maintenance tasks
```

Examples:
```bash
git commit -m "feat: add pricing section to services page"
git commit -m "fix: mobile navigation menu alignment"
git commit -m "docs: update README with deployment instructions"
```

## Pull Request Process

1. Update documentation if needed
2. Test all pages thoroughly
3. Create a pull request with a clear description
4. Reference any related issues

## Responsive Design Checklist

- [ ] Mobile view (< 768px) works correctly
- [ ] Tablet view (768px - 1024px) works correctly
- [ ] Desktop view (> 1024px) works correctly
- [ ] Navigation menu adapts to screen size
- [ ] Images scale appropriately
- [ ] Text remains readable at all sizes
- [ ] Touch targets are at least 44x44px on mobile

## Browser Compatibility

This project supports:

- Chrome/Edge (last 2 versions)
- Firefox (last 2 versions)
- Safari (last 2 versions)
- Mobile browsers (iOS Safari, Chrome Mobile)

## Performance Guidelines

- Keep images optimized (use WebP when possible)
- Minimize use of custom CSS (leverage TailwindCSS)
- Avoid heavy JavaScript libraries
- Use CDN resources for faster loading
- Lazy load images when appropriate

## Accessibility

- Use semantic HTML elements
- Provide alt text for all images
- Ensure sufficient color contrast (WCAG AA minimum)
- Make interactive elements keyboard accessible
- Test with screen readers when possible

## Questions?

If you have questions or need help, please:

1. Check existing documentation
2. Review closed issues/PRs
3. Open a new issue with your question

## License

By contributing, you agree that your contributions will be licensed under the same license as the project.

---

**Thank you for contributing to make this project better!** 🎨✨
