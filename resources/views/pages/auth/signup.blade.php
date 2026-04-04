@extends("layouts.app")

@section("title", "Sign up")

@section("main")

<div class="mx-auto" style="width: 500px; margin-top: 10%">
    @error("*")
        <div class="alert alert-danger text-center">{{ $message }}</div>
    @enderror
    <div class="bg-light p-5 shadow">
        <div class="fs-4 text-center mb-4">Регистрация</div>
        <form action={{ route("sign_up") }} method="post">
            @csrf
            <input
                class="form-control"
                type="text"
                placeholder="почта"
                name="login"
                required>
            <input
                class="form-control mt-3"
                type="password"
                placeholder="пароль"
                name="password"
                required>
            <input
                class="form-control mt-3"
                type="password"
                placeholder="повторите пароль"
                name="password_confirm"
                required>
            <div class="text-center">
                <button type="submit" class="btn w-100 btn-dark mt-4">войти</button>
            </div>
        </form>

        <div class="mt-3 text-center">
            Есть аккаунт - <a class="" href={{ route("login_page") }}>Авторизуйтесь</a>
        </div>
    </div>
</div>
@endsection
