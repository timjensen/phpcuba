var ContentHeight = 400;
var TimeToSlide = 400.0;
var openAccordion = '';

function runAccordion(index)
{
	var nID = "Accordion" + index + "Content";
	if(openAccordion == nID)
	nID = '';
   
	setTimeout("animate(" + new Date().getTime() + "," + TimeToSlide + ",'"
	+ openAccordion + "','" + nID + "')", 33);
 
	openAccordion = nID;
}

function animate(lastTick, timeLeft, closingId, openingId)
{  
	var curTick = new Date().getTime();
	var elapsedTicks = curTick - lastTick;
 
	var opening = (openingId == '') ? null : document.getElementById(openingId);
	var closing = (closingId == '') ? null : document.getElementById(closingId);
 
	if(timeLeft <= elapsedTicks)
	{
		if(opening != null) opening.style.height = ContentHeight + 'px';
   
		if(closing != null)
		{
		closing.style.display = 'none';
		closing.style.height = '0px';
		}
		return;
	}
 
	timeLeft -= elapsedTicks;
	var newClosedHeight = Math.round((timeLeft/TimeToSlide) * ContentHeight);

	if(opening != null)
	{
		if(opening.style.display != 'block')
		opening.style.display = 'block';
		opening.style.height = (ContentHeight - newClosedHeight) + 'px';
	}
 
	if(closing != null) closing.style.height = newClosedHeight + 'px';

	setTimeout("animate(" + curTick + "," + timeLeft + ",'" + closingId + "','" + openingId + "')", 33);
}
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
// Function related to contact page update admin side
function updatecontactpage()
{
    //call the GetXmlHttpObject() to see what browser you are using
    xmlhttp = GetXmlHttpObject();
    if (xmlhttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }
	//sets the variables that make up the URL
    var testytesty = document.getElementById('contact').value;
    var action =  "basic3";
    var url = "../includes/contact.php";
        url = url + "?itemType=" + action;
        url = url + "&body=" + testytesty;
	//opens and sends the HTTP request
    xmlhttp.open("GET", url, true);
    xmlhttp.send(null);
	//calls the showKitsetData function when the readystate changes
    xmlhttp.onreadystatechange = showCubaData;
    
}
// Function related to home page update admin side
function updatehomepage()
{
    //call the GetXmlHttpObject() to see what browser you are using
    xmlhttp = GetXmlHttpObject();
    if (xmlhttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }
	//sets the variables that make up the URL
    var testytesty = document.getElementById('homey').value;
    var action =  "basic2";
    var url = "../includes/homepage.php";
        url = url + "?itemType=" + action;
        url = url + "&body=" + testytesty;
	//opens and sends the HTTP request
    xmlhttp.open("GET", url, true);
    xmlhttp.send(null);
	//calls the showKitsetData function when the readystate changes
    xmlhttp.onreadystatechange = showCubaData;
    
}
// View update for update home and contact page
function showCubaData()
{
    if (xmlhttp.readyState == 4)
    {
		//changes the content of the Content div to show the data from the http request
		document.getElementById("main").innerHTML = xmlhttp.responseText;
    }
}
// Function for edit product admin side
function edittest(str)
{
    //call the GetXmlHttpObject() to see what browser you are using
    xmlhttp = GetXmlHttpObject();
    if (xmlhttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }
    //sets the variables that make up the URL
    var url = "../includes/pro.php";
        url = url + "?pro=" + str;
        url = url + "&sid=" + Math.random();

    //opens and sends the HTTP request
    xmlhttp.open("GET", url, true);
    xmlhttp.send(null);
    //calls the showKitsetData function when the readystate changes
    xmlhttp.onreadystatechange = showCubaData1;
}
// Function for product creation
function createtest()
{
    //call the GetXmlHttpObject() to see what browser you are using
    xmlhttp = GetXmlHttpObject();
    if (xmlhttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }
    //sets the variables that make up the URL
    var spacer = "vv";
	var url = "../includes/pro-create.php";
        url = url + "?spacer" + spacer;
		url = url + "&sid=" + Math.random();

    //opens and sends the HTTP request
    xmlhttp.open("GET", url, true);
    xmlhttp.send(null);
    //calls the showKitsetData function when the readystate changes
    xmlhttp.onreadystatechange = showCubaData2;
}
// Function for staff profile creation
function createstaff()
{
    //call the GetXmlHttpObject() to see what browser you are using
    xmlhttp = GetXmlHttpObject();
    if (xmlhttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }
    //sets the variables that make up the URL
    var spacer = "vv";
	var url = "../includes/staff-create.php";
        url = url + "?spacer" + spacer;
		url = url + "&sid=" + Math.random();

    //opens and sends the HTTP request
    xmlhttp.open("GET", url, true);
    xmlhttp.send(null);
    //calls the showKitsetData function when the readystate changes
    xmlhttp.onreadystatechange = showCubaData4;
}
// Function for editing staff profile form
function editstaff(str)
{
    //call the GetXmlHttpObject() to see what browser you are using
    xmlhttp = GetXmlHttpObject();
    if (xmlhttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }
    //sets the variables that make up the URL
    var url = "../includes/staffedit.php";
        url = url + "?pro=" + str;
        url = url + "&sid=" + Math.random();

    //opens and sends the HTTP request
    xmlhttp.open("GET", url, true);
    xmlhttp.send(null);
    //calls the showKitsetData function when the readystate changes
    xmlhttp.onreadystatechange = showCubaData3;
}
// Function for updating staff profile on db
function staffupdate()
{
    //call the GetXmlHttpObject() to see what browser you are using
    xmlhttp = GetXmlHttpObject();
    if (xmlhttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }
	//sets the variables that make up the URL
    var id = document.getElementById('id').value;
	var name = document.getElementById('name').value;
	var title = document.getElementById('title').value;
	var bio = document.getElementById('bio').value;
    var action =  "xx";
    var url = "../includes/staffedit.php";
        url = url + "?action=" + action;
        url = url + "&id=" + id;
		url = url + "&name=" + name;
		url = url + "&title=" + title;
		url = url + "&bio=" + bio;
	//opens and sends the HTTP request
    xmlhttp.open("GET", url, true);
    xmlhttp.send(null);
	//calls the showKitsetData function when the readystate changes
    xmlhttp.onreadystatechange = showCubaData3;
    
}
// Function for adding new staff profile to db
function staffadd()
{
    //call the GetXmlHttpObject() to see what browser you are using
    xmlhttp = GetXmlHttpObject();
    if (xmlhttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }
	//sets the variables that make up the URL
    var name = document.getElementById('s-name').value;
	var title = document.getElementById('s-title').value;
	var bio = document.getElementById('s-bio').value;
    var action =  "xx";
    var url = "../includes/staff-create.php";
        url = url + "?action=" + action;
        url = url + "&name=" + name;
		url = url + "&title=" + title;
		url = url + "&bio=" + bio;
	//opens and sends the HTTP request
    xmlhttp.open("GET", url, true);
    xmlhttp.send(null);
	//calls the showKitsetData function when the readystate changes
    xmlhttp.onreadystatechange = showCubaData4;
    
}
// Function for updating product on db
function productupdate()
{
    //call the GetXmlHttpObject() to see what browser you are using
    xmlhttp = GetXmlHttpObject();
    if (xmlhttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }
	//sets the variables that make up the URL
    var id = document.getElementById('id').value;
	var name = document.getElementById('name').value;
	var price = document.getElementById('price').value;
	var sprice = document.getElementById('sprice').value;
	var dis = document.getElementById('dis').value;
	var test = document.getElementById('promo').checked;
	var test1 = document.getElementById('promo1').checked;
    var action =  "xx";
    var url = "../includes/pro.php";
        url = url + "?action=" + action;
        url = url + "&id=" + id;
		url = url + "&name=" + name;
		url = url + "&price=" + price;
		url = url + "&sprice=" + sprice;
		url = url + "&test=" + test;
		url = url + "&test1=" + test1;
		url = url + "&dis=" + dis;
	//opens and sends the HTTP request
    xmlhttp.open("GET", url, true);
    xmlhttp.send(null);
	//calls the showKitsetData function when the readystate changes
    xmlhttp.onreadystatechange = showCubaData1;
    
}
// Function for adding new product to db
function productcreate()
{
    //call the GetXmlHttpObject() to see what browser you are using
    xmlhttp = GetXmlHttpObject();
    if (xmlhttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }
	//sets the variables that make up the URL
    var type = document.getElementById('p-type').value;
	var name = document.getElementById('p-name').value;
	var price = document.getElementById('p-price').value;
	var sprice = document.getElementById('p-sprice').value;
	var dis = document.getElementById('p-dis').value;
    var action =  "xx";
    var url = "../includes/pro-create.php";
        url = url + "?action=" + action;
        url = url + "&type=" + type;
		url = url + "&name=" + name;
		url = url + "&price=" + price;
		url = url + "&sprice=" + sprice;
		url = url + "&dis=" + dis;
	//opens and sends the HTTP request
    xmlhttp.open("GET", url, true);
    xmlhttp.send(null);
	//calls the showKitsetData function when the readystate changes
    xmlhttp.onreadystatechange = showCubaData2;
    
}
function assignPic(str)
{
    //call the GetXmlHttpObject() to see what browser you are using
    xmlhttp = GetXmlHttpObject();
    if (xmlhttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }
    //sets the variables that make up the URL
    var url = "../includes/pro-pic.php";
        url = url + "?pro=" + str;
        url = url + "&sid=" + Math.random();

    //opens and sends the HTTP request
    xmlhttp.open("GET", url, true);
    xmlhttp.send(null);
    //calls the showKitsetData function when the readystate changes
    xmlhttp.onreadystatechange = showCubaData6;
}
function update_pro_pic(str)
{
	 //call the GetXmlHttpObject() to see what browser you are using
    xmlhttp = GetXmlHttpObject();
    if (xmlhttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }
	//sets the variables that make up the URL
	var picc = document.getElementById('piccy').value;
    var url = "../includes/pro-pic.php";
        url = url + "?action=" + str;
		url = url + "&pic=" + picc;
        url = url + "&sid=" + Math.random();

    //opens and sends the HTTP request
    xmlhttp.open("GET", url, true);
    xmlhttp.send(null);
    //calls the showKitsetData function when the readystate changes
    xmlhttp.onreadystatechange = showCubaData6;
}
function update_staff_pic(str)
{
	 //call the GetXmlHttpObject() to see what browser you are using
    xmlhttp = GetXmlHttpObject();
    if (xmlhttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }
	//sets the variables that make up the URL
	var picc = document.getElementById('staffpiccy').value;
    var url = "../includes/staff-pic.php";
        url = url + "?action=" + str;
		url = url + "&pic=" + picc;
        url = url + "&sid=" + Math.random();

    //opens and sends the HTTP request
    xmlhttp.open("GET", url, true);
    xmlhttp.send(null);
    //calls the showKitsetData function when the readystate changes
    xmlhttp.onreadystatechange = showCubaData7;
}
function assignStaffPic(str)
{
    //call the GetXmlHttpObject() to see what browser you are using
    xmlhttp = GetXmlHttpObject();
    if (xmlhttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }
    //sets the variables that make up the URL
    var url = "../includes/staff-pic.php";
        url = url + "?pro=" + str;
        url = url + "&sid=" + Math.random();

    //opens and sends the HTTP request
    xmlhttp.open("GET", url, true);
    xmlhttp.send(null);
    //calls the showKitsetData function when the readystate changes
    xmlhttp.onreadystatechange = showCubaData7;
}
// Product Edit
function showCubaData1()
{
    if (xmlhttp.readyState == 4)
    {
	//changes the content of the Content div to show the data from the http request
        document.getElementById("inline_content").innerHTML = xmlhttp.responseText;
    }
}
// Product Create
function showCubaData2()
{
    if (xmlhttp.readyState == 4)
    {
	//changes the content of the Content div to show the data from the http request
        document.getElementById("inline_contentx").innerHTML = xmlhttp.responseText;
    }
}
// Edit staff
function showCubaData3()
{
    if (xmlhttp.readyState == 4)
    {
	//changes the content of the Content div to show the data from the http request
        document.getElementById("inline_contentz").innerHTML = xmlhttp.responseText;
    }
}
// Create staff
function showCubaData4()
{
    if (xmlhttp.readyState == 4)
    {
	//changes the content of the Content div to show the data from the http request
        document.getElementById("inline_contenty").innerHTML = xmlhttp.responseText;
    }
}
// Product Pic Assignment
function showCubaData6()
{
    if (xmlhttp.readyState == 4)
    {
	//changes the content of the Content div to show the data from the http request
        document.getElementById("assignpic_content").innerHTML = xmlhttp.responseText;
    }
}
// Staff Pic Assignment
function showCubaData7()
{
    if (xmlhttp.readyState == 4)
    {
	        document.getElementById("inline_contentpic").innerHTML = xmlhttp.responseText;
    }
}
// Update Product Photo Assign Content On Listbox Select
function up() {
	var info = document.getElementById('lbx_pro');
	var image = info.options[info.selectedIndex].text;
	document.getElementById('newinner').innerHTML = 
	'<center><label>New Image</label><br><img src="../images/products/'+image+'" alt=""  height="180px" class="resizeme1" width="140px" onload=”$(this).aeImageResize({ height: 130, width: 150});/><br><label>'+image+'</label>';
	document.getElementById('piccy').value = image;
}
// Update Staff Photo Assign Content On Listbox Select
function upstaff() {
	var info = document.getElementById('lbx_pro_staff');
	var image = info.options[info.selectedIndex].text;
	document.getElementById('staff_newinner').innerHTML = 
	'<center><label>New Image</label><br><img src="../images/staff/'+image+'" alt=""  height="180px" class="resizeme1" width="140px" onload=”$(this).aeImageResize({ height: 130, width: 150});/><br><label>'+image+'</label>';
	document.getElementById('staffpiccy').value = image;
}
// Photo Upload Start
function startUpload(){
    document.getElementById('f1_upload_process').style.visibility = 'visible';
    return true;
}
// Photo Upload Result Sorter
function stopUpload(success){
    // Default result
	var result = '';
	// If statement to determine repsonse to image upload
    if (success == 1){
        document.getElementById('f1_upload_process').style.visibility = 'hidden';
        document.getElementById('result').innerHTML =
        '<span class="msg">The file was uploaded successfully!<\/span><br/><br/>';
    }
	else if (success == 2){
        document.getElementById('f1_upload_process').style.visibility = 'hidden';
        document.getElementById('result').innerHTML =
        '<span class="msg">The upload must be a png, jpeg or gif file!<\/span><br/><br/>';
	}
    else {
        document.getElementById('result').innerHTML =
        '<span class="emsg">There was an error during file upload!<\/span><br/><br/>';
    }
}