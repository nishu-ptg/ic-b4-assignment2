<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error <?= $code ?? 500 ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&display=swap');
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="h-full bg-white flex items-center justify-center p-6 antialiased">

<div class="text-center max-w-md w-full">
    <h1 class="text-8xl md:text-9xl font-black text-blue-600 mb-4 tracking-tighter">
        <?= e($code ?? 500) ?>
    </h1>

    <p class="text-xl md:text-2xl font-bold text-slate-800 mb-8">
        <?= e($message ?? 'Something went wrong...') ?>
    </p>

    <a href="<?= route('dashboard') ?>" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-10 rounded-lg transition-colors shadow-lg shadow-blue-200">
        Go to Home
    </a>
</div>

</body>
</html>