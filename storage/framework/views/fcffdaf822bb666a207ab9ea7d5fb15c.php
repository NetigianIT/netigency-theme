<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" class="h-full">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title><?php echo e(config('app.name', 'Netigian IT')); ?></title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Sora:wght@500;600;700&display=swap" rel="stylesheet">

        <script>
            (function () {
                try {
                    var stored = localStorage.getItem('theme');
                    var prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
                    var theme = stored || (prefersDark ? 'dark' : 'light');
                    if (theme === 'dark') {
                        document.documentElement.classList.add('dark');
                    } else {
                        document.documentElement.classList.remove('dark');
                    }
                } catch (e) {}
            })();
        </script>

        <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
        <link rel="stylesheet" href="<?php echo e(asset('css/auth.css')); ?>?v=5">

        <script src="<?php echo e(asset('assets/admin/side_menu/js/dist/alpine.js')); ?>" defer></script>
    </head>
    <body class="auth-body h-full antialiased">
        <?php echo e($slot); ?>

    </body>
</html>
<?php /**PATH C:\Users\HP\Desktop\Netigian IT\themes\netigency-theme\resources\views/layouts/guest.blade.php ENDPATH**/ ?>