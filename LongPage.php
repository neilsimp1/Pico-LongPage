<?php

	/**
	* Pico LongPage Plugin
	*
	* @author Neil Simpson
	* @license http://opensource.org/licenses/MIT
	* @version 1.0
	*/ 
	class LongPage extends AbstractPicoPlugin {
		
		public $config = [];
		public $offset = 0;
		public $page_number = 0;
		public $total_pages = 1;
		public $paged_pages = [];
		
		public function __construct(Pico $pico) {
			parent::__construct($pico);
		}
		
		public function onConfigLoaded(&$settings) {
			
		}
		
		public function onPagesLoaded(&$pages, &$currentPage, &$previousPage, &$nextPage) {
			
		}
		
		public function onPageRendering(&$twig, &$twigVariables, &$templateName) {
			
		}
		
		public function onRequestUrl(&$url) {
			
		}
	}

?>
