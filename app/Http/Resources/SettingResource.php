<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SettingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'hero_main_title' => $this->heroMainTitle(),
            'hero_main_subtitle' => $this->heroMainSubtitle(),
            'hero_main_button_title' => $this->heroMainButtonTitle(),
            'hero_main_card_title' => $this->heroMainCardTitle(),
            'hero_first_card_title' => $this->firstCardTitle(),
            'hero_first_card_text1' => $this->firstCardText1(),
            'hero_first_card_text2' => $this->firstCardText2(),
            'hero_first_card_button' => $this->firstCardButton(),
            'hero_second_card_title' => $this->secondCardTitle(),
            'hero_second_card_text1' => $this->secondCardText1(),
            'hero_second_card_text2' => $this->secondCardText2(),
            'hero_second_card_photo' => $this->secondCardPhoto(),
            'hero_third_card_title' => $this->thirdCardTitle(),
            'hero_third_card_text1' => $this->thirdCardText1(),
            'info_main_title' => $this->infoMainTitle(),
            'info_main_subtitle' => $this->infoMainSubtitle(),
            'info_bottom_subtitle' => $this->infoBottomSubtitle(),
            'info_first_card_title' => $this->infoFirstCardTitle(),
            'info_first_card_text1' => $this->infoFirstCardText1(),
            'info_first_card_text2' => $this->infoFirstCardText2(),
            'info_second_card_title' => $this->infoSecondCardTitle(),
            'info_second_card_text1' => $this->infoSecondCardText1(),
            'info_second_card_text2' => $this->infoSecondCardText2(),
            'info_third_card_title' => $this->infoThirdCardTitle(),
            'info_third_card_text1' => $this->infoThirdCardText1(),
            'info_third_card_text2' => $this->infoThirdCardText2(),
            'price_main_title' => $this->priceMainTitle(),
            'price_main_subtitle' => $this->priceMainSubtitle(),
            'price_photo' => $this->pricePhoto(),
            'contact_main_title' => $this->contactMainTitle(),
            'contact_main_subtitle' => $this->contactMainSubtitle(),
            'contact_email' => $this->contactEmail(),
            'contact_phone' => $this->contactPhone(),
            'contact_address' => $this->contactAddress(),
            'contact_website' => $this->contactWebsite(),
        ];
    }
}
