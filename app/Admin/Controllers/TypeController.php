<?php

namespace App\Admin\Controllers;

use App\Models\Type;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Controllers\HasResourceActions;
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
        // $grid->disableActions();
      
        $grid->column('id', __('Id'));
        $grid->column('name', __('名称'))->display(function($name, $column){
            if (!Admin::user()->isRole('administrator')) {
                return $name;
            }
            return $column->editable();
        });
        $grid->column('parentType.name', __('父类'))->label();
        $grid->column('description', __('描述'));
        // $grid->column('created_at', __('Created at'));
        // $grid->column('updated_at', __('Updated at'));
        $grid->column('管理')->display(function () {
            if (Admin::user()->isRole('administrator')) {
                return "<a href='sights/create?type={$this->id}'><i class='fa fa-plus-square'></i>景区</a>"."&nbsp;"."<a href='types/{$this->id}/edit'><i class='fa fa-pencil-square'></i>编辑</a>"."&nbsp;"."<a href='types/{$this->id}'><i class='fa fa-eye'></i>详细</a>";
            }
        });

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
        $parent_id = request()->get('parent_id');

        if ($parent_id) {
             $form->select('parent_id', __('父类'))->options(Type::pluck('name','id'))->default($parent_id);
        }
        else {
            $form->select('parent_id', __('父类'))->options(Type::where('parent_id',0)->pluck('name','id'))->default(0);
        }
        $form->text('name', __('名称'))->creationRules(['required', "unique:tx_types"]);
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
