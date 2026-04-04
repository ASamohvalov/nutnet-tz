<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlbumAddRequest;
use App\Models\Album;
use App\Services\ApiClientService;
use Illuminate\Support\Facades\Log;

class AlbumController extends Controller
{
    public function getEditPage()
    {
        return view("pages.edit");
    }

    public function getAlbumListPage()
    {
        $albums = Album::orderBy("created_at", "desc")->paginate(8);
        return view("pages.home", [
            "albums" => $albums,
        ]);
    }

    public function addAlbum(AlbumAddRequest $request)
    {
        $data = $request->validated();

        if (Album::where("name", $data["name"])->exists()) {
            return redirect()->back()->withErrors([
                "error" => "данный альбом уже добавлен"
            ]);
        }

        $service = new ApiClientService($data["artist"], $data["name"]);

        if (!$service->isAlbumExists()) {
            return redirect()->back()->withErrors([
                "error" => "данный альбом не найден"
            ]);
        }

        $imagePath = $service->getImagePath();

        Album::create([
            "name" => $data["name"],
            "artist" => $data["artist"],
            "description" => $data["description"],
            "image_url" => $imagePath,
        ]);

        Log::info("New album added");

        return redirect()->back()
            ->with([
                "message" => "альбом успешно добавлен",
                "imageUrl" => $imagePath,
            ]);
    }

    public function deleteAlbum($id)
    {
        $album = Album::find($id);
        $album->delete();

        Log::info("Album deleted, with id - $album->id");

        return redirect()->back()
            ->with([
                "message" => "альбом удален",
            ]);
    }
}
