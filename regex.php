<?php
$regexName = '#^([A-Z]{1}[a-zÀ-ÖØ-öø-ÿ]+)([- ]{1}[A-Z]{1}[a-zÀ-ÖØ-öø-ÿ]+){0,1}$#';
$regexNationnality = '#^([A-Za-zÀ-ÖØ-öø-ÿ]+)([- ]{1}[A-Za-zÀ-ÖØ-öø-ÿ]+){0,1}$#';
$regexAddress = '#^[0-9a-zA-ZÀ-ÖØ-öø-ÿ\.,\-\' \n]+$#';
$regexMail = '#^[\w._-]+@[\w.-_]+[.][a-z]+$#';
$regexPhoneNumber = '#^([0][1-9]){1}([ ][0-9]{2}){4}$#';
$regexObjectMessage = '#^[a-zA-ZÀ-ÖØ-öø-ÿ0-9\W ][^<>]+$#';
$regexMaxCharact = '#^([a-zA-ZÀ-ÖØ-öø-ÿ0-9\W ]){4,32}$#';
$regexPassword = '#^[a-zA-ZÀ-ÖØ-öø-ÿ0-9\W ][^<>]+$#';
$regexId = '#^[1-9]([0-9]+)?$#';
$regexDate = '#((19|20)([0-9]{2}))-{1}((0[1-9])|(1[0-2]))-{1}((0[1-9])|([1-2][0-9])|(3[0-1])){1}#';
$regexType = '#^(1|2)$#';
?>