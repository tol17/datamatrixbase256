<?php

require 'vendor/autoload.php';
require_once("postform.php");
require_once("datamatrixbase256/datamatrixbase256.php");
require_once("datamatrixbase256/tcpdf_datamatrix_base256.php");
require_once("datamatriximg.php");

$pf = new PostForm();

if ($pf->validateForm()): {
    $data = $pf->getPostData();
    
    $dmimg = "d1.png";
    //require_once("datamatriximg.php");
    $dmImg = new DatamatrixImage();
    
    if ($dmImg->getDatamatrixImg($data, 'img/'.$dmimg, 3)) {
        header ('Location: postblank.php?datamatrix='.'img/'.$dmimg);
    }
    else {
        header ('Location: err.php');
    }
    exit();
}
else:
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/site.css" />
    <title>Форма почтового отправления</title>

</head>


<body>
    <div class="container">    
        <form class="form" action="index.php" method="post">
                <fieldset>

                <!-- Form Name -->
                <img src="img/logo.png">
                
                
                <div class="formcontainer">
                    <div class="formtitle">Данные получателя денежных средств</div>
                <div class="row">
                <!-- Text <input -->
                <div class="form-group">
                      <label class="col-md-2 control-label" for="nameo">Кому</label>  
                      <div class="col-md-10">
                      <input id="nameo" name="nameo" value="<?=$pf->ff['nameo'] ?>" class="form-control input-md" type="text" maxlength="48">
                      <span class="help-block">Фамилия, имя, отчество</span>
                      <span class="help-block alert-danger"><?=$pf->err["nameo"] ?></span>
                      </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-2 control-label" for="oblo">Область, район</label>  
                      <div class="col-md-4">
                      <input id="oblo" name="oblo" value="<?=$pf->ff['oblo'] ?>" placeholder="Регион" class="form-control input-md" type="text" maxlength="40">
                      <span class="help-block alert-danger"><?=$pf->err["oblo"] ?></span>
                      </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-2 control-label" for="cityo">Город</label>  
                      <div class="col-md-4">
                      <input id="cityo" name="cityo" value="<?=$pf->ff['cityo'] ?>" placeholder="" class="form-control input-md" type="text" maxlength="12">
                      </div>
                    </div>
                </div>

                <div class="row">
                <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-2 control-label" for="streeto">Улица</label>  
                      <div class="col-md-6">
                      <input id="streeto" name="streeto" value="<?=$pf->ff['streeto'] ?>" placeholder="" class="form-control input-md" type="text" maxlength="35">
                      </div>
                    </div>
                    
                </div>
                
                <div class="row">
                <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-2 control-label" for="homeo">Дом</label>  
                      <div class="col-md-2">
                      <input id="homeo" name="homeo" value="<?=$pf->ff['homeo'] ?>" placeholder="" class="form-control input-md" type="text" maxlength="10">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-1 control-label" for="housingo">Корпус</label>  
                      <div class="col-md-2">
                      <input id="housingo" name="housingo" value="<?=$pf->ff['housingo'] ?>" placeholder="" class="form-control input-md" type="text" maxlength="9">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-2 control-label" for="flato">Квартира</label>  
                      <div class="col-md-2">
                      <input id="flato" name="flato" value="<?=$pf->ff['flato'] ?>" placeholder="" class="form-control input-md" type="text" maxlength="4">
                      </div>
                    </div>
                    <div class="col-md-8">
                        <span class="help-block alert-danger"><?=$pf->err["adro"] ?></span>
                    </div>    
                </div>
                 
                <div class="row">
                <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-2 control-label" for="indo">Индекс</label>  
                      <div class="col-md-4">
                      <input id="indo" name="indo" value="<?=$pf->ff['indo'] ?>" placeholder="" class="form-control input-md" type="text" maxlength="6">
                      <span class="help-block alert-danger"><?=$pf->err["indo"] ?></span>
                      </div>
                    </div>
                    
                </div>
                
                <div class="row">
                <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-6 control-label" for="telo">Телефон, SMS-уведомление о выплате почтового перевода</label>  
                      <div class="col-md-6">
                      <input id="telo" name="telo" value="<?=$pf->ff['telo'] ?>" placeholder="" class="form-control input-md" type="text" maxlength="12">
                       <span class="help-block alert-danger"><?=$pf->err["telo"] ?></span>
                      </div>
                    </div>
                 </div>   
                </div>
                <div>&nbsp;</div>
                
                <!-- Sender -->
                <div class="formcontainer">
                    <div class="formtitle">Данные отправителя денежных средств</div>
                <div class="row">
                <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-2 control-label" for="firstnamei">Фамилия</label>  
                      <div class="col-md-4">
                      <input id="firstnamei" name="firstnamei" value="<?=$pf->ff['firstnamei'] ?>" class="form-control input-md" type="text" maxlength="20">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-2 control-label" for="lastnamei">Имя, отчество</label>  
                      <div class="col-md-4">
                      <input id="lastnamei" name="lastnamei" value="<?=$pf->ff['lastnamei'] ?>" class="form-control input-md" type="text" maxlength="28">
                      </div>
                    </div>
                    <div class="col-md-8">
                        <span class="help-block alert-danger"><?=$pf->err["namei"] ?></span>
                    </div> 
                </div>
                <div class="row">
                    <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-2 control-label" for="obli">Область, район</label>  
                      <div class="col-md-4">
                      <input id="obli" name="obli"  value="<?=$pf->ff['obli'] ?>" class="form-control input-md" type="text" maxlength="40">
                      <span class="help-block alert-danger"><?=$pf->err["obli"] ?></span>
                      </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-2 control-label" for="cityi">Город</label>  
                      <div class="col-md-4">
                      <input id="cityi" name="cityi"  value="<?=$pf->ff['cityi'] ?>" placeholder="" class="form-control input-md" type="text" maxlength="12">
                      </div>
                    </div>
                </div>

                <div class="row">
                <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-2 control-label" for="streeti">Улица</label>  
                      <div class="col-md-6">
                      <input id="streeti" name="streeti" value="<?=$pf->ff['streeti'] ?>" placeholder="" class="form-control input-md" type="text" maxlength="38">
                      </div>
                    </div>
                    
                </div>
                
                <div class="row">
                <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-2 control-label" for="homei">Дом</label>  
                      <div class="col-md-2">
                      <input id="homei" name="homei" value="<?=$pf->ff['homei'] ?>" placeholder="" class="form-control input-md" type="text" maxlength="12">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-1 control-label" for="housingi">Корпус</label>  
                      <div class="col-md-2">
                      <input id="housingi" name="housingi" value="<?=$pf->ff['housingi'] ?>" placeholder="" class="form-control input-md" type="text" maxlength="9">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-2 control-label" for="flati">Квартира</label>  
                      <div class="col-md-2">
                      <input id="flati" name="flati" value="<?=$pf->ff['flati'] ?>" placeholder="" class="form-control input-md" type="text" maxlength="7">
                      </div>
                    </div>
                    <div class="col-md-8">
                            <span class="help-block alert-danger"><?=$pf->err["adri"] ?></span>
                        </div> 
                    </div>
                
                <div class="row">
                <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-2 control-label" for="indi">Индекс</label>  
                      <div class="col-md-4">
                      <input id="indi" name="indi" value="<?=$pf->ff['indi'] ?>" placeholder="" class="form-control input-md" size="6" type="text" maxlength="6">
                       <span class="help-block alert-danger"><?=$pf->err["indi"] ?></span>
                      </div>
                    </div>
                    
                </div>
                
                <div class="row">
                <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-6 control-label" for="teli">Телефон, SMS-уведомление о выплате почтового перевода</label>  
                      <div class="col-md-6">
                      <input id="teli" name="teli" value="<?=$pf->ff['teli'] ?>" placeholder="" class="form-control input-md" type="text" maxlength="12">
                        <span class="help-block alert-danger"><?=$pf->err["teli"] ?></span>
                      </div>
                    </div>
                 </div>   
                </div>
                <div>&nbsp;</div>
                <!-- Sum -->
                <div class="formcontainer">
                    <div class="formtitle">Почтовый перевод</div>
                <div class="row">
                <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-2 control-label" for="sum">На сумму</label>  
                      <div class="col-md-6">
                      <input id="sum" name="sum" value="<?=$pf->ff['sum'] ?>" class="form-control input-md" type="text" maxlength="9">
                      <span class="help-block alert-danger"><?=$pf->err["sum"] ?></span>
                      </div>
                    </div>
                </div>
                </div>
                <div>&nbsp;</div>
                
                <!-- INN -->
                <div class="formcontainer">
                    <div class="formtitle">Заполняется при приеме перевода в адрес юридического лица</div>
                <div class="row">
                <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-2 control-label" for="inno">ИНН</label>  
                      <div class="col-md-6">
                      <input id="inno" name="inno" value="<?=$pf->ff['inno'] ?>" class="form-control input-md" type="text" maxlength="12">
                      <span class="help-block alert-danger"><?=$pf->err["inno"] ?></span>
                      </div>
                    </div>
                </div>
                 <div class="row">
                <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-2 control-label" for="kscho">Кор/счет</label>  
                      <div class="col-md-6">
                      <input id="kscho" name="kscho" value="<?=$pf->ff['kscho'] ?>" class="form-control input-md" type="text" maxlength="20">
                      <span class="help-block alert-danger"><?=$pf->err["kscho"] ?></span>
                      </div>
                    </div>
                </div>    
                <div class="row">
                <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-2 control-label" for="nambo">Наименование банка</label>  
                      <div class="col-md-6">
                      <input id="nambo" name="nambo" value="<?=$pf->ff['nambo'] ?>" class="form-control input-md" type="text" maxlength="55">
                      <span class="help-block alert-danger"><?=$pf->err["nambo"] ?></span>
                      </div>
                    </div>
                </div>
                <div class="row">
                <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-2 control-label" for="scho">Расч/счет</label>  
                      <div class="col-md-6">
                      <input id="scho" name="scho" value="<?=$pf->ff['scho'] ?>" class="form-control input-md" type="text" maxlength="20">
                      <span class="help-block alert-danger"><?=$pf->err["scho"] ?></span>
                      </div>
                    </div>
                </div>    
                <div class="row">
                <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-2 control-label" for="biko">БИК</label>  
                      <div class="col-md-6">
                      <input id="biko" name="biko" value="<?=$pf->ff['biko'] ?>" class="form-control input-md" type="text" maxlength="9">
                      <span class="help-block alert-danger"><?=$pf->err["biko"] ?></span>
                      </div>
                    </div>
                </div>       
                </div>
                <div>&nbsp;</div>
                <!-- Message-->
                <div class="formcontainer">
                    <div class="formtitle">Сообщение</div>
                <div class="row">
                <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-2 control-label" for="message">Сообщение</label>  
                      <div class="col-md-10">
                      <input id="msg" name="msg" value="<?=$pf->ff['msg'] ?>" class="form-control input-md" type="text" maxlength="70">
                      <span class="help-block alert-danger"><?=$pf->err["msg"] ?></span>
                      </div>
                    </div>
                </div>
                </div>
                <div>&nbsp;</div>
                
                
                <div class="row">
                    <!-- Button -->
                    <div class="form-group">
                      <label class="col-md-12 control-label" for="sendbtn"></label>
                      <div class="col-md-4">
                          <button id="sendbtn" name="sendbtn" class="btn btn-primary" type="submit">Сформировать бланк</button>
                      </div>
                    </div>
                </div>
            </fieldset>
        </form>
                        
    </div>
            
</body>
</html>
<?php endif; ?>