function getRequest(param,selectedId,options){
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        var xhttp = new XMLHttpRequest(),
            protocol = window.location.protocol,
            hostName = window.location.hostname;
    } else {
        // code for IE6, IE5
        var xhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    options = options?options:null;
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {

        var responses = JSON.parse(this.responseText) ? JSON.parse(this.responseText) : null;
        //console.log(responses);
        if(options && responses) options.response(responses);
      }
    };
    
    url = url.match(protocol)[0] === "https:"? protocol+ "//" + hostName + "/" + param:protocol + "//" + hostName + ":8080/" +param;

    xhttp.open("GET", url, true);
    xhttp.send();
}