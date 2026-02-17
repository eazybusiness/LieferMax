# WordPress Template Migration - Task List

**Last Updated**: February 17, 2026  
**Strategy**: Convert static HTML to WordPress theme (1:1 design match)  
**Target**: Strato WordPress hosting

---

## 🎯 Project Goals

1. ✅ **1:1 Design Match** - Pixel-perfect replication of static site
2. ✅ **Minimal Manual Work** - Automated content migration
3. ✅ **WordPress CMS** - Client can edit content easily
4. ✅ **Strato Compatible** - Standard WordPress, no special requirements

---

## ✅ Completed

### Strategy & Planning (Feb 17, 2026)
- [x] Analyzed deployment options (Netlify, Strato, WordPress)
- [x] Decided on WordPress template solution
- [x] Pulled static HTML from GitHub main branch
- [x] Created WP-TEMPLATE-PLAN.md
- [x] Created WP-TASK.md

---

## 🔄 In Progress

### Phase 1: HTML Analysis & Theme Structure

#### 1.1 Analyze Static HTML
- [ ] Identify common components (header, footer, navigation)
- [ ] Map out page templates needed (8 pages)
- [ ] Document CSS/JS dependencies
- [ ] List all images and assets

#### 1.2 Create WordPress Theme Structure
- [ ] Create `wordpress-theme/` directory
- [ ] Create `style.css` (theme header)
- [ ] Create `functions.php` (enqueue CSS/JS, ACF setup)
- [ ] Create `header.php` (navigation, meta tags)
- [ ] Create `footer.php` (footer section)
- [ ] Create `index.php` (fallback template)

#### 1.3 Create Page Templates
- [ ] `front-page.php` (Homepage)
- [ ] `page-products.php` (Products)
- [ ] `page-integration.php` (Integration)
- [ ] `page-contact.php` (Contact)
- [ ] `page-weitere-tools.php` (Weitere Tools)
- [ ] `page-impressum.php` (Impressum)
- [ ] `page-agb.php` (AGB)
- [ ] `page-datenschutz.php` (Datenschutz)

---

## 📋 Backlog

### Phase 2: Local WordPress Setup

#### 2.1 Docker Setup
- [ ] Create `docker-compose.yml`
- [ ] Start WordPress + MySQL containers
- [ ] Access WordPress at localhost:8080
- [ ] Complete WordPress installation

#### 2.2 Theme Installation
- [ ] Copy theme to `wp-content/themes/liefermax/`
- [ ] Activate theme in WordPress admin
- [ ] Verify theme loads correctly

#### 2.3 Plugin Installation
- [ ] Install Advanced Custom Fields (ACF)
- [ ] Install ACF to REST API (optional)
- [ ] Activate plugins

---

### Phase 3: ACF Configuration

#### 3.1 Define Field Groups
- [ ] Global Settings (logo, contact info)
- [ ] Page Fields (hero, content blocks)
- [ ] Product Fields (features, screenshots)
- [ ] Contact Fields (form, map)

#### 3.2 Create ACF Fields
- [ ] Hero Section fields
- [ ] Content Blocks (repeater)
- [ ] Feature Lists (repeater)
- [ ] Gallery fields
- [ ] Product-specific fields

---

### Phase 4: Content Migration

#### 4.1 Create WordPress Pages
- [ ] Create all 8 pages in WordPress
- [ ] Assign correct page templates
- [ ] Set page slugs (URLs)

#### 4.2 Migrate Content
- [ ] Homepage content
- [ ] Products page content
- [ ] Integration page content
- [ ] Contact page content
- [ ] Legal pages content

#### 4.3 Upload Media
- [ ] Upload all images to Media Library
- [ ] Organize images in folders (if plugin available)
- [ ] Assign images to ACF fields

---

### Phase 5: Testing & Verification

#### 5.1 Design Verification
- [ ] Compare homepage: static vs WordPress
- [ ] Compare products page: static vs WordPress
- [ ] Compare all pages pixel-by-pixel
- [ ] Fix any design discrepancies

#### 5.2 Responsive Testing
- [ ] Test on mobile (320px, 375px, 414px)
- [ ] Test on tablet (768px, 1024px)
- [ ] Test on desktop (1280px, 1920px)

#### 5.3 Functionality Testing
- [ ] Navigation works on all pages
- [ ] Links work correctly
- [ ] Images load properly
- [ ] Contact form works (if implemented)
- [ ] Mobile menu works

#### 5.4 Browser Testing
- [ ] Chrome
- [ ] Firefox
- [ ] Safari
- [ ] Edge

---

### Phase 6: Export & Documentation

#### 6.1 Create Export Package
- [ ] Export WordPress XML (Tools → Export)
- [ ] Export database SQL dump
- [ ] Zip theme folder
- [ ] Zip uploads folder
- [ ] Create installation instructions

#### 6.2 Documentation
- [ ] Write Strato import guide
- [ ] Write client user manual
- [ ] Document ACF field usage
- [ ] Create troubleshooting guide

---

### Phase 7: Strato Deployment

#### 7.1 Client Preparation
- [ ] Request new WordPress instance on Strato
- [ ] Get WordPress admin credentials
- [ ] Get FTP/SFTP credentials

#### 7.2 Import to Strato
- [ ] Upload theme via FTP or WordPress admin
- [ ] Install ACF plugin
- [ ] Import WordPress XML
- [ ] Verify all content imported
- [ ] Activate theme

#### 7.3 Final Verification
- [ ] Test all pages on Strato
- [ ] Verify 1:1 design match
- [ ] Test client can edit content
- [ ] Fix any issues

#### 7.4 Handover
- [ ] Train client on WordPress admin
- [ ] Show how to edit pages
- [ ] Show how to upload images
- [ ] Provide documentation
- [ ] Get client approval

---

## 🎯 Success Criteria

**Theme is complete when:**
- [ ] All 8 pages exist as WordPress templates
- [ ] Design is 1:1 identical to static site
- [ ] All images and assets are included
- [ ] ACF fields allow easy content editing
- [ ] Responsive on all devices
- [ ] Works on Strato WordPress
- [ ] Client can edit content without HTML knowledge
- [ ] Export package is ready

---

## 📊 Time Estimates

- **Phase 1**: HTML Analysis & Theme Structure - 4 hours
- **Phase 2**: Local WordPress Setup - 1 hour
- **Phase 3**: ACF Configuration - 2 hours
- **Phase 4**: Content Migration - 3 hours
- **Phase 5**: Testing & Verification - 3 hours
- **Phase 6**: Export & Documentation - 2 hours
- **Phase 7**: Strato Deployment - 2 hours

**Total**: ~17 hours

---

## 🔧 Technical Stack

- **WordPress**: 6.x (latest)
- **PHP**: 7.4+ (Strato compatible)
- **MySQL**: 5.7+
- **Theme**: Custom (liefermax-wp-theme)
- **Plugins**: Advanced Custom Fields (ACF)
- **CSS**: TailwindCSS CDN (from static site)
- **JS**: Vanilla JavaScript (from static site)

---

## 📝 Notes

### Design Requirements
- Must look exactly like static HTML version
- No design changes allowed
- Original CSS/JS must be preserved
- TailwindCSS CDN must work

### Client Requirements
- Minimal manual work for content entry
- Easy to edit text and images
- No HTML knowledge required
- Standard WordPress (no custom solutions)

### Deployment Requirements
- Must work on Strato shared hosting
- No special server requirements
- Standard WordPress installation
- Easy to export and import

---

**Next Action**: Start Phase 1 - Analyze HTML structure
