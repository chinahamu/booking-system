<?php

namespace App\Admin\Controllers;

use App\Models\Delivery;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class DeliveryController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '出張料金';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Delivery());

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('price', __('Price'));

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
        $show = new Show(Delivery::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('price', __('Price'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Delivery());

        $form->text('name', __('Name'));
        $form->text('price', __('Price'));

        return $form;
    }
}
