<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RejectedImages extends Model
{
  use HasFactory;

  protected $table = "rejected_images";

  protected $fillable = [
      'id',
      'user_id',
      'paper_title',
      'publication',
      'language_id',
      'paper_img',
      'paper_img_url',
      'year',
      'month',
      'date',
  ];
}
