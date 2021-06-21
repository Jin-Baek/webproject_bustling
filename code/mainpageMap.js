// 구글 지도 처음 띄웠을 떄 뜨는 위치 지정하기 
function initMap() {
    var map;
    map = new google.maps.Map(document.getElementById('map'), {
        center: {
            lat: 37.399920,
            lng: 126.7819621
        },
        zoom: 11,
    });
}


// 지역별로 Marker를 보여줄 함수 : dest는 배열
function showMarker(dest) {

    // 지도가 보여질 요소
    var e = document.getElementById('map');

    // 표시할 마커들의 중간 위도 경도 구해서 중심 좌표로 설정 
    let sum_lat = 0;
    let sum_lng = 0;

    for (var k = 0; k < dest.length; k++) {
        sum_lat += dest[k][1];
        sum_lng = sum_lng + dest[k][2];
    }

    var avg_lat = sum_lat / dest.length;
    avg_lat = parseFloat(avg_lat.toFixed(6));

    var avg_lng = sum_lng / dest.length;
    avg_lng = parseFloat(avg_lng.toFixed(6));

    // 중심 좌표 객체 생성 
    var center_point = new google.maps.LatLng(avg_lat, avg_lng);

    // 표시되는 지도의 옵션 객체
    var opts = {
        center: center_point,
        zoom: 11
    };

    // 지도에 보이기
    var map = new google.maps.Map(e, opts);

    for (var i = 0; i < dest.length; i++) {
        var title = dest[i][0];
        var pos = new google.maps.LatLng(dest[i][1], dest[i][2]);

        var m = new google.maps.Marker({
            position: pos,
            title: title,
            // 지도 객체에 마커 추가하는 setMap() 대신
            map: map,
            animation: google.maps.Animation.DROP,
        });

        m.addListener('click', function() {
            alert(this.getTitle());
        })

    }
}



function incheon() {

    var dest = [
        ['마시안 해변', 37.4316988, 126.4169287],
        ['을왕리 해수욕장', 37.4474826, 126.3717718],
        ['송도 센트럴파크', 37.3914997, 126.63755],
        ['월미도 테마파크', 37.4713222, 126.594093],
        ['선재도 뻘다방', 37.2341313, 126.529162],
        ['실미 유원지 & 해수욕장', 37.401799, 126.3998972]
    ];

    showMarker(dest);
}


function seoul() {

    var dest = [
        ['경복궁', 37.5551558, 126.9632965],
        ['코엑스 몰', 37.5116892, 127.0571507],
        ['별마당 도서관', 37.509987, 127.058077],
        ['청계천', 37.5691057, 126.9764805],
        ['광장시장', 37.5701569, 126.9971517],
        ['인사동길', 37.573244, 126.9832044],
        ['동대문디자인플라자', 37.5667509, 127.0073163],
        ['홍대', 37.5567762, 126.9227976],
        ['N서울타워', 37.5511736, 126.9860379]
    ];

    showMarker(dest);
}


function gapyeong() {

    var dest = [
        ['남이섬', 37.7577731, 127.4809065],
        ['아침고요수목원', 37.743948, 127.350358],
        ['쁘띠프랑스', 37.7148963, 127.4881349],
        ['가평레일바이크', 37.8292583, 127.5144143],
        ['청평호', 37.7085144, 127.4466085]
    ];

    showMarker(dest);
}