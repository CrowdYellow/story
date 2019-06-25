<?php

namespace App\Admin\Controllers;

use App\Models\System;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Illuminate\Support\Facades\Cache;

class SystemController extends Controller
{
    use HasResourceActions;

    public function index(Content $content)
    {
        return $content
            ->header('配置')
            ->body($this->grid());
    }

    public function edit($id, Content $content)
    {
        return $content
            ->header('编辑文章')
            ->body($this->form()->edit($id));
    }

    public function update($id)
    {
        Cache::forget("config");
        return $this->form()->update($id);
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new System);

        $grid->id('Id');
        $grid->web_title('网站标题');
        $grid->web_keywords('网站关键字');
        $grid->web_description('网站描述');
        $grid->we_chat('微信公众号');
        $grid->created_at('Created at');
        $grid->updated_at('Updated at');
        $grid->actions(function ($actions) {
            // 不在每一行后面展示查看按钮
            $actions->disableView();
            // 不在每一行后面展示删除按钮
            $actions->disableDelete();
        });

        $grid->tools(function ($tools) {
            // 禁用批量删除按钮
            $tools->batch(function ($batch) {
                $batch->disableDelete();
            });
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
        $show = new Show(System::findOrFail($id));

        $show->id('Id');
        $show->web_title('Web title');
        $show->web_keywords('Web keywords');
        $show->web_description('Web description');
        $show->we_chat('We chat');
        $show->created_at('Created at');
        $show->updated_at('Updated at');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new System);

        $form->text('web_title', '网站标题')->rules('required');
        $form->text('web_keywords', '网站关键字')->rules('required');
        $form->text('web_description', '网站描述')->rules('required');
        $form->image('we_chat', '微信公众号')->rules('required|image')->uniqueName()->move('/uploads/chat');

        return $form;
    }
}
