<?php

namespace App\Admin\Controllers;

use App\Models\Type;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Http\Request;

class TypeController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Type | 类别';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Type());

        $grid->column('id', __('Id'));
        $grid->column('name', __('名称'));
        $grid->column('parentType.name', __('父类'))->label();
        $grid->column('description', __('描述'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

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
        $show = new Show(Type::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('名称'));
        // $show->field('parent_id', __('Parent id'));
        $show->field('description', __('描述'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        // $show->parentType('parent_id', __('父类'));

        $show->childTypes('子类', function($children){
            $children->resource('/admin/types');
            $children->id();
            $children->name();
        });

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Type());

        $form->text('name', __('名称'))->creationRules(['required', "unique:tx_types"]);
        $form->select('parent_id', __('父类'))->options(Type::where('parent_id',0)->pluck('name','id'));
        $form->text('description', __('描述'));

        return $form;
    }


    public function getTypes(Request $request)
    {
        $q = $request->get('q');
        return Type::where('parent_id', '<>', 0)
                ->where('name', 'like', "%$q%")
                ->paginate(null, ['id', 'name as text']);
    }


}
