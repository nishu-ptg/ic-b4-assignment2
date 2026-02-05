<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $title ?? '' ?> | <?= config('app_name', 'APP_NAME') ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <?php require_once __DIR__ . '/_main-head.php'; ?>
</head>
<body class="bg-gray-50 min-h-screen">
    <div class="flex flex-col lg:flex-row min-h-screen">

        <?php require_once __DIR__ . '/_sidebar.php'; ?>

        <main class="flex-1 p-6 lg:p-8">

            <?php require_once __DIR__ . '/../_alerts.php'; ?>

            <?php require_once __DIR__ . '/_header.php'; ?>

            <?= $content; ?>

        </main>

    </div>
</body>
</html>
