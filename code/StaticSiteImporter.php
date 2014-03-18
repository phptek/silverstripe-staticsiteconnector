<?php
/**
 * 
 * @package staticsiteconnector
 * @author Sam Minee <sam@silverstripe.com>
 * @author Science Ninjas <scienceninjas@silverstripe.com>
 * @see \ExternalContentImporter
 */
class StaticSiteImporter extends ExternalContentImporter {
	
	/**
	 * 
	 * @return void
	 */
	public function __construct() {
		$this->contentTransforms['sitetree'] = new StaticSitePageTransformer();
		$this->contentTransforms['file'] = new StaticSiteFileTransformer();
	}

	/**
	 * 
	 * @param StaticSiteContentItem $item
	 * @return string
	 */
	public function getExternalType($item) {
		return $item->getType();
	}
}
