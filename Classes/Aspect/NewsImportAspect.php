<?php

namespace GeorgRinger\NewsImportextended\Aspect;

use TYPO3\CMS\Core\Database\DatabaseConnection;

class NewsImportAspect
{

    public function preHydrate(array $importItem)
    {
        $row = $this->getDatabaseConnection()->exec_SELECTgetSingleRow('*', 'tt_news', 'uid=' . $importItem['import_id']);
        if (!empty($row['news_files']) && !empty($row['tx_lonewsdownloads_downloadlabel'])) {
            $allFileTitles = explode(LF, $row['tx_lonewsdownloads_downloadlabel']);
            foreach ($importItem['related_files'] as $key => &$file) {
                $file['title'] = $allFileTitles[$key];
            }
        }
        $return = ['importItem' => $importItem];

        return $return;
    }

    /**
     * @param array $importData
     * @param \GeorgRinger\News\Domain\Model\News $news
     * @return void
     */
    public function postHydrate(array $importData, $news)
    {
        /** @var \GeorgRinger\NewsFeuser\Domain\Model\News $news */
        if ($importData['import_source'] === 'TT_NEWS_IMPORT') {
            $row = $this->getDatabaseConnection()->exec_SELECTgetSingleRow('*', 'tt_news', 'uid=' . $importData['import_id']);
            if (!empty($row['tx_newsauthorrel_author'])) {
                $news->setTxNewsfeuserUser($row['tx_newsauthorrel_author']);
            }
        }
    }

    /**
     * @return DatabaseConnection
     */
    protected function getDatabaseConnection()
    {
        return $GLOBALS['TYPO3_DB'];
    }
}