<?php

namespace App\Admin\Controllers;

use App\Models\Country;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CountryController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Country | 国家地区';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Country());

        $grid->column('id', __('Id'));
        $grid->column('cname', __('中文名称'))->editable();
        $grid->column('continent.cn_name', __('大洲'))->label('info');
        $grid->column('name', __('英文名称'));
        $grid->column('lower_name', __('小写'));
        $grid->column('country_code', __('代码'));
        $grid->column('full_name', __('英文全称'));
        $grid->column('full_cname', __('中文全称'));
        $grid->column('remark', __('简介'));
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
        $show = new Show(Country::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('cname', __('中文名称'));        
        $show->field('continent_id', __('大洲'));
        $show->field('name', __('英文名称'));
        $show->field('lower_name', __('小写'));
        $show->field('country_code', __('代码'));
        $show->field('full_name', __('英文全称'));
        $show->field('full_cname', __('中文全称'));
        $show->field('remark', __('简介'));
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
        $form = new Form(new Country());

        $form->number('continent_id', __('大洲'));
        $form->text('cname', __('中文名称'));
        $form->text('name', __('英文名称'));
        $form->text('lower_name', __('小写'));
        $form->text('country_code', __('代码'));
        $form->text('full_name', __('英文全称'));
        $form->text('full_cname', __('中文全称'));
        $form->textarea('remark', __('简介'));

        return $form;
    }
}
