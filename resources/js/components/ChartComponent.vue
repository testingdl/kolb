<template>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header" style="background-color: #154b6c">
                <h1 class="h2 card-title text-uppercase font-weight-bold mb-0 text-white">
                    Sus resultados
                </h1>
            </div>
            
				<div class="card-header" style="background-color: #1d6896">
					<h1 class="h2 card-title text-uppercase font-weight-bold mb-0 text-white">
						Ciclo de Aprendizaje
					</h1>
				</div>

				<div class="card-body">
					<apex-chart type="radar" :options="chartOptions" :series="series" />
				</div>

				<div class="card-footer p-0">
					<div class="container">
						<div class="row">
							<div 
								class="col-lg-3 col-sm-12 p-0" 
								v-for="(result, index) in orderedResults" 
								:key="index"
								v-html="resultRender(result)"
							>
							</div>						
						</div>
					</div>
				</div>

				<div class="debug-body">
					<strong>DATOS PARA PRUEBAS</strong>
					<br/>
					EA: {{data[3]}}
					<br/>
					EC: {{data[0]}}
					<br/>
					OR: {{data[1]}}
					<br/>
					CA: {{data[2]}}
				</div>

				<div class="card-header" style="background-color: #1d6896">
					<h1 class="h2 card-title text-uppercase font-weight-bold mb-0 text-white">
						Estilo de Aprendizaje
					</h1>
				</div>

				<div class="card-body">
					<LearningStyleGraph :caec="data[2]-data[0]" :eaor="data[3]-data[1]" />
				</div>

				<div class="debug-body">
					<strong>DATOS PARA PRUEBAS</strong>
					<br/>
					EA-OR: {{data[3]-data[1]}}
					<br/>
					CA-EC: {{data[2]-data[0]}}
				</div>

				<div class="card-footer p-0">
					<div class="container">
						<div class="row">
							<div v-if="learningStyle" class="col-sm-12 mb-1 p-4" :style="`background-color: ` + getBkgColor(learningStyle.id)">								
								<div class="row">
									<div class="col-lg-10 p-3 m-0 col-sm-12 col-xs-12">
										<h1 
											class="h1 font-weight-bold text-black mb-3" v-html="learningStyle.name"
										></h1>
										<h4 
											class="h4 text-italic text-black mb-3"
											v-html="learningStyle.description"
										></h4>
										<p 
											class="text-black text-justify"
											v-html="learningStyle.detail"
										></p>
									</div>
									<div class="col-lg-2 p-0 m-0 col-sm-12 col-xs-12">
										<img :src="getCharacter(learningStyle.id)" class="w-75" :alt="learningStyle.name" />
									</div>
								</div>
							</div>
				   
							<div 
								v-if="endpoint"
								class="col-sm-12 mb-4"
							>
								<a :href="endpoint">
									Siempre podrá ver sus resultados accediendo a este vínculo
								</a>
							</div>
						</div>
					</div>
				</div>
			
        </div>
    </div>
</template>



<script>
// ApexCharts
import ApexChart from 'vue-apexcharts'
// VForm
import Form from 'vform';
// Lodash
import clone from 'lodash/clone';

export default {
    name: "ChartComponent",
    components: {
        ApexChart
    },
    props: {
        categories: {
            type:     Array,
            required: true
        },
        data: {
            type:     Array,
            required: true
        },
        results: {
            type:     Array,
            required: true
        },
        learningStyle: {
            type:    Object,
            default: null,
        },
        endpoint: {
            type: String,
            default: null,
        }
    },
    mounted () {
        this.categories.map(category => this.chartOptions.xaxis.categories.push(category));
        this.series.push({ name: "Valor: ", data: this.data });
    },
    data () {
        return {
            series: [],
            chartOptions: {
                chart: {
                    type: 'radar'					
                },
				toolbar: {
				  show: false
				},
                xaxis: {
                    categories: []
                }
            }
        };
    },
	computed: {
	  orderedResults: function () {
		return _.orderBy(this.results, 'result', 'desc')
	  }
	},	
    methods: {
        resultRender (result) {
			let renderedHTML  = result.details; 
			renderedHTML  = renderedHTML.replace(/\$\{description\}/g, result.description); 
			renderedHTML  = renderedHTML.replace(/\$\{result\}/g, result.result); 
			renderedHTML  = renderedHTML.replace(/\$\{abbreviation\}/g, result.abbreviation); 
			renderedHTML  = renderedHTML.replace(/\$\{description\}/g, result.description); 
			return renderedHTML;
			//return `${result.description} (${result.abbreviation}): ${result.result}%`;
        },
		getBkgColor(id) {
			let bgcolor = "#6cb2eb";
			switch (id)
			{
				case 1:
					bgcolor = "#cbcbdf";
				break;
				case 2:
					bgcolor = "#cdf5cd";
				break;
				case 3:
					bgcolor = "#b8decc";
				break;
				case 4:
					bgcolor = "#bfdde7";
				break;				
			}
			return bgcolor;
		},
		getCharacter(id) {
			let imgChar = "martiza.png";
			switch (id)
			{
				case 1:
					imgChar = "convergente.png";
				break;
				case 2:
					imgChar = "divergente.png";
				break;
				case 3:
					imgChar = "asimilador.png";
				break;
				case 4:
					imgChar = "acomodador.png";
				break;				
			}
			return  "img/" + imgChar;
		}
    }	
}
</script>