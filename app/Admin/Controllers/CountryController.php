<?php

namespace App\Admin\Controllers;

use App\Models\Country;
use App\Models\Continent;
use Illuminate\Http\Request;
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

        $grid->filter(function($filter){
            // 去掉默认的id过滤器
            $filter->disableIdFilter();
            // 在这里添加字段过滤器
            $filter->where(function($query){
                $query->where('cn_name', 'like', "%{$this->input}%");
            }, '关键字搜索');
        });

        // 规格选择器
        $grid->selector(function(Grid\Tools\Selector $selector){
            $continents = Continent::pluck('cn_name', 'id');
            $selector->select('continent_id', '国家地区', $continents);
            $selector->select('active', '状态', [
                1 => '激活',
                0 => '未激活',
            ]);
        });
        // $grid->selector(function(Grid\Tools\Selector $selector){
        //     $selector->select('active', '状态', [
        //         1 => '激活',
        //         0 => '关闭'
        //     ]);
        // });

        $grid->column('id', __('Id'));
        $grid->column('cn_name', __('中文名称'))->editable();
        $grid->column('continent.cn_name', __('大洲'))->label('info');
        $grid->column('en_name', __('英文名称'))->limit(20);
        // $grid->column('lower_name', __('小写'));
        $grid->column('country_code', __('代码'));
        $grid->column('full_name', __('英文全称'))->limit(20);
        $grid->column('full_cname', __('中文全称'));
        $grid->column('remark', __('简介'))->limit(10);
        $states = [
            'on'  => ['value' => 1, 'text' => '打开', 'color' => 'primary'],
            'off' => ['value' => 0, 'text' => '关闭', 'color' => 'default'],
        ];
        $grid->column('active', __('激活'))->switch($states)->sortable();
        // $grid->column('active', __('激活'))->bool();
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
        $show->field('cn_name', __('中文名称'));        
        $show->field('continent_id', __('大洲'));
        $show->field('en_name', __('英文名称'));
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

        $form->select('continent_id', __('大洲'))->options(Continent::pluck('cn_name','id'))->ajax('/admin/continents/getContinents');
        $form->text('cn_name', __('中文名称'));
        $form->text('en_name', __('英文名称'));
        $form->text('lower_name', __('小写'));
        $form->text('country_code', __('代码'));
        $form->text('full_name', __('英文全称'));
        $form->text('full_cname', __('中文全称'));
        $form->textarea('remark', __('简介'));
        $states = [
            'on'  => ['value' => 1, 'text' => '是', 'color' => 'success'],
            'off' => ['value' => 0, 'text' => '否', 'color' => 'danger'],
        ];
        $form->switch('active', __('激活'))->states($states);

        return $form;
    }

    public function getCountries(Request $request)
    {
        //
        $q = $request->get('q');
        return Country::where('cn_name','like',"%$q%")->paginate(null, ['id','cn_name as text']);
    }    


}
