# CMS Migration Plan - LieferMax Website

## Projektziel
Migration der statischen HTML-Website zu Astro + Decap CMS für einfache Content-Verwaltung ohne Programmierkenntnisse.

**Anforderungen:**
- ✅ Aktuelles Design 100% beibehalten
- ✅ Client kann Inhalte selbst ändern (manuell)
- ✅ AI Agent kann CMS bedienen (automatisiert)
- ✅ Keine Programmierkenntnisse erforderlich
- ✅ GitHub Pages Deployment beibehalten

---

## Phase 1: Analyse & Vorbereitung

### 1.1 Content-Typen identifizieren

**Seiten (Pages):**
- `index.html` - Homepage mit Hero, Features, Testimonials, CTA
- `products.html` - Produktübersicht (LieferMax, CHECK, MAP, Shop, Apps)
- `integration.html` - COPA Integration Details
- `contact.html` - Kontaktformular
- `agb.html`, `datenschutz.html`, `impressum.html` - Rechtliches

**Wiederverwendbare Content-Blöcke:**
- Navigation (auf allen Seiten identisch)
- Footer (auf allen Seiten identisch)
- Hero Sections (verschiedene Varianten)
- Feature Cards (Grid-Layout)
- Product Sections (2-Spalten Layout)
- CTA Sections (Call-to-Action Boxen)
- Image Galleries/Modals

**Assets:**
- Bilder: `assets/images/` (Logos, Screenshots, Fotos)
- Styles: Inline TailwindCSS
- Scripts: Inline JavaScript (Modals, Navigation)

### 1.2 Editierbare Content-Felder

**Pro Seite:**
- Meta Tags (Title, Description, Keywords)
- Hero Section (Titel, Untertitel, Bild, CTA-Button)
- Content Sections (Überschrift, Text, Bilder, Listen)
- SEO-Daten (Open Graph, Canonical URLs)

**Globale Einstellungen:**
- Site-Titel & Logo
- Navigation Links
- Footer Inhalte
- Kontaktdaten (Telefon, Email, Adresse)
- Social Media Links

---

## Phase 2: Astro Projekt-Struktur

### 2.1 Verzeichnisstruktur

```
liefermax-astro/
├── src/
│   ├── components/          # Wiederverwendbare Komponenten
│   │   ├── Navigation.astro
│   │   ├── Footer.astro
│   │   ├── Hero.astro
│   │   ├── FeatureCard.astro
│   │   ├── ProductSection.astro
│   │   ├── CTASection.astro
│   │   ├── Modal.astro
│   │   └── ImageGallery.astro
│   ├── layouts/             # Layout-Templates
│   │   ├── BaseLayout.astro
│   │   └── ProductLayout.astro
│   ├── pages/               # Seiten (Auto-Routing)
│   │   ├── index.astro
│   │   ├── products.astro
│   │   ├── integration.astro
│   │   ├── contact.astro
│   │   ├── agb.astro
│   │   ├── datenschutz.astro
│   │   └── impressum.astro
│   ├── content/             # Content Collections (Markdown)
│   │   ├── config.ts
│   │   ├── pages/
│   │   │   ├── home.md
│   │   │   ├── products.md
│   │   │   └── ...
│   │   ├── products/
│   │   │   ├── liefermax.md
│   │   │   ├── check.md
│   │   │   ├── map.md
│   │   │   ├── shop.md
│   │   │   └── apps.md
│   │   └── settings/
│   │       ├── navigation.md
│   │       ├── footer.md
│   │       └── site.md
│   └── styles/
│       └── global.css       # TailwindCSS Config
├── public/
│   ├── admin/               # Decap CMS Admin
│   │   ├── index.html
│   │   └── config.yml
│   └── assets/
│       └── images/          # Alle Bilder
├── astro.config.mjs
├── tailwind.config.mjs
├── package.json
└── README.md
```

### 2.2 Astro Komponenten-Design

**BaseLayout.astro** - Basis-Template für alle Seiten:
```astro
---
import Navigation from '../components/Navigation.astro';
import Footer from '../components/Footer.astro';

interface Props {
  title: string;
  description: string;
  ogImage?: string;
}

const { title, description, ogImage } = Astro.props;
---

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{title}</title>
    <meta name="description" content={description}>
    <!-- TailwindCSS CDN oder Build -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50">
    <Navigation />
    <slot />
    <Footer />
</body>
</html>
```

