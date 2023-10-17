        {{-- <!-- Session Status -->
        @if ($status ?? '')
        <div {{ $attributes->merge(['class' => 'font-medium text-sm text-green-600']) }}>
            {{ $status ?? '' }}
        </div>
        @endif --}}

        <!-- Validation Errors -->
        <x-auth-errors class="alert alert-info" :errors="$errors" />
        
        <div class="logBody"> 
            <div class="row justify-content-center">
                <div class="col-xl-10 col-lg-12 col-md-9">
                    <div class="logWidth card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class=" col-lg-12 mx-auto">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Prosím prihláste sa!</h1>
                                        </div>
                                        <form role="form" class="user"  method="POST" action="{{ route('login') }}">
                                            @csrf 
                                            <div class="form-group">
                                                <input type="email" name="email" class="form-control form-control-user"
                                                    id="exampleInputEmail" aria-describedby="emailHelp"
                                                    placeholder="Zadaj svoj Email...">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="password" class="form-control form-control-user"
                                                    id="exampleInputPassword" placeholder="Heslo">
                                            </div>
                                            <button class="btn btn-primary btn-user btn-block">
                                                {{-- <a href="{{route('login')}}" class="btn btn-primary btn-user btn-block"> --}}
                                                    Login
                                                {{-- </a> --}}
                                            </button>
                                        </form>
                                        <hr>
                                        {{-- <div class="text-center">
                                            <a class="small" href="{{route('register')}}">Create an Account!</a>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>