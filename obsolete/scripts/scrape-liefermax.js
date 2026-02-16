/**
 * LieferMax Website Scraper
 * Scrapes all pages, images, and content from the original liefermax.com
 */

const { chromium } = require('playwright');
const fs = require('fs');
const path = require('path');
const https = require('https');
const http = require('http');

const BASE_URL = 'https://liefermax.com';
const OUTPUT_DIR = path.join(__dirname, '..', 'scraped-content');
const IMAGES_DIR = path.join(OUTPUT_DIR, 'images');

// All known pages from the original website
const PAGES_TO_SCRAPE = [
    { url: '/', name: 'home', title: 'Startseite' },
    { url: '/?page_id=124', name: 'liefermax-app', title: 'LieferMax App' },
    { url: '/?page_id=5', name: 'lm-check', title: 'LieferMax-CHECK' },
    { url: '/?page_id=78', name: 'lm-map', title: 'LieferMax-MAP' },
    { url: '/?page_id=6468', name: 'shop-konverter', title: 'ShopWare & WooCommerce' },
    { url: '/?page_id=6538', name: 'bestell-apps', title: 'Bestell Apps' },
    { url: '/?page_id=100', name: 'kontakt', title: 'Kontakt' },
    { url: '/?page_id=95', name: 'impressum', title: 'Impressum' },
    { url: '/?page_id=134', name: 'agb', title: 'AGB' },
    { url: '/?page_id=6348', name: 'datenschutz', title: 'Datenschutzerklärung' },
];

async function downloadImage(url, filepath) {
    return new Promise((resolve, reject) => {
        const protocol = url.startsWith('https') ? https : http;
        const file = fs.createWriteStream(filepath);
        
        protocol.get(url, (response) => {
            if (response.statusCode === 301 || response.statusCode === 302) {
                // Follow redirect
                downloadImage(response.headers.location, filepath)
                    .then(resolve)
                    .catch(reject);
                return;
            }
            
            response.pipe(file);
            file.on('finish', () => {
                file.close();
                resolve(filepath);
            });
        }).on('error', (err) => {
            fs.unlink(filepath, () => {});
            reject(err);
        });
    });
}

async function scrapePage(page, pageInfo) {
    const fullUrl = BASE_URL + pageInfo.url;
    console.log(`\n📄 Scraping: ${pageInfo.title} (${fullUrl})`);
    
    await page.goto(fullUrl, { waitUntil: 'networkidle', timeout: 30000 });
    
    // Wait for content to load
    await page.waitForTimeout(2000);
    
    // Take screenshot
    const screenshotPath = path.join(OUTPUT_DIR, 'screenshots', `${pageInfo.name}.png`);
    await page.screenshot({ path: screenshotPath, fullPage: true });
    console.log(`  📸 Screenshot saved: ${screenshotPath}`);
    
    // Extract page content
    const content = await page.evaluate(() => {
        const data = {
            title: document.title,
            metaDescription: document.querySelector('meta[name="description"]')?.content || '',
            ogDescription: document.querySelector('meta[property="og:description"]')?.content || '',
            h1: Array.from(document.querySelectorAll('h1')).map(el => el.textContent.trim()),
            h2: Array.from(document.querySelectorAll('h2')).map(el => el.textContent.trim()),
            h3: Array.from(document.querySelectorAll('h3')).map(el => el.textContent.trim()),
            paragraphs: Array.from(document.querySelectorAll('p')).map(el => el.textContent.trim()).filter(t => t.length > 0),
            images: Array.from(document.querySelectorAll('img')).map(img => ({
                src: img.src,
                alt: img.alt || '',
                title: img.title || '',
                width: img.naturalWidth,
                height: img.naturalHeight
            })),
            links: Array.from(document.querySelectorAll('a')).map(a => ({
                href: a.href,
                text: a.textContent.trim()
            })),
            lists: Array.from(document.querySelectorAll('ul, ol')).map(list => ({
                type: list.tagName.toLowerCase(),
                items: Array.from(list.querySelectorAll('li')).map(li => li.textContent.trim())
            })),
            mainContent: document.querySelector('main, article, .entry-content, #content, .tc-content')?.innerHTML || '',
            bodyText: document.body.innerText
        };
        return data;
    });
    
    // Save content as JSON
    const jsonPath = path.join(OUTPUT_DIR, 'json', `${pageInfo.name}.json`);
    fs.writeFileSync(jsonPath, JSON.stringify({ ...pageInfo, ...content }, null, 2));
    console.log(`  📝 Content saved: ${jsonPath}`);
    
    // Download images
    const downloadedImages = [];
    for (const img of content.images) {
        if (img.src && !img.src.startsWith('data:')) {
            try {
                const imgUrl = img.src.startsWith('http') ? img.src : BASE_URL + img.src;
                const imgName = path.basename(new URL(imgUrl).pathname) || `image_${Date.now()}.jpg`;
                const imgPath = path.join(IMAGES_DIR, pageInfo.name + '_' + imgName);
                
                if (!fs.existsSync(imgPath)) {
                    await downloadImage(imgUrl, imgPath);
                    console.log(`  🖼️  Downloaded: ${imgName}`);
                    downloadedImages.push({ original: img.src, local: imgPath, alt: img.alt });
                }
            } catch (err) {
                console.log(`  ⚠️  Failed to download: ${img.src} - ${err.message}`);
            }
        }
    }
    
    return {
        ...pageInfo,
        ...content,
        downloadedImages,
        scrapedAt: new Date().toISOString()
    };
}

async function main() {
    console.log('🚀 LieferMax Website Scraper');
    console.log('============================\n');
    
    // Create output directories
    [OUTPUT_DIR, IMAGES_DIR, path.join(OUTPUT_DIR, 'screenshots'), path.join(OUTPUT_DIR, 'json')].forEach(dir => {
        if (!fs.existsSync(dir)) {
            fs.mkdirSync(dir, { recursive: true });
            console.log(`📁 Created directory: ${dir}`);
        }
    });
    
    const browser = await chromium.launch({ headless: true });
    const context = await browser.newContext({
        viewport: { width: 1920, height: 1080 },
        userAgent: 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36'
    });
    const page = await context.newPage();
    
    const results = [];
    
    for (const pageInfo of PAGES_TO_SCRAPE) {
        try {
            const result = await scrapePage(page, pageInfo);
            results.push(result);
        } catch (err) {
            console.error(`❌ Error scraping ${pageInfo.name}: ${err.message}`);
            results.push({ ...pageInfo, error: err.message });
        }
    }
    
    // Save summary
    const summaryPath = path.join(OUTPUT_DIR, 'scrape-summary.json');
    fs.writeFileSync(summaryPath, JSON.stringify({
        scrapedAt: new Date().toISOString(),
        baseUrl: BASE_URL,
        totalPages: results.length,
        successfulPages: results.filter(r => !r.error).length,
        pages: results
    }, null, 2));
    
    console.log('\n============================');
    console.log(`✅ Scraping complete!`);
    console.log(`📊 Total pages: ${results.length}`);
    console.log(`📁 Output directory: ${OUTPUT_DIR}`);
    console.log(`📄 Summary: ${summaryPath}`);
    
    await browser.close();
}

main().catch(console.error);
