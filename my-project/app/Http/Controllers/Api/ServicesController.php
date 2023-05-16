<?php

namespace App\Http\Controllers\Api;

use App\Actions\ExcelAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function excel(Request $request, ExcelAction $action) {
        try {
            return response()->file(
                $action->create($request->post('data')),
                ['Content-Disposition', 'attachment; filename="result.xlsx"']
            );
        } catch (\Exception $exception) {
            return response()->json(['error' => $exception->getMessage()])->setStatusCode(500);
        }
    }
}
