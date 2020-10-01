<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Gate;

class HomeController extends Controller
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
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('profile.edit');
    }

        /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function panelAdmin()
    {
        Gate::authorize('haveaccess','dashboard.index');
        return view('dashboard');
    }
}
