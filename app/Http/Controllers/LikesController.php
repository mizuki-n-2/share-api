<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LikesController extends Controller
{
    public function post(Request $request)
    {
        $now = Carbon::now();
        $params = [
            "share_id" => $request->share_id,
            "user_id" => $request->user_id,
            "created_at" => $now,
            "updated_at" => $now
        ];
        DB::table('likes')->insert($params);
        return response()->json([
            'message' => 'Like created successfully',
            'data' => $params
        ],200);
    }
    public function delete(Request $request)
    {
        DB::table('likes')->where('share_id',$request->share_id)->where('user_id',$request->user_id)->delete();
        return response()->json([
            'message' => 'Like deleted successfully'
        ],200);
    }
}
