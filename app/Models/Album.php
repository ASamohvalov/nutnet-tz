<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;

#[Table("albums")]
#[Fillable(["name", "description", "artist", "image_url"])]
class Album extends Model
{
}
