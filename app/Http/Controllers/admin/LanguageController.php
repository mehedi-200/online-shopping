<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Language;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Toastr;
use Illuminate\Console\Command;

class LanguageController extends Controller
{
    public function index()
    {
        $data['activeMenu'] = 'language';
        $data['languages'] = Language::orderBy('id', 'desc')->get();
        return view('admin.setting.language.index', $data);
    }
    public function create()
    {
        $data['activeMenu'] = 'language';
        return view('admin.setting.language.create', $data);
    }
    public function store(Request $request)
    {
        $language_directory = resource_path('lang/'.$request->iso_code);
        $language_file = $language_directory.'/app.php';
        $english_lang_path = resource_path('lang/en/app.php');
        $english_contents = require $english_lang_path;

        if (!file_exists($language_directory)){
            mkdir($language_directory, 0777, true);
        }
        $content ="<?php\n\nreturn [\n";
        foreach ($english_contents as $key => $value) {
            $content .= "'$key' =>'$value',\n";
        }
        $content.="];\n";
        if (!file_exists($language_file)){
            file_put_contents($language_file,$content);
        }
        $data = Arr::except($request->all(), ['_token']);
        if($request->image){
            if(!file_exists(public_path('language'))){
                mkdir(public_path('language'), 0777, true);
            }
            $image = $request->image;
            $imageName =str_replace(' ','-',$request->name).time().'.'.$image->getClientOriginalExtension();
            $imageUrl = public_path('language/'.$imageName);
            Image::make($image)->resize(300, 300,function($sharp){
                $sharp->aspectRatio();
            })->save($imageUrl);
            $data['image'] = $imageName;
        }
        $language = Language::create($data);
        activity()->performedOn($language)->log('User '.Auth()->user()->name. ' created  '.'[ '.$request->language .' ]'.' Language');
        Toastr::success('Language has been added successfully .', '', ['closeButton' => true, 'progressBar' => true]);
        return back();
    }

    public function edit($id)
    {
        $data['activeMenu'] = 'language';
        $data['language'] = Language::findOrFail($id);
        return view('admin.setting.language.edit', $data);
    }
    public function update(Request $request, $id)
    {
        $data = Arr::except($request->all(), ['_token']);
        if($request->image){
            if(!file_exists(public_path('language'))){
                mkdir(public_path('language'), 0777, true);
            }
            $image = $request->image;
            $imageName =str_replace(' ','-',$request->name).time().'.'.$image->getClientOriginalExtension();
            $imageUrl = public_path('language/'.$imageName);
            Image::make($image)->resize(300, 300,function($sharp){
                $sharp->aspectRatio();
            })->save($imageUrl);
            $data['image'] = $imageName;
        }

        $language = Language::findOrFail($id);
        if ($request->iso_code)
        {
            $old_path = resource_path('lang/'.$language->iso_code);
            $new_path = resource_path('lang/'.$request->iso_code);
            if(File::exists($old_path)){
                rename($old_path, $new_path);
                \Artisan::call('cache:clear');
                \Artisan::call('config:clear');
                session()->regenerate();

            }
        }
        $language->update($data);
        activity()->performedOn($language)->log('User '.Auth()->user()->name. ' update  '.'[ '.$request->language .' ]'.' Language');
        Toastr::success('Language has been updated successfully .', '', ['closeButton' => true, 'progressBar' => true]);
        return redirect()->route('language.index');

    }
    public function delete($id)
    {
        $language = Language::findOrFail($id);
        $path = resource_path('lang/'.$language->iso_code);
        $language_file = $path.'/app.php';
        if(File::exists($language_file)){
            File::delete($language_file);
        }
        if(File::exists($path)){
            File::deleteDirectory($path);
        }
        $language->delete();
        activity()->performedOn($language)->log('User '.Auth()->user()->name. ' delete  '.'[ '.$language->language .' ]'.' Language');
        Toastr::warning('Language has been deleted successfully .', '', ['closeButton' => true, 'progressBar' => true]);
        return back();

    }
    public function translate($id)
    {

        $data['activeMenu'] = 'language';
        $data['language'] = Language::findOrFail($id);
        $files = glob(resource_path('lang/'.$data['language']->iso_code.'/*.php'));
        $data['language_array'] = [];
        foreach($files as $file){
            $name = basename($file, '.php');
            $data['language_array'][$name] = require $file;
        }
        $data['language_array'] = $data['language_array']['app'];
        return view('admin.setting.language.translate', $data);

    }
    public function translated(Request $request ,$id)
    {
        $data = Arr::except($request->all(), ['_token']);
        $language_check = Language::findOrFail($id);
        $file_path = resource_path('lang/'.$language_check->iso_code.'/app.php');
        $content ="<?php\n\nreturn [\n";
        foreach ($data as $key => $value) {
            $content .= "'$key' => '$value',\n";
        }
        $content.="];\n";
        file_put_contents($file_path, $content);
        activity()->performedOn($language_check)->log('User '.Auth()->user()->name. ' translated  '.'[ '.$language_check->language .' ]'.' Language');
        Toastr::success('Language has been translated successfully .', '', ['closeButton' => true, 'progressBar' => true]);
        return back();



    }
    public function switchLanguage($ln)
    {
        $this->updateEnv([
            'APP_LOCALE' => $ln,
            'APP_FALLBACK_LOCALE' => $ln,
        ]);
        Artisan::call('optimize:clear');
        return redirect()->back();
    }
    private function updateEnv(array $data)
    {
        $path = base_path('.env');

        if (!File::exists($path)) {
            return false;
        }

        $env = File::get($path);

        foreach ($data as $key => $value) {
            $escaped = preg_quote("{$key}=", '/');
            $pattern = "/^{$escaped}.*/m";

            if (preg_match($pattern, $env)) {
                $env = preg_replace($pattern, "{$key}=\"{$value}\"", $env);
            } else {
                $env .= "\n{$key}=\"{$value}\"";
            }
        }

        File::put($path, $env);
        return true;
    }

    public function testLanguage($locale)
    {
        // .env ফাইল কোথায় আছে সেটা জানাই
        $envPath = base_path('.env');

        // .env ফাইল থেকে সব লেখা পড়ে ফেলি
        $envContent = File::get($envPath);

        // যদি APP_LOCALE আগে থাকে, তাহলে সেটা নতুন ভ্যালু দিয়ে বদলাই
        if (strpos($envContent, 'APP_LOCALE=') !== false) {
            $envContent = preg_replace('/APP_LOCALE=.*/', 'APP_LOCALE=' . $locale, $envContent);
        } else {
            // না থাকলে নতুন লাইন হিসেবে যোগ করি
            $envContent .= "\nAPP_LOCALE=" . $locale;
        }

        // ফাইলটায় নতুন লেখা বসিয়ে দেই
        File::put($envPath, $envContent);

        // Laravel কে বলি নতুন config ব্যবহার করতে
        Artisan::call('config:clear');
        Artisan::call('config:cache');

        return back();
    } //test from chatgpt
}
