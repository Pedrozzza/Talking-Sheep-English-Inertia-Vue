<?php

namespace App\Http\Controllers;

use App\Http\Resources\SettingResource;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Inertia\Inertia;

class SettingController extends Controller
{
    private $settings;

    public function __construct()
    {
        $this->settings = Setting::take(1)->first() ?? new Setting();
    }


    public function create(Request $request)
    {
        return Inertia::render('Settings/Create', [
            'settings' => new SettingResource($this->settings),
        ]);
    }

    public function saveHero(Request $request)
    {
        $request->validate([
            'hero_main_title' => 'required|string',
            'hero_main_subtitle' => 'required|string',
            'hero_main_button_title' => 'required|string',
            'hero_main_card_title' => 'required|string',
            'hero_first_card_title' => 'required|string',
            'hero_first_card_text1' => 'required|string',
            'hero_first_card_text2' => 'required|string',
            'hero_first_card_button' => 'required|string',
            'hero_second_card_title' => 'required|string',
            'hero_second_card_text1' => 'required|string',
            'hero_second_card_text2' => 'required|string',
            'hero_third_card_title' => 'required|string',
            'hero_third_card_text1' => 'required|string',
        ]);

        $data['hero_main_title'] = $request->get('hero_main_title');
        $data['hero_main_subtitle'] = $request->get('hero_main_subtitle');
        $data['hero_main_button_title'] = $request->get('hero_main_button_title');
        $data['hero_main_card_title'] = $request->get('hero_main_card_title');
        $data['hero_first_card_title'] = $request->get('hero_first_card_title');
        $data['hero_first_card_text1'] = $request->get('hero_first_card_text1');
        $data['hero_first_card_text2'] = $request->get('hero_first_card_text2');
        $data['hero_first_card_button'] = $request->get('hero_first_card_button');
        $data['hero_second_card_title'] = $request->get('hero_second_card_title');
        $data['hero_second_card_text1'] = $request->get('hero_second_card_text1');
        $data['hero_second_card_text2'] = $request->get('hero_second_card_text2');
        $data['hero_third_card_title'] = $request->get('hero_third_card_title');
        $data['hero_third_card_text1'] = $request->get('hero_third_card_text1');


        if($request->has('hero_second_card_photo')) {

            $this->settings->deletePreviousImage();

            $imageName = (string) Str::of($request->file('hero_second_card_photo')->getClientOriginalName())
                ->beforeLast('.')
                ->slug()
                ->append('.')
                ->append($request->file('hero_second_card_photo')->getClientOriginalExtension());

            $data['hero_second_card_photo'] = $imageName;

            $request->file('hero_second_card_photo')->storeAs($this->settings->uploadFolder(), $imageName);
        }

        $this->save($data);

        return redirect()->back();
    }

    public function saveInfo(Request $request)
    {
        $request->validate([
            'info_main_title' => 'required|string',
            'info_main_subtitle' => 'required|string',
            'info_bottom_subtitle' => 'required|string',
            'info_first_card_title' => 'required|string',
            'info_first_card_text1' => 'required|string',
            'info_first_card_text2' => 'required|string',
            'info_second_card_title' => 'required|string',
            'info_second_card_text1' => 'required|string',
            'info_second_card_text2' => 'required|string',
            'info_third_card_title' => 'required|string',
            'info_third_card_text1' => 'required|string',
            'info_third_card_text2' => 'required|string',
        ]);

        $data['info_main_title'] = $request->get('info_main_title');
        $data['info_main_subtitle'] = $request->get('info_main_subtitle');
        $data['info_bottom_subtitle'] = $request->get('info_bottom_subtitle');
        $data['info_first_card_title'] = $request->get('info_first_card_title');
        $data['info_first_card_text1'] = $request->get('info_first_card_text1');
        $data['info_first_card_text2'] = $request->get('info_first_card_text2');
        $data['info_second_card_title'] = $request->get('info_second_card_title');
        $data['info_second_card_text1'] = $request->get('info_second_card_text1');
        $data['info_second_card_text2'] = $request->get('info_second_card_text2');
        $data['info_third_card_title'] = $request->get('info_third_card_title');
        $data['info_third_card_text1'] = $request->get('info_third_card_text1');
        $data['info_third_card_text2'] = $request->get('info_third_card_text2');

        $this->save($data);

        return redirect()->back();
    }

    public function savePriceList(Request $request)
    {
        $request->validate([
            'price_main_title' => 'required|string',
            'price_main_subtitle' => 'required|string',
        ]);

        $data['price_main_title'] = $request->get('price_main_title');
        $data['price_main_subtitle'] = $request->get('price_main_subtitle');

        if($request->has('price_photo')) {

            $this->settings->deletePreviousPriceImage();

            $imageName = (string) Str::of($request->file('price_photo')->getClientOriginalName())
                ->beforeLast('.')
                ->slug()
                ->append('.')
                ->append($request->file('price_photo')->getClientOriginalExtension());

            $data['price_photo'] = $imageName;

            $request->file('price_photo')->storeAs($this->settings->uploadFolder(), $imageName);
        }

        $this->save($data);

        return redirect()->back();
    }

    public function saveContacts(Request $request)
    {
        $request->validate([
            'contact_main_title' => 'required|string',
            'contact_main_subtitle' => 'required|string',
            'contact_email' => 'required|email|string',
            'contact_phone' => 'required|string',
            'contact_address' => 'required|string',
            'contact_website' => 'required|string',

        ]);

        $data['contact_main_title'] = $request->get('contact_main_title');
        $data['contact_main_subtitle'] = $request->get('contact_main_subtitle');
        $data['contact_email'] = $request->get('contact_email');
        $data['contact_phone'] = $request->get('contact_phone');
        $data['contact_address'] = $request->get('contact_address');
        $data['contact_website'] = $request->get('contact_website');


        $this->save($data);

        return redirect()->back();
    }

    private function save(array $data): void
    {
        if ($this->settings->data === null) {
            $this->settings->data = $data;
        } else {
            $this->settings->data = array_merge($this->settings->data, $data);
        }

        $this->settings->save();
    }
}
