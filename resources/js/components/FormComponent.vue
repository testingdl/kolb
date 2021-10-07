<template>
    <div class="form-container">
        <div 
            v-if="isFetchingQuestions" 
            class="row h-100 justify-content-center"
        >
            <b-spinner variant="primary" label="Loading" />
        </div>

        <form v-else @submit.prevent="submit" id="form-kolb">
            <b-alert
                :show="testHasFailed"
                dismissible
                fade
                variant="danger"
                class="mt-2 mb-5"
                @dismissed="errors.splice(0, errors.length)"
            >
                <ul>
                    <li 
                        v-for="(error, index) in errors" 
                        class="h4 text-center"
                        :key="index"
                    >
                        {{ error }}
                    </li>
                </ul>
            </b-alert>
        
            <div class="row">
                <div class="col-md-12">
                    <div v-if="isTestCompleted" class="form-group text-center">
                        <chart-component 
                            :categories="categories" 
                            :data="data" 
                            :results="results" 
                            :learning-style="learningStyle"
                            :endpoint="endpoint"
                        />
                    </div>
        
                    <div v-else class="form-group">
						<form-wizard 
							title="" subtitle="" 
							nextButtonText="Siguiente" 
							backButtonText="Anterior" 
							finishButtonText="Obtener Resultados" 
							color="#3490dc" 
							@on-complete="formSubmit"
							@on-validate="handleValidation"
					>
							<tab-content 
								v-for="question in questions" 
								:key="question.id" 
								:before-change="validateAnswer">
									<question-component 																	
										:question="question"
										@has-changed="changeHandler"
									/>
							</tab-content>
						</form-wizard>
                    </div>
                </div>
        
                <div class="col-md-12">                   		
                </div>
            </div>
        </form>
		<v-tour name="myTour" :steps="steps">
		  <template slot-scope="tour">
			<transition name="fade">
			  <v-step
				v-for="(step, index) of tour.steps"
				:key="index"
				v-if="tour.currentStep === index"
				:step="step"
				:previous-step="tour.previousStep"
				:next-step="tour.nextStep"
				:stop="tour.stop"
				:skip="tour.skip"
				:is-first="tour.isFirst"
				:is-last="tour.isLast"
				:labels="tour.labels"
			  >
				<template v-if="tour.currentStep === 0">
				  <div slot="actions">
					<button @click="tour.skip" class="btn btn-primary">Saltarse el tutorial</button>
					<button @click="tour.nextStep" class="btn btn-primary">Siguiente</button>					
				  </div>
				</template>
				<template v-if="tour.currentStep > 0 && tour.currentStep < 7">
				  <div slot="actions">
					<button @click="tour.skip" class="btn btn-primary">Saltar tutorial</button>
					<button @click="tour.previousStep" class="btn btn-primary">Anterior</button>
					<button @click="tour.nextStep" class="btn btn-primary">Siguiente</button>
				  </div>
				</template>
				<template v-if="tour.currentStep === 7">
				  <div slot="actions">
					<button @click="tour.previousStep" class="btn btn-primary">Anterior</button>
					<button @click="tour.skip" class="btn btn-primary">Finalizar el tutorial</button>
				  </div>
				</template>
			  </v-step>
			</transition>
		  </template>		
		</v-tour>
    </div>	
</template>



<script>
import QuestionComponent from './QuestionComponent';
import ChartComponent    from './ChartComponent';
import clone             from 'lodash/clone';
import findKey           from 'lodash/findKey';
import each              from 'lodash/each';
import {FormWizard, TabContent} from 'vue-form-wizard'
import 'vue-form-wizard/dist/vue-form-wizard.min.css'
import VueTour from 'vue-tour'

require('vue-tour/dist/vue-tour.css')

