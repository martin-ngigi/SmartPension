<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width-device-width", initital-scale-1.0>
	<title>Smart Pension</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="image-slider">
		<div class="slide active">
			<img src="images/11.jpg" alt="">
			<div class="info">
				<h2>Slide 01</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			</div>
		</div>
		<div class="slide">
			<img src="images/22.jpg" alt="">
			<div class="info">
				<h2>Slide 02</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			</div>
		</div>
		<div class="slide">
			<img src="images/33.jpg" alt="">
			<div class="info">
				<h2>Slide 03</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			</div>
		</div>
		<div class="slide">
			<img src="images/4.jpg" alt="">
			<div class="info">
				<h2>Slide 04</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			</div>
		</div>
		<div class="slide">
			<img src="images/5.jpg" alt="">
			<div class="info">
				<h2>Slide 05</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			</div>
		</div>
		<div class="navigation">
			<div class="btn active"></div>
			<div class="btn"></div>
			<div class="btn"></div>
			<div class="btn"></div>
			<div class="btn"></div>
		</div>
	</div>
	<script type="text/javascript">
		var slides = document.querySelectorAll('.slide');
		var btns = document.querySelectorAll('.btn');
		let currentSlide = 1;

		//javascript for image slider manual navigation
		var manualNav = function(manual){
			slides.forEach((slide) => {
				slide.classList.remove('active');

				btns.forEach((btn) =>{
					btn.classList.remove('active');
				});
			});


			slides[manual].classList.add('active');
			btns[manual].classList.add('active');
		}

		btns.forEach((btn, i) => {
			btn.addEventListener("click", ()=> {
				manualNav(i);
				currentSlide = i;
			});
		});

		//javascript for image slider autoplay navigation
		var repeat = function(activeClass){
			let active = document.getElementsByClassName('active');
			let i =1;

			var repeater = () => {
				setTimeout(function(){
					[...active].forEach((activeSlide) => {
						activeSlide.classList.remove('active');
					});

					slides[i].classList.add('active');
					btns[i].classList.add('active');
					i++;

					if (slides.length == i) {
						i=0;
					}
					if (i >= slides.length) {
						return;
					}
					repeater();
				}, 10000);
			}
			repeater();
		}
		repeat();
	</script>
</body>
</html>