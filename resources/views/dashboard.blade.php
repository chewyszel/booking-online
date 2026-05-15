<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <h1>Dashboard</h1>

                    <br>

                    <a href="/dashboard">Home</a> |
                    <a href="/bookings">Data Booking</a> |
                    <a href="/bookings/create">Booking Baru</a>

                    {{-- MENU KHUSUS ADMIN --}}
                    @if(auth()->user()->role == 'admin')
                        | <a href="{{ route('fields.create') }}">Tambah Lapangan</a> (Admin)</a>
                    @endif

                    <br><br>

                    <p>Selamat datang di sistem booking lapangan</p>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>