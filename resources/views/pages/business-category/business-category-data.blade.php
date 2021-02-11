<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Data Kategori Bisnis') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Kategori Bisnis</a></div>
            <div class="breadcrumb-item"><a href="{{ route('user') }}">Data Kategori Bisnis</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:table.main name="business_category" :model="$business_category" />
    </div>
</x-app-layout>
