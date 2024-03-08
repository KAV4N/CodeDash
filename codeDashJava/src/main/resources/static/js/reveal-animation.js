const letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";

let interval = null;

function isUpperCase(letter) {
  return letter === letter.toUpperCase();
}

document.querySelector(".codeDash-home").onmouseover = (event) => {
  let iteration = 0;
  clearInterval(interval);

  interval = setInterval(() => {
    event.target.innerText = event.target.innerText
      .split("")
      .map((letter, index) => {
        if (index < iteration) {
          return event.target.dataset.value[index];
        }

        const originalLetter = event.target.dataset.value[index];
        const randomLetter =
          originalLetter && !isUpperCase(originalLetter)
            ? letters[Math.floor(Math.random() * 26)].toLowerCase()
            : letters[Math.floor(Math.random() * 26)];

        return randomLetter;
      })
      .join("");

    if (iteration >= event.target.dataset.value.length) {
      clearInterval(interval);
    }

    iteration += 1 / 3;
  }, 30);
};
