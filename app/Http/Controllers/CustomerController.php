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

        // $customerUrl = 'https://api-sandbox.dwolla.com/customers/6a82d92f-e262-4ff9-bb27-aedc32e7904e';
        // $retryCustomer = $customersApi->updateCustomer(array (
        // 'firstName' => 'Nasir',
        // 'lastName' => 'Uddin',
        // 'email' => 'nasiruddin@nomail.net',
        // 'ipAddress' => '10.10.10.10',
        // 'type' => 'personal',
        // 'address1' => '221 Corrected Address St.',
        // 'address2' => 'Fl 8',
        // 'city' => 'Ridgewood',
        // 'state' => 'NY',
        // 'postalCode' => '11385',
        // 'dateOfBirth' => '1990-07-11',
        // 'ssn' => '202-99-1516',
        // ), $customerUrl);

        // print($retryCustomer->id); # => 6a82d92f-e262-4ff9-bb27-aedc32e7904e

        return view('customer.index');
    }
}
