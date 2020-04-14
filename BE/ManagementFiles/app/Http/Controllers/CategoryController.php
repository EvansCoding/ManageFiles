<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\CategoryModel;

class CategoryController extends Controller
{
    private $pathViewController = 'admin.category.';
    private $controllerName = 'category';

    public function __construct()
    {
        view()->share('controllerName', $this->controllerName);
    }

    public function index()
    {
        $data = [
            'title_main' => trans('category.title_main'),
        ];

        $listTh = [
            '#' => ['style' => 'width: 5%;', 'data' => trans('category.#')],
            'title' => ['style' => 'width: 30%; min-width: 180px;', 'data' => trans('category.title')],
            'url' => ['style' => 'width: auto;min-width: 100px;', 'data' => trans('category.url')],
            'serial' => ['style' => 'width: 10%; min-width: 100px;', 'data' =>  trans('category.serial')],
            'create_at' => ['style' => 'width: 20%; min-width: 50px;', 'data' =>  trans('category.create_at')],
            'update_at' => ['style' => 'width: 20%; min-width: 100px;', 'data' =>  trans('category.update_at')],
            'action' => ['style' => 'width: 10%; min-width: 100px;', 'data' =>  trans('category.action')]
        ];

        $obj = new CategoryModel;
        $dataTmp = $obj->paginate(20);
        $dataTr = [];
        $index = 1;
        foreach ($dataTmp as $key => $row) {
            $dataTr[] = [
                '#' => $index++,
                'title' => $row['title'],
                'url' => $row['url'],
                'serial' => $row['serial'],
                'create_at' => $row['create_at'],
                'update-at' => $row['update_at'],
                'action' => '
                    <button type="button" class="btn" data-toggle="modal" data-target="#exampleModalCenter">
                        <i class="far fa-edit"></i>
                    </button>
                    ' . '
                    <button type="button" class="btn btnDelete">
                        <i class="far fa-trash-alt"></i>
                    </button>
                '
            ];
        }

        $data['listTh'] = $listTh;
        $data['dataTr'] = $dataTr;

        return view('admin.screen.list')->with($data);
    }
}
