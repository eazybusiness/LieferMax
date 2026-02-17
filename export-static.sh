#!/bin/bash
# Statischen Export für Strato erstellen
# Nutzung: ./export-static.sh

set -e

echo "🚀 LieferMax Static Export für Strato"
echo "======================================"
echo ""

# Prüfen ob liefermax-cms existiert
if [ ! -d "liefermax-cms" ]; then
    echo "❌ Fehler: liefermax-cms Ordner nicht gefunden"
    echo "   Bitte im Projekt-Root-Verzeichnis ausführen"
    exit 1
fi

cd liefermax-cms

# Prüfen ob node_modules existiert
if [ ! -d "node_modules" ]; then
    echo "📦 Dependencies werden installiert..."
    npm install
    echo ""
fi

# Build erstellen
echo "🔨 Building static site..."
npm run build

if [ $? -ne 0 ]; then
    echo "❌ Build fehlgeschlagen"
    exit 1
fi

# Export-Ordner erstellen
EXPORT_DIR="../liefermax-static-export"
TIMESTAMP=$(date +%Y%m%d-%H%M%S)
ZIP_NAME="liefermax-static-${TIMESTAMP}.zip"

echo ""
echo "📁 Creating export package..."

# Alten Export-Ordner löschen falls vorhanden
rm -rf "$EXPORT_DIR"

# Neuen Export-Ordner erstellen
mkdir -p "$EXPORT_DIR"

# Dateien kopieren
cp -r dist/* "$EXPORT_DIR/"

# ZIP erstellen
cd ..
zip -r "$ZIP_NAME" liefermax-static-export/ -q

# Größe anzeigen
SIZE=$(du -h "$ZIP_NAME" | cut -f1)

echo ""
echo "✅ Export erfolgreich erstellt!"
echo ""
echo "📦 Datei: $ZIP_NAME"
echo "📊 Größe: $SIZE"
echo ""
echo "📤 Nächste Schritte:"
echo "   1. ZIP-Datei entpacken"
echo "   2. Inhalt via FTP zu Strato hochladen"
echo "   3. In Webspace-Root-Verzeichnis hochladen"
echo ""
echo "🌐 FTP-Zugangsdaten (Strato):"
echo "   Host: ftp.strato.de"
echo "   Port: 21"
echo "   Benutzername: [Ihr Strato FTP-User]"
echo "   Passwort: [Ihr Strato FTP-Passwort]"
echo ""
echo "💡 Tipp: Nutzen Sie FileZilla für einfachen Upload"
echo "   Download: https://filezilla-project.org/"
echo ""
