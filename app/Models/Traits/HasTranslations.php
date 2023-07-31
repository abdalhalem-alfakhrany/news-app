<?php

namespace App\Models\Traits;

trait HasTranslations
{
    public function translatedTo($locale, $fileds = ['*'])
    {
        return $this->translations()->where('locale', $locale)->get($fileds);
    }

    public function deleteWithTranslations()
    {
        $this->translations()->delete();
        $this->delete();
    }

    public function updateTranslation($locale, $data)
    {
        return $this->translations()->where('locale', $locale)->update($data);
    }
}
