<?php

return array(
    'view_manager' => array(
        'template_path_stack' => array(
            'zff-table' => __DIR__ .  '/../view',
        ),
         'template_map' => array(
            'paginator-slide2' => __DIR__ . '/../view/layout/slidePaginator.phtml',
        ),
       
        
    ),
    
    'controllers' => array(
        'invokables' => array(
            'ZfTable\Controller\Table' => 'ZfTable\Controller\TableController',
        ),
    ),
    'service_manager' => array(
        'aliases' => array(
            'zfdb_adapter' => 'Zend\Db\Adapter\Adapter',
        ),
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

    
);

