<?php

namespace App\FormValidators;

class ArticleControllerValidator
{

    public function storeData($data)
    {
        if (empty($data["user"]) && is_numeric($data["user"])) {
            return false;
        }
        if (empty($data["title"])) {
            return false;
        }
        return $data;
    }

}