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

        $validSections = [
            'account-content'     => 'account',
            'transaction-content' => 'transaction',
        ];

        if (!array_key_exists($section, $validSections)) {
            abort(404);
        }

        return view("admin.sections." . $validSections[$section]);
    }

    public function loadManagerSection(Request $request)
    {
        $section = $request->input('section');

        $validSections = [
            'categories-content' => 'categories',
            'orders-content'     => 'orders',
            'procedures-content' => 'procedures',
            'returns-content'    => 'returns',
        ];

        if (!array_key_exists($section, $validSections)) {
            abort(404);
        }

        return view("manager.sections." . $validSections[$section]);
    }
}
