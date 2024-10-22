<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--=============== REMIXICONS ===============-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.css">

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">

    <title>Admin Login/Sign-Up</title>
</head>
<body>
<!--=============== LOGIN IMAGE ===============-->
<svg class="login__blob" viewBox="0 0 566 840" xmlns="http://www.w3.org/2000/svg">
    <mask id="mask0" mask-type="alpha">
        <path d="M342.407 73.6315C388.53 56.4007 394.378 17.3643 391.538
            0H566V840H0C14.5385 834.991 100.266 804.436 77.2046 707.263C49.6393
            591.11 115.306 518.927 176.468 488.873C363.385 397.026 156.98 302.824
            167.945 179.32C173.46 117.209 284.755 95.1699 342.407 73.6315Z"/>
    </mask>

    <g mask="url(#mask0)">
        <path d="M342.407 73.6315C388.53 56.4007 394.378 17.3643 391.538
            0H566V840H0C14.5385 834.991 100.266 804.436 77.2046 707.263C49.6393
            591.11 115.306 518.927 176.468 488.873C363.385 397.026 156.98 302.824
            167.945 179.32C173.46 117.209 284.755 95.1699 342.407 73.6315Z"/>

        <!-- Insert your image (recommended size: 1000 x 1200) -->
        <image class="login__img" href="{{ asset('assets/img/bg-img.jpg') }}"/>
    </g>
</svg>

<!--=============== LOGIN ===============-->
<div class="login container grid" id="loginAccessRegister">
    <!--===== LOGIN ACCESS =====-->
    <div class="login__access">
        <h1 class="login__title">Administrator Login.</h1>

        <div class="login__area">
            <form method="POST" action="{{ route('admin.login') }}" class="login__form">
                @csrf
                <div class="login__content grid">
                    <!-- Email Field -->
                    <div class="login__box">
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required placeholder=" "
                               class="login__input" autofocus autocomplete="username">
                        <label for="email" class="login__label">Email</label>
                        <i class="ri-mail-fill login__icon"></i>
                    </div>

                    <!-- Password Field -->
                    <div class="login__box">
                        <input type="password" id="password" name="password" required placeholder=" "
                               class="login__input" autocomplete="current-password">
                        <label for="password" class="login__label">Password</label>
                        <i class="ri-eye-off-fill login__icon login__password" id="loginPassword"></i>
                    </div>
                </div>
                <!-- Remember Me Checkbox -->
                <div class="form-check">
                    <input id="remember_me" type="checkbox" name="remember"
                           class="form-check-input rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500 login__forgot">
                    <label for="remember_me" class="form-check-label">{{ __('Remember me') }}</label>
                    @if (Route::has('password.request'))
                        <a class="login__forgot" href="{{ route('password.request') }}">Forgot your password?</a>
                    @endif
                </div>
                <!-- Forgot Password Link -->


                <!-- Login Button -->
                <button type="submit" class="login__button">Login</button>
            </form>


            <div class="login__social">
                <p class="login__social-title">Or login with</p>

                <div class="login__social-links">
                    <a href="#" class="login__social-link">
                        <img src=" {{ asset('assets/img/icon-google.svg') }}" alt="image" class="login__social-img">
                    </a>

                    <a href="#" class="login__social-link">
                        <img src=" {{asset('assets/img/icon-facebook.svg')}}" alt="image" class="login__social-img">
                    </a>

                    <a href="#" class="login__social-link">
                        <img src="{{asset('assets/img/icon-apple.svg')}}" alt="image" class="login__social-img">
                    </a>
                </div>
            </div>

            <p class="login__switch">
                Don't have an account?
                <button id="loginButtonRegister">Create Account</button>
            </p>
        </div>
    </div>

    <!--===== LOGIN REGISTER =====-->
    <div class="login__register">
        <h1 class="login__title">Create new Admin account.</h1>

        <div class="login__area">
            <form method="POST" action="{{ route('admin.register') }}" class="login__form">
                @csrf
                <div class="login__content grid">
                    <!-- Names Field -->
                    <div class="login__box">
                        <input type="text" name="name" required placeholder=" " class="login__input name"
                               value="{{ old('names') }}" autofocus>
                        <label for="names" class="login__label">Name</label>
                        <i class="ri-id-card-fill login__icon"></i>
                        <x-input-error :messages="$errors->get('names')" class="mt-2"/>
                    </div>

                    <!-- Email Field -->
                    <div class="login__box">
                        <input type="email" id="emailCreate" name="email" required placeholder=" " class="login__input"
                               value="{{ old('email') }}">
                        <label for="emailCreate" class="login__label">Email</label>
                        <i class="ri-mail-fill login__icon"></i>
                        <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                    </div>

                    <!-- Password Field -->
                    <div class="login__box">
                        <input type="password" id="passwordCreate" name="password" required placeholder=" "
                               class="login__input">
                        <label for="passwordCreate" class="login__label">Password</label>
                        <i class="ri-eye-off-fill login__icon login__password" id="loginPasswordCreate"></i>
                        <x-input-error :messages="$errors->get('password')" class="mt-2"/>
                    </div>

                    <!-- Confirm Password Field -->
                    <div class="login__box">
                        <input type="password" id="passwordCreate" name="password_confirmation" required placeholder=" "
                               class="login__input">
                        <label for="passwordCreate" class="login__label">Confirm Password</label>
                        <i class="ri-eye-off-fill login__icon login__password" id="loginPasswordCreate"></i>
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2"/>
                    </div>
                </div>

                <!-- Create Account Button -->
                <button type="submit" class="login__button">Create account</button>
            </form>


            <p class="login__switch">
                Already have an account?
                <button id="loginButtonAccess">Log In</button>
            </p>
        </div>
    </div>
</div>

<!--=============== MAIN JS ===============-->
<script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>
