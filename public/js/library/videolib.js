function closeembed() {
    $(".popup").remove();
    $(".overlay").remove()
}

function embedz() {
    var e = videojs("myvideo");
    e.pause();
    console.log(document.URL);
    var t = document.URL;
    var n = t.replace("embed", "play");
    var r = '<a class="overlay"></a>' + '<div class="popup">' + "<h2>Share This Video!</h2>" + '<h3 class="social">Social:</h3>' + "<ul>" + '<li><a href="https://www.facebook.com/sharer.php?app_id=790246271009293&sdk=joey&u=' + n + '&display=popup" target="_blank"><img src="http://eclip.tv/img/face_button.png"></a></li>' + '<li><a href="https://twitter.com/intent/tweet?hashtags=TwitterStories%2C&original_referer=' + document.URL + "&related=jasoncosta&share_with_retweet=never&text=" + n + '&tw_p=tweetbutton" target="_blank"><img src="http://eclip.tv/img/twitter_button.png"></a></li>' + "</ul>" + '<h3 class="embcode">Embed Code:</h3>' + '<textarea class="iframe" onclick="sselect()">' + '&lt;iframe seamless frameborder="0" scrolling="no" allowfullscreen="true"  mozallowfullscreen="true" webkitallowfullscreen="true" width="500" height="281" src=\'' + document.URL + "'&gt; &lt;&#47;iframe&gt;" + "</textarea>" + "</br>" + '<select id="mySelect" onclick="getsizeembed()">' + '<option value="default" data-width="500" data-height="281">500x281</option>' + '<option value="medium" data-width="720" data-height="405">720x405</option>' + '<option value="hd" data-width="960" data-height="540">960x540</option>' + '<option value="custom" data-width="" data-height="">custom</option>' + "</select>" + '<div id="custom"></div>' + '<a class="close" onclick="closeembed()"></a>' + "</div>";
    $("div#myvideo").append(r)
}

function sselect() {
    console.log("adaf");
    $(".iframe").select()
}

function getsizeembed() {
    if ($("#mySelect option:selected").val() != "custom") {
        var e = $("#mySelect option:selected").data("width");
        var t = $("#mySelect option:selected").data("height");
        $(".iframe").html('&lt;iframe seamless frameborder="0" scrolling="no" allowfullscreen="true"  mozallowfullscreen="true" webkitallowfullscreen="true" width=' + e + " height=" + t + " src='" + document.URL + "'&gt; &lt;&#47;iframe&gt;")
    } else {
        var n = "<form class='cust'>" + "<input class='width' type='number' min='200' max='1600'>" + "x" + "<input class='height' type='number' min='112' max='900'>" + "</form>";
        $("#custom").html(n);
        $(".width").keyup(function() {
            var e = $(this).val();
            var t = Math.round(e * 9 / 16);
            $(".height").val(t);
            $(".iframe").html('&lt;iframe seamless frameborder="0" scrolling="no" allowfullscreen="true"  mozallowfullscreen="true" webkitallowfullscreen="true" width=' + e + " height=" + t + " src='" + document.URL + "'&gt; &lt;&#47;iframe&gt;")
        })
    }
}

function zclose() {
    window.j = 1;
    var e = videojs("myvideo");
    var t = e.currentTime();
    var n = e.paused();
    if (n) {
        e.play()
    }
    $("#overlay").remove()
}

function startTime(e, t, n, r) {
    if (window.j == 1) {
        var i = window.innerWidth - 20;
        var s = window.innerHeight - 20;
        var o = parseInt(n);
        var u = parseInt(r);
        var a = (i - n) / 2;
        var f = (s - r) / 2;
        var l = "<div id='demo' ></div>";
        var c = '<iframe id="ads"   style="position:absolute;top:' + f + "px;left:" + a + "px;width:" + o + "px;height:" + u + 'px;" src=' + t + ' frameborder="0" sameless scrolling="no" ></iframe>';
        $("#overlay").prepend(l);
        $("#overlay").prepend(c);
        var h = new Date;
        window.k = h.getTime() + parseInt(e);
        var p = setInterval(function() {
            d()
        }, 1e3);

        function d() {
            var e = new Date;
            var t = window.k - e.getTime();
            var n = Math.round(t / 1e3);
            if (n >= 0) {
                document.getElementById("demo").innerHTML = "Skip Ads in " + Math.round(t / 1e3) + " s"
            }
            if (n == -1) {
                var r = "<div id='tat' onclick='zclose()' > [close and play]</div>";
                $("#demo").remove();
                $("#overlay").append(r);
                clearInterval(p)
            }
        }
    }
    window.j++
}

function midTime(e, t, n) {
    var r = window.innerWidth - 20;
    var i = window.innerHeight - 20;
    var s = parseInt(t);
    var o = parseInt(n);
    var u = (r - t) / 2;
    var a = (i - n) / 2;
    var f = '<iframe id="ads"   style="position:absolute;top:' + a + "px;left:" + u + "px;width:" + s + "px;height:" + o + 'px;" src=' + e + ' frameborder="0" sameless scrolling="no" ></iframe>';
    $("#overlay").prepend(f);
    var l = "<div id='tat' onclick='zclose()' > [close and play]</div>";
    $("#overlay").append(l)
}

function toggle_visibility(e) {
    var t = document.getElementById(e);
    f = document.getElementById("midads");
    if (t.style.display == "block") {
        t.style.display = "none"
    } else {
        t.style.display = "block"
    }
}

function setAdsmid(e) {
    var t = window.innerWidth - 20;
    var n = window.innerHeight - 20;
    var r = "<div id='mid' onclick='toggle_visibility(\"midads\")' style='position:absolute;bottom:40px;left:50%;color:#ff0000;z-index:999'>show/hide</div>";
    $("#myvideo").append(r);
    var i = "<div id='midads' style='position: relative; left: -50%;' ></div>";
    $("#mid").append(i);
    var s = '<iframe id="ads2"   style="width:720px;height:90px;" src=' + e + ' frameboder="0" seamless ></iframe>';
    $("#midads").append(s)
}

function nextvideo() {
    var e = $(".playlist_right>li.playing").next().find("a").attr("href");
    var t = e.indexOf("http://eclip.tv/main/play/");
    if (t == -1) {
        window.location.href = e
    } else {
        window.top.location.href = e
    }
}

function prevvideo() {
    var e = $(".playlist_right>li.playing").prev().find("a").attr("href");
    var t = e.indexOf("http://eclip.tv/main/play/");
    if (t == -1) {
        window.location.href = e
    } else {
        window.top.location.href = e
    }
}

function setembed() {
    if ($("div#myvideo").length) {
        var e = "<div id='embed' onclick='embedz()' style='position:absolute;top:40px;right:40px;color:#fff;z-index:999;font-size:20px;font-weight:bold;'></div>";
        $("div#myvideo").append(e);
        clearInterval(setemb)
    }
}
window.j = 1;
if ($(".playlist_right").length) {
    var myVar = setInterval(function() {
        playlist()
    }, 1e3);

    function playlist() {
        var e = videojs("myvideo");
        var t = e.currentTime();
        if (t > 1) {
            if (e.currentTime() == e.duration()) {
                var n = $(".playlist_right>li.playing").next().find("a").attr("href");
                console.log(n);
                var r = n.indexOf("http://eclip.tv/main/play/");
                if (r == -1) {
                    window.location.href = n
                } else {
                    window.top.location.href = n
                }
            }
        }
    }
    playlist()
}
var setemb = setInterval(function() {
    setembed()
}, 1e3);