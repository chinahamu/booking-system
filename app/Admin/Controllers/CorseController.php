<?php

namespace App\Admin\Controllers;

use App\Models\Corse;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Facades\Admin;

class CorseController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'コース';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Corse());

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
        $show = new Show(Corse::findOrFail($id));

        // $show->field('id', __('Id'));
        // $show->field('name', __('Name'));
        // $show->field('price', __('Price'));
        // $show->field('created_at', __('Created at'));
        // $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Corse());

        $form->text('name', __('Name'));
        $form->number('price', __('Price'));

        return $form;
    }
}
