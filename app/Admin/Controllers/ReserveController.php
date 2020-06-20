<?php

namespace App\Admin\Controllers;

use App\Models\Reserve;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ReserveController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '予約';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Reserve());

        $grid->column('id', __('Id'));
        $grid->cast()->name("キャスト名");
        $grid->user()->name("顧客名");
        $grid->user()->tell("電話番号");
        $grid->column('start', __('開始時間'));
        $grid->corse()->name('コース');
        $grid->delivery()->name('派遣地域');
        $grid->column('place', __('派遣場所'));
        $grid->column('address', __('住所orホテル名'));
        $grid->column('created_at', __('Created at'));
        //$grid->column('updated_at', __('Updated at'));

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
        $show = new Show(Reserve::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('cast_id', __('Cast id'));
        $show->field('start', __('Start'));
        $show->field('corse', __('Corse'));
        $show->field('delivery', __('Delivery'));
        $show->field('place', __('Place'));
        $show->field('address', __('Address'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Reserve());

        $form->number('cast_id', __('Cast id'));
        $form->datetime('start', __('Start'))->default(date('Y-m-d H:i:s'));
        $form->text('corse', __('Corse'));
        $form->text('delivery', __('Delivery'));
        $form->text('place', __('Place'));
        $form->text('address', __('Address'));

        return $form;
    }
}
