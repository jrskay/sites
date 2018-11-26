'use strict';   // Mode strict du JavaScript

/******************************************************************
/* ****************************************** DONNEES
/*************************************************************************************************/
var a = document.querySelector('.toolbar-toggle');
var ul = document.querySelector('.control');
var img = document.querySelector('.slider');
var prev = document.getElementById('slider-previous');
var next = document.getElementById('slider-next');
var play = document.getElementById('slider-toggle');
var pause = document.getElementById('slider-pause');
var random = document.getElementById('slider-random');
/*************************************************************************************************/
/* ***************************************** FONCTIONS ***************************************** */
/*************************************************************************************************/


function onClickNavDisplay(){
	ul.classList.toggle('hide');
}

/*************************************************************************************************/
/* ************************************** CODE PRINCIPAL *************************************** */
/*************************************************************************************************/

var index = 0;
var url =["1.jpg", "2.jpg", "3.jpg", "4.jpg", "5.jpg", "6.jpg"];
function onClickPreviousSwitch(){
  index--;
  if (index == -1) {
    index = 5;
  }
  img.src = 'images/'+url[index];
}
function onClickNextSwitch(){
  index++;
  img.src = 'images/'+url[index];
  if (index == 5) {
    index = -1;
  }
}
function getRandomInteger(min, max)
{
	return Math.floor(Math.random() * (max - min + 1)) + min;
}


var timer;
function onClicPlaySwitch(){
  timer = window.setInterval(onClickNextSwitch, 1000);
  play.classList.add('hide');
  pause.classList.remove('hide');
  }
function onClicPauseSwitch(){
  window.clearInterval(timer);
  play.classList.remove('hide');
  pause.classList.add('hide');
}

function onClickRandom() {
    var randomNumber
    do {
		randomNumber = getRandomInteger(0, 5);
    } while (randomNumber == index);
    index = randomNumber;
    img.src = slides[index].image;
    fig.textContent = slides[index].h2;
}


a.addEventListener('click', onClickNavDisplay);
prev.addEventListener('click', onClickPreviousSwitch);
next.addEventListener('click', onClickNextSwitch);
play.addEventListener('click', onClicPlaySwitch);
pause.addEventListener('click', onClicPauseSwitch);
random.addEventListener('click', onClickRandom);
