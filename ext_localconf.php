<?php

use Ameos\AmeosDailymotion\Helpers\DailymotionHelper;
use Ameos\AmeosDailymotion\Rendering\DailymotionRenderer;
use TYPO3\CMS\Core\Resource\Rendering\RendererRegistry;
use TYPO3\CMS\Core\Utility\GeneralUtility;

defined('TYPO3') or die('Access denied');

call_user_func(function() {
    // Register dailymotion online video service
    $GLOBALS['TYPO3_CONF_VARS']['SYS']['fal']['onlineMediaHelpers']['dailymotion'] = DailymotionHelper::class;

    $rendererRegistry = GeneralUtility::makeInstance(RendererRegistry::class);
    $rendererRegistry->registerRendererClass(DailymotionRenderer::class);

    // Register an custom mime-type for your videos
    $GLOBALS['TYPO3_CONF_VARS']['SYS']['FileInfo']['fileExtensionToMimeType']['dailymotion'] = 'video/dailymotion';

    // Register your custom file extension as allowed media file
    $GLOBALS['TYPO3_CONF_VARS']['SYS']['mediafile_ext'] .= ',dailymotion';
});