**Hero.astro** - Wiederverwendbare Hero-Section:
```astro
---
interface Props {
  title: string;
  subtitle?: string;
  badge?: string;
  backgroundImage?: string;
  ctaText?: string;
  ctaLink?: string;
}

const { title, subtitle, badge, backgroundImage, ctaText, ctaLink } = Astro.props;
---

<section class="gradient-bg pt-32 pb-20 px-4" style={backgroundImage ? `background-image: url(${backgroundImage})` : ''}>
    <div class="max-w-7xl mx-auto text-center text-white">
        {badge && (
            <div class="inline-block bg-white bg-opacity-20 px-4 py-2 rounded-full mb-6">
                <span class="text-white text-sm font-semibold">{badge}</span>
            </div>
        )}
        <h1 class="text-5xl md:text-6xl font-black mb-6" set:html={title}></h1>
        {subtitle && (
            <p class="text-xl text-gray-100 max-w-3xl mx-auto">{subtitle}</p>
        )}
        {ctaText && ctaLink && (
            <a href={ctaLink} class="inline-block mt-8 bg-white text-red-600 px-10 py-4 rounded-lg font-bold text-lg hover:shadow-2xl transition">
                {ctaText}
            </a>
        )}
    </div>
</section>
```

---

## Phase 3: Decap CMS Konfiguration

### 3.1 Decap CMS Setup

**public/admin/config.yml:**
```yaml
backend:
  name: git-gateway
  branch: main
  
# Lokale Entwicklung
local_backend: true

# Media-Verwaltung
media_folder: "public/assets/images"
public_folder: "/assets/images"

# Lokalisierung
locale: "de"

# Collections (Content-Typen)
collections:
  # Seiten
  - name: "pages"
    label: "Seiten"
    folder: "src/content/pages"
    create: false
    slug: "{{slug}}"
    fields:
      - {label: "Titel", name: "title", widget: "string"}
      - {label: "Beschreibung", name: "description", widget: "text"}
      - {label: "Hero Titel", name: "heroTitle", widget: "string"}
      - {label: "Hero Untertitel", name: "heroSubtitle", widget: "text", required: false}
      - {label: "Hero Badge", name: "heroBadge", widget: "string", required: false}
      - {label: "Inhalt", name: "body", widget: "markdown"}
      
  # Produkte
  - name: "products"
    label: "Produkte"
    folder: "src/content/products"
    create: true
    slug: "{{slug}}"
    fields:
      - {label: "Produkt Name", name: "title", widget: "string"}
      - {label: "Kurzbeschreibung", name: "excerpt", widget: "text"}
      - {label: "Badge Text", name: "badge", widget: "string"}
      - {label: "Badge Farbe", name: "badgeColor", widget: "select", options: ["red", "green", "blue", "purple", "orange"]}
      - {label: "Logo", name: "logo", widget: "image", required: false}
      - {label: "Hauptbild", name: "image", widget: "image"}
      - {label: "Beschreibung", name: "body", widget: "markdown"}
      - label: "Features"
        name: "features"
        widget: "list"
        fields:
          - {label: "Feature", name: "text", widget: "string"}
      - label: "Screenshots"
        name: "screenshots"
        widget: "list"
        required: false
        fields:
          - {label: "Bild", name: "image", widget: "image"}
          - {label: "Beschreibung", name: "alt", widget: "string"}
      - label: "Zusätzliche Bilder"
        name: "additionalImages"
        widget: "list"
        required: false
        fields:
          - {label: "Bild", name: "image", widget: "image"}
          - {label: "Titel", name: "title", widget: "string"}
          - {label: "Beschreibung", name: "description", widget: "text"}
          
  # Globale Einstellungen
  - name: "settings"
    label: "Einstellungen"
    files:
      - label: "Navigation"
        name: "navigation"
        file: "src/content/settings/navigation.md"
        fields:
          - label: "Navigation Links"
            name: "links"
            widget: "list"
            fields:
              - {label: "Text", name: "text", widget: "string"}
              - {label: "URL", name: "url", widget: "string"}
              - {label: "Extern", name: "external", widget: "boolean", default: false}
          - {label: "CTA Button Text", name: "ctaText", widget: "string"}
          - {label: "CTA Button Link", name: "ctaLink", widget: "string"}
          
      - label: "Footer"
        name: "footer"
        file: "src/content/settings/footer.md"
        fields:
          - {label: "Firmenname", name: "companyName", widget: "string"}
          - {label: "Adresse", name: "address", widget: "text"}
          - {label: "Telefon", name: "phone", widget: "string"}
          - {label: "Email", name: "email", widget: "string"}
          - {label: "Copyright Text", name: "copyright", widget: "string"}
          - label: "Social Media"
            name: "social"
            widget: "list"
            required: false
            fields:
              - {label: "Plattform", name: "platform", widget: "string"}
              - {label: "URL", name: "url", widget: "string"}
              - {label: "Icon", name: "icon", widget: "string"}
              
      - label: "Site Einstellungen"
        name: "site"
        file: "src/content/settings/site.md"
        fields:
          - {label: "Site Titel", name: "title", widget: "string"}
          - {label: "Site Beschreibung", name: "description", widget: "text"}
          - {label: "Logo", name: "logo", widget: "image"}
          - {label: "Favicon", name: "favicon", widget: "image"}
          - {label: "Primärfarbe (Hex)", name: "primaryColor", widget: "string", pattern: ["^#[0-9A-Fa-f]{6}$", "Muss ein Hex-Farbcode sein"]}
```

