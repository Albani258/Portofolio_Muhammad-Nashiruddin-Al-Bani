<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kementerian Imigrasi dan Pemasyarakatan | Dashboard</title>
    <?php echo app('Illuminate\Foundation\Vite')(['public/tailadmin/src/css/style.css', 'public/tailadmin/src/js/index.js']); ?>
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700;14..32,800&display=swap" rel="stylesheet">
</head>
<body
    x-data="{ page: 'ecommerce', loaded: true, darkMode: false, stickyMenu: false, sidebarToggle: false, scrollTop: false }"
    x-init="
        darkMode = JSON.parse(localStorage.getItem('darkMode'));
        $watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))
    "
    :class="{ 'dark bg-gray-900': darkMode === true }">
    <?php echo $__env->make('user.partials.preloader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="flex h-screen overflow-hidden">
        <?php echo $__env->make('user.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="relative flex flex-col flex-1 overflow-x-hidden overflow-y-auto bg-[#F8FAFC]">
            <?php echo $__env->make('user.partials.overlay', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('user.partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <main class="pt-6">
                <div class="w-full px-6 pb-8">
                    <?php echo $__env->yieldContent('content'); ?>
                </div>
            </main>
        </div>
    </div>
</body>
</html><?php /**PATH E:\RUMGABPSDMIMIPAS\RUMGABPSDMIMIPAS\resources\views/layouts/user.blade.php ENDPATH**/ ?>