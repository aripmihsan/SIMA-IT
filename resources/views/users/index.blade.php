@extends('layouts.master')

@section('title', 'Data Karyawan')

@section('content')

    @if(session('success'))
        <div class="mb-6 p-4 rounded-xl bg-green-500/10 border border-green-500/30 text-green-400 font-bold text-sm">
            ✅ {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="mb-6 p-4 rounded-xl bg-red-500/10 border border-red-500/30 text-red-400 font-bold text-sm">
            ❌ {{ session('error') }}
        </div>
    @endif

    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-3xl font-black text-white">Manajemen User</h1>
            <p class="text-gray-400 text-sm mt-1">Kelola akun Admin dan Staff perusahaan.</p>
        </div>
        <a href="{{ route('users.create') }}" class="px-6 py-3 bg-gradient-to-r from-luxury-gold to-luxury-gold-dark rounded-xl font-bold text-black shadow-gold-glow hover:scale-105 transition-transform">
            + Tambah User
        </a>
    </div>

    <div class="premium-glass rounded-[2rem] overflow-hidden shadow-2xl relative">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="border-b border-luxury-gold/10 text-luxury-gold uppercase text-xs tracking-widest bg-black/20">
                    <th class="p-6">Nama User</th>
                    <th class="p-6">Email</th>
                    <th class="p-6 text-center">Role</th>
                    <th class="p-6 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-300 divide-y divide-luxury-gold/5">
                @foreach($users as $user)
                <tr class="hover:bg-luxury-gold/5 transition-colors">
                    <td class="p-6 font-bold text-white flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-luxury-gold/20 flex items-center justify-center text-xs text-luxury-gold">
                            {{ substr($user->name, 0, 2) }}
                        </div>
                        {{ $user->name }}
                    </td>
                    <td class="p-6 text-sm">{{ $user->email }}</td>
                    <td class="p-6 text-center">
                        <span class="px-3 py-1 rounded-full text-xs font-bold uppercase {{ $user->role == 'admin' ? 'bg-purple-500/10 text-purple-400 border border-purple-500/20' : 'bg-blue-500/10 text-blue-400 border border-blue-500/20' }}">
                            {{ $user->role }}
                        </span>
                    </td>
                    <td class="p-6 text-right">
                        <div class="flex justify-end gap-2">
                            <a href="{{ route('users.edit', $user->id) }}" class="p-2 text-gray-500 hover:text-luxury-gold transition"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg></a>
                            
                            @if(auth()->user()->id !== $user->id)
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Hapus user ini?');">
                                    @csrf @method('DELETE')
                                    <button class="p-2 text-gray-500 hover:text-red-500 transition"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg></button>
                                </form>
                            @endif
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection