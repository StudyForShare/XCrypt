<?php

/**
* @author Sigit Priyanto <sigit.priyanto.77@gmail.com>
* @package Mines
* @license mailto:sigit.priyanto.77@gmail.com Author
* @version 1 First Version
* @category Oriented Object Programming
* @copyright 2016
*/
class XCrypt
{
	public $encr_str = '';	// encrypted output
	public $decr_str = '';	// decrypted output

	public $text;	// coming string

	public function __construct($wh = 'encrypt', $text = '') // encrypt or decrypt
	{
		$this->text = $text;
		if (function_exists($this->$wh())) {
			$this->$wh();
		}
	}

	public function __crypto($ret = array()) // ['d', 'm'] or ['d', 'f'] or ['e', 'f'] or ['e', 'm']
	{
		// string before encrypted or string decrypted
		$_str_bfr_decr = [ 1, 2, 3, 4, 5, 6, 7, 8, 9, 0, 'a', 'b', 'c',
			'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o',
			'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'A',
			'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M',
			'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'V', 'W', 'X', 'Y', 'Z',
			'~', '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '-',
			'=', '[', ']', '\\', ';', '\'', ',', '.', '/', '_', '+', '{',
			'}', '|', ':', '"', '<', '>', '?', ' ', "\n" ];

		// mini string version
		$__str_bfr_decr_min = [ 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H',
			'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 
			'U', 'V', 'W', 'X', 'Y', 'Z'];

		// string afeter encrypted or string encrypted
		$_str_bfr_encr = [ '' ];

		// mini string version
		$__str_bfr_encr_min = ['x', 'm', 'o', 'n', 'v', 't', 'j', 'r',
			'u', 'g', 'w', 'y', 'c', 'p', 's', 'b', 'h', 'f', 'd', 'z',
			'i', 'e', 'k', 'a', 'l', 'q'];

		$str = '';
		if (!empty($ret)) {
			switch ($ret[0]) {
				case 'd':
					switch ($ret[1]) {
						case 'm':
							$str = $__str_bfr_decr_min;
							break;

						case 'f':
							$str = $_str_bfr_decr;
							break;
					}
					break;

				case 'e':
					switch ($ret[1]) {
						case 'm':
							$str = $__str_bfr_encr_min;
							break;

						case 'f':
							$str = $_str_bfr_encr;
							break;
					}
					break;
			}
		}

		return $str;
	}

	public function encrypt()
	{
		$this->encr_str = (!empty($this->text)) ? 
			strtoupper(str_replace($this->__crypto(['d', 'm']), 
			$this->__crypto(['e', 'm']), strtoupper($this->text))) : 
			'';
	}

	public function decrypt()
	{
		$this->decr_str = (!empty($this->text)) ? 
			strtoupper(str_replace($this->__crypto(['e', 'm']), 
			$this->__crypto(['d', 'm']), strtolower($this->text))) : 
			'';
	}
}


$crypt = new XCrypt('decrypt', 'MXYXU NVDX DINXR JVYXB');


echo "Encrypt: ". $crypt->encr_str. "<br><br>Decrypt: ". $crypt->decr_str. "<br><br><br>Text: ". $crypt->text;