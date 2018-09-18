<?php
/**
 * Created by PhpStorm.
 * User: blazejdoleska
 * Date: 05/09/2018
 * Time: 15:28
 */
namespace MageSuite\PageCacheWarmer\Observer;

class CacheFlush implements \Magento\Framework\Event\ObserverInterface
{

    /**
     * @var \Magento\Framework\App\Config\ScopeConfigInterface
     */
    private $scopeConfig;
    /**
     * @var \MageSuite\PageCacheWarmer\Service\CronScheduler
     */
    private $cronScheduler;

    public function __construct(
        \MageSuite\PageCacheWarmer\Service\CronScheduler $cronScheduler,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
    )
    {
        $this->scopeConfig = $scopeConfig;
        $this->cronScheduler = $cronScheduler;
    }

    /**
     * @param \Magento\Framework\Event\Observer $observer
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        if (!$this->scopeConfig->getValue('cache_warmer/general/enabled')){
            return;
        }

        $this->cronScheduler->schedule();
    }
}