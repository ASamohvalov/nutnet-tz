@extends("layouts.app")

@section("title", "Login")

@section("main")

<div class="mx-auto" style="width: 500px; margin-top: 10%">
    @error("*")
        <div class="alert alert-danger text-center">{{ $message }}</div>
    @enderror

    <div class="bg-light p-5 shadow">
        <div class="fs-4 text-center mb-4">Авторизация</div>
        <form action={{ route("login") }} method="post">
            @csrf
            <input
                class="form-control"
                type="text"
                placeholder="логин"
                name="login"
                required>
            <input
                class="form-control mt-3"
                type="password"
                placeholder="пароль"
                name="password"
                required>
            <div class="text-center">
                <button type="submit" class="btn w-100 btn-dark mt-4">войти</button>
            </div>

        </form>

        <div class="mt-3 text-center">
            Нету аккаунта - <a class="" href={{ route("sign_up_page") }}>Загеристрируйтесь</a>
        </div>
    </div>
</div>
@endsection
