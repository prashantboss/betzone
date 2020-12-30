<?php

namespace App\Providers;

use DB;
use View;
use App\Models\SiteSetting;
use App\Models\Game;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{

    public function boot()
    {

        $siteSetting = SiteSetting::findOrFail(1);
        /*         * *********************************** */
        $game = Game::get();
        View::share(
                [
                    'siteSetting' => $siteSetting,
                    'game' => $game,
                ]
        );
    }

    public function register()
    {
        //
    }

}
