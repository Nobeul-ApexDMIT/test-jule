<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\PageContent;
use App\Traits\MiscellaneousTrait;
use Illuminate\Http\Request;

class PageController extends Controller
{
  public function dynamicPage($slug)
  {
    //echo $slug;exit;
    $queryResult['breadcrumbInfo'] = MiscellaneousTrait::getBreadcrumb();

    $language = MiscellaneousTrait::getLanguage();

    $pageId = PageContent::where('slug', $slug)->firstOrFail()->page_id;

    $queryResult['details'] = Page::join('page_contents', 'pages.id', '=', 'page_contents.page_id')
      ->where('page_contents.language_id', $language->id)
      ->where('page_contents.page_id', $pageId)
      ->firstOrFail();

    return view('frontend.custom-page', $queryResult);
  }

  public function test()
  {
    $queryResult['breadcrumbInfo'] = MiscellaneousTrait::getBreadcrumb();

    $language = MiscellaneousTrait::getLanguage();

    $pageId = PageContent::where('slug', 'test')->firstOrFail()->page_id;

    $queryResult['details'] = Page::join('page_contents', 'pages.id', '=', 'page_contents.page_id')
      ->where('page_contents.language_id', $language->id)
      ->where('page_contents.page_id', $pageId)
      ->firstOrFail();

    return view('frontend.test', $queryResult);
  }
  
  public function recreation()
  {
    $queryResult['breadcrumbInfo'] = MiscellaneousTrait::getBreadcrumb();

    $language = MiscellaneousTrait::getLanguage();

    $pageId = PageContent::where('slug', 'recreation')->firstOrFail()->page_id;

    $queryResult['details'] = Page::join('page_contents', 'pages.id', '=', 'page_contents.page_id')
      ->where('page_contents.language_id', $language->id)
      ->where('page_contents.page_id', $pageId)
      ->firstOrFail();
    return view('frontend.recreation', $queryResult);
  }
  public function dining()
  { 
    $queryResult['breadcrumbInfo'] = MiscellaneousTrait::getBreadcrumb();

    $language = MiscellaneousTrait::getLanguage();

    $pageId = PageContent::where('slug', 'dining')->firstOrFail()->page_id;

  
    $queryResult['details'] = Page::join('page_contents', 'pages.id', '=', 'page_contents.page_id')
      ->where('page_contents.language_id', $language->id)
      ->where('page_contents.page_id', $pageId)
      ->firstOrFail();

    return view('frontend.dining',$queryResult);
  }
  public function facilities()
  { 
    $queryResult['breadcrumbInfo'] = MiscellaneousTrait::getBreadcrumb();

    $language = MiscellaneousTrait::getLanguage();

    $pageId = PageContent::where('slug', 'facilities')->firstOrFail()->page_id;

  
    $queryResult['details'] = Page::join('page_contents', 'pages.id', '=', 'page_contents.page_id')
      ->where('page_contents.language_id', $language->id)
      ->where('page_contents.page_id', $pageId)
      ->firstOrFail();

    return view('frontend.facilities',$queryResult);
  }
}
