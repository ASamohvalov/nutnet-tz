<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ApiClientService
{
    private const BASE_URL = "https://api.deezer.com/search/album";
    private $response = null;

    public function __construct(
        private string $artist,
        private string $album
    ) {}

    public function isAlbumExists(): bool
    {
        if ($this->response == null) $this->sendRequest();

        return $this->response["total"] > 0;
    }

    public function getImagePath(): string
    {
        return $this->response["data"][0]["cover_big"];
    }

    private function sendRequest()
    {
        $this->response = Http::get(self::BASE_URL, [
            "q" => "artist:\"$this->artist\"album:\"$this->album\"",
        ]);
        Log::info("Response data -> ", $this->response->json());
    }
}
