<?php

class StaticSiteContentItem extends ExternalContentItem {
	public function init() {
		$url = $this->externalId;
		$parentURL = $this->source->urlList()->parentURL($url);
		$this->Name = substr($url, strlen($parentURL));
		$this->Title = $this->Name;
		$this->AbsoluteURL = $this->source->BaseUrl . $this->externalId;
	} 	

	public function stageChildren($showAll = false) {
		if(!$this->source->urlList()->hasCrawled()) return new ArrayList;

		$childrenURLs = $this->source->urlList()->getChildren($this->externalId);

		$children = new ArrayList;
		foreach($childrenURLs as $child) {
			$children->push($this->source->getObject($child));
		}

		return $children;
	}

	public function numChildren() {
		if(!$this->source->urlList()->hasCrawled()) return 0;

		return sizeof($this->source->urlList()->getChildren($this->externalId));
	}

	public function getType() {
		return "sitetree";
	}
}