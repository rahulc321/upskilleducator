<?php

namespace App\Http\Controllers\Admin\Common;

use App\Models\OurSpeaker;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class OurSpeakerController extends Controller
{
    protected $ourSpeaker, $data;

    public function __construct(
        OurSpeaker $ourSpeaker
    )
    {
        $this->ourSpeaker = $ourSpeaker;
        $this->data = [];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['speakers'] = $this->ourSpeaker->orderBy('created_at','DESC')->get();
        return view('admin.our-speakers.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.our-speakers.store');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $speaker = $this->ourSpeaker;
            $speaker->title = $request->title;
            $speaker->description = $request->description;
            if ($request->hasFile('profile_pic')) {
                $path = base_path() . 'storage/app/public/speaker/';
                $image = $request->file('profile_pic');
                $name = 'speaker_' . mt_rand(111111, 999999);
                if (!file_exists($path)) {
                    File::makeDirectory($path, $mode = 0777, true, true);
                }
                $image = $image->storeAs(
                    'speaker/', $name . "." . $image->getClientOriginalExtension(), 'public'
                );
                $speaker->image = $image;
            }
            $speaker->save();

            DB::commit();
            Session::flash('success', __('message.create_speaker'));
            return redirect()->route('our-speaker.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Session::flash('error', __('auth.server_error'));
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['speaker'] = $this->ourSpeaker->where('id', $id)->first();
        return view('admin.our-speakers.update', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            $speaker = $this->ourSpeaker->find($id);
            $speaker->title = $request->title;
            $speaker->description = $request->description;
            if ($request->hasFile('profile_pic')) {
                $path = base_path() . 'storage/app/public/speaker/';
                $image = $request->file('profile_pic');
                $name = 'speaker_' . mt_rand(111111, 999999);
                if (!file_exists($path)) {
                    File::makeDirectory($path, $mode = 0777, true, true);
                }
                $image = $image->storeAs(
                    'speaker/', $name . "." . $image->getClientOriginalExtension(), 'public'
                );
                $speaker->image = $image;
            }
            $speaker->save();

            DB::commit();
            Session::flash('success', __('message.update_speaker'));
            return redirect()->route('our-speaker.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Session::flash('error', __('auth.server_error'));
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
