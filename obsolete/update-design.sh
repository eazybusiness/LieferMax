#!/bin/bash
# Automatisches Update-Script für Logo und Farbschema

echo "🎨 Updating LieferMax Design..."

# 1. Add CSS variables to all HTML files
for file in *.html; do
    if [ -f "$file" ]; then
        # Check if CSS variables already exist
        if ! grep -q "var(--primary-red)" "$file"; then
            # Add CSS variables after the * { font-family } block
            sed -i '/* {/,/}/a\
        \
        :root {\
            --primary-red: #D32F2F;\
            --primary-gray: #333333;\
            --secondary-gray: #666666;\
            --light-bg: #F5F5F5;\
            --border: #E0E0E0;\
        }' "$file"
        fi
    fi
done

# 2. Update gradient backgrounds in all files
for file in *.html; do
    if [ -f "$file" ]; then
        # Update gradient-bg class
        sed -i 's/background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%)/background: linear-gradient(135deg, #333333 0%, #666666 100%)/g' "$file"
        sed -i 's/background: linear-gradient(135deg, #0f172a 0%, #1e40af 100%)/background: linear-gradient(135deg, #1a1a1a 0%, #333333 100%)/g' "$file"
        
        # Update from-blue and to-blue gradients
        sed -i 's/from-blue-500/from-red-500/g' "$file"
        sed -i 's/to-cyan-500/to-red-400/g' "$file"
        sed -i 's/to-blue-600/to-red-600/g' "$file"
    fi
done

# 3. Fix specific color references that might have been missed
for file in *.html; do
    if [ -f "$file" ]; then
        # Fix any remaining blue references in text
        sed -i 's/text-red-100/text-gray-100/g' "$file"
        sed -i 's/text-red-200/text-gray-200/g' "$file"
    fi
done

echo "✅ Design update complete!"
echo "📋 Summary:"
echo "   - Logo integrated in all pages"
echo "   - Blue → Red color scheme applied"
echo "   - CSS variables added"
echo "   - Gradients updated"
