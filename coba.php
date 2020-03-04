<?php

error_reporting(0);
include ("func.php");
echo "\e        SING ANYAR Voucher 15K           \n";
echo "\e ben cepet nglebokno kodene \n";
echo "\n";
nope:
echo "\e[?] lebok e nomer hpne : ";
$nope = trim(fgets(STDIN));
$cek = cekno($nope);
if ($cek == false)
    {
    echo "\e[x] Nomor wis tau kanggo\n";
			goto nope;
    }
  else
    {
echo "\e[!] disiapno otne ojo  lali\n";
sleep(5);
$register = register($nope);
if ($register == false)
    {
    echo "\e[x] ora iso iki!\n";
    }
  else
    {
    otp:
    echo "\e[!] yuk dilebokno otpne : ";
    $otp = trim(fgets(STDIN));
    $verif = verif($otp, $register);
    if ($verif == false)
        {
        echo "\e[x] Kliru wong ganteng \n";
        goto otp;
        }
      else
        {
		$h=fopen("newgojek.txt","a");
		fwrite($h,json_encode(array('token' => $verif, 'voc' => 'gofood gak ada'))."\n");
		fclose($h); 
                echo "\e[!] Trying to redeem Reff : G-mpw4wbm \n";
                sleep(3);
            $claim = reff($verif);
            if ($claim == false){
            echo "\e[!] ora iso diclaim 😭\n";
            }else{
                echo "\e[+] ".$claim."\n";
            }
    }
    }
    }


?>
