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
    protected $title = 'App\Models\Type';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Type());

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('parent_id', __('Parent id'));
        $grid->column('description', __('Description'));
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
        $show->field('name', __('Name'));
        $show->field('parent_id', __('Parent id'));
        $show->field('description', __('Description'));
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
        $form = new Form(new Type());

        $form->text('name', __('Name'));
        $form->number('parent_id', __('Parent id'));
        $form->text('description', __('Description'));

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
