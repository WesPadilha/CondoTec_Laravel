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

        .form-container input[type="email"]:focus,
        .form-container input[type="password"]:focus {
            outline: none;
            border-color: #4caf50; 
        }

        .form-container .register-link {
            display: block;
            text-align: center;
            margin-top: 16px;
            color: #333333; 
            text-decoration: none;
        }

        .form-container .register-link:hover {
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
            <h2>{{ __('Entrar') }}</h2>

            <!-- Session Status -->
            <x-auth-session-status :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <label for="email">{{ __('Email') }}</label>
                    <input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" />
                </div>

                <!-- Password -->
                <div>
                    <label for="password">{{ __('Senha') }}</label>
                    <input id="password" type="password" name="password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" />
                </div>

                <a href="{{ route('register') }}" class="register-link">{{ __('Registrar') }}</a>

                <button type="submit" class="submit-button">
                    {{ __('Entrar') }}
                </button>
            </form>
        </div>
    </div>
</x-guest-layout>
