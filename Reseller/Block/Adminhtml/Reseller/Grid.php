<?php
class Procab_Reseller_Block_Adminhtml_Reseller_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
  public function __construct()
  {
      parent::__construct();
      $this->setId('resellerGrid');
      $this->setDefaultSort('reseller_id');
      $this->setDefaultDir('ASC');
      $this->setSaveParametersInSession(true);
  }

  protected function _prepareCollection()
  {
      $collection = Mage::getModel('reseller/reseller')->getCollection();
      $this->setCollection($collection);
      return parent::_prepareCollection();
  }

  protected function _prepareColumns()
  {
      $this->addColumn('reseller_id', array(
          'header'    => Mage::helper('reseller')->__('ID'),
          'align'     =>'right',
          'width'     => '50px',
          'index'     => 'reseller_id',
      ));

      $this->addColumn('reseller_name', array(
          'header'    => Mage::helper('reseller')->__('Name'),
          'align'     =>'left',
          'index'     => 'reseller_name',
      ));

	  /*
      $this->addColumn('content', array(
			'header'    => Mage::helper('reseller')->__('Item Content'),
			'width'     => '150px',
			'index'     => 'content',
      ));
	  */

      $this->addColumn('reseller_status', array(
          'header'    => Mage::helper('reseller')->__('Status'),
          'align'     => 'left',
          'width'     => '80px',
          'index'     => 'reseller_status',
          'type'      => 'options',
          'options'   => array(
              1 => 'Enabled',
              2 => 'Disabled',
          ),
      ));
	  
        $this->addColumn('action',
            array(
                'header'    =>  Mage::helper('reseller')->__('Action'),
                'width'     => '100',
                'type'      => 'action',
                'getter'    => 'getId',
                'actions'   => array(
                    array(
                        'caption'   => Mage::helper('reseller')->__('Edit'),
                        'url'       => array('base'=> '*/*/edit'),
                        'field'     => 'id'
                    )
                ),
                'filter'    => false,
                'sortable'  => false,
                'index'     => 'stores',
                'is_system' => true,
        ));
		
		$this->addExportType('*/*/exportCsv', Mage::helper('reseller')->__('CSV'));
		$this->addExportType('*/*/exportXml', Mage::helper('reseller')->__('XML'));
	  
      return parent::_prepareColumns();
  }

    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('reseller_id');
        $this->getMassactionBlock()->setFormFieldName('reseller');

        $this->getMassactionBlock()->addItem('delete', array(
             'label'    => Mage::helper('reseller')->__('Delete'),
             'url'      => $this->getUrl('*/*/massDelete'),
             'confirm'  => Mage::helper('reseller')->__('Are you sure?')
        ));

        $statuses = Mage::getSingleton('reseller/status')->getOptionArray();

        array_unshift($statuses, array('label'=>'', 'value'=>''));
        $this->getMassactionBlock()->addItem('status', array(
             'label'=> Mage::helper('reseller')->__('Change status'),
             'url'  => $this->getUrl('*/*/massStatus', array('_current'=>true)),
             'additional' => array(
                    'visibility' => array(
                         'name' => 'status',
                         'type' => 'select',
                         'class' => 'required-entry',
                         'label' => Mage::helper('reseller')->__('Status'),
                         'values' => $statuses
                     )
             )
        ));
        return $this;
    }

  public function getRowUrl($row)
  {
      return $this->getUrl('*/*/edit', array('id' => $row->getId()));
  }

}