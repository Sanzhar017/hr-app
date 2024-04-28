<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FallbackController extends Controller
{
  public function handle()
  {
    return view('content.pages.pages-misc-error');
  }
}
