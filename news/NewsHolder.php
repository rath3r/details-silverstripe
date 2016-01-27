<?php

/**
 * Representation of a News Holder page.
 *
 * More details in the details/README.md file
 *
 * @author Thomas Meehan
 * @package Details page
 */
class NewsHolder extends Page {

    private static $allowed_children = array(
        'NewsArticle',
    );

    public function getLumberjackTitle(){
        return "News Articles";
    }

    static $has_one = array(
        'HolderBannerImage' => 'Image',
    );

    public function getCMSFields() {

        $fields = parent::getCMSFields();

        $fields->removeFieldFromTab("Root.Main","Content");

        $uploadField = new UploadField(
            $name = 'HolderBannerImage',
            $title = 'Please upload a banner image'
        );
        $fields->addFieldToTab(
            'Root.Main',
            $uploadField
        );
        $uploadField->setFolderName('bannerImage');

        return $fields;
    }

}

class NewsHolder_Controller extends Page_Controller {

    /**
     * An array of actions that can be accessed via a request. Each array element should be an action name, and the
     * permissions or conditions required to allow the user to access it.
     *
     * <code>
     * array (
     *     'action', // anyone can access this action
     *     'action' => true, // same as above
     *     'action' => 'ADMIN', // you must have ADMIN permissions to access this action
     *     'action' => '->checkAction' // you can only access this action if $this->checkAction() returns true
     * );
     * </code>
     *
     * @var array
     */
    private static $allowed_actions = array ();

    public function init() {
        parent::init();
        // You can include any CSS or JS required by your project here.
        // See: http://doc.silverstripe.org/framework/en/reference/requirements
    }

}
