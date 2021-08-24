<?php 
namespace Daud\Assignment;

use Illuminate\Support\ServiceProvider;


class Assignment extends ServiceProvider
{
    function boot()
    {
        $this->loadRoutesFrom(__DIR__. '/routes/web.php');
        $this->loadViewsFrom(__DIR__. '/views', 'assignment');
    }
    function register()
    {
         
    }
   
}

?>