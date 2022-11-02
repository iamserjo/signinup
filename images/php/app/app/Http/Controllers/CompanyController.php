<?php

namespace App\Http\Controllers;

use App\Services\CompanyService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        private readonly CompanyService $companyService,
    )
    {
        $this->middleware('auth');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'description' => 'required|max:255',
            'title' => 'required|max:255',
            'phone' => 'required|min:10|max:13',
        ]);

        return $this->companyService->create(
            user: Auth::user(),
            title: $request->get('title'),
            description: $request->get('description'),
            phone: $request->get('phone'),
        );
    }

    public function find(Request $request)
    {
        $this->validate($request, [
            'description' => 'max:255',
            'title' => 'max:255',
            'phone' => 'required|min:10|max:13',
        ]);

        return $this->companyService->findByAttibutes(
            user: Auth::user(),
            title: $request->get('title'),
            phone: $request->get('phone'),
            description: $request->get('description'),
        );
    }
}
