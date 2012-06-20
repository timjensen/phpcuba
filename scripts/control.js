function GetXmlHttpObject()
{
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        return new XMLHttpRequest();
    }
    if (window.ActiveXObject) {
        // code for IE6, IE5
        return new ActiveXObject("Microsoft.XMLHTTP");
    }
    return null;
}

function mainpage(str)
{
    //call the GetXmlHttpObject() to see what browser you are using
    xmlhttp = GetXmlHttpObject();
    if (xmlhttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }
    //sets the variables that make up the URL
    var url = "includes/mainpage.php";
        url = url + "?itemType=" + str;
        url = url + "&sid=" + Math.random();

    //opens and sends the HTTP request
    xmlhttp.open("GET", url, true);
    xmlhttp.send(null);
    //calls the showKitsetData function when the readystate changes
    xmlhttp.onreadystatechange = showMainPage;
}
function showMainPage()
{
    if (xmlhttp.readyState == 4)
    {
	//changes the content of the Content div to show the data from the http request
        document.getElementById("main").innerHTML = xmlhttp.responseText;
		$( ".resizeme" ).aeImageResize({ height: 190, width: 165 });
		$( ".resizeme1" ).aeImageResize({ height: 125, width: 150 });
		
	}
}