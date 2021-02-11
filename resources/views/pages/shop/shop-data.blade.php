<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Data Toko') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Toko</a></div>
            <div class="breadcrumb-item"><a href="{{ route('user') }}">Data Toko</a></div>
        </div>
    </x-slot>

    <div>

    </div>
</x-app-layout>
