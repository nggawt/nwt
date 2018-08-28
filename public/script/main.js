
var  path = document.getElementById('carrousel');
function isPathNotIquelNull(){
    if(path !== null){
        console.log('is not equel to null');
        return true;
     }else{
         console.log('its equel to null');
         return false;
     }
}
if(isPathNotIquelNull()){
    
    var imgWidth = path.children[0].clientWidth, counter = 0,
    parentWidth = path.children.length * imgWidth,
    ii = -1, setTime, fadeIn = -3, fadeOut = 10,interval;
    
    path.style.width = parentWidth + "px";
    
    console.log(parentWidth + ": " + imgWidth);
};


        

function calcOpacity(){
    
    var opac = {
        opacIn:function(){
            var opIn = fadeIn / 10;
            if(fadeIn < 10){
                fadeIn = fadeIn + 1.35;
            }else{
                fadeIn = -3;
                opIn = 1;
            }
            
            return opIn;
        },
        opacOut:function(){
            var opOut = fadeOut / 10;
            if(fadeOut > 0){
                fadeOut = fadeOut - 1;
            }else{
                fadeOut = 10;
                opOut = 0;
            }
            //console.log(opOut);
            return opOut;
        }
    };
    return  opac;
}

function carrousel(){
//    window.addEventListener('focus', function(){
//        
//        
//        return false;
//     }, false);

    if(document.visibilityState === 'hidden' || document.hidden === true){
        return false;
    }
    
    var pathChildren = path.children;
    
    if(ii < pathChildren.length - 2){
        ii++;
    }else{
        ii = -1;
    }
    if(pathChildren[ii] && pathChildren[ii].nextElementSibling){
        pathChildren[ii].nextElementSibling.style.width = 0 + "px";
//        pathChildren[ii].nextElementSibling.style.height = 100 + "%";
    }else{
        path.lastElementChild.style.width = 0 + "px";
        path.firstElementChild.style.width = 0 + "px";
//        path.firstElementChild.style.height = 100 + "%";
    }

    function calcTimer(){
        
        var dd = counter / 10;
        if(counter <= 10){
            counter++;
        }else{
            counter = 0;
            dd = 0;
            clearTimeout(setTime);
            return false;
        }
        
        if(pathChildren[ii] && pathChildren[ii].nextElementSibling){
            pathChildren[ii].nextElementSibling.style.opacity = calcOpacity().opacIn();
            pathChildren[ii].style.opacity = calcOpacity().opacOut();
            pathChildren[ii].nextElementSibling.style.width = (imgWidth * dd) + "px";
        }else{
            path.firstElementChild.style.opacity = calcOpacity().opacIn();
            path.lastElementChild.style.opacity = calcOpacity().opacOut();
            path.firstElementChild.style.width = (imgWidth * dd) + "px";
        }
        //console.log(1140 * dd);
        path.style.marginLeft = -(imgWidth *(ii + dd)) + "px";
        

        //return couter;
        setTime = setTimeout(calcTimer,70);
    }
    calcTimer();
}
if(document.hidden === false && isPathNotIquelNull()){
interval = setInterval(function(){
    carrousel();
},3500);
}
//console.log(document.hidden);


function getHiddenProp(){
    var prefixes = ['webkit','moz','ms','o'];
    
    // if 'hidden' is natively supported just return it
    if ('hidden' in document) return 'hidden';
    
    // otherwise loop over all the known prefixes until we find one
    for (var i = 0; i < prefixes.length; i++){
        if ((prefixes[i] + 'Hidden') in document) 
            return prefixes[i] + 'Hidden';
    }

    // otherwise it's not supported
    return null;
}

function isHidden() {
    var prop = getHiddenProp();
    if (!prop) return false;
    
    return document[prop];
}
  //console.log(isHidden());