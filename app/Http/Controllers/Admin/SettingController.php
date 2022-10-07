<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SettingController extends Controller
{
    private Setting $setting;

    public function __construct(Setting $setting)
    {
        $this->setting = $setting;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = $this->setting::query()->latest()->paginate(5);
        return view('admin.settings.index', [
            'settings' => $settings
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.settings.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $settingCreate = [
            'config_key' => $request->get('config_key'),
            'config_value' => $request->get('config_value'),
        ];
        $this->setting::query()->create($settingCreate);
        return redirect()->route('settings.create')->with('success', "Successfully Added");

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
        $setting = $this->setting::query()->find($id);
        return view('admin.settings.edit', [
            'setting' => $setting
        ]);
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
        $settingUpdate = [
            'config_key' => $request->get('config_key'),
            'config_value' => $request->get('config_value'),
        ];
        $this->setting::query()->find($id)->update($settingUpdate);
        return redirect()->route('settings.index')->with('success', "Successfully Edited");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        try {
            $this->setting::query()->find($id)->delete();
            return response()->json(['code' => 200, 'message' => "Success"]);
        } catch (Exception $e) {
            return response()->json(['code' => 500, 'message' => "Fail"], 500);
            Log::error("Message: {$e->getMessage()}. Line: {$e->getLine()}");
        }
    }
}
