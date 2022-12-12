<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DwollaSwagger;

class CustomerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        DwollaSwagger\Configuration::$username = 'rjttGTGBueIue5bmQWTJXGy8ou0jChlbbjh2F9NiwlKBii6Qfq';
        DwollaSwagger\Configuration::$password = 'jk7yJYORje2pE6Yfxjiuq7ZFYk8cRcq9UXhzfVfsNGuoayVgkG';

        // For Sandbox
        $apiClient = new DwollaSwagger\ApiClient("https://api-sandbox.dwolla.com");
        // For production
        // $apiClient = new DwollaSwagger\ApiClient("https://api.dwolla.com");

        $tokensApi = new DwollaSwagger\TokensApi($apiClient);
        $appToken = $tokensApi->token();

        DwollaSwagger\Configuration::$access_token = $appToken->access_token;

        $customersApi = new DwollaSwagger\CustomersApi($apiClient);
        $myCusties = $customersApi->_list(10);

        return view('customer.index');
    }
}
