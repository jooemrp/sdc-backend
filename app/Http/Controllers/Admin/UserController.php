<?php

namespace App\Http\Controllers\Admin;

use App\Exports\UserExport;
use Session;
use App\Models\Role;
use App\Models\User;
use App\Models\Account;
use Illuminate\Http\Request;
use App\Services\RoleService;
use App\Services\UserService;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Models\EventUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\LogActivity;
use App\Models\Subscribe;
use DB;
use Illuminate\Contracts\Validation\Validator;
use Termwind\Components\Dd;
use Excel;

class UserController extends Controller
{

    public function __construct()
    {
        $this->service = new User;
        $this->serviceRole = new Role;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('admin.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        if ($request->avatar_url) {
            $user['avatar_url'] = uploadPhoto($request->file('avatar_url'), 'Image/Avatars');
        }

        $input['password'] = Hash::make($input['password']);
        $user = $this->service->create($input);
        $user = User::find($user->id);

        foreach ($input['role'] as $value) {
            $user->assignRole($value);
        }

        Session::flash('sukses', 'Your work has been saved');

        return redirect(route('admin.user.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        // dd($user->logs);
        return view('admin.user.content.index')->with('user', $user);
    }

    public function orders($id)
    {
        $user = User::find($id);

        return view('admin.user.content.orders')->with('user', $user);
    }

    public function personal($id)
    {
        $user = User::find($id);

        return view('admin.user.content.personal-information')->with('user', $user);
    }

    public function account($id)
    {
        $user = User::find($id);

        return view('admin.user.content.account-information')->with('user', $user);
    }

    public function certificate($id)
    {
        $user = User::find($id);

        return view('admin.user.content.certificate')->with('user', $user);
    }

    public function subscription($id)
    {
        $user = User::find($id);

        return view('admin.user.content.subscriptions')->with('user', $user);
    }

    public function event($id)
    {
        $user = User::find($id);

        return view('admin.user.content.events', compact('user'));
    }

    // personalUpdate
    public function personalUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'min:3|max:255',
            'phone' => 'max:255',
            'address' => 'max:255',
            'city' => 'max:255',
            'country' => 'max:255',
            'postal_code' => 'max:255',
            'province' => 'max:255',
            'birth' => 'max:255',
            'company' => 'max:255',
            'email' => 'max:255',
            'profession' => 'max:255',
            // 'role' => 'required', 
            // 'avatar_url' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
        ]);

        $user = User::find($id);
        $input = $request->all();
        $input['birth'] = date('Y-m-d', strtotime($request->birth));
        // dd($request->all());
        if ($request->avatar_url) {
            $user['avatar_url'] = uploadPhotoPng($request->file('avatar_url'), 'Image/Avatars');
        }

        $user->update($input);

        if (isset($input['role'])) {
            $user->roles()->detach();
            foreach ($input['role'] as $value) {
                $user->assignRole($value);
            }
        }

        Session::flash('sukses', 'Your work has been saved');

        return back();
    }

    public function password($id)
    {
        $user = User::find($id);
        return view('admin.user.content.password')->with('user', $user);
    }

    public function updatePassword(Request $request, $id)
    {
        $request->validate([
            'password' => 'required',
        ]);

        User::find($id)->update(['password' => Hash::make($request->password)]);

        Session::flash('sukses', 'Your work has been saved');
        return redirect()->route('admin.user.password', $id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $data = $this->service->getSingleData($id);
        $data = User::find($id);

        if (empty($data)) {
            Alert::error('Lecturer not found');

            return redirect(route('admin.lecturer.index'));
        }

        return view('admin.user.update')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        // dd($input);

        $status_idi_before = User::find($id)->idi_no_status;

        if ($request->file) {
            $input['avatar_url'] = $request->file->store('avatars', 'public');
        }

        if (isset($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            unset($input["password"]);
        }

        // $user = $this->service->update($input);

        $user = User::find($id);
        $user->update($input);

        // $role = Role::where('model_id', $id)->get();
        // $role = User::find($id)->getRoleNames();
        // dd($user->roles());
        $user->roles()->detach();
        // foreach ($role as $value) {
        //     $value->delete();
        // }

        foreach ($input['role'] as $value) {
            $user->assignRole($value);
        }

        Session::flash('sukses', 'Your work has been saved');
        return redirect(route('admin.user.index'));
    }

    // private function sendMailVerify($to_email = '', $data = [])
    // {
    //     Mail::send('admin.mail.idi-verified', $data, function ($message) use ($to_email) {
    //         $message->to($to_email, '')->subject('Nomor Pokok Anggota diverifikasi');
    //         $message->from('halo@sejawat.co.id', 'Sejawat Indonesia');
    //     });

    //     // return view('admin.mail.idi-verified');
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        // dd($request->all());
        $data = $this->service->destroy($id);
        Session::flash('sukses', 'Your work has been success');
        return redirect(route('admin.user.index'));
    }

    public function table(Request $request)
    {
        if ($request->ajax()) {
            $data = User::query();

            if (!empty($request->profession)) {
                $data->where('profession', $request->profession == '-' ? null : $request->profession);
            }

            if (isset($request->created_at)) {
                $date_range = explode('/', $request->created_at);
                $data->where('created_at', '>=', $date_range['0'] . ' 00:00:00');
                $data->where('created_at', '<=', $date_range['1'] . ' 23:59:59');
            }

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($user) {
                    return '
                        <div class="dropdown dropdown-inline">
                            <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" data-toggle="dropdown">
                                <i class="la la-cog"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                <ul class="nav nav-hoverable flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="' . route('admin.user.show', $user->id) . '">
                                            <i class="nav-icon la la-eye"></i>
                                            <span class="nav-text">Detail</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="' . route('admin.user.edit', $user->id) . '">
                                            <i class="nav-icon la la-edit"></i>
                                            <span class="nav-text">Edit</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <form id="formDelete[' . $user->id . ']" method="POST" action="' . route('admin.user.destroy', $user->id) . '">
                                            <input type="hidden" name="_method" value="DELETE">
                                            ' . csrf_field() . '
                                            <input type="hidden" name="id" value="' . $user->id . '">
                                        </form>
                                        <a class="nav-link deleteButton" onclick="deleteFunction(' . $user->id . ')">
                                            <i class="nav-icon la la-trash"></i>
                                            <span class="nav-text">Delete</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    ';
                })

                ->addColumn('roles', function ($user) {
                    $roles = '';
                    foreach (User::find($user->id)->getRoleNames() as $role) {
                        $roles .= '<span class="label label-outline-info label-inline mr-2 mb-1">' . $role . '</span>';
                    }
                    return $roles;
                })
                ->addColumn('created_at', function ($user) {
                    return $user->created_at;
                })
                // ->addColumn('name', function ($user) {
                //     return '<a href="' . route('admin.user.show', $user->id) . '">' . $user->name . '</a>';
                // })
                ->orderColumn('created_at', function ($query, $order) {
                    $query->orderBy('created_at', $order);
                })
                // ->filterColumn('name', function ($query, $keyword) {
                //     $query->whereRaw("users.name like ?", ["%{$keyword}%"]);
                // })
                // ->orderColumns(['idi_no_status', 'id_no', 'email', 'name', 'log'], '-:column $1')
                // ->orderColumn('log', '-log $1')
                ->rawColumns(['action', 'created_at', 'roles', 'name'])
                ->make(true);
        }
    }

    public function export(Request $request)
    {
        $namafile = "Users " . date('Y-m-d') . ".xlsx";

        // dd('a');

        return Excel::download(new UserExport($request->status, $request->profession, $request->subscription, $request->created_at), $namafile);
    }
}
