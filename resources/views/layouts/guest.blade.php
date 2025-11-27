<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'SIMA PRO') }}</title>

        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Outfit:wght@500;700;800&display=swap" rel="stylesheet">
        
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                darkMode: 'class',
                theme: {
                    extend: {
                        fontFamily: { 
                            sans: ['Inter', 'sans-serif'],
                            display: ['Outfit', 'sans-serif'],
                        },
                        colors: {
                            gold: {
                                400: '#FACC15', // Kuning terang
                                500: '#D4AF37', // Emas Standar
                                600: '#B49328', // Emas Gelap
                            },
                            dark: {
                                900: '#050505', // Hitam Pekat
                                800: '#0F0F0F', // Hitam Panel
                            }
                        },
                        animation: {
                            'float': 'float 8s ease-in-out infinite',
                            'pulse-slow': 'pulse 6s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                        },
                        keyframes: {
                            float: {
                                '0%, 100%': { transform: 'translateY(0)' },
                                '50%': { transform: 'translateY(-20px)' },
                            }
                        }
                    }
                }
            }
        </script>
        <style>
            /* Pattern Background Kanan */
            .bg-grid-pattern {
                background-image: linear-gradient(to right, #1f1f1f 1px, transparent 1px),
                                  linear-gradient(to bottom, #1f1f1f 1px, transparent 1px);
                background-size: 40px 40px;
                mask-image: linear-gradient(to bottom, black 40%, transparent 100%);
                -webkit-mask-image: linear-gradient(to bottom, black 40%, transparent 100%);
            }
        </style>
    </head>
    <body class="font-sans antialiased text-gray-300 bg-dark-900 overflow-hidden">
        
        <div class="min-h-screen flex">
            
            <div class="w-full lg:w-[40%] flex flex-col justify-center px-8 sm:px-16 lg:px-24 bg-dark-900 relative z-20 border-r border-white/5">
                <div class="lg:hidden mb-8">
                     <span class="text-2xl font-display font-bold text-white">SIMA<span class="text-gold-500">PRO</span></span>
                </div>

                {{ $slot }}

                <div class="mt-10 text-xs text-gray-600">
                    &copy; 2025 Cyber Teknologi Corp. All rights reserved.
                </div>
            </div>

            <div class="hidden lg:flex w-[60%] relative bg-[#0a0a0a] items-center justify-center overflow-hidden">
                
                <div class="absolute inset-0 bg-grid-pattern opacity-30"></div>

                <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-gold-500/20 rounded-full blur-[120px] animate-pulse-slow"></div>
                <div class="absolute bottom-1/4 right-1/4 w-[30rem] h-[30rem] bg-purple-900/20 rounded-full blur-[120px] animate-pulse-slow" style="animation-delay: 2s"></div>

                <div class="relative z-10 w-[80%] max-w-lg p-8 rounded-3xl bg-white/5 border border-white/10 backdrop-blur-xl shadow-2xl animate-float">
                    <div class="text-gold-500 text-6xl font-serif opacity-50 absolute -top-4 -left-4">"</div>
                    
                    <h3 class="text-3xl font-display font-bold text-white leading-tight mb-4">
                        Manage Assets with <br>
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-gold-400 to-gold-600">Premium Precision.</span>
                    </h3>
                    <p class="text-gray-400 text-lg font-light leading-relaxed">
                        Selamat datang di sistem manajemen aset masa depan. Keamanan tingkat tinggi, antarmuka elegan, dan kontrol penuh di tangan Anda.
                    </p>

                    <div class="mt-8 flex items-center gap-4 pt-6 border-t border-white/10">
                        <div class="w-12 h-12 rounded-full bg-gradient-to-tr from-gold-500 to-yellow-300 p-0.5">
                            <img src="https://ui-avatars.com/api/?name=Cyber+Tech&background=000&color=fff" class="w-full h-full rounded-full object-cover">
                        </div>
                        <div>
                            <p class="text-white font-bold text-sm">PT. Cyber Teknologi</p>
                            <p class="text-gold-500 text-xs tracking-wider uppercase">Enterprise Edition</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </body>
</html>