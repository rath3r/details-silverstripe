<?php

/**
 * Class NewsTag
 *
 * This is a class that looks after the relational tagging system so that related articles can be pulled into different
 * pages.
 */
class NewsTag extends DataObject {

    /**
     * The database columns for this object
     *
     * @var array
     */
    private static $db = array(
        'Title' => 'Varchar(200)',
    );

    /**
     * The many many relations used by this class tag.
     *
     * @var array
     */
    private static $belongs_many_many = array(
        'NewsArticles' => 'NewsArticle'
    );
}