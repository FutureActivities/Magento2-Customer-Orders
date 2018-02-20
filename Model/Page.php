<?php
namespace Nzime\Api\Model;

use \Nzime\Api\Helper\Data;
use \Nzime\Api\Model\PageResult;

class Page implements \Nzime\Api\Api\PageInterface
{
    protected $store;
    protected $helper;
    
    public function __construct(Data $helper, \Magento\Store\Model\StoreManagerInterface $store)
    {
        $this->store = $store;
        $this->helper = $helper;
    }
       
   /**
    * Return details about a page using its URL key
    *
    * @api
    * @param string $param
    * @return \Nzime\Api\Api\Data\PageResultInterface
    */
    public function getByUrlKey($param)
    {
        // Magento is struggling (2.1) with escaped forward slashes in the parameter
        // So we expect forward slashes as double semi-colons instead.
        $param = str_replace(';;', '/', $param);

        $rewrite = $this->helper->getObjectByKey($param, $this->store->getStore()->getId());
        
        if (!$rewrite)
            throw new \Magento\Framework\Exception\NotFoundException(__('Page not found'));
            
        $result = new PageResult();
        $result->setType($rewrite->getEntityType());
        $result->setId($rewrite->getEntityId());
        
        return $result;
    }
}