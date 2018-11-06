<?php

namespace Inferno\InfernoBlocks\Blocks;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\Forms\TextField;
use SilverStripe\ORM\DataObject;
use TractorCow\Colorpicker\Forms\ColorField;
use Inferno\InfernoElemental\Element\ElementBlockExtension;

class Blocks extends DataObject {

    private static $table_name = 'Blocks';

    private static $db = [
        'Title' => 'Varchar(255)',
        'SortOrder' => 'Int',
        'BackgroundColor' => 'Color',
        'TextColor' => 'Color',
        'ColumnsWidth' => 'Varchar(255)',
        'Text' => 'HTMLText',
        'Padding' => 'Varchar(255)'

    ];

    private static $has_one = ['BlockRow' => ElementBlockExtension::class];

    private static $has_many = [];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
            $ColumnWidthArray = ['col-md'=> 'Auto', 'col-md-2' => '2 Column width', 'col-md-3' => '3 Column width', 'col-md-4' => '4 Column width',
                'col-md-5' => '5 Column width', 'col-md-6' => '6 Column width', 'col-md-7' => '7 Column width', 'col-md-8' => '8 Column width'];
        $fields->addFieldToTab('Root.Main', TextField::create('Title', 'Title'));
        $fields->addFieldToTab('Root.Main', ColorField::create('BackgroundColor', 'Background Color'));
        $fields->addFieldToTab('Root.Main', ColorField::create('TextColor','Text Color'));
        $fields->addFieldToTab('Root.Main', DropdownField::create('ColumnsWidth', 'Column Width', $ColumnWidthArray));
        $fields->addFieldToTab('Root.Main', TextField::create('Padding', 'Block Padding'));
        $fields->addFieldToTab('Root.Main', HTMLEditorField::create('Text', 'Content for block'));
        $fields->removeFieldFromTab('Root.Main','SortOrder');

        return $fields;
    }

    private static $summary_fields = array(
        'Title' => 'Title',
        'ColumnsWidth' => 'Column Width'
    );
}
