<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Employee\App\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Lightit\Backoffice\Users\Domain\Actions\StoreEmployeeAction;

class StoreEmployeeController
{
    public function __invoke(Request $request, StoreEmployeeAction $storeEmployeeAction) 
    {
        
    }
}
