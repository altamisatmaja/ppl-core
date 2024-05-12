<!-- component -->
@extends('customer.layouts.app')

@section('title', 'Customer | Account')

@section('content')

    <div id="body" class="bg-slate-50 h-screen flex">
        <nav class="bg-white w-80 h-screen flex flex-col gap-10 border-r border-slate-100">
            <div class="logo text-2xl font-bold text-center h-16 flex items-center justify-center">Greeny</div>
            <div class="user flex items-center justify-center flex-col gap-4 border-b border-emerald-slate-50 py-4">
                <img class="w-24 rounded-full shadow-xl"
                    src="https://w7.pngwing.com/pngs/340/946/png-transparent-avatar-user-computer-icons-software-developer-avatar-child-face-heroes-thumbnail.png">
                <div class="flex flex-col items-center">
                    <span class="font-semibold text-lg text-emerald-700">Muhammed YEŞİLMEN</span>
                    <span class="text-slate-400 text-sm">Developer</span>
                </div>
                <div class="text-sm text-slate-400">
                    <span class="font-semibold text-slate-500">Yönlendirilmiş Ticket Sayısı</span> (20)
                </div>
            </div>

            <ul class="px-6 space-y-2">
                <li>
                    <a class="block px-4 py-2.5 text-slate-800 font-semibold  hover:bg-emerald-950 hover:text-white rounded-lg"
                        href="#">Haber Yönetimi</a>
                </li>
                <li>
                    <a class="block px-4 py-2.5 text-slate-800 font-semibold hover:bg-emerald-950 hover:text-white rounded-lg"
                        href="#">CMS Hesapları</a>

                </li>
                <li>
                    <a class="block px-4 py-2.5 text-slate-800 font-semibold hover:bg-emerald-950 hover:text-white rounded-lg"
                        href="#">Destek Talepleri</a>
                </li>
                <li class="bg-slate-50 pb-2 rounded-lg border">
                    <a class="block px-4 py-2.5 text-slate-200 font-semibold hover:bg-emerald-950 hover:text-white rounded-lg bg-emerald-950"
                        href="#">Loglar & Kayıtlar</a>
                    <ol class="text-sm text-slate-700 space-y-4 pl-6 my-2.5">
                        <li>
                            <a class="block text-slate-500 hover:text-slate-950">Karakter Transfer Talepleri</a>
                        </li>
                        <li>
                            <a class="block text-slate-500 hover:text-slate-950">Silah Yükseltme Talepleri</a>
                        </li>
                        <li>
                            <a class="block text-slate-500 hover:text-slate-950">İsim Değiştirme Kayıtları</a>
                        </li>
                        <li>
                            <a class="block text-slate-500 hover:text-slate-950">Klan Değiştirme Kayıtları</a>
                        </li>
                    </ol>
                </li>
                <li>
                    <a class="block px-4 py-2.5 text-slate-800 font-semibold hover:bg-emerald-950 hover:text-white rounded-lg"
                        href="#">Etkinlik Yönetimi</a>
                </li>
            </ul>
        </nav>
        <div class="right w-full flex gap-2 flex-col">
            <header class="h-16 w-full flex items-center p-4 text-slate-400">
                <ol
                    class=" text-slate-400 flex flex-wrap gap-1 text-sm [&>li:last-child]:font-semibold [&>li:not(:first-child)]:before:content-['\00bb']">
                    <li class="before:content-['\2616'] before:mx-2"><a href="#">Homepage</a></li>
                    <li class="before:mx-2"><a href="#">Category Name</a></li>
                    <li class="before:mx-2">Page name</li>
                </ol>
            </header>

            <div class="p-4">
                <h1 class="text-xl font-semibold text-slate-500 page-title">Page Name</h1>
            </div>
        </div>
        <div>
            <!-- component -->
            @push('js')
                <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
            @endpush
        @endsection
