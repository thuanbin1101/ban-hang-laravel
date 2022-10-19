<?php

namespace App\Components;

use App\Models\Menu;
use App\Models\Permission;

class PermissionRecursive
{
    private $html;

    public function __construct()
    {
        $this->html = "";
    }

    public function permissionRecursiveAdd($parentId = 0, $subMark = '')
    {
        $data = Permission::query()->where('parent_id', $parentId)->get();
        foreach ($data as $each) {
            $this->html .= "<option value='{$each->id}'>$subMark  {$each->name}</option>";
            $this->permissionRecursiveAdd($each->id, $subMark . '--');
        }
        return $this->html;
    }

    public function permissionRecursiveEdit($parentIdEdit, $parentId = 0, $subMark = '')
    {
        $data = Permission::query()->where('parent_id', $parentId)->get();
        foreach ($data as $each) {
            if ($each->id === $parentIdEdit) {
                $this->html .= "<option selected value='{$each->id}' >$subMark  {$each->name}</option>";
            } else {
                $this->html .= "<option value='{$each->id}' >$subMark  {$each->name}</option>";
            }
            $this->permissionRecursiveEdit($parentIdEdit, $each->id, $subMark . '--');
        }
        return $this->html;
    }
}
