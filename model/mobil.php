<?php
	
	/*
	*
	* Pavel Ladygin / http://digitorum.ru
	*
	* Free for use.
	* 
	* thnx to http://www.zytrax.com/
	*
	*/
	
	Class Mobile_Checker {
		
		/*
		* ????????? ??? ????????
		*/
		private $userAgent = '';
		
		/*
		* ??????????? ?????????
		*/ 
		private $httpAccept = '';
		
		/*
		* "?????????" ????????? ??????????
		*/
		private $mobileDetected = null;
		
		/*
		* ?????????? ??? ????????? ????????
		*/
		private $mobileUserAgentsPatterns = array();
		
		/*
		* ???????????, ?? ???? ????????? ????????? ? ????????? ( $_SERVER['HTTP_ACCEPT'] )
		*/
		public function __construct($userAgent = '', $httpAccept = '') {
			$this->userAgent = $userAgent;
			$this->httpAccept = $httpAccept;
			
			/*
			* ????????? ????????
			*/
			$this->mobileUserAgentsPatterns = array(
				'Windows Phone 7' => '#(zunewp7|xblwp7|windows phone os 7)#i',
				'Windows Mobile' => '#(iris|3g_t|windows ce|iemobile|windows phone 6|windows mobile/6)#i',
				'Playstation' => '#(playstation|psp )#i',
				'Android' => '#android#i',
				'iPhone' => '#iPhone#i',
				'iPad' => '#ipad#i',
				'iPod' => '#ipod#i',
				'Kindle' => '#kindle#i',
				'Blackberry' => '#blackberry#i',
				'Palm' => '#(palm os|palmos|palm|hiptop|avantgo|plucker|xiino|blazer|elainepre/)#i',
				'Opera Mini/Opera Mobile' => '#opera mini|opera mobi#i',
				'Unknown Mobile' => '#(' . implode('|', 
										array(
											'sam\-',
											'samsung(\-|;)',
											'mobileexplorer',
											'nokia',
											'hp ipaq',
											'htc(_|\-)',
											'lg(\-|/)',
											'lge(\-| )',
											'mot(\-| )',
											'160x',
											'x160',
											'480x640',
											'240x400',
											'240x320',
											'600x800',
											'sonyericsson',
											'phone',
											'sanyo',
											'rim8',
											'mob-x',
											'bolt/',
											'docomo',
											'up\.browser',
											'up\.link',
											'vodafone',
											'j\-phone',
											'nook browser',
											'armv5tejl;',
											'armv6l;',
											'symbian',
											'smartphone;',
											'wap;',
											'wap browser',
											'opera mobi',
											'tablet pc',
											'tablet os',
											'wireless',
											'touchpad',
											'ddipocket;',
											'pdxgw/',
											'astel/',
											'dolphin',
											'minimo/',
											'plucker/',
											'pda; ',
											'netfront/',
											'wm5 pie',
											't\-mobile',
											'o2',
											'cricket',
											'ec-sgh'
										)
									) . ')#i'
			);
		}
		
		/*
		* ?????? ?????????
		*/
		public function Check() {
			// ????????? ????????? ?? ?????????
			if($this->userAgent) {
				foreach($this->mobileUserAgentsPatterns as $mobileKey => $pattern) {
					if(preg_match($pattern, $this->userAgent)) {
						$this->mobileDetected = $mobileKey;
						return;
					}
				}
			}
			
			// ???? ????? ?? ???? - ????????? ????????? (???? ??? ????)
			if($this->httpAccept) {
				if(strpos($this->httpAccept, '/vnd.wap') !== false) {
					$this->mobileDetected = 'Unknown Mobile';
					return;
				}
			}
			
			// ???? ?? ???? ?????, ????????? ?????? _SERVER
			if(isset($_SERVER) && ( isset($_SERVER['HTTP_X_WAP_PROFILE']) || isset($_SERVER['HTTP_PROFILE']) ) ) {
				$this->mobileDetected = 'Unknown Mobile';
				return;
			}
			
			// ???? ?????? ????? ?? ?????????? - ?????? ?? ????????? ??????????
			$this->mobileDetected = '';
			
		}
		
		/*
		* ?????????? ????? __call (???????????? ?? ???????? ?????????)
		*/
		public function __call($name, $arguments) {
			if($this->mobileDetected === null) {
				$this->Check();
			}
			$name = strtolower($name);
			switch($name) {
				case 'mobileplatform' : 
					return $this->mobileDetected;
					break;
				case 'ismobile' :
					if($this->mobileDetected) {
						return true;
					}
					return false;
					break;
				case 'ispc' :
				case 'isdesctop' :
					if(!$this->mobileDetected) {
						return true;
					}
					return false;
					break;
				default : 
					if($this->mobileDetected) {
						$currentPlatformName = 'is' . preg_replace('/\s/', '', strtolower($this->mobileDetected));
						if($name == $currentPlatformName) {
							return true;
						}
					}
					return false;
					break;
			}
		}
		
	}
	
?>
proverka
<?php

	$mobilechecker = new Mobile_Checker($_SERVER['HTTP_USER_AGENT'], $_SERVER['HTTP_ACCEPT']);
	var_export($mobilechecker->isPC());
	if($mobilechecker->isMobile() && $mobilechecker->isWindowsPhone7()) {
		print $mobilechecker->MobilePlatform();
	}

?>