!function(){function a(){for(var a=this;-1===a.className.indexOf("nav-menu");)"li"===a.tagName.toLowerCase()&&(-1!==a.className.indexOf("focus")?a.className=a.className.replace(" focus",""):a.className+=" focus"),a=a.parentElement}var b,c,d,e,f;if(b=document.getElementById("site-navigation"),b&&(c=b.getElementsByTagName("button")[0],"undefined"!=typeof c)){if(d=b.getElementsByTagName("ul")[0],"undefined"==typeof d)return void(c.style.display="none");d.setAttribute("aria-expanded","false"),-1===d.className.indexOf("nav-menu")&&(d.className+=" nav-menu"),c.onclick=function(){-1!==b.className.indexOf("toggled")?(b.className=b.className.replace(" toggled",""),c.setAttribute("aria-expanded","false"),d.setAttribute("aria-expanded","false")):(b.className+=" toggled",c.setAttribute("aria-expanded","true"),d.setAttribute("aria-expanded","true"))},e=d.getElementsByTagName("a"),f=d.getElementsByTagName("ul");for(var g=0,h=f.length;h>g;g++)f[g].parentNode.setAttribute("aria-haspopup","true");for(g=0,h=e.length;h>g;g++)e[g].addEventListener("focus",a,!0),e[g].addEventListener("blur",a,!0)}}();