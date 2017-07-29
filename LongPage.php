<?php

	/**
	* Pico LongPage Plugin
	*
	* @author Neil Simpson
	* @license http://opensource.org/licenses/MIT
	* @version 1.0
	*/ 
	class LongPage extends AbstractPicoPlugin {

        private $isLongPage = false;
        private $headers = [];

        public function __construct(Pico $pico) {
			parent::__construct($pico);
		}

        public function onMetaParsed(array &$meta) {
            if(isset($meta["islongpage"]) && $meta["islongpage"]) $this->isLongPage = true;
        }

        public function onContentParsing(&$rawContent) {
            if($this->isLongPage){                
                $rawContent = $this->addIdsToH2s($rawContent);
            }
            $asd= 123;
        }

        public function onPagesLoaded(array &$pages, array &$currentPage = null, array &$previousPage = null, array &$nextPage = null) {
            $currentPage["meta"]["headers"] = $this->headers;
        }


        private function addIdsToH2s($rawContent) {
            $newContent = "";
            foreach(preg_split("/((\r?\n)|(\r\n?))/", $rawContent) as $line){
                if(count($line > 3) && $line && $line[0] === "#" && $line[1] === "#"){
                    $properTitle = substr($line, 3);
                    $id = $this->toCamelCase($properTitle);
                    array_push($this->headers, ["id" => $id, "header" => $properTitle]);
                    $newContent .= "<h2 id=\"$id\">$properTitle</h2>\n";
                }
                else $newContent .= $line."\n";
            }

            return $newContent;
        }

        private function toCamelCase($str) {
            $str = str_replace("-", "", ucwords($str, "-"));
            $str = str_replace(" ", "", ucwords($str, " "));
            $str = lcfirst($str);

            return $str;
        }
	}

?>
