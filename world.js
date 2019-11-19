window.onload=function(){
    document.getElementById("lookup").onclick=function(){    
    var xhs=new XMLHttpRequest();
    var query1=document.getElementById("country").value;
    var url1 = "https://82b2d32234c14705a530e170820bfe8b.vfs.cloud9.us-east-1.amazonaws.com/world.php?country="+query1;
    xhs.onreadystatechange = doSome; 
    xhs.open('GET', url1); 
    xhs.send();
    function doSome() { 
        if (xhs.readyState === XMLHttpRequest.DONE) { 
            if (xhs.status === 200) { 
                var response1 = xhs.responseText; 
                 document.getElementById("result").innerHTML=response1.trim(); 
            }  else{
                alert('There was a problem with the request.'); 
    
            }
        }
    }
    }
    document.getElementById("City").onclick=function(){    
    var x3=new XMLHttpRequest();
    var query1=document.getElementById("country").value;
    var url1 = "https://82b2d32234c14705a530e170820bfe8b.vfs.cloud9.us-east-1.amazonaws.com/world.php?country="+query1+"&context=cities";
    x3.onreadystatechange =Changed; 
    x3.open('GET', url1); 
    x3.send();
    function Changed() { 
        if (x3.readyState === XMLHttpRequest.DONE) { 
            if (x3.status === 200) { 
                var response1 = x3.responseText; 
                 document.getElementById("result").innerHTML=response1.trim(); 
            }  else{
                alert('There was a problem with the request.'); 
    
            }
        }
    }
    }
    }