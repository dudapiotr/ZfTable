<?php

return array(
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

    
);

