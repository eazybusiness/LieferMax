---
trigger: always_on
---

# PROJECT-RULES.md

## LieferMax Website Redesign - Development Guidelines

This document outlines the rules and best practices for developing the LieferMax website redesign project using AI coding assistants.

---

## 1. 🔑 Golden Rules

These are the high-level principles that guide how to work with AI tools efficiently and effectively:

- **Use markdown files to manage the project** (`README.md`, `PLANNING.md`, `TASK.md`)
- **Keep HTML files under 500 lines**. Split into components or separate pages when needed
- **Start fresh conversations often**. Long threads degrade response quality
- **Don't overload the model**. One task per message is ideal
- **Test early, test often**. Test on multiple browsers and devices regularly
- **Be specific in your requests**. The more context, the better. Examples help a lot
- **Write docs and comments as you go**. Don't delay documentation
- **Handle sensitive data yourself**. Don't trust the LLM with API keys, email credentials, etc.

---

## 2. 🧠 Planning & Task Management

Before writing any code, plan the initial scope and tasks for the project. Scope goes into `PLANNING.md`, and specific tasks go into `TASK.md`. These should be updated by the AI coding assistant as the project progresses.

### PLANNING.md
- **Purpose**: High-level vision, architecture, constraints, tech stack, design system, etc.
- **Prompt to AI**: "Use the structure and decisions outlined in PLANNING.md."
- Have the LLM reference this file at the beginning of any new conversation

### TASK.md
- **Purpose**: Tracks current tasks, backlog, and sub-tasks
- **Includes**: Bullet list of active work, milestones, and anything discovered mid-process
- **Prompt to AI**: "Update TASK.md to mark XYZ as done and add ABC as a new task."
- Can prompt the LLM to automatically update and create tasks as well (through global rules)

---

## 3. ⚙️ Global Rules (For AI IDEs)

Use these rules in your AI IDE (Cursor, Windsurf, Cline, Roo Code) to enforce consistency:

### 🔄 Project Awareness & Context
- **Always read `PLANNING.md`** at the start of a new conversation to understand the project's architecture, goals, design system, and constraints
- **Check `TASK.md`** before starting a new task. If the task isn't listed, add it with a brief description and today's date
- **Use consistent naming conventions, file structure, and design patterns** as described in `PLANNING.md`

### 🧱 Code Structure & Modularity
- **Never create an HTML file longer than 500 lines**. If a file approaches this limit, refactor by splitting into separate pages or reusable components
- **Organize files into a clear structure**: 
  - `/` - Root HTML pages
  - `/assets/css/` - Stylesheets
  - `/assets/js/` - JavaScript files
  - `/assets/images/` - Image files
  - `/assets/php/` - PHP scripts (contact forms, etc.)
- **Use consistent CSS class naming** (follow BEM or utility-first conventions as defined in `PLANNING.md`)
- **Separate concerns**: Keep structure (HTML), presentation (CSS), and behavior (JS) separated

### 🎨 Design & UI Consistency
- **Follow the design system** defined in `PLANNING.md` (colors, typography, spacing, components)
- **Maintain responsive design** - test on mobile, tablet, and desktop breakpoints
- **Use semantic HTML5** elements (`<header>`, `<nav>`, `<main>`, `<section>`, `<article>`, `<footer>`)
- **Ensure accessibility**: proper heading hierarchy, alt text for images, ARIA labels where needed
- **Optimize images**: compress images, use appropriate formats (WebP, SVG), provide responsive images

### 🧪 Testing & Quality Assurance
- **Test on multiple browsers**: Chrome, Firefox, Safari, Edge
- **Test responsive breakpoints**: Mobile (320px, 375px, 414px), Tablet (768px, 1024px), Desktop (1280px, 1920px)
- **Validate HTML**: Use W3C validator to ensure valid markup
- **Check performance**: Lighthouse scores, page load times, image optimization
- **Test forms**: Validate all form inputs, test PHP mail functionality on server

### ✅ Task Completion
- **Mark completed tasks in `TASK.md`** immediately after finishing them
- Add new sub-tasks or TODOs discovered during development to `TASK.md` under a "Discovered During Work" section
- **Test before marking complete**: Verify the feature works as expected across browsers and devices

### 📎 Style & Conventions

#### HTML
- **Use HTML5 semantic elements**
- **Indent with 4 spaces** (or 2 spaces if preferred - be consistent)
- **Use lowercase** for element names and attributes
- **Quote all attribute values** with double quotes
- **Include proper meta tags**: charset, viewport, description, Open Graph tags
- **Comment sections** for clarity:
  ```html
  <!-- Hero Section -->
  <section class="hero">
      ...
  </section>
  ```

#### CSS
- **Use TailwindCSS utility classes** as primary styling method (as per current implementation)
- **Custom CSS in `<style>` tags** for project-specific styles not covered by Tailwind
- **Use CSS custom properties** for theme colors and repeated values:
  ```css
  :root {
      --primary-color: #0066FF;
      --secondary-color: #00C9FF;
  }
  ```
- **Mobile-first approach**: Base styles for mobile, use `@media` queries for larger screens
- **Comment complex selectors** and explain why they exist

#### JavaScript
- **Use modern ES6+ syntax** (const/let, arrow functions, template literals)
- **Vanilla JavaScript preferred** for simple interactions
- **Comment complex logic**:
  ```js
  // Reason: Smooth scroll to section with offset for fixed header
  function scrollToSection(id) {
      const element = document.getElementById(id);
      const offset = 80; // Header height
      window.scrollTo({
          top: element.offsetTop - offset,
          behavior: 'smooth'
      });
  }
  ```
