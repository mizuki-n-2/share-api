<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentsController extends Controller
{
    public function post(Request $request)
    {
        $now = Carbon::now();
        $params = [
            "share_id" => $request->share_id,
            "user_id" => $request->user_id,
            "content" => $request->content,
            "created_at" => $now,
            "updated_at" => $now
        ];
        DB::table('comments')->insert($params);
        return response()->json([
            'message' => 'Comment created successfully',
            'data' => $params
        ],200);
    }
}
