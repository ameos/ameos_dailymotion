<?php
if (!defined('TYPO3_MODE')) { die ('Access denied.'); }

call_user_func(function() {
    // Register dailymotion online video service
    $GLOBALS['TYPO3_CONF_VARS']['SYS']['fal']['onlineMediaHelpers']['dailymotion'] = 
        \Ameos\AmeosDailymotion\Helpers\DailymotionHelper::class;

    /** @var \TYPO3\CMS\Core\Resource\Rendering\RendererRegistry $rendererRegistry */
    $rendererRegistry = \TYPO3\CMS\Core\Resource\Rendering\RendererRegistry::getInstance();
    $rendererRegistry->registerRendererClass(\Ameos\AmeosDailymotion\Rendering\DailymotionRenderer::class);

    // Register an custom mime-type for your videos
    $GLOBALS['TYPO3_CONF_VARS']['SYS']['FileInfo']['fileExtensionToMimeType']['dailymotion'] = 'video/dailymotion';

    // Register your custom file extension as allowed media file
    $GLOBALS['TYPO3_CONF_VARS']['SYS']['mediafile_ext'] .= ',dailymotion';
});