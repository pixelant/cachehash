<?php

declare(strict_types=1);

namespace Pixelant\CacheHash\Hook;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;
use TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController;

/**
 * Class for inserting additional keys into a generated cache hash.
 */
class CreateHashBaseHook
{
    /**
     * @param array $params
     * @param TypoScriptFrontendController $frontendController
     */
    public function createHashBase(array &$params, TypoScriptFrontendController $frontendController)
    {
        /** @var ContentObjectRenderer $renderer */
        $renderer = GeneralUtility::makeInstance(ContentObjectRenderer::class);

        $renderer->start($params);

        foreach ($frontendController->config['config']['tx_cachehash.']['parameters.'] as $key => $value) {
            $nodotKey = rtrim($key,'.');

            // If value is static and there is no stdWrap processing array.
            if (
                $key === $nodotKey
                && !isset($frontendController->config['config']['tx_cachehash.']['parameters.'][$nodotKey . '.'])
            ) {
                $params['hashParameters'][$nodotKey] =
                    (string)$frontendController->config['config']['tx_cachehash.']['parameters.'][$key];
                continue;
            }

            $params['hashParameters'][$nodotKey] = $renderer->stdWrap(
                $frontendController->config['config']['tx_cachehash.']['parameters.'][$nodotKey] ?? '',
                $value
            );
        }
    }
}
