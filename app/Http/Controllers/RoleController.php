<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function admin()
    {
        return view('roles.admin');
    }

    public function manager()
    {
        return view('roles.manager');
    }

    public function loadAdminSection(Request $request)
    {
        $section = $request->input('section');
        $validSections = ['account-content', 'transaction-content'];

        if (!in_array($section, $validSections)) {
            abort(404);
        }

        return view("admin.sections.".str_replace('-content', '', $section));
    }

    public function loadManagerSection(Request $request)
    {
        $section = $request->input('section');
        $validSections = ['categories-content', 'orders-content', 'procedures-content', 'returns-content'];

        if (!in_array($section, $validSections)) {
            abort(404);
        }

        return view("manager.sections.".str_replace('-content', '', $section));
    }
}
