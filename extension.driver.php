<?php

	Class extension_lang_german extends Extension {

		public function about() {
			return array(
				'name' => 'Language: German',
				'version' => '1.1',
				'release-date' => '2010-02-16',
				'author' => array(
					'name' => 'Nils Hörrmann',
					'website' => 'http://nilshoerrmann.de',
					'email' => 'post@nilshoerrmann.de'
				),
				'description' => 'Official German translation for the Symphony backend'
			);
		}
		
		public function getSubscribedDelegates(){
			return array(
				array(
					'page' => '/system/preferences/',
					'delegate' => 'Save',
					'callback' => '__toggleGerman'
				)
			);
		}
		
		/**
		 * Toggle between German and default date and time settings
		 */
		public function __toggleGerman($context) {
			
			// Set German date and time settings
			if($context['settings']['symphony']['lang'] == 'de') {
				$this->__setGerman();
			}
			
			// Restore default date and time settings
			else {
				$this->__unsetGerman();
			}
		}
		
		public function install() {
		
			// Fetch current date and time settings
			$date = Symphony::Configuration()->get('date_format', 'region');
			$time = Symphony::Configuration()->get('time_format', 'region');
			$separator = Symphony::Configuration()->get('datetime_separator', 'region');
			
			// Store current date and time settings
			Symphony::Configuration()->set('date_format', $date, 'lang-german-storage');
			Symphony::Configuration()->set('time_format', $time, 'lang-german-storage');
			Symphony::Configuration()->set('datetime_separator', $separator, 'lang-german-storage');
			Administration::instance()->saveConfig();
		}

		public function enable(){
			if(Symphony::Configuration()->get('lang', 'symphony') == 'de') {
				$this->__setGerman();
			}
		}

		public function disable(){
			$this->__unsetGerman();
		}

		public function uninstall() {
			$this->__unsetGerman();

			// Remove storage
			Symphony::Configuration()->remove('lang-german-storage');
			Administration::instance()->saveConfig();
		}
		
		/**
		 * Set German date and time format
		 */
		private function __setGerman() {
		
			// Set German date and time settings
			Symphony::Configuration()->set('date_format', 'd. F Y', 'region');
			Symphony::Configuration()->set('time_format', 'H:i', 'region');
			Symphony::Configuration()->set('datetime_separator', ', ', 'region');			
			Administration::instance()->saveConfig();
		}
		
		/**
		 * Reset default date and time format
		 */
		private function __unsetGerman() {
		
			// Fetch current date and time settings
			$date = Symphony::Configuration()->get('date_format', 'lang-german-storage');
			$time = Symphony::Configuration()->get('time_format', 'lang-german-storage');
			$separator = Symphony::Configuration()->get('datetime_separator', 'lang-german-storage');	
			
			// Store new date and time settings
			Symphony::Configuration()->set('date_format', $date, 'region');
			Symphony::Configuration()->set('time_format', $time, 'region');
			Symphony::Configuration()->set('datetime_separator', $separator, 'region');
			Administration::instance()->saveConfig();
		}

	}
	