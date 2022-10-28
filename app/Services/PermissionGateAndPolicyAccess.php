<?php

namespace App\Services;

use Illuminate\Support\Facades\Gate;

class PermissionGateAndPolicyAccess
{
    public function setGateAndPolicy()
    {
        $this->defineGateUser();
        $this->defineGateRole();
    }

    public function defineGateUser()
    {
        Gate::define('list_user', 'App\Policies\UserPolicy@view');
        Gate::define('create_user', 'App\Policies\UserPolicy@create');
        Gate::define('edit_user', 'App\Policies\UserPolicy@update');
        Gate::define('delete_user', 'App\Policies\UserPolicy@delete');
    }
    public function defineGateRole(){
        Gate::define('list_role', 'App\Policies\RolePolicy@view');
        Gate::define('create_role', 'App\Policies\RolePolicy@create');
        Gate::define('edit_role', 'App\Policies\RolePolicy@update');
        Gate::define('delete_role', 'App\Policies\RolePolicy@delete');
    }
}
