<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\CategoryModel;
use DateTimeZone;
use DateTime;
use Webpatser\Uuid\Uuid;

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
        $pageSize = 10;
        $data = [
            'title_main' => trans('category.title_main'),
            'urlDeleteItem' => route('category.delete'),
            'urlShowItem' => route('category.show')
        ];

        $listTh = [
            '#' => ['style' => 'width: 5%;', 'data' => trans('category.#')],
            'title' => ['style' => 'width: 20%; min-width: 100px;', 'data' => trans('category.title')],
            'url' => ['style' => 'width: 30%;min-width: 180px;', 'data' => trans('category.url')],
            'serial' => ['style' => 'width: 10%; min-width: 100px;', 'data' =>  trans('category.serial')],
            'create_at' => ['style' => 'width: 20%; min-width: 100px;', 'data' =>  trans('category.create_at')],
            'update_at' => ['style' => 'width: 20%; min-width: 100px;', 'data' =>  trans('category.update_at')],
            'action' => ['style' => 'width: 10%; min-width: 80px;', 'data' =>  trans('category.admin.action')]
        ];

        $obj = new CategoryModel;
        $dataTmp = $obj->orderBy('update_at', 'desc')->paginate($pageSize);
        $currentPage = $dataTmp->currentPage();
        $dataTr = [];

        foreach ($dataTmp as $key => $row) {
            $dataTr[] = [
                '#' => $currentPage <= 1 ? $key + 1 : (($currentPage * $pageSize) - $pageSize) + ($key + 1),
                'title' => $row['title'],
                'url' => $row['url'],
                'serial' => $row['serial'],
                'create_at' => $row['create_at'],
                'update-at' => $row['update_at'],
                'action' => '
                    <button type="button" class="btn btn-show-data" onclick="showItem(\'' . $row['id'] . '\');">
                        <i class="far fa-edit"></i>
                    </button>
                    ' . '
                    <button type="button" class="btn btnDelete" onclick="deleteItem(\'' . $row['id'] . '\');">
                        <i class="far fa-trash-alt"></i>
                    </button>
                '
            ];
        }
        $data['pagination'] = $dataTmp->appends(request()->except(['_token', '_pjax']))->links('admin.component.pagination');

        $data['resultItems'] = trans('category.admin.result_item', ['item_from' => $dataTmp->firstItem(), 'item_to' => $dataTmp->lastItem(), 'item_total' => $dataTmp->total()]);

        $data['listTh'] = $listTh;
        $data['dataTr'] = $dataTr;

        return view('admin.screen.list')->with($data);
    }

    public function store(Request $request)
    {
        $data = [];
        if ($request->id === null) {
            $data = new CategoryModel;
            $data->id = Uuid::generate();
            $data->serial = 1;
            $data->title = $request->title;
            $data->url = $request->url;
            $date = new DateTime('now', new DateTimeZone('Asia/Bangkok'));
            $data->create_at = $date;
            $data->update_at = $date;
            $data['success']  = $data->save();
            $data['msg'] = 'Add data';
        } else {
            $data['msg'] = 'Update data';
            $model = array(
                'title' => $request->title,
                'url' => $request->url,
                'update_at' => new DateTime('now', new DateTimeZone('Asia/Bangkok'))
            );
            $data['success'] = CategoryModel::where('id', $request->id)->update($model);
        }
        return response()->json($data);
    }

    public function show(Request $request)
    {
        $data = CategoryModel::find($request->id);
        return response()->json($data);
    }

    public function delete(Request $request)
    {
        $data = CategoryModel::destroy($request['ids']);
        return response()->json($data);
    }
}