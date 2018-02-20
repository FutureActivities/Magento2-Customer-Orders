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
}