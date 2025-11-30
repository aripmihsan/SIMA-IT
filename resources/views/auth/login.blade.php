<!DOCTYPE html>
<html lang="id" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - SIMA Pro</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

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
                            'gold': '#D4AF37', 
                            'gold-dark': '#9a7b22', 
                        }
                    },
                    animation: {
                        'fade-in-down': 'fadeInDown 0.5s ease-out',
                        'fade-in-up': 'fadeInUp 0.5s ease-out 0.2s both',
                    },
                    keyframes: {
                        fadeInDown: {
                            '0%': { opacity: '0', transform: 'translateY(-20px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        },
                        fadeInUp: {
                            '0%': { opacity: '0', transform: 'translateY(20px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        },
                    }
                }
            }
        }
    </script>
    <style>
        * { -webkit-tap-highlight-color: transparent; }
        
        .modern-input {
            background-color: transparent;
            border-bottom: 2px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }
        .modern-input:focus {
            border-color: #D4AF37;
            box-shadow: 0 4px 6px -1px rgba(212, 175, 55, 0.1);
        }
        
        .bg-image-cover {
            background-image: url('https://images.unsplash.com/photo-1639322537228-ad714556c2f7?q=80&w=1974&auto=format&fit=crop');
            background-size: cover;
            background-position: center;
        }

        /* --- PERBAIKAN AUTOFILL (Mencegah background putih) --- */
        input:-webkit-autofill,
        input:-webkit-autofill:hover, 
        input:-webkit-autofill:focus, 
        input:-webkit-autofill:active {
            -webkit-box-shadow: 0 0 0 30px #121212 inset !important;
            -webkit-text-fill-color: white !important;
            transition: background-color 5000s ease-in-out 0s;
        }
    </style>
</head>
<body class="font-sans antialiased bg-luxury-950 text-gray-200 min-h-screen">

    <div class="min-h-screen flex overflow-hidden relative">

        <div class="hidden md:flex md:w-1/2 bg-image-cover relative items-center justify-center p-12 overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-luxury-950/90 via-luxury-900/80 to-luxury-950/90 z-10"></div>
            
            <div class="absolute -top-24 -left-24 w-96 h-96 bg-luxury-gold opacity-20 blur-[120px] rounded-full z-0 pointer-events-none"></div>
            <div class="absolute bottom-0 right-0 w-64 h-64 bg-luxury-gold opacity-10 blur-[100px] rounded-full z-0 pointer-events-none"></div>

            <div class="relative z-20 text-left animate-fade-in-down">
                <div class="flex items-center gap-3 mb-6">
                    <div class="p-3 rounded-2xl bg-luxury-gold/10 border border-luxury-gold/30 backdrop-blur-md shadow-[0_0_15px_rgba(212,175,55,0.3)]">
                        <svg class="w-8 h-8 text-luxury-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                    </div>
                    <h1 class="text-3xl font-black tracking-tight text-white">SIMA <span class="text-luxury-gold">PRO</span></h1>
                </div>
                <h2 class="text-4xl font-bold text-white mb-4 leading-tight">Sistem Manajemen Aset <br>Terintegrasi.</h2>
                <p class="text-lg text-gray-400 max-w-md leading-relaxed">Kelola inventaris IT perusahaan dengan efisiensi tinggi, keamanan maksimal, dan kontrol penuh dalam satu genggaman.</p>
                
                <div class="mt-12 flex items-center gap-4 text-sm text-gray-500 font-medium uppercase tracking-widest">
                    <div class="flex -space-x-2">
                        <div class="w-8 h-8 rounded-full bg-luxury-900 border border-luxury-gold/30 flex items-center justify-center text-[10px] text-luxury-gold">PT</div>
                        <div class="w-8 h-8 rounded-full bg-luxury-900 border border-luxury-gold/30 flex items-center justify-center text-[10px] text-luxury-gold">CY</div>
                    </div>
                    <span>Cyber Teknologi Corp. Enterprise</span>
                </div>
            </div>
        </div>

        <div class="w-full md:w-1/2 bg-luxury-900 flex items-center justify-center p-8 relative">
            <div class="absolute top-0 right-0 w-full h-2 bg-gradient-to-r from-transparent via-luxury-gold/50 to-transparent opacity-50 md:hidden"></div>

            <div class="w-full max-w-md space-y-8 animate-fade-in-up relative z-10">
                <div class="text-left">
                    <div class="md:hidden flex items-center gap-2 mb-6 opacity-80">
                        <svg class="w-6 h-6 text-luxury-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                         <h1 class="text-xl font-black tracking-tight text-white">SIMA <span class="text-luxury-gold">PRO</span></h1>
                    </div>

                    <h2 class="mt-2 text-4xl font-black text-white tracking-tight">Selamat Datang Kembali.</h2>
                    <p class="mt-3 text-base text-gray-400">Silakan masukkan akun Admin atau Staff Anda untuk melanjutkan.</p>
                </div>

                @if ($errors->any())
                <div class="mb-4 p-4 rounded-xl bg-red-500/10 border border-red-500/30 backdrop-blur-sm animate-pulse">
                    <div class="flex items-center gap-3">
                        <svg class="w-6 h-6 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <div>
                            <h4 class="text-sm font-bold text-red-400">Login Gagal!</h4>
                            <ul class="mt-1 list-disc list-inside text-sm text-red-300/80">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                @endif

                <form class="mt-8 space-y-8" action="{{ route('login') }}" method="POST">
                    @csrf

                    <div class="group relative z-0 w-full mb-6 group">
                        <input type="email" name="email" id="email" value="{{ old('email') }}" class="block py-3 px-0 w-full text-lg text-white bg-transparent border-0 border-b-2 border-gray-700 appearance-none modern-input focus:outline-none focus:ring-0 peer" placeholder=" " required />
                        <label for="email" class="peer-focus:font-medium absolute text-lg text-gray-400 duration-300 transform -translate-y-7 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-luxury-gold peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-7 leading-tight pointer-events-none">
                            <div class="flex items-center gap-2">
                                <svg class="w-5 h-5 mb-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                Alamat Email
                            </div>
                        </label>
                    </div>

                    <div class="group relative z-0 w-full mb-6 group">
                        <input type="password" name="password" id="password" class="block py-3 px-0 w-full text-lg text-white bg-transparent border-0 border-b-2 border-gray-700 appearance-none modern-input focus:outline-none focus:ring-0 peer" placeholder=" " required />
                        <label for="password" class="peer-focus:font-medium absolute text-lg text-gray-400 duration-300 transform -translate-y-7 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-luxury-gold peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-7 leading-tight pointer-events-none">
                             <div class="flex items-center gap-2">
                                <svg class="w-5 h-5 mb-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                                Kata Sandi
                            </div>
                        </label>
                    </div>

                    <div class="flex items-center justify-between text-sm">
                        <div class="flex items-center">
                            <input id="remember_me" name="remember" type="checkbox" class="h-5 w-5 text-luxury-gold focus:ring-luxury-gold border-gray-700 rounded bg-luxury-950/50 cursor-pointer transition-all checked:bg-luxury-gold checked:border-transparent">
                            <label for="remember_me" class="ml-3 block text-gray-300 select-none cursor-pointer hover:text-luxury-gold transition-colors">
                                Ingat saya
                            </label>
                        </div>

                        @if (Route::has('password.request'))
                        <div class="text-sm">
                            <a href="{{ route('password.request') }}" class="font-semibold text-luxury-gold hover:text-luxury-gold-light transition-colors hover:underline decoration-2 underline-offset-4">
                                Lupa kata sandi?
                            </a>
                        </div>
                        @endif
                    </div>

                    <div>
                        <button type="submit" class="group relative w-full flex justify-center py-4 px-4 border border-transparent font-black rounded-xl text-black bg-gradient-to-r from-luxury-gold to-luxury-gold-dark hover:from-luxury-gold-light hover:to-luxury-gold focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-luxury-gold focus:ring-offset-luxury-900 transition-all duration-300 transform hover:scale-[1.02] active:scale-[0.98] shadow-[0_0_20px_rgba(212,175,55,0.3)] overflow-hidden">
                            <span class="absolute inset-0 w-full h-full bg-gradient-to-r from-transparent via-white/30 to-transparent -translate-x-[150%] group-hover:translate-x-[150%] transition-transform duration-700 ease-in-out"></span>
                            <span class="relative flex items-center gap-3 text-base tracking-wider uppercase">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                                Masuk Sekarang
                            </span>
                        </button>
                    </div>
                </form>

                <p class="mt-10 text-center text-sm text-gray-500">
                    &copy; {{ date('Y') }} PT. Cyber Teknologi Corp. <br>Dilindungi Hak Cipta.
                </p>
            </div>
        </div>

    </div>
</body>
</html>