
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
let curCodes = [];

function removeA(arr) {
    var what, a = arguments, L = a.length, ax;
    while (L > 1 && arr.length) {
        what = a[--L];
        while ((ax= arr.indexOf(what)) !== -1) {
            arr.splice(ax, 1);
        }
    }
    return arr;
}


function getRandomCodeSnippet() {
  return codeSnippets[Math.floor(Math.random() * codeSnippets.length)];
}


function createRandomCircle() {
    if (curCodes.length < maxCode) {
        const circle = document.createElement('div');
        circle.className = 'circle';

        circle.style.left = Math.random() * 100 + "vw";
        const codeSnippetContainer = document.createElement("pre");
        codeSnippetContainer.className = "code-snippet-bg";
        const randomCodeSnippet = getRandomCodeSnippet();
        codeSnippetContainer.textContent = randomCodeSnippet;
        circle.appendChild(codeSnippetContainer);

        document.getElementById("wrapper-outside-text").appendChild(circle);
        curCodes.push(circle);
        circle.addEventListener("animationend", () => {
            circle.remove()
            curCodes = removeA(curCodes, circle);


        });
        const animateCircle = () => {
            const circleBottom = circle.getBoundingClientRect().bottom;
            if (circleBottom >= window.innerHeight + 100) {
                circle.remove()
                curCodes = removeA(curCodes, circle);
            }
        };

        //requestAnimationFrame(animateCircle);
//        console.log(curCodes);
    }
}

setInterval(createRandomCircle, 500);


