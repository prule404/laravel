<?php

namespace Modules\Admins\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class AdminsController extends Controller
{
    public function index(): View
    {
        return view('admins::admin.index');
    }

    public function create(): View
    {
        return view('admins::create');
    }

    public function show($id)
    {
        return view('admins::show');
    }

    public function edit($id): View
    {
        return view('admins::edit');
    }
}
