<?php
//============================================================+
// File name   : postform.php
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
// Class to validate Post form for Russian Post office mails.
//============================================================+

/**
* @file
* Class to validate Post form for Russian Post office mails.
* @author Anatoly Smirnov
* @version 0.0.1
*/

/**
* @class PostForm
* Class to validate Post form for Russian Post office mails.
* @author Anatoly Smirnov
* @version 0.0.1
*/


class PostForm {
    
    // datamatrix fields in russian post 
    protected $df = [
        "prefix" =>[
            "type" => "C",
            "size" => 6,
            "required" => 0,
            "value" => "!!77!!"
        ], 
        "DSKver" => [
            "type" => "N",
            "size" => 2,
            "required" => 1,
            "value" => 3
        ],
        "DSKoper" => [
            "type" => "N",
            "size" => 1,
            "required" => 1,
            "value" => 1
        ],
        "sum" => [
            "type" => "N",
            "size" => 9,
            "required" => 1,
            "value" => NULL
        ],
        "tipo" => [
            "type" => "N",
            "size" => 1,
            "required" => 1,
            "value" => 3
        ],
        "tipi" => [
            "type" => "N",
            "size" => 1,
            "required" => 1,
            "value" => 0
        ],
        "indi" => [
            "type" => "N",
            "size" => 6,
            "required" => 1,
            "value" => NULL
        ],
        "obli" => [
            "type" => "C",
            "size" => 40,
            "required" => 1,
            "value" => NULL
        ],
        "adri" => [
            "type" => "C",
            "size" => 70,
            "required" => 1,
            "value" => NULL
        ],
        "namei" => [
            "type" => "C",
            "size" => 48,
            "required" => 1,
            "value" => NULL
        ],
        "teli" => [
            "type" => "C",
            "size" => 12,
            "required" => 0,
            "value" => NULL
        ],
        "inni" => [
            "type" => "C",
            "size" => 12,
            "required" => 0,
            "value" => NULL
        ],
        "biki" => [
            "type" => "C",
            "size" => 9,
            "required" => 0,
            "value" => NULL
        ],
        "schi" => [
            "type" => "C",
            "size" => 20,
            "required" => 0,
            "value" => NULL
        ],
        "kschi" => [
            "type" => "C",
            "size" => 20,
            "required" => 0,
            "value" => NULL
        ],
        "nambi" => [
            "type" => "C",
            "size" => 55,
            "required" => 0,
            "value" => NULL
        ],
        "nplt" => [
            "type" => "N",
            "size" => 9,
            "required" => 0,
            "value" => NULL
        ],
        "dplt" => [
            "type" => "C",
            "size" => 8,
            "required" => 0,
            "value" => NULL
        ],
        "indo" => [
            "type" => "C",
            "size" => 6,
            "required" => 1,
            "value" => NULL
        ],
        "oblo" => [
            "type" => "C",
            "size" => 40,
            "required" => 1,
            "value" => NULL
        ],
        "adro" => [
            "type" => "C",
            "size" => 70,
            "required" => 1,
            "value" => NULL
        ],
        "nameo" => [
            "type" => "C",
            "size" => 48,
            "required" => 1,
            "value" => NULL
        ],
        "telo" => [
            "type" => "C",
            "size" => 12,
            "required" => 0,
            "value" => NULL
        ],
        "inno" => [
            "type" => "C",
            "size" => 12,
            "required" => 1,
            "value" => NULL
        ],
        "biko" => [
            "type" => "C",
            "size" => 9,
            "required" => 1,
            "value" => NULL
        ],
        "scho" => [
            "type" => "C",
            "size" => 20,
            "required" => 1,
            "value" => NULL
        ],
        "kscho" => [
            "type" => "C",
            "size" => 20,
            "required" => 1,
            "value" => NULL
        ],
        "nambo" => [
            "type" => "C",
            "size" => 55,
            "required" => 1,
            "value" => NULL
        ],
        "msg" => [
            "type" => "C",
            "size" => 70,
            "required" => 1,
            "value" => NULL
        ],
        "dost" => [
            "type" => "N",
            "size" => 1,
            "required" => 0,
            "value" => NULL
        ],
        "uvd" => [
            "type" => "N",
            "size" => 1,
            "required" => 0,
            "value" => NULL
        ],
        "nds" => [
            "type" => "N",
            "size" => 1,
            "required" => 0,
            "value" => NULL
        ],
        "rpo" => [
            "type" => "C",
            "size" => 14,
            "required" => 1,
            "value" => 1
        ],
    ];

