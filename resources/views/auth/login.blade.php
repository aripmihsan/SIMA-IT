<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="flex flex-col items-center mb-10">
        <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-luxury-gold/20 to-transparent border border-luxury-gold/30 flex items-center justify-center shadow-gold-glow mb-4 animate-pulse">
            <svg class="w-9 h-9 text-luxury-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
        </div>
        <h2 class="text-2xl font-bold text-white tracking-tight">Welcome Back</h2>
        <p class="text-sm text-gray-500 mt-1">Please enter your premium credentials</p>
    </div>

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <div>
            <label for="email" class="block text-xs font-medium text-luxury-gold uppercase tracking-widest mb-2">Email Access</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" /></svg>
                </div>
                <input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" 
                class="block w-full pl-10 pr-3 py-3 bg-luxury-900 border border-gray-800 rounded-xl text-gray-200 placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-luxury-gold/50 focus:border-luxury-gold transition-all shadow-inner" 
                placeholder="admin@cyber.id">
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400 text-xs" />
        </div>

        <div>
            <div class="flex justify-between items-center mb-2">
                <label for="password" class="block text-xs font-medium text-luxury-gold uppercase tracking-widest">Password</label>
                @if (Route::has('password.request'))
                    <a class="text-xs text-gray-500 hover:text-luxury-gold transition-colors" href="{{ route('password.request') }}">
                        Forgot password?
                    </a>
                @endif
            </div>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" /></svg>
                </div>
                <input id="password" type="password" name="password" required autocomplete="current-password"
                class="block w-full pl-10 pr-3 py-3 bg-luxury-900 border border-gray-800 rounded-xl text-gray-200 placeholder-gray-600 focus:outline-none focus:ring-2 focus:ring-luxury-gold/50 focus:border-luxury-gold transition-all shadow-inner"
                placeholder="••••••••">
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-400 text-xs" />
        </div>

        <div class="block">
            <label for="remember_me" class="inline-flex items-center group cursor-pointer">
                <div class="relative">
                    <input id="remember_me" type="checkbox" class="peer sr-only" name="remember">
                    <div class="w-5 h-5 border-2 border-gray-600 rounded bg-luxury-900 peer-checked:bg-luxury-gold peer-checked:border-luxury-gold transition-all"></div>
                    <svg class="absolute w-3 h-3 text-black left-1 top-1 opacity-0 peer-checked:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                </div>
                <span class="ml-2 text-sm text-gray-500 group-hover:text-gray-300 transition-colors">Remember me</span>
            </label>
        </div>

        <button type="submit" class="w-full py-3.5 px-4 bg-gradient-to-r from-luxury-gold to-luxury-gold-dark hover:from-yellow-400 hover:to-yellow-600 text-black font-bold text-sm rounded-xl shadow-[0_0_20px_rgba(212,175,55,0.3)] hover:shadow-[0_0_30px_rgba(212,175,55,0.6)] transform hover:-translate-y-0.5 transition-all duration-300 flex justify-center items-center gap-2 group">
            <span>SECURE LOGIN</span>
            <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
        </button>
    </form>
</x-guest-layout>