<?php 
// set the contextual sorting items
echo $this->Element('context_sort', array(
    'context_sort' => array(
        'type' => 'select',
        'sorter' => array(array(
            'heading' => '',
            'items' => array(
                $this->Paginator->sort('name'),
                $this->Paginator->sort('created'),
                )
            )), 
        )
	)); 

echo $this->Element('forms/search', array(
	'url' => '/contacts/contacts/tasks/', 
	'inputs' => array(
		array(
			'name' => 'contains:name', 
			'options' => array(
				'label' => '', 
				'placeholder' => 'Type Your Search and Hit Enter',
				'value' => !empty($this->request->params['named']['contains']) ? substr($this->request->params['named']['contains'], strpos($this->request->params['named']['contains'], ':') + 1) : null,
				)
			),
		)
	));

echo $this->Element('scaffolds/index', array('data' => $tasks));


// set the contextual menu items
$this->set('context_menu', array('menus' => array(
	array(
		'heading' => '',
		'items' => array(
			$this->Html->link(__('Dashboard'), array('plugin' => 'contacts', 'controller'=> 'contacts', 'action' => 'dashboard')),
			),
		),
	array(
		'heading' => '',
		'items' => array(
			$this->Html->link(__('All'), array('plugin' => 'contacts', 'controller'=> 'contacts', 'action' => 'index')),
			$this->Html->link(__('Leads'), array('plugin' => 'contacts', 'controller'=> 'contacts', 'action' => 'index', 'filter' => 'contact_type:lead')),
			$this->Html->link(__('Companies'), '/contacts/contacts/index/filter:is_company:1/filter:contact_type:customer'),
			$this->Html->link(__('People'), '/contacts/contacts/index/filter:is_company:0/filter:contact_type:customer'),
			),
		),
	array(
		'heading' => '',
		'items' => array(
			$this->Html->link(__('Add'), array('plugin' => 'contacts', 'controller'=> 'contacts', 'action' => 'add')),
			),
		),
	))); ?>