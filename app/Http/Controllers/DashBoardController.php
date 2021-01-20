<?php

namespace App\Http\Controllers;

use App\Flux;
use App\Flux24PresenceProvince;
use App\Flux24PresenceZone;
use App\Flux24Province;
use App\Flux24Sum;
use App\Flux30Province;
use App\Flux30Zone;
use App\Hospital;
use App\HospitalSituation;
use App\Township;
use App\Http\Resources\HospitalResources;
use App\Http\Resources\HospitalTotauxResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\MyTrait\GClientSheet;
use App\MyTrait\GeoCoding;
use App\Imports\FluxImport;
use App\PandemicStat;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class DashBoardController extends Controller
{
    use GClientSheet, GeoCoding;

    public function __construct()
    {
        $this->middleware('auth:dashboard')->except(['index', 'getFluxProvinces', 'getFluxZone']);
    }

    public function index()
    {
        return redirect(env('API_URL'));
        // return view('diagnosticMaps.dashboard');
    }
}


