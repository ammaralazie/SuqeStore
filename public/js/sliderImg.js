console.log("working ...");
let wepperImg = document.getElementsByClassName("wepper-img")[0];
let pointerImage = document.getElementsByClassName("pointerImage")[0];
let timerBackground = document.getElementsByClassName("timer-background")[0];
timerBackground.classList.add("active");
let child = 1;
let trnaslate = wepperImg.children[1].clientWidth;
let mov = trnaslate;
let clearIntr

function imgMov(mv){
  clearIntr = setInterval(async function movImg() {
    console.log("mv : ",mv)
    //this event to sinus any resize on window
    window,
      addEventListener("resize", () => {
        trnaslate = wepperImg.children[1].clientWidth;
        mov = trnaslate;
        trnsByPoint(mov);
        child = 1;
      });
    if (mov >= wepperImg.offsetWidth) {
      mov = await jampImh();
    }

    wepperImg.style.transform = "translateX(-" + mov + "px)";
    if (mov == 0) {
      x = await overTime();
    }

    wepperImg.style.transition = "transform 1s ease";
    if(mv){
      mov = mv + trnaslate;
      mv=null
    }else{
      mov = mov + trnaslate;
    }

    //this function for text animation
    txtAnimation();
  }, 9000);
}
imgMov(null)

function jampImh() {
  return new Promise((resolve) => {
    wepperImg.style.transition = "transform 0s ease";
    wepperImg.style.transform = "translateX(0px)";
    resolve(0);
  });
} //end of jampImh function

//this function like timer where work
//to place the first image for number of secondes
function overTime() {
  return new Promise((wait) => {
    setTimeout(() => {
      wait("overTime");
    }, 10);
  });
} //end of overTime function

//this var to check if the postion is last or no
let check = false;
//this txtAnimation for txt in image
function txtAnimation() {
  if (!check) {
    wepperImg.children[child].children[0].classList.add("active");
  } else {
    wepperImg.children[
      wepperImg.children.length - 1
    ].children[0].classList.remove("active");
  }

  if (child == wepperImg.children.length - 1) {
    wepperImg.children[child - 1].children[0].classList.remove("active");
    pointImg(child);
    child = 0;
    check = true;
  } else {
    if (child != 0) {
      wepperImg.children[child - 1].children[0].classList.remove("active");
    }
    pointImg(child);
    child++;
    check = false;
  }
} //end of txtAnimation

//this pointImg function to refer for active image
function pointImg(child) {
  if (child <= pointerImage.children.length - 1) {
    let item = pointerImage.children[child];
    item.classList.add("active");
  }
  if (child != 0) {
    pointerImage.children[child - 1].classList.remove("active");
  }
  if (child == pointerImage.children.length) {
    pointerImage.children[pointerImage.children.length - 1].classList.remove(
      "active"
    );
    pointerImage.children[0].classList.add("active");
  }
} //end of pointImg

//this function for translate by pointImg

function trnsByPoint(mv) {
  let points = pointerImage.getElementsByClassName("trans");
  pointMov = 0;
  //this section to convert points in images to Array and make forEach to
  //add listener for translate
  Array.prototype.forEach.call(points, (point) => {


    //this section to take last translate when make resize for window
    if (point.classList.length >= 2) {
      for (var j = 0; j < point.classList.length; j++) {
        if (
          j != 0 &&
          point.classList[j] != "active" &&
          point.classList[j] != "trans"
        ) {
          point.classList.remove(point.classList[j]);
        }
      } //end of for loop
    }
    point.classList.add(pointMov);
    console.log(point);
    pointMov += mv;

    point.addEventListener("click", (e) => {
      e.preventDefault();
      wepperImg.style.transform = "translateX(-" + point.classList[2] + "px)";
      clearInterval(clearIntr)
      console.log(child)
    wepperImg.style.transition = "transform 1s ease";

      points[float2int(child)-1].classList.remove("active")
      console.log("parseInt( point.classList[2] :",parseInt( point.classList[2]))
      child=float2int(parseInt( point.classList[2]))/mv
      txtAnimation();
      setTimeout(()=>{
        imgMov( parseInt(point.classList[2]))
      },10)
      console.log(timerBackground);
    }); //end of addEventListener
  });
} //end of points

trnsByPoint(mov);

//this function to convert float to int 4.455=>4
function float2int (value) {
  return value | 0;
}
