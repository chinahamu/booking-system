<?php

namespace App\Admin\Controllers;

use App\Models\Cast;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Facades\Admin;
use DB;

class CastController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'キャスト';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = Admin::grid(Cast::class, function (Grid $grid) {

            $grid->id('id')->sortable();
            $grid->column('name')->sortable();
            $grid->cast_rank()->name("キャストランク");

            // $grid->actions(function ($actions) {
            //     $actions->disableDelete(); // 削除無効
            //     $actions->disableEdit(); // 編集無効
            //     $actions->disableView(); // 詳細表示無効
            // });
        });
    
        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Cast::findOrFail($id));



        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Cast());

        $form->text('name', __('Name'));
        $form->select('cast_rank_id', 'キャストランク')->options(
            DB::table('cast_ranks')->pluck('name','id')
        );
        $form->image('image');

        return $form;
    }
}
