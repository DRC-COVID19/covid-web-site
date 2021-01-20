<?php

namespace App\Http\Controllers;

use App\PandemicStat;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class PandemicStatController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $client = new Client([
      // Base URI is used with relative requests
      'base_uri' => env('API_URL'),
    ]);
    $promise = $client->get('/api/pandemicstatsasc');
    $body = $promise->getBody();
    $stringBody = (string) $body;
    return $stringBody;
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\PandemicStat  $pandemicStat
   * @return \Illuminate\Http\Response
   */
  public function show(PandemicStat $pandemicStat)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\PandemicStat  $pandemicStat
   * @return \Illuminate\Http\Response
   */
  public function edit(PandemicStat $pandemicStat)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\PandemicStat  $pandemicStat
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, PandemicStat $pandemicStat)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\PandemicStat  $pandemicStat
   * @return \Illuminate\Http\Response
   */
  public function destroy(PandemicStat $pandemicStat)
  {
    //
  }
}
