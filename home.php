<?php
	include('index_logged.php');
?>

<!DOCTYPE html>
<html>
    <head>
      <style>
        @import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');
		*
		{
		font-family: 'Montserrat', sans-serif;
		}
		#butt 
		{
		font-family: 'Montserrat', sans-serif;
		border-radius: 20px;
		border: 1px solid #000000;
		background: linear-gradient(to right, #0089C0, #002867);
		background-color: #FF4B2B;
		color: #FFFFFF;
		font-size: 12px;
		font-weight: bold;
		padding: 10px 15px;
		letter-spacing: 1px;
		text-transform: uppercase;
		transition: transform 80ms ease-in;
		margin: 5px;
		}
        html, body {
          margin: 0;
          padding: 0;
          background-image: url('bg.jpg');
          background-size: cover;
          background-repeat: no-repeat;
          overflow: hidden;
        }
        .home-container {
          display: grid;
          grid-template-columns: 50% 50%;
          color: white;
          text-align: center;
          font-family: Montserrat;
        }
        .mission-container {
          opacity: 0.9;
          background-color: #0089C0;
          height: 100vh;
          padding-top: 150px;
        }
        .vision-container {
          opacity: 0.9;
          background-color: #002867;
          height: 100vh;
          padding-top: 150px
        }
		#logout
		{
			color:white;
		}
		#abc1
		{
			color:white;
		}
      </style>
      <link rel="icon" href="favicon.ico" type="image/x-icon"/>
      <title>Pamantasan ng Lungsod ng Marikina | Faculty EIS</title>
    </head>
  <body>
    <div class="home-container">
    <div class="mission-container">
      <h1>MISSION</h1>
      <p>Pamantasan ng Lungsod ng Marikina (PLMar) is committed to:</p>
      <ol>
        <br><li>1. Provide accessible quality education, resources, opportunities and services for student development;</li>
        <br><li>2. Promote holistic approach in lifelong learning leading to better quality of life;</li>
        <br><li>3. Build an empowered, resilient and supportive learning community of agents for positive change.</li>
      </ol>
    </div>
    <div class="vision-container">
      <h1>VISION</h1>
       <p>Pamantasan ng Lungsod ng Marikina (PLMar) is a progressive higher educational institution fostering competent,          passionate and creative learning community dedicated to the pursuit of academic excellence, character formation, social responsibility and accountability.</p>
    </div>
    </div>
  </body>
</html>

