<aside class="main-sidebar">
    <section class="sidebar">
        <?= dmstr\widgets\Menu::widget([
            'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
            'items' => [
                ['label' => 'Главная', 'icon' => 'home', 'url' => ['/'], 'active' => $this->context->id == 'site',],
                ['label' => 'Сервисы', 'icon' => 'lock', 'url' => ['/internal-services/index'], 'active' => $this->context->id == 'internal-services',],
                ['label' => 'Наниматели', 'icon' => 'user', 'url' => ['/hirers/index'], 'active' => $this->context->id == 'hirers',],
                ['label' => 'Муниципалитет', 'icon' => 'building', 'url' => ['/municipality/index'], 'active' => $this->context->id == 'municipality',],
                ['label' => 'ОКПДТР', 'icon' => 'list', 'url' => ['/okpdtr/index'], 'active' => $this->context->id == 'okpdtr',],
                ['label' => 'ОКВЕД', 'icon' => 'list', 'url' => ['/okved/index'], 'active' => $this->context->id == 'okved',],
                ['label' => 'Вакансии', 'icon' => 'star', 'url' => ['/vacancies/index'], 'active' => $this->context->id == 'vacancies',],
            ],
        ]) ?>
    </section>
</aside>
