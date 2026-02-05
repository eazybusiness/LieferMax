#!/bin/bash

# LieferMax WordPress Setup Script
# Automatisches Setup für lokale Entwicklung

set -e

echo "🚀 LieferMax WordPress Setup"
echo "============================"
echo ""

# Check if Docker is running
if ! docker info > /dev/null 2>&1; then
    echo "❌ Docker ist nicht gestartet. Bitte Docker starten und erneut versuchen."
    exit 1
fi

echo "✓ Docker läuft"
echo ""

# Start Docker containers
echo "📦 Starte WordPress & MySQL Container..."
docker-compose up -d

echo ""
echo "⏳ Warte auf MySQL (30 Sekunden)..."
sleep 30

echo ""
echo "✅ WordPress läuft auf: http://localhost:8080"
echo "✅ phpMyAdmin läuft auf: http://localhost:8081"
echo ""
echo "📋 Nächste Schritte:"
echo "1. Öffne http://localhost:8080 im Browser"
echo "2. WordPress Installation durchführen:"
echo "   - Sprache: Deutsch"
echo "   - Site Title: LieferMax"
echo "   - Username: admin"
echo "   - Password: [Ihr sicheres Passwort]"
echo "   - Email: info@liefermax.com"
echo ""
echo "3. Nach Installation:"
echo "   - Design → Themes → LieferMax Redesign aktivieren"
echo "   - Werkzeuge → Daten importieren → WordPress"
echo "   - XML-Datei importieren: client_input/liefermaxgfgh...xml"
echo ""
echo "4. ngrok für Demo starten:"
echo "   ngrok http 8080"
echo ""
echo "Viel Erfolg! 🎉"
