<?php

include 'config.php';
@system("mkdir result");

function index(){
    include 'config.php';
    @system("clear");
    print "\n";
    print "$cyan     ____$red ____             __       __ \n";
    print "$cyan    /  _/$red  __ \___  ____  / /______/ /_\n";
    print "$cyan    / /$red / /_/ / _ \/ __ \/ __/ ___/ __/\n";
    print "$cyan  _/ /$red / ____/  __/ / / / /_(__  ) /_  \n";
    print "$cyan /___/$red _/    \___/_/ /_/\__/____/\__/  \n";
    print "\n";
    print "$white   Mini IP Penetration Testing Tool   \n";
    print "\n";
}

function menu(){
    include 'config.php';
    print "$cyan   01$red :$white MTR Traceroute\n";
    print "$cyan   02$red :$white Test Ping\n";
    print "$cyan   03$red :$white DNS Lookup\n";
    print "$cyan   04$red :$white Reverse DNS\n";
    print "$cyan   05$red :$white Whois\n";
    print "$cyan   06$red :$white Host Search\n";
    print "$cyan   07$red :$white Reverse IP\n";
    print "$cyan   08$red :$white HTTP Headers\n";
    print "$cyan   09$red :$white Page Links\n";
    print "$cyan   10$red :$white Nmap Port Scan\n\n";
    $user = trim(shell_exec('whoami'));
    $host = trim(shell_exec('hostname'));
    print "$okegreen [$cyan $user$red.$cyan$host$okegreen ]$red >$white ";
    $input = trim(fgets(STDIN));
    if ($input == '01' OR $input == '1'){
        mtr();
    }
    elseif ($input == '02' OR $input == '2'){
        testping();
    }
    elseif ($input == '03' OR $input == '3'){
        dnslookup();
    }
    elseif ($input == '04' OR $input == '4'){
        reversedns();
    }
    elseif ($input == '05' OR $input == '5'){
        whois();
    }
    elseif ($input == '06' OR $input == '6'){
        host();
    }
    elseif ($input == '07' OR $input == '7'){
        reverseip();
    }
    elseif ($input == '08' OR $input == '8'){
        httphead();
    }
    elseif ($input == '09' OR $input == '9'){
        pagelink();
    }
    elseif ($input == '10'){
        nmap();
    }
    else{
        menu();
    }
}

function dnslookup(){
    @system("mkdir result/dnslookup");
    index();
    include 'config.php';
    print "$cyan Target$red >$white ";
    $target = trim(fgets(STDIN));
    print "\n";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_URL,'https://api.hackertarget.com/reversedns/?q='.$target);
	$result=curl_exec($ch);
	curl_close($ch);
	$isi = "[ ".date('d-m-Y H:i:s')." ]-[ ".$target." ]-[ dnslookup ]\n\n".$result."	";
	$open = fopen("result/dnslookup/$target.txt", 'a');
	fwrite($open, $isi);
	fclose($open);
	print $result;
	print "\n$cyan [$yellow *$cyan ]$white Result reported to result/dnslookup/$target.txt\n\n";
}

function httphead(){
    @system("mkdir result/headers");
    index();
    include 'config.php';
    print "$cyan Target$red >$white ";
    $target = trim(fgets(STDIN));
    print "\n";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_URL,'https://api.hackertarget.com/httpheaders/?q='.$target);
	$result=curl_exec($ch);
	curl_close($ch);
	$isi = "[ ".date('d-m-Y H:i:s')." ]-[ ".$target." ]-[ headers ]\n\n".$result."	";
	$open = fopen("result/headers/$target.txt", 'a');
	fwrite($open, $isi);
	fclose($open);
	print $result;
	print "\n$cyan [$yellow *$cyan ]$white Result reported to result/headers/$target.txt\n\n";
}

function host(){
    @system("mkdir result/host");
    index();
    include 'config.php';
    print "$cyan Target$red >$white ";
    $target = trim(fgets(STDIN));
    print "\n";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_URL,'https://api.hackertarget.com/hostsearch/?q='.$target);
	$result=curl_exec($ch);
	curl_close($ch);
	$isi = "[ ".date('d-m-Y H:i:s')." ]-[ ".$target." ]-[ host ]\n\n".$result."	";
	$open = fopen("result/host/$target.txt", 'a');
	fwrite($open, $isi);
	fclose($open);
	print $result;
	print "\n$cyan [$yellow *$cyan ]$white Result reported to result/host/$target.txt\n\n";
}

