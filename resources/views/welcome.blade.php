<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Create Your Online Catalog</title>

        <link rel="icon" href="/favicon.ico" sizes="any">
        <link rel="icon" href="/favicon.svg" type="image/svg+xml">
        <link rel="apple-touch-icon" href="/apple-touch-icon.png">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Flowbite CSS (for Tailwind components) -->
        <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />

        <!-- Styles -->
        <style>
            :root {
                --color-primary: #006a9f;
                --color-primary-dark: #004b64;
                --color-secondary: #ffa552;
                --color-secondary-dark: #af6017;
            }
            @layer base {
                html, :host {
                    font-family: var(--default-font-family, ui-sans-serif, system-ui, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji");
                }
            }
            @layer utilities {
                .bg-primary { background-color: var(--color-primary); }
                .bg-primary-dark { background-color: var(--color-primary-dark); }
                .bg-secondary { background-color: var(--color-secondary); }
                .bg-secondary-dark { background-color: var(--color-secondary-dark); }
                .text-primary { color: var(--color-primary); }
                .text-primary-dark { color: var(--color-primary-dark); }
                .text-secondary { color: var(--color-secondary); }
                .text-secondary-dark { color: var(--color-secondary-dark); }
                .border-primary { border-color: var(--color-primary); }
                .border-primary-dark { border-color: var(--color-primary-dark); }
                .hover\:bg-primary:hover { background-color: var(--color-primary); }
                .hover\:bg-primary-dark:hover { background-color: var(--color-primary-dark); }
                .hover\:text-primary:hover { color: var(--color-primary); }
                .dark\:bg-primary { background-color: var(--color-primary-dark); }
                .dark\:text-primary { color: var(--color-primary); }
                .dark\:border-primary { border-color: var(--color-primary-dark); }
                .dark\:hover\:bg-primary:hover { background-color: var(--color-primary); }
            }
        </style>
    </head>
    <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] dark:text-[#EDEDEC] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
        <header class="w-full lg:max-w-4xl max-w-[335px] text-sm mb-6">
            @if (Route::has('login'))
                <nav class="flex items-center justify-end gap-4">
                    @auth
                        <a
                            href="{{ url('/dashboard') }}"
                            class="inline-block px-5 py-1.5 border border-primary hover:bg-primary hover:text-white dark:border-primary dark:hover:bg-primary dark:hover:text-white rounded-md text-sm leading-normal transition-all"
                        >
                            Dashboard
                        </a>
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="inline-block px-5 py-1.5 border border-transparent hover:border-primary hover:text-primary dark:hover:border-primary dark:hover:text-primary rounded-md text-sm leading-normal transition-"
                        >
                            {{ __('Login')  }}
                        </a>
                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="inline-block px-5 py-1.5 bg-primary text-white hover:bg-primary-dark dark:bg-primary dark:hover:bg-primary-dark rounded-md text-sm leading-normal transition-all"
                            >
                                {{ __('Register')  }}
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </header>

        <div class="flex items-center justify-center w-full transition-opacity opacity-100 duration-750 lg:grow starting:opacity-0">
            <main class="flex max-w-[335px] w-full flex-col-reverse lg:max-w-6xl lg:flex-row lg:items-center lg:justify-between gap-12">
                <div class="flex flex-col items-center lg:items-start text-center lg:text-start lg:w-1/2">
                    <div class="mb-4">
                        @include('components.app-horizontal-logo')
                    </div>
                    <h1 class="text-3xl lg:text-4xl font-semibold text-primary-dark dark:text-primary mb-4">
                        Exiba seus produtos e serviços de forma simples
                    </h1>
                    <p class="text-lg text-[#706f6c] dark:text-[#A1A09A] mb-6">
                        Crie catálogos online e compartilhe-os com o mundo por meio de um único link.
                    </p>
                    <div class="flex gap-4">
                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="inline-block px-6 py-2 bg-secondary text-white hover:bg-secondary-dark dark:bg-secondary dark:hover:bg-secondary-dark rounded-md text-sm font-medium transition-all"
                                data-flowbite="button"
                            >
                                {{ __('Get Started')  }}
                            </a>
                        @endif
                        <a
                            href="{{ route('login') }}"
                            class="inline-block px-6 py-2 border border-primary text-primary hover:bg-primary hover:text-white dark:border-primary dark:text-primary dark:hover:bg-primary dark:hover:text-white rounded-md text-sm font-medium transition-all"
                            data-flowbite="button"
                        >
                            {{ __('Login')  }}
                        </a>
                    </div>
                </div>
                <div class="lg:w-1/2 mb-6 lg:mb-0 flex justify-center">
                    <img
                        src="{{ asset('images/catalog-page.png') }}"
                        alt="Catalog Preview"
                        class="w-full max-w-md mx-auto rounded-lg shadow-lg"
                    />
                </div>
            </main>
        </div>

        @if (Route::has('login'))
            <div class="h-14.5 hidden lg:block"></div>
        @endif

        <!-- Flowbite JS -->
        <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    </body>
</html>