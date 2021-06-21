// 내 위치 지도에 표시 
function myLocation() {
    var e = document.getElementById('map');

    if (navigator.geolocation) { // GPS를 지원하면
        navigator.geolocation.getCurrentPosition(function(position) {
            new google.maps.Map(e, { center: { lat: position.coords.latitude, lng: position.coords.longitude }, zoom: 16 });
            alert('위도 : ' + position.coords.latitude.toFixed(2) + '  경도 : ' + position.coords.longitude.toFixed(2));
        }, function(error) {
            console.error(error);
        }, {
            enableHighAccuracy: false,
            maximumAge: 0,
            timeout: Infinity
        });
    } else {
        alert('GPS Error 발생');
    }
}

// 경도와 위도로 현재 내 위치와 목적지 거리 계산하기 (문제점: 내가 구한 것은 유클리디안 거리 이지만 실제 도로 거리와는 약간의 차이가 있을 수 있음)
function getDistance(mylat, mylng, destlat, destlng) {
    dis = 0;
    dis = Math.sqrt(Math.pow((mylat - destlat) * 133.33, 2) + Math.pow((mylng - destlng) * 133.33, 2)).toFixed(2);
    alert(dis + ' km');
}


// 인천 여행지 거리 함수 
function incheon_distance(para) {
    var dest = [
        ['마시안 해변', 37.4316988, 126.4169287],
        ['을왕리 해수욕장', 37.4474826, 126.3717718],
        ['송도 센트럴파크', 37.3920589, 126.6355944],
        ['월미도 테마파크', 37.4713222, 126.594093],
        ['선재도 뻘다방', 37.2341313, 126.529162],
        ['실미 유원지 & 해수욕장', 37.401799, 126.3998972]
    ];

    navigator.geolocation.getCurrentPosition(function(position) {
        mylat = position.coords.latitude;
        mylng = position.coords.longitude;

        switch (para) {
            case '마시안 해변':
                getDistance(mylat, mylng, dest[0][1], dest[0][2]);
                break;
            case '을왕리 해수욕장':
                getDistance(mylat, mylng, dest[1][1], dest[1][2]);
                break;
            case '송도 센트럴파크':
                getDistance(mylat, mylng, dest[2][1], dest[2][2]);
                break;
            case '월미도 테마파크':
                getDistance(mylat, mylng, dest[3][1], dest[3][2]);
                break;
            case '선재도 뻘다방':
                getDistance(mylat, mylng, dest[4][1], dest[4][2]);
                break;
            case '실미 유원지 & 해수욕장':
                getDistance(mylat, mylng, dest[5][1], dest[5][2]);
                break;
        }
    })
}


// 서울 여행지 거리 함수
function seoul_distance(para) {
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

    navigator.geolocation.getCurrentPosition(function(position) {
        mylat = position.coords.latitude;
        mylng = position.coords.longitude;

        switch (para) {
            case '경복궁':
                getDistance(mylat, mylng, dest[0][1], dest[0][2]);
                break;
            case '코엑스 몰':
                getDistance(mylat, mylng, dest[1][1], dest[1][2]);
                break;
            case '별마당 도서관':
                getDistance(mylat, mylng, dest[2][1], dest[2][2]);
                break;
            case '청계천':
                getDistance(mylat, mylng, dest[3][1], dest[3][2]);
                break;
            case '광장시장':
                getDistance(mylat, mylng, dest[4][1], dest[4][2]);
                break;
            case '인사동길':
                getDistance(mylat, mylng, dest[5][1], dest[5][2]);
                break;
            case '동대문디자인플라자':
                getDistance(mylat, mylng, dest[5][1], dest[5][2]);
                break;
            case '홍대':
                getDistance(mylat, mylng, dest[5][1], dest[5][2]);
                break;
            case 'N서울타워':
                getDistance(mylat, mylng, dest[5][1], dest[5][2]);
                break;
        }
    })
}

// 가평 청평 여행지 거리 함수
function gapyeong_distance(para) {

    var dest = [
        ['남이섬', 37.7577731, 127.4809065],
        ['아침고요수목원', 37.743948, 127.350358],
        ['쁘띠프랑스', 37.7148963, 127.4881349],
        ['가평레일바이크', 37.8292583, 127.5144143],
        ['청평호', 37.7085144, 127.4466085]
    ];

    navigator.geolocation.getCurrentPosition(function(position) {
        mylat = position.coords.latitude;
        mylng = position.coords.longitude;

        switch (para) {
            case '남이섬':
                getDistance(mylat, mylng, dest[0][1], dest[0][2]);
                break;
            case '아침고요수목원':
                getDistance(mylat, mylng, dest[1][1], dest[1][2]);
                break;
            case '쁘띠프랑스':
                getDistance(mylat, mylng, dest[2][1], dest[2][2]);
                break;
            case '가평레일바이크':
                getDistance(mylat, mylng, dest[3][1], dest[3][2]);
                break;
            case '청평호':
                getDistance(mylat, mylng, dest[4][1], dest[4][2]);
                break;
        }
    })
}