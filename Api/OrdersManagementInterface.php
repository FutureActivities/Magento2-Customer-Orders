<?php
namespace FutureActivities\CustomerOrders\Api;
 
interface OrdersManagementInterface
{
   /**
    * Return details about a page using its URL key
    *
    * @api
    * @param string $customerId
    * @return \Magento\Sales\Api\Data\OrderInterface[]
    */
   public function getOrdersForCustomer($customerId);
   
   /**
    * Returns the shipping & billing addresses for a specific order
    *
    * @api
    * @param string $customerId
    * @param int $orderId
    * @return \Magento\Sales\Api\Data\OrderAddressInterface[]
    */
   public function getOrderAddresses($customerId, $orderId);
}