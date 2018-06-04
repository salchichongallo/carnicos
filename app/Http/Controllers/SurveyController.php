<?php

namespace App\Http\Controllers;

use Meat\User;
use Itm\Http\Request;
use Meat\Store\Customer;
use Itm\Session\Session;
use Meat\Commands\MarkSurvey;
use Meat\Repositories\StoreRepository;
use Meat\Repositories\ProductRepository;
use Meat\Repositories\CustomerRepository;

class SurveyController extends Controller
{
    public function __construct()
    {
        $this->middleware('loggedin');
        $this->middleware('role:customer');
    }

    protected function customer(): Customer
    {
        $user = app(User::class);

        return app(CustomerRepository::class)->findByUser($user);
    }

    public function showStep1()
    {
        $customer = $this->customer();

        if ($customer->surveyMade()) {
            return view('survey.survey_made');
        }

        return view('survey.step1', compact('customer'));
    }

    public function step1(Request $request)
    {
        if ($request->get('question', 'no') === 'no') {
            return view('survey.step8');
        }

        $products = app(ProductRepository::class)->all();

        return view('survey.step2', compact('products'));
    }

    public function step2()
    {
        return view('survey.step3');
    }

    public function step3()
    {
        return view('survey.step4');
    }

    public function step4()
    {
        return view('survey.step5');
    }

    public function step5(StoreRepository $repository)
    {
        $stores = $repository->all();

        return view('survey.step6', compact('stores'));
    }

    public function step6(Request $request)
    {
        return view('survey.step7');
    }

    public function step7()
    {
        return view('survey.step8');
    }

    public function finishSurvey()
    {
        $customer = $this->customer();

        dispatch(new MarkSurvey(
            $this->customer()
        ));

        return view('survey.thanks');
    }
}
