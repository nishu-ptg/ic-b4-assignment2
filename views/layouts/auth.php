<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $title ?? '' ?> | <?= config('app_name', 'APP_NAME') ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <?php require_once __DIR__ . '/_auth-head.php'; ?>
</head>
<body
    class="bg-gradient-to-br from-indigo-50 via-white to-cyan-50 min-h-screen flex items-center justify-center p-4"
>
    <div class="max-w-md w-full space-y-8">

        <?php require_once __DIR__ . '/../_alerts.php'; ?>

        <?= $content; ?>

    </div>
</body>
</html>
