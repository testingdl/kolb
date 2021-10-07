<template>
    <div class="row justify-content-center" :id="`answer-first-container-` + questionId">
        <div class="col-md-5 p-0 bg-white">
            <draggable 
                class="list-group"
                v-model="list"
                group="answers"
                :emptyInsertThreshold="100"
                :move="checkMove"
            >
                <div
                    v-for="(answer, index) in list"
                    :class="`list-group-item list-group-item-action d-flex justify-content-between align-items-center q-cont q-cont-`+(answer.id % 4 + 1)"
                    :key="index"
					:data-key="index"
                    @dblclick.prevent="addElement(answer)"
                    v-html="answer.description"
                >
                </div>
            </draggable>
        </div>

        <div class="col-md-2"></div>

        <div class="col-md-5 p-0 bg-white border border-primary final-answers" :id="`answer-final-container-` + questionId">
            <draggable 
                class="list-group"
                v-model="list2"
                group="answers"
                :data-id="questionId"
                :emptyInsertThreshold="100"
                :move="checkMove"
                @change="handleChange"
                @end="handleEnd"
            >
                <div
                    v-for="(answer, index) in list2"
                    :class="`list-group-item list-group-item-action d-flex justify-content-between align-items-center q-cont q-cont-`+(answer.id % 4 + 1)"
                    :key="index"
					:data-key="index"					
                >
                    <p class="mb-0" v-html="answer.description"></p>
                    <b-badge :variant="getBadgeType(4 - index)" pill>
                        {{ 4 - index }}
                    </b-badge>
                </div>
            </draggable>
        </div>
    </div>
</template>

<style>
.q-cont-1,
.q-cont-1:hover {
	background-color: #d6e9f8;
}

.q-cont-2,
.q-cont-2:hover {
	background-color: #c5dff5;
}

.q-cont-3,
.q-cont-3:hover {
	background-color: #badaf3;
}

.q-cont-4,
.q-cont-4:hover {
	background-color: #b1d5f1;
}

.q-cont {
	opacity: 0.7;
}

.q-cont:hover {
	opacity: 1;
}
</style>

<script>
import draggable from 'vuedraggable';
import clone     from 'lodash/clone';
import remove    from 'lodash/remove';
import helper    from '../mixins/helper';

export default {
    name: "AnswersComponent",	
    props: {
        questionId: {
            type:   [Number, String],
            default: null
        },
        answers: {
            type:     Array,
            required: true
        }
    },
    components: {
        draggable
    },
    mixins: [
        helper
    ],
    mounted () {
        this.list = clone( this.answers );
    },
    computed: {
        getComponentTitle () {
            return `${this.title}:`;
        }
    },
    methods: {
        handleEnd (event) {
            return this.$emit('has-changed', this.reverseAnswers(this.list2));
        },
        handleChange (event) {
            return event.added !== undefined 
                ? this.$emit('has-changed', this.reverseAnswers(this.list2))
                : null;
        },
        checkMove (event) {
            return event.draggedContext.element.question_id == event.to.dataset.id;
        },
        addElement (answer) {
            remove(this.list, item => item.id === answer.id);
            this.list2.push(answer);
            return this.$emit(
                'has-changed', 
                this.reverseAnswers(this.list2)
            );
        },		
		getBadgeType(i) {
			switch (i)
			{
				case 1:
					return 'danger';
				break;
				case 2:
					return 'warning';
				break;
				case 3:
					return 'primary';
				break;
				case 4:
					return 'success';
				break;
			}
		}
    },
    data () {
        return {
            list:  [],
            list2: [],
        };
    },
}
</script>