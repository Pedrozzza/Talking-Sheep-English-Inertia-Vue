<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;


class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'data',
    ];

    protected $casts = [
        'data' => 'array',
    ];

    public function uploadFolder(): string
    {
        return 'public/settings';
    }

    public function heroMainTitle(): ?string
    {
        return Arr::get($this->data, 'hero_main_title');
    }

    public function heroMainSubtitle(): ?string
    {
        return Arr::get($this->data, 'hero_main_subtitle');
    }

    public function heroMainButtonTitle(): ?string
    {
        return Arr::get($this->data, 'hero_main_button_title');
    }

    public function heroMainCardTitle(): ?string
    {
        return Arr::get($this->data, 'hero_main_card_title');
    }

    public function firstCardTitle(): ?string
    {
        return Arr::get($this->data, 'hero_first_card_title');
    }

    public function firstCardText1(): ?string
    {
        return Arr::get($this->data, 'hero_first_card_text1');
    }

    public function firstCardText2(): ?string
    {
        return Arr::get($this->data, 'hero_first_card_text2');
    }

    public function firstCardButton(): ?string
    {
        return Arr::get($this->data, 'hero_first_card_button');
    }

    public function secondCardTitle(): ?string
    {
        return Arr::get($this->data, 'hero_second_card_title');
    }

    public function secondCardText1(): ?string
    {
        return Arr::get($this->data, 'hero_second_card_text1');
    }

    public function secondCardText2(): ?string
    {
        return Arr::get($this->data, 'hero_second_card_text2');
    }

    public function secondCardPhoto(): ?string
    {
        $imageName = Arr::get($this->data, 'hero_second_card_photo');

        return $imageName === null ? 'https://ui-avatars.com/api/?name=hero_image&color=7F9CF5&background=EBF4FF' : Storage::url("{$this->uploadFolder()}/{$imageName}");
    }

    public function thirdCardTitle(): ?string
    {
        return Arr::get($this->data, 'hero_third_card_title');
    }

    public function thirdCardText1(): ?string
    {
        return Arr::get($this->data, 'hero_third_card_text1');
    }

    public function thirdCardText2(): ?string
    {
        return Arr::get($this->data, 'hero_third_card_text2');
    }

    public function deletePreviousImage(): void
    {
        $imageName = Arr::get($this->data, 'hero_second_card_photo');

        if ($imageName !== null) {
            Storage::delete("{$this->uploadFolder()}/{$imageName}");
        }
    }

    public function deletePreviousPriceImage(): void
    {
        $imageName = Arr::get($this->data, 'price_photo');

        if ($imageName !== null) {
            Storage::delete("{$this->uploadFolder()}/{$imageName}");
        }
    }

    public function infoMainTitle(): ?string
    {
        return Arr::get($this->data, 'info_main_title');
    }

    public function infoMainSubtitle(): ?string
    {
        return Arr::get($this->data, 'info_main_subtitle');
    }

    public function infoBottomSubtitle(): ?string
    {
        return Arr::get($this->data, 'info_bottom_subtitle');
    }

    public function infoFirstCardTitle(): ?string
    {
        return Arr::get($this->data, 'info_first_card_title');
    }

    public function infoFirstCardText1(): ?string
    {
        return Arr::get($this->data, 'info_first_card_text1');
    }

    public function infoFirstCardText2(): ?string
    {
        return Arr::get($this->data, 'info_first_card_text2');
    }

    public function infoSecondCardTitle(): ?string
    {
        return Arr::get($this->data, 'info_second_card_title');
    }

    public function infoSecondCardText1(): ?string
    {
        return Arr::get($this->data, 'info_second_card_text1');
    }

    public function infoSecondCardText2(): ?string
    {
        return Arr::get($this->data, 'info_second_card_text2');
    }

    public function infoThirdCardTitle(): ?string
    {
        return Arr::get($this->data, 'info_third_card_title');
    }

    public function infoThirdCardText1(): ?string
    {
        return Arr::get($this->data, 'info_third_card_text1');
    }

    public function infoThirdCardText2(): ?string
    {
        return Arr::get($this->data, 'info_third_card_text2');
    }

    public function infoFourthCardTitle(): ?string
    {
        return Arr::get($this->data, 'info_fourth_card_title');
    }

    public function infoFourthCardText1(): ?string
    {
        return Arr::get($this->data, 'info_fourth_card_text1');
    }

    public function infoFourthCardText2(): ?string
    {
        return Arr::get($this->data, 'info_fourth_card_text2');
    }

    public function priceMainTitle(): ?string
    {
        return Arr::get($this->data, 'price_main_title');
    }

    public function priceMainSubtitle(): ?string
    {
        return Arr::get($this->data, 'price_main_subtitle');
    }

    public function pricePhoto(): ?string
    {
        $imageName = Arr::get($this->data, 'price_photo');

        return $imageName === null ? 'https://ui-avatars.com/api/?name=hero_image&color=7F9CF5&background=EBF4FF' : Storage::url("{$this->uploadFolder()}/{$imageName}");
    }

    public function contactMainTitle(): ?string
    {
        return Arr::get($this->data, 'contact_main_title');
    }

    public function contactMainSubtitle(): ?string
    {
        return Arr::get($this->data, 'contact_main_subtitle');
    }

    public function contactEmail(): ?string
    {
        return Arr::get($this->data, 'contact_email');
    }

    public function contactPhone(): ?string
    {
        return Arr::get($this->data, 'contact_phone');
    }

    public function contactAddress(): ?string
    {
        return Arr::get($this->data, 'contact_address');
    }

    public function contactWebsite(): ?string
    {
        return Arr::get($this->data, 'contact_website');
    }
}
