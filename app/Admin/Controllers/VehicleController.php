<?php

namespace App\Admin\Controllers;

use App\Models\vehicle;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class VehicleController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'vehicle | 车型管理';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new vehicle());

        $grid->column('id', __('Id'));
        $grid->column('symbol', __('标识'))->image();
        $grid->column('name', __('名称'))->editable();
        $grid->column('remark', __('简介'))->editable();
        $grid->column('active', __('激活'))->bool();
        // $grid->column('deleted_at', __('Deleted at'));
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
        $show = new Show(vehicle::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('名称'));
        $show->field('symbol', __('标识'));
        $show->field('remark', __('简介'));
        $show->field('active', __('激活'));
        // $show->field('deleted_at', __('Deleted at'));
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
        $form = new Form(new vehicle());

        $form->text('name', __('名称'))->rules('required|min:2');

        // $dir = 'images/' . date('Y') . '/' . date('m') . '/' . date('d');
        // $form->multipleFile('pictureuri', '图片')->removable()->move($dir)->uniqueName();
        $dir = 'images/symbols/';
        // 使用随机生成文件名 (md5(uniqid()).extension)
        $form->image('symbol', '图片')->resize(100, 100,  function ($constraint) {
         // $constraint->aspectRatio();
         $constraint->upsize();
        })->removable()->move($dir)->uniqueName();
        $form->text('remark', __('简介'));
        $form->switch('active', __('激活'));

        return $form;
    }
}
