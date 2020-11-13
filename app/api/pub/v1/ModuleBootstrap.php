<?php

namespace app\api\pub\v1;

use yii\base\BootstrapInterface;

class ModuleBootstrap implements BootstrapInterface
{
    public function bootstrap($app)
    {
        $app->modules = [
            'api-pub-v1' => [
               'class' => 'app\api\pub\v1\Module',
            ],
        ];

        $pathPrefix = 'api/public/v1';

        $app->getUrlManager()->addRules([
            'GET ' . $pathPrefix  => 'api-pub-v1/default/index',
        ], true);
    }
}
