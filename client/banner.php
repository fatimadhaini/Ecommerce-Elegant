<?php 
require('../class/products.class.php');
$product=new Products();
$result=$product->gettrending();
// var_dump($result);exit;
?><!DOCTYPE html>
<html lang="zxx">
<head>
    <?php require('./common/head.php');?>
    <script src="assets/js/vendor/vendor.min.js"></script>
    <script src="assets/js/plugins/plugins.min.js"></script>
    <!-- Main JS -->
    <script src="assets/js/main.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik+Mono+One&display=swap" rel="stylesheet">
    <style>
        /* Base Styles */
button {
    --glow-color: white;
    --glow-spread-color: white;
    --enhanced-glow-color: white;
    --btn-color: white;
    border: .25em solid white;
    padding: 1em 3em;
    color: var(--glow-color);
    font-size: 1em; /* Adjusted for scaling */
    font-weight: bold;
    background-color: white;
    border-radius: 1em;
    outline: none;
    box-shadow: 0 0 1em .25em white,
                0 0 4em 1em var(--glow-spread-color),
                inset 0 0 .75em .25em var(--glow-color);
    text-shadow: 0 0 .5em var(--glow-color);
    position: relative;
    transition: all 0.3s;
}

button::after {
    pointer-events: none;
    content: "";
    position: absolute;
    top: 120%;
    left: 0;
    height: 100%;
    width: 100%;
    background-color: white;
    filter: blur(2em);
    opacity: .7;
    transform: perspective(1.5em) rotateX(35deg) scale(1, .6);
}

button:hover {
    color: var(--btn-color);
    background-color: white;
    box-shadow: 0 0 1em .25em var(--glow-color),
                0 0 4em 2em var(--glow-spread-color),
                inset 0 0 .75em .25em var(--glow-color);
}

button:active {
    box-shadow: 0 0 0.6em .25em var(--glow-color),
                0 0 2.5em 2em var(--glow-spread-color),
                inset 0 0 .5em .25em var(--glow-color);
}

main {
    position: relative;
    display: flex;
    flex-direction: column;
    width: 100%;
    height: 100%;
    margin: 0;
    overflow: hidden;
    -webkit-box-shadow: -7px 10px 111px -33px rgba(0, 0, 0, 0.75);
    -moz-box-shadow: -7px 10px 111px -33px rgba(0, 0, 0, 0.75);
    box-shadow: -7px 10px 111px -33px rgba(0, 0, 0, 0.75);
    background: linear-gradient(90deg, #FEFFD2 0%, #FF7D29 35%, rgba(166,149,13,1) 100%, rgba(0,212,255,1) 100%);
}

#n {
    display: flex;
    flex-direction: column; /* Adjusted for better responsiveness */
    align-items: center;
    padding: 10px 20px; /* Adjusted padding */
    z-index: 1;
}

.logo {
    width: 40px;
    height: 40px;
}

.menu-text {
    display: flex;
    flex-direction: column; /* Adjusted for better responsiveness */
    gap: 15px;
    font-weight: 600;
    color: white;
    text-align: center; /* Centered for smaller screens */
}

.juice-text {
    z-index: 1;
    text-align: center;
}

#h1 {
    color: white;
    font-family: "Rubik Mono One", monospace;
    font-size: 2em; /* Scaled down size */
}

.juice-info {
    margin-top: 20px;
    color: white;
    font-size: 1.2em; /* Scaled down size */
    font-family: "Playfair Display", serif;
}

button {
    font-size: 1em; /* Scaled down size */
    padding: 10px 20px;
    border-radius: 15px;
    background-color: transparent;
    border: 1px solid white;
    color: white;
    cursor: pointer;
}

.content {
    display: flex;
    flex-direction: column;
    width: 100%;
    padding: 20px;
    box-sizing: border-box;
}

.juice-wrapper {
    width: 90px;
    height: 120px;
    padding-bottom: 10px;
    z-index: 1;
}

.static-juice {
    width: 100%;
    height: 100%;
    cursor: pointer;
}

.photos {
    display: flex;
    overflow-x: auto;
    margin: 10px 0; /* Adjusted margin */
}

.activePhoto {
    border-bottom: 2px solid white;
}

.juice-wheel,
.fruits-wheel {
    width: 300px;
    height: 300px;
    border-radius: 50%;
    position: absolute;
    right: 0;
    bottom: 0;
    transform: rotate(0deg);
    transition: transform 1s;
    z-index: 1;
}

