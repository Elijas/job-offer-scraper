<?php

//duomenu uzkrovimas i kintamaji eilutes tipo
$buffer=file_get_contents("schema.json");
//eilutes perkeitimas i objekta
$data=json_decode($buffer,true);
//klaidu suradimas perkeitimo metu
$jsonerror='Nezinoma klaida';
switch (json_last_error())
{
	case JSON_ERROR_NONE:
	//klaidu nera
	$jsonerror='';
	break;
	case JSON_ERROR_DEPTH:
	$jsonerror='Pasiektas makimalus steko gylis';
	break;
	case JSON_ERROR_STATE_MISMATCH:
	$jsonerror='Nekorektiniai rezimai ir nesutapimas zingsniu';
	break;
	case JSON_ERROR_CTRL_CHAR:
	$jsonerror='Nekorektinis pagrindinis simbolis';
	break;
	case JSON_ERROR_SYNTAX:
	$jsonerror='Sintakses klaida,nekorektinis json';
	break;
	case JSON_ERROR_UTF8:
	$jsonerror='Nekorektiniai UTF simboliai,matomai parinkta bloga koduote';
	break;
	default:
	$jsonerror='Nezinoma klaida';
	break;
}
if ($jsonerror !='')
{
	//yra klaida
	echo $jsonerror;
}
else
{
	echo '<pre>';
	print_r($data);
	echo '<pre>';
}
