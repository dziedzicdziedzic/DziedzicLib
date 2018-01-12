var leftArrow = document.getElementById("left-arrow");
var rightArrow = document.getElementById("right-arrow");
var maxDelimeter=4;
var minDelimeter=1;
leftArrow.addEventListener("click", changeLeft);
rightArrow.addEventListener("click", changeRight);

function changeLeft(){
        minDelimeter-=4;
        maxDelimeter-=4;
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("list").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","slideshow.php?min="+minDelimeter+"&max="+maxDelimeter,true);
        xmlhttp.send();

    }


function changeRight() {
        minDelimeter+=4;
        maxDelimeter+=4;
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("list").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","slideshow.php?min="+minDelimeter+"&max="+maxDelimeter,true);
        xmlhttp.send();

}