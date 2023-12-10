const blob = document.getElementById("blob");

window.onpointermove = event => {
   console.log(window.innerWidth);
   if (window.innerWidth > 1000) {
      blob.style.translate = "-50%, -50%";
      const { clientX, clientY } = event;
      blob.animate({
        left: `${clientX}px`,
        top: `${clientY}px`
      }, { duration: 3000, fill: "forwards" });
   }
   else {
        blob.animate({
          left: '50%',
          top: '50%',
          translate: '-50%, -50%'
        }, { duration: 0, fill: "forwards" });
   }
}
