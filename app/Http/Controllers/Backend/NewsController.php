<?php

namespace App\Http\Controllers\Backend;

use App;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ManageBackendRequest;
use App\Models\News;
use App\Repositories\Backend\NewsRepository;

class NewsController extends Controller
{

    protected $newsRepo;

    public function __construct()
    {
        $this->newsRepo = App::make(NewsRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ManageBackendRequest $request)
    {
        return view('backend.news.index', ['data' => $this->newsRepo->get()]);
    }

    public function indexJson(ManageBackendRequest $request)
    {
        return response()->json($this->newsRepo->get(), 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ManageBackendRequest $request)
    {
        return view('backend.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ManageBackendRequest $request)
    {
        $data = $request->only([
            'title',
            'content',
            'author',
            'reference_link',
            'categories'
        ]);
        $data['categories'] = implode(',', $data['categories']);

        $this->newsRepo->create($data);
        return redirect(route('admin.news.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(ManageBackendRequest $request, News $news)
    {
        return view('backend.news.show', ['news' => $news]);
    }

    public function showJson(ManageBackendRequest $request, News $news)
    {
        return response()->json($news, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(ManageBackendRequest $request, News $news)
    {
        return view('backend.news.edit', ['news' => $news]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(ManageBackendRequest $request, News $news)
    {
        $data = $request->only([
            'title',
            'content',
            'author',
            'reference_link',
            'categories'
        ]);
        $data['categories'] = implode(',', $data['categories']);

        $this->newsRepo->updateById($news->id, $data);
        return redirect(route('admin.news.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(ManageBackendRequest $request, News $news)
    {
        
    }
}