.juice-wheel img,
.fruits-wheel img {
    width: 150px;
}

.dynamic-juice-1,
.dynamic-juice-2,
.dynamic-juice-3,
.dynamic-juice-4,
.dynamic-fruits-1,
.dynamic-fruits-2,
.dynamic-fruits-3,
.dynamic-fruits-4 {
    width: 100px;
    height: auto;
}

.fade-in {
    animation: fadeIn 1.5s forwards;
}

@keyframes fadeIn {
    0% {
        opacity: 0;
    }
    100% {
        opacity: 1;
    }
}

/* Media Queries */
@media (max-width: 768px) {
    #n {
        flex-direction: column;
        align-items: flex-start;
        padding: 10px;
    }

    .menu-text {
        flex-direction: column;
        gap: 10px;
        font-size: 1em;
    }

    .juice-info {
        margin-left: 0;
        font-size: 1em;
    }

    .juice-wheel,
    .fruits-wheel {
        width: 200px;
        height: 200px;
        position: relative;
        right: 0;
        bottom: 0;
        top: 0;
        left: 0;
        transform: rotate(0deg);
    }

    .juice-wheel img,
    .fruits-wheel img {
        width: 100px;
    }
}

@media (max-width: 480px) {
    #h1 {
        font-size: 1.5em;
    }

    .juice-info {
        font-size: 0.9em;
    }

    .content {
        padding: 10px;
    }

    .juice-wrapper {
        width: 60px;
        height: 80px;
    }
}
    </style>
</head>
<body>
    <!-- Start Header Area -->
    <header class="header-section d-none d-xl-block">
        <?php require('common/navbar.php');?>
    </header>
    <!-- Start Header Area -->

    <!-- Start Mobile Header -->
    <?php require('common/mobile_nav.php')?>
    <!-- End Mobile Header -->

    <!--  Start Offcanvas Mobile Menu Section -->
      <?php require('common/sidebar.php');?>
   <!-- ...:::: End Offcanvas Mobile Menu Section:::... -->


    <!-- Start Offcanvas Addcart Section -->
      <?php require('common/Addcartsection.php');?>
   <!-- End  Offcanvas Addcart Section -->

    <!-- Start Offcanvas Wishlist Menu Section -->
    <?php require('common/wishlistsection.php');?>
    <!-- End Offcanvas Wishlist Menu Section -->

    <!-- Start Offcanvas Search Bar Section -->
   <?php require('common/search.php');?>
    <!-- End Offcanvas Search Bar Section -->


    <!-- Offcanvas Overlay -->
    <div class="offcanvas-overlay"></div>
<style>button {
 --glow-color: white;
 --glow-spread-color: white;
 --enhanced-glow-color:white;
 --btn-color: white;
 border: .25em solid white;
 padding: 1em 3em;
 color: var(--glow-color);
 font-size: 15px;
 font-weight: bold;
 background-color: white;
 border-radius: 1em;
 outline: none;
 box-shadow: 0 0 1em .25em white,
        0 0 4em 1em var(--glow-spread-color),
        inset 0 0 .75em .25em var(--glow-color);
 text-shadow: 0 0 .5em var(--glow-color);
 position: relative;
 transition: all 0.3s;
}

button::after {
 pointer-events: none;
 content: "";
 position: absolute;
 top: 120%;
 left: 0;
 height: 100%;
 width: 100%;
 background-color: white;
 filter: blur(2em);
 opacity: .7;
 transform: perspective(1.5em) rotateX(35deg) scale(1, .6);
}

button:hover {
 color: var(--btn-color);
 background-color:white;
 box-shadow: 0 0 1em .25em var(--glow-color),
        0 0 4em 2em var(--glow-spread-color),
        inset 0 0 .75em .25em var(--glow-color);
}

