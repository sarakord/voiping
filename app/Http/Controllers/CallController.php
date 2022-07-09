<?php

namespace App\Http\Controllers;

use App\Models\Call;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CallController extends Controller
{

    public function index()
    {
        return view('admin.calls.index', ['calls' => Call::latest()->with(['contact', 'user'])->get()]);
    }

    public function search()
    {
        return view('admin.calls.search', ['users' => User::all()]);
    }

    public function result($user_id)
    {
        $user = User::find($user_id);
        if (isset($user->id)) {

            $contacts = Call::query()
                ->whereDate('calls.created_at', '>=', now()->subMonths(2)->startOfDay())
                ->join('users', 'users.id', 'calls.dst_user_number')
                ->where('calls.dst_user_number', $user_id)
                ->groupBy('src_contact_number')
                ->havingRaw('count(src_contact_number) >= 2')
                ->get()->pluck('src_contact_number')->toArray();

            $calls = Call::where('dst_user_number', $user_id)
                ->whereDate('calls.created_at', '>=', now()->subMonths(2)->startOfDay())
                ->with('contact')
                ->whereIn('src_contact_number', $contacts)
                ->get();
            if (count($calls)) {
                $result = view('admin.calls.result', ['calls' => $calls])->render();
                return response()->json(['success' => true, 'result' => $result]);
            } else {
                return response()->json(['success' => false, 'message' => 'تماس با مخاطبی بیش از یک بار یافت نشد']);
            }
        }
        return response()->json(['success' => false, 'message' => 'کاربر یافت نشد']);
    }
}