export default {
    name: "FormComponent",
    components: {
        QuestionComponent,
        ChartComponent,
		FormWizard,
    },
    props: {
        testResults: {
            type: [Array, Object],
            default: null
        }
    },
    async created() {
        if(this.testResults) {
            if(this.testResults.style) {
                this.learningStyle = this.testResults.style;
            }
            
            this.testResults.results.map(result => {
                this.categories.push(result.description);
                this.data.push(result.result);
                this.results.push(result);
            });
        } else {
            await this.fetchQuestions();
        }
    },
    data () {
        return {
			steps: [
					  {
						target: '.navbar-brand', 
						header: {
						  title: '¡Bienvenido!',
						},
						content: `Responder el test <strong>Kolb</strong> es muy sencillo.`,
						params: {
						  placement: 'top' 
						}
					  },
					  {
						target: '.wizard-nav-pills',
						content: 'El test cuenta de 12 preguntas. Podrá ver en qué pregunta se encuenta en la barra superior.',
						params: {
						  placement: 'left' 
						}						
					  },
					  {
						target: '#question-container-1',
						content: 'Cada pregunta está numerada y consta de un enunciado.',
						params: {
						  placement: 'left' 
						}		
						
					  },
					  {
						target: '#answer-first-container-1',
						content: 'Con el puntero, arrastre la respuesta con la que más se identifica al panel derecho.',
						params: {
						  placement: 'left' 
						}		
					  },
					  {
						target: '#answer-first-container-1',
						content: 'Repita el proceso para las demás preguntas, ordenadas de la que más se identifica a las que menos.',
						params: {
						  placement: 'left' 
						}		
					  },					  
					  {
						target: '#answer-final-container-1',
						content: 'En el panel derecho aparecer un número con el valor de cada respuesta, siendo:<ul><li>4: Respuesta con la que más se identifica.</li><li>3: Respuesta con la que se identifica fuertemente.</li><li>2: Respuesta con la que no se identifica mucho.</li><li>1: Respuesta con la que menos se identifica.</li></ul>',
						params: {
						  placement: 'right' 
						}	
					  },
					  {
						target: '#answer-final-container-1',
						content: 'Si se equivoca con el orden de una respuesta, puede reordenarla al arrastar dicha respuesta a la posición que desee.',
						params: {
						  placement: 'right' 
						}
					  },
					  {
						target: '.wizard-footer-right',
						content: 'Una vez terminado, presione este botón para pasar a la siguiente pregunta.',
						params: {
						  placement: 'top' 
						}
					  }
					],		
            categories: [],
            data: [],
            results: [],
            learningStyle: null,
            endpoint: null,
            isFetchingQuestions: false,
            isLoading: false,
            errors: [],
            questions: [],
            completedQuestions: [],
        }
    },
    mounted: function () {
      this.$tours['myTour'].start();
    },	
    computed: {
        isTestCompleted () {
			if (this.results.length > 0)
			{
				document.getElementsByClassName("main-container")[0].classList.remove("v-flex-center");
				document.body.style.overflow = "auto"; 
			}
			else
			{
				document.getElementsByClassName("main-container")[0].classList.add("v-flex-center");
				document.body.style.overflow = "hidden"; 
			}
            return this.results.length > 0;
        },
        testHasFailed () {
            return this.errors.length > 0;
        }  
    },
    methods: {
        async fetchQuestions () {
            this.isFetchingQuestions = true;
            axios.get('/kolb/questions')
            .then((response) => {
                this.isFetchingQuestions = false;
                if(response.data.data) {
                    this.questions = clone(response.data.data);
                }
            })
            .catch((error) => {
                this.isFetchingQuestions = false;
                console.log(error);
            })
        },
        changeHandler (question) {
            const key = findKey(this.completedQuestions, q => q.id === question.id);
            if(!key) {
                this.completedQuestions.push(question);
                return;
            }
            this.$set(this.completedQuestions, key, question);
        },
		validateAnswer: function() {
			return true;
		},
		handleValidation: function(isValid, tabIndex) {				
			let answerGroup = document.querySelector('.final-answers [data-id="' + (tabIndex + 1) + '"]');
			let totAnswers = answerGroup.getElementsByTagName("div");
		
			if (totAnswers.length == 4)
				document.getElementById("step-" + (tabIndex)).classList.remove("question-error");
			else
				document.getElementById("step-" + (tabIndex)).classList.add("question-error");
		},		
		formSubmit: async function() {
            this.isLoading = true;

            this.errors.splice(0, this.errors.length);

            axios.post('/kolb/results', { questions: this.completedQuestions })
            .then(response => {
                this.isLoading = false;

                if(response.data.data) {
                    const test = response.data.data;

                    if(test.style) {
                        this.learningStyle = test.style;
                    }

                    if(test.endpoint) {
                        this.endpoint = test.endpoint;
                    }
                    
                    test.results.map(result => {
                        this.categories.push(result.description);
                        this.data.push(result.result);
                        this.results.push(result);
                    });
                }
            })
            .catch(err => {
                this.isLoading = false;

                let errors;

                if(err.response.data.errors) {
                    errors = err.response.data.errors;
                } else {
                    errors = {
                        _all: ['Submit error']
                    };
                }

                Object.keys(errors).forEach(key => {

                    if(!this.errors.includes(errors[key][0])) {
                        this.errors.push(errors[key][0]);						
                    }
                });

                window.scroll(0, 0);
            });
        }
    }
}
</script>