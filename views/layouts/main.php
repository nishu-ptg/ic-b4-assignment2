<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Profile | Interactive Cares</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        indigo: {
                            50: "#eef2ff",
                            100: "#e0e7ff",
                            500: "#6366f1",
                            600: "#4f46e5",
                            700: "#4338ca",
                        },
                        purple: {
                            50: "#faf5ff",
                            500: "#a855f7",
                            600: "#9333ea",
                            700: "#7e22ce",
                        },
                    },
                    animation: {
                        fadeIn: "fadeIn 0.5s ease-in forwards",
                        slideIn: "slideIn 0.3s ease-out forwards",
                    },
                    keyframes: {
                        fadeIn: {
                            from: { opacity: 0, transform: "translateY(10px)" },
                            to: { opacity: 1, transform: "translateY(0)" },
                        },
                        slideIn: {
                            from: { opacity: 0, transform: "translateX(-10px)" },
                            to: { opacity: 1, transform: "translateX(0)" },
                        },
                    },
                },
            },
        };
    </script>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap");
        body {
            font-family: "Inter", sans-serif;
        }
        .glass {
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }
        .dashboard-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }
        @media (min-width: 768px) {
            .dashboard-grid {
                grid-template-columns: 1fr 1fr;
            }
        }
        @media (min-width: 1024px) {
            .dashboard-grid {
                grid-template-columns: 1fr 1fr 1fr;
            }
        }
        .progress-bar {
            height: 0.5rem;
            border-radius: 9999px;
            background-color: #e5e7eb;
            overflow: hidden;
        }
        .progress-fill {
            height: 100%;
            border-radius: 9999px;
            background: linear-gradient(to right, #4f46e5, #7e22ce);
            transition: width 0.5s ease;
        }
        .sidebar-link {
            transition: all 0.2s ease;
        }
        .sidebar-link:hover,
        .sidebar-link.active {
            background-color: #f3f4f6;
            border-left: 4px solid #4f46e5;
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen">
    <div class="flex flex-col lg:flex-row min-h-screen">

        <?php require __DIR__ . '/_sidebar.php'; ?>

        <main class="flex-1 p-6 lg:p-8">

            <?php require __DIR__ . '/_header.php'; ?>

            <?= $content; ?>

        </main>

    </div>
</body>
</html>
