<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Support\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $q = User::query()->with(['buyerProfile','vendorProfile'])->latest();
        $q->when($request->filled('role'),   fn ($x) => $x->where('role', $request->string('role')))
          ->when($request->filled('status'), fn ($x) => $x->where('status', $request->string('status')))
          ->when($request->filled('q'), function ($x) use ($request) {
              $s = '%'.$request->string('q').'%';
              $x->where(fn ($w) => $w->where('name','like',$s)->orWhere('email','like',$s)->orWhere('phone','like',$s));
          });
        return ApiResponse::paginated($q->paginate(25));
    }

    public function show(User $user)
    {
        return ApiResponse::ok($user->load([
            'buyerProfile','vendorProfile.categories','vendorProfile.ports',
            'kycDocuments',
            'activeSubscription.plan',
            'buyerOrders' => fn ($q) => $q->latest()->limit(5),
            'vendorOrders' => fn ($q) => $q->latest()->limit(5),
        ]));
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name'   => ['sometimes','string','max:120'],
            'email'  => ['sometimes','email', Rule::unique('users','email')->ignore($user->id)],
            'phone'  => ['sometimes','nullable','string','max:20', Rule::unique('users','phone')->ignore($user->id)],
            'role'   => ['sometimes', Rule::in(['buyer','vendor','admin'])],
            'status' => ['sometimes', Rule::in(['active','suspended','pending'])],
        ]);
        $user->update($data);
        return ApiResponse::ok($user->fresh());
    }

    public function suspend(User $user)
    {
        $user->update(['status' => 'suspended']);
        return ApiResponse::ok($user);
    }

    public function activate(User $user)
    {
        $user->update(['status' => 'active']);
        return ApiResponse::ok($user);
    }

    public function destroy(Request $request, User $user)
    {
        if ($user->role === 'admin' && $user->id !== $request->user()->id) {
            return ApiResponse::error('Cannot delete another admin.', 422);
        }
        $user->delete();
        return ApiResponse::ok(null, 'Deleted');
    }
}
