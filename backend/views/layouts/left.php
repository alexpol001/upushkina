<aside class="main-sidebar">

    <section class="sidebar">

        <?
        $checkController = function ($controller) {
            return $controller === $this->context->getUniqueId();
        };
        ?>
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
                'items' => [
                    ['label' => 'Меню', 'options' => ['class' => 'header']],
                    [
                        'label' => 'Материалы',
                        'icon' => 'sticky-note',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Менеджер материалов', 'url' => ['/materials/material'], 'active' => $checkController('materials/material')],
//                            ['label' => 'Менеджер категорий', 'url' => ['/materials/category'], 'active' => $checkController('materials/category')],
                            ['label' => 'Забронировать', 'url' => ['/materials/close'], 'active' => $checkController('materials/close')],
                            ['label' => 'Акции', 'url' => ['/materials/offer'], 'active' => $checkController('materials/offer')],
                            ['label' => 'Файловый менеджер', 'url' => ['/materials/files'], 'active' => $checkController('materials/files')],
                        ]
                    ],
                    [
                        'label' => 'Настройки',
                        'icon' => 'cog',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Сайт', 'url' => ['/setting/site'], 'active' => $checkController('setting/site')],
                            ['label' => 'Пользователи', 'url' => ['/setting/user'], 'active' => $checkController('setting/user')],
                        ]
                    ],
//                    ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
//                    ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                ],
            ]
        ) ?>

    </section>

</aside>
