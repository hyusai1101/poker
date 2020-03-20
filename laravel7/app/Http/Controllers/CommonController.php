<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;

/**
 * このコントローラーを既定のコントローラーとする
 * コントローラー共有処理はここに記載
 * Class CommonController
 * @package App\Http\Controllers
 */
abstract class CommonController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
