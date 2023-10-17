        {{-- <!-- Session Status -->
        @if ($status ?? '')
        <div {{ $attributes->merge(['class' => 'font-medium text-sm text-green-600']) }}>
            {{ $status ?? '' }}
        </div>
        @endif --}}

        <!-- Validation Errors -->
        @extends('base')
        @section('obsah')

        <x-auth-errors class="alert alert-info" :errors="$errors" />
        <br>
        <br>
        <div class="logBody"> 
            <div class="row justify-content-center">
                <div class="col-xl-10 col-lg-12 col-md-9">
                    <div class="logWidth card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class=" mx-auto">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Registrácia nového uživateľa.</h1>
                                        </div>
                                        <form role="form"  method="POST" action="{{ route('register') }}">
                                            @csrf     
                                            <fieldset>
                                                <div class="form-group">
                                                    <input class="form-control" placeholder="Meno" name="name" type="name" required autofocus >
                                                </div>
                                                <div class="form-group">
                                                    <input class="form-control" placeholder="E-mail" name="email" type="email" :value="old('email')" required autofocus >
                                                </div>
                                                <div class="form-group">
                                                    <input class="form-control" placeholder="Heslo" name="password" type="password" value="" required autocomplete="current-password">
                                                </div>
                                                <div class="form-group">
                                                    <input class="form-control" placeholder="ReHeslo" name="password_confirmation" type="password" value="" required autocomplete="current-password">
                                                </div>
                                                {{-- <div class="form-group">
                                                    <input class="form-control" placeholder="Password" name="password" type="password" value="" required autocomplete="current-password">
                                                </div> --}}

                                                {{-- <div class="checkbox">
                                                    <label for="remember_me">
                                                        <input id="remember_me" type="checkbox" name="remember">
                                                        <span>{{ __('Remember me') }}</span>
                                                    </label>
                                                </div> --}}
                                                {{-- @if (Route::has('password.request'))
                                                <a class="underline text text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                                    {{ __('Forgot your password?') }}
                                                </a>
                                                @endif --}}
                                                <button class="btn btn-primary btn-user btn-block">
                                                    Registruj
                                                </button>
                                            </fieldset>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection