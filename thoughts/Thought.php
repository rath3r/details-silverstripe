<?php

/**
 * Representation of a Thought details page.
 *
 * More details in the details/README.md file
 *
 * @author Thomas Meehan
 * @package Details page
 */
class Thought extends Page {

    private static $show_in_sitetree = false;

    private static $allowed_children = array();

    /**
     * For some reason this can't be set in the config.yml
     *
     * @var bool allow as a page at the root level
     */
    private static $can_be_root = false;

    /**
     * DB Columns
     *
     * Summary text to be used in the listing pages
     * Date published to help order the pages
     *
     * @var array
     * @config
     */
    static $db = array(
        'Summary'       => 'HTMLText',
        'DatePublished' => 'Date',
    );

    /**
     * Has One relations
     *
     * Image to use on the listing
     *
     * @var array
     * @config
     */
    static $has_one = array(
        'ArticleSummaryImage'   => 'Image',
    );

    /**
     * Many many relations need some more investigation
     *
     * @var array
     */
    private static $many_many = array(
        'ThoughtTags' => 'ThoughtTag'
    );

    /**
     * Edit the cms fields in the CMS
     *
     * @return FieldList
     */
    public function getCMSFields() {

        $fields = parent::getCMSFields();

        $fields->addFieldToTab(
            'Root.Main',
            DateField::create('DatePublished', 'Enter a published date')->setConfig('dateformat', 'dd-MM-yyyy')->setConfig('dmyseparator', ' ')->setConfig('showcalendar', true)
        );

        $fields->addFieldToTab(
            'Root.Main',
            $uploadField = new UploadField(
                $name = 'ArticleSummaryImage',
                $title = 'Upload an article summary image'
            )
        );

        $fields->addFieldToTab('Root.Main', new HTMLEditorField('Summary', 'Summary'));

        $tagfield = TagField::create(
            'ThoughtTags',
            'Thought Tags',
            ThoughtTag::get(),
            $this->ThoughtTags()
        )->setShouldLazyLoad(true)->setCanCreate(true);

        $fields->addFieldToTab(
            'Root.Main',
            $tagfield
        );

        return $fields;
    }
}

