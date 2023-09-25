const body = document.body;

const codeSnippets = [
  `function add(x, y) {
  return x + y;
}
`,
  `for (let i = 0; i < 5; i++) {
  console.log('Iteration ' + i);
}
`,
  `if (condition) {
  // Your code here
}
`,
  `// More code snippets...
`,
  `const greet = (name) => {
  return 'Hello, ' + name + '!';
}
`,
  `const numbers = [1, 2, 3, 4, 5];
const doubledNumbers = numbers.map((num) => num * 2);
`,
  `const person = {
  firstName: 'John',
  lastName: 'Doe',
  age: 30,
};
`,
  `console.log(person.firstName + ' ' + person.lastName + ' is ' + person.age + ' years old.');
`,
];



const maxCode = 12;
let curCodes = 0;


function getRandomCodeSnippet() {
  return codeSnippets[Math.floor(Math.random() * codeSnippets.length)];
}


function createRandomCircle() {
  if (curCodes < maxCode) {
    const circle = document.createElement("div");
    circle.className = "circle";
    circle.style.left = `${Math.random() * 100}vw`;
    circle.style.top = `${Math.random() * 100}vh`;

    const codeSnippetContainer = document.createElement("pre");
    codeSnippetContainer.className = "code-snippet-bg";
    const randomCodeSnippet = getRandomCodeSnippet();
    codeSnippetContainer.textContent = randomCodeSnippet;
    circle.appendChild(codeSnippetContainer);
    body.appendChild(circle);

    const animateCircle = () => {
      const circleBottom = circle.getBoundingClientRect().bottom;
      if (circleBottom >= window.innerHeight + 100) {
        if (circle.parentNode === body) {
          body.removeChild(circle);
          curCodes--;
        }
      }
    };

    circle.addEventListener("animationend", () => {
      if (circle.parentNode === body) {
        body.removeChild(circle);
        curCodes--;
      }
    });

    requestAnimationFrame(animateCircle);
    curCodes++;
  }
}

setInterval(createRandomCircle, 500);