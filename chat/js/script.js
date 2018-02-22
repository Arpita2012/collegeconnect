

var t = setInterval(function(){get_chat_msg()},5000);


//
// General Ajax Call
//
      
var oxmlHttp;
var oxmlHttpSend;


function get_chat_msg()
{   

    var sender="";
    var receiver="";
    if (document.getElementById("sender") != null)
    {
        sender = document.getElementById("sender").value;
        document.getElementById("sender").readOnly=true;
    }

    if (document.getElementById("receiver") != null)
    {
        receiver = document.getElementById("receiver").value;
        document.getElementById("receiver").readOnly=true;
    }


    if(typeof XMLHttpRequest != "undefined")
    {
        oxmlHttp = new XMLHttpRequest();
    }
    else if (window.ActiveXObject)
    {
       oxmlHttp = new ActiveXObject("Microsoft.XMLHttp");
    }
    if(oxmlHttp == null)
    {
        alert("Browser does not support XML Http Request");
       return;
    }
    
    oxmlHttp.onreadystatechange = get_chat_msg_result;
   // alert("chat_recv_ajax.php");
    oxmlHttp.open("POST","chat_recv_ajax.php" ,true);
    oxmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
oxmlHttp.send("sender="+sender+"&receiver="+receiver);
    //oxmlHttp.send(null);
}
     
function get_chat_msg_result()
{
    if(oxmlHttp.readyState==4 || oxmlHttp.readyState=="complete")
    {
        if (document.getElementById("DIV_CHAT") != null)
        {
            document.getElementById("DIV_CHAT").innerHTML =  oxmlHttp.responseText;
            oxmlHttp = null;
        }
        var scrollDiv = document.getElementById("DIV_CHAT");
        scrollDiv.scrollTop = scrollDiv.scrollHeight;
    }
}

      
function set_chat_msg()
{

    if(typeof XMLHttpRequest != "undefined")
    {
        oxmlHttpSend = new XMLHttpRequest();
    }
    else if (window.ActiveXObject)
    {
       oxmlHttpSend = new ActiveXObject("Microsoft.XMLHttp");
    }
    if(oxmlHttpSend == null)
    {
       alert("Browser does not support XML Http Request");
       return;
    }
    
  // alert("was here")    
    var url = "chat_send_ajax.php";
    
var sender="";
    var receiver="";
    var msg="";
    if (document.getElementById("sender") != null)
    {
        sender = document.getElementById("sender").value;
        document.getElementById("sender").readOnly=true;
    }

    if (document.getElementById("receiver") != null)
    {
        receiver = document.getElementById("receiver").value;
        document.getElementById("receiver").readOnly=true;
    }

    if (document.getElementById("message") != null)
    {
        msg = document.getElementById("message").value;
        //alert(msg);
        document.getElementById("message").value = "";
    }

    
    


        
   

    oxmlHttpSend.open("POST",url,true);


    oxmlHttpSend.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    oxmlHttpSend.send("sender="+sender+"&receiver="+receiver+"&message=" + msg);
   // alert("sender="+sender+"&receiver="+receiver+"&message=" + msg);
    //    oxmlHttpSend.send(null);
}


