<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'Preferences', 'options' => ['class' => 'header']],
					['label' => 'Master Data', 'icon' => 'fa fa-file-code-o', 'url' => ['/master'], 'items'=> [
                        ['label' => 'Kelompok Wilayah', 'icon' => 'fa fa-university', 'url' => ['/master/kelompok-wilayah']],
                        ['label' => 'Anak Cabang', 'icon' => 'fa fa-building', 'url' => ['#'], 'items'=>[
                            ['label' => 'Data Anak Cabang', 'icon' => 'fa fa-street-view', 'url' => ['/master/anak-cabang']],
                            ['label' => 'Pengurus Anak Cabang', 'icon' => 'fa fa-tags', 'url' => ['/master/kepengurusan-anak-cabang']],
                        ]],
						['label' => 'Anggota', 'icon' => 'fa fa-user', 'url' => ['/master/anggota']],
						
                        
					]],
                    ['label' => 'SMS', 'icon' => 'fa fa-mixcloud', 'url' => ['#'], 'items'=> [
                        ['label' => 'Dasbor SMS', 'icon' => 'fa fa-bar-chart', 'url' => ['/pesan']],
                        
                    ]],

                    
                ],
            ]
        ) ?>

    </section>

</aside>
