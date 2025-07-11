<?php

namespace App\Http\Controllers\BackEnd\BasicSettings;

use App\Http\Controllers\Controller;
use App\Models\BasicSettings\SEO;
use App\Models\Language;
use Illuminate\Http\Request;

class SEOController extends Controller
{
  public function seo(Request $request)
  {
    // first, get the language info from db
    $language = Language::where('code', $request->language)->first();
    $langId = $language->id;

    // then, get the seo info of that language from db
    $seo = SEO::where('language_id', $langId);

    if ($seo->count() == 0) {
      // if seo info of that language does not exist then create a new one
      SEO::create($request->except('language_id') + [
        'language_id' => $langId
      ]);
    }

    $information['language'] = $language;

    // then, get the seo info of that language from db
    $information['data'] = $seo->first();

    // get all the languages from db
    $information['langs'] = Language::all();

    return view('backend.basic_settings.seo', $information);
  }

  public function updateSEO(Request $request)
  {
    // first, get the language info from db
    $language = Language::where('code', $request->language)->first();
    $langId = $language->id;

    // then, get the seo info of that language from db
    $seo = SEO::where('language_id', $langId)->first();

    // else update the existing seo info of that language
    $seo->update($request->all());

    session()->flash('success', 'SEO Informations updated successfully!');

    return redirect()->back();
  }
}
