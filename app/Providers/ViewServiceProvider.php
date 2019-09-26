<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Using Closure based composers...
        $menu = [
            ['name'=>'Dashboard',
            'url'=>'/dashboard',
            'icon'=>'home'],
            ['name'=>'Books',
            'icon'=>'book',
            'menus'=> [
                ['name'=>'Books',
                'url'=>'/books',
                'icon'=>'account_circle'],
                ['name'=>'Book Categories',
                'url'=>'/categories',
                'icon'=>'account_circle'],
                ['name'=>'Book Author',
                'url'=>'/authors',
                'icon'=>'account_circle'],
                ['name'=>'Book Publisher',
                'url'=>'/publishers',
                'icon'=>'account_circle']
                ]
            ],
            ['name'=>'Member',
            'url'=>'/members',
            'icon'=>'account_circle'],
            ['name'=>'Borrowed books',
            'url'=>'/borrowed_books',
            'icon'=>'book']
        ];
        View::share('foo', json_encode($menu));
    }
}
