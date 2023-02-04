<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
  use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

  protected $account;

  public function __construct()
  {
    $currentAccountId = session('account_id');

    if (!$currentAccountId) return;

    $this->account = Account::find($currentAccountId);
    View::share('site_settings', $this->account);
  }
}