button:active {
 box-shadow: 0 0 0.6em .25em var(--glow-color),
        0 0 2.5em 2em var(--glow-spread-color),
        inset 0 0 .5em .25em var(--glow-color);
}</style>
    
  
  <main>
    <nav id="n">
      
      <button ><a href="shop.php" style="color:white">Shop now</a></button>
    </nav>
    <div class="content">
      <div class="juice-text">
        <?php foreach($result as$key){?>
      <p id="h1"><?php echo $key['pro1']?></p>
      <p class="juice-info container" ><?php echo $key['pro1des'];?></p>
      <?php }?>
      </div>
      <?php foreach($result as$key){?>
      <div class="photos">
        <div class="juice-wrapper activePhoto">
          <img decoding="async" src="../client/assets/images/<?php echo $key['pro1img']?>" alt="juice1" class="static-juice">
        </div>
        <div class="juice-wrapper">
          <img decoding="async" src="../client/assets/images/<?php echo $key['pro2img']?>" alt="juice2" class="static-juice">
        </div>
        <div class="juice-wrapper">
          <img decoding="async" src="../client/assets/images/<?php echo $key['pro3img']?>" alt="juice3" class="static-juice">
        </div>
        <div class="juice-wrapper ">
          <img decoding="async" src="../client/assets/images/<?php echo $key['pro4img']?>" alt="juice4" class="static-juice">
        </div>
      </div>
    </div>
    <div class="juice-wheel">
      <img decoding="async" src="../client/assets/images/<?php echo $key['pro1img']?>" alt="juice1" class="dynamic-juice-1" />
      <img decoding="async" src="../client/assets/images/<?php echo $key['pro2img']?>" alt="juice1" class="dynamic-juice-2" />
      <img decoding="async" src="../client/assets/images/<?php echo $key['pro3img']?>" alt="juice1" class="dynamic-juice-3" />
      <img decoding="async" src="../client/assets/images/<?php echo $key['pro4img']?>" alt="juice1" class="dynamic-juice-4" />
    </div>
    <div class="fruits-wheel">
      <img decoding="async" src="../client/assets/images/<?php echo $key['pro1img2']?>" alt="orange" class="dynamic-fruits-1">
      <img decoding="async" src="../client/assets/images/<?php echo $key['pro2img2']?>" alt="plumb" class="dynamic-fruits-2">
      <img decoding="async" src="../client/assets/images/<?php echo $key['pro3img2']?>" alt="kiwi" class="dynamic-fruits-3">
      <img decoding="async" src="../client/assets/images/<?php echo $key['pro4img2']?>" alt="strawberry" class="dynamic-fruits-4">
    </div>
  </main>
<?php }?>

<style>

main {
    position: relative;
    display: flex;
    justify-content: space-between;
    flex-direction: column;
    width: 100%;
    height: 100%;
     margin:0px;
    overflow: hidden;
    -webkit-box-shadow: -7px 10px 111px -33px rgba(0, 0, 0, 0.75);
    -moz-box-shadow: -7px 10px 111px -33px rgba(0, 0, 0, 0.75);
    box-shadow: -7px 10px 111px -33px rgba(0, 0, 0, 0.75);
    background: linear-gradient(90deg, #FEFFD2 0%, #FF7D29 35%, rgba(166,149,13,1) 100%, rgba(0,212,255,1) 100%);
}

#n {
    display: flex;
    justify-content: space-between;
    padding: 20px 30px;
    align-items: center;
    z-index: 1;
}

.logo {
    width: 40px;
    height: 40px;
}

.menu-text {
    display: flex;
    gap: 50px;
    font-weight: 600;
    color: white;
}

.juice-text {
    z-index: 1;
}

#h1 {
    text-align: center;
    color: white;
    font-family: "Rubik Mono One", monospace;
    font-size:30px;
    
}

.juice-info {
 
    text-align: center;
    margin-top: 20px;
    margin-left:120px;
    color: white;
    font-size: 20px;
    
  font-family: "Playfair Display", serif;
}

button {
    font-size: 18px;
    padding: 10px 30px;
    border-radius: 15px;
    background-color: transparent;
    border: 1px solid white;
    color: white;
    cursor: pointer;
}

.content {
    display: flex;
    flex-direction: column;
    width: 50%;
    gap: 80px;
    margin: 30px;
}

.juice-wrapper {
    width: 90px;
    height: 120px;
    padding-bottom: 10px;
    z-index: 1;
}

.static-juice {
    width: 100%;
    height: 100%;
    cursor: pointer;

}

.photos {
    display: flex;
    margin-left: 20px;
}

.activePhoto {
    border-bottom: 2px solid white;
}

.juice-wheel {
    width: 500px;
    height: 500px;
    border-radius: 50%;
    position: absolute;
    right: -280px;
    bottom: -300px;
    transform: rotate(-45deg);
    transition: transform 1s;
    z-index: 1;
}

