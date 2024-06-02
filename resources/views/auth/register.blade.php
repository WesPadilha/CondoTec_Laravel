<x-guest-layout>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background-color: #ffffff; 
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); 
            padding: 40px;
            width: 400px;
        }

        .form-container form {
            margin-top: 20px;
        }

        .form-container h2 {
            text-align: center;
            color: #333333; 
            margin-bottom: 20px;
        }

        .form-container label {
            font-weight: bold;
            color: #333333; 
        }

        .form-container input[type="text"],
        .form-container input[type="email"],
        .form-container input[type="password"] {
            width: 100%;
            padding: 12px;
            margin-top: 6px;
            margin-bottom: 16px;
            border: 1px solid #cccccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-container input[type="text"]:focus,
        .form-container input[type="email"]:focus,
        .form-container input[type="password"]:focus {
            outline: none;
            border-color: #4caf50; 
        }

        .form-container .login-link {
            display: block;
            text-align: center;
            margin-top: 16px;
            color: #333333; 
            text-decoration: none;
        }

        .form-container .login-link:hover {
            text-decoration: underline; 
        }

        .form-container .submit-button {
            display: block;
            width: 100%;
            background-color: #4caf50; 
            color: #ffffff; 
            border: none;
            border-radius: 4px;
            padding: 14px 20px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .form-container .submit-button:hover {
            background-color: #45a049; 
        }
    </style>

    <div class="container">
        <div class="form-container">
            <h2>{{ __('Registrar') }}</h2>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div>
                    <label for="name">{{ __('Nome') }}</label>
                    <input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <label for="email">{{ __('Email') }}</label>
                    <input id="email" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <label for="password">{{ __('Senha') }}</label>
                    <input id="password" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <label for="password_confirmation">{{ __('Confirmar senha') }}</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" />
                </div>

                <div class="mt-4">
                    <a href="{{ route('login') }}" class="login-link">{{ __('Já possui cadastro?') }}</a>

                    <button type="submit" class="submit-button">{{ __('Registrar') }}</button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
