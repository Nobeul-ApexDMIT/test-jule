<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SummernoteController extends Controller
{
  public function upload(Request $request)
  {
    $img = $request->file('image');
    $filename = uniqid() . '.' . $img->getClientOriginalExtension();

    @mkdir(public_path('assets/img/summernote/'), 0775, true);

    $img->move(public_path('assets/img/summernote/'), $filename);

    return asset('assets/img/summernote/' . $filename);
  }

  public function uploadFileManager(Request $request)
  {
    $items = $request->items;
    $allowedExts = array('jpg', 'png', 'jpeg', 'svg');

    foreach ($items as $key => $item) {
      $ext = pathinfo($item, PATHINFO_EXTENSION);

      if (!in_array($ext, $allowedExts)) {
        return response()->json(['status' => 'error', 'message' => "Only png, jpg, jpeg, svg images are allowed"]);
      }
    }

    $urls = [];

    foreach ($items as $key => $item) {
      $ext = pathinfo($item, PATHINFO_EXTENSION);
      $filename = uniqid() . '.' . $ext;

      @mkdir(public_path('assets/img/summernote/'), 0775, true);
      @copy(public_path($item), public_path('assets/img/summernote/') . $filename);

      $urls[] = asset('assets/img/summernote/' . $filename);
    }

    return response()->json(['status' => 'success', 'urls' => $urls]);
  }

  public function remove(Request $request)
  {
    @unlink(public_path('assets/img/summernote/') . $request->image);

    return response()->json(['data' => 'Image removed successfully!'], 200);
  }
}
