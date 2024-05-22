@extends('admin.layouts.app')

@section('title', 'Dashboard | Edit Kategori Hewan Ternak')

@section('content')
    <section class="w-full px-4 mx-auto">
        <div class="flex flex-col">
            <div class="w-full flex justify-center items-center">
                <div class="w-full bg-whitemx-auto rounded">
                    <div class="py-4 text-left px-6">
                        @if (session('error'))
                            <div id="successMessage"
                                class="fixed top-0 left-0 w-full h-full flex justify-center items-center backdrop-blur-md bg-white/30 bg-opacity-50 z-50">
                                <div class="relative w-full max-w-screen-md rounded-lg bg-red-500 px-4 py-4 text-base text-white"
                                    data-dismissible="alert">
                                    <div class="absolute top-4 left-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            aria-hidden="true" class="mt-px h-6 w-6">
                                            <path fill-rule="evenodd"
                                                d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                    <div class="ml-8 mr-12">
                                        <h5
                                            class="block font-sans text-xl font-semibold leading-snug tracking-normal text-white antialiased">
                                            Gagal
                                        </h5>
                                        <p
                                            class="mt-2 block font-sans text-base font-normal leading-relaxed text-white antialiased">
                                            {{ session('error') }}
                                        </p>
                                    </div>
                                    <div data-dismissible-target="alert" data-ripple-dark="true"
                                        class="absolute top-3 right-3 w-max rounded-lg transition-all hover:bg-white hover:bg-opacity-20">
                                        <div role="button" class="w-max rounded-lg p-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M6 18L18 6M6 6l12 12">
                                                </path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="flex justify-between items-center pb-3">
                            <p class="text-2xl font-bold">Tambah jenis hewan</p>
                        </div>
                        <form class=""
                            action="{{ route('admin.typelivestock.update', $typelivestocks->slug_typelivestocks) }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-5">
                                <label for="nama_jenis_hewan" class="mb-3 block text-base font-medium text-[#07074D]">
                                    Masukkan nama jenis hewan
                                </label>
                                <input value="{{ $typelivestocks->nama_jenis_hewan }}" type="text"
                                    name="nama_jenis_hewan" id="nama_jenis_hewan" placeholder="Masukkan nama jenis hewan"
                                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            </div>
                            @error('nama_jenis_hewan')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                            <div class="mb-6 pt-4">
                                <label for="deskripsi_jenis_hewan" class="mb-3 block text-base font-medium text-[#07074D]">
                                    Masukkan deskripsi kategori product
                                </label>
                                <textarea name="deskripsi_jenis_hewan" id="deskripsi_jenis_hewan" placeholder="Masukkan deskripsi kategori product"
                                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">{{ $typelivestocks->deskripsi_jenis_hewan }}</textarea>
                            </div>
                            @error('deskripsi_jenis_hewan')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                            <div class="mb-5">
                                <label for="id_category_livestocks" class="mb-3 block text-base font-medium text-[#07074D]">
                                    Pilih nama jenis hewan
                                </label>
                                <div>
                                    <select name="id_category_livestocks" id="id_category_livestocks"
                                        class="id_category_livestocks border p-2 rounded w-full">
                                        <option value="">Pilih jenis hewan</option>
                                        @foreach ($categorylivestocks as $categorylivestock)
                                            <option value="{{ $categorylivestock->id }}"
                                                {{ $categorylivestock->id == $typelivestocks->id_category_livestocks ? 'selected' : '' }}>
                                                {{ $categorylivestock->nama_kategori_hewan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @error('id_category_livestocks')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                            <div class="mb-6 pt-4">
                                <label class="mb-5 block text-xl font-semibold text-[#07074D]">
                                    Upload gambar
                                </label>
                                <div class="mb-8">
                                    <input type="file" name="gambar_livestocks" id="gambar_livestocks" class="sr-only"
                                        onchange="validateImage(this)" />
                                    <label for="gambar_livestocks"
                                        class="relative flex min-h-[200px] items-center justify-center rounded-md border border-dashed border-[#e0e0e0] p-12 text-center">
                                        <div>
                                            <span class="mb-2 block text-xl font-semibold text-[#07074D]">
                                                Tambah gambar disini
                                            </span>
                                            <span class="mb-2 block text-base font-medium text-[#6B7280]">
                                                atau
                                            </span>
                                            <span
                                                class="inline-flex rounded py-2 px-7 text-base font-medium text-[#07074D]">
                                                Cari
                                            </span>
                                        </div>
                                    </label>
                                </div>
                                @error('gambar_livestocks')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                                <div id="image-preview" class="mt-4"></div>
                                <span id="file-error" class="text-red-500"></span>
                            </div>
                            <div class="pb-4">
                                <button type="submit"
                                    class="hover:shadow-form w-full rounded-md bg-primarybase py-3 px-8 text-center text-base font-semibold text-white outline-none">
                                    Simpan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    @push('js')
        @if ($typelivestocks->gambar_livestocks && !$errors->has('gambar_livestocks'))
            <script>
                $(document).ready(function() {
                    var fileName = "{{ $typelivestocks->gambar_livestocks }}";
                    $('#image-preview').html(`
                <div class="mb-5 rounded-md border border-[#e0e0e0] py-4 px-8">
                    <div class="flex items-center justify-between">
                        <span class="truncate pr-3 text-base font-medium text-[#07074D]">
                            ${fileName}
                        </span>
                    </div>
                </div>
            `);
                });
            </script>
        @endif
        <script>
            $(document).ready(function() {
                $('#gambar_livestocks').change(function(e) {
                    var fileName = e.target.files[0].name;
                    var fileExt = fileName.split('.').pop();
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#image-preview').html(`
                        <div class="mb-5 rounded-md border border-[#e0e0e0] py-4 px-8">
                            <div class="flex items-center justify-between">
                                <span class="truncate pr-3 text-base font-medium text-[#07074D]">
                                ${fileName}
                                </span>
                            </div>
                        </div>
                        `);
                    };
                    reader.readAsDataURL(this.files[0]);
                });
            });

            function validateImage(input) {
                var file = input.files[0];
                var fileType = file.type.split('/').shift();
                var fileName = file.name;

                if (fileType !== 'image') {
                    document.getElementById('file-error').innerHTML = 'Gambar kategori produk harus berupa file gambar.';
                    document.getElementById('image-preview').innerHTML = '';
                } else {
                    document.getElementById('file-error').innerHTML = '';

                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#image-preview').html(`
                        <div class="mb-5 rounded-md border border-[#e0e0e0] py-4 px-8">
                            <div class="flex items-center justify-between">
                                <span class="truncate pr-3 text-base font-medium text-[#07074D]">
                                ${fileName}
                                </span>
                            </div>
                        </div>
                        `);
                    };
                    reader.readAsDataURL(file);
                }
            }
            document.addEventListener('DOMContentLoaded', function() {
                var successMessage = document.getElementById('successMessage');

                // Sembunyikan pesan sukses saat diklik
                successMessage.addEventListener('click', function() {
                    successMessage.style.display = 'none';
                });
            });
        </script>
    @endpush
@endsection
