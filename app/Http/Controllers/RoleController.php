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

    public function loadSection(Request $request, $role)
    {
        $section = $request->input('section');
        $validSections = $this->getValidSections($role);

        if (!array_key_exists($section, $validSections)) {
            abort(404);
        }

        return view($role . '.sections.' . $validSections[$section]);
    }

    private function getValidSections($role)
    {
        $sections = [
            'admin' => [
                'account-content' => 'account',
                'transaction-content' => 'transaction',
            ],
            'manager' => [
                'categories-content' => 'categories',
                'orders-content' => 'orders',
                'procedures-content' => 'procedures',
                'returns-content' => 'returns',
            ],
        ];

        return $sections[$role] ?? [];
    }
}
