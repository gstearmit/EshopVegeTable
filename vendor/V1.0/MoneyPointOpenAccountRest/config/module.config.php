<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'MoneyPointOpenAccountRest\Controller\OpenAccount' => 'MoneyPointOpenAccountRest\Controller\OpenAccountController',
        	'MoneyPointOpenAccountRest\Controller\UploadFile'=>	'MoneyPointOpenAccountRest\Controller\UploadFileController',
        	'MoneyPointOpenAccountRest\Controller\UploadFileStepOne' =>	'MoneyPointOpenAccountRest\Controller\UploadFileStepOneController',
        	'MoneyPointOpenAccountRest\Controller\UploadFileStepTwo' =>	'MoneyPointOpenAccountRest\Controller\UploadFileStepTwoController',
        ),
    ),
 
    'router' => array(
        'routes' => array(
            'MoneyPointOpenAccountRest-OpenAccount' => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/v1-open-account[/:id]',
                    'constraints' => array(
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'MoneyPointOpenAccountRest\Controller\OpenAccount',
                    ),
                ),
            ),
        		
        		# 'route'    => '/ecosystem/:ecosystem/project/:project/seed/:seed/module[/:action][/:id]',
                # http://stackoverflow.com/questions/21306720/uploading-image-from-android-to-php-server    
                    
        	'MoneyPointOpenAccountRest-OpenAccount-upload' => array(
        				'type'    => 'Segment',
        				'options' => array(
        						'route'    => '/v1-upload-file-verify[/:id]',
        						'constraints' => array(
        								'id'     => '[0-9]+',
        						),
        						'defaults' => array(
        								'controller' => 'MoneyPointOpenAccountRest\Controller\UploadFile',
        						),
        				),
        		),

          // Step 1
        		'MoneyPointOpenAccountRest-OpenAccount-step-one' => array(
        				'type'    => 'Segment',
        				'options' => array(
        						'route'    => '/v1-upload-file-document-step-one[/:id]',
        						'constraints' => array(
        								'id'     => '[0-9]+',
        						),
        						'defaults' => array(
        								'controller' => 'MoneyPointOpenAccountRest\Controller\UploadFileStepOne',
        						),
        				),
        		),
        		
        //UploadFileStepTwo		
        		'MoneyPointOpenAccountRest-OpenAccount-step-two' => array(
        				'type'    => 'Segment',
        				'options' => array(
        						'route'    => '/v1-upload-file-document-step-two[/:id]',
        						'constraints' => array(
        								'id'     => '[0-9]+',
        						),
        						'defaults' => array(
        								'controller' => 'MoneyPointOpenAccountRest\Controller\UploadFileStepTwo',
        						),
        				),
        		),
        		
        ),
    ),
    'view_manager' => array(
        'strategies' => array(
            'ViewJsonStrategy',
        ),
    	'template_path_stack' => array(
    				'money-point-open-account-rest' => __DIR__ . '/../view',
    		),
    		'template_map' => array( 
    		),
    ),
);