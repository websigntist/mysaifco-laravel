<?php
/**
 * Script to Move Public Files to Root
 * 
 * Run this script ONCE on your server via SSH:
 * php move-public-files.php
 * 
 * This will move index.php and .htaccess from public/ to root
 * and update the paths in index.php
 */

echo "📁 Moving Public Files to Root\n";
echo "==============================\n\n";

$projectRoot = __DIR__;
$publicDir = $projectRoot . '/public';

// Check if we're in the right directory
if (!file_exists($publicDir . '/index.php')) {
    die("❌ Error: public/index.php not found. Make sure you're in the project root.\n");
}

// Step 1: Move index.php
echo "Step 1: Moving index.php...\n";
if (file_exists($projectRoot . '/index.php')) {
    echo "⚠️  index.php already exists in root. Backing up...\n";
    rename($projectRoot . '/index.php', $projectRoot . '/index.php.backup');
}

copy($publicDir . '/index.php', $projectRoot . '/index.php');
echo "✅ index.php copied to root\n";

// Step 2: Update paths in index.php
echo "Step 2: Updating paths in index.php...\n";
$indexContent = file_get_contents($projectRoot . '/index.php');

// Update paths
$indexContent = str_replace("__DIR__.'/../storage/", "__DIR__.'/storage/", $indexContent);
$indexContent = str_replace("__DIR__.'/../vendor/", "__DIR__.'/vendor/", $indexContent);
$indexContent = str_replace("__DIR__.'/../bootstrap/", "__DIR__.'/bootstrap/", $indexContent);

file_put_contents($projectRoot . '/index.php', $indexContent);
echo "✅ Paths updated in index.php\n";

// Step 3: Move .htaccess
echo "Step 3: Moving .htaccess...\n";
if (file_exists($publicDir . '/.htaccess')) {
    if (file_exists($projectRoot . '/.htaccess')) {
        echo "⚠️  .htaccess already exists in root. Backing up...\n";
        rename($projectRoot . '/.htaccess', $projectRoot . '/.htaccess.backup');
    }
    
    copy($publicDir . '/.htaccess', $projectRoot . '/.htaccess');
    echo "✅ .htaccess copied to root\n";
} else {
    echo "⚠️  .htaccess not found in public/ folder\n";
}

// Step 4: Add security rules to .htaccess
echo "Step 4: Adding security rules to .htaccess...\n";
if (file_exists($projectRoot . '/.htaccess')) {
    $htaccessContent = file_get_contents($projectRoot . '/.htaccess');
    
    // Check if security rules already exist
    if (strpos($htaccessContent, '# Block access to sensitive files') === false) {
        $securityRules = "\n\n# Block access to sensitive files\n";
        $securityRules .= "<FilesMatch \"^\\.\">\n";
        $securityRules .= "    Order allow,deny\n";
        $securityRules .= "    Deny from all\n";
        $securityRules .= "</FilesMatch>\n\n";
        $securityRules .= "# Block access to composer files\n";
        $securityRules .= "<FilesMatch \"^(composer\\.(json|lock)|package\\.json)$\">\n";
        $securityRules .= "    Order allow,deny\n";
        $securityRules .= "    Deny from all\n";
        $securityRules .= "</FilesMatch>\n";
        
        file_put_contents($projectRoot . '/.htaccess', $htaccessContent . $securityRules);
        echo "✅ Security rules added\n";
    } else {
        echo "✅ Security rules already exist\n";
    }
}

echo "\n✅ Done! Files moved successfully.\n\n";
echo "📋 Next Steps:\n";
echo "1. Test your website: https://yourdomain.com/\n";
echo "2. Verify assets load: https://yourdomain.com/assets/backend/css/app.css\n";
echo "3. If everything works, you can delete the original files from public/ folder\n";
echo "   (Keep public/assets/ folder as it is!)\n\n";
echo "⚠️  Note: Original files are still in public/ folder.\n";
echo "   Delete them only after confirming everything works.\n";

