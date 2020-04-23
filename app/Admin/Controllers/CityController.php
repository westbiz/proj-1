<?php

namespace App\Admin\Controllers;

use App\Models\City;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CityController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'City | 城市区域';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new City());

        $grid->column('id', __('Id'));
        $grid->column('parent_id', __('Parent id'));
        $grid->column('country_id', __('Country id'));
        $grid->column('state', __('State'));
        $grid->column('name', __('Name'));
        $grid->column('lower_name', __('Lower name'));
        $grid->column('cn_state', __('Cn state'));
        $grid->column('cn_name', __('Cn name'));
        $grid->column('state_code', __('State code'));
        $grid->column('city_code', __('City code'));
        $grid->column('remark', __('Remark'));
        // $grid->column('created_at', __('Created at'));
        // $grid->column('updated_at', __('Updated at'));

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
        $show = new Show(City::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('parent_id', __('Parent id'));
        $show->field('country_id', __('Country id'));
        $show->field('state', __('State'));
        $show->field('name', __('Name'));
        $show->field('lower_name', __('Lower name'));
        $show->field('cn_state', __('Cn state'));
        $show->field('cn_name', __('Cn name'));
        $show->field('state_code', __('State code'));
        $show->field('city_code', __('City code'));
        $show->field('remark', __('Remark'));
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
        $form = new Form(new City());

        $form->number('parent_id', __('Parent id'));
        $form->number('country_id', __('Country id'));
        $form->text('state', __('State'));
        $form->text('name', __('Name'));
        $form->text('lower_name', __('Lower name'));
        $form->text('cn_state', __('Cn state'));
        $form->text('cn_name', __('Cn name'));
        $form->text('state_code', __('State code'));
        $form->text('city_code', __('City code'));
        $form->textarea('remark', __('Remark'));

        return $form;
    }
}
