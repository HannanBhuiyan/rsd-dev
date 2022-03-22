<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\smsinfo;
use Illuminate\Support\Facades\Cache;

class SettingsApiController extends Controller
{
    public function settingPageView()
    {
        return view('backend.pages.settings.index');
    }


    // sms insert
    public function smsPost(Request $request)
    {

        $count = smsinfo::all()->count();
        if($count < 1){
            $data = new smsinfo();
            $data->sms_id = $request->id;
            $data->sms_secret = $request->secret;
            $path = base_path('.env');
            $old_sms_key = config('app.sms_key');
            $old_sms_secret = config('app.sms_secret');
            if (file_exists($path)) {
                $relpace_key = str_replace('NEXMO_KEY='.$old_sms_key[0], 'NEXMO_KEY='.$request->id, file_get_contents($path));
                file_put_contents($path, $relpace_key);
                $relpace_secret = str_replace('NEXMO_SECRET='.$old_sms_secret[0], 'NEXMO_SECRET='.$request->secret, file_get_contents($path));
                file_put_contents($path, $relpace_secret);
            }
            $data->save();
            return response()->json($data);
        }else {
            return redirect()->back();
        }
    }


    // get sms data
    public function getSMS() {
        $result = smsinfo::latest()->first();
        return response()->json($result);

    }

    public function smsEdit($id)
    {
        $data = smsinfo::findOrFail($id);
        return response()->json($data);
    }


    public function smsUpdate(Request $request, $id)
    {

        $data = smsinfo::findOrFail($id);
        $data->sms_id = $request->id;
        $data->sms_secret = $request->secret;
        $path = base_path('.env');
        $old_sms_key = config('app.sms_key');
        $old_sms_secret = config('app.sms_secret');
        if (file_exists($path)) {
            $relpace_key = str_replace('NEXMO_KEY='.$old_sms_key[0], 'NEXMO_KEY='.$request->id, file_get_contents($path));
            file_put_contents($path, $relpace_key);
            $relpace_secret = str_replace('NEXMO_SECRET='.$old_sms_secret[0], 'NEXMO_SECRET='.$request->secret, file_get_contents($path));
            file_put_contents($path, $relpace_secret);

        }
        $data->save();
        return response()->json($data);
    }
}

