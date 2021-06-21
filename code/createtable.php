<meta charset='utf8'>
<?
    $connect = mysql_connect("localhost","root","xxxx");

    mysql_set_charset("utf-8",$connect);
    mysql_select_db("webp",$connect);

    $sql = "create table board(
        num int(10) not null auto_increment,
        writer char(30) not null,
        phoneNum char(30) not null,
        today datetime not null,
        destination char(30) not null,
        population char(20) not null,
        parking char(10),
        content text,
        rating float(5) not null,
        primary key(num)
    );";

    $result = mysql_query($sql,$connect);

    if($result){
        echo"Table 생성이 성공적으로 수행되었습니다.<br>
        table 명 : board";
    }else{
        echo"Table 생성에 실패했습니다.";
    }   
?>