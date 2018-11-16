function process(){

var xmlhttp = new XMLHttpRequest();

xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        myObj = JSON.parse(this.responseText);
        document.getElementById("demo").innerHTML = myObj.name;
    }
};
food = encodeURICompoent(document.getElementById('userInput').value);
xmlhttp.open("GET", "examp.php?food ="+food, true);
xmlRes = xmlHttp.responseXML;
			xmlDocumentElement = xmlRe.documentElement;
			massage = xmlDocumentElement.firstChild.data;
	document.getElementById("underInput").innerHTML = '<span style="color:blue">'+massage
xmlhttp.send();

}