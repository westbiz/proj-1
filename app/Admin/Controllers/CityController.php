<?php

namespace App\Admin\Controllers;

use App\Models\City;
use App\Models\Country;
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

        // 在`$grid`实例上操作
        $grid->expandFilter();
        $grid->filter(function($filter){
            // 去掉默认的id过滤器
            $filter->disableIdFilter();
            // 在这里添加字段过滤器
            $filter->where(function($query){
                $query->whereHas('country', function($query){
                    $query->where('cn_name', 'like', "%{$this->input}%")
                        ;
                })->orWhere('cn_name', 'like', "%{$this->input}%")
                    ->orWhere('cn_state', 'like', "%{$this->input}%");
            }, '关键字搜索');
        });

        $grid->column('id', __('Id'));
        $grid->column('cn_name', __('中文名称'))->editable();
        // $grid->column('parent_id', __('父类'));
        $grid->column('country.cn_name', __('国家'))->label();
        $grid->column('state', __('州'));
        $grid->column('en_name', __('英文名称'));
        $grid->column('lower_name', __('小写'));
        $grid->column('cn_state', __('中文州名'));
        $grid->column('state_code', __('州代码'));
        $grid->column('city_code', __('城市代码'));
        $grid->column('remark', __('简介'));
        $grid->column('active', __('激活'))->bool();
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
        $show = new Show(City::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('parent_id', __('父类'));
        $show->field('country_id', __('国家'));
        $show->field('cn_name', __('中文名称')); 
        $show->field('cn_state', __('中文州名'));               
        $show->field('en_state', __('州'));
        $show->field('en_name', __('英文名称'));
        $show->field('lower_name', __('小写'));
        $show->field('state_code', __('州代码'));
        $show->field('city_code', __('城市代码'));
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
        $form = new Form(new City());

        $form->number('parent_id', __('父类'));
        $form->select('country_id', __('国家'))->options(Country::pluck('cn_name','id'))->ajax('/admin/countries/getCountries');
        $form->text('cn_name', __('中文名称'));        
        $form->text('cn_state', __('中文州名'));
        $form->text('state', __('州'));
        $form->text('en_name', __('英文名称'));
        $form->text('lower_name', __('小写'));
        $form->text('state_code', __('州代码'));
        $form->text('city_code', __('城市代码'));
        $form->textarea('remark', __('简介'));

        return $form;
    }
}
