// =============================================
var tl = gsap.timeline({
    scrollTrigger: {
        trigger: ".brand-sub-content",
        start: "top 50%",
        end: "top 30%",
        scrub: 1,
        markers: false,
    },
});
tl.to(".card1", {
    y: 650,
    x: -1025,
    height: "40px",
    width: "135px",
    duration: 1,
    zIndex: 9999,
    borderRadius: 2,
    backgroundColor: "#ccc",
});
tl.to(".card3", {
    y: 655,
    x: -790,
    height: "40px",
    width: "90px",
    duration: 5,
    zIndex: 9999,
    borderRadius: 5,
    backgroundColor: "#ccc",
});
tl.to(".card4", {
    y: 650,
    x: -555,
    height: "40px",
    width: "90px",
    duration: 5,
    zIndex: 9999,
    borderRadius: 5,
    backgroundColor: "#ccc",
});

tl.to(".card5", {
    y: 590,
    x: -310,
    height: "40px",
    width: "125px",
    duration: 5,
    zIndex: 9999,
    borderRadius: 5,
    backgroundColor: "#ccc",
});
tl.to(".card6", {
   y: 572,
    x: -260,
    height: "40px",
    width: "155px",
    duration: 5,
    zIndex: 9999,
    borderRadius: 5,
    backgroundColor: "#ccc",
});
tl.to(".card7", {
     y: 538,
    x: -225,
    height: "40px",
    width: "130px",
    duration: 5,
    zIndex: 9999,
    borderRadius: 5,
    backgroundColor: "#ccc",
});
tl.to(".card8", {
    y: 442,
    x: 55,
    height: "40px",
    width: "105px",
    duration: 5,
    zIndex: 9999,
    borderRadius: 5,
    backgroundColor: "#ccc",
});
tl.to(".card9", {
    y: 494,
    x: 265,
    height: "40px",
    width: "110px",
    duration: 5,
    zIndex: 9999,
    borderRadius: 5,
    backgroundColor: "#ccc",
});
