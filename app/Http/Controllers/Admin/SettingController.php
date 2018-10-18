<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Model\Setting;
use Storage ;


class SettingController extends Controller {

	public function setting() {

		return view('admin.settings', ['title' => trans('admin.settings')]);
	}

	public function setting_save() {
		//return request() ;
		$data = $this->validate(request(), 
			[
				'logo' 						=> validateImage(),
				'icon' 						=> validateImage(),
				'sitename_ar' 				=> '',
				'sitename_en' 				=> '',
				'email' 					=> '',
				'main_lang' 				=> '',
				'description' 				=> '',
				'keywords' 					=> '',
				'status' 					=> '',
				'message_maintenance' 		=> '',
			],[],
			[
				'logo' => 'Logo',
				'icon' => 'Icon',
			]
		);
		//$data = request()->except(['_token', '_method']);
		if (request()->hasFile('logo')) {
			$data['logo'] =up()->upload([
				'file' 			=> 'logo',
				'path' 			=> 'settings',
				'upload_type' 	=> 'single',
				'delete_file' 	=> setting()->logo,
			]);
			
		}
		if (request()->hasFile('icon')) {
			
			$data['icon'] =up()->upload([
				'file' 			=> 'icon',
				'path' 			=> 'settings',
				'upload_type' 	=> 'single',
				'delete_file' 	=> setting()->icon,
			]);
		}
		//return $data ;
		Setting::orderBy('id', 'desc')->update($data);
		session()->flash('Success', trans('admin.updated_record'));
		return redirect(aurl('settings'));
	}
}