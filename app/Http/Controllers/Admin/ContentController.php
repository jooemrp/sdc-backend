<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Helpers\FileUploader;
use App\Http\Requests\Admin\ContentRequest;
use App\Models\Content;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;


class ContentController extends Controller
{
    /** @var  ContentService */
    public $service;

    /**
     * Construct a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->service = new Content;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.content.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.content.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContentRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = auth()->user()->id;

        $content = $this->service->create($data);

        if (!is_null($request->file('file'))) {
            FileUploader::upload($content, 'Content_thumbnail', 'file', 'store');
        }

        if (!is_null($request->file('content'))) {
            FileUploader::upload($content, 'Content', 'content', 'store');
        }

        session()->flash('sukses', trans('admin.message.success'));

        return redirect(route('admin.content.index', ['type' => $data['type']]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $data = $this->service->find($slug);

        return view('admin.content.index', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $data = $this->service->find($slug);

        if (empty($data)) {
            session()->flash('error', trans('admin.message.error'));

            return redirect(route('admin.content.index'));
        }

        return view('admin.content.update')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function update(ContentRequest $request, $id)
    {
        $data = $request->all();
        $data['user_id'] = auth()->user()->id;

        $model = $this->service->find($id);
        if (!is_null($request->file('file'))) {
            FileUploader::upload($model, 'Content_thumbnail', 'file', 'update');
        }

        if (!is_null($request->file('content'))) {
            FileUploader::upload($model, 'Content', 'content', 'update');
        }

        $content = $model->update($data);

        session()->flash('sukses', trans('admin.message.success'));
        return redirect(route('admin.content.index', ['type' => $data['type']]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = $this->service->destroy($id);

        session()->flash('sukses', trans('admin.message.success'));

        return redirect(route('admin.content.index'));
    }

    public function table(Request $request)
    {
        if ($request->ajax()) {

            $data = Content::query();

            if (isset($request->type)) {
                $data->where('type', $request->type);
            }

            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('title', function ($content) {
                    return $content->title . " " . ($content->featured_at ?
                        '<a href="' . route('admin.content.selected.update', $content->id) . '"><i class="fa fa-star text-warning feature-star"></i></a>' :
                        '<a href="' . route('admin.content.selected.update', $content->id) . '"><i class="fa fa-star text-muted feature-star"></i></a>');
                })
                ->editColumn('created_at', function ($content) {
                    return $content->created_at;
                })
                ->editColumn('featured_at', function ($content) {
                    return $content->featured_at;
                })
                // ->editColumn('language', function ($user) {
                //     return config()->get('languages')[$user->language];
                // })
                ->editColumn('featured_at', function ($user) {
                    return $user->featured_at;
                })
                ->editColumn('status', function ($content) {
                    if ($content->status == '1')
                        return 'Published';
                    elseif ($content->status == '0')
                        return 'Draft';
                })
                ->editColumn('comment_status', function ($content) {
                    if ($content->comment_status == '1')
                        return 'Enabled';
                    elseif ($content->comment_status == '0')
                        return 'Disabled';
                })
                ->addColumn('action', function ($content) {

                    return '
                        <div class="dropdown dropdown-inline">
                            <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" data-toggle="dropdown">
                                <i class="la la-cog"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                <ul class="nav nav-hoverable flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="' . route('admin.content.show', $content->slug) . '">
                                            <i class="nav-icon la la-eye"></i>
                                            <span class="nav-text">' . trans('admin.crud.read') . '</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="' . route('admin.content.edit', $content->id) . '">
                                            <i class="nav-icon la la-edit"></i>
                                            <span class="nav-text">' . trans('admin.crud.update') . '</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <form id="formDelete[' . $content->id . ']" method="POST" action="' . route('admin.content.destroy', $content->id) . '">
                                        ' . csrf_field() . '
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="id" value="' . $content->id . '">
                                        </form>
                                        <a class="nav-link deleteButton" onclick="deleteFunction(' . $content->id . ')">
                                            <i class="nav-icon la la-trash"></i>
                                            <span class="nav-text">Delete</span>
                                        </a>

                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="' . route('admin.content.selected.update', $content->id) . '">
                                            <i class="nav-icon la la-star"></i>
                                            <span class="nav-text">' . ($content->featured_at ? "Delete" : "Add") . ' Featured</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    ';
                })
                // ->orderColumn('created_at', function ($query, $order) {
                //     $query->orderBy('created_at', $order);
                // })
                // ->orderColumns(['status', 'comment_status'], '-:column $1')
                ->rawColumns(['action', 'status', 'comment_status', 'created_at', 'title'])
                ->make(true);
        }
    }

    public function selectedUpdate($id)
    {
        $data = Content::find($id);
        $data->featured_at = $data->featured_at ? null : date('Y-m-d H:i:s');
        $data->save();

        session()->flash('sukses', "Success " . ($data->featured_at ? "add" : "delete") . " featured content");
        return back();
    }
}
