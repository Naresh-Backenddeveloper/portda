<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Broadcast;
use App\Models\Notification;
use App\Models\User;
use App\Support\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BroadcastController extends Controller
{
    public function index()
    {
        return ApiResponse::paginated(Broadcast::with('creator:id,name')->latest()->paginate(25));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'    => ['required','string','max:191'],
            'body'     => ['required','string'],
            'audience' => ['required', Rule::in(['all','buyers','vendors','admins'])],
            'filters'  => ['nullable','array'],
        ]);
        $b = Broadcast::create($data + [
            'created_by' => $request->user()->id,
            'status'     => 'draft',
        ]);
        return ApiResponse::created($b);
    }

    public function send(Broadcast $broadcast)
    {
        $userQ = User::query();
        match ($broadcast->audience) {
            'buyers'  => $userQ->where('role','buyer'),
            'vendors' => $userQ->where('role','vendor'),
            'admins'  => $userQ->where('role','admin'),
            default   => null,
        };

        $count = 0;
        $userQ->chunk(200, function ($users) use ($broadcast, &$count) {
            foreach ($users as $user) {
                Notification::create([
                    'user_id' => $user->id,
                    'type'    => 'broadcast',
                    'title'   => $broadcast->title,
                    'body'    => $broadcast->body,
                ]);
                $count++;
            }
        });
        $broadcast->update(['status' => 'sent', 'sent_at' => now()]);
        return ApiResponse::ok(['recipients' => $count]);
    }
}
