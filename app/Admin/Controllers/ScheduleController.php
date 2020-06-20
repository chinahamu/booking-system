<?php

namespace App\Admin\Controllers;

use App\Models\Schedule;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Facades\Admin;
use DB;
use App\Models\Cast;

class ScheduleController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '出勤スケジュール';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Schedule());

        $grid->id('id');
        $grid->cast()->name("キャスト名");
        $grid->start("出勤時刻");
        $grid->end("退勤時刻");

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
        $show = new Show(Schedule::findOrFail($id));



        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Schedule());

        $cast = Cast::pluck('name', 'id');

        $form->select('cast_id', 'キャスト')->options($cast);
        $form->datetime('start','開始日時');
        $form->datetime('end','終了日時');

        return $form;
    }
}
