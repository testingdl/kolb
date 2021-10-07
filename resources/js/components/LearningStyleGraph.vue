<template>
	<div class="learning-style-graph-container">
		<div class="learning-style-graph">
			<div class="row">
				<div class="col-6 cuad cuad-1">
					<span class="cuad-text">Acomodador</span>
				</div>
				<div class="col-6 cuad cuad-2">
					<span class="cuad-text">Divergente</span>
				</div>
			</div>
			<div class="row">
				<div class="col-6 cuad cuad-3">
					<span class="cuad-text">Convergente</span>
				</div>
				<div class="col-6 cuad cuad-4">
					<span class="cuad-text">Asimilador</span>
				</div>
			</div>
			<div class="cuad-region" :style="pointPosition(eaor, caec)"> </div>	
		</div>
		<div class="ea-or-axis-label"> 
			<span class="ea-or-axis-label-text">EA-OR </span>
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 12l-9-8v6h-15v4h15v6z"/></svg>
		</div>		
		<div class="ca-ec-axis-label"> 			
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 0l8 9h-6v15h-4v-15h-6z"/></svg>
			<span class="ca-ec-axis-label-text">CA-EC</span>
		</div>				
	</div>
</template>

<style>
.learning-style-graph-container {
	width:100%;
	max-width: 600px;
	margin: auto;
	position: relative;	
	padding: 5% 1%;
}

.learning-style-graph {
	width:100%;
	height: auto;
	margin: auto;
	position: relative;	
	padding: 0%;
}

.learning-style-graph .cuad {
	position: relative;
	width: 100%;
	padding-top: 50%;
}

