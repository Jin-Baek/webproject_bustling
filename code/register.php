<meta charset='utf8'>

<?
    // 제대로 수행되기는 하나, 역시나 인코딩 문제로 본인 컴퓨터에서는 한글로 된 char 값들이 table 이상하게 저장되었다. 

    $connect = mysql_connect("localhost","root","xxxx");

    mysql_set_charset("utf-8",$connect);
    mysql_select_db("webp",$connect);

    $writer = $_POST['writer'];
    $tel = $_REQUEST['phoneNum'];
    $today = $_REQUEST['today'];
    $destination = $_REQUEST['destination'];
    $population = $_REQUEST['population'];
    $parking = $_REQUEST['parking'];
    $content = $_REQUEST['content'];
    $rating = $_REQUEST['rating'];

    $sql = "insert into board values('','{$writer}','{$tel}','{$today}','{$destination}','{$population}','{$parking}','{$content}','{$rating}');";

    $result = mysql_query($sql,$connect);

    if($result){
        echo"Insert 가 성공적으로 수행되었습니다.<br>";
    }else{
        echo"Insert 에 실패했습니다.";
    }  

?>

<!-- =========================================================================== -->

<?
    echo"<br>사용자가 작성한 내용";
    echo("$writer<br>");
    echo("$tel<br>");
    echo("$today<br>");
    echo("$destination<br>");
    echo("$population<br>");
    echo("$parking<br>");
    echo("$content<br>");
    echo("$rating<br>");
?>