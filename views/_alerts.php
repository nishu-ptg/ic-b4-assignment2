<?php
// disclaimer: generated using AI

// Define our color and style mapping
$types = [
    'success' => [
        'class' => 'bg-green-50/50 border-green-200 text-green-800',
        'icon'  => '<path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.74-5.24z" clip-rule="evenodd" />'
    ],
    'error' => [
        'class' => 'bg-red-50/50 border-red-200 text-red-800',
        'icon'  => '<path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z" clip-rule="evenodd" />'
    ],
    'info' => [
        'class' => 'bg-indigo-50/50 border-indigo-200 text-indigo-800',
        'icon'  => '<path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm8.706-1.442c1.146-.573 2.437.463 2.126 1.706l-.709 2.836c-.149.598.013 1.2.433 1.621.419.422 1.022.584 1.62.434l.004-.001a.75.75 0 00-.364-1.455l-.004.001c-.033.008-.067.003-.09-.019a.34.34 0 01-.086-.127l.709-2.836c.605-2.422-1.877-4.426-4.01-3.36a.75.75 0 00.672 1.34zM12 9a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" />'
    ],
];

// Loop through each alert type and check for a flash message in session
foreach ($types as $key => $config):
    if ($msg = flash($key)): ?>
        <div class="<?= $config['class'] ?> backdrop-blur-md border px-4 py-3 rounded-xl relative mb-6 shadow-sm flex items-center animate-fadeIn transition-all duration-300" role="alert">
            <div class="flex-shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 opacity-80">
                    <?= $config['icon'] ?>
                </svg>
            </div>

            <div class="ml-3">
                <p class="text-sm font-semibold tracking-tight">
                    <?= $msg ?>
                </p>
            </div>

            <button
                onclick="this.parentElement.style.opacity='0'; setTimeout(() => this.parentElement.remove(), 300);"
                class="ml-auto bg-transparent rounded-lg p-1.5 inline-flex items-center justify-center h-8 w-8 hover:bg-white/40 transition-colors focus:outline-none"
            >
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
            </button>
        </div>
    <?php endif;
endforeach; ?>