<?php

namespace App\Http\Controllers;

use App\Facades\Bale;
use App\Services\Bot\BotService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BaleController extends Controller
{
    public function __invoke(
        Request $request,
        BotService $bot,
    ):JsonResponse
    {
        $bot->handle($request->all());

        return response()->json(['ok'=>true]);

    }
}
