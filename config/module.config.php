<?php
namespace ZfTable;

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

