@extends('layouts.master')

@section('title', 'Tambah Karyawan')

@section('content')
    <div class="max-w-2xl mx-auto animate-fade-in-up">
        <div class="mb-8">
            <a href="{{ route('users.index') }}" class="flex items-center gap-2 text-gray-500 hover:text-luxury-gold transition-colors mb-4 text-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali
            </a>
            <h1 class="text-3xl font-black text-white">Registrasi Akun Baru</h1>
            <p class="text-gray-400 text-sm mt-1">Buat akun untuk Admin atau Staff baru.</p>
        </div>

        <div class="premium-glass p-8 rounded-[2rem] relative overflow-hidden">
            <div class="absolute top-0 right-0 w-32 h-32 bg-luxury-gold/10 rounded-full blur-2xl pointer-events-none"></div>

            <form action="{{ route('users.store') }}" method="POST" class="space-y-6 relative z-10">
                @csrf

                <div class="group">
                    <label class="label-gold">Nama Lengkap</label>
                    <input type="text" name="name" required placeholder="Contoh: Ahmad Staff" 
                    class="input-gold">
                </div>

                <div class="group">
                    <label class="label-gold">Email Login</label>
                    <input type="email" name="email" required placeholder="staff@cyber.id" 
                    class="input-gold">
                </div>

                <div class="group">
                    <label class="label-gold">Role (Jabatan)</label>
                    <div class="grid grid-cols-2 gap-4">
                        <label class="cursor-pointer">
                            <input type="radio" name="role" value="staff" class="peer sr-only" checked>
                            <div class="p-4 rounded-xl bg-luxury-900 border border-luxury-gold/20 text-gray-400 peer-checked:bg-luxury-gold/20 peer-checked:border-luxury-gold peer-checked:text-luxury-gold transition text-center hover:bg-luxury-gold/5">
                                <span class="block font-bold">STAFF</span>
                                <span class="text-[10px]">Akses Terbatas</span>
                            </div>
                        </label>
                        <label class="cursor-pointer">
                            <input type="radio" name="role" value="admin" class="peer sr-only">
                            <div class="p-4 rounded-xl bg-luxury-900 border border-luxury-gold/20 text-gray-400 peer-checked:bg-purple-500/20 peer-checked:border-purple-500 peer-checked:text-purple-400 transition text-center hover:bg-purple-500/5">
                                <span class="block font-bold">ADMIN</span>
                                <span class="text-[10px]">Akses Penuh</span>
                            </div>
                        </label>
                    </div>
                </div>

                <div class="border-t border-luxury-gold/10 my-6"></div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="group">
                        <label class="label-gold">Password</label>
                        <input type="password" name="password" required class="input-gold" placeholder="******">
                    </div>
                    <div class="group">
                        <label class="label-gold">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" required class="input-gold" placeholder="******">
                    </div>
                </div>

                <div class="pt-4 flex gap-4">
                    <button type="submit" class="flex-1 py-4 bg-gradient-to-r from-luxury-gold to-luxury-gold-dark text-black font-bold rounded-xl shadow-gold-glow hover:scale-[1.02] transition-transform">
                        BUAT AKUN
                    </button>
                    <a href="{{ route('users.index') }}" class="px-8 py-4 bg-white/5 text-gray-400 font-bold rounded-xl hover:bg-white/10 transition">
                        BATAL
                    </a>
                </div>
            </form>
        </div>
    </div>

    <style>
        .label-gold { display: block; font-size: 0.75rem; font-weight: 700; color: #D4AF37; text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: 0.5rem; }
        .input-gold { width: 100%; background-color: rgba(18, 18, 18, 0.5); border: 1px solid rgba(212, 175, 55, 0.2); border-radius: 0.75rem; padding: 0.75rem 1.25rem; color: white; transition: all; }
        .input-gold:focus { outline: none; border-color: #D4AF37; box-shadow: 0 0 0 1px #D4AF37; }
    </style>
@endsection