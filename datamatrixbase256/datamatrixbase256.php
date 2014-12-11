<?php
//============================================================+
// File name   : datamatrixbase256.php
// Version     : 0.0.1
// Begin       : 2014-12-09
// Last Update : 2014-12-09
//* @author Anatoly Smirnov
//* @version 0.0.1
// -------------------------------------------------------------------
// -------------------------------------------------------------------
//
// DESCRIPTION :
//
// Class to create DataMatrix Base256 barcode arrays for TCPDF class.
//============================================================+

/**
* @file
* Class to create DataMatrix Base256 barcode arrays for TCPDF class.
* @author Anatoly Smirnov
* @version 0.0.1
*/

/**
* @class Datamatrix
* Class to create DataMatrix Base256 barcode arrays for TCPDF class.
* @author Anatoly Smirnov
* @version 0.0.1
*/

class DatamatrixBase256 extends Datamatrix {
	
// -----------------------------------------------------------------------------
	/**
	 * Get high level encoding using the Base256 encoding mode
	 * @param $data (string) data to encode
	 * @return array of codewords
	 * @protected
	 */
	protected function getHighLevelEncoding($data) {
		$enc =  ENC_BASE256; // set encoding mode BASE256; //
		$pos = 0; // current position
		$cw = array(); // array of codewords to be returned
		$cw_num = 0; // number of data codewords
		$data_lenght = strlen($data); // number of chars
                
                $cw[] = $this->getSwitchEncodingCodeword($enc);
                ++$cw_num;
                		
                // initialize temporary array with 0 lenght
                $temp_cw = array();
                $field_lenght = 0;

                while (($pos < $data_lenght) AND ($field_lenght <= 1555)) {
                   // 2. Otherwise, process the next character in Base 256 encodation.
                    $chr = ord($data[$pos]);
                    ++$pos;
                    $temp_cw[] = $chr;
                    ++$field_lenght;
                }
                
                // set field lenght
                if ($field_lenght <= 249) {
                        $cw[] = $this->get255StateCodeword($field_lenght, ($cw_num + 1));
                        ++$cw_num;
                } else {
                        $cw[] = intval($this->get255StateCodeword((floor($field_lenght / 250) + 249), ($cw_num + 1)));
                        $cw[] = $this->get255StateCodeword(($field_lenght % 250), ($cw_num + 2));
                        $cw_num += 2;
                }
                if (!empty($temp_cw)) {
                        // add B256 field
                        foreach ($temp_cw as $p => $cht) {
                                $cw[] = $this->get255StateCodeword($cht,($cw_num + $p + 1));
                        }
                }
		
		return $cw;
	}

} // end DataMatrixBase256 class
//============================================================+
// END OF FILE
//============================================================+