### 3.2 Content Collections Schema

**src/content/config.ts:**
```typescript
import { defineCollection, z } from 'astro:content';

const pagesCollection = defineCollection({
  schema: z.object({
    title: z.string(),
    description: z.string(),
    heroTitle: z.string(),
    heroSubtitle: z.string().optional(),
    heroBadge: z.string().optional(),
  }),
});

const productsCollection = defineCollection({
  schema: z.object({
    title: z.string(),
    excerpt: z.string(),
    badge: z.string(),
    badgeColor: z.enum(['red', 'green', 'blue', 'purple', 'orange']),
    logo: z.string().optional(),
    image: z.string(),
    features: z.array(z.object({
      text: z.string(),
    })),
    screenshots: z.array(z.object({
      image: z.string(),
      alt: z.string(),
    })).optional(),
    additionalImages: z.array(z.object({
      image: z.string(),
      title: z.string(),
      description: z.string(),
    })).optional(),
  }),
});

export const collections = {
  'pages': pagesCollection,
  'products': productsCollection,
};
```

---

## Phase 4: Migrations-Schritte

### 4.1 Schritt-für-Schritt Vorgehen

**Schritt 1: Astro Projekt initialisieren**
```bash
npm create astro@latest liefermax-astro
cd liefermax-astro
npm install
npm install -D tailwindcss @astrojs/tailwind
npx astro add tailwind
```

**Schritt 2: Decap CMS installieren**
```bash
npm install decap-cms-app
npm install -D netlify-cms-proxy-server  # Für lokale Entwicklung
```

**Schritt 3: Basis-Struktur erstellen**
- Layouts erstellen (BaseLayout.astro)
- Komponenten erstellen (Navigation, Footer, Hero, etc.)
- Content Collections konfigurieren
- Decap CMS Admin einrichten

**Schritt 4: Content migrieren**
- HTML-Inhalte in Markdown konvertieren
- Bilder nach public/assets/images kopieren
- Frontmatter für jede Content-Datei erstellen
- Styles in Komponenten übertragen

**Schritt 5: Seiten migrieren (Priorität)**
1. ✅ index.astro (Homepage)
2. ✅ products.astro (Produktseite)
3. ✅ integration.astro
4. ✅ contact.astro
5. ✅ agb.astro, datenschutz.astro, impressum.astro

**Schritt 6: Interaktive Features**
- Modal-Komponenten (Carousel für Screenshots)
- Mobile Navigation Toggle
- Formular-Handling (Contact)
- Smooth Scrolling zu Sections

**Schritt 7: GitHub Pages Deployment**
```yaml
# .github/workflows/deploy.yml
name: Deploy to GitHub Pages

on:
  push:
    branches: [ main ]
  workflow_dispatch:

permissions:
  contents: read
  pages: write
  id-token: write

jobs:
  build:
    runs-on: ubuntu-latest
    steps:
      - name: Checkout
        uses: actions/checkout@v4
      - name: Setup Node
        uses: actions/setup-node@v4
        with:
          node-version: '20'
      - name: Install dependencies
        run: npm ci
      - name: Build
        run: npm run build
      - name: Upload artifact
        uses: actions/upload-pages-artifact@v3
        with:
          path: ./dist
  
  deploy:
    needs: build
    runs-on: ubuntu-latest
    environment:
      name: github-pages
      url: ${{ steps.deployment.outputs.page_url }}
    steps:
      - name: Deploy to GitHub Pages
        id: deployment
        uses: actions/deploy-pages@v4
```

