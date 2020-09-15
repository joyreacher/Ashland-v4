
gsap.registerPlugin(ScrollTrigger, CSSRulePlugin);
const cardTitle = $(".card-title");
const menu = $(".user-nav-list");



// HAMBURGER/MENU  ANIMATION
 var tween = TweenLite.from (menu, { xPercent: 350, paused: true, reversed:true});
let hamburger = TweenLite.from (".hamburger", {xPercent: -50, paused: true, reversed:true});
document.querySelector("button").addEventListener("click", doCoolStuff);
function doCoolStuff() {
    gsap.set("nav", {overflow: "visible"});

    hamburger.reversed() ? hamburger.play() : hamburger.reverse();
    tween.reversed() ? tween.play() : tween.reverse();
}



//CARD HOVER ANIMATIONS( HOMEPAGE )
cardTitle.hover(
  function () {
    // index of card
    var card = cardTitle.index(this);
    // sets the index to card variable
    var card = $(`.card`).get(card);
    // animaition
    TweenLite.to(card, { scale: 1.1, ease: Power1.easeInOut });
  },
  //scale back to 1 animaiton
  function () {
    var card = cardTitle.index(this);
    var card = $(`.card`).get(card);
    TweenLite.to(card, { scale: 1, ease: Power3.easeOut });
  }
);

// functioning hover statement
// $(".card-block").hover(
//   function () {
//     $(this).
//   },
//   function () {
//     title.reverse();
//   }
// );

//adds hidden class to all card-blck els
// $(".card-block").each(function (i, obj) {
//   $(this).addClass("hidden");

// });
/********************************** */
// document.querySelector(".card-block").onmouseleave = () => this.twwen.reverse();

// $(".card-title").hover(
//   function () {
//     $(this).css("background-color", "yellow");
//     $(this).css("transform", "scaleY(1.1)");
//   },
//   function () {
//     $(this).css("transform", "scale(1)");
//     $(this).css("background-color", "none");
//   }
// );

gsap.from(".card-block", {
  scrollTrigger: {
    trigger: ".content",
    start: "top",
    end: "center",
  },
  y: 100,
  stagger: 0.5,
  opacity: 0,
  duration: 1,
});
