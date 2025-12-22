<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>x402 Sandbox</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-slate-50 dark:bg-slate-800 antialiased flex items-stretch">
        <aside class="bg-slate-100 dark:bg-slate-900">
            <div class="w-64 p-4">
                <a
                    href="https://x402sandbox.com" class="inline-flex items-center space-x-2"
                    title="x402 Sandbox"
                    target="_blank"
                >
                    <x-brand-logo />
                </a>

                <x-sidebar.nav title="Platform">
                    <x-sidebar.link
                        href="/wallets"
                        title="Wallets"
                    >
                        <x-icons.wallet />
                        Wallets
                    </x-sidebar.link>
                </x-sidebar.nav>

                <x-sidebar.nav title="Sandboxes">
                    <x-sidebar.link
                        href="/"
                        title="Default"
                    >
                        <x-icons.package />
                        Default
                    </x-sidebar.link>
                </x-sidebar.nav>
            </div>
        </aside>

        <main class="min-h-svh flex-1 max-w-7xl w-full p-4 md:p-8">
            {{ $slot }}
        </main>
    </body>
</html>