.juice-wheel img {
    width: 320px;
}

.dynamic-juice-1 {
    position: absolute;
    top: -320px;
    right: 40px;
}

.dynamic-juice-2 {
    position: absolute;
    transform: rotate(140deg);
    right: -290px;
    top: 30px;
}

.dynamic-juice-3 {
    position: absolute;
    transform: rotate(220deg);
    bottom: -350px;
    right: 83px;
}

.dynamic-juice-4 {
    position: absolute;
    transform: rotate(300deg);
    top: 30px;
    left: -290px
}

.fruits-wheel {
    width: 700px;
    height: 700px;
    border-radius: 50%;
    position: absolute;
    top: -600px;
    left: -480px;
    transform: rotate(-45deg);
    transition: transform 1s;
    z-index: 0;

}

.fruits-wheel img {
    width: 650px;
    opacity: 40%;
}

.dynamic-fruits-1 {
    position: absolute;
    transform: rotate(90deg);
    bottom: -500px;
    left: 10px;

}

.dynamic-fruits-2 {
    position: absolute;
    transform: rotate(180deg);
    bottom: 200px;
    left: -580px;
}

.dynamic-fruits-3 {
    position: absolute;
    transform: rotate(100deg);
    top: -350px;
    left: 90px;

}

.dynamic-fruits-4 {
    position: absolute;
    bottom: 120px;
    right: -600px;
}

.fade-in {
    animation: fadeIn 1.5s forwards;
}

@keyframes fadeIn {
    0% {
        opacity: 0;
    }

    100% {
        opacity: 1;
    }
}</style>
<script>
const juiceArray = document.querySelectorAll(".juice-wrapper");
const title = document.querySelector("#h1");
const description = document.querySelector(".juice-info");

const juiceWheel = document.querySelector(".juice-wheel");
const fruitsWheel = document.querySelector(".fruits-wheel");
const juiceText = document.querySelector(".juice-text");

let currentJuice = juiceArray[0];
let deg = -45;

// PHP variables
const juiceData = [
    <?php foreach($result as $key) { ?>
    {
        name: "<?php echo $key['pro1']; ?>",
        descriptioN: "<?php echo $key['pro1des']; ?>",
        backgroundColor: "linear-gradient(90deg, #FEFFD2 0%, #FF7D29 35%, rgba(166,149,13,1) 100%, rgba(0,212,255,1) 100%)",
    },
    {
        name: "<?php echo $key['pro2']; ?>",
        descriptioN: "<?php echo $key['pro2des']; ?>",
        backgroundColor: "linear-gradient(90deg, rgba(2,19,45,1) 4%, rgba(120,109,181,1) 49%, rgba(230,132,132,1) 100%, rgba(0,212,255,1) 100%)",
    },
    {
        name: "<?php echo $key['pro3']; ?>",
        descriptioN: "<?php echo $key['pro3des']; ?>",
        backgroundColor: "linear-gradient(90deg, rgba(9,111,55,1) 0%, rgba(39,196,129,1) 49%, #597445 100%, #597445 100%)",
    },
    {
        name: "<?php echo $key['pro4']; ?>",
        descriptioN: "<?php echo $key['pro4des']; ?>",
        backgroundColor: "linear-gradient(90deg, rgba(101,18,18,1) 0%, rgba(186,44,44,1) 49%, rgba(235,134,80,1) 100%, rgba(0,212,255,1) 100%)",
    }
    <?php if($key !== end($result)) { ?>, <?php } ?>
    <?php } ?>
];

juiceArray.forEach((element, index) => {
    element.addEventListener("click", () => {
        if (index >= juiceData.length) return;

        console.log('Clicked:', index);
        console.log('Data:', juiceData[index]);

        document.querySelector("main").style.background = juiceData[index].backgroundColor;
        deg = deg - 90;
        juiceWheel.style.transform = `rotate(${deg}deg)`;
        fruitsWheel.style.transform = `rotate(${deg}deg)`;
        title.innerHTML = juiceData[index].name;
        description.innerHTML = juiceData[index].descriptioN;
        currentJuice.classList.remove("activePhoto");
        element.classList.add("activePhoto");
        currentJuice = element;
        juiceText.classList.add("fade-in");
        setTimeout(() => {
            juiceText.classList.remove("fade-in");
        }, 1000);
    });
});
</script><br><br><br>
<?php require('../client/common/footer.php')?>