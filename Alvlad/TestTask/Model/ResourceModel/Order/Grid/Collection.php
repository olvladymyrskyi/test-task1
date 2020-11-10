<?php
namespace Alvlad\TestTask\Model\ResourceModel\Order\Grid;

use Magento\Sales\Model\ResourceModel\Order\Grid\Collection as OriginalCollection;

/**
 * Order grid extended collection
 */
class Collection extends OriginalCollection
{
    protected function _renderFiltersBefore()
    {
        $joinTable = $this->getTable('sales_order');
        $this->getSelect()->joinLeft($joinTable, 'main_table.entity_id = sales_order.entity_id', ['coupon_code', 'discount_amount']);
        parent::_renderFiltersBefore();
    }
}