    // form fields - store default values, save current values for edit
    public $ff = [
        "sum" => "9156.00",
        "indi" => "127299",
        "obli" => "Москва",
        "cityi" => "",
        "streeti" => "ул. Клары Цеткин",
        "homei" => "д.2",
        "housingi" => "корп.22",
        "flati" => "кв. 7",
        "firstnamei" => "Петров",
        "lastnamei" => "Петр Петрович",
        "teli" => "",
        "inni" => "",
        "biki" => "",
        "schi" => "",
        "kschi" => "",
        "indo" => "106000",
        "oblo" => "Москва",
        "cityo" => "",
        "streeto" => "Федеральный клиент",
        "homeo" => "12",
        "housingo" => "",
        "flato" => "",
        "nameo" => 'ЗАО «Федеральный клиент»',
        "telo" => "",
        "inno" => "0239",
        "biko" => "044525848",
        "scho" => "40502810200000000680",
        "kscho" => "30101810900000000848",
        "nambo" => "АКБ «Банк федерального клиента»",
        "msg" => "10203971045828",
    ];

    // error messages
    public $err = [
        "prefix" => NULL,
        "DSKver" => NULL,
        "DSKoper" => NULL, 
        "sum" => NULL,
        "tipo" => NULL,
        "tipi" => NULL,
        "indi" => NULL,
        "obli" => NULL,
        "adri" => NULL,
        "namei" => NULL,
        "teli" => NULL,
        "inni" => NULL,
        "biki" => NULL,
        "schi" => NULL,
        "kschi" => NULL,
        "nambi" => NULL,
        "nplt" => NULL,
        "dplt" => NULL,
        "indo" => NULL,
        "oblo" => NULL,
        "adro" => NULL,
        "nameo" => NULL,
        "telo" => NULL,
        "inno" => NULL,
        "biko" => NULL,
        "scho" => NULL,
        "kscho" => NULL,
        "nambo" => NULL,
        "msg" => NULL,
        "dost" => NULL,
        "uvd" => NULL,
        "nds" => NULL,
        "rpo" => NULL,
    ];
    
    // Common error messages
    protected $required = "Обязательное поле! ";
    protected $toolong = "Значение слишком длинное! ";
    protected $numb = "В поле должны быть цифры! ";

            
    // validate form data
    public function validateForm(){
        $check = true;

        if (!$_POST) return false;

        // clear $_POST into $ff
        $this->clearData();
        // fill datamatrix array $df from $ff; compile addresses and names
        $this->fillPostData();

        // check required fields
        foreach($this->df as $key=>$val){
            if ($val["required"] && empty($val["value"]) && $key <> "tipi"){
                $this->err[$key] .= $this->required;
                $check = false;
            }
        }

        //check fields length
        foreach($this->df as $key=>$val){
            if ($val["size"] < mb_strlen($val["value"], "utf-8")){
                $this->err[$key] .= $this->toolong;
                $check = false;
            }
        }

        //check fields type
        foreach($this->df as $key=>$val){
            if ($val["type"] == "N" && !(is_numeric($val["value"]) || empty($val["value"]))){
                $this->err[$key] .= $this->numb;
                $check = false;
            }
        }

        return $check;
    }

    // data for datamatrix
    public function getPostData(){
        $data = array();
        foreach ($this->df as $key=>$val){
            $data[] = $val["value"];
        }
        return implode($data, "!");
    }
    
    // fill datamatrix fields
    protected function fillPostData() {
        // fill data matrix fields from form fields
        foreach($this->df as $key=>$val){
            if (isset($this->ff[$key])){
                $this->df[$key]["value"] = $this->ff[$key];
            };
        }

        // format sum NNNNNN.NN
        if (is_numeric($this->df["sum"]["value"])) {
            $this->df["sum"]["value"] = number_format($this->ff["sum"], 2, '.', '');
        } 

        // fill data matrix fieds from complex form fields
        $this->df["adri"]["value"] = $this->getAddr("i"); //address input
        $this->df["adro"]["value"] = $this->getAddr("o"); //address output
        $this->df["namei"]["value"] = $this->getName("i"); // first name and last name
    }

    // get address from form fields
    protected function getAddr($w){
        $key = "adr".$w;
        $strArr = array($this->ff["city".$w], $this->ff["street".$w], $this->ff["home".$w], $this->ff["housing".$w], $this->ff["flat".$w]);
        return $this->implodeNotEmpty(", ", $strArr);
    }

    // get full name from fields
    protected function getName($w){
        $key = "name".$w;
        $strArr = array($this->ff["firstname".$w], $this->ff["lastname".$w]);
        return $this->implodeNotEmpty(" ", $strArr);
    }
    
    /**/////////////////////////////////////
    /* Service functions  */
    
    // implode real fields
    private function implodeNotEmpty($dl, array $strArr){
        foreach($strArr as $key => $val){
            if (empty($val)){
                 unset($strArr[$key]);
            }
        }
        return implode($dl, $strArr);
    }
    
    // clear post field
    private function clearField($data){
        $input_text = strip_tags($data);
        $input_text = htmlspecialchars($input_text);
        $input_text= mysql_escape_string($input_text);
        return $input_text;
    }
    
    // clear post fields
    private function clearData(){
        foreach ($_POST as $key=>$data){    
            if (isset($this->ff[$key])){
                $this->ff[$key] = $this->clearField($data);
            } 
        }
    }
    /////////////////////////////////////////
}

?>