function mtr(){
    @system("mkdir result/mtr");
    index();
    include 'config.php';
    print "$cyan Target$red >$white ";
    $target = trim(fgets(STDIN));
    print "\n";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_URL,'https://api.hackertarget.com/mtr/?q='.$target);
	$result=curl_exec($ch);
	curl_close($ch);
	$isi = "[ ".date('d-m-Y H:i:s')." ]-[ ".$target." ]-[ mtr ]\n\n".$result."	";
	$open = fopen("result/mtr/$target.txt", 'a');
	fwrite($open, $isi);
	fclose($open);
	print $result;
	print "\n$cyan [$yellow *$cyan ]$white Result reported to result/mtr/$target.txt\n\n";
}

function nmap(){
    @system("mkdir result/nmap");
    index();
    include 'config.php';
    print "$cyan Target$red >$white ";
    $target = trim(fgets(STDIN));
    print "\n";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_URL,'https://api.hackertarget.com/nmap/?q='.$target);
	$result=curl_exec($ch);
	curl_close($ch);
	$isi = "[ ".date('d-m-Y H:i:s')." ]-[ ".$target." ]-[ nmap ]\n\n".$result."	";
	$open = fopen("result/nmap/$target.txt", 'a');
	fwrite($open, $isi);
	fclose($open);
    print $result;
	print "\n$cyan [$yellow *$cyan ]$white Result reported to result/nmap/$target.txt\n\n";
}

function pagelink(){
    @system("mkdir result/links");
    index();
    include 'config.php';
    print "$cyan Target$red >$white ";
    $target = trim(fgets(STDIN));
    print "\n";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_URL,'https://api.hackertarget.com/pagelinks/?q='.$target);
	$result=curl_exec($ch);
	curl_close($ch);
	$isi = "[ ".date('d-m-Y H:i:s')." ]-[ ".$target." ]-[ links ]\n\n".$result."	";
	$open = fopen("result/links/$target.txt", 'a');
	fwrite($open, $isi);
	fclose($open);
	print $result;
	print "\n$cyan [$yellow *$cyan ]$white Result reported to result/links/$target.txt\n\n";
}

function reversedns(){
    @system("mkdir result/reversedns");
    index();
    include 'config.php';
    print "$cyan Target$red >$white ";
    $target = trim(fgets(STDIN));
    print "\n";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_URL,'https://api.hackertarget.com/reversedns/?q='.$target);
	$result=curl_exec($ch);
	curl_close($ch);
	$isi = "[ ".date('d-m-Y H:i:s')." ]-[ ".$target." ]-[ reversedns ]\n\n".$result."	";
	$open = fopen("result/reversedns/$target.txt", 'a');
	fwrite($open, $isi);
	fclose($open);
	print $result;
	print "\n$cyan [$yellow *$cyan ]$white Result reported to result/reversedns/$target.txt\n\n";
}

function reverseip(){
    @system("mkdir result/reverseip");
    index();
    include 'config.php';
    print "$cyan Target$red >$white ";
    $target = trim(fgets(STDIN));
    print "\n";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_URL,'https://api.hackertarget.com/reverseip/?q='.$target);
	$result=curl_exec($ch);
	curl_close($ch);
	$isi = "[ ".date('d-m-Y H:i:s')." ]-[ ".$target." ]-[ reverseip ]\n\n".$result."	";
	$open = fopen("result/reverseip/$target.txt", 'a');
	fwrite($open, $isi);
	fclose($open);
	print $result;
	print "\n$cyan [$yellow *$cyan ]$white Result reported to result/reverseip/$target.txt\n\n";
}

function testping(){
    @system("mkdir result/testping");
    index();
    include 'config.php';
    print "$cyan Target$red >$white ";
    $target = trim(fgets(STDIN));
    print "\n";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_URL,'https://api.hackertarget.com/nping/?q='.$target);
	$result=curl_exec($ch);
	curl_close($ch);
	$isi = "[ ".date('d-m-Y H:i:s')." ]-[ ".$target." ]-[ testping ]\n\n".$result."	";
	$open = fopen("result/testping/$target.txt", 'a');
	fwrite($open, $isi);
	fclose($open);
	print $result;
	print "\n$cyan [$yellow *$cyan ]$white Result reported to result/testping/$target.txt\n\n";
}

function whois(){
    @system("mkdir result/whois");
    index();
    include 'config.php';
    print "$cyan Target$red >$white ";
    $target = trim(fgets(STDIN));
    print "\n";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_URL,'https://api.hackertarget.com/whois/?q='.$target);
	$result=curl_exec($ch);
	curl_close($ch);
	$isi = "[ ".date('d-m-Y H:i:s')." ]-[ ".$target." ]-[ whois ]\n\n".$result."	";
	$open = fopen("result/whois/$target.txt", 'a');
	fwrite($open, $isi);
	fclose($open);
	print $result;
	print "\n$cyan [$yellow *$cyan ]$white Result reported to result/whois/$target.txt\n\n";
}

index();
menu();

?>
