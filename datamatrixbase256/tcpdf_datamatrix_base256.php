<?php
//============================================================+
// File name   :tcpdf_datamatrix_base256.php
// Version     : 0.0.1
// Begin       : 2014-12-00
// Last Update : 2014-12-09
// Author      : Anatoly Smirnov
// License     : GNU-LGPL v3 (http://www.gnu.org/copyleft/lesser.html)
// -------------------------------------------------------------------
// Copyright (C) Anatoly Smirnov
//
// This file based on TCPDF software library.
//
// -------------------------------------------------------------------
//
// Description : PHP class to creates array representations for
//               Datamatrix Base256 barcodes to be used with TCPDF.
//
//============================================================+


/**
 * @class TCPDF2DBarcode
 * PHP class to creates array representations for Datamatrix Base256 barcodes to be used with TCPDF.
 * @author Anatoly Smirnov
 * @version 0.0.1
 */

class TCPDF2DDatamatrixBarcode extends TCPDF2DBarcode{

	public function __construct($code) {
		$this->setBarcode($code);
	}
	
	public function setBarcode($code) {
		$qrcode = new DatamatrixBase256($code);
                $this->barcode_array = $qrcode->getBarcodeArray();
                $this->barcode_array['code'] = $code;
        }
} // end of class

//============================================================+
// END OF FILE
//============================================================+
