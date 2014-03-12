<!DOCTYPE html>
<html>

	<head>
	<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js">
	</script>-->
	</head>
	<body>
	<!-- To Do:
		Add a pause button
		The php script to open the database, and then capture the data needed. Randomize the order of the play list.
		Randomizing:
			Cycle through every pair at least once before repeats.
			So break up the arrays to store the data in the Javascript into sections and shuffle each one and then piece it together.
		-->
	<audio id="aud1">
		<source src="aud1.mp3" type="audio/mpeg">
		Browser does not support this.
	</audio>

	<audio id="aud2">
		<source src="aud2.mp3" type="audio/mpeg">
	</audio>
	
	<button id="one">Start Test</button>
	</br>
	<!--<button id="change" type="submit" onclick="playAudV1()"> <img src="img.jpg" alt="Play Audio"/> </button>-->
		

<!--	<form id="add" name="end"  action="" method="post"></form>  -->
	<div></div>

	<script>
		var aud1 = document.getElementById("aud1");
		var aud2 = document.getElementById("aud2");

		var list1 = new Array(aud1, aud2, aud1, aud2);
		var list2 = new Array(aud1, aud2, aud2, aud1);
		var list3 = new Array("1", "1", "2", "2");
		var list4 = [];
		var index = 0;
		
		document.getElementById("one").addEventListener("click", started);
		var listener = function(){playAud2(list2[index], true)};
		var startVal = false;
		var pauseVal = false;
		function addButton()
		// This function will add a button to the screen, this will be the compliment button for pressing right/wrong throughout the test.
		{
			var element = document.createElement("BUTTON");
			element.id = "2";
			element.innerHTML = "<img src=\"img2.jpg\" alt=\"Play Audio\"/>";
			element.addEventListener("click", playAudV2);
			document.body.appendChild(element);
			
				
		}
		function started()
		// This function will swap out the start button with the "smiley face button" and then set it so the use of the button plays audio files and not create more buttons.
		//TODO: add a pause button to pop up after pressing start.
		{
			if(startVal == false)
			{
				startVal = true;
				addButton();
				playAud("0");
				document.getElementById("one").innerHTML = "<img src=\"img.jpg\" alt=\"Play Audio\"/>";
			}
			else
			{
				playAudV1();
			}
		/*	document.getElementById("one").removeEventListener("click", started);
			document.getELementById("one").addEventListener("click", playAudV1);*/
		}
		// These functions are used to pass a value in to capture the result.
		function playAudV1()
		{
			playAud("1");
		}
		function playAudV2()
		{
			playAud("2");
		}
		// To Do: Use the value passed into to add to a "results" array
		function playAud(response)
		// This function sets up the event listener to prevent the 2nd sound from playing 
		{
			//document.getElementById("change").innerHTML="<img src=\"img2.jpg\" alt=\"Play Audio\"/>";
			list4[index] = response;
			list1[index].addEventListener("ended", listener);
			playAud2(list1[index], false);
			
		}
		function playAud2(ele, bool)
		// This function will play the audio files, first play will happen then the event listener calls the 2nd audio play removing the listener  to move on. 
		{
		//	document.getElementById("test").innerHTML="changed";
			if (startVal == true)
			{
				if (bool == true)
				{
					list1[index].removeEventListener("ended", listener);
					index++;
				
				}
				ele.play();
			
					
						
			}
		}
	</script>

	</body>

</html>
