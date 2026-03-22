<?php
header("Access-Control-Allow-Origin: http://71club.vip");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
date_default_timezone_set('Asia/Kolkata');
$serviceNowTimeFormatted = date('Y-m-d H:i:s');

$jsonData = '{
    "data": {
        "popular": {
            "platformList": [
                {
                    "vendorId": "23",
                    "vendorCode": "TB_Chess",
                    "gameCode": "800",
                    "gameNameEn": "Aviator",
                    "imgUrl": "https://ossimg.51game-game.com/51game/gamelogo/TB_Chess/800_20250619061125056.png",
                    "imgUrl2": "https://ossimg.51game-game.com/51game/gamelogo/TB_Chess/800_20250619061125096.png",
                    "winOdds": 97.48
                },
                {
                    "vendorId": "23",
                    "vendorCode": "TB_Chess",
                    "gameCode": "810",
                    "gameNameEn": "Cricket",
                    "imgUrl": "https://ossimg.51game-game.com/51game/gamelogo/TB_Chess/810_20250107010137403.jpg",
                    "imgUrl2": "https://ossimg.51game-game.com/51game/gamelogo/TB_Chess/810_20250107010137419.jpg",
                    "winOdds": 96.72
                },
                {
                    "vendorId": "23",
                    "vendorCode": "TB_Chess",
                    "gameCode": "100",
                    "gameNameEn": "Mines",
                    "imgUrl": "https://ossimg.51game-game.com/51game/gamelogo/TB_Chess/100_20250105091336976.jpg",
                    "imgUrl2": "https://ossimg.51game-game.com/51game/gamelogo/TB_Chess/100_20250105091336992.jpg",
                    "winOdds": 96.25
                },
                {
                    "vendorId": "20",
                    "vendorCode": "SPRIBE",
                    "gameCode": "aviator",
                    "gameNameEn": "Aviator",
                    "imgUrl": "https://ossimg.51game-game.com/51game/gamelogo/SPRIBE/aviator_20241229075625134.jpg",
                    "imgUrl2": "https://ossimg.51game-game.com/51game/gamelogo/SPRIBE/aviator_20241229075625150.jpg",
                    "winOdds": 96.10
                },
                {
                    "vendorId": "23",
                    "vendorCode": "TB_Chess",
                    "gameCode": "101",
                    "gameNameEn": "Hilo",
                    "imgUrl": "https://ossimg.51game-game.com/51game/gamelogo/TB_Chess/101_20250105091746322.jpg",
                    "imgUrl2": "https://ossimg.51game-game.com/51game/gamelogo/TB_Chess/101_20250105091746353.jpg",
                    "winOdds": 97.72
                },
                {
                    "vendorId": "23",
                    "vendorCode": "TB_Chess",
                    "gameCode": "900",
                    "gameNameEn": "Keno80",
                    "imgUrl": "https://ossimg.51game-game.com/51game/gamelogo/TB_Chess/900_20250105091926441.jpg",
                    "imgUrl2": "https://ossimg.51game-game.com/51game/gamelogo/TB_Chess/900_20250105091926457.jpg",
                    "winOdds": 96.54
                }
            ],
            "clicksTopList": [
                {
                    "vendorId": "18",
                    "vendorCode": "JILI",
                    "gameCode": "51",
                    "gameNameEn": "Money Coming",
                    "imgUrl": "https://ossimg.51game-game.com/51game/gamelogo/JILI/51_20241229033447299.jpg",
                    "imgUrl2": "https://ossimg.51game-game.com/51game/gamelogo/JILI/51_20241229033447330.jpg",
                    "winOdds": 97.26
                },
                {
                    "vendorId": "18",
                    "vendorCode": "JILI",
                    "gameCode": "109",
                    "gameNameEn": "Fortune Gems",
                    "imgUrl": "https://ossimg.51game-game.com/51game/gamelogo/JILI/109_20241229033541165.jpg",
                    "imgUrl2": "https://ossimg.51game-game.com/51game/gamelogo/JILI/109_20241229033541196.jpg",
                    "winOdds": 96.99
                },
                {
                    "vendorId": "17",
                    "vendorCode": "EVO_Electronic",
                    "gameCode": "grandwheel000000",
                    "gameNameEn": "Grand Wheel",
                    "imgUrl": "https://ossimg.51game-game.com/51game/gamelogo/EVO_Electronic/grandwheel000000_20250105103125807.jpg",
                    "imgUrl2": "https://ossimg.51game-game.com/51game/gamelogo/EVO_Electronic/grandwheel000000_20250105103125869.jpg",
                    "winOdds": 97.79
                },
                {
                    "vendorId": "18",
                    "vendorCode": "JILI",
                    "gameCode": "27",
                    "gameNameEn": "SevenSevenSeven",
                    "imgUrl": "https://ossimg.51game-game.com/51game/gamelogo/JILI/27_20250105100807240.jpg",
                    "imgUrl2": "https://ossimg.51game-game.com/51game/gamelogo/JILI/27_20250105100807287.jpg",
                    "winOdds": 96.39
                },
                {
                    "vendorId": "18",
                    "vendorCode": "JILI",
                    "gameCode": "47",
                    "gameNameEn": "Charge Buffalo",
                    "imgUrl": "https://ossimg.51game-game.com/51game/gamelogo/JILI/47_20241229033430502.jpg",
                    "imgUrl2": "https://ossimg.51game-game.com/51game/gamelogo/JILI/47_20241229033430534.jpg",
                    "winOdds": 97.54
                },
                {
                    "vendorId": "6",
                    "vendorCode": "JDB",
                    "gameCode": "7001",
                    "gameNameEn": "Dragon Fishing",
                    "imgUrl": "https://ossimg.51game-game.com/51game/gamelogo/JDB/7001_20240803184014998.png",
                    "imgUrl2": "https://ossimg.51game-game.com/51game/gamelogo/JDB/7001_20240803184015014.png",
                    "winOdds": 97.32
                },
                {
                    "vendorId": "18",
                    "vendorCode": "JILI",
                    "gameCode": "1",
                    "gameNameEn": "Royal Fishing",
                    "imgUrl": "https://ossimg.51game-game.com/51game/gamelogo/JILI/1_20250105101433226.jpg",
                    "imgUrl2": "https://ossimg.51game-game.com/51game/gamelogo/JILI/1_20250105101433257.jpg",
                    "winOdds": 97.00
                },
                {
                    "vendorId": "18",
                    "vendorCode": "JILI",
                    "gameCode": "223",
                    "gameNameEn": "Fortune Gems 2",
                    "imgUrl": "https://ossimg.51game-game.com/51game/gamelogo/JILI/223_20250105101716100.jpg",
                    "imgUrl2": "https://ossimg.51game-game.com/51game/gamelogo/JILI/223_20250105101716134.jpg",
                    "winOdds": 97.90
                },
                {
                    "vendorId": "18",
                    "vendorCode": "JILI",
                    "gameCode": "49",
                    "gameNameEn": "Super Ace",
                    "imgUrl": "https://ossimg.51game-game.com/51game/gamelogo/JILI/49_20250105101054351.jpg",
                    "imgUrl2": "https://ossimg.51game-game.com/51game/gamelogo/JILI/49_20250105101054382.jpg",
                    "winOdds": 97.09
                },
                {
                    "vendorId": "18",
                    "vendorCode": "JILI",
                    "gameCode": "35",
                    "gameNameEn": "Crazy777",
                    "imgUrl": "https://ossimg.51game-game.com/51game/gamelogo/JILI/35_20250105100827548.jpg",
                    "imgUrl2": "https://ossimg.51game-game.com/51game/gamelogo/JILI/35_20250105100827563.jpg",
                    "winOdds": 96.61
                },
                {
                    "vendorId": "18",
                    "vendorCode": "JILI",
                    "gameCode": "32",
                    "gameNameEn": "Jack Pot Fishing",
                    "imgUrl": "https://ossimg.51game-game.com/51game/gamelogo/JILI/32_20250105101456988.jpg",
                    "imgUrl2": "https://ossimg.51game-game.com/51game/gamelogo/JILI/32_20250105101457003.jpg",
                    "winOdds": 97.98
                },
                {
                    "vendorId": "17",
                    "vendorCode": "EVO_Electronic",
                    "gameCode": "777strike0000000",
                    "gameNameEn": "777 Strike",
                    "imgUrl": "https://ossimg.51game-game.com/51game/gamelogo/EVO_Electronic/777strike0000000_20250105103041799.jpg",
                    "imgUrl2": "https://ossimg.51game-game.com/51game/gamelogo/EVO_Electronic/777strike0000000_20250105103041826.jpg",
                    "winOdds": 97.28
                },
                {
                    "vendorId": "6",
                    "vendorCode": "JDB",
                    "gameCode": "7003",
                    "gameNameEn": "Cai Shen Fishing",
                    "imgUrl": "https://ossimg.51game-game.com/51game/gamelogo/JDB/7003.png",
                    "imgUrl2": "",
                    "winOdds": 96.28
                },
                {
                    "vendorId": "6",
                    "vendorCode": "JDB",
                    "gameCode": "14027",
                    "gameNameEn": "Lucky Seven",
                    "imgUrl": "https://ossimg.51game-game.com/51game/gamelogo/JDB/14027_20250105101934705.jpg",
                    "imgUrl2": "https://ossimg.51game-game.com/51game/gamelogo/JDB/14027_20250105101934731.jpg",
                    "winOdds": 96.17
                },
                {
                    "vendorId": "18",
                    "vendorCode": "JILI",
                    "gameCode": "200",
                    "gameNameEn": "Pappu",
                    "imgUrl": "https://ossimg.51game-game.com/51game/gamelogo/JILI/200_20250105101306728.jpg",
                    "imgUrl2": "https://ossimg.51game-game.com/51game/gamelogo/JILI/200_20250105101306755.jpg",
                    "winOdds": 97.70
                },
                {
                    "vendorId": "18",
                    "vendorCode": "JILI",
                    "gameCode": "82",
                    "gameNameEn": "Happy Fishing",
                    "imgUrl": "https://ossimg.51game-game.com/51game/gamelogo/JILI/82_20250105101116465.jpg",
                    "imgUrl2": "https://ossimg.51game-game.com/51game/gamelogo/JILI/82_20250105101116497.jpg",
                    "winOdds": 96.42
                },
                {
                    "vendorId": "19",
                    "vendorCode": "Card365",
                    "gameCode": "707",
                    "gameNameEn": "3 Patti Classic",
                    "imgUrl": "https://ossimg.51game-game.com/51game/gamelogo/Card365/707_20250105102035794.jpg",
                    "imgUrl2": "https://ossimg.51game-game.com/51game/gamelogo/Card365/707_20250105102035826.jpg",
                    "winOdds": 97.33
                },
                {
                    "vendorId": "18",
                    "vendorCode": "JILI",
                    "gameCode": "74",
                    "gameNameEn": "Mega Fishing",
                    "imgUrl": "https://ossimg.51game-game.com/51game/gamelogo/JILI/74_20250105100921724.jpg",
                    "imgUrl2": "https://ossimg.51game-game.com/51game/gamelogo/JILI/74_20250105100921755.jpg",
                    "winOdds": 97.00
                }
            ],
            "clicksVideoTopList": [
                {
                    "vendorId": "16",
                    "vendorCode": "EVO_Video",
                    "gameCode": "CrazyTime0000001",
                    "gameNameEn": "Crazy Time",
                    "imgUrl": "https://ossimg.51game-game.com/51game/gamelogo/EVO_Video/CrazyTime0000001.png",
                    "imgUrl2": "",
                    "winOdds": 0.0
                },
                {
                    "vendorId": "16",
                    "vendorCode": "EVO_Video",
                    "gameCode": "48z5pjps3ntvqc1b",
                    "gameNameEn": "Auto-Roulette",
                    "imgUrl": "https://ossimg.51game-game.com/51game/gamelogo/EVO_Video/48z5pjps3ntvqc1b.png",
                    "imgUrl2": "",
                    "winOdds": 0.0
                },
                {
                    "vendorId": "16",
                    "vendorCode": "EVO_Video",
                    "gameCode": "DragonTiger00001",
                    "gameNameEn": "Dragon Tiger",
                    "imgUrl": "https://ossimg.51game-game.com/51game/gamelogo/EVO_Video/DragonTiger00001.png",
                    "imgUrl2": "",
                    "winOdds": 0.0
                },
                {
                    "vendorId": "16",
                    "vendorCode": "EVO_Video",
                    "gameCode": "FanTan0000000001",
                    "gameNameEn": "Fan Tan",
                    "imgUrl": "https://ossimg.51game-game.com/51game/gamelogo/EVO_Video/FanTan0000000001.png",
                    "imgUrl2": "",
                    "winOdds": 0.0
                },
                {
                    "vendorId": "16",
                    "vendorCode": "EVO_Video",
                    "gameCode": "SuperSicBo000001",
                    "gameNameEn": "Super Sic Bo",
                    "imgUrl": "https://ossimg.51game-game.com/51game/gamelogo/EVO_Video/SuperSicBo000001.png",
                    "imgUrl2": "",
                    "winOdds": 0.0
                },
                {
                    "vendorId": "16",
                    "vendorCode": "EVO_Video",
                    "gameCode": "Monopoly00000001",
                    "gameNameEn": "MONOPOLY Live",
                    "imgUrl": "https://ossimg.51game-game.com/51game/gamelogo/EVO_Video/Monopoly00000001.png",
                    "imgUrl2": "",
                    "winOdds": 0.0
                },
                {
                    "vendorId": "16",
                    "vendorCode": "EVO_Video",
                    "gameCode": "LightningDice001",
                    "gameNameEn": "Lightning Dice",
                    "imgUrl": "https://ossimg.51game-game.com/51game/gamelogo/EVO_Video/LightningDice001.png",
                    "imgUrl2": "",
                    "winOdds": 0.0
                },
                {
                    "vendorId": "16",
                    "vendorCode": "EVO_Video",
                    "gameCode": "AndarBahar000001",
                    "gameNameEn": "Super Andar Bahar",
                    "imgUrl": "https://ossimg.51game-game.com/51game/gamelogo/EVO_Video/AndarBahar000001.png",
                    "imgUrl2": "",
                    "winOdds": 0.0
                },
                {
                    "vendorId": "16",
                    "vendorCode": "EVO_Video",
                    "gameCode": "LightningTable01",
                    "gameNameEn": "Lightning Roulette",
                    "imgUrl": "https://ossimg.51game-game.com/51game/gamelogo/EVO_Video/LightningTable01.png",
                    "imgUrl2": "",
                    "winOdds": 0.0
                }
            ]
        },
        "sport": [
            {
                "slotsTypeID": 25,
                "slotsName": "Wickets9",
                "vendorId": 25,
                "vendorCode": "Wickets9",
                "state": 1,
                "vendorImg": "https://ossimg.51game-game.com/51game/vendorlogo/vendorlogo_20240611061150gxdj.png"
            },
            {
                "slotsTypeID": 14,
                "slotsName": "SaBa",
                "vendorId": 14,
                "vendorCode": "SaBa",
                "state": 1,
                "vendorImg": "https://ossimg.51game-game.com/51game/vendorlogo/vendorlogo_20240611061314osks.png"
            },
            {
                "slotsTypeID": 8,
                "slotsName": "CMD",
                "vendorId": 8,
                "vendorCode": "CMD",
                "state": 1,
                "vendorImg": "https://ossimg.51game-game.com/51game/vendorlogo/vendorlogo_202406110611044rss.png"
            }
        ],
        "video": [
            {
                "slotsTypeID": 16,
                "slotsName": "EVO_Video",
                "vendorId": 16,
                "vendorCode": "EVO_Video",
                "state": 1,
                "vendorImg": "https://ossimg.51game-game.com/51game/vendorlogo/vendorlogo_202501100252018omk.jpg"
            },
            {
                "slotsTypeID": 27,
                "slotsName": "SEXY_Video",
                "vendorId": 27,
                "vendorCode": "SEXY_Video",
                "state": 1,
                "vendorImg": "https://ossimg.51game-game.com/51game/vendorlogo/vendorlogo_2025011002531327q7.jpg"
            },
            {
                "slotsTypeID": 7,
                "slotsName": "DG",
                "vendorId": 7,
                "vendorCode": "DG",
                "state": 1,
                "vendorImg": "https://ossimg.51game-game.com/51game/vendorlogo/vendorlogo_20250110025245pbdv.jpg"
            },
            {
                "slotsTypeID": 26,
                "slotsName": "WM_Video",
                "vendorId": 26,
                "vendorCode": "WM_Video",
                "state": 1,
                "vendorImg": "https://ossimg.51game-game.com/51game/vendorlogo/vendorlogo_20250110025358745j.jpg"
            },
            {
                "slotsTypeID": 38,
                "slotsName": "MG_Video",
                "vendorId": 38,
                "vendorCode": "MG_Video",
                "state": 1,
                "vendorImg": "https://ossimg.51game-game.com/51game/vendorlogo/vendorlogo_20250110025425mr38.jpg"
            }
        ],
        "slot": [
            {
                "slotsTypeID": 18,
                "slotsName": "JILI",
                "vendorId": 18,
                "vendorCode": "JILI",
                "state": 1,
                "vendorImg": "https://ossimg.51game-game.com/51game/vendorlogo/vendorlogo_20240604121403r2gj.jpg"
            },
            {
                "slotsTypeID": 5,
                "slotsName": "PG",
                "vendorId": 5,
                "vendorCode": "PG",
                "state": 1,
                "vendorImg": "https://ossimg.51game-game.com/51game/vendorlogo/vendorlogo_20240604121351a9rp.jpg"
            },
            {
                "slotsTypeID": 2,
                "slotsName": "CQ9",
                "vendorId": 2,
                "vendorCode": "CQ9",
                "state": 1,
                "vendorImg": "https://ossimg.51game-game.com/51game/vendorlogo/vendorlogo_202406041213146e96.jpg"
            },
            {
                "slotsTypeID": 4,
                "slotsName": "MG",
                "vendorId": 4,
                "vendorCode": "MG",
                "state": 1,
                "vendorImg": "https://ossimg.51game-game.com/51game/vendorlogo/vendorlogo_20240604121326c5k9.jpg"
            },
            {
                "slotsTypeID": 6,
                "slotsName": "JDB",
                "vendorId": 6,
                "vendorCode": "JDB",
                "state": 1,
                "vendorImg": "https://ossimg.51game-game.com/51game/vendorlogo/vendorlogo_20240604121335pu38.jpg"
            },
            {
                "slotsTypeID": 17,
                "slotsName": "EVO_Electronic",
                "vendorId": 17,
                "vendorCode": "EVO_Electronic",
                "state": 1,
                "vendorImg": "https://ossimg.51game-game.com/51game/vendorlogo/vendorlogo_2024060412121539e6.jpg"
            },
            {
                "slotsTypeID": 41,
                "slotsName": "G9",
                "vendorId": 41,
                "vendorCode": "G9",
                "state": 1,
                "vendorImg": "https://ossimg.51game-game.com/51game/vendorlogo/vendorlogo_20241026095736jpxy.jpg"
            }
        ],
        "chess": [
            {
                "slotsTypeID": 21,
                "slotsName": "V8Card",
                "vendorId": 21,
                "vendorCode": "V8Card",
                "state": 1,
                "vendorImg": "https://ossimg.51game-game.com/51game/vendorlogo/vendorlogo_20240610065254po3f.png"
            },
            {
                "slotsTypeID": 19,
                "slotsName": "Card365",
                "vendorId": 19,
                "vendorCode": "Card365",
                "state": 1,
                "vendorImg": "https://ossimg.51game-game.com/51game/vendorlogo/vendorlogo_20240610065243i8yt.png"
            }
        ],
        "fish": [
            {
                "gameID": "1",
                "gameNameEn": "Royal Fishing",
                "img": "https://ossimg.51game-game.com/51game/gamelogo/JILI/1_20250105101433226.jpg",
                "vendorId": 18,
                "vendorCode": "JILI",
                "imgUrl2": "https://ossimg.51game-game.com/51game/gamelogo/JILI/1_20250105101433257.jpg",
                "customGameType": 0
            },
            {
                "gameID": "119",
                "gameNameEn": "All-star Fishing",
                "img": "https://ossimg.51game-game.com/51game/gamelogo/JILI/119.png",
                "vendorId": 18,
                "vendorCode": "JILI",
                "imgUrl2": "",
                "customGameType": 0
            },
            {
                "gameID": "20",
                "gameNameEn": "Bombing Fishing",
                "img": "https://ossimg.51game-game.com/51game/gamelogo/JILI/20.png",
                "vendorId": 18,
                "vendorCode": "JILI",
                "imgUrl2": "",
                "customGameType": 0
            },
            {
                "gameID": "212",
                "gameNameEn": "Dinosaur Tycoon II",
                "img": "https://ossimg.51game-game.com/51game/gamelogo/JILI/212.png",
                "vendorId": 18,
                "vendorCode": "JILI",
                "imgUrl2": "",
                "customGameType": 0
            },
            {
                "gameID": "32",
                "gameNameEn": "Jack Pot Fishing",
                "img": "https://ossimg.51game-game.com/51game/gamelogo/JILI/32_20250105101456988.jpg",
                "vendorId": 18,
                "vendorCode": "JILI",
                "imgUrl2": "https://ossimg.51game-game.com/51game/gamelogo/JILI/32_20250105101457003.jpg",
                "customGameType": 0
            },
            {
                "gameID": "42",
                "gameNameEn": "Dinosaur Tycoon",
                "img": "https://ossimg.51game-game.com/51game/gamelogo/JILI/42.png",
                "vendorId": 18,
                "vendorCode": "JILI",
                "imgUrl2": "",
                "customGameType": 0
            },
            {
                "gameID": "60",
                "gameNameEn": "Dragon Fortune",
                "img": "https://ossimg.51game-game.com/51game/gamelogo/JILI/60.png",
                "vendorId": 18,
                "vendorCode": "JILI",
                "imgUrl2": "",
                "customGameType": 0
            },
            {
                "gameID": "71",
                "gameNameEn": "Boom Legend",
                "img": "https://ossimg.51game-game.com/51game/gamelogo/JILI/71.png",
                "vendorId": 18,
                "vendorCode": "JILI",
                "imgUrl2": "",
                "customGameType": 0
            },
            {
                "gameID": "74",
                "gameNameEn": "Mega Fishing",
                "img": "https://ossimg.51game-game.com/51game/gamelogo/JILI/74_20250105100921724.jpg",
                "vendorId": 18,
                "vendorCode": "JILI",
                "imgUrl2": "https://ossimg.51game-game.com/51game/gamelogo/JILI/74_20250105100921755.jpg",
                "customGameType": 0
            },
            {
                "gameID": "82",
                "gameNameEn": "Happy Fishing",
                "img": "https://ossimg.51game-game.com/51game/gamelogo/JILI/82_20250105101116465.jpg",
                "vendorId": 18,
                "vendorCode": "JILI",
                "imgUrl2": "https://ossimg.51game-game.com/51game/gamelogo/JILI/82_20250105101116497.jpg",
                "customGameType": 0
            },
            {
                "gameID": "7001",
                "gameNameEn": "Dragon Fishing",
                "img": "https://ossimg.51game-game.com/51game/gamelogo/JDB/7001_20240803184014998.png",
                "vendorId": 6,
                "vendorCode": "JDB",
                "imgUrl2": "https://ossimg.51game-game.com/51game/gamelogo/JDB/7001_20240803184015014.png",
                "customGameType": 0
            },
            {
                "gameID": "7002",
                "gameNameEn": "Dragon Fishing II",
                "img": "https://ossimg.51game-game.com/51game/gamelogo/JDB/7002.png",
                "vendorId": 6,
                "vendorCode": "JDB",
                "imgUrl2": "",
                "customGameType": 0
            },
            {
                "gameID": "7003",
                "gameNameEn": "Cai Shen Fishing",
                "img": "https://ossimg.51game-game.com/51game/gamelogo/JDB/7003.png",
                "vendorId": 6,
                "vendorCode": "JDB",
                "imgUrl2": "",
                "customGameType": 0
            },
            {
                "gameID": "7004",
                "gameNameEn": "Shade Dragons Fishing",
                "img": "https://ossimg.51game-game.com/51game/gamelogo/JDB/7004.png",
                "vendorId": 6,
                "vendorCode": "JDB",
                "imgUrl2": "",
                "customGameType": 0
            },
            {
                "gameID": "7005",
                "gameNameEn": "Fishing YiLuFa",
                "img": "https://ossimg.51game-game.com/51game/gamelogo/JDB/7005.png",
                "vendorId": 6,
                "vendorCode": "JDB",
                "imgUrl2": "",
                "customGameType": 0
            },
            {
                "gameID": "7006",
                "gameNameEn": "Dragon Master",
                "img": "https://ossimg.51game-game.com/51game/gamelogo/JDB/7006.png",
                "vendorId": 6,
                "vendorCode": "JDB",
                "imgUrl2": "",
                "customGameType": 0
            },
            {
                "gameID": "7007",
                "gameNameEn": "Fishing Disco",
                "img": "https://ossimg.51game-game.com/51game/gamelogo/JDB/7007.png",
                "vendorId": 6,
                "vendorCode": "JDB",
                "imgUrl2": "",
                "customGameType": 0
            },
            {
                "gameID": "AB3",
                "gameNameEn": "Paradise",
                "img": "https://ossimg.51game-game.com/51game/gamelogo/CQ9/AB3.png",
                "vendorId": 2,
                "vendorCode": "CQ9",
                "imgUrl2": "",
                "customGameType": 0
            },
            {
                "gameID": "AT01",
                "gameNameEn": "OneShotFishing",
                "img": "https://ossimg.51game-game.com/51game/gamelogo/CQ9/AT01.png",
                "vendorId": 2,
                "vendorCode": "CQ9",
                "imgUrl2": "",
                "customGameType": 0
            },
            {
                "gameID": "AT05",
                "gameNameEn": "LuckyFishing",
                "img": "https://ossimg.51game-game.com/51game/gamelogo/CQ9/AT05.png",
                "vendorId": 2,
                "vendorCode": "CQ9",
                "imgUrl2": "",
                "customGameType": 0
            },
            {
                "gameID": "GO02",
                "gameNameEn": "Hero Fishing",
                "img": "https://ossimg.51game-game.com/51game/gamelogo/CQ9/GO02.png",
                "vendorId": 2,
                "vendorCode": "CQ9",
                "imgUrl2": "",
                "customGameType": 0
            },
            {
                "gameID": "GO05",
                "gameNameEn": "Onestick Fishing",
                "img": "https://ossimg.51game-game.com/51game/gamelogo/CQ9/GO05.png",
                "vendorId": 2,
                "vendorCode": "CQ9",
                "imgUrl2": "",
                "customGameType": 0
            },
            {
                "gameID": "7010",
                "gameNameEn": "Dragon of Demons",
                "img": "https://ossimg.51game-game.com/51game/gamelogo/JDB/7010.png",
                "vendorId": 6,
                "vendorCode": "JDB",
                "imgUrl2": "",
                "customGameType": 0
            },
            {
                "gameID": "GO06",
                "gameNameEn": "Paradise 2",
                "img": "https://ossimg.51game-game.com/51game/gamelogo/CQ9/GO06.png",
                "vendorId": 2,
                "vendorCode": "CQ9",
                "imgUrl2": "",
                "customGameType": 0
            },
            {
                "gameID": "531",
                "gameNameEn": "Fortune Zombie",
                "img": "https://ossimg.51game-game.com/51game/gamelogo/JILI/531.png",
                "vendorId": 18,
                "vendorCode": "JILI",
                "imgUrl2": "",
                "customGameType": 0
            }
        ],
        "flash": [
            {
                "gameID": "800",
                "gameNameEn": "Aviator",
                "img": "https://ossimg.51game-game.com/51game/gamelogo/TB_Chess/800_20250619061125056.png",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": "https://ossimg.51game-game.com/51game/gamelogo/TB_Chess/800_20250619061125096.png",
                "customGameType": 0
            },
            {
                "gameID": "810",
                "gameNameEn": "Cricket",
                "img": "https://ossimg.51game-game.com/51game/gamelogo/TB_Chess/810_20250107010137403.jpg",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": "https://ossimg.51game-game.com/51game/gamelogo/TB_Chess/810_20250107010137419.jpg",
                "customGameType": 0
            },
            {
                "gameID": "804",
                "gameNameEn": "Spribe Aviator",
                "img": "https://ossimg.51game-game.com/51game/gamelogo/TB_Chess/804_20250619115510366.jpg",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": "",
                "customGameType": 0
            },
            {
                "gameID": "100",
                "gameNameEn": "Mines",
                "img": "https://ossimg.51game-game.com/51game/gamelogo/TB_Chess/100_20250105091336976.jpg",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": "https://ossimg.51game-game.com/51game/gamelogo/TB_Chess/100_20250105091336992.jpg",
                "customGameType": 0
            },
            {
                "gameID": "110",
                "gameNameEn": "Limbo",
                "img": "https://ossimg.51game-game.com/51game/gamelogo/TB_Chess/110_20241229075910635.jpg",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": "https://ossimg.51game-game.com/51game/gamelogo/TB_Chess/110_20241229075910666.jpg",
                "customGameType": 0
            },
            {
                "gameID": "116",
                "gameNameEn": "King And Pauper",
                "img": "https://ossimg.51game-game.com/51game/gamelogo/TB_Chess/116_20250619061421161.png",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": "https://ossimg.51game-game.com/51game/gamelogo/TB_Chess/116_20250619061421192.png",
                "customGameType": 0
            },
            {
                "gameID": "504",
                "gameNameEn": "Hilo Wave",
                "img": "https://ossimg.51game-game.com/51game/gamelogo/TB_Chess/504_20250619061319868.png",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": "https://ossimg.51game-game.com/51game/gamelogo/TB_Chess/504_20250619061319899.png",
                "customGameType": 0
            },
            {
                "gameID": "120",
                "gameNameEn": "Snakes",
                "img": "https://ossimg.51game-game.com/51game/gamelogo/TB_Chess/120_20250715113653293.jpg",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": "https://ossimg.51game-game.com/51game/gamelogo/TB_Chess/120_20250715113653366.jpg",
                "customGameType": 0
            },
            {
                "gameID": "505",
                "gameNameEn": "Clash Of Hands",
                "img": "https://ossimg.51game-game.com/51game/gamelogo/TB_Chess/505_20250619061149406.png",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": "https://ossimg.51game-game.com/51game/gamelogo/TB_Chess/505_20250619061149422.png",
                "customGameType": 0
            },
            {
                "gameID": "105",
                "gameNameEn": "Goal",
                "img": "https://ossimg.51game-game.com/51game/gamelogo/TB_Chess/105_20250105091713904.jpg",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": "https://ossimg.51game-game.com/51game/gamelogo/TB_Chess/105_20250105091713920.jpg",
                "customGameType": 0
            },
            {
                "gameID": "903",
                "gameNameEn": "DragonTiger",
                "img": "https://ossimg.51game-game.com/51game/gamelogo/TB_Chess/903_20250619061238383.png",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": "https://ossimg.51game-game.com/51game/gamelogo/TB_Chess/903_20250619061238398.png",
                "customGameType": 0
            },
            {
                "gameID": "102",
                "gameNameEn": "Dice",
                "img": "https://ossimg.51game-game.com/51game/gamelogo/TB_Chess/102_20250106112744301.jpg",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": "https://ossimg.51game-game.com/51game/gamelogo/TB_Chess/102_20250106112744327.jpg",
                "customGameType": 0
            },
            {
                "gameID": "224",
                "gameNameEn": "Go Rush",
                "img": "https://ossimg.51game-game.com/51game/gamelogo/JILI/224_20241229075526195.jpg",
                "vendorId": 18,
                "vendorCode": "JILI",
                "imgUrl2": "https://ossimg.51game-game.com/51game/gamelogo/JILI/224_20241229075526212.jpg",
                "customGameType": 0
            },
            {
                "gameID": "235",
                "gameNameEn": "Limbo",
                "img": "https://ossimg.51game-game.com/51game/gamelogo/JILI/235_20241229075446619.jpg",
                "vendorId": 18,
                "vendorCode": "JILI",
                "imgUrl2": "https://ossimg.51game-game.com/51game/gamelogo/JILI/235_20241229075446635.jpg",
                "customGameType": 0
            },
            {
                "gameID": "aviator",
                "gameNameEn": "Aviator",
                "img": "https://ossimg.51game-game.com/51game/gamelogo/SPRIBE/aviator_20241229075625134.jpg",
                "vendorId": 20,
                "vendorCode": "SPRIBE",
                "imgUrl2": "https://ossimg.51game-game.com/51game/gamelogo/SPRIBE/aviator_20241229075625150.jpg",
                "customGameType": 0
            },
            {
                "gameID": "109",
                "gameNameEn": "Coinflip",
                "img": "https://ossimg.51game-game.com/51game/gamelogo/TB_Chess/109_20250105091434667.jpg",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": "https://ossimg.51game-game.com/51game/gamelogo/TB_Chess/109_20250105091434693.jpg",
                "customGameType": 0
            },
            {
                "gameID": "103",
                "gameNameEn": "Plinko",
                "img": "https://ossimg.51game-game.com/51game/gamelogo/TB_Chess/103_20250105092338137.jpg",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": "https://ossimg.51game-game.com/51game/gamelogo/TB_Chess/103_20250105092338168.jpg",
                "customGameType": 0
            },
            {
                "gameID": "101",
                "gameNameEn": "Hilo",
                "img": "https://ossimg.51game-game.com/51game/gamelogo/TB_Chess/101_20250105091746322.jpg",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": "https://ossimg.51game-game.com/51game/gamelogo/TB_Chess/101_20250105091746353.jpg",
                "customGameType": 0
            },
            {
                "gameID": "500",
                "gameNameEn": "Bomb Wave",
                "img": "https://ossimg.51game-game.com/51game/gamelogo/TB_Chess/500_20250105091545852.jpg",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": "https://ossimg.51game-game.com/51game/gamelogo/TB_Chess/500_20250105091545883.jpg",
                "customGameType": 0
            },
            {
                "gameID": "115",
                "gameNameEn": "TeenPatti",
                "img": "https://ossimg.51game-game.com/51game/gamelogo/TB_Chess/115_20250105091833831.jpg",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": "https://ossimg.51game-game.com/51game/gamelogo/TB_Chess/115_20250105091833862.jpg",
                "customGameType": 0
            },
            {
                "gameID": "501",
                "gameNameEn": "Treasure Wave",
                "img": "https://ossimg.51game-game.com/51game/gamelogo/TB_Chess/501_20250105092020851.jpg",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": "https://ossimg.51game-game.com/51game/gamelogo/TB_Chess/501_20250105092020882.jpg",
                "customGameType": 0
            },
            {
                "gameID": "107",
                "gameNameEn": "Hotline",
                "img": "https://ossimg.51game-game.com/51game/gamelogo/TB_Chess/107_20250105091837019.jpg",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": "https://ossimg.51game-game.com/51game/gamelogo/TB_Chess/107_20250105091837051.jpg",
                "customGameType": 0
            },
            {
                "gameID": "111",
                "gameNameEn": "Cryptos",
                "img": "https://ossimg.51game-game.com/51game/gamelogo/TB_Chess/111_20250105091502052.jpg",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": "https://ossimg.51game-game.com/51game/gamelogo/TB_Chess/111_20250105091502083.jpg",
                "customGameType": 0
            },
            {
                "gameID": "108",
                "gameNameEn": "Space Dice",
                "img": "https://ossimg.51game-game.com/51game/gamelogo/TB_Chess/108_20250105092413165.jpg",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": "https://ossimg.51game-game.com/51game/gamelogo/TB_Chess/108_20250105092413196.jpg",
                "customGameType": 0
            },
            {
                "gameID": "502",
                "gameNameEn": "Goal Wave",
                "img": "https://ossimg.51game-game.com/51game/gamelogo/TB_Chess/502_20250619061300560.png",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": "https://ossimg.51game-game.com/51game/gamelogo/TB_Chess/502_20250619061300592.png",
                "customGameType": 0
            },
            {
                "gameID": "812",
                "gameNameEn": "Javelin",
                "img": "https://ossimg.51game-game.com/51game/gamelogo/TB_Chess/812_20250619061336160.png",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": "https://ossimg.51game-game.com/51game/gamelogo/TB_Chess/812_20250619061336192.png",
                "customGameType": 0
            },
            {
                "gameID": "114",
                "gameNameEn": "HorseRacing",
                "img": "https://ossimg.51game-game.com/51game/gamelogo/TB_Chess/114_20250105091807507.jpg",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": "https://ossimg.51game-game.com/51game/gamelogo/TB_Chess/114_20250105091807538.jpg",
                "customGameType": 0
            },
            {
                "gameID": "119",
                "gameNameEn": "Treasure",
                "img": "https://ossimg.51game-game.com/51game/gamelogo/TB_Chess/119_20250106051251757.jpg",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": "",
                "customGameType": 0
            },
            {
                "gameID": "900",
                "gameNameEn": "Keno80",
                "img": "https://ossimg.51game-game.com/51game/gamelogo/TB_Chess/900_20250105091926441.jpg",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": "https://ossimg.51game-game.com/51game/gamelogo/TB_Chess/900_20250105091926457.jpg",
                "customGameType": 0
            },
            {
                "gameID": "106",
                "gameNameEn": "Keno",
                "img": "https://ossimg.51game-game.com/51game/gamelogo/TB_Chess/106_20250105091950640.jpg",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": "https://ossimg.51game-game.com/51game/gamelogo/TB_Chess/106_20250105091950671.jpg",
                "customGameType": 0
            },
            {
                "gameID": "113",
                "gameNameEn": "Pharaoh",
                "img": "https://ossimg.51game-game.com/51game/gamelogo/TB_Chess/113_20250105092317097.jpg",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": "https://ossimg.51game-game.com/51game/gamelogo/TB_Chess/113_20250105092317123.jpg",
                "customGameType": 0
            },
            {
                "gameID": "mini-roulette",
                "gameNameEn": "Mini Roulette",
                "img": "https://ossimg.51game-game.com/51game/gamelogo/SPRIBE/mini-roulette_20250107010508199.jpg",
                "vendorId": 20,
                "vendorCode": "SPRIBE",
                "imgUrl2": "https://ossimg.51game-game.com/51game/gamelogo/SPRIBE/mini-roulette_20250107010508215.jpg",
                "customGameType": 0
            },
            {
                "gameID": "keno",
                "gameNameEn": "Keno",
                "img": "https://ossimg.51game-game.com/51game/gamelogo/SPRIBE/keno_20250107010348130.jpg",
                "vendorId": 20,
                "vendorCode": "SPRIBE",
                "imgUrl2": "https://ossimg.51game-game.com/51game/gamelogo/SPRIBE/keno_20250107010348147.jpg",
                "customGameType": 0
            },
            {
                "gameID": "mines",
                "gameNameEn": "Mines",
                "img": "https://ossimg.51game-game.com/51game/gamelogo/SPRIBE/mines_20250107010409153.jpg",
                "vendorId": 20,
                "vendorCode": "SPRIBE",
                "imgUrl2": "https://ossimg.51game-game.com/51game/gamelogo/SPRIBE/mines_20250107010409184.jpg",
                "customGameType": 0
            },
            {
                "gameID": "229",
                "gameNameEn": "Mines",
                "img": "https://ossimg.51game-game.com/51game/gamelogo/JILI/229_20250105092518135.jpg",
                "vendorId": 18,
                "vendorCode": "JILI",
                "imgUrl2": "https://ossimg.51game-game.com/51game/gamelogo/JILI/229_20250105092518167.jpg",
                "customGameType": 0
            },
            {
                "gameID": "hi-lo",
                "gameNameEn": "Hi Lo",
                "img": "https://ossimg.51game-game.com/51game/gamelogo/SPRIBE/hi-lo_20250107010526483.jpg",
                "vendorId": 20,
                "vendorCode": "SPRIBE",
                "imgUrl2": "https://ossimg.51game-game.com/51game/gamelogo/SPRIBE/hi-lo_20250107010526514.jpg",
                "customGameType": 0
            },
            {
                "gameID": "plinko",
                "gameNameEn": "Plinko",
                "img": "https://ossimg.51game-game.com/51game/gamelogo/SPRIBE/plinko_20250107010538469.jpg",
                "vendorId": 20,
                "vendorCode": "SPRIBE",
                "imgUrl2": "https://ossimg.51game-game.com/51game/gamelogo/SPRIBE/plinko_20250107010538501.jpg",
                "customGameType": 0
            },
            {
                "gameID": "dice",
                "gameNameEn": "Dice",
                "img": "https://ossimg.51game-game.com/51game/gamelogo/SPRIBE/dice_20250107010558543.jpg",
                "vendorId": 20,
                "vendorCode": "SPRIBE",
                "imgUrl2": "https://ossimg.51game-game.com/51game/gamelogo/SPRIBE/dice_20250107010558559.jpg",
                "customGameType": 0
            },
            {
                "gameID": "goal",
                "gameNameEn": "Goal",
                "img": "https://ossimg.51game-game.com/51game/gamelogo/SPRIBE/goal_20250107010609060.jpg",
                "vendorId": 20,
                "vendorCode": "SPRIBE",
                "imgUrl2": "https://ossimg.51game-game.com/51game/gamelogo/SPRIBE/goal_20250107010609091.jpg",
                "customGameType": 0
            },
            {
                "gameID": "232",
                "gameNameEn": "Tower",
                "img": "https://ossimg.51game-game.com/51game/gamelogo/JILI/232_20250105091741107.jpg",
                "vendorId": 18,
                "vendorCode": "JILI",
                "imgUrl2": "https://ossimg.51game-game.com/51game/gamelogo/JILI/232_20250105091741123.jpg",
                "customGameType": 0
            },
            {
                "gameID": "503",
                "gameNameEn": "Coin Wave",
                "img": "https://ossimg.51game-game.com/51game/gamelogo/TB_Chess/503_20250619061211571.png",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": "https://ossimg.51game-game.com/51game/gamelogo/TB_Chess/503_20250619061211587.png",
                "customGameType": 0
            },
            {
                "gameID": "118",
                "gameNameEn": "DrawPoker",
                "img": "https://ossimg.51game-game.com/51game/gamelogo/TB_Chess/118_20250105091717111.jpg",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": "https://ossimg.51game-game.com/51game/gamelogo/TB_Chess/118_20250105091717126.jpg",
                "customGameType": 0
            },
            {
                "gameID": "9009",
                "gameNameEn": "KingOfFootball",
                "img": "https://ossimg.51game-game.com/51game/gamelogo/JDB/9009_20250107012115334.jpg",
                "vendorId": 6,
                "vendorCode": "JDB",
                "imgUrl2": "https://ossimg.51game-game.com/51game/gamelogo/JDB/9009_20250107012115360.jpg",
                "customGameType": 0
            },
            {
                "gameID": "9014",
                "gameNameEn": "Mines",
                "img": "https://ossimg.51game-game.com/51game/gamelogo/JDB/9014_20250105092840175.jpg",
                "vendorId": 6,
                "vendorCode": "JDB",
                "imgUrl2": "https://ossimg.51game-game.com/51game/gamelogo/JDB/9014_20250105092840191.jpg",
                "customGameType": 0
            },
            {
                "gameID": "459",
                "gameNameEn": "Crash Touchdown",
                "img": "https://ossimg.51game-game.com/51game/gamelogo/JILI/459_20250716113917651.jpg",
                "vendorId": 18,
                "vendorCode": "JILI",
                "imgUrl2": "https://ossimg.51game-game.com/51game/gamelogo/JILI/459_20250716113917724.jpg",
                "customGameType": 0
            },
            {
                "gameID": "273",
                "gameNameEn": "Keno Super Chance",
                "img": "https://ossimg.51game-game.com/51game/gamelogo/JILI/273_20250619061522588.png",
                "vendorId": 18,
                "vendorCode": "JILI",
                "imgUrl2": "https://ossimg.51game-game.com/51game/gamelogo/JILI/273_20250619061522619.png",
                "customGameType": 0
            },
            {
                "gameID": "419",
                "gameNameEn": "Penalty Kicks",
                "img": "https://ossimg.51game-game.com/51game/gamelogo/JILI/419_20250619061503107.png",
                "vendorId": 18,
                "vendorCode": "JILI",
                "imgUrl2": "https://ossimg.51game-game.com/51game/gamelogo/JILI/419_20250619061503123.png",
                "customGameType": 0
            }
        ],
         "lottery": [
            {
                "id": 1,
                "categoryCode": "Win Go",
                "categoryName": "WinGo彩票",
                "state": 1,
                "sort": 0,
                "categoryImg": "https://indgames.online/assets/game/wingo.png",
                "wingoAmount": null,
                "k3Amount": null,
                "fiveDAmount": null,
                "trxWingoAmount": null
            },
            {
                "id": 2,
                "categoryCode": "K3",
                "categoryName": "K3彩票",
                "state": 1,
                "sort": 0,
                "categoryImg": "https://indgames.online/assets/game/k3.png",
                "wingoAmount": null,
                "k3Amount": null,
                "fiveDAmount": null,
                "trxWingoAmount": null
            },
            {
                "id": 3,
                "categoryCode": "5D",
                "categoryName": "5D彩票",
                "state": 1,
                "sort": 0,
                "categoryImg": "https://indgames.online/assets/game/5d.png",
                "wingoAmount": null,
                "k3Amount": null,
                "fiveDAmount": null,
                "trxWingoAmount": null
            },
            {
                "id": 4,
                "categoryCode": "Trx Win Go",
                "categoryName": "TrxWinGo彩票",
                "state": 1,
                "sort": 0,
                "categoryImg": "https://indgames.online/assets/game/trx.png",
                "wingoAmount": null,
                "k3Amount": null,
                "fiveDAmount": null,
                "trxWingoAmount": null
            }
        ],
        "awardRecordList": [
            {
                "orderId": 24452561,
                "userId": 1069065,
                "userPhoto": "1",
                "userName": "917287838966",
                "gameName": "Fortune Gems",
                "imgUrl": "https://ossimg.51game-game.com/51game/gamelogo/JILI/109_20241229033541165.jpg",
                "imgUrl2": "https://ossimg.51game-game.com/51game/gamelogo/JILI/109_20241229033541196.jpg",
                "multiple": 18.00,
                "bonusAmount": 0.25,
                "multipleName": "10-19",
                "createTime": "2025-07-19 11:27:03"
            },
            {
                "orderId": 24452560,
                "userId": 217393,
                "userPhoto": "1",
                "userName": "918709387930",
                "gameName": "Fortune Gems",
                "imgUrl": "https://ossimg.51game-game.com/51game/gamelogo/JILI/109_20241229033541165.jpg",
                "imgUrl2": "https://ossimg.51game-game.com/51game/gamelogo/JILI/109_20241229033541196.jpg",
                "multiple": 12.00,
                "bonusAmount": 0.25,
                "multipleName": "10-19",
                "createTime": "2025-07-19 11:27:03"
            },
            {
                "orderId": 24452559,
                "userId": 3824865,
                "userPhoto": "1",
                "userName": "918710059905",
                "gameName": "Fortune Gems 2",
                "imgUrl": "https://ossimg.51game-game.com/51game/gamelogo/JILI/223_20250105101716100.jpg",
                "imgUrl2": "https://ossimg.51game-game.com/51game/gamelogo/JILI/223_20250105101716134.jpg",
                "multiple": 14.40,
                "bonusAmount": 0.25,
                "multipleName": "10-19",
                "createTime": "2025-07-19 11:27:03"
            },
            {
                "orderId": 24452558,
                "userId": 4454598,
                "userPhoto": "1",
                "userName": "919011410657",
                "gameName": "SevenSevenSeven",
                "imgUrl": "https://ossimg.51game-game.com/51game/gamelogo/JILI/27_20250105100807240.jpg",
                "imgUrl2": "https://ossimg.51game-game.com/51game/gamelogo/JILI/27_20250105100807287.jpg",
                "multiple": 50.00,
                "bonusAmount": 2.00,
                "multipleName": "50-999999",
                "createTime": "2025-07-19 11:27:03"
            },
            {
                "orderId": 24452557,
                "userId": 3857191,
                "userPhoto": "1",
                "userName": "919579400709",
                "gameName": "SevenSevenSeven",
                "imgUrl": "https://ossimg.51game-game.com/51game/gamelogo/JILI/27_20250105100807240.jpg",
                "imgUrl2": "https://ossimg.51game-game.com/51game/gamelogo/JILI/27_20250105100807287.jpg",
                "multiple": 10.00,
                "bonusAmount": 0.25,
                "multipleName": "10-19",
                "createTime": "2025-07-19 11:27:03"
            },
            {
                "orderId": 24452556,
                "userId": 4435995,
                "userPhoto": "1",
                "userName": "919079298637",
                "gameName": "Super Ace Joker",
                "imgUrl": "https://ossimg.51game-game.com/51game/gamelogo/JILI/409.png",
                "imgUrl2": "",
                "multiple": 40.40,
                "bonusAmount": 1.00,
                "multipleName": "35-49",
                "createTime": "2025-07-19 11:27:03"
            },
            {
                "orderId": 24452555,
                "userId": 691096,
                "userPhoto": "1",
                "userName": "916901827210",
                "gameName": "Charge Buffalo",
                "imgUrl": "https://ossimg.51game-game.com/51game/gamelogo/JILI/47_20241229033430502.jpg",
                "imgUrl2": "https://ossimg.51game-game.com/51game/gamelogo/JILI/47_20241229033430534.jpg",
                "multiple": 15.75,
                "bonusAmount": 0.25,
                "multipleName": "10-19",
                "createTime": "2025-07-19 11:27:03"
            },
            {
                "orderId": 24452554,
                "userId": 121296,
                "userPhoto": "15",
                "userName": "918018447370",
                "gameName": "Mega Fishing",
                "imgUrl": "https://ossimg.51game-game.com/51game/gamelogo/JILI/74_20250105100921724.jpg",
                "imgUrl2": "https://ossimg.51game-game.com/51game/gamelogo/JILI/74_20250105100921755.jpg",
                "multiple": 15.00,
                "bonusAmount": 5.00,
                "multipleName": "10-19",
                "createTime": "2025-07-19 11:27:03"
            },
            {
                "orderId": 24452553,
                "userId": 3687070,
                "userPhoto": "11",
                "userName": "917761076005",
                "gameName": "Agent Ace",
                "imgUrl": "https://ossimg.51game-game.com/51game/gamelogo/JILI/115.png",
                "imgUrl2": "",
                "multiple": 32.60,
                "bonusAmount": 2.00,
                "multipleName": "20-34",
                "createTime": "2025-07-19 11:27:02"
            },
            {
                "orderId": 24452552,
                "userId": 857418,
                "userPhoto": "20",
                "userName": "919101401119",
                "gameName": "Fortune Gems",
                "imgUrl": "https://ossimg.51game-game.com/51game/gamelogo/JILI/109_20241229033541165.jpg",
                "imgUrl2": "https://ossimg.51game-game.com/51game/gamelogo/JILI/109_20241229033541196.jpg",
                "multiple": 14.40,
                "bonusAmount": 0.25,
                "multipleName": "10-19",
                "createTime": "2025-07-19 11:27:02"
            }
        ]
    },
    "code": 0,
    "msg": "Succeed",
    "msgCode": 0,
    "serviceNowTime": "' . $serviceNowTimeFormatted . '"
}';

$data = json_decode($jsonData, true);

$response = json_encode($data, JSON_PRETTY_PRINT);

header('Content-Type: application/json');
echo $response;

?>