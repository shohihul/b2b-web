<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Buat Kategori Toko Baru') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Kategori Toko</a></div>
            <div class="breadcrumb-item"><a href="{{ route('business-category.create') }}">Buat Kategori Toko Baru</a></div>
        </div>
    </x-slot>

    <div class="row">
        <section class="col-12 col-md-6 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4>Form Buat Kategori Bisnis</h4>
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('business-category.post')}}" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        <div class="pl-lg-4">
                            <div class="form-group">
                                <label>Nama Kategori
                                        <span class="text-danger">*</span>
                                </label>
                                <input name="name" placeholder="Nama Kategori Bisnis" class="form-control" required="">
                            </div>

                            <div class="form-group">
                                <label>Foto Mobil
                                        <span class="text-danger">*</span>
                                </label>
                                <div id="image-preview" class="image-preview">
                                    <label for="image-upload" id="image-label">Choose File</label>
                                    <input class="form-control" type="file" name="image" id="image-upload" required="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="d-block">Jenis Bisnis</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="type" value="goods" id="goods" checked>
                                    <label class="form-check-label" for="goods">
                                    Barang
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="type" value="service" id="service" checked>
                                    <label class="form-check-label" for="service">
                                    Jasa
                                    </label>
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

    @section('script')
        <script src="{{ asset('stisla/modules/upload-preview/assets/js/jquery.uploadPreview.min.js') }}"></script>
        <script src="{{ asset('js/uploadPreview.js') }}"></script>
    @endsection
</x-app-layout>