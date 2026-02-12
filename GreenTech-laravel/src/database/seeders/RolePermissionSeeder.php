<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Route;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $routes = Route::getRoutes();

        $routesNotpermeted = ['auth.login', 'user.login', 'user.logout'];
        foreach ($routes as $route) {
            if ($route->getName()) {
                if (in_array($route->getName(), $routesNotpermeted)) {
                    continue;
                }
                Permission::create(['name' => $route->getName()]);
            }
        }
    }
}
