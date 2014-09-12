<?php
namespace ZfTable;

return array(
    
    'asset_manager' => array(
        'resolver_configs' => array(
            
            'map' => array(
                
                /*ZF TABLE*/
                'js/zf-table.js' => __DIR__ . '/../src/ZfTable/Public/js/zf-table.js',
                'css/zf-table/zf-table.css' => __DIR__ . '/../src/ZfTable/Public/css/zf-table/zf-table.css',
                'img/zf-table/ajax-loader.gif' => __DIR__ . '/../src/ZfTable/Public/img/zf-table/ajax-loader.gif',
                
                /*DATA TABLE*/
                'js/DT_bootstrap_2.js' => __DIR__ . '/../src/ZfTable/Public/js/DT_bootstrap_2.js',
                'js/DT_bootstrap_3.js' => __DIR__ . '/../src/ZfTable/Public/js/DT_bootstrap_3.js',
                'js/jquery.dataTables.min.js' => __DIR__ . '/../src/ZfTable/Public/js/jquery.dataTables.min.js',
                
                'img/datatable/back_disabled.png' => __DIR__ . '/../src/ZfTable/Public/img/datatable/back_disabled.png',
                'img/datatable/back_enabled.png' => __DIR__ . '/../src/ZfTable/Public/img/datatable/back_enabled.png',
                'img/datatable/back_enabled_hover.png' => __DIR__ . '/../src/ZfTable/Public/img/datatable/back_enabled_hover.png',
                'img/datatable/forward_disabled.png' => __DIR__ . '/../src/ZfTable/Public/img/datatable/forward_disabled.png',
                'img/datatable/forward_enabled.png' => __DIR__ . '/../src/ZfTable/Public/img/datatable/forward_enabled.png',
                'img/datatable/forward_enabled_hover.png' => __DIR__ . '/../src/ZfTable/Public/img/datatable/forward_enabled_hover.png',
                'img/datatable/sort_asc_disabled.png' => __DIR__ . '/../src/ZfTable/Public/img/datatable/sort_asc_disabled.png',
                'img/datatable/sort_both.png' => __DIR__ . '/../src/ZfTable/Public/img/datatable/sort_both.png',
                'img/datatable/sort_desc.png' => __DIR__ . '/../src/ZfTable/Public/img/datatable/sort_desc.png',
                'img/datatable/sort_desc_disabled.png' => __DIR__ . '/../src/ZfTable/Public/img/datatable/sort_desc_disabled.png',
                'img/datatable/sort_asc.png' => __DIR__ . '/../src/ZfTable/Public/img/datatable/sort_asc.png',
                
                /*BOOTSTRAP*/
                'css/bootstrap-3.0.0/bootstrap.min.css' => __DIR__ . '/../src/ZfTable/Public/css/bootstrap-3.0.0/bootstrap.min.css',
                
            ),
            
            
            
        ),
    ),
    
    'view_manager' => array(
        'template_path_stack' => array(
            'zf-table' => __DIR__ .  '/../view',
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'ZfTable\Controller\Table' => 'ZfTable\Controller\TableController',
        ),
    ),
    'service_manager' => array(
        
    ),
    
    // The following section is new and should be added to your file
    'router' => array(
        'routes' => array(
            'zftable'=> array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/table[/][:action]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ),
                    'defaults' => array(
                        'controller' => 'ZfTable\Controller\Table',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),
    
    // Doctrine config
    'doctrine' => array(
        'driver' => array(
            'application_entities' => array(
                'class' =>'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/ZfTable/Entity')
              ),
            'orm_default' => array(
                'drivers' => array(
                  'ZfTable\Entity' => 'application_entities'
                )
            )
        )
    )

    
);

