<?php
namespace FutureActivities\CustomerOrders\Model;

class OrdersManagement implements \FutureActivities\CustomerOrders\Api\OrdersManagementInterface
{
    protected $orderCollectionFactory;
    
    public function __construct(\Magento\Sales\Model\ResourceModel\Order\CollectionFactory $orderCollectionFactory)
    {
        $this->orderCollectionFactory = $orderCollectionFactory;
    }
       
    /**
    * {@inheritdoc}
    */
    public function getOrdersForCustomer($customerId)
    {
        $orders = $this->orderCollectionFactory->create()->addFieldToSelect('*')
            ->addFieldToFilter('customer_id', $customerId)
            ->setOrder('created_at', 'desc');
        
        $result = [];
        foreach($orders AS $order)
            $result[] = $order;
        
        return $result;
    }
}