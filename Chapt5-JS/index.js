// global variabel
let title = document.getElementById("level-title");
let container = document.getElementById("container");
var level = 0;
var wrong = 0;

let urutanRandom = [];
let urutanPemain = [];

for (let index = 0; index < 4; index++) {
   document
      .querySelectorAll(".btn")[index]
      .addEventListener("click", function () {
         handleClick(this.id);
         if (wrong === 1) {
            var audio = new Audio("sounds/wrong.mp3");
            audio.play();
         } else {
            makeSound(this.id)
         }
         buttonAnimation(this.id);
      });
}

function buttonAnimation(key) {
   document.querySelector("#" + key).classList.add("pressed");
   setTimeout(function () {
      document.querySelector("#" + key).classList.remove("pressed");
   }, 100);
}

function makeSound(key) {
   switch (key) {
      case "blue":
         var audio = new Audio("sounds/blue.mp3");
         audio.play();
         break;
      case "green":
         var audio = new Audio("sounds/green.mp3");
         audio.play();
         break;
      case "red":
         var audio = new Audio("sounds/red.mp3");
         audio.play();
         break;
      case "yellow":
         var audio = new Audio("sounds/yellow.mp3");
         audio.play();
         break;
      default:
         break;
   }
}

function activateTile(color) {
   buttonAnimation(color);
   makeSound(color);
}

function playRound(nextSequence) {
   nextSequence.forEach((color, index) => {
      setTimeout(() => {
         activateTile(color);
      }, (index + 1) * 600);
   });
}

function nextStep() {
   const kotak = ['red', 'green', 'blue', 'yellow'];
   const random = kotak[Math.floor(Math.random() * kotak.length)];

   return random;
}

function humanTurn() {
   container.classList.remove('unclickable');
}

function nextRound() {
   level += 1;

   container.classList.add('unclickable');
   title.textContent = `Level ${level}`;
   const urutanSelanjutnya = [...urutanRandom];
   urutanSelanjutnya.push(nextStep());
   playRound(urutanSelanjutnya);
   urutanRandom = [...urutanSelanjutnya];
   setTimeout(() => {
      humanTurn();
   }, level * 800);
}

function resetGame(text) {
   gameStatus = 0;
   title.textContent = `${text}`;
   document.body.classList.add("game-over");
   setTimeout(() => {
      document.body.classList.remove("game-over");
   }, 100);
   urutanRandom = [];
   urutanPemain = [];
   level = 0;
   container.classList.add('unclickable');
   document.addEventListener("keyup", () => {
      if (gameStatus === 0) {
         mulaiGame();
         gameStatus = 1;
      }
   });
}

function handleClick(key) {
   const index = urutanPemain.push(key) - 1;

   if (urutanPemain[index] !== urutanRandom[index]) {
      wrong = 1;
      resetGame('Game Over, Press Any Key to Restart');
      return;
   }

   if (urutanPemain.length === urutanRandom.length) {
      wrong = 0;
      urutanPemain = [];
      setTimeout(() => {
         nextRound();
      }, 1000);
      return;
   }
}

function mulaiGame() {
   nextRound();
}

var gameStatus = 0;
// onload
document.addEventListener("keypress", (event) => {
   if (event.key === "A" || event.key === "a" && gameStatus === 0) {
      mulaiGame();
      gameStatus = 1;
   }
});