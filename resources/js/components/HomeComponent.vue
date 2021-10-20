
/* HTML Section */
<template>
    <div class="main-home">
            <!-- nav -->
    <nav id="navbar">
      <div class="logo">souqStore</div>
      <div class="menuList">
        <ul class="list">
          <li class="item"><a href="">best seller</a> <span></span></li>
          <li class="item"><a href="">newly added</a> <span></span></li>
          <li class="item"><a href="">Categories</a> <span></span></li>
          <li class="item">
            <button>
              Profile<i class="fas fa-sort-down"></i>
              <span></span>
            </button>
          </li>
        </ul>
      </div>
    </nav>
    <!-- /nav -->

    <!-- main -->
    <main>
      <section class="backgroundUrl">
        <span class="timer-background"></span>
        <div class="wepper-img">

          <!-- img-div1 -->
          <div class="img-div">
            <div class="txt">
              <h1>Lorem, ipsum dolor.</h1>
              <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illum, quidem!</p>
            </div>
            <img class="img-1" src="../sliderImg/pex-1.jpg" alt="" />
          </div>
          <!-- /img-div1 -->

          <!-- img-div2 -->
          <div class="img-div">
            <div class="txt">
              <h1>Lorem, ipsum dolor.</h1>
              <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illum, quidem!</p>
            </div>
            <img class="img-2" src="../sliderImg/pex-2.jpg" alt="" />
          </div>
          <!-- /img-div2 -->

          <!-- img-div3 -->
          <div class="img-div">
            <div class="txt">
              <h1>Lorem, ipsum dolor.</h1>
              <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illum, quidem!</p>
            </div>
            <img class="img-3" src="../sliderImg/pex-3.jpg" alt="" />
          </div>
          <!-- /img-div3 -->

          <!-- img-div4 -->
          <div class="img-div">
            <div class="txt">
              <h1>Lorem, ipsum dolor.</h1>
              <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illum, quidem!</p>
            </div>
            <img class="img-4" src="../sliderImg/pex-4.jpg" alt="" />
          </div>
          <!-- /img-div4 -->

          <!-- div-img5 -->
          <div class="img-div">
            <div class="txt">
              <h1>Lorem, ipsum dolor.</h1>
              <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illum, quidem!</p>
            </div>
            <img class="img-5" src="../sliderImg/pex-5.jpg" alt="" />
          </div>
          <!-- div-img5 -->


          <!-- div-img1 -->
          <div class="img-div">
            <div class="txt">
              <h1>Lorem, ipsum dolor.</h1>
              <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illum, quidem!</p>
            </div>
            <img class="img-1" src="../../public/sliderImg/pex-1.jpg" alt="" />
          </div>
          <!-- /div-img1 -->
        </div>
        <button class="leftBtn">
          <i class="fad fa-arrow-alt-circle-left"></i>
        </button>
        <button class="rightBtn">
          <i class="fad fa-arrow-alt-circle-right"></i>
        </button>
        <div class="pointerImage">
          <div class="point-1 trans"></div>
          <div class="point-2 trans"></div>
          <div class="point-3 trans"></div>
          <div class="point-4 trans"></div>
          <div class="point-5 trans"></div>
        </div>
      </section>
    </main>
    </div>
</template>


/* javaScript sction  */
<script>
export default {
    name:'homePage'
}
</script>
