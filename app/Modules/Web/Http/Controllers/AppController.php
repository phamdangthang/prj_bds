<?php

namespace App\Modules\Web\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\City;
use App\Models\Category;
use App\Http\Controllers\Controller;
use View;

class AppController extends Controller
{
    public function __construct() {
        $groupCity = $this->getCity();
        View::share('groupCity', $groupCity);

        $projectHot = Project::where('is_hot', 1)->limit(10)->get();
        View::share('projectHot', $projectHot);

        $projectCategories = Category::where('type', PROJECT)->get();
        $newsCategories = Category::where('type', NEWS)->get();
        View::share('projectCategories', $projectCategories);
        View::share('newsCategories', $newsCategories);
    }

    public function getCity() {
        $projects = Project::select('id', 'city_id')->get();
        $cities = [];
        $city_ids = [];
        $groupCity = [];

        foreach ($projects as $item) {
            $cities[$item->city_id][] = $item;
        }
        foreach ($cities as $key => $id) {
            $groupCity[] = [
                'id' => $key,
                'name' => City::find($key)->name,
                'total' => count($id),
            ];
        }

        return $groupCity;
    }
}
