<?php 

include_once 'vendor/autoload.php';

$person = new functions;
$jwt    = new JWT;
$model  = new postTaskModel;

    if ($acao == '' && $param == ''){

        die($person->createResponse(COD_ERROR_FOUND, PATH_NOT_FOUND, ''));
    }

    switch ($acao)
    {
        case 'insert':
            break;
        default:
            die($person->createResponse(COD_ERROR_FOUND, ACTION_NOT_FOUND, ''));
    }


    if ($acao == 'insert')
    {
       $arrData = $_POST;

        if (!$arrData)
        {
           $arrData = json_decode(file_get_contents('php://input'), true); 
        }

        if (!$person->allFieldsFilled($arrData) || !$arrData)
        {
            die($person->createResponse(COD_ERROR_PARAMETERS, WRONG_PARAMETERS,'')); 
        }

        


    }

?>