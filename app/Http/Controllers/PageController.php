<?php

namespace App\Http\Controllers;

use App\Alert;
use App\Category;
use App\PandemicStat;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;

class PageController extends Controller
{
  /**
   * home
   */
  public function index()
  {
    $pandemicStats = null;
    // try {
    //   $client = new Client([
    //     // Base URI is used with relative requests
    //     'base_uri' => env('API_URL'),
    //   ]);
    //   $promise = $client->get('/api/lastpandemicstat');
    //   $body = $promise->getBody();
    //   $stringBody = (string) $body;
    //   $objectBody = json_decode($stringBody);
    //   if ($objectBody) {
    //     $pandemicStats = $objectBody->data;
    //   }
    // } catch (\Throwable $th) {

    // }
    $alerts = Alert::orderBy('created_at', 'desc')->limit(5)->get();
    $preventativeMeasures = Post::where('category_id', 1)->orderBy('order')->orderBy('title')->limit(3)->get();
    $directives = Post::where('category_id', 2)->orderBy('order')->orderBy('title')->limit(1)->get();
    return view('index', compact('alerts', 'preventativeMeasures', 'pandemicStats', 'directives'));
  }


  public function officialMeasure()
  {
    $officialMeasures = Post::where('category_id', 2)->orderBy('order')->orderBy('title')->get();
    return view('official_measure', compact('officialMeasures'));
  }

  public function preventativeMeasures()
  {
    $category = Category::find(1);
    $preventativeMeasures = $category->articles()->orderBy('order')->limit(12)->get();
    return view('preventative_measures', compact('category', 'preventativeMeasures'));
  }


  public function stereotypes()
  {
    $stereotypes = Post::where('category_id', 3)->orderBy('order')->get();
    return view('stereotypes', compact('stereotypes'));
  }

  public function sondage()
  {
    return view('sondage');
  }

  public function aboutCmr()
  {
    return view('about_cmr');
  }
}
