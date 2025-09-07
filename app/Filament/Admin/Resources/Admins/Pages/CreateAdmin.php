<?php

namespace App\Filament\Admin\Resources\Admins\Pages;

use App\Filament\Admin\Resources\Admins\AdminResource;
use Filament\Resources\Pages\CreateRecord;

class CreateAdmin extends CreateRecord
{
    protected static string $resource = AdminResource::class;
}
