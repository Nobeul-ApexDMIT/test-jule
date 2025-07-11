<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\Menu;
use App\Models\Page;

class MenuBuilderController extends Controller
{
  public function index(Request $request)
  {
    $lang = Language::where('code', $request->language)->firstOrFail();
    $langs = Language::all();

    $data['langs'] = $langs;
    $data['language'] = $lang;
    $data['lang_id'] = $lang->id;

    // set language
    app()->setLocale($lang->code);

    // get page names of selected language
    $pages = Page::join('page_contents', 'pages.id', '=', 'page_contents.page_id')
      ->where('language_id', $lang->id)
      ->get();

    $data["pages"] = $pages;

    // get previous menus
    $menu = Menu::where('language_id', $lang->id)->first();

    $data['prevMenu'] = '';

    if (!empty($menu)) {
      $data['prevMenu'] = $menu->menus;
    }

    return view('backend.menu_builder.index', $data);
  }

  public function update(Request $request)
  {
    $menus = json_decode($request->str, true);

    Menu::where('language_id', $request->language_id)->delete();

    $menu = new Menu;
    $menu->language_id = $request->language_id;
    $menu->menus = json_encode($menus);
    $menu->save();

    return response()->json(['status' => 'success', 'message' => 'Menu updated successfully!']);
  }
}
