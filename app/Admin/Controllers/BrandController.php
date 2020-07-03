<?php

namespace App\Admin\Controllers;

use App\Models\Brand;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Intervention\Image\ImageManager;

class BrandController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Brands | 品牌管理';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Brand());

        $grid->column('id', __('Id'));
        $grid->column('symbol', __('标识'))->image();
        $grid->column('cname', __('名称'))->editable();
        $grid->column('ename', __('英文名称'))->editable();
        $grid->column('describtion', __('描述'));
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
        $show = new Show(Brand::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('cname', __('名称'));
        $show->field('ename', __('英文名称'));
        $show->field('symbol', __('标识'));
        $show->field('describtion', __('描述'));
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
        $form = new Form(new Brand());

        $form->text('cname', __('名称'))->rules('required|min:2|unique:tx_brands');
        $form->text('ename', __('英文名称'));
        // $form->image('symbol', __('标识'))->removable();
        $dir = 'images/brands/';
        $form->image('symbol', '图片')->resize(100, 100,  function ($constraint) {
         // $constraint->aspectRatio();
         $constraint->upsize();
        })->removable()->move($dir)->uniqueName();

        $form->textarea('describtion', __('描述'));
        $form->switch('active', __('激活'));

        return $form;
    }
}
