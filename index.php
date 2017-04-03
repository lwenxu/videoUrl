<!DOCTYPE HTML>
<html>
<head>
    <title>解析视频地址</title>
    <meta charset="UTF-8">
    <meta name="keywords" content="视频,解析,f4v,下载"/>
    <style>
        body {
            color: #333;
            font-family: "segoe ui", Arial, sans-serif
        }

        #page {
            width: 90%;
            margin: 40px auto 0;
            padding: 20px 0 80px
        }

        h1 {
            text-align: center
        }

        form {
            text-align: center;
            margin: 40px 0
        }

        .input {
            width: 100%;
            height: 48px;
            font-size: 18px;
            color: #888;
            background: #f2f2f2;
            border: 0;
            padding: 0 10px;
            outline: 0;
            text-align: center;
            box-sizing: border-box
        }

        .input, #submit {
            transition: color, background .24s ease-out
        }

        .input:focus {
            color: #000;
            background: #C7EAEA
        }

        #proxy {
            margin-top: 18px
        }

        #submit {
            margin: 0;
            padding: 8px 18px;
            font-size: 16px;
            cursor: pointer;
            color: #fff;
            background: #32B1BD;
            border: 0;
            border-radius: 3px
        }

        #submit:hover {
            background: #379AA3
        }

        #submit:active {
            background: #238993;
            padding: 9px 18px 7px
        }

        .type {
            margin: 15px;
            display: inline-block;
            vertical-align: middle;
            cursor: pointer
        }

        pre {
            font-family: monaco, consolas;
            font-size: 13px;
            background: #f8f8f8;
            padding: 10px;
            border: 1px solid #e3e3e3;
            overflow-x: auto
        }

        span {
            color: #E47;
            font-weight: bold
        }

        footer {
            width: 100%;
            font-size: 13px;
            padding: 15px 0;
            text-align: center;
            position: fixed;
            left: 0;
            bottom: 0;
            color: #ddd;
            background: #182B36
        }

        footer a {
            color: #ddd;
            text-decoration: none;
            transition: color .18s ease-out
        }

        footer a:hover {
            color: #fff
        }

        @media screen and (max-width: 1080px) {
            .input {
                font-size: 16px
            }

            pre {
                font-size: 12px
            }
        }
    </style>
</head>

<body>
<div id="page">
    <h1>解析视频地址</h1>
    <form action="index.php" method="get">
        <input id="url" class="input" name="url" type="text"
               placeholder="请在此输入视频地址"<?php echo isset($_GET['url']) && $_GET['url'] != '' ? ' value="' . $_GET['url'] . '"' : '' ?>>
        <input id="proxy" class="input" name="proxy" type="text"
               placeholder="输入国内代理如: 36.37.36.38:80"<?php echo isset($_GET['proxy']) && $_GET['proxy'] != '' ? ' value="' . $_GET['proxy'] . '"' : '' ?>
               style="display:<?php echo isset($_GET['proxy']) && $_GET['proxy'] != '' ? '' : 'none' ?>">
        <label class="type"><input type="submit" id="submit" value="解析"/></label>
    </form>
	<?php
	require "parserVideo.class.php";

	###### output video urls ######
	$type = isset($_GET['type']) && $_GET['type'] != '' ? $_GET['type'] : 'all';
	$proxy = isset($_GET['proxy']) && $_GET['proxy'] != '' ? $_GET['proxy'] : '';
	if (isset($_GET['url'])) {
		if ($_GET['url'] != '') {
			$url = $_GET['url'];
			$result = ParserVideo::parse($url);
			echo "<pre>";
			print_r($result);
			echo "</pre>";
		}
	}
	?>
</div>
<script type="text/javascript">
    function display(id) {
        var traget = document.getElementById(id);
        if (traget.style.display == "none") {
            traget.style.display = "";
        } else {
            traget.style.display = "none";
        }
    }
</script>
</body>
</html>