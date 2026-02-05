#!/bin/bash

# LieferMax WordPress - Permissions Fix
# Fix für wp-content/uploads Berechtigungen in Docker

set -e

echo "🔧 WordPress Permissions Fix"
echo "=========================="
echo ""

# Container-Name
CONTAINER="liefermax-wordpress"

# Prüfen ob Container läuft
if ! sudo docker ps | grep -q $CONTAINER; then
    echo "❌ Container $CONTAINER läuft nicht"
    echo "Starten Sie zuerst: sudo docker-compose up -d"
    exit 1
fi

echo "✅ Container $CONTAINER läuft"
echo ""

# Berechtigungen fixen
echo "📁 wp-content Verzeichnisse anlegen..."
sudo docker exec $CONTAINER mkdir -p /var/www/html/wp-content/uploads/2026/02

echo "👤 Besitzer auf www-data setzen..."
sudo docker exec $CONTAINER chown -R www-data:www-data /var/www/html/wp-content

echo "🔐 Berechtigungen setzen..."
sudo docker exec $CONTAINER chmod -R 755 /var/www/html/wp-content
sudo docker exec $CONTAINER chmod -R 755 /var/www/html/wp-content/uploads

echo ""
echo "✅ Permissions fix abgeschlossen!"
echo ""

# Überprüfen
echo "🔍 Überprüfung:"
sudo docker exec $CONTAINER ls -la /var/www/html/wp-content/uploads/

echo ""
echo "🎯 WordPress sollte jetzt Dateien hochladen können!"
echo "Versuchen Sie die WordPress-Installation erneut."
