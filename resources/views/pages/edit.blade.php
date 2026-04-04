@extends("layouts.app")

@section("title", "Edit")

@section("main")
<div class="container-fluid">
    @error("*")
    <div class="alert alert-danger text-center">{{ $message }}</div>
    @enderror

    @if (session("message"))
    <div class="alert alert-success text-center">
        {{ session("message") }}
    </div>
    @endif

    <div class="fs-4 mb-3">Добавление альбома</div>

    <div class="row">
        <div class="col">
            <form action={{ route("add_album") }} method="post">
                @csrf
                <input
                    class="form-control mb-3"
                    type="text"
                    placeholder="название"
                    name="name"
                    required>
                <input
                    class="form-control mb-3"
                    type="text"
                    placeholder="исполнитель"
                    name="artist"
                    required>
                <textarea
                    class="form-control mb-3"
                    type="text"
                    placeholder="описание"
                    name="description"
                    required></textarea>
                <button class="btn btn-dark" type="submit">Добавить</button>
            </form>
        </div>
        <div class="col text-center">
            @if (session("imageUrl"))
            <img
                class="border border-dark rounded shadow-lg"
                alt="cover"
                src={{ session("imageUrl") }}
                width="200px">
            @endif
        </div>
    </div>
</div>
@endsection
