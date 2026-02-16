# CMS-Entscheidung für LieferMax

**Datum**: 5. Februar 2026  
**Status**: Entscheidungsfindung

---

## 🎯 Anforderungen

### Kunde:
- ✅ Minimale Editing-Funktionen (Texte, Bilder ändern)
- ✅ Einfach zu bedienen
- ✅ Muss auf Hosting-Provider laufen

### Entwickler (Sie):
- ✅ Automatisierbar via MCP Server oder API
- ✅ Keine manuelle Arbeit in CMS-Backend
- ✅ AI-freundlich für zukünftige Updates

---

## 🔍 CMS-Optionen

### Option 1: WordPress mit MCP Server ⭐ EMPFOHLEN

**Vorteile:**
- ✅ MCP Server verfügbar (wordpress-mcp)
- ✅ REST API für Automatisierung
- ✅ Läuft auf jedem Hosting-Provider
- ✅ Kunde kennt es wahrscheinlich
- ✅ Minimale Editing-Funktionen out-of-the-box
- ✅ Gutenberg Block Editor (modern, einfach)

**Nachteile:**
- ⚠️ Overhead (Datenbank, PHP)
- ⚠️ Sicherheitsupdates nötig

**Automatisierung:**
```bash
# Via MCP Server
mcp wordpress create-post --title "..." --content "..."
mcp wordpress update-page --id 124 --content "..."

# Via REST API
curl -X POST https://liefermax.com/wp-json/wp/v2/pages/124 \
  -H "Authorization: Bearer $TOKEN" \
  -d '{"content":"..."}'
```

**Aufwand:** 2-3 Tage
- WordPress installieren auf Hosting
- Theme anpassen (aktuelles Design übernehmen)
- MCP Server konfigurieren
- Inhalte importieren (XML bereits vorhanden!)

---

### Option 2: Headless CMS (Strapi, Directus)

**Vorteile:**
- ✅ Moderne API-first Architektur
- ✅ Sehr AI-freundlich
- ✅ Gute REST/GraphQL APIs

**Nachteile:**
- ❌ Braucht Node.js Hosting (nicht jeder Provider)
- ❌ Kunde muss neues System lernen
- ❌ Kein MCP Server verfügbar

**Aufwand:** 5-7 Tage

---

### Option 3: Statisch + Git-basiert (Decap CMS, TinaCMS)

**Vorteile:**
- ✅ Sehr schnell (statische Seiten)
- ✅ Git-basiert (Versionskontrolle)
- ✅ Kostenlos hostbar (Netlify, Vercel)

**Nachteile:**
- ❌ Braucht Build-Prozess
- ❌ Nicht auf klassischem Hosting
- ❌ Kunde muss GitHub/Netlify verstehen

**Aufwand:** 8-14 Tage

---

## 🏆 Empfehlung: WordPress mit MCP

### Warum?
1. **Hosting-kompatibel**: Läuft auf jedem PHP-Hosting
2. **MCP verfügbar**: Automatisierung via `wordpress-mcp` Server
3. **Schnelle Migration**: XML-Import bereits vorhanden
4. **Kunde-freundlich**: Bekanntes Interface
5. **Minimaler Aufwand**: 2-3 Tage statt 8-14 Tage

### Workflow:
```
1. WordPress auf Hosting installieren
2. Custom Theme erstellen (aktuelles Design)
3. XML importieren (alle Inhalte)
4. MCP Server konfigurieren
5. Kunde bekommt WP-Admin Zugang
6. Sie arbeiten via MCP/API
```

---

## 🚀 Alternative: Hybrid-Ansatz

Falls WordPress zu "schwer" ist:

### WordPress Headless + Statische Frontend

**Setup:**
- WordPress als CMS (nur Backend)
- Statische HTML-Seiten als Frontend
- WordPress REST API für Content
- Build-Script generiert HTML aus WP-Content

**Vorteile:**
- ✅ Schnelle statische Seiten
- ✅ WordPress Editing für Kunde
- ✅ MCP-Automatisierung
- ✅ Läuft auf jedem Hosting

**Aufwand:** 4-5 Tage

---

## 📊 Vergleich

| Kriterium | WordPress | Headless CMS | Statisch + Git |
|-----------|-----------|--------------|----------------|
| **Hosting** | ✅ Jeder Provider | ⚠️ Node.js nötig | ⚠️ Netlify/Vercel |
| **MCP/API** | ✅ MCP + REST API | ✅ REST/GraphQL | ⚠️ Kein MCP |
| **Kunde-Freundlich** | ✅ Bekannt | ⚠️ Neu lernen | ⚠️ Git lernen |
| **Aufwand** | ✅ 2-3 Tage | ⚠️ 5-7 Tage | ❌ 8-14 Tage |
| **AI-Freundlich** | ✅ REST API | ✅✅ Sehr gut | ✅ Markdown |

---

## 🎬 Nächste Schritte

### Wenn WordPress:
1. Hosting-Details klären (Provider, Zugangsdaten)
2. WordPress installieren
3. Custom Theme erstellen (aktuelles Design)
4. XML importieren
5. MCP Server einrichten

### Wenn Hybrid:
1. WordPress auf Subdomain installieren (z.B. cms.liefermax.com)
2. Statische Seiten auf Hauptdomain
3. Build-Script für Content-Sync
4. MCP Server einrichten

---

## ❓ Offene Fragen

1. **Hosting-Provider**: Welcher Provider? (Strato, All-Inkl, etc.)
2. **Zugangsdaten**: FTP/SSH Zugang vorhanden?
3. **Domain**: Wo liegt die Domain? (DNS-Einstellungen)
4. **WordPress**: Neu installieren oder bestehendes WP nutzen?
5. **Zeitrahmen**: Wie schnell soll es fertig sein?

---

## 💡 Meine Empfehlung

**WordPress mit MCP Server** ist die beste Lösung für Ihre Anforderungen:
- Schnell umsetzbar (2-3 Tage)
- Läuft auf jedem Hosting
- MCP-Automatisierung möglich
- Kunde kann einfach editieren
- Kein manuelles Arbeiten für Sie nötig

Soll ich damit starten?
