<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Buat Toko Baru') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Toko</a></div>
            <div class="breadcrumb-item"><a href="{{ route('user') }}">Buat Toko Baru</a></div>
        </div>
    </x-slot>

    <div class="row">
        <section class="col-12 col-md-6 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4>Form Buat Toko</h4>
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('shop.store')}}" autocomplete="off">
                        @csrf
                        <div class="pl-lg-4">
                            <div class="form-group">
                                <label>Nama Toko
                                        <span class="text-danger">*</span>
                                </label>
                                <input name="name" placeholder="Nama Toko" class="form-control" required="">
                            </div>

                            <div class="form-group">
                                <label>Alamat Toko
                                        <span class="text-danger">*</span>
                                </label>
                                <input name="address" placeholder="Alamat Toko" class="form-control" required="">
                            </div>

                            <div class="form-group">
                                <label>Akun Pengguna<span class="text-danger">*</span></label>
                                <div class="form-row">
                                    <div class="input-group">
                                        <select class="form-control select2" required="" name="user_id">
                                            @foreach ($users as $user)
                                            <option value="{{$user->id}}">{{$user->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="text-right">
                                <button type="submit" class="btn btn-icon icon-left btn-success">
                                    <i class="fas fa-check"></i> Simpan
                                </button>
                                <a href="javascript:history.go(-1)" class="btn btn-outline-secondary">Batal</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</x-app-layout>