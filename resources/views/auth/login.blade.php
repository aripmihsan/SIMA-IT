<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="w-full max-w-md mx-auto">
        <div class="mb-10">
            <div class="flex items-center gap-2 mb-2">
                <span class="h-px w-8 bg-gold-500"></span>
                <span class="text-gold-500 text-xs font-bold tracking-[0.2em] uppercase">Secure Access</span>
            </div>
            <h1 class="text-4xl lg:text-5xl font-display font-bold text-white mb-2 tracking-tight">
                Welcome <br> Back.
            </h1>
            <p class="text-gray-500 text-sm">Masukan kredensial admin Anda untuk melanjutkan.</p>
        </div>

        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf

            <div class="group">
                <label for="email" class="block text-xs font-medium text-gray-400 mb-1 group-focus-within:text-gold-500 transition-colors">EMAIL ADDRESS</label>
                <div class="relative">
                    <input id="email" type="email" name="email" :value="old('email')" required autofocus 
                    class="block w-full py-4 bg-transparent border-b border-gray-700 text-gray-100 placeholder-transparent focus:border-gold-500 focus:outline-none transition-all peer" 
                    placeholder="Email">
                    <div class="absolute right-0 top-4 text-gray-600 peer-focus:text-gold-500 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path></svg>
                    </div>
                </div>
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500 text-xs" />
            </div>

            <div class="group mt-6">
                <label for="password" class="block text-xs font-medium text-gray-400 mb-1 group-focus-within:text-gold-500 transition-colors">PASSWORD</label>
                <div class="relative">
                    <input id="password" type="password" name="password" required autocomplete="current-password"
                    class="block w-full py-4 bg-transparent border-b border-gray-700 text-gray-100 placeholder-transparent focus:border-gold-500 focus:outline-none transition-all peer"
                    placeholder="Password">
                    <div class="absolute right-0 top-4 text-gray-600 peer-focus:text-gold-500 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    </div>
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500 text-xs" />
            </div>

            <div class="flex items-center justify-between mt-6">
                <label for="remember_me" class="inline-flex items-center cursor-pointer">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-700 bg-dark-800 text-gold-500 shadow-sm focus:ring-gold-500 focus:ring-offset-dark-900" name="remember">
                    <span class="ml-2 text-xs text-gray-400 hover:text-white transition">Remember me</span>
                </label>
                
                @if (Route::has('password.request'))
                    <a class="text-xs text-gray-500 hover:text-gold-500 transition-colors underline decoration-dotted" href="{{ route('password.request') }}">
                        Forgot Password?
                    </a>
                @endif
            </div>

            <button type="submit" class="w-full mt-8 group relative flex justify-center py-4 px-4 border border-transparent text-sm font-bold rounded-xl text-black bg-gold-500 hover:bg-gold-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gold-500 transition-all duration-300 transform hover:-translate-y-1 shadow-[0_10px_40px_-10px_rgba(212,175,55,0.5)]">
                <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                    <svg class="h-5 w-5 text-black/50 group-hover:text-black transition-colors" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                      <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                    </svg>
                </span>
                SIGN IN TO DASHBOARD
            </button>
        </form>
    </div>
</x-guest-layout>