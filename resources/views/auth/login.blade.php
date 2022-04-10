<x-guest-layout>
    <div class="px-5 py-5 p-lg-0 bg-surface-secondary">
        <div class="d-flex justify-content-center">
            <div class="col-lg-5 col-xl-4 p-12 p-xl-20 position-fixed start-0 top-0 h-screen overflow-y-hidden bg-primary d-none d-lg-flex flex-column">
                <!-- Circle -->
                <div class="w-56 h-56 bg-orange-500 rounded-circle position-absolute bottom-0 end-20 transform translate-y-1/3"></div>
            </div>
            <div class="col-12 col-md-9 col-lg-7 offset-lg-5 border-left-lg min-h-lg-screen d-flex flex-column justify-content-center py-lg-16 px-lg-20 position-relative">
                <div class="row">
                    <div class="col-lg-10 col-md-9 col-xl-6 mx-auto ms-xl-0">
                        <div class="mt-10 mt-lg-5 mb-6 d-flex align-items-center d-lg-block">
                            <a class="d-block" href="#">
                                <img src="/img/assinebem-colorido.svg" class="h-10" alt="...">
                            </a>
                            <h1 class="ls-tight font-bolder h2">
                                Bem vindo!
                            </h1>
                        </div>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-5">
                                <label class="form-label" for="email">E-mail</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-5">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <label class="form-label" for="password">Senha</label>
                                    </div>
                                    <div class="mb-2">
                                        @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}" class="small text-muted">Esqueceu a senha?</a>
                                        @endif
                                    </div>
                                </div>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-5">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        Lembre-me
                                    </label>
                                </div>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary w-full">
                                    Logar
                                </button>
                            </div>
                            <div class="my-6">
                                <small>Não tem conta?</small>
                                <a href="{{ route('register') }}" class="text-warning text-sm font-semibold">Cadastrar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
