<?php

function encrypt($inputVal,$secureKey)
{
$encrypted_text ='';
    try
    {
        if ($inputVal == null ||$inputVal == '' )
        {
            return "Input Value is Empty";
        }
        else if ($secureKey == null ||$secureKey == '')
        {
            return "Key Value is Empty";
        }
        else
        {
            $secureKey = hex2bin($secureKey);
        }
$encrypted_text = bin2hex(openssl_encrypt($inputVal, 'AES-128-ECB', $secureKey, OPENSSL_RAW_DATA));
    }
catch (Exception $e) {
    return  "Error :".$e->getMessage();
}
catch (InvalidArgumentException $e) {
return  "Error :".$e->getMessage();
}
return $encrypted_text;
}

function decrypt($inputVal,$secureKey)
{
$decrypted_text ='';
    try
    {
        if ($inputVal == null ||$inputVal == '' )
        {
            return "Input Value is Empty";
        }
        else if ($secureKey == null ||$secureKey == '')
        {
            return "Key Value is Empty";
        }
        else
        {
$inputVal = hex2bin($inputVal);
           $secureKey = hex2bin($secureKey);
        }
$decrypted_text = openssl_decrypt($inputVal, 'AES-128-ECB', $secureKey, OPENSSL_RAW_DATA);
        
    }
catch (Exception $e) {
    return  "Error :".$e->getMessage();
}
catch (InvalidArgumentException $e) {
return  "Error :".$e->getMessage();
}
return $decrypted_text;
}
    ?>