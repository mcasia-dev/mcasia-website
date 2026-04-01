<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;
use Illuminate\Support\Facades\Auth;

class FilamentInfoWidget extends \Filament\Widgets\FilamentInfoWidget
{
    public static function canView(): bool
    {
        return Auth::user()?->is_admin;
    }
}
