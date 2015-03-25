리눅스용 :
 
동시 접속자 확인 하기 위해선 서버에서 root 권환으로
netstat -n | grep 80 | grep ESTABLISHED | wc -l
이라고 실행하면 동시 80 포트로 접속한 사람 수 가 나타납니다.

netstat -n | grep 80
라고만 실행하면 Fin_Wait, Time_Wait 인 접속자 수 모두를 표시 하게 됩니다.

웹상에서 리눅스 명령을 실행할땐 exec 함수를 사용합니다.

<?
$cmd = "netstat -n | grep 80 | grep EST | wc -l"; 
exec($cmd, $cmd_result); 
$count = sizeof($cmd_result); 
echo "현재 접속자 수 : ".$count."";
echo "<br>";
$cmd = "netstat -n | grep 80"; 
exec($cmd, $cmd_result); 
$count = sizeof($cmd_result); 
echo "Fin_Wait, Time_Wait 포함 현재 접속자 수 : ".$count; 
?>

출력결과 :
현재 접속자 수 : 10
Fin_Wait, Time_Wait 포함 현재 접속자 수 : 132
 
출처 : http://t.saybox.co.kr/423
 
윈도우용 :
 
<?
$cmd = 'netstat -n | findstr /i :80 | findstr /i EST'; 
exec($cmd, $cmd_result); 
$count = sizeof($cmd_result); 
echo '현재 접속자 수 : '.$count;
echo '<br>';
$cmd = 'netstat -n | findstr /i :80';
exec($cmd, $cmd_result); 
$count = sizeof($cmd_result); 
echo "Fin_Wait, Time_Wait 포함 현재 접속자 수 : ".$count; 
?>
 
출처 : 직접수정