.learning-style-graph .cuad-1 {
	background-color: #bfdde7;
	background: repeating-linear-gradient( 45deg, #bfdde7, #bfdde7 3px, #dcecf1 3px, #dcecf1 6px );	
}

.learning-style-graph .cuad-2 {
	background-color: #cdf5cd;
	background: repeating-linear-gradient( 135deg, #cdf5cd, #cdf5cd 3px, #ecfbec 3px, #ecfbec 6px );	
}

.learning-style-graph .cuad-3 {
	background-color: #cbcbdf;
	background: repeating-linear-gradient( 135deg, #cbcbdf, #cbcbdf 3px, #dadae9 3px, #dadae9 6px );	
}

.learning-style-graph .cuad-4 {
	background-color: #b8decc;
	background: repeating-linear-gradient( 45deg, #b8decc, #b8decc 3px, #cee8dc 3px, #cee8dc 6px );	
}

.learning-style-graph .cuad-text {
	position: absolute;
	top: -12px;
	left: 0;
	width: 100%;
	text-align: center;	
	font-size: 24px;
	margin-top: 50%;	
	text-shadow: 1px 1px 25px #fff,1px -1px 25px #fff;
}

.learning-style-graph .cuad-point {
	position: absolute;
	background-color: #ff0000;
	width: 20px;
	height: 20px;
	border-radius: 100px;
	border: 2px solid #ffffff;
}

.learning-style-graph .cuad-region {
	position: absolute;
	background-color: rgba(255, 0, 0, 0.5);
	border: 2px dashed #ffffff;
}

.ea-or-axis-label {
	position: absolute;
	top: 47.5%;
	left: -20%;
	font-size: 1.3em;
	vertical-align: middle;
}

.ca-ec-axis-label {
	position: absolute;
	left: 0;
	top: 94%;
	width: 100%;
	text-align: center;
	font-size: 1.3em;	
}

.ca-ec-axis-label-text {
	display: block;
}

</style>

<script>
export default {
    name: "LearningStyleGraph",
	props: {
		caec: 0,
		eaor: 0
	},
    methods: {
		eaorToPercentage(x){
			let tx = parseInt(x);
			
			if (tx <= -21)
				tx = -21;
			
			if (tx >= 28)
				tx = 28;				
			
			let eaor_func = [];
			eaor_func[-21] = 1; 
			eaor_func[-20] = 1; 
			eaor_func[-19] = 2; 
			eaor_func[-18] = 3; 
			eaor_func[-17] = 4; 
			eaor_func[-16] = 5; 
			eaor_func[-15] = 7; 
			eaor_func[-14] = 9; 
			eaor_func[-13] = 10; 
			eaor_func[-12] = 11; 
			eaor_func[-11] = 12; 
			eaor_func[-10] = 14; 
			eaor_func[-9] = 16; 
			eaor_func[-8] = 18; 
			eaor_func[-7] = 20; 
			eaor_func[-6] = 22; 
			eaor_func[-5] = 24; 
			eaor_func[-4] = 26; 
			eaor_func[-3] = 28; 
			eaor_func[-2] = 30; 
			eaor_func[-1] = 33; 
			eaor_func[0] = 36; 
			eaor_func[1] = 39; 
			eaor_func[2] = 40; 
			eaor_func[3] = 43; 
			eaor_func[4] = 46; 
			eaor_func[5] = 49; 
			eaor_func[6] = 52; 
			eaor_func[7] = 55; 
			eaor_func[8] = 58; 
			eaor_func[9] = 60; 
			eaor_func[10] = 65; 
			eaor_func[11] = 69; 
			eaor_func[12] = 70; 
			eaor_func[13] = 73; 
			eaor_func[14] = 76; 
			eaor_func[15] = 79; 
			eaor_func[16] = 80; 
			eaor_func[17] = 83; 
			eaor_func[18] = 86; 
			eaor_func[19] = 89; 
			eaor_func[20] = 90; 
			eaor_func[21] = 92; 
			eaor_func[22] = 94; 
			eaor_func[23] = 95; 
			eaor_func[24] = 96; 
			eaor_func[25] = 97; 
			eaor_func[26] = 98; 
			eaor_func[27] = 99; 
			eaor_func[28] = 100; 
				
			return eaor_func[tx];
		},
		caecToPercentage(x){
			let tx = parseInt(x);
			
			if (tx <= -27)
				tx = -27;
			
			if (tx >= 29)
				tx = 29;				
			
			let caec_func = [];
			caec_func[-27] = 1; 
			caec_func[-26] = 1; 
			caec_func[-25] = 1; 
			caec_func[-24] = 2; 
			caec_func[-23] = 2; 
			caec_func[-22] = 3; 
			caec_func[-21] = 3; 
			caec_func[-20] = 4; 
			caec_func[-19] = 4; 
			caec_func[-18] = 5; 
			caec_func[-17] = 5; 
			caec_func[-16] = 6; 
			caec_func[-15] = 6; 
			caec_func[-14] = 7; 
			caec_func[-13] = 7; 
			caec_func[-12] = 8; 
			caec_func[-11] = 9; 
			caec_func[-10] = 10; 
			caec_func[-9] = 13; 
			caec_func[-8] = 16; 
			caec_func[-7] = 18; 
			caec_func[-6] = 22; 
			caec_func[-5] = 25; 
			caec_func[-4] = 28; 
			caec_func[-3] = 30; 
			caec_func[-2] = 33; 
			caec_func[-1] = 36; 
			caec_func[0] = 39; 
			caec_func[1] = 40; 
			caec_func[2] = 43; 
			caec_func[3] = 46; 
			caec_func[4] = 49; 
			caec_func[5] = 52; 
			caec_func[6] = 55; 
			caec_func[7] = 58; 
			caec_func[8] = 62; 
			caec_func[9] = 65; 
			caec_func[10] = 67; 
			caec_func[11] = 72; 
			caec_func[12] = 75; 
			caec_func[13] = 78; 
			caec_func[14] = 80; 
			caec_func[15] = 82; 
			caec_func[16] = 84; 
			caec_func[17] = 86; 
			caec_func[18] = 88; 
			caec_func[19] = 89; 
			caec_func[20] = 90; 
			caec_func[21] = 91; 
			caec_func[22] = 92; 
			caec_func[23] = 93; 
			caec_func[24] = 94; 
			caec_func[25] = 95; 
			caec_func[26] = 97; 
			caec_func[27] = 98; 
			caec_func[28] = 99; 
			caec_func[29] = 100; 
				
			return caec_func[tx];
		},
        pointPosition(x, y) {
			/*let py = this.caecToPercentage(y)*0.99;
			let px = (100 - this.eaorToPercentage(x))*0.99;
            return `top:` + py + `%; left:` + px +`%;`;*/
						
			let py = this.caecToPercentage(y)*0.99;
			let px = (100 - this.eaorToPercentage(x))*0.99;
			let h = py > 50 ? py - 50 : py;
			let w = px > 50 ? px - 50 : px;
			let pt = py > 50 ? 50 : 0;
			let pl = px > 50 ? 50 : 0;
			return `top:` + pt + `%; left:` + pl +`%;` + `height:` + h + `%; width:` + w +`%;`;
        }
    }	
}
</script>