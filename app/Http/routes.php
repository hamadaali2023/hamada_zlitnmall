<?php

 use Zizaco\Entrust\EntrustRole;


//Entrust::routeNeedsRole('/ssss*', 'Admin', Redirect::to('/AccessDenied'));






Route::filter('Zlitn', function()
{
    // check the current user
    if (!Entrust::can('role-read')) {
        return Redirect::to('AccessDenied');
    }
});




?>