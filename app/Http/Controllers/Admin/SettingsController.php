<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $settings = [];

        $dbsettings = Setting::get();

        foreach($dbsettings as $dbsetting) {
            $settings [ $dbsetting['name'] ] = $dbsetting['content'];
        }

        return view('admin.settings.index', compact('settings'));
    }

    public function save(Request $request)
    {
        $data = $request->only([
            'title',
            'subtitle',
            'email',
            'bgcolor',
            'textcolor'
        ]);
        $validator = $this->validator($data);

        if($validator->fails()) {
            return redirect()->route('settings.index')->withErrors($validator);
        }
        foreach($data as $item => $value) {
            Setting::where('name',$item)->update([
                'content' => $value
            ]);
        }
        return redirect()->route('settings.index')->with('warning', 'Informações alteradas com sucesso!');
    }


    protected function validator($data)
    {
        return Validator::make($data,[
            'title' => ['string', 'max:100'],
            'subtitle' => ['string', 'max:100'],
            'email' => ['string', 'email'],
            'bgcolor' => ['string', 'regex:/#[A-Z0-9]{6}/i'],
            'textcolor' => ['string', 'regex:/#[A-Z0-9]{6}/i']
        ]);
    }
}
