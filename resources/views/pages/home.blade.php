@extends("layouts.app")

@section("title", "Album list")

@section("main")

@if (session("message"))
<div class="alert alert-success text-center">
    {{ session("message") }}
</div>
@endif

<p class="fs-4">Список пластинок</p>

<div class="row justify-content-center">
    @foreach($albums as $album)
    <div class="col-auto mb-3">
        <div class="bg-light border shadow" style="width: 18rem;">
            <img height="200px" src={{ $album->image_url }} class="card-img-top" alt="...">
            <div class="p-3">
                <h5 class="card-title fw-bold mb-3">{{ $album->artist }} - {{ $album->name }}</h5>
                <p class="card-text">{{ $album->description }}</p>
                @auth
                <div class="end-50 d-flex justify-content-end">
                    <form action={{ route("delete_album", $album->id) }} method="post">
                        @csrf
                        <button class="btn btn-light mx-1" type="submit">
                            <i class="bi bi-trash3-fill"></i>
                        </button>
                    </form>
                    <button class="btn btn-light">
                        <i class="bi bi-pencil-fill"></i>
                    </button>
                </div>
                @endauth
            </div>
        </div>
    </div>
    @endforeach
</div>

{{ $albums->links() }}

@endsection
