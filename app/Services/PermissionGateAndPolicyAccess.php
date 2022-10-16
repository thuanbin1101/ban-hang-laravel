<?php

namespace App\Services;

use Illuminate\Support\Facades\Gate;

class PermissionGateAndPolicyAccess
{
    public function setGateAndPolicy()
    {
        $this->defineGateUser();
    }

    public function defineGateUser()
    {
        Gate::define('list_user', 'App\Policies\UserPolicy@view');
        Gate::define('create_user', 'App\Policies\UserPolicy@create');
        Gate::define('edit_user', 'App\Policies\UserPolicy@update');
        Gate::define('delete_user', 'App\Policies\UserPolicy@delete');
    }
}
