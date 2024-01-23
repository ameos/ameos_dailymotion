<?php

declare(strict_types=1);

namespace Ameos\AmeosDailymotion\Helpers;

use TYPO3\CMS\Core\Resource\File;
use TYPO3\CMS\Core\Resource\Folder;
use TYPO3\CMS\Core\Resource\OnlineMedia\Helpers\AbstractOEmbedHelper;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class DailymotionHelper extends AbstractOEmbedHelper
{
    /**
     * Get public url
     *
     * @param File $file
     * @param bool $relativeToCurrentScript
     * @return string|NULL
     */
    public function getPublicUrl(File $file, $relativeToCurrentScript = false)
    {
        $videoId = $this->getOnlineMediaId($file);
        return sprintf('http://dai.ly/%s', $videoId);
    }

    /**
     * Get local absolute file path to preview image
     *
     * @param File $file
     * @return string
     */
    public function getPreviewImage(File $file)
    {
        $videoId = $this->getOnlineMediaId($file);
        $temporaryFileName = $this->getTempFolderPath() . 'dailymotion_' . md5($videoId) . '.jpg';

        if (!file_exists($temporaryFileName)) {
            $previewImage = GeneralUtility::getUrl('http://www.dailymotion.com/thumbnail/video/' . $videoId);
            if ($previewImage !== false) {
                file_put_contents($temporaryFileName, $previewImage);
                GeneralUtility::fixPermissions($temporaryFileName);
            }
        }

        return $temporaryFileName;
    }

    /**
     * Try to transform given URL to a File
     *
     * @param string $url
     * @param Folder $targetFolder
     * @return File|NULL
     */
    public function transformUrlToFile($url, Folder $targetFolder)
    {
        // Try to get the DailyMotion code from given url.
        // These formats are supported with and without http(s)://
        // - http://dai.ly/<code>
        // - https://dai.ly/<code>
        // - http://www.dailymotion.com/video/<code>_<title>
        // - https://www.dailymotion.com/video/<code>_<title>
        if (preg_match('#(dai\.ly/|www\.dailymotion\.com/video/)([a-zA-Z0-9]*)#i', $url, $match)) {
            $videoId = $match[2];
        }

        if (empty($videoId)) {
            return null;
        }
        return $this->transformMediaIdToFile($videoId, $targetFolder, $this->extension);
    }

    /**
     * Get oEmbed url to retrieve oEmbed data
     *
     * @param string $mediaId
     * @param string $format
     * @return string
     */
    protected function getOEmbedUrl($mediaId, $format = 'json')
    {
        return sprintf(
            'https://www.dailymotion.com/services/oembed?url=%s&format=%s',
            urlencode(sprintf('https://dai.ly/%s', $mediaId)),
            rawurlencode($format)
        );
    }
}