### 4.2 Design-Preservation Checklist

**CSS/Styling:**
- ✅ TailwindCSS Klassen 1:1 übernehmen
- ✅ Custom CSS (gradient-bg, etc.) in global.css
- ✅ Font Awesome Icons beibehalten
- ✅ Google Fonts (Inter) einbinden
- ✅ Responsive Breakpoints identisch

**JavaScript:**
- ✅ Mobile Menu Toggle
- ✅ Modal/Carousel Funktionalität
- ✅ Smooth Scroll zu Anchors
- ✅ Lazy Loading für Bilder

**Komponenten:**
- ✅ Navigation (Desktop + Mobile)
- ✅ Hero Sections (verschiedene Varianten)
- ✅ Feature Cards Grid
- ✅ Product Sections (2-Spalten)
- ✅ Image Galleries mit Modals
- ✅ CTA Sections
- ✅ Footer

---

## Phase 5: Content-Verwaltung Workflows

### 5.1 Für den Kunden (Manuell)

**Zugang zum CMS:**
1. Website öffnen: `https://eazybusiness.github.io/LieferMax/admin/`
2. Mit GitHub Account anmelden
3. Decap CMS Dashboard öffnet sich

**Typische Aufgaben:**
- **Text ändern:** Seite auswählen → Feld bearbeiten → Speichern → Publish
- **Bild austauschen:** Media Library → Upload → Bild auswählen → Speichern
- **Produkt hinzufügen:** Produkte → New Product → Felder ausfüllen → Publish
- **Navigation ändern:** Einstellungen → Navigation → Links bearbeiten → Speichern

**Workflow:**
1. Im CMS einloggen
2. Content bearbeiten (WYSIWYG für Markdown)
3. Vorschau prüfen
4. Speichern (erstellt Git Commit)
5. Publish (pusht zu GitHub)
6. GitHub Actions baut und deployt automatisch (2-3 Min)

### 5.2 Für AI Agent (Automatisiert)

**API-Zugriff via GitHub:**
```javascript
// Beispiel: Content programmatisch ändern
const updateContent = async (file, content) => {
  const octokit = new Octokit({ auth: process.env.GITHUB_TOKEN });
  
  // Datei lesen
  const { data: fileData } = await octokit.repos.getContent({
    owner: 'eazybusiness',
    repo: 'LieferMax',
    path: `src/content/pages/${file}`,
  });
  
  // Content aktualisieren
  await octokit.repos.createOrUpdateFileContents({
    owner: 'eazybusiness',
    repo: 'LieferMax',
    path: `src/content/pages/${file}`,
    message: `Update ${file} via AI Agent`,
    content: Buffer.from(content).toString('base64'),
    sha: fileData.sha,
  });
};
```

**AI Agent Workflows:**
- Content-Updates via GitHub API
- Batch-Änderungen über Git Commits
- Automatische Content-Generierung
- SEO-Optimierungen
- Bild-Optimierung und Upload

---

## Phase 6: Testing & Qualitätssicherung

### 6.1 Test-Checkliste

**Funktionalität:**
- [ ] Alle Seiten laden korrekt
- [ ] Navigation funktioniert (Desktop + Mobile)
- [ ] Modals/Carousels funktionieren
- [ ] Formulare senden Daten
- [ ] Links funktionieren (intern + extern)
- [ ] Bilder laden (lazy loading)

**Design:**
- [ ] Layout identisch mit Original
- [ ] Responsive auf allen Breakpoints
- [ ] Farben/Fonts korrekt
- [ ] Hover-Effekte funktionieren
- [ ] Animationen smooth

**CMS:**
- [ ] Login funktioniert
- [ ] Content editierbar
- [ ] Media Upload funktioniert
- [ ] Vorschau korrekt
- [ ] Publish-Workflow funktioniert
- [ ] Git Commits werden erstellt

