<?php

//============================================================+
// File name   : datamatriximg.php
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
// Class to generate Datamatrix image, format png.
//============================================================+

/**
* @file
* Class to generate Datamatrix image, format png.
* @author Anatoly Smirnov
* @version 0.0.1
*/

/**
* @class PostForm
* Class to generate Datamatrix image, format png.
* @author Anatoly Smirnov
* @version 0.0.1
*/

class DatamatrixImage {
      
    /**
    * create Datamatrix image
    * @param $data (string) data to encode in datamatrix.
    * @param $img (string) path to image file.
    * @param $size (int) size of one elementary element in pixel.

    * @return bool result of operation
    * @public
    */
    public function getDatamatrixImg($data, $img, $size){

        $barcodeobj = new TCPDF2DDatamatrixBarcode($data);

        // output the barcode as PNG image
        $png = $barcodeobj->getBarcodePngData($size, $size, array(0,0,0));

        if (file_put_contents($img, $png)) {
            return true;
        }
        return false;
    }
    
    
}
