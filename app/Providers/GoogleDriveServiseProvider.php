<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class GoogleDriveServiseProvider extends ServiceProvider
{
    public function upload()
    {
        return view('upload');
    }

}
