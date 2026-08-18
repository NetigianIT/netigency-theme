<?php

declare(strict_types=1);

$root = dirname(__DIR__);
$target = $root.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.'img';

if (! is_dir($target)) {
    fwrite(STDERR, "Image directory not found: {$target}\n");
    exit(1);
}

$extensions = ['jpg', 'jpeg', 'png'];
$iterator = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($target, FilesystemIterator::SKIP_DOTS)
);

$processed = 0;
$optimized = 0;
$skipped = 0;
$errors = 0;
$bytesBefore = 0;
$bytesAfter = 0;

foreach ($iterator as $fileInfo) {
    if (! $fileInfo->isFile()) {
        continue;
    }

    $extension = strtolower($fileInfo->getExtension());
    if (! in_array($extension, $extensions, true)) {
        continue;
    }

    $path = $fileInfo->getPathname();
    $originalSize = $fileInfo->getSize();
    $processed++;
    $bytesBefore += $originalSize;

    $tempPath = $path.'.opt';

    try {
        $result = match ($extension) {
            'jpg', 'jpeg' => optimizeJpeg($path, $tempPath),
            'png' => optimizePng($path, $tempPath),
            default => false,
        };

        if (! $result || ! is_file($tempPath)) {
            $skipped++;
            @unlink($tempPath);
            $bytesAfter += $originalSize;
            continue;
        }

        clearstatcache(true, $tempPath);
        $optimizedSize = filesize($tempPath) ?: $originalSize;

        if ($optimizedSize > 0 && $optimizedSize < $originalSize) {
            if (! @rename($tempPath, $path)) {
                copy($tempPath, $path);
                @unlink($tempPath);
            }
            $optimized++;
            $bytesAfter += $optimizedSize;
            echo "optimized: {$path}\n";
        } else {
            @unlink($tempPath);
            $skipped++;
            $bytesAfter += $originalSize;
        }
    } catch (Throwable $e) {
        $errors++;
        @unlink($tempPath);
        $bytesAfter += $originalSize;
        fwrite(STDERR, "error: {$path} :: {$e->getMessage()}\n");
    }
}

$saved = max(0, $bytesBefore - $bytesAfter);
$savedPercent = $bytesBefore > 0 ? round(($saved / $bytesBefore) * 100, 2) : 0;

echo "\nProcessed: {$processed}\n";
echo "Optimized: {$optimized}\n";
echo "Skipped: {$skipped}\n";
echo "Errors: {$errors}\n";
echo 'Before: '.formatBytes($bytesBefore)."\n";
echo 'After: '.formatBytes($bytesAfter)."\n";
echo 'Saved: '.formatBytes($saved)." ({$savedPercent}%)\n";

function optimizeJpeg(string $source, string $destination): bool
{
    $image = @imagecreatefromjpeg($source);
    if (! $image) {
        return false;
    }

    imageinterlace($image, true);
    $result = imagejpeg($image, $destination, 82);
    imagedestroy($image);

    return $result;
}

function optimizePng(string $source, string $destination): bool
{
    $image = @imagecreatefrompng($source);
    if (! $image) {
        return false;
    }

    imagealphablending($image, false);
    imagesavealpha($image, true);
    $result = imagepng($image, $destination, 9);
    imagedestroy($image);

    return $result;
}

function formatBytes(int $bytes): string
{
    $units = ['B', 'KB', 'MB', 'GB'];
    $value = (float) $bytes;
    $index = 0;

    while ($value >= 1024 && $index < count($units) - 1) {
        $value /= 1024;
        $index++;
    }

    return number_format($value, $index === 0 ? 0 : 2).' '.$units[$index];
}
