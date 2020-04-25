<?php

namespace App\Admin\Controllers;

use App\Models\Continent;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ContinentController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Continent | 大洲';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Continent());

        $grid->column('id', __('Id'));
        $grid->column('parent_id', __('父类'));
        $grid->column('cn_name', __('中文名称'))->editable();
        $grid->column('en_name', __('英文名称'))->editable();
        // $grid->column('created_at', __('创建时间'));
        // $grid->column('updated_at', __('更新时间'));

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
        $show = new Show(Continent::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('parent_id', __('父类'));
        $show->field('cn_name', __('中文名称'));
        $show->field('en_name', __('英文名称'));
        $show->field('created_at', __('创建时间'));
        $show->field('updated_at', __('更新时间'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Continent());

        $form->number('parent_id', __('父类'));
        $form->text('cn_name', __('中文名称'));
        $form->text('en_name', __('英文名称'));

        return $form;
    }
}
