<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@7.4.47/css/materialdesignicons.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <!-- Styles -->

        <style>
            body {
                font-family: 'Nunito', sans-serif;
                background-color: #fff;
            }
            .login-image {
                position: relative;
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                transition: background-image 1s ease-in-out;
            }
            .login-image::after{
                content: '';
                background: rgb(42, 123, 170 0.5);
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
            }
            .fade-In{
                transform: translateY(20px);
            }

            .zoom{
                transform: scale(0.2);
            }

            .login-creen{
                opacity: 0;
                translate: opacity 2s ease-in-out,transform 2s ease-in-out;
            }

            .active{
                opacity: 1;
                transform: translateY(0) scale(1);
            }

             .login-image{
                opacity: 0;
                transition: opacity 5s ease-in-out;
            }

            .visibility{
                opacity: 1;
            }

            @media (max-width:640px){
                .form-des {
                    padding-inline: 50px;
                }
            }

            @media (min-width:786px){
                .form-des {
                   padding-inline: 100px;
                }
            }

            @media (min-width:1024px){
                .form-des {
                    width: 50%;
                    padding-inline: 8rem;
                }
                .text-box h1{
                  position: absolute;
                    bottom: 20vh;
                    left: 15px;
                    font-size: 2.5rem;
                    font-weight: 800;
                    color: #fff;
                }
            }
        </style>
    </head>
    <body class="antialiased">
        <div class=" w-full h-screen flex justify-between gap-2 z-50 login-screen fade-In zoom">
         <div class="w-1/2  mx-auto justify-center flex flex-col form-des">
            <a class="text-lg font-semibold text-gray-800 pt-2 mb-4" href="{{ url('/') }}">
                <svg width="100" height="100" viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <!-- Background Circle -->
                    <circle cx="100" cy="100" r="90" fill="#2C3E50" stroke="#3498DB" stroke-width="10"/>

                    <!-- Document Shape -->
                    <rect x="60" y="50" width="80" height="100" rx="10" fill="white"/>

                    <!-- Checkmark -->
                    <path d="M75 100 L90 120 L125 80" stroke="#2ECC71" stroke-width="8" stroke-linecap="round" stroke-linejoin="round" fill="none"/>

                    <!-- Horizontal Lines inside Document -->
                    <line x1="70" y1="70" x2="130" y2="70" stroke="#BDC3C7" stroke-width="4"/>
                    <line x1="70" y1="85" x2="130" y2="85" stroke="#BDC3C7" stroke-width="4"/>
                    <line x1="70" y1="125" x2="130" y2="125" stroke="#BDC3C7" stroke-width="4"/>
                </svg>
            </a>
            <h2 class="text-3xl text-gray-950 text-start font-extrabold mb-2">Welcome Back</h2>
            <h5 class="text-sm text-gray-600 font-bold text-start mb-1">Enter your credentials to access your tasks</h5>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3 relative">
                    <label for="email" class="block text-gray-950 text-sm font-bold mb-2">Email</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="example@mail.com">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <span class="mdi mdi-email absolute right-6 bottom-1 cursor-pointer"></span>
                </div>
                <div class="mb-3 relative">
                    <div class="flex justify-between">
                        <label for="password" class="block text-gray-950 text-sm font-bold mb-2">Password</label>
                        <a href="{{ route('password.request') }}" class="text-blue-500 hover:text-blue-700 text-sm">Forgot Password?</a>
                    </div>
                    <input id="password" type="password" placeholder="............." class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <span class="mdi mdi-eye-off absolute right-6 bottom-1 cursor-pointer"></span>
                </div>
                <div class="mb-3">
                    <button type="submit" class="bg-blue-500 w-full hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Sign in
                    </button>
                </div>
                <div class="mb-6">
                    <a href="{{ url('/') }}" class="text-blue-500 hover:text-blue-700">Not have an account? Sign Up</a>
                </div>
            </form>
         </div>
         <div class="flex flex-col w-1/2 h-full rounded-l-xl login-image">
            <div class=" max-w-3xl px-4 left-5 z-50 text-box">
             <h1 class="text-3xl text-balance font-extrabold absolute bottom-24 left-5 text-white">Boost Your Productivity</h1>
              <p class="text-ms text-start mt-2 font-bold text-pretty text-white absolute bottom-10 left-5">
                 Our task management system helps you organize, prioritize,
                 and complete your work efficiently. Stay on top of deadlines
                 and collaborate seamlessly with your team.
             </p>
            </div>
          </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function(){
                document.querySelector('.login-image').classList.add('visibility');
                document.querySelector('.login-screen').classList.add('active');
            });


            const images = [
                "{{ asset('images/task-mgr.jpg') }}",
                "{{ asset('images/handshake_time.jpg') }}",
                "{{ asset('images/todo-image.jpg') }}"
            ];

            let slideShowDiv = document.querySelector('.login-image');
            let currentIndex = 0;

            function startSlideShow() {
                slideShowDiv.style.backgroundImage = `url(${images[currentIndex]})`;
                currentIndex = (currentIndex + 1) % images.length;

                setTimeout(startSlideShow, 8000);
            }

            startSlideShow();

            let passwordInput = document.getElementById('password');
            let passwordIcon = document.querySelector('.mdi-eye-off');

          passwordIcon.addEventListener('click', function(){
              if(passwordInput.type === 'password'){
                  passwordInput.type = 'text';
                  passwordIcon.classList.remove('mdi-eye-off');
                  passwordIcon.classList.add('mdi-eye');
              }else{
                  passwordInput.type = 'password';
                  passwordIcon.classList.remove('mdi-eye');
                  passwordIcon.classList.add('mdi-eye-off');
              }
          });
        </script>
    </body>
</html>