- **Handle errors gracefully** with try/catch blocks
- **Use event delegation** for dynamic elements

#### PHP
- **Keep PHP minimal** - only for form handling and email sending
check if  host (strato hosting) supports php.
- **Validate and sanitize all inputs**:
  ```php
  $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
  $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
  ```
- **Use prepared statements** if database interaction is needed
- **Never expose sensitive data** in error messages
- **Comment security measures**

### 📚 Documentation & Explainability
- **Update `README.md`** when new features are added, dependencies change, or setup steps are modified
- **Comment non-obvious code** and ensure everything is understandable to a mid-level developer
- **Document third-party dependencies**: CDN links, external libraries, fonts
- **Include deployment instructions** in README or separate `DEPLOYMENT.md`
- When writing complex logic, **add an inline comment** explaining the why, not just the what:
  ```js
  // Reason: Debounce scroll event to improve performance on mobile devices
  let scrollTimeout;
  window.addEventListener('scroll', () => {
      clearTimeout(scrollTimeout);
      scrollTimeout = setTimeout(handleScroll, 100);
  });
  ```

### 🧠 AI Behavior Rules
- **Never assume missing context. Ask questions if uncertain.**
- **Never hallucinate libraries or CDN links** – only use known, verified resources
- **Always confirm file paths** exist before referencing them in code
- **Never delete or overwrite existing code** unless explicitly instructed to or if part of a task from `TASK.md`
- **Preserve existing functionality** when refactoring or adding new features
- **Test changes** before marking tasks complete
- **Use real content** from the original LieferMax website, not placeholder text
- **Follow the established design system** - don't introduce new colors, fonts, or styles without discussion

### 🔒 Security Best Practices
- **Sanitize all user inputs** in PHP forms
- **Use HTTPS** for production deployment
- **Don't commit sensitive data** to Git (.env files, API keys, email credentials)
- **Implement CSRF protection** for forms if needed
- **Set proper file permissions** on server (644 for files, 755 for directories)
- **Keep dependencies updated** (TailwindCSS CDN, Font Awesome, etc.)

### 🚀 Performance Optimization
- **Minimize HTTP requests**: Combine files where possible, use CDN for libraries
- **Optimize images**: Compress, use modern formats (WebP), lazy load below-the-fold images
- **Minify CSS/JS** for production
- **Use browser caching**: Set appropriate cache headers
- **Defer non-critical JavaScript**: Use `defer` or `async` attributes
- **Optimize font loading**: Use `font-display: swap` for web fonts

### 📱 Responsive Design Requirements
- **Mobile-first approach**: Design for mobile, enhance for larger screens
- **Test breakpoints**:
  - Mobile: 320px - 767px
  - Tablet: 768px - 1023px
  - Desktop: 1024px+
- **Touch-friendly**: Minimum 44x44px touch targets on mobile
- **Readable text**: Minimum 16px font size on mobile
- **Flexible images**: Use `max-width: 100%` and `height: auto`

### 🎯 Browser Support
- **Modern browsers**: Chrome, Firefox, Safari, Edge (last 2 versions)
- **Graceful degradation**: Core functionality works without JavaScript
- **Progressive enhancement**: Enhanced features for modern browsers
- **Test on real devices** when possible, not just browser dev tools

---

## 4. 📋 Workflow Summary

1. **Start conversation**: Read `PLANNING.md` and `TASK.md`
2. **Pick a task**: Choose from `TASK.md` or discuss new feature
3. **Plan approach**: Break down into smaller steps if needed
4. **Implement**: Write clean, documented code following conventions
5. **Test**: Verify on multiple browsers and devices
6. **Update docs**: Update README if needed, add comments
7. **Mark complete**: Update `TASK.md` and commit with clear message
8. **Git commit**: Use descriptive commit messages following conventional commits format

---

## 5. 🎨 Design System Reference

Refer to `PLANNING.md` for:
- Color palette (primary, secondary, accent, neutral colors)
- Typography scale (font families, sizes, weights)
- Spacing system (margins, padding, gaps)
- Component library (buttons, cards, forms, navigation)
- Animation guidelines (transitions, hover effects)
- Iconography (Font Awesome usage)

---

## 6. 🔄 Git Workflow

- **Commit often** with clear, descriptive messages
- **Use conventional commits**:
  - `feat: Add contact form with PHP validation`
  - `fix: Correct mobile menu toggle behavior`
  - `style: Update hero section gradient colors`
  - `docs: Update README with deployment instructions`
  - `refactor: Split products page into separate sections`
- **Push to remote** after completing major milestones
- **Create .gitignore**: Exclude sensitive files, node_modules, .env files

---

## 7. 📞 When to Ask for Help

Ask the user for clarification when:
- **Design decisions** are unclear (colors, layouts, content)
- **Business logic** needs confirmation (form behavior, integrations)
- **Sensitive data** is required (email credentials, API keys)
- **Major architectural changes** are needed
- **Scope changes** or new features are discovered
- **Technical limitations** prevent implementation

---

## 8. ✨ Quality Checklist

Before marking any page complete, verify:
- [ ] HTML is valid (W3C validator)
- [ ] Responsive on all breakpoints
- [ ] Tested on Chrome, Firefox, Safari
- [ ] Images are optimized and have alt text
- [ ] Links work and point to correct pages
- [ ] Forms validate inputs properly
- [ ] Accessibility: proper headings, ARIA labels
- [ ] Performance: Lighthouse score > 90
- [ ] Code is commented and documented
- [ ] `TASK.md` is updated
- [ ] Git commit with clear message

---

**Remember**: Quality over speed. Take time to do it right the first time.
 I need a clean workspace. we are pushing to https://github.com/eazybusiness/LieferMax main branch. 