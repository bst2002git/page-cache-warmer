<?php
namespace MageSuite\PageCacheWarmer\Model\ResourceModel\Entity;

class Urls extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    public function _construct()
    {
        $this->_init('varnish_cache_url_tags', 'id');
    }
}