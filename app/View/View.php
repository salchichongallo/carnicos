<?php

namespace App\View;

use Itm\View\View as BaseView;

class View extends BaseView
{
    /**
     * @var string
     */
    protected $fileName;

    public function renderView()
    {
        return call_user_func(function () {
            foreach ($this->parameters as $parameter => $value) {
                $$parameter = $value;
            }

            require $this->viewPath();
        });
    }

    protected function viewPath(): string
    {
        $basePath = $this->app->basePath();

        return $basePath.'/resources/views/'.$this->fileName;
    }

    public function to(string $fileName)
    {
        $this->fileName = $fileName;

        return $this;
    }
}
