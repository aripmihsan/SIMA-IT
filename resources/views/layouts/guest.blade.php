<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} - Login Premium</title>

        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                darkMode: 'class',
                theme: {
                    extend: {
                        fontFamily: { sans: ['Inter', 'sans-serif'] },
                        colors: {
                            luxury: {
                                950: '#0a0a0a', 
                                900: '#121212',
                                800: '#1E1E1E',
                                'gold-dark': '#9a7b22',
                                'gold': '#D4AF37',
                                'gold-light': '#f5e0a3',
                            }
                        },
                        animation: {
                            'blob-slow': 'blob 20s infinite alternate',
                        },
                        keyframes: {
                            blob: {
                                '0%': { transform: 'translate(0px, 0px) scale(1)' },
                                '100%': { transform: 'translate(50px, -50px) scale(1.1)' },
                            }
                        },
                        boxShadow: {
                            'gold-glow': '0 0 25px -5px rgba(212, 175, 55, 0.5)',
                        }
                    }
                }
            }
        </script>
        <style>
             /* Background Ambient Light */
             .bg-ambient-light {
                position: fixed; top: 0; left: 0; right: 0; bottom: 0; z-index: 0; overflow: hidden; pointer-events: none;
            }
            .light-blob-1 {
                position: absolute; top: -10%; left: -10%; w: 50%; h: 50%;
                background: radial-gradient(circle, rgba(212,175,55,0.15) 0%, rgba(0,0,0,0) 70%);
                filter: blur(80px); animation: blob-slow 15s infinite alternate;
            }
            .light-blob-2 {
                position: absolute; bottom: -10%; right: -10%; w: 60%; h: 60%;
                background: radial-gradient(circle, rgba(154,123,34,0.1) 0%, rgba(0,0,0,0) 70%);
                filter: blur(100px); animation: blob-slow 20s infinite alternate-reverse;
            }
        </style>
    </head>
    <body class="font-sans text-gray-300 antialiased bg-luxury-950 selection:bg-luxury-gold selection:text-black">
        
        <div class="bg-ambient-light">
            <div class="light-blob-1"></div>
            <div class="light-blob-2"></div>
        </div>

        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 relative z-10 p-6">
            <div class="w-full sm:max-w-md mt-6 px-8 py-10 bg-[#121212]/80 backdrop-blur-xl border border-luxury-gold/20 shadow-[0_8px_32px_0_rgba(0,0,0,0.5)] rounded-[2rem] relative overflow-hidden group">
                <div class="absolute top-0 left-0 right-0 h-0.5 bg-gradient-to-r from-transparent via-luxury-gold/50 to-transparent"></div>
                
                {{ $slot }}
            </div>
            
            <div class="mt-8 text-center text-xs text-luxury-gold/40 relative z-10">
                &copy; 2025 PT. Cyber Teknologi. Premium Asset System.
            </div>
        </div>
    </body>
</html>