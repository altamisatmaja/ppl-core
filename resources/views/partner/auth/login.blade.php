<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="icon" type="image/svg+xml" href="{{ asset('logo-notext.svg') }}" />
    <title>Admin | Masuk</title>
</head>

<body>
    <section class="bg-gray-50">
        <div class="flex flex-col items-center justify-center px-6 py-8 mt-5 mx-auto md:h-screen lg:py-0">
            <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900">
                <img class="w-56 mr-2" src="{{ asset('logo.svg') }}" alt="logo">
            </a>
            @if ($errors->any())
                <div
                    class='flex items-center text-white w-full sm:max-w-md bg-red-400 shadow-md rounded-lg overflow-hidden mx-auto mb-7'>
                    <div class='w-10 border-r px-2'>
                        <svg class="flex-shrink-0 w-6 h-6 text-white transition duration-75 group-hover:text-white"
                            xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
                            <path clip-rule="evenodd" fill-rule="white" fill="white"
                                d="M109-120q-11 0-20-5.5T75-140q-5-9-5.5-19.5T75-180l370-640q6-10 15.5-15t19.5-5q10 0 19.5 5t15.5 15l370 640q6 10 5.5 20.5T885-140q-5 9-14 14.5t-20 5.5H109Zm69-80h604L480-720 178-200Zm302-40q17 0 28.5-11.5T520-280q0-17-11.5-28.5T480-320q-17 0-28.5 11.5T440-280q0 17 11.5 28.5T480-240Zm0-120q17 0 28.5-11.5T520-400v-120q0-17-11.5-28.5T480-560q-17 0-28.5 11.5T440-520v120q0 17 11.5 28.5T480-360Zm0-100Z" />
                        </svg>

                    </div>

                    <div class='flex items-center px-2 py-3'>
                        <div class='mx-3'>
                            <p>{{ $errors->first() }}</p>
                        </div>
                    </div>
                </div>
            @endif
            <div class="w-full bg-white rounded-lg shadow  md:mt-0 sm:max-w-md xl:p-0">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <div class="justify-center align-middle items-center flex">
                        <h1
                            class="text-xl font-bold leading-tight tracking-tight text-textbase md:text-2xl">
                            Selamat datang admin 👋
                        </h1>
                    </div>
                    <form class="space-y-4 md:space-y-6" action="/partner/login" method="POST">
                        @csrf
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-textbase">Email
                                anda</label>
                            <input type="email" name="email" id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-400 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 -gray-600"
                                placeholder="pengguna@gmail.com" required="">
                        </div>
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-textbase">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••" required=""
                                class="bg-gray-50 border border-gray-300 text-gray-400 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 -gray-600">
                        </div>
                        @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="flex items-center justify-between">
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="remember" aria-describedby="remember" type="checkbox"
                                        class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 -gray-600"
                                        required="">
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="remember" class="text-textbase">Ingat saya</label>
                                </div>
                            </div>
                            {{-- <a href="#" class="text-sm font-medium text-primarybase hover:underline">Forgot
                                password?</a> --}}
                        </div>
                        <button type="submit"
                            class="w-full text-white bg-primarybase hover:bg-primarybase focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Masuk</button>
                        {{-- <p class="text-sm font-light text-gray-500">
                            Don't have an account yet? <a href="#"
                                class="font-medium text-primarybase hover:underline">Sign up</a>
                        </p> --}}
                    </form>
                </div>
            </div>
        </div>
    </section>

</body>

</html>
