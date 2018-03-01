<?php
namespace FutureActivities\CustomerOrders\Model;

class OrdersManagement implements \FutureActivities\CustomerOrders\Api\OrdersManagementInterface
{
    protected $orderCollectionFactory;
    protected $orderRepository;
    
    public function __construct(\Magento\Sales\Model\ResourceModel\Order\CollectionFactory $orderCollectionFactory, \Magento\Sales\Api\OrderRepositoryInterface $orderRepository)
    {
        $this->orderCollectionFactory = $orderCollectionFactory;
        $this->orderRepository = $orderRepository;
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
    
    /**
    * {@inheritdoc}
    */
    public function getOrderAddresses($customerId, $orderId)
    {
        $order = $this->orderRepository->get($orderId);
        if ($order->getCustomerId() != $customerId)
            return;
            
        return [
            $order->getShippingAddress(),
            $order->getBillingAddress()
        ];
    }
}