<?php

namespace App\Models\Traits;

trait TranslationUtils
{
    public function delete()
    {
        $this->get()->get()->map(function ($translation) {
            $translation->first()->delete();
        });
    }
}
