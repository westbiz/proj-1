<?php

namespace App\Admin\Controllers;

use App\Models\Sight;
use App\Models\Continent;
use App\Models\City;
use App\Models\Type;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\TypeResource;

class SightController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Sight | 景区';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Sight());

        $grid->column('id', __('Id'));
        // $grid->types('类别')->pluck('name')->label();

        $grid->column('types', __('类别'))->display(function ($types) {

            $types = array_map(function ($type) {
                return "<span class='label label-success'>{$type['name']}</span>";
            }, $types);

            return join('&nbsp;', $types);
        });

        $grid->column('parent_id', __('父类'));
        $grid->column('city_id', __('城市'));
        $grid->column('cn_name', __('名称'));
        $grid->column('en_name', __('英文名称'))->limit(10);
        $grid->column('full_cname', __('全称'));
        $grid->column('phone', __('电话'));
        $grid->column('address', __('地址'))->limit(10);
        $grid->column('zipcode', __('邮编'));
        $grid->column('description', __('描述'))->limit(20);
        $grid->column('active', __('激活'));
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
        $show = new Show(Sight::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('type_id', __('类别'));
        $show->field('parent_id', __('父类'));
        $show->field('city_id', __('城市'));
        $show->field('cn_name', __('名称'));
        $show->field('en_name', __('英文名称'));
        $show->field('full_cname', __('全称'));
        $show->field('phone', __('电话'));
        $show->field('address', __('地址'));
        $show->field('zipcode', __('邮编'));
        $show->field('description', __('描述'));
        $show->field('active', __('激活'));
        $show->field('deleted_at', __('Deleted at'));
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
        $form = new Form(new Sight());
        $city_id = request()->get('city');
        $type_id = request()->get('type');

        // $parents = Type::where('parent_id',0)->has('childTypes')->get();
        // $group = [];        
        // foreach ($parents as $key=>$value) {
   
        //        $group[$key]['label']=$value->name;

        //     $children = Type::where('parent_id', '=',$value->id)->get();
        //     foreach ($children as $k=>$v) {

        //         $group[$key]['options'][$v->id]='   '.$v->name;
        //     }
        // }

        // dd($group);

        // $form->select('type_id', __('类别'))->options(Type::pluck('name', 'id'))->groups($group);

        $form->multipleSelect('types', __('类别'))->options(Type::where('parent_id', '<>', 0)->pluck('name', 'id'))->default($type_id);
        $form->number('parent_id', __('父类'));
        $form->select('city_id', __('城市'))->options(City::where('active', 1)->pluck('cn_name', 'id'))->default($city_id);
        $form->text('cn_name', __('名称'));
        $form->text('en_name', __('英文名称'));
        $form->text('full_cname', __('全称'));
        $form->mobile('phone', __('电话'));
        $form->text('address', __('地址'));
        $form->text('zipcode', __('邮编'));
        $form->textarea('description', __('描述'));
        $form->switch('active', __('激活'));

        return $form;
    }
}
