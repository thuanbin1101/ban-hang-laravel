<?php

namespace App\Components;

use App\Models\Menu;

class MenuRecursive
{
    private $html;

    public function __construct()
    {
        $this->html = "";
    }

    public function menuRecursiveAdd($parentId = 0, $subMark = '')
    {
        $data = Menu::query()->where('parent_id', $parentId)->get();
        foreach ($data as $each) {
            $this->html .= "<option value='{$each->id}'>$subMark  {$each->name}</option>";
            $this->menuRecursiveAdd($each->id, $subMark . '--');
        }
        return $this->html;
    }

    public function menuRecursiveEdit($parentIdEdit, $parentId = 0, $subMark = '')
    {
        $data = Menu::query()->where('parent_id', $parentId)->get();
        foreach ($data as $each) {
            if ($each->id === $parentIdEdit) {
                $this->html .= "<option selected value='{$each->id}' >$subMark  {$each->name}</option>";
            } else {
                $this->html .= "<option value='{$each->id}' >$subMark  {$each->name}</option>";
            }
            $this->menuRecursiveEdit($parentIdEdit, $each->id, $subMark . '--');
        }
        return $this->html;
    }
}
