<?php

namespace Sabberworm\CSS\Value;

class CSSFunction extends ValueList {

	private $sName;

	public function __construct($sName, $aArguments, $sSeparator = ',', $iLineNum = 0) {
		if($aArguments instanceof RuleValueList) {
			$sSeparator = $aArguments->getListSeparator();
			$aArguments = $aArguments->getListComponents();
		}
		$this->sName = $sName;
		$this->iLineNum = $iLineNum;
		parent::__construct($aArguments, $sSeparator, $iLineNum);
	}

	public function getName() {
		return $this->sName;
	}

	public function setName($sName) {
		$this->sName = $sName;
	}

	public function getArguments() {
		return $this->aComponents;
	}

	public function __toString() {
		return $this->render(new \Sabberworm\CSS\OutputFormat());
	}

	public function render(\Sabberworm\CSS\OutputFormat $oOutputFormat) {
		$aArguments = parent::render($oOutputFormat);
		return "{$this->sName}({$aArguments})";
	}

}