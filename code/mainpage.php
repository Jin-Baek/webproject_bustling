<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Real-time status</title>

    <link href="mainpage.css" rel="stylesheet">

    <!-- Google Map API 설정 -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YourKey&callback=initMap&region=kr" async defer></script>

    <script src="mainpageMap.js"></script>

    <!-- GPS 거리 계산 버튼 관련해서 이미 캐시가 등록되어있다면 삭제 후에 진행하여야 Error message 가 뜨지 않는다 -->
    <script src="gps.js"></script>
</head>

<body>

    <header>
        <h2 style="text-align: center;">국내 인기 여행지 현황</h2>
        <button class="myLo" onclick="myLocation()">내 위치 확인</button>
    </header>

    <section class='set_float_left' id="map"></section>

    <aside class='set_float_left' id="place_info">
        <div class="container">

            <button class="show_destination" onclick="incheon()">인천 여행지 전체보기</button>
            <p>
                <ul>
                    <li><input type="button" id="small_button" onclick="incheon_distance('마시안 해변')" value='마시안 해변' /></li>
                    <li><input type="button" id="small_button" onclick="incheon_distance('을왕리 해수욕장')" value="을왕리 해수욕장" /></li>
                    <li><input type="button" id="small_button" onclick="incheon_distance('송도 센트럴파크')" value="송도 센트럴파크" /></li>
                    <li><input type="button" id="small_button" onclick="incheon_distance('월미도 테마파크')" value="월미도 테마파크" /></li>
                    <li><input type="button" id="small_button" onclick="incheon_distance('선재도 뻘다방')" value="선재도 뻘다방" /></li>
                    <li><input type="button" id="small_button" onclick="incheon_distance('실미 유원지 & 해수욕장')" value="실미 유원지 & 해수욕장" /></li>
                </ul>
            </p>
        </div>

        <button class="show_destination" onclick="seoul()">서울 여행지 전체보기</button>
        <p>
            <ul>
                <li><input type="button" id="small_button" onclick="seoul_distance('경복궁')" value="경복궁" /></li>
                <li><input type="button" id="small_button" onclick="seoul_distance('코엑스 몰')" value="코엑스 몰" /></li>
                <li><input type="button" id="small_button" onclick="seoul_distance('별마당 도서관')" value="별마당 도서관" /></li>
                <li><input type="button" id="small_button" onclick="seoul_distance('청계천')" value="청계천" /></li>
                <li><input type="button" id="small_button" onclick="seoul_distance('광장시장')" value="광장시장" /></li>
                <li><input type="button" id="small_button" onclick="seoul_distance('인사동길')" value="인사동길" /></li>
                <li><input type="button" id="small_button" onclick="seoul_distance('동대문디자인플라자')" value="동대문디자인플라자" /></li>
                <li><input type="button" id="small_button" onclick="seoul_distance('홍대')" value="홍대" /></li>
                <li><input type="button" id="small_button" onclick="seoul_distance('N서울타워')" value="N서울타워" /></li>
            </ul>
        </p>
        <button class="show_destination" onclick="gapyeong()">가평∙청평 여행지 전체보기</button>
        <p>
            <ul>
                <li><input type="button" id="small_button" onclick="gapyeong_distance('남이섬')" value="남이섬" /></li>
                <li><input type="button" id="small_button" onclick="gapyeong_distance('아침고요수목원')" value="아침고요수목원" /></li>
                <li><input type="button" id="small_button" onclick="gapyeong_distance('쁘띠프랑스')" value="쁘띠프랑스" /></li>
                <li><input type="button" id="small_button" onclick="gapyeong_distance('가평레일바이크')" value="가평레일바이크" /></li>
                <li><input type="button" id="small_button" onclick="gapyeong_distance('청평호')" value="청평호" /></li>
            </ul>
        </p>
    </aside>

    <hr id='floatout'>
    <form method="POST" action="createtable.php">
        <input type="submit" value="DB테이블 생성 버튼(클릭은 반드시 1번만) " style="width:100%; height:30px; background-color:darkkhaki;">
    </form><br><br>
    <h3 style="display:inline">게시판</h3>
    <a id="wri" href="writing.html" onclick="window.open(this.href, '', 'width=800, height=800'); return false;">게시글 작성</a>
    <hr>

    <?
    $connect = mysql_connect("localhost","root","xxxx");

    mysql_set_charset("utf-8",$connect);
    mysql_select_db("webp",$connect);

    $sql = "select * from board order by num;";

    $result = mysql_query($sql,$connect);
    
    $fields = mysql_num_fields($result);

    if($result){
        console.log("Select 가 성공적으로 수행되었습니다.");
    }else{
        console.log("Select 에 실패했습니다.");
    }  
    ?>

    <table class="board">
        <tr>
            <th scope="row" bgcolor="#fdf5ec">게시글 번호</th>
            <td bgcolor="#fdf5ec">작성자</td>
            <td bgcolor="#fdf5ec">휴대폰 번호</td>
            <td bgcolor="#fdf5ec">여행지</td>
            <td bgcolor="#fdf5ec">여행객 수</td>
            <td bgcolor="#fdf5ec">주차여부</td>
            <td bgcolor="#fdf5ec">맛집 추천</td>
            <td bgcolor="#fdf5ec">날짜</td>
            <td bgcolor="#fdf5ec">평점</td>
        </tr>

    
    <!-- Table 자체에는 인코딩이 안된 상태로 저장되었으나 데이터를 가져올 떄는 한글 인코딩이 되어져서 가져와짐 -->
    <?
        while($row=mysql_fetch_array($result)){
            echo("<tr>");
            echo("<th>$row[num]</th>");
            echo("<td>$row[writer]</td>");

            // 관리자는 전화번호를 확인 할 수 있으나 사용자 측에서는 휴대폰번호는 뒷 네자리를 비공개로 바꾼다.
            $phone = $row[phoneNum];
            $phone = mb_substr($phone,0,7);
            $phone = $phone."XXXX";

            echo("<td>$phone</td>");

            echo("<td>$row[destination]</td>");
            
            switch($row[population]){
                case "few":
                    $row[population] = "거의없음";
                    break;
                case "afew":
                    $row[population] = "조금있음";
                    break;
                case "enough":
                    $row[population] = "적당함";
                    break;
                case "lot":
                    $row[population] = "많음";
                    break;
                case "crowded":
                    $row[population] = "아주많음";
                    break;
                }

            echo("<td>$row[population]</td>");

            switch($row[parking]){
                case "yes":
                    $row[parking] = "가능";
                    break;
                case "no":
                    $row[parking] = "불가능";
                    break;
                case "unknown":
                    $row[parking] = "알 수 없음";
                    break;
                }

            echo("<td>$row[parking]</td>");

            echo("<td>$row[content]</td>");
            echo("<td>$row[today]</td>");
            echo("<td>$row[rating]</td>");
            echo("</tr>");
        }
        mysql_close();
    ?>

    </table>

</body>

</html>