**Performance:**
- [ ] Lighthouse Score > 90
- [ ] Bilder optimiert
- [ ] CSS/JS minified
- [ ] Lazy Loading aktiv

**SEO:**
- [ ] Meta Tags korrekt
- [ ] Open Graph Tags
- [ ] Sitemap generiert
- [ ] robots.txt vorhanden

---

## Phase 7: Dokumentation

### 7.1 Kunden-Dokumentation

**CMS-Handbuch erstellen:**
- Zugang zum CMS
- Content bearbeiten (mit Screenshots)
- Bilder hochladen und verwalten
- Neue Produkte hinzufügen
- Navigation ändern
- Häufige Probleme & Lösungen

**Video-Tutorials:**
- CMS Login und Übersicht (2 Min)
- Text bearbeiten (3 Min)
- Bilder hochladen (2 Min)
- Produkt hinzufügen (5 Min)

### 7.2 Entwickler-Dokumentation

**README.md:**
- Projekt-Setup
- Entwicklungs-Workflow
- Build & Deployment
- Komponenten-Übersicht
- Content Collections Schema
- Troubleshooting

---

## Phase 8: Deployment & Go-Live

### 8.1 Deployment-Strategie

**Option 1: Parallel Deployment (Empfohlen)**
- Astro-Version auf neuem Branch deployen
- Testen auf Staging-URL
- Bei Erfolg: Main-Branch ersetzen

**Option 2: Subdomain Test**
- Astro auf `beta.liefermax.com` deployen
- Ausgiebig testen
- Bei Erfolg: Auf Hauptdomain umschalten

### 8.2 Go-Live Checklist

- [ ] Alle Tests bestanden
- [ ] Client-Schulung durchgeführt
- [ ] Backup der alten Version erstellt
- [ ] DNS/Deployment konfiguriert
- [ ] Monitoring eingerichtet
- [ ] Dokumentation übergeben

---

## Zeitplan & Ressourcen

### Geschätzter Aufwand:

**Phase 1-2: Setup & Struktur** - 2-3 Stunden
- Astro Projekt initialisieren
- Komponenten erstellen
- Layouts definieren

**Phase 3: Decap CMS Config** - 1-2 Stunden
- config.yml erstellen
- Content Collections definieren
- Admin Panel einrichten

**Phase 4: Content Migration** - 4-6 Stunden
- HTML → Astro konvertieren
- Content in Markdown migrieren
- Styles übertragen
- JavaScript-Features implementieren

**Phase 5-6: Testing & QA** - 2-3 Stunden
- Funktionalität testen
- Design-Vergleich
- CMS-Workflow testen
- Performance-Optimierung

**Phase 7: Dokumentation** - 2-3 Stunden
- Kunden-Handbuch
- Video-Tutorials
- README

**Gesamt: 11-17 Stunden**

---

## Vorteile nach Migration

### Für den Kunden:
✅ **Einfache Content-Verwaltung** - Keine HTML-Kenntnisse nötig
✅ **Visueller Editor** - WYSIWYG für Markdown
✅ **Media Library** - Drag & Drop Bild-Upload
✅ **Vorschau** - Änderungen vor Publish prüfen
✅ **Versionierung** - Git-basiert, alle Änderungen nachvollziehbar
✅ **Sicher** - Kein direkter Server-Zugriff nötig

### Für AI Agent:
✅ **API-Zugriff** - Programmatische Content-Updates
✅ **Strukturierte Daten** - Markdown + Frontmatter
✅ **Git-Integration** - Automatische Commits
✅ **Batch-Updates** - Mehrere Änderungen auf einmal

### Für Entwickler:
✅ **Komponenten-basiert** - Wiederverwendbar & wartbar
✅ **Type-Safe** - TypeScript für Content Collections
✅ **Schnell** - Astro's Island Architecture
✅ **Modern** - Aktueller Tech-Stack
✅ **Skalierbar** - Einfach erweiterbar

---

## Nächste Schritte

1. **Entscheidung:** Migration-Strategie bestätigen (Astro + Decap CMS)
2. **Backup:** Aktuelle Website sichern
3. **Setup:** Astro-Projekt initialisieren
4. **Migration:** Schritt-für-Schritt nach Plan
5. **Testing:** Ausgiebig testen
6. **Schulung:** Kunden einweisen
7. **Go-Live:** Deployment durchführen

**Bereit zum Start?** 🚀
