<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Manager;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ManagersController extends Controller
{

    public function __construct()
    {
        // Read permission
        $this->middleware(['permission:managers-read'])->only('index');
        // Create permission
        $this->middleware(['permission:managers-create'])->only('create', 'store');
        // Update permission
        $this->middleware(['permission:managers-update'])->only('edit', 'update');
        // Delete permission
        $this->middleware(['permission:managers-delete'])->only('destroy');
    }

    public function index(Request $request)
    {
//        $managers = Manager::whereRoleIs('admin')->where(function ($query) use ($request){
//
//        });

        $query = $request->search;

        if ( $request->search ) {

            $managers = Manager::whereNotIn('id', Auth::user())
                -> whereRoleIs('admin')
                -> where('first_name', 'LIKE', '%' . $query . '%')
                -> orWhere('last_name', 'LIKE', '%' . $query . '%')
                -> paginate(4);

            $pagination = $managers->appends(['search' => $query]);

            return view('dashboard.managers.index', [
                'managers' => $managers,
                'query' => $query
            ]);
        }

        else {
            $managers = Manager::whereNotIn('id', Auth::user())
                -> whereRoleIs('admin')
                -> paginate(4);
        }

        return view('dashboard.managers.index', [
            'managers' => $managers
        ]);

    }


    public function create()
    {
        // Permissions models and maps
        $models = ['managers', 'categories', 'products'];
        $maps = [
            'create' => 'primary',
            'read' => 'success',
            'update' => 'warning',
            'delete' => 'danger',
        ];

        return view('dashboard.managers.create', compact('models', 'maps'));
    }


    public function store(Request $request)
    {
        $rules = [
            'avatar' => 'nullable|image|mimes:jpg,png,jpeg|max:1000',
            'first_name' => 'required|min:2|max:25',
            'last_name' => 'required|min:2|max:25',
            'email' => 'required|unique:managers,email|max:255',
            'password' => 'required|confirmed|min:8|max:100',
        ];

        $request->validate($rules);

        $request_data = $request->except(['password', 'password_confirmation', 'permissions']);
        $request_data['password'] = bcrypt($request->password);

        $manager = Manager::create($request_data);
        $manager->attachRole('admin');

        // Check if permissions not null
        if ( $request->permissions ) {
            $manager->syncPermissions($request->permissions);
        }

        // Send success message with session
        session()->flash('success', __('Data has been added successfully'));

        return redirect()->route('dashboard.managers.index');
    }


    public function show($id)
    {
        //
    }


    public function edit(Manager $manager)
    {
        // Permissions models and maps
        $models = ['managers', 'categories', 'products'];
        $maps = [
            'create' => 'primary',
            'read' => 'success',
            'update' => 'warning',
            'delete' => 'danger',
        ];

        return view('dashboard.managers.edit', compact('manager', 'models', 'maps'));
    }


    public function update(Request $request, Manager $manager)
    {
        $rules = [
            'avatar' => 'nullable|image|mimes:jpg,png,jpeg|max:1000',
            'first_name' => 'required|min:2|max:25',
            'last_name' => 'required|min:2|max:25',
            'email' => 'required|max:255|unique:managers,email,' . $manager->id,
        ];

        $request->validate($rules);

        $request_data = $request->except(['permissions']);

        $manager->update($request_data);

        // Check if permissions not null
        if ( $request->permissions ) {
            $manager->syncPermissions($request->permissions);
        }
        else {
            $manager->detachPermissions($manager->permissions);
        }

        // Send success message with session
        session()->flash('success', __('Data has been updated successfully'));

        return redirect()->route('dashboard.managers.index');
    }


    public function destroy(Manager $manager)
    {
    }
}
