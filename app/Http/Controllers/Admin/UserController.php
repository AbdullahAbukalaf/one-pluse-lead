<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUserRequest;
use App\Http\Requests\Admin\UpdateUserRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class UserController extends Controller
{
    protected bool $hasRoleColumn;

    public function __construct()
    {
        $this->hasRoleColumn = Schema::hasColumn((new User())->getTable(), 'role');
    }

    public function index(Request $request): View
    {
        $query = User::query();

        $search = $request->input('q');
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%');
            });
        }

        $users = $query->orderBy('name')->paginate(20)->withQueryString();

        return view('admin.users.index', [
            'users' => $users,
            'search' => $search,
            'hasRole' => $this->hasRoleColumn,
        ]);
    }

    public function create(): View
    {
        return view('admin.users.create', [
            'hasRole' => $this->hasRoleColumn,
        ]);
    }

    public function store(StoreUserRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);

        if (!empty($data['email_verified_at'])) {
            $user->email_verified_at = Carbon::parse($data['email_verified_at']);
        }

        if ($this->hasRoleColumn && array_key_exists('role', $data)) {
            $user->role = $data['role'];
        }

        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
    }

    public function show(User $user): View
    {
        return view('admin.users.show', [
            'user' => $user,
            'hasRole' => $this->hasRoleColumn,
        ]);
    }

    public function edit(User $user): View
    {
        return view('admin.users.edit', [
            'user' => $user,
            'hasRole' => $this->hasRoleColumn,
        ]);
    }

    public function update(UpdateUserRequest $request, User $user): RedirectResponse
    {
        $data = $request->validated();

        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->email_verified_at = $data['email_verified_at']
            ? Carbon::parse($data['email_verified_at'])
            : null;

        if (!empty($data['password'])) {
            $user->password = Hash::make($data['password']);
        }

        if ($this->hasRoleColumn && array_key_exists('role', $data)) {
            $user->role = $data['role'];
        }

        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user): RedirectResponse
    {
        if (Auth::id() === $user->id) {
            return redirect()
                ->route('admin.users.index')
                ->with('error', 'You cannot delete your own account.');
        }

        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }
}
