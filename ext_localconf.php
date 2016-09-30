<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

\TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Extbase\\SignalSlot\\Dispatcher')->connect(
	'GeorgRinger\\News\\Domain\\Service\\NewsImportService',
	'postHydrate',
	'GeorgRinger\\NewsImportextended\\Aspect\\NewsImportAspect',
	'postHydrate'
);

\TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Extbase\\SignalSlot\\Dispatcher')->connect(
    'GeorgRinger\\News\\Domain\\Service\\NewsImportService',
    'preHydrate',
    'GeorgRinger\\NewsImportextended\\Aspect\\NewsImportAspect',
    'preHydrate'
);
