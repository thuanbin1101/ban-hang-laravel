<?php

namespace App\Components;

use App\Models\Category;

class CategoryRecursive
{
    private $data;
    private string $htmlSelect = "";

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function categoryRecursive($parentId , $id = 0, $text = '')
    {
        foreach ($this->data as $each) {
            if ($each->parent_id === $id) {
                if (!empty($parentId) && $parentId === $each->id) {
                    $this->htmlSelect .= "<option selected value='{$each->id}'>{$text} {$each->name}</option>";
                } else {
                    $this->htmlSelect .= "<option value='{$each->id}'>{$text} {$each->name}</option>";
                }
                $this->categoryRecursive($parentId, $each->id, $text . "--");
            }
        }
        return $this->htmlSelect;
    }
}
