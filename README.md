# Details Pages

Pages that can be used as details pages for a [Silverstripe](http://www.silverstripe.org/) site.

Representation of a details page for the Citco.

Here are the details of the steps I have taken to create a solution.

I wanted to first use a DataObject so that a ModelAdmin could be used rather than displaying them as subpages in
SiteTree. Therefore I have decided to use the Lumberjack as a method to display subpages in a grid field rather that
subpages.

A requirement is also for certain details pages to be displayed on other pages so another module tag field has been 
added.

Notes:

Could be used to add a url slug
https://www.silverstripe.org/community/forums/data-model-questions/show/8526?start=0

URLSegmentFilter in /Users/tmeehan/work/dev.citco.com/framework/model/URLSegmentFilter.php
This should call for the creation of browser safe urls from the title.

A data object as a page
https://gist.github.com/Zauberfisch/9460395
Could provide some good pointers

DataObjects as pages
https://www.silverstripe.org/learn/lessons/controller-actions-dataobjects-as-pages

Change of heart
Use a plugin to treat pages as dataobjects in the cms
https://github.com/micmania1/silverstripe-lumberjack

## Required Modules

### Lumberjack

[silverstripe-lumberjack](https://github.com/micmania1/silverstripe-lumberjack)

#### Installation

    composer require micmania1/silverstripe-lumberjack

### Tag Field

[silverstripe-tagfield](https://github.com/silverstripe-labs/silverstripe-tagfield)

#### Installation

    composer require silverstripe/tagfield

## Configuration

Add this to the config.yml to enable Lumberjack

    NewsHolder:
      extensions:
        - 'Lumberjack'
    
    
    EventHolder:
      extensions:
        - 'Lumberjack'
      allowed_children:
        - Event
    
    
    ThoughtHolder:
      extensions:
        - 'Lumberjack'
      allowed_children:
        - Thought

