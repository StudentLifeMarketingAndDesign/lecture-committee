<?php

use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldAddNewButton;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use SilverStripe\Forms\GridField\GridFieldDeleteAction;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\Security\Permission;
use UndefinedOffset\SortableGridField\Forms\GridFieldSortableRows;

class HomePage extends Page {

	private static $db = array(
		'Announcement' => 'HTMLText',

	);

	private static $has_one = array(

	);

	private static $has_many = array(

	);

	public function getCMSFields() {
		$f = parent::getCMSFields();
		$contentField = $f->dataFieldByName('Content');
		$contentField->setRows(2);
		$f->removeByName("Content");
		$f->removeByName("BackgroundImage");
		$f->removeByName("InheritSidebarItems");
		$f->removeByName("SidebarLabel");
		$f->removeByName("SidebarItem");
		$f->removeByName("Metadata");
		$gridFieldConfig = GridFieldConfig_RecordEditor::create();
		$gridFieldConfig->addComponent(new GridFieldSortableRows('SortOrder'));

		$gridFieldConfig2 = GridFieldConfig_RecordEditor::create();
		$gridFieldConfig2->addComponent(new GridFieldSortableRows('SortOrder'));

		if (!Permission::check('ADMIN')) {
			$gridFieldConfig->removeComponentsByType(GridFieldAddNewButton::class);
			$gridFieldConfig->removeComponentsByType(GridFieldDeleteAction::class);
		}

		$f->addFieldToTab("Root.Main", new HTMLEditorField('Announcement'));

		$homePageQuicklink = new GridField("HomePageQuicklink", "Home Page Quick Links", HomePageQuicklink::get(), $gridFieldConfig);

		$f->addFieldToTab("Root.Main", $homePageQuicklink);

		return $f;
	}